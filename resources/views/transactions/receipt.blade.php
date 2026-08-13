<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Struk {{ $transaction->invoice_number }}
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        @media print {

            @page {
                size: 80mm auto;
                margin: 0;
            }

            body {
                margin: 0;
                padding: 0;
                background: white !important;
            }

            .no-print {
                display: none !important;
            }

            .receipt {
                width: 80mm !important;
                max-width: 80mm !important;
                box-shadow: none !important;
                border: none !important;
                border-radius: 0 !important;
                padding: 5mm !important;
            }

        }

    </style>

</head>


<body class="min-h-screen bg-[#f7f3ed] py-8">


    {{-- BUTTON --}}

    <div class="no-print mb-6 flex justify-center gap-3 px-4">

        <button
            onclick="window.print()"
            class="rounded-xl bg-stone-800 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-stone-700"
        >
            Cetak Struk
        </button>

        <button
            onclick="window.close()"
            class="rounded-xl border border-stone-200 bg-white px-6 py-3 font-semibold text-stone-700 shadow-sm transition hover:bg-stone-50"
        >
            Tutup
        </button>

    </div>


    {{-- RECEIPT --}}

    <div
        class="receipt mx-auto w-full max-w-[380px] rounded-2xl border border-stone-200 bg-white p-6 shadow-[0_20px_50px_rgba(80,60,40,0.10)]"
    >


        {{-- STORE HEADER --}}

        <div class="text-center">

            <h1 class="text-2xl font-black tracking-wide text-stone-800">
                KASIRKU
            </h1>

            <p class="mt-1 text-sm font-medium text-stone-600">
                Toko Serba Ada
            </p>

            <p class="mt-1 text-xs text-stone-400">
                Sistem Kasir Laravel
            </p>

        </div>


        {{-- DIVIDER --}}

        <div class="my-5 border-t border-dashed border-stone-300"></div>


        {{-- TRANSACTION INFO --}}

        <div class="space-y-1 text-xs text-stone-600">

            <div class="flex justify-between gap-4">

                <span>
                    Invoice
                </span>

                <span class="font-mono font-semibold text-stone-800">
                    {{ $transaction->invoice_number }}
                </span>

            </div>


            <div class="flex justify-between gap-4">

                <span>
                    Tanggal
                </span>

                <span class="text-right">
                    {{ $transaction->created_at->format('d/m/Y H:i') }}
                </span>

            </div>


            <div class="flex justify-between gap-4">

                <span>
                    Kasir
                </span>

                <span class="font-medium text-stone-800">
                    {{ $transaction->user->name }}
                </span>

            </div>

        </div>


        {{-- DIVIDER --}}

        <div class="my-5 border-t border-dashed border-stone-300"></div>


        {{-- ITEMS --}}

        <div class="space-y-4">

            @foreach($transaction->details as $detail)

                <div>

                    {{-- PRODUCT NAME --}}

                    <div class="font-semibold text-stone-800">

                        {{ $detail->product->name }}

                    </div>


                    {{-- PRODUCT CALCULATION --}}

                    <div class="mt-1 flex justify-between gap-3 text-xs text-stone-500">

                        <span>

                            {{ $detail->quantity }}
                            x
                            Rp {{ number_format($detail->price, 0, ',', '.') }}

                        </span>

                        <span class="font-semibold text-stone-800">

                            Rp {{ number_format($detail->subtotal, 0, ',', '.') }}

                        </span>

                    </div>

                </div>

            @endforeach

        </div>


        {{-- DIVIDER --}}

        <div class="my-5 border-t border-dashed border-stone-300"></div>


        {{-- SUMMARY --}}

        <div class="space-y-2 text-sm">

            {{-- TOTAL --}}

            <div class="flex justify-between">

                <span class="text-stone-600">
                    Total
                </span>

                <span class="font-bold text-stone-800">
                    Rp {{ number_format($transaction->total, 0, ',', '.') }}
                </span>

            </div>


            {{-- PAYMENT --}}

            <div class="flex justify-between">

                <span class="text-stone-600">
                    Bayar
                </span>

                <span class="font-medium text-stone-800">
                    Rp {{ number_format($transaction->payment, 0, ',', '.') }}
                </span>

            </div>


            {{-- CHANGE --}}

            <div class="flex justify-between">

                <span class="font-semibold text-stone-700">
                    Kembali
                </span>

                <span class="font-bold text-stone-800">
                    Rp {{ number_format($transaction->change, 0, ',', '.') }}
                </span>

            </div>

        </div>


        {{-- DIVIDER --}}

        <div class="my-5 border-t border-dashed border-stone-300"></div>


        {{-- FOOTER --}}

        <div class="text-center">

            <p class="text-sm font-semibold text-stone-800">
                Terima Kasih
            </p>

            <p class="mt-1 text-xs text-stone-500">
                Selamat berbelanja kembali!
            </p>

            <p class="mt-4 text-[10px] text-stone-400">
                Powered by Laravel
            </p>

        </div>

    </div>


    {{-- AUTO PRINT --}}

    <script>

        window.addEventListener('load', function () {

            // Jangan langsung print supaya browser
            // mempunyai waktu untuk menyelesaikan render.

            setTimeout(function () {

                window.print();

            }, 500);

        });

    </script>

</body>

</html>