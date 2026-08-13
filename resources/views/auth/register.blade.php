<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daftar — KasirKu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#F7F3EA] text-[#292722] antialiased">

    <div class="min-h-screen flex items-center justify-center px-4 py-10">

        <div class="w-full max-w-md">

            {{-- LOGO --}}

            <div class="text-center mb-8">

                <a
                    href="{{ url('/') }}"
                    class="inline-flex items-center gap-3"
                >

                    <div
                        class="w-11 h-11
                               rounded-xl
                               bg-[#292722]
                               text-white
                               flex items-center
                               justify-center
                               font-bold text-lg"
                    >
                        K
                    </div>

                    <span class="text-2xl font-bold">
                        KasirKu
                    </span>

                </a>

                <p class="text-sm text-[#827B71] mt-3">
                    Sistem kasir modern dan sederhana
                </p>

            </div>


            {{-- CARD --}}

            <div
                class="bg-[#FFFDF8]
                       border border-[#E5DED3]
                       rounded-[1.75rem]
                       shadow-[0_20px_60px_rgba(70,60,45,0.10)]
                       p-6 sm:p-8"
            >

                {{-- HEADER --}}

                <div class="mb-7">

                    <h1 class="text-2xl font-bold">
                        Buat akun KasirKu
                    </h1>

                    <p class="text-sm text-[#827B71] mt-2">
                        Daftarkan akun untuk mulai menggunakan KasirKu.
                    </p>

                </div>


                {{-- VALIDATION ERRORS --}}

                @if ($errors->any())

                    <div
                        class="mb-5
                               rounded-xl
                               bg-[#F8ECE8]
                               border border-[#EAD4CC]
                               px-4 py-3"
                    >

                        <p class="text-sm font-medium text-[#8A5144]">
                            Terjadi kesalahan:
                        </p>

                        <ul class="mt-1 text-sm text-[#9A6255] space-y-1">

                            @foreach ($errors->all() as $error)

                                <li>
                                    • {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- FORM --}}

                <form
                    method="POST"
                    action="{{ route('register') }}"
                    class="space-y-5"
                >

                    @csrf


                    {{-- NAME --}}

                    <div>

                        <label
                            for="name"
                            class="block text-sm font-medium text-[#514C45] mb-2"
                        >
                            Nama Lengkap
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Masukkan nama lengkap"
                            class="w-full
                                   rounded-xl
                                   border-[#DED6CA]
                                   bg-[#FFFCF7]
                                   px-4 py-3
                                   text-sm
                                   text-[#292722]
                                   placeholder-[#AAA39A]
                                   focus:border-[#8B7355]
                                   focus:ring-[#8B7355]
                                   focus:ring-1"
                        >

                        @error('name')

                            <p class="text-xs text-red-600 mt-2">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- EMAIL --}}

                    <div>

                        <label
                            for="email"
                            class="block text-sm font-medium text-[#514C45] mb-2"
                        >
                            Email
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            placeholder="nama@email.com"
                            class="w-full
                                   rounded-xl
                                   border-[#DED6CA]
                                   bg-[#FFFCF7]
                                   px-4 py-3
                                   text-sm
                                   text-[#292722]
                                   placeholder-[#AAA39A]
                                   focus:border-[#8B7355]
                                   focus:ring-[#8B7355]
                                   focus:ring-1"
                        >

                        @error('email')

                            <p class="text-xs text-red-600 mt-2">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- PASSWORD --}}

                    <div>

                        <label
                            for="password"
                            class="block text-sm font-medium text-[#514C45] mb-2"
                        >
                            Password
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Minimal 8 karakter"
                            class="w-full
                                   rounded-xl
                                   border-[#DED6CA]
                                   bg-[#FFFCF7]
                                   px-4 py-3
                                   text-sm
                                   text-[#292722]
                                   placeholder-[#AAA39A]
                                   focus:border-[#8B7355]
                                   focus:ring-[#8B7355]
                                   focus:ring-1"
                        >

                        @error('password')

                            <p class="text-xs text-red-600 mt-2">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- CONFIRM PASSWORD --}}

                    <div>

                        <label
                            for="password_confirmation"
                            class="block text-sm font-medium text-[#514C45] mb-2"
                        >
                            Konfirmasi Password
                        </label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Masukkan ulang password"
                            class="w-full
                                   rounded-xl
                                   border-[#DED6CA]
                                   bg-[#FFFCF7]
                                   px-4 py-3
                                   text-sm
                                   text-[#292722]
                                   placeholder-[#AAA39A]
                                   focus:border-[#8B7355]
                                   focus:ring-[#8B7355]
                                   focus:ring-1"
                        >

                    </div>


                    {{-- REGISTER BUTTON --}}

                    <button
                        type="submit"
                        class="w-full
                               rounded-xl
                               bg-[#292722]
                               px-4 py-3.5
                               text-sm
                               font-semibold
                               text-white
                               hover:bg-[#403D37]
                               focus:outline-none
                               focus:ring-2
                               focus:ring-[#8B7355]
                               focus:ring-offset-2
                               transition"
                    >
                        Buat Akun KasirKu
                    </button>

                </form>


                {{-- LOGIN --}}

                <div
                    class="mt-7
                           pt-6
                           border-t border-[#EEE7DC]
                           text-center"
                >

                    <p class="text-sm text-[#827B71]">

                        Sudah punya akun?

                        <a
                            href="{{ route('login') }}"
                            class="font-semibold
                                   text-[#8B7355]
                                   hover:text-[#6F5A42]
                                   transition"
                        >
                            Masuk sekarang
                        </a>

                    </p>

                </div>

            </div>


            {{-- BACK --}}

            <div class="text-center mt-6">

                <a
                    href="{{ url('/') }}"
                    class="text-sm
                           text-[#827B71]
                           hover:text-[#292722]
                           transition"
                >
                    ← Kembali ke halaman utama
                </a>

            </div>

        </div>

    </div>

</body>

</html>