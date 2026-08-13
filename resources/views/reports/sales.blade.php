<x-app-layout>

    <x-slot name="header">

        <div>
            <p class="text-sm text-stone-500">
                Analisis performa penjualan
            </p>

            <h2 class="mt-1 text-2xl font-bold text-stone-800">
                Laporan Penjualan
            </h2>
        </div>

    </x-slot>


    <div class="min-h-screen bg-[#f7f3ed] py-8">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">


            {{-- =====================================================
                FILTER PERIODE
            ====================================================== --}}

            <div
                class="rounded-[28px] border border-stone-200/70 bg-white p-6 shadow-[0_20px_60px_rgba(80,60,40,0.06)] sm:p-8"
            >

                <div class="mb-6">

                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#f4ede4] text-stone-600"
                        >

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
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                />
                            </svg>

                        </div>

                        <div>

                            <h3 class="font-bold text-stone-800">
                                Filter Periode
                            </h3>

                            <p class="mt-0.5 text-sm text-stone-400">
                                Pilih periode untuk melihat laporan penjualan.
                            </p>

                        </div>

                    </div>

                </div>


                <form
                    action="{{ route('reports.sales') }}"
                    method="GET"
                >

                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-3">


                        {{-- TANGGAL MULAI --}}

                        <div>

                            <label
                                for="start_date"
                                class="mb-2 block text-sm font-semibold text-stone-600"
                            >
                                Tanggal Mulai
                            </label>

                            <input
                                type="date"
                                id="start_date"
                                name="start_date"
                                value="{{ $startDate }}"
                                class="w-full rounded-xl border-stone-200 bg-[#fdfbf8] px-4 py-3 text-sm text-stone-700 shadow-sm outline-none transition focus:border-stone-400 focus:ring-stone-400"
                            >

                        </div>


                        {{-- TANGGAL AKHIR --}}

                        <div>

                            <label
                                for="end_date"
                                class="mb-2 block text-sm font-semibold text-stone-600"
                            >
                                Tanggal Akhir
                            </label>

                            <input
                                type="date"
                                id="end_date"
                                name="end_date"
                                value="{{ $endDate }}"
                                class="w-full rounded-xl border-stone-200 bg-[#fdfbf8] px-4 py-3 text-sm text-stone-700 shadow-sm outline-none transition focus:border-stone-400 focus:ring-stone-400"
                            >

                        </div>


                        {{-- BUTTON --}}

                        <div class="flex items-end gap-2">

                            <button
                                type="submit"
                                class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-stone-800 px-5 py-3 text-sm font-semibold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-stone-700"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M21 21l-4.35-4.35m1.35-5.15a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"
                                    />
                                </svg>

                                Filter

                            </button>


                            <a
                                href="{{ route('reports.sales') }}"
                                class="inline-flex items-center justify-center rounded-xl bg-[#f4ede4] px-5 py-3 text-sm font-semibold text-stone-600 transition hover:bg-stone-200"
                            >
                                Reset
                            </a>

                        </div>

                    </div>


                    {{-- EXPORT --}}

                    <div class="mt-5 border-t border-stone-100 pt-5">

                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                            <p class="text-xs text-stone-400">
                                Periode:
                                <span class="font-semibold text-stone-600">
                                    {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }}
                                </span>

                                sampai

                                <span class="font-semibold text-stone-600">
                                    {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}
                                </span>
                            </p>


                            <a
                                href="{{ route('reports.sales.export', [
                                    'start_date' => $startDate,
                                    'end_date' => $endDate,
                                ]) }}"
                                class="inline-flex items-center justify-center gap-2 rounded-xl border border-stone-200 bg-[#fdfbf8] px-4 py-2.5 text-sm font-semibold text-stone-600 transition hover:border-stone-300 hover:bg-[#f4ede4]"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.7"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 3v12m0 0l4-4m-4 4l-4-4M5 21h14"
                                    />
                                </svg>

                                Export CSV

                            </a>

                        </div>

                    </div>

                </form>

            </div>


            {{-- =====================================================
                STATISTICS
            ====================================================== --}}

            <div class="mt-6 grid grid-cols-1 gap-5 md:grid-cols-3">


                {{-- TOTAL PENJUALAN --}}

                <div
                    class="group rounded-[24px] border border-stone-200/70 bg-white p-6 shadow-[0_15px_40px_rgba(80,60,40,0.05)] transition duration-200 hover:-translate-y-1"
                >

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-stone-400">
                                Total Penjualan
                            </p>

                            <p class="mt-2 text-2xl font-bold tracking-tight text-stone-800">
                                Rp {{ number_format($totalSales, 0, ',', '.') }}
                            </p>

                        </div>


                        <div
                            class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#f4ede4] text-stone-600"
                        >

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
                                    d="M12 8c-1.657 0-3 1.12-3 2.5S10.343 13 12 13s3 1.12 3 2.5S13.657 18 12 18m0-10V6m0 12v-2M5 12a7 7 0 1014 0 7 7 0 00-14 0z"
                                />
                            </svg>

                        </div>

                    </div>

                    <div class="mt-5 h-1 rounded-full bg-[#f4ede4]"></div>

                </div>


                {{-- TOTAL TRANSAKSI --}}

                <div
                    class="group rounded-[24px] border border-stone-200/70 bg-white p-6 shadow-[0_15px_40px_rgba(80,60,40,0.05)] transition duration-200 hover:-translate-y-1"
                >

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-stone-400">
                                Total Transaksi
                            </p>

                            <p class="mt-2 text-2xl font-bold tracking-tight text-stone-800">
                                {{ number_format($totalTransactions) }}
                            </p>

                        </div>


                        <div
                            class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#f4ede4] text-stone-600"
                        >

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
                                    d="M8 6h8M8 10h8M8 14h5M6 3h12a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2z"
                                />
                            </svg>

                        </div>

                    </div>

                    <div class="mt-5 h-1 rounded-full bg-[#f4ede4]"></div>

                </div>


                {{-- PRODUK TERJUAL --}}

                <div
                    class="group rounded-[24px] border border-stone-200/70 bg-white p-6 shadow-[0_15px_40px_rgba(80,60,40,0.05)] transition duration-200 hover:-translate-y-1"
                >

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-stone-400">
                                Produk Terjual
                            </p>

                            <p class="mt-2 text-2xl font-bold tracking-tight text-stone-800">
                                {{ number_format($totalProducts) }}
                            </p>

                        </div>


                        <div
                            class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#f4ede4] text-stone-600"
                        >

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
                                    d="M4 7h16l-1 13H5L4 7z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8 7a4 4 0 018 0"
                                />
                            </svg>

                        </div>

                    </div>

                    <div class="mt-5 h-1 rounded-full bg-[#f4ede4]"></div>

                </div>

            </div>


            {{-- =====================================================
                TRANSACTIONS
            ====================================================== --}}

            <div
                class="mt-6 overflow-hidden rounded-[28px] border border-stone-200/70 bg-white shadow-[0_20px_60px_rgba(80,60,40,0.06)]"
            >

                <div class="border-b border-stone-100 p-6 sm:p-7">

                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#f4ede4] text-stone-600"
                                >

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
                                            d="M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M8 8h8M8 12h5"
                                        />

                                    </svg>

                                </div>


                                <div>

                                    <h3 class="text-lg font-bold text-stone-800">
                                        Daftar Transaksi
                                    </h3>

                                    <p class="mt-0.5 text-sm text-stone-400">
                                        {{ $startDate }} sampai {{ $endDate }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        <div class="text-sm text-stone-400">

                            <span class="font-semibold text-stone-700">
                                {{ $transactions->total() }}
                            </span>

                            transaksi

                        </div>

                    </div>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full min-w-[750px] text-sm">

                        <thead class="bg-[#faf8f5]">

                            <tr class="border-b border-stone-100">

                                <th class="px-6 py-4 text-left font-semibold text-stone-500">
                                    Invoice
                                </th>

                                <th class="px-6 py-4 text-left font-semibold text-stone-500">
                                    Kasir
                                </th>

                                <th class="px-6 py-4 text-left font-semibold text-stone-500">
                                    Tanggal
                                </th>

                                <th class="px-6 py-4 text-right font-semibold text-stone-500">
                                    Total
                                </th>

                                <th class="px-6 py-4 text-right font-semibold text-stone-500">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-stone-100">

                            @forelse($transactions as $transaction)

                                <tr class="transition duration-200 hover:bg-[#fdfbf8]">


                                    {{-- INVOICE --}}

                                    <td class="px-6 py-5">

                                        <span
                                            class="font-mono text-sm font-semibold text-stone-800"
                                        >
                                            {{ $transaction->invoice_number }}
                                        </span>

                                    </td>


                                    {{-- KASIR --}}

                                    <td class="px-6 py-5">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#f4ede4] text-xs font-bold text-stone-600"
                                            >
                                                {{ strtoupper(substr($transaction->user->name, 0, 1)) }}
                                            </div>

                                            <span class="font-medium text-stone-700">
                                                {{ $transaction->user->name }}
                                            </span>

                                        </div>

                                    </td>


                                    {{-- TANGGAL --}}

                                    <td class="px-6 py-5">

                                        <p class="font-medium text-stone-700">
                                            {{ $transaction->created_at->format('d M Y') }}
                                        </p>

                                        <p class="mt-1 text-xs text-stone-400">
                                            {{ $transaction->created_at->format('H:i') }}
                                        </p>

                                    </td>


                                    {{-- TOTAL --}}

                                    <td class="px-6 py-5 text-right">

                                        <span class="font-bold text-stone-800">
                                            Rp {{ number_format($transaction->total, 0, ',', '.') }}
                                        </span>

                                    </td>


                                    {{-- ACTION --}}

                                    <td class="px-6 py-5 text-right">

                                        <a
                                            href="{{ route('transactions.show', $transaction) }}"
                                            class="inline-flex items-center gap-2 rounded-xl bg-[#f4ede4] px-3.5 py-2 text-xs font-semibold text-stone-600 transition hover:bg-stone-800 hover:text-white"
                                        >

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.7"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6z"
                                                />

                                                <circle
                                                    cx="12"
                                                    cy="12"
                                                    r="2.5"
                                                />
                                            </svg>

                                            Detail

                                        </a>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td
                                        colspan="5"
                                        class="px-6 py-16 text-center"
                                    >

                                        <div class="mx-auto max-w-sm">

                                            <div
                                                class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-[#f4ede4] text-stone-500"
                                            >

                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-7 w-7"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 01 2-2z"
                                                    />

                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M8 8h8M8 12h5"
                                                    />

                                                </svg>

                                            </div>

                                            <h3 class="mt-4 font-semibold text-stone-700">
                                                Tidak ada transaksi
                                            </h3>

                                            <p class="mt-1 text-sm text-stone-400">
                                                Tidak ada transaksi pada periode tersebut.
                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- PAGINATION --}}

                @if($transactions->hasPages())

                    <div class="border-t border-stone-100 p-5">

                        {{ $transactions->links() }}

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>