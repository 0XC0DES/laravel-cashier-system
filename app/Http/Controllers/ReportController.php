<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function sales(Request $request): View
    {
        $startDate = $request->input(
            'start_date',
            now()->startOfMonth()->format('Y-m-d')
        );

        $endDate = $request->input(
            'end_date',
            now()->format('Y-m-d')
        );

        $transactions = Transaction::with('user')
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $totalSales = Transaction::whereDate(
            'created_at',
            '>=',
            $startDate
        )
        ->whereDate(
            'created_at',
            '<=',
            $endDate
        )
        ->sum('total');

        $totalTransactions = Transaction::whereDate(
            'created_at',
            '>=',
            $startDate
        )
        ->whereDate(
            'created_at',
            '<=',
            $endDate
        )
        ->count();

        $totalProducts = TransactionDetail::whereHas(
            'transaction',
            function ($query) use ($startDate, $endDate) {

                $query
                    ->whereDate(
                        'created_at',
                        '>=',
                        $startDate
                    )
                    ->whereDate(
                        'created_at',
                        '<=',
                        $endDate
                    );
            }
        )->sum('quantity');

        return view('reports.sales', compact(
            'transactions',
            'startDate',
            'endDate',
            'totalSales',
            'totalTransactions',
            'totalProducts'
        ));
    }

    public function exportSales(Request $request): Response
    {
        $startDate = $request->input(
            'start_date',
            now()->startOfMonth()->format('Y-m-d')
        );

        $endDate = $request->input(
            'end_date',
            now()->format('Y-m-d')
        );

        $transactions = Transaction::with([
            'user',
            'details.product',
        ])
        ->whereDate('created_at', '>=', $startDate)
        ->whereDate('created_at', '<=', $endDate)
        ->latest()
        ->get();

        $filename = 'laporan-penjualan-'
            . $startDate
            . '-sampai-'
            . $endDate
            . '.csv';

        $handle = fopen('php://temp', 'w+');

        // BOM agar Excel membaca UTF-8 dengan benar
        fwrite($handle, "\xEF\xBB\xBF");

        fputcsv($handle, [
            'Invoice',
            'Tanggal',
            'Kasir',
            'Produk',
            'SKU',
            'Harga',
            'Qty',
            'Subtotal',
            'Total Transaksi',
            'Pembayaran',
            'Kembalian',
        ], ';');

        foreach ($transactions as $transaction) {

            foreach ($transaction->details as $detail) {

                fputcsv($handle, [
                    $transaction->invoice_number,
                    $transaction->created_at->format('Y-m-d H:i:s'),
                    $transaction->user->name,
                    $detail->product->name,
                    $detail->product->sku,
                    $detail->price,
                    $detail->quantity,
                    $detail->subtotal,
                    $transaction->total,
                    $transaction->payment,
                    $transaction->change,
                ], ';');
            }
        }

        rewind($handle);

        $csv = stream_get_contents($handle);

        fclose($handle);

        return response(
            $csv,
            200,
            [
                'Content-Type' => 'text/csv; charset=UTF-8',
                'Content-Disposition' =>
                    'attachment; filename="' . $filename . '"',
            ]
        );
    }
}