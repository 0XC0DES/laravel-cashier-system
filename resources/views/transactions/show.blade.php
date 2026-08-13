<x-app-layout>

    <x-slot name="header">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>
                <p class="text-sm text-stone-500">
                    Detail Transaksi
                </p>

                <h2 class="text-2xl font-bold text-stone-800">
                    {{ $transaction->invoice_number }}
                </h2>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">

                <a
                    href="{{ route('transactions.receipt', $transaction) }}"
                    target="_blank"
                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-stone-800 text-white rounded-xl font-medium hover:bg-stone-700 transition shadow-sm"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 9V4h12v5M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2M6 14h12v6H6v-6z"
                        />
                    </svg>

                    Cetak Struk
                </a>

                <a
                    href="{{ route('transactions.index') }}"
                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white border border-stone-200 text-stone-700 rounded-xl font-medium hover:bg-stone-50 transition"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 19l-7-7 7-7"
                        />
                    </svg>

                    Kembali
                </a>

            </div>

        </div>

    </x-slot>


    <div class="min-h-screen bg-[#f7f3ed] py-8">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- SUCCESS MESSAGE --}}

            @if(session('success'))

                <div class="mb-6 flex items-center gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-emerald-700">

                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-emerald-100">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>

                    </div>

                    <div>
                        <p class="font-semibold">
                            Transaksi berhasil
                        </p>

                        <p class="text-sm text-emerald-600">
                            {{ session('success') }}
                        </p>
                    </div>

                </div>

            @endif


            {{-- MAIN CARD --}}

            <div class="overflow-hidden rounded-[28px] border border-stone-200/70 bg-white shadow-[0_20px_60px_rgba(80,60,40,0.08)]">


                {{-- TRANSACTION HEADER --}}

                <div class="border-b border-stone-100 p-6 sm:p-8">

                    <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">

                        <div class="flex items-center gap-4">

                            {{-- Invoice Icon --}}

                            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-[#f4ede4] text-stone-700">

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
                                        d="M9 14.25l6-6m-5.25-.75h.008v.008H9.75V7.5zm4.5 9h.008v.008h-.008V16.5z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M7.5 3h9A2.5 2.5 0 0119 5.5v13a2.5 2.5 0 01-2.5 2.5h-9A2.5 2.5 0 015 18.5v-13A2.5 2.5 0 017.5 3z"
                                    />
                                </svg>

                            </div>


                            <div>

                                <p class="text-sm text-stone-500">
                                    Nomor Invoice
                                </p>

                                <h3 class="mt-1 font-mono text-lg font-bold tracking-wide text-stone-800 sm:text-xl">
                                    {{ $transaction->invoice_number }}
                                </h3>

                            </div>

                        </div>


                        {{-- DATE & CASHIER --}}

                        <div class="rounded-2xl bg-[#faf8f5] px-5 py-4 sm:min-w-[240px]">

                            <div class="flex items-center justify-between gap-6">

                                <span class="text-sm text-stone-500">
                                    Kasir
                                </span>

                                <span class="text-sm font-semibold text-stone-800">
                                    {{ $transaction->user->name }}
                                </span>

                            </div>

                            <div class="mt-2 flex items-center justify-between gap-6">

                                <span class="text-sm text-stone-500">
                                    Waktu
                                </span>

                                <span class="text-sm font-medium text-stone-700">
                                    {{ $transaction->created_at->format('d M Y, H:i') }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ITEMS --}}

                <div class="p-6 sm:p-8">

                    <div class="mb-5">

                        <h3 class="text-lg font-bold text-stone-800">
                            Detail Produk
                        </h3>

                        <p class="mt-1 text-sm text-stone-500">
                            Daftar produk yang dibeli dalam transaksi ini.
                        </p>

                    </div>


                    <div class="overflow-hidden rounded-2xl border border-stone-200">

                        <div class="overflow-x-auto">

                            <table class="w-full min-w-[650px] text-sm">

                                <thead class="bg-[#faf8f5]">

                                    <tr class="border-b border-stone-200">

                                        <th class="px-5 py-4 text-left font-semibold text-stone-600">
                                            Produk
                                        </th>

                                        <th class="px-5 py-4 text-center font-semibold text-stone-600">
                                            Qty
                                        </th>

                                        <th class="px-5 py-4 text-right font-semibold text-stone-600">
                                            Harga
                                        </th>

                                        <th class="px-5 py-4 text-right font-semibold text-stone-600">
                                            Subtotal
                                        </th>

                                    </tr>

                                </thead>


                                <tbody class="divide-y divide-stone-100 bg-white">

                                    @foreach($transaction->details as $detail)

                                        <tr class="transition hover:bg-[#fdfbf8]">

                                            {{-- PRODUCT --}}

                                            <td class="px-5 py-4">

                                                <div class="flex items-center gap-3">

                                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#f4ede4] text-sm font-bold text-stone-600">

                                                        {{ strtoupper(substr($detail->product->name, 0, 1)) }}

                                                    </div>

                                                    <div>

                                                        <p class="font-semibold text-stone-800">
                                                            {{ $detail->product->name }}
                                                        </p>

                                                        <p class="mt-0.5 text-xs text-stone-400">
                                                            SKU: {{ $detail->product->sku }}
                                                        </p>

                                                    </div>

                                                </div>

                                            </td>


                                            {{-- QUANTITY --}}

                                            <td class="px-5 py-4 text-center">

                                                <span class="inline-flex min-w-9 items-center justify-center rounded-lg bg-stone-100 px-2.5 py-1 font-semibold text-stone-700">
                                                    {{ $detail->quantity }}
                                                </span>

                                            </td>


                                            {{-- PRICE --}}

                                            <td class="px-5 py-4 text-right font-medium text-stone-600">

                                                Rp {{ number_format($detail->price, 0, ',', '.') }}

                                            </td>


                                            {{-- SUBTOTAL --}}

                                            <td class="px-5 py-4 text-right font-bold text-stone-800">

                                                Rp {{ number_format($detail->subtotal, 0, ',', '.') }}

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>


                {{-- SUMMARY --}}

                <div class="border-t border-stone-100 bg-[#faf8f5] p-6 sm:p-8">

                    <div class="ml-auto max-w-md">

                        <div class="rounded-2xl border border-stone-200 bg-white p-5 shadow-sm">

                            {{-- TOTAL --}}

                            <div class="flex items-center justify-between">

                                <span class="text-sm text-stone-500">
                                    Total Belanja
                                </span>

                                <span class="text-lg font-bold text-stone-800">
                                    Rp {{ number_format($transaction->total, 0, ',', '.') }}
                                </span>

                            </div>


                            {{-- PAYMENT --}}

                            <div class="mt-4 flex items-center justify-between">

                                <span class="text-sm text-stone-500">
                                    Pembayaran
                                </span>

                                <span class="font-medium text-stone-700">
                                    Rp {{ number_format($transaction->payment, 0, ',', '.') }}
                                </span>

                            </div>


                            {{-- DIVIDER --}}

                            <div class="my-4 border-t border-dashed border-stone-200"></div>


                            {{-- CHANGE --}}

                            <div class="flex items-center justify-between">

                                <div>

                                    <p class="text-sm text-stone-500">
                                        Kembalian
                                    </p>

                                    <p class="mt-0.5 text-xs text-stone-400">
                                        Uang yang harus dikembalikan
                                    </p>

                                </div>

                                <span class="text-xl font-bold text-emerald-600">
                                    Rp {{ number_format($transaction->change, 0, ',', '.') }}
                                </span>

                            </div>

                        </div>


                        {{-- STATUS --}}

                        <div class="mt-4 flex items-center justify-center gap-2 rounded-xl bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">

                            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                            Transaksi berhasil

                        </div>

                    </div>

                </div>

            </div>


            {{-- BOTTOM ACTION --}}

            <div class="mt-6 flex justify-center">

                <a
                    href="{{ route('transactions.create') }}"
                    class="inline-flex items-center gap-2 rounded-xl bg-stone-800 px-6 py-3 font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-stone-700"
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

                    Buat Transaksi Baru

                </a>

            </div>

        </div>

    </div>

</x-app-layout>