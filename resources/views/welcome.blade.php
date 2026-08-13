<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KasirKu — Sistem Kasir Modern</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-[#F7F3EA] text-[#292722] antialiased">

    {{-- ========================================================= --}}
    {{-- NAVBAR --}}
    {{-- ========================================================= --}}

    <header class="fixed top-5 left-0 right-0 z-50 px-4">

        <nav
            class="max-w-6xl mx-auto
                   bg-[#FFFDF8]/90 backdrop-blur-xl
                   border border-[#E8E1D5]
                   shadow-[0_10px_35px_rgba(70,60,45,0.08)]
                   rounded-2xl
                   px-5 py-3"
        >

            <div class="flex items-center justify-between">

                {{-- LOGO --}}

                <a
                    href="{{ url('/') }}"
                    class="flex items-center gap-3"
                >

                    <div
                        class="w-10 h-10 rounded-xl
                               bg-[#292722]
                               text-white
                               flex items-center justify-center
                               font-bold"
                    >
                        K
                    </div>

                    <div>

                        <div class="font-bold text-lg leading-none">
                            KasirKu
                        </div>

                        <div class="text-[11px] text-[#8B857B] mt-1">
                            Sistem Kasir
                        </div>

                    </div>

                </a>


                {{-- NAVIGATION --}}

                <div class="hidden md:flex items-center gap-7 text-sm">

                    <a
                        href="#fitur"
                        class="text-[#716C64] hover:text-[#292722] transition"
                    >
                        Fitur
                    </a>

                    <a
                        href="#tentang"
                        class="text-[#716C64] hover:text-[#292722] transition"
                    >
                        Tentang
                    </a>

                </div>


                {{-- AUTH --}}

                <div class="flex items-center gap-2">

                    @auth

                        <a
                            href="{{ route('dashboard') }}"
                            class="px-4 py-2.5
                                   bg-[#292722]
                                   text-white
                                   rounded-xl
                                   text-sm font-medium
                                   hover:bg-[#403D37]
                                   transition"
                        >
                            Dashboard
                        </a>

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="hidden sm:block
                                   px-4 py-2.5
                                   text-sm font-medium
                                   text-[#625E57]
                                   hover:text-[#292722]
                                   transition"
                        >
                            Masuk
                        </a>

                        <a
                            href="{{ route('register') }}"
                            class="px-4 py-2.5
                                   bg-[#292722]
                                   text-white
                                   rounded-xl
                                   text-sm font-medium
                                   hover:bg-[#403D37]
                                   transition"
                        >
                            Mulai Sekarang
                        </a>

                    @endauth

                </div>

            </div>

        </nav>

    </header>


    {{-- ========================================================= --}}
    {{-- HERO --}}
    {{-- ========================================================= --}}

    <main>

        <section
            class="min-h-screen
                   pt-36 pb-20
                   px-4
                   flex items-center"
        >

            <div
                class="max-w-6xl
                       mx-auto
                       w-full
                       grid lg:grid-cols-2
                       gap-14
                       items-center"
            >

                {{-- LEFT --}}

                <div>

                    <div
                        class="inline-flex items-center gap-2
                               px-3 py-1.5
                               bg-[#EFE8DC]
                               border border-[#E3D9C9]
                               rounded-full
                               text-xs font-medium
                               text-[#766D60]
                               mb-6"
                    >

                        <span
                            class="w-2 h-2
                                   rounded-full
                                   bg-[#8B7355]"
                        ></span>

                        Sistem Kasir Modern

                    </div>


                    <h1
                        class="text-5xl sm:text-6xl lg:text-7xl
                               font-bold
                               tracking-tight
                               leading-[1.05]"
                    >

                        Kelola Bisnis

                        <span class="block text-[#8B7355]">
                            Lebih Mudah.
                        </span>

                    </h1>


                    <p
                        class="mt-6
                               text-lg
                               leading-8
                               text-[#716C64]
                               max-w-xl"
                    >

                        KasirKu membantu Anda mengelola produk,
                        stok, transaksi, pembayaran, dan laporan
                        penjualan dalam satu sistem yang sederhana.

                    </p>


                    <div
                        class="mt-8
                               flex flex-col sm:flex-row
                               gap-3"
                    >

                        @auth

                            <a
                                href="{{ route('dashboard') }}"
                                class="inline-flex items-center justify-center
                                       px-6 py-3.5
                                       bg-[#292722]
                                       text-white
                                       rounded-xl
                                       font-medium
                                       hover:bg-[#403D37]
                                       transition"
                            >
                                Buka Dashboard

                                <span class="ml-2">
                                    →
                                </span>

                            </a>

                        @else

                            <a
                                href="{{ route('register') }}"
                                class="inline-flex items-center justify-center
                                       px-6 py-3.5
                                       bg-[#292722]
                                       text-white
                                       rounded-xl
                                       font-medium
                                       hover:bg-[#403D37]
                                       transition"
                            >
                                Mulai Menggunakan

                                <span class="ml-2">
                                    →
                                </span>

                            </a>

                            <a
                                href="{{ route('login') }}"
                                class="inline-flex items-center justify-center
                                       px-6 py-3.5
                                       bg-[#FFFDF8]
                                       border border-[#DED6C9]
                                       text-[#49453F]
                                       rounded-xl
                                       font-medium
                                       hover:bg-white
                                       transition"
                            >
                                Saya Sudah Punya Akun
                            </a>

                        @endauth

                    </div>


                    {{-- TRUST --}}

                    <div
                        class="mt-8
                               flex flex-wrap
                               items-center
                               gap-x-6 gap-y-3
                               text-sm
                               text-[#8A847A]"
                    >

                        <div class="flex items-center gap-2">

                            <span class="text-[#8B7355]">
                                ✓
                            </span>

                            Manajemen Produk

                        </div>

                        <div class="flex items-center gap-2">

                            <span class="text-[#8B7355]">
                                ✓
                            </span>

                            Transaksi Cepat

                        </div>

                        <div class="flex items-center gap-2">

                            <span class="text-[#8B7355]">
                                ✓
                            </span>

                            Laporan Penjualan

                        </div>

                    </div>

                </div>


                {{-- RIGHT : DASHBOARD PREVIEW --}}

                <div class="relative">

                    {{-- Background decoration --}}

                    <div
                        class="absolute
                               -top-10
                               -right-10
                               w-40 h-40
                               bg-[#E8DDCC]
                               rounded-full
                               blur-3xl
                               opacity-60"
                    ></div>

                    <div
                        class="absolute
                               -bottom-10
                               -left-10
                               w-40 h-40
                               bg-[#E4D7C4]
                               rounded-full
                               blur-3xl
                               opacity-50"
                    ></div>


                    {{-- Dashboard Card --}}

                    <div
                        class="relative
                               bg-[#FFFDF8]
                               border border-[#E4DDD2]
                               rounded-[2rem]
                               shadow-[0_30px_80px_rgba(70,60,45,0.12)]
                               p-5
                               rotate-1
                               hover:rotate-0
                               transition
                               duration-500"
                    >

                        {{-- Fake browser header --}}

                        <div
                            class="flex items-center justify-between
                                   pb-4
                                   border-b border-[#EEE7DC]"
                        >

                            <div class="flex gap-1.5">

                                <span
                                    class="w-2.5 h-2.5 rounded-full
                                           bg-[#D8CFC1]"
                                ></span>

                                <span
                                    class="w-2.5 h-2.5 rounded-full
                                           bg-[#D8CFC1]"
                                ></span>

                                <span
                                    class="w-2.5 h-2.5 rounded-full
                                           bg-[#D8CFC1]"
                                ></span>

                            </div>

                            <span
                                class="text-xs
                                       text-[#9A948A]"
                            >
                                KasirKu Dashboard
                            </span>

                        </div>


                        {{-- Dashboard --}}

                        <div class="pt-5">

                            <div
                                class="flex items-center justify-between"
                            >

                                <div>

                                    <p
                                        class="text-xs
                                               text-[#938D83]"
                                    >
                                        Penjualan Hari Ini
                                    </p>

                                    <p
                                        class="text-2xl
                                               font-bold
                                               mt-1"
                                    >
                                        Rp 2.450.000
                                    </p>

                                </div>

                                <div
                                    class="w-10 h-10
                                           rounded-xl
                                           bg-[#EFE8DC]
                                           flex items-center
                                           justify-center
                                           text-[#8B7355]"
                                >
                                    ↗
                                </div>

                            </div>


                            {{-- Stats --}}

                            <div
                                class="grid grid-cols-2
                                       gap-3
                                       mt-5"
                            >

                                <div
                                    class="p-4
                                           rounded-2xl
                                           bg-[#F7F3EA]"
                                >

                                    <p
                                        class="text-xs
                                               text-[#918B81]"
                                    >
                                        Transaksi
                                    </p>

                                    <p
                                        class="text-xl
                                               font-bold
                                               mt-1"
                                    >
                                        128
                                    </p>

                                </div>


                                <div
                                    class="p-4
                                           rounded-2xl
                                           bg-[#F7F3EA]"
                                >

                                    <p
                                        class="text-xs
                                               text-[#918B81]"
                                    >
                                        Produk Terjual
                                    </p>

                                    <p
                                        class="text-xl
                                               font-bold
                                               mt-1"
                                    >
                                        342
                                    </p>

                                </div>

                            </div>


                            {{-- Chart --}}

                            <div
                                class="mt-4
                                       p-4
                                       rounded-2xl
                                       border border-[#EEE7DC]"
                            >

                                <div
                                    class="flex
                                           items-center
                                           justify-between
                                           mb-5"
                                >

                                    <p class="text-sm font-semibold">
                                        Penjualan
                                    </p>

                                    <span
                                        class="text-xs
                                               text-[#948D83]"
                                    >
                                        7 Hari
                                    </span>

                                </div>


                                <div
                                    class="flex
                                           items-end
                                           justify-between
                                           gap-2
                                           h-28"
                                >

                                    <div
                                        class="w-full
                                               bg-[#DCD2C2]
                                               rounded-t-lg
                                               h-[35%]"
                                    ></div>

                                    <div
                                        class="w-full
                                               bg-[#DCD2C2]
                                               rounded-t-lg
                                               h-[50%]"
                                    ></div>

                                    <div
                                        class="w-full
                                               bg-[#DCD2C2]
                                               rounded-t-lg
                                               h-[42%]"
                                    ></div>

                                    <div
                                        class="w-full
                                               bg-[#DCD2C2]
                                               rounded-t-lg
                                               h-[68%]"
                                    ></div>

                                    <div
                                        class="w-full
                                               bg-[#B7A58B]
                                               rounded-t-lg
                                               h-[85%]"
                                    ></div>

                                    <div
                                        class="w-full
                                               bg-[#8B7355]
                                               rounded-t-lg
                                               h-[100%]"
                                    ></div>

                                    <div
                                        class="w-full
                                               bg-[#DCD2C2]
                                               rounded-t-lg
                                               h-[72%]"
                                    ></div>

                                </div>

                            </div>


                            {{-- Recent transaction --}}

                            <div class="mt-4">

                                <div
                                    class="flex
                                           items-center
                                           justify-between
                                           mb-3"
                                >

                                    <p class="text-sm font-semibold">
                                        Transaksi Terbaru
                                    </p>

                                    <span
                                        class="text-xs
                                               text-[#8B7355]"
                                    >
                                        Lihat Semua
                                    </span>

                                </div>


                                <div
                                    class="flex
                                           items-center
                                           justify-between
                                           py-3
                                           border-b border-[#F0EAE1]"
                                >

                                    <div>

                                        <p class="text-sm font-medium">
                                            TRX-20260813-0128
                                        </p>

                                        <p
                                            class="text-xs
                                                   text-[#999289]
                                                   mt-1"
                                        >
                                            13 Agustus 2026
                                        </p>

                                    </div>

                                    <p
                                        class="text-sm
                                               font-semibold"
                                    >
                                        Rp 185.000
                                    </p>

                                </div>


                                <div
                                    class="flex
                                           items-center
                                           justify-between
                                           py-3"
                                >

                                    <div>

                                        <p class="text-sm font-medium">
                                            TRX-20260813-0127
                                        </p>

                                        <p
                                            class="text-xs
                                                   text-[#999289]
                                                   mt-1"
                                        >
                                            13 Agustus 2026
                                        </p>

                                    </div>

                                    <p
                                        class="text-sm
                                               font-semibold"
                                    >
                                        Rp 95.000
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- ========================================================= --}}
        {{-- FEATURES --}}
        {{-- ========================================================= --}}

        <section
            id="fitur"
            class="py-24 px-4 bg-[#FFFDF8]"
        >

            <div class="max-w-6xl mx-auto">

                <div class="max-w-2xl">

                    <p
                        class="text-sm
                               font-semibold
                               text-[#8B7355]"
                    >
                        FITUR UTAMA
                    </p>

                    <h2
                        class="text-3xl
                               sm:text-4xl
                               font-bold
                               mt-3"
                    >
                        Semua yang dibutuhkan
                        untuk mengelola kasir.
                    </h2>

                    <p
                        class="text-[#787269]
                               mt-4
                               leading-7"
                    >
                        KasirKu dibuat untuk membantu proses
                        operasional menjadi lebih sederhana,
                        cepat, dan terorganisir.
                    </p>

                </div>


                <div
                    class="grid
                           sm:grid-cols-2
                           lg:grid-cols-3
                           gap-5
                           mt-12"
                >

                    {{-- Feature 1 --}}

                    <div
                        class="p-6
                               rounded-2xl
                               bg-[#F7F3EA]
                               border border-[#EAE2D6]"
                    >

                        <div
                            class="w-11 h-11
                                   rounded-xl
                                   bg-[#E8DDCC]
                                   flex items-center
                                   justify-center
                                   text-[#765F43]
                                   text-lg"
                        >
                            ◫
                        </div>

                        <h3
                            class="font-semibold
                                   text-lg
                                   mt-5"
                        >
                            Manajemen Produk
                        </h3>

                        <p
                            class="text-sm
                                   text-[#7F7970]
                                   leading-6
                                   mt-2"
                        >
                            Kelola produk, kategori, harga,
                            SKU, dan stok dengan mudah.
                        </p>

                    </div>


                    {{-- Feature 2 --}}

                    <div
                        class="p-6
                               rounded-2xl
                               bg-[#F7F3EA]
                               border border-[#EAE2D6]"
                    >

                        <div
                            class="w-11 h-11
                                   rounded-xl
                                   bg-[#E8DDCC]
                                   flex items-center
                                   justify-center
                                   text-[#765F43]
                                   text-lg"
                        >
                            +
                        </div>

                        <h3
                            class="font-semibold
                                   text-lg
                                   mt-5"
                        >
                            Transaksi Cepat
                        </h3>

                        <p
                            class="text-sm
                                   text-[#7F7970]
                                   leading-6
                                   mt-2"
                        >
                            Proses transaksi dengan perhitungan
                            total dan kembalian otomatis.
                        </p>

                    </div>


                    {{-- Feature 3 --}}

                    <div
                        class="p-6
                               rounded-2xl
                               bg-[#F7F3EA]
                               border border-[#EAE2D6]"
                    >

                        <div
                            class="w-11 h-11
                                   rounded-xl
                                   bg-[#E8DDCC]
                                   flex items-center
                                   justify-center
                                   text-[#765F43]
                                   text-lg"
                        >
                            ↗
                        </div>

                        <h3
                            class="font-semibold
                                   text-lg
                                   mt-5"
                        >
                            Laporan Penjualan
                        </h3>

                        <p
                            class="text-sm
                                   text-[#7F7970]
                                   leading-6
                                   mt-2"
                        >
                            Pantau penjualan berdasarkan periode
                            dan export laporan ke CSV.
                        </p>

                    </div>


                    {{-- Feature 4 --}}

                    <div
                        class="p-6
                               rounded-2xl
                               bg-[#F7F3EA]
                               border border-[#EAE2D6]"
                    >

                        <div
                            class="w-11 h-11
                                   rounded-xl
                                   bg-[#E8DDCC]
                                   flex items-center
                                   justify-center
                                   text-[#765F43]
                                   text-lg"
                        >
                            #
                        </div>

                        <h3
                            class="font-semibold
                                   text-lg
                                   mt-5"
                        >
                            Stok Otomatis
                        </h3>

                        <p
                            class="text-sm
                                   text-[#7F7970]
                                   leading-6
                                   mt-2"
                        >
                            Stok produk otomatis berkurang
                            ketika transaksi berhasil.
                        </p>

                    </div>


                    {{-- Feature 5 --}}

                    <div
                        class="p-6
                               rounded-2xl
                               bg-[#F7F3EA]
                               border border-[#EAE2D6]"
                    >

                        <div
                            class="w-11 h-11
                                   rounded-xl
                                   bg-[#E8DDCC]
                                   flex items-center
                                   justify-center
                                   text-[#765F43]
                                   text-lg"
                        >
                            ✓
                        </div>

                        <h3
                            class="font-semibold
                                   text-lg
                                   mt-5"
                        >
                            Authentication
                        </h3>

                        <p
                            class="text-sm
                                   text-[#7F7970]
                                   leading-6
                                   mt-2"
                        >
                            Sistem login dan register untuk
                            menjaga akses aplikasi.
                        </p>

                    </div>


                    {{-- Feature 6 --}}

                    <div
                        class="p-6
                               rounded-2xl
                               bg-[#F7F3EA]
                               border border-[#EAE2D6]"
                    >

                        <div
                            class="w-11 h-11
                                   rounded-xl
                                   bg-[#E8DDCC]
                                   flex items-center
                                   justify-center
                                   text-[#765F43]
                                   text-lg"
                        >
                            ▣
                        </div>

                        <h3
                            class="font-semibold
                                   text-lg
                                   mt-5"
                        >
                            Cetak Struk
                        </h3>

                        <p
                            class="text-sm
                                   text-[#7F7970]
                                   leading-6
                                   mt-2"
                        >
                            Tampilkan detail transaksi dan
                            cetak struk setelah pembayaran.
                        </p>

                    </div>

                </div>

            </div>

        </section>


        {{-- ========================================================= --}}
        {{-- ABOUT --}}
        {{-- ========================================================= --}}

        <section
            id="tentang"
            class="py-24 px-4 bg-[#F7F3EA]"
        >

            <div
                class="max-w-4xl
                       mx-auto
                       text-center"
            >

                <div
                    class="w-14 h-14
                           mx-auto
                           rounded-2xl
                           bg-[#292722]
                           text-white
                           flex items-center
                           justify-center
                           text-xl
                           font-bold"
                >
                    K
                </div>

                <h2
                    class="text-3xl
                           sm:text-4xl
                           font-bold
                           mt-6"
                >
                    Dibuat untuk membuat pekerjaan
                    terasa lebih sederhana.
                </h2>

                <p
                    class="text-[#777168]
                           leading-8
                           mt-5
                           max-w-2xl
                           mx-auto"
                >
                    KasirKu adalah aplikasi kasir berbasis web
                    yang dirancang untuk membantu bisnis mengelola
                    operasional penjualan secara lebih terstruktur,
                    mulai dari produk hingga laporan.
                </p>

                @guest

                    <a
                        href="{{ route('register') }}"
                        class="inline-flex
                               items-center
                               mt-8
                               px-6 py-3.5
                               bg-[#292722]
                               text-white
                               rounded-xl
                               font-medium
                               hover:bg-[#403D37]
                               transition"
                    >
                        Mulai dengan KasirKu

                        <span class="ml-2">
                            →
                        </span>

                    </a>

                @endguest

            </div>

        </section>

    </main>


    {{-- ========================================================= --}}
    {{-- FOOTER --}}
    {{-- ========================================================= --}}

    <footer
        class="bg-[#292722]
               text-[#D8D2C8]
               px-4
               py-10"
    >

        <div
            class="max-w-6xl
                   mx-auto
                   flex flex-col
                   sm:flex-row
                   items-center
                   justify-between
                   gap-4"
        >

            <div>

                <p class="font-semibold text-white">
                    KasirKu
                </p>

                <p class="text-xs text-[#969087] mt-1">
                    Sistem kasir modern dan sederhana.
                </p>

            </div>

            <p class="text-xs text-[#888279]">
                © {{ date('Y') }} KasirKu. All rights reserved.
            </p>

        </div>

    </footer>

</body>

</html>