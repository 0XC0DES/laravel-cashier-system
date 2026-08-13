<x-app-layout>

    <x-slot name="header">

        <div>
            <p class="text-sm text-stone-500">
                Riwayat penjualan toko
            </p>

            <h2 class="mt-1 text-2xl font-bold text-stone-800">
                Transaksi
            </h2>
        </div>

    </x-slot>


    <div class="min-h-screen bg-[#f7f3ed] py-8">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">


            {{-- =====================================================
                HEADER
            ====================================================== --}}

            <div class="mb-6">

                <div
                    class="rounded-[28px] border border-stone-200/70 bg-white p-6 shadow-[0_20px_60px_rgba(80,60,40,0.06)] sm:p-8"
                >

                    <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

                        <div>

                            <p class="text-sm font-medium text-stone-500">
                                Manajemen transaksi
                            </p>

                            <h1 class="mt-1 text-2xl font-bold text-stone-800">
                                Riwayat Transaksi
                            </h1>

                            <p class="mt-2 text-sm text-stone-400">
                                Lihat dan kelola seluruh transaksi penjualan.
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


            {{-- =====================================================
                SUCCESS / ERROR
            ====================================================== --}}

            @if(session('success'))

                <div
                    class="mb-6 flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-700"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="mt-0.5 h-5 w-5 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12l2 2 4-4"
                        />

                        <circle
                            cx="12"
                            cy="12"
                            r="9"
                        />
                    </svg>

                    <div>

                        <p class="text-sm font-semibold">
                            Berhasil
                        </p>

                        <p class="mt-0.5 text-sm">
                            {{ session('success') }}
                        </p>

                    </div>

                </div>

            @endif


            @if(session('error'))

                <div
                    class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-700"
                >
                    {{ session('error') }}
                </div>

            @endif


            {{-- =====================================================
                SEARCH
            ====================================================== --}}

            <div
                class="mb-6 rounded-[24px] border border-stone-200/70 bg-white p-5 shadow-[0_15px_40px_rgba(80,60,40,0.05)]"
            >

                <form
                    action="{{ route('transactions.index') }}"
                    method="GET"
                    class="flex flex-col gap-3 sm:flex-row"
                >

                    <div class="relative flex-1">

                        <div
                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-stone-400"
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
                                    d="m21 21-4.35-4.35m1.35-5.15a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"
                                />
                            </svg>

                        </div>


                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nomor invoice..."
                            class="w-full rounded-xl border-stone-200 bg-[#fdfbf8] py-3 pl-11 pr-4 text-sm text-stone-800 outline-none transition placeholder:text-stone-300 focus:border-stone-400 focus:ring-stone-400"
                        >

                    </div>


                    <button
                        type="submit"
                        class="rounded-xl bg-stone-800 px-6 py-3 text-sm font-semibold text-white transition hover:bg-stone-700"
                    >
                        Cari
                    </button>


                    @if(request('search'))

                        <a
                            href="{{ route('transactions.index') }}"
                            class="inline-flex items-center justify-center rounded-xl bg-[#f4ede4] px-6 py-3 text-sm font-semibold text-stone-600 transition hover:bg-stone-200"
                        >
                            Reset
                        </a>

                    @endif

                </form>

            </div>


            {{-- =====================================================
                TRANSACTION TABLE
            ====================================================== --}}

            <div
                class="overflow-hidden rounded-[24px] border border-stone-200/70 bg-white shadow-[0_15px_40px_rgba(80,60,40,0.05)]"
            >

                <div class="border-b border-stone-100 p-6">

                    <h3 class="font-bold text-stone-800">
                        Daftar Transaksi
                    </h3>

                    <p class="mt-1 text-xs text-stone-400">
                        {{ $transactions->total() }} transaksi ditemukan
                    </p>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full min-w-[800px] text-sm">

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


                                    {{-- Invoice --}}

                                    <td class="px-6 py-5">

                                        <a
                                            href="{{ route('transactions.show', $transaction) }}"
                                            class="font-mono text-sm font-semibold text-stone-800 hover:text-stone-500 hover:underline"
                                        >
                                            {{ $transaction->invoice_number }}
                                        </a>

                                    </td>


                                    {{-- Kasir --}}

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


                                    {{-- Date --}}

                                    <td class="px-6 py-5">

                                        <p class="font-medium text-stone-700">
                                            {{ $transaction->created_at->format('d M Y') }}
                                        </p>

                                        <p class="mt-1 text-xs text-stone-400">
                                            {{ $transaction->created_at->format('H:i') }} WIB
                                        </p>

                                    </td>


                                    {{-- Total --}}

                                    <td class="px-6 py-5 text-right">

                                        <span class="font-bold text-stone-800">
                                            Rp {{ number_format($transaction->total, 0, ',', '.') }}
                                        </span>

                                    </td>


                                    {{-- Actions --}}

                                    <td class="px-6 py-5">

                                        <div class="flex justify-end gap-2">

                                            <a
                                                href="{{ route('transactions.show', $transaction) }}"
                                                class="inline-flex h-9 items-center gap-2 rounded-xl bg-[#f4ede4] px-3 text-xs font-semibold text-stone-600 transition hover:bg-stone-800 hover:text-white"
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


                                            <a
                                                href="{{ route('transactions.receipt', $transaction) }}"
                                                target="_blank"
                                                class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-stone-800 text-white transition hover:bg-stone-600"
                                                title="Cetak Struk"
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
                                                        d="M6 9V3h12v6M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"
                                                    />

                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M6 14h12v7H6z"
                                                    />

                                                </svg>

                                            </a>

                                        </div>

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
                                                        d="M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"
                                                    />

                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M8 8h8M8 12h5"
                                                    />

                                                </svg>

                                            </div>

                                            <h3 class="mt-4 font-semibold text-stone-700">
                                                Belum ada transaksi
                                            </h3>

                                            <p class="mt-1 text-sm text-stone-400">
                                                Transaksi yang dibuat akan muncul di halaman ini.
                                            </p>


                                            <a
                                                href="{{ route('transactions.create') }}"
                                                class="mt-5 inline-flex items-center gap-2 rounded-xl bg-stone-800 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-stone-700"
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
                                                        d="M12 5v14M5 12h14"
                                                    />
                                                </svg>

                                                Buat Transaksi

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- Pagination --}}

                @if($transactions->hasPages())

                    <div class="border-t border-stone-100 p-5">

                        {{ $transactions->links() }}

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>