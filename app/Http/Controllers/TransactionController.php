<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class TransactionController extends Controller
{
    /**
     * Menampilkan daftar transaksi.
     */
    public function index(Request $request): View
    {
        $transactions = Transaction::with('user')
            ->when($request->filled('search'), function ($query) use ($request) {

                $search = $request->search;

                $query->where(
                    'invoice_number',
                    'like',
                    "%{$search}%"
                );
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'transactions.index',
            compact('transactions')
        );
    }


    /**
     * Menampilkan halaman kasir.
     *
     * Semua produk ditampilkan,
     * termasuk produk dengan stok 0.
     */
    public function create(): View
    {
        $products = Product::orderBy('name')->get();

        return view(
            'transactions.create',
            compact('products')
        );
    }


    /**
     * Menampilkan detail transaksi.
     */
    public function show(Transaction $transaction): View
    {
        $transaction->load([
            'user',
            'details.product',
        ]);

        return view(
            'transactions.show',
            compact('transaction')
        );
    }


    /**
     * Menampilkan receipt / struk transaksi.
     */
    public function receipt(Transaction $transaction): View
    {
        $transaction->load([
            'user',
            'details.product',
        ]);

        return view(
            'transactions.receipt',
            compact('transaction')
        );
    }


    /**
     * Menyimpan transaksi baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'payment' => [
                'required',
                'numeric',
                'min:0',
            ],

            'items' => [
                'required',
                'array',
                'min:1',
            ],

            'items.*.product_id' => [
                'required',
                'integer',
                'exists:products,id',
            ],

            'items.*.quantity' => [
                'required',
                'integer',
                'min:1',
            ],
        ]);


        try {

            $transaction = DB::transaction(function () use (
                $validated,
                $request
            ) {

                $total = 0;

                $items = [];


                /*
                |--------------------------------------------------------------------------
                | Validasi Produk & Stok
                |--------------------------------------------------------------------------
                */

                foreach ($validated['items'] as $item) {

                    $product = Product::lockForUpdate()
                        ->findOrFail($item['product_id']);


                    $quantity = (int) $item['quantity'];


                    /*
                    |--------------------------------------------------------------------------
                    | Cek Stok
                    |--------------------------------------------------------------------------
                    */

                    if ($product->stock < $quantity) {

                        throw new \Exception(
                            "Stok produk {$product->name} tidak mencukupi."
                        );
                    }


                    $price = (float) $product->price;


                    $subtotal = $price * $quantity;


                    $total += $subtotal;


                    $items[] = [

                        'product' => $product,

                        'quantity' => $quantity,

                        'price' => $price,

                        'subtotal' => $subtotal,

                    ];
                }


                /*
                |--------------------------------------------------------------------------
                | Validasi Pembayaran
                |--------------------------------------------------------------------------
                */

                $payment = (float) $validated['payment'];


                if ($payment < $total) {

                    throw new \Exception(
                        'Pembayaran tidak mencukupi.'
                    );
                }


                /*
                |--------------------------------------------------------------------------
                | Generate Invoice
                |--------------------------------------------------------------------------
                */

                $invoiceNumber =
                    $this->generateInvoiceNumber();


                /*
                |--------------------------------------------------------------------------
                | Simpan Transaksi
                |--------------------------------------------------------------------------
                */

                $transaction = Transaction::create([

                    'invoice_number' => $invoiceNumber,

                    'user_id' => $request->user()->id,

                    'total' => $total,

                    'payment' => $payment,

                    'change' => $payment - $total,

                ]);


                /*
                |--------------------------------------------------------------------------
                | Simpan Detail & Kurangi Stok
                |--------------------------------------------------------------------------
                */

                foreach ($items as $item) {

                    $transaction->details()->create([

                        'product_id' =>
                            $item['product']->id,

                        'quantity' =>
                            $item['quantity'],

                        'price' =>
                            $item['price'],

                        'subtotal' =>
                            $item['subtotal'],

                    ]);


                    /*
                    |--------------------------------------------------------------------------
                    | Kurangi Stok
                    |--------------------------------------------------------------------------
                    */

                    $item['product']->decrement(
                        'stock',
                        $item['quantity']
                    );
                }


                return $transaction;
            });


            /*
            |--------------------------------------------------------------------------
            | Redirect Setelah Berhasil
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->route(
                    'transactions.show',
                    $transaction
                )
                ->with(
                    'success',
                    'Transaksi berhasil dibuat.'
                );


        } catch (\Throwable $e) {


            /*
            |--------------------------------------------------------------------------
            | Log Error
            |--------------------------------------------------------------------------
            */

            Log::error(
                'Transaction failed',
                [
                    'user_id' =>
                        $request->user()->id,

                    'error' =>
                        $e->getMessage(),
                ]
            );


            /*
            |--------------------------------------------------------------------------
            | Kembali Dengan Error
            |--------------------------------------------------------------------------
            */

            return back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }


    /**
     * Generate nomor invoice.
     *
     * Contoh:
     * TRX-20260813-0001
     */
    private function generateInvoiceNumber(): string
    {
        $date = now()->format('Ymd');


        $lastTransaction = Transaction::whereDate(
            'created_at',
            today()
        )
        ->latest('id')
        ->first();


        $number = $lastTransaction
            ? (
                (int) substr(
                    $lastTransaction->invoice_number,
                    -4
                )
            ) + 1
            : 1;


        return 'TRX-' . $date . '-' . str_pad(
            $number,
            4,
            '0',
            STR_PAD_LEFT
        );
    }
}