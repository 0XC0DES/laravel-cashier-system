<x-app-layout>

    <x-slot name="header">

        <div>
            <p class="text-sm text-stone-500">
                Ringkasan aktivitas toko
            </p>

            <h2 class="mt-1 text-2xl font-bold text-stone-800">
                Dashboard
            </h2>
        </div>

    </x-slot>


    <div class="min-h-screen bg-[#f7f3ed] py-8">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">


            {{-- =====================================================
                HEADER
            ====================================================== --}}

            <div class="mb-8">

                <div
                    class="overflow-hidden rounded-[28px] border border-stone-200/70 bg-white shadow-[0_20px_60px_rgba(80,60,40,0.06)]"
                >

                    <div class="p-6 sm:p-8">

                        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

                            <div>

                                <p class="text-sm font-medium text-stone-500">
                                    {{ now()->translatedFormat('l, d F Y') }}
                                </p>

                                <h1 class="mt-2 text-2xl font-bold text-stone-800 sm:text-3xl">
                                    Selamat datang kembali, {{ auth()->user()->name }} 👋
                                </h1>

                                <p class="mt-2 max-w-xl text-sm leading-6 text-stone-500">
                                    Pantau penjualan, transaksi, dan kondisi stok
                                    toko kamu dari satu tempat.
                                </p>

                            </div>


                            <a
                                href="{{ route('transactions.create') }}"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-stone-800 px-5 py-3 text-sm font-semibold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-stone-700"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 5v14M5 12h14"
                                    />
                                </svg>

                                Transaksi Baru

                            </a>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                STATISTICS
            ====================================================== --}}

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">


                {{-- Penjualan Hari Ini --}}

                <div
                    class="rounded-[24px] border border-stone-200/70 bg-white p-6 shadow-[0_15px_40px_rgba(80,60,40,0.05)]"
                >

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-stone-500">
                                Penjualan Hari Ini
                            </p>

                            <p class="mt-3 text-2xl font-bold text-stone-800">
                                Rp {{ number_format($todaySales, 0, ',', '.') }}
                            </p>

                        </div>


                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#f4ede4] text-stone-700">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 6v12m-3-2.5h4.5a2.5 2.5 0 000-5H10.5a2.5 2.5 0 010-5H15"
                                />
                            </svg>

                        </div>

                    </div>

                    <p class="mt-4 text-xs text-stone-400">
                        Total omzet hari ini
                    </p>

                </div>


                {{-- Transaksi --}}

                <div
                    class="rounded-[24px] border border-stone-200/70 bg-white p-6 shadow-[0_15px_40px_rgba(80,60,40,0.05)]"
                >

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-stone-500">
                                Transaksi Hari Ini
                            </p>

                            <p class="mt-3 text-2xl font-bold text-stone-800">
                                {{ number_format($todayTransactions, 0, ',', '.') }}
                            </p>

                        </div>


                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#f4ede4] text-stone-700">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8 8h8M8 12h8M8 16h5"
                                />

                            </svg>

                        </div>

                    </div>

                    <p class="mt-4 text-xs text-stone-400">
                        Transaksi berhasil hari ini
                    </p>

                </div>


                {{-- Produk Terjual --}}

                <div
                    class="rounded-[24px] border border-stone-200/70 bg-white p-6 shadow-[0_15px_40px_rgba(80,60,40,0.05)]"
                >

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-stone-500">
                                Produk Terjual
                            </p>

                            <p class="mt-3 text-2xl font-bold text-stone-800">
                                {{ number_format($todayProducts, 0, ',', '.') }}
                            </p>

                        </div>


                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#f4ede4] text-stone-700">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 7h12l1 13H5L6 7z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 7a3 3 0 016 0"
                                />

                            </svg>

                        </div>

                    </div>

                    <p class="mt-4 text-xs text-stone-400">
                        Item terjual hari ini
                    </p>

                </div>


                {{-- Penjualan Bulan --}}

                <div
                    class="rounded-[24px] border border-stone-200/70 bg-white p-6 shadow-[0_15px_40px_rgba(80,60,40,0.05)]"
                >

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-stone-500">
                                Penjualan Bulan Ini
                            </p>

                            <p class="mt-3 text-2xl font-bold text-stone-800">
                                Rp {{ number_format($monthlySales, 0, ',', '.') }}
                            </p>

                        </div>


                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#f4ede4] text-stone-700">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 19V5M4 19h16"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8 16v-5M12 16V8M16 16v-7"
                                />

                            </svg>

                        </div>

                    </div>

                    <p class="mt-4 text-xs text-stone-400">
                        Omzet bulan berjalan
                    </p>

                </div>

            </div>


            {{-- =====================================================
                GRAPH + STOCK
            ====================================================== --}}

            <div class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-3">


                {{-- GRAFIK --}}

                <div
                    class="xl:col-span-2 rounded-[24px] border border-stone-200/70 bg-white p-6 shadow-[0_15px_40px_rgba(80,60,40,0.05)]"
                >

                    <div class="flex items-center justify-between">

                        <div>

                            <h3 class="font-bold text-stone-800">
                                Penjualan 7 Hari Terakhir
                            </h3>

                            <p class="mt-1 text-xs text-stone-400">
                                Performa omzet harian
                            </p>

                        </div>

                    </div>


                    <div class="mt-8">

                        <div class="flex h-64 items-end gap-3 sm:gap-5">

                            @php
                                $maxSale = collect($salesChart)->max('total');

                                if ($maxSale <= 0) {
                                    $maxSale = 1;
                                }
                            @endphp


                            @foreach($salesChart as $sale)

                                @php
                                    $height = ($sale['total'] / $maxSale) * 100;

                                    if ($sale['total'] > 0 && $height < 8) {
                                        $height = 8;
                                    }
                                @endphp


                                <div class="group flex h-full flex-1 flex-col justify-end">

                                    <div class="relative flex h-full items-end">

                                        <div
                                            class="w-full rounded-t-xl bg-stone-800 transition duration-300 group-hover:bg-stone-600"
                                            style="height: {{ $height }}%"
                                        >

                                            @if($sale['total'] > 0)

                                                <div class="absolute -top-8 left-1/2 hidden -translate-x-1/2 whitespace-nowrap rounded-lg bg-stone-800 px-2 py-1 text-[10px] font-medium text-white group-hover:block">

                                                    Rp {{ number_format($sale['total'], 0, ',', '.') }}

                                                </div>

                                            @endif

                                        </div>

                                    </div>


                                    <p class="mt-3 text-center text-[11px] text-stone-400">
                                        {{ $sale['label'] }}
                                    </p>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- STOCK --}}

                <div
                    class="rounded-[24px] border border-stone-200/70 bg-white shadow-[0_15px_40px_rgba(80,60,40,0.05)]"
                >

                    <div class="border-b border-stone-100 p-6">

                        <h3 class="font-bold text-stone-800">
                            Kondisi Stok
                        </h3>

                        <p class="mt-1 text-xs text-stone-400">
                            Produk yang perlu diperhatikan
                        </p>

                    </div>


                    <div class="space-y-4 p-6">

                        @forelse($lowStockProducts as $product)

                            <div class="flex items-center justify-between gap-3">

                                <div class="min-w-0">

                                    <p class="truncate text-sm font-semibold text-stone-700">
                                        {{ $product->name }}
                                    </p>

                                    <p class="mt-1 text-xs text-stone-400">
                                        {{ $product->category->name ?? 'Tanpa kategori' }}
                                    </p>

                                </div>


                                @if($product->stock == 0)

                                    <span class="shrink-0 rounded-lg bg-red-50 px-2.5 py-1 text-xs font-bold text-red-600">
                                        Habis
                                    </span>

                                @elseif($product->stock <= 2)

                                    <span class="shrink-0 rounded-lg bg-red-50 px-2.5 py-1 text-xs font-bold text-red-600">
                                        {{ $product->stock }}
                                    </span>

                                @else

                                    <span class="shrink-0 rounded-lg bg-amber-50 px-2.5 py-1 text-xs font-bold text-amber-600">
                                        {{ $product->stock }}
                                    </span>

                                @endif

                            </div>

                        @empty

                            <div class="rounded-2xl bg-emerald-50 p-5 text-center">

                                <p class="text-sm font-semibold text-emerald-700">
                                    Semua stok aman
                                </p>

                                <p class="mt-1 text-xs text-emerald-600">
                                    Tidak ada produk yang stoknya menipis.
                                </p>

                            </div>

                        @endforelse

                    </div>


                    <div class="border-t border-stone-100 p-6">

                        <div class="grid grid-cols-2 gap-3">

                            <div class="rounded-2xl bg-[#faf8f5] p-4">

                                <p class="text-xs text-stone-500">
                                    Total Produk
                                </p>

                                <p class="mt-2 text-xl font-bold text-stone-800">
                                    {{ $totalProducts }}
                                </p>

                            </div>


                            <div class="rounded-2xl bg-amber-50 p-4">

                                <p class="text-xs text-amber-600">
                                    Stok Menipis
                                </p>

                                <p class="mt-2 text-xl font-bold text-amber-700">
                                    {{ $lowStock }}
                                </p>

                            </div>


                            <div class="col-span-2 rounded-2xl bg-red-50 p-4">

                                <p class="text-xs text-red-500">
                                    Produk Habis
                                </p>

                                <p class="mt-2 text-xl font-bold text-red-700">
                                    {{ $outOfStock }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                TRANSAKSI TERBARU
            ====================================================== --}}

            <div
                class="mt-6 rounded-[24px] border border-stone-200/70 bg-white shadow-[0_15px_40px_rgba(80,60,40,0.05)]"
            >

                <div class="flex items-center justify-between border-b border-stone-100 p-6">

                    <div>

                        <h3 class="font-bold text-stone-800">
                            Transaksi Terbaru
                        </h3>

                        <p class="mt-1 text-xs text-stone-400">
                            Aktivitas transaksi terakhir
                        </p>

                    </div>


                    <a
                        href="{{ route('transactions.index') }}"
                        class="text-sm font-semibold text-stone-600 hover:text-stone-900"
                    >
                        Lihat Semua
                    </a>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full min-w-[650px] text-sm">

                        <thead class="bg-[#faf8f5]">

                            <tr class="border-b border-stone-100">

                                <th class="px-6 py-4 text-left font-semibold text-stone-500">
                                    Invoice
                                </th>

                                <th class="px-6 py-4 text-left font-semibold text-stone-500">
                                    Kasir
                                </th>

                                <th class="px-6 py-4 text-left font-semibold text-stone-500">
                                    Waktu
                                </th>

                                <th class="px-6 py-4 text-right font-semibold text-stone-500">
                                    Total
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-stone-100">

                            @forelse($recentTransactions as $transaction)

                                <tr class="transition hover:bg-[#fdfbf8]">

                                    <td class="px-6 py-4">

                                        <a
                                            href="{{ route('transactions.show', $transaction) }}"
                                            class="font-mono font-semibold text-stone-800 hover:underline"
                                        >
                                            {{ $transaction->invoice_number }}
                                        </a>

                                    </td>


                                    <td class="px-6 py-4 text-stone-600">
                                        {{ $transaction->user->name }}
                                    </td>


                                    <td class="px-6 py-4 text-stone-500">
                                        {{ $transaction->created_at->format('d M Y H:i') }}
                                    </td>


                                    <td class="px-6 py-4 text-right font-bold text-stone-800">
                                        Rp {{ number_format($transaction->total, 0, ',', '.') }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="4"
                                        class="px-6 py-12 text-center"
                                    >

                                        <p class="font-medium text-stone-600">
                                            Belum ada transaksi
                                        </p>

                                        <p class="mt-1 text-sm text-stone-400">
                                            Transaksi yang dibuat akan muncul di sini.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


            {{-- =====================================================
                PRODUK TERLARIS
            ====================================================== --}}

            <div
                class="mt-6 rounded-[24px] border border-stone-200/70 bg-white shadow-[0_15px_40px_rgba(80,60,40,0.05)]"
            >

                <div class="border-b border-stone-100 p-6">

                    <h3 class="font-bold text-stone-800">
                        Produk Terlaris
                    </h3>

                    <p class="mt-1 text-xs text-stone-400">
                        Berdasarkan penjualan 30 hari terakhir
                    </p>

                </div>


                <div class="grid grid-cols-1 divide-y divide-stone-100 sm:grid-cols-2 lg:grid-cols-5 lg:divide-x lg:divide-y-0">

                    @forelse($bestSellingProducts as $index => $item)

                        <div class="p-6">

                            <div class="flex items-center justify-between">

                                <span class="flex h-8 w-8 items-center justify-center rounded-xl bg-[#f4ede4] text-sm font-bold text-stone-700">
                                    {{ $index + 1 }}
                                </span>

                                <span class="text-xs text-stone-400">
                                    Terjual
                                </span>

                            </div>


                            <p class="mt-4 truncate font-semibold text-stone-800">
                                {{ $item->product->name ?? 'Produk' }}
                            </p>


                            <p class="mt-1 text-2xl font-bold text-stone-800">
                                {{ number_format($item->total_sold, 0, ',', '.') }}
                            </p>


                            <p class="text-xs text-stone-400">
                                item
                            </p>

                        </div>

                    @empty

                        <div class="p-8 text-center text-sm text-stone-400 sm:col-span-2 lg:col-span-5">
                            Belum ada data penjualan.
                        </div>

                    @endforelse

                </div>

            </div>


        </div>

    </div>

</x-app-layout>