<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $today = now()->startOfDay();

        /*
        |--------------------------------------------------------------------------
        | Statistik Hari Ini
        |--------------------------------------------------------------------------
        */

        $todaySales = Transaction::where(
            'created_at',
            '>=',
            $today
        )->sum('total');

        $todayTransactions = Transaction::where(
            'created_at',
            '>=',
            $today
        )->count();

        $todayProducts = TransactionDetail::where(
            'created_at',
            '>=',
            $today
        )->sum('quantity');


        /*
        |--------------------------------------------------------------------------
        | Penjualan Bulan Ini
        |--------------------------------------------------------------------------
        */

        $monthlySales = Transaction::whereMonth(
            'created_at',
            now()->month
        )
        ->whereYear(
            'created_at',
            now()->year
        )
        ->sum('total');


        /*
        |--------------------------------------------------------------------------
        | Total Produk
        |--------------------------------------------------------------------------
        */

        $totalProducts = Product::count();

        $outOfStock = Product::where(
            'stock',
            0
        )->count();


        /*
        |--------------------------------------------------------------------------
        | Produk Stok Menipis
        |--------------------------------------------------------------------------
        */

        $lowStockProducts = Product::with('category')
            ->where('stock', '<=', 5)
            ->orderBy('stock')
            ->orderBy('name')
            ->limit(6)
            ->get();

        $lowStock = Product::whereBetween(
            'stock',
            [1, 5]
        )->count();


        /*
        |--------------------------------------------------------------------------
        | Transaksi Terbaru
        |--------------------------------------------------------------------------
        */

        $recentTransactions = Transaction::with('user')
            ->latest()
            ->limit(8)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Produk Terlaris 30 Hari
        |--------------------------------------------------------------------------
        */

        $bestSellingProducts = TransactionDetail::select(
            'product_id',
            DB::raw('SUM(quantity) as total_sold')
        )
        ->with('product')
        ->where(
            'created_at',
            '>=',
            now()->subDays(30)->startOfDay()
        )
        ->groupBy('product_id')
        ->orderByDesc('total_sold')
        ->limit(5)
        ->get();


        /*
        |--------------------------------------------------------------------------
        | Penjualan 7 Hari Terakhir
        |--------------------------------------------------------------------------
        */

        $salesLast7Days = Transaction::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total) as total')
        )
        ->where(
            'created_at',
            '>=',
            now()->subDays(6)->startOfDay()
        )
        ->groupBy(
            DB::raw('DATE(created_at)')
        )
        ->orderBy('date')
        ->get();


        /*
        |--------------------------------------------------------------------------
        | Siapkan Data Grafik
        |--------------------------------------------------------------------------
        */

        $salesChart = [];

        for ($i = 6; $i >= 0; $i--) {

            $date = now()
                ->subDays($i)
                ->format('Y-m-d');

            $sale = $salesLast7Days->firstWhere(
                'date',
                $date
            );

            $salesChart[] = [
                'date' => $date,

                'label' => now()
                    ->subDays($i)
                    ->format('d M'),

                'total' => $sale
                    ? (float) $sale->total
                    : 0,
            ];
        }


        return view('dashboard', compact(
            'todaySales',
            'todayTransactions',
            'todayProducts',
            'monthlySales',
            'totalProducts',
            'outOfStock',
            'lowStock',
            'lowStockProducts',
            'recentTransactions',
            'bestSellingProducts',
            'salesChart'
        ));
    }
}