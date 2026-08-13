<x-app-layout>

    {{-- =========================================================
        HEADER
    ========================================================== --}}

    <x-slot name="header">

        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">

            <div>

                <div class="flex items-center gap-2 text-sm text-[#9a8d7d] mb-2">

                    <span>Management</span>

                    <span>•</span>

                    <span>Produk</span>

                </div>

                <h2 class="text-2xl sm:text-3xl font-bold text-[#453c33]">

                    Produk

                </h2>

                <p class="text-sm text-[#8d7e6d] mt-2">

                    Kelola daftar produk dan stok toko.

                </p>

            </div>


            <a
                href="{{ route('products.create') }}"
                class="cream-button"
            >

                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M12 4v16m8-8H4"
                    />

                </svg>

                Tambah Produk

            </a>

        </div>

    </x-slot>


    {{-- =========================================================
        CONTENT
    ========================================================== --}}

    <div class="pb-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- =================================================
                FLASH MESSAGE
            ================================================== --}}

            @if(session('success'))

                <div
                    class="mb-5 flex items-start gap-3 p-4 rounded-2xl bg-[#edf3ea] border border-[#dbe7d7] text-[#61765b]"
                >

                    <svg
                        class="w-5 h-5 mt-0.5 flex-shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"
                        />

                    </svg>

                    <div class="text-sm font-medium">

                        {{ session('success') }}

                    </div>

                </div>

            @endif


            {{-- =================================================
                SEARCH / FILTER
            ================================================== --}}

            <div class="cream-card p-5 mb-5">

                <form
                    method="GET"
                    action="{{ route('products.index') }}"
                    class="grid grid-cols-1 md:grid-cols-[1fr_auto] gap-3"
                >

                    <div class="relative">

                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">

                            <svg
                                class="w-5 h-5 text-[#a09282]"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M21 21l-4.35-4.35m2.35-5.65
                                    a7 7 0 11-14 0 7 7 0 0114 0z"
                                />

                            </svg>

                        </div>


                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nama produk atau SKU..."
                            class="w-full pl-11 pr-4 py-3 rounded-xl border-[#e6ddd1] bg-[#fcfaf7] text-[#51473d] placeholder-[#b2a699] focus:border-[#b6a28b] focus:ring-[#d8cabb]"
                        >

                    </div>


                    <button
                        type="submit"
                        class="cream-button"
                    >

                        Cari Produk

                    </button>

                </form>

            </div>


            {{-- =================================================
                PRODUCT TABLE
            ================================================== --}}

            <div class="cream-card overflow-hidden">


                {{-- TABLE HEADER --}}

                <div class="px-5 sm:px-6 py-5 border-b border-[#eee6da]">

                    <div class="flex items-center justify-between">

                        <div>

                            <h3 class="font-bold text-lg text-[#453c33]">

                                Daftar Produk

                            </h3>

                            <p class="text-sm text-[#9a8d7d] mt-1">

                                {{ $products->total() }}
                                produk terdaftar.

                            </p>

                        </div>

                    </div>

                </div>


                {{-- DESKTOP TABLE --}}

                <div class="hidden md:block overflow-x-auto">

                    <table class="w-full">

                        <thead>

                            <tr class="bg-[#faf7f2] border-b border-[#eee6da]">

                                <th class="text-left px-6 py-4 text-xs font-semibold uppercase tracking-wider text-[#9a8d7d]">
                                    Produk
                                </th>

                                <th class="text-left px-6 py-4 text-xs font-semibold uppercase tracking-wider text-[#9a8d7d]">
                                    SKU
                                </th>

                                <th class="text-left px-6 py-4 text-xs font-semibold uppercase tracking-wider text-[#9a8d7d]">
                                    Kategori
                                </th>

                                <th class="text-right px-6 py-4 text-xs font-semibold uppercase tracking-wider text-[#9a8d7d]">
                                    Harga
                                </th>

                                <th class="text-center px-6 py-4 text-xs font-semibold uppercase tracking-wider text-[#9a8d7d]">
                                    Stok
                                </th>

                                <th class="text-right px-6 py-4 text-xs font-semibold uppercase tracking-wider text-[#9a8d7d]">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-[#f0e9df]">

                            @forelse($products as $product)

                                <tr class="hover:bg-[#fcfaf7] transition">


                                    {{-- PRODUCT --}}

                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="w-11 h-11 rounded-xl bg-[#f1e9dd] flex items-center justify-center flex-shrink-0">

                                                <svg
                                                    class="w-5 h-5 text-[#6f5b45]"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >

                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="1.8"
                                                        d="M20 7l-8-4-8 4m16
                                                        0v10l-8 4m8-14l-8
                                                        4m0 0L4 7m8 4v10"
                                                    />

                                                </svg>

                                            </div>


                                            <div>

                                                <div class="font-semibold text-[#51473d]">

                                                    {{ $product->name }}

                                                </div>

                                                @if($product->description)

                                                    <div class="text-xs text-[#a09282] mt-1 max-w-xs truncate">

                                                        {{ $product->description }}

                                                    </div>

                                                @endif

                                            </div>

                                        </div>

                                    </td>


                                    {{-- SKU --}}

                                    <td class="px-6 py-4">

                                        <span class="text-sm font-medium text-[#786b5d]">

                                            {{ $product->sku }}

                                        </span>

                                    </td>


                                    {{-- CATEGORY --}}

                                    <td class="px-6 py-4">

                                        <span
                                            class="inline-flex px-3 py-1 rounded-full bg-[#eee8df] text-[#6f6254] text-xs font-semibold"
                                        >

                                            {{ $product->category->name ?? '-' }}

                                        </span>

                                    </td>


                                    {{-- PRICE --}}

                                    <td class="px-6 py-4 text-right">

                                        <div class="font-semibold text-[#51473d]">

                                            Rp {{ number_format($product->price, 0, ',', '.') }}

                                        </div>

                                    </td>


                                    {{-- STOCK --}}

                                    <td class="px-6 py-4 text-center">

                                        @if($product->stock <= 2)

                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full bg-[#f8e5e1] text-[#a45d50] text-xs font-semibold"
                                            >

                                                {{ $product->stock }}

                                                <span class="ml-1">
                                                    kritis
                                                </span>

                                            </span>

                                        @elseif($product->stock <= 5)

                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full bg-[#f5edda] text-[#967b43] text-xs font-semibold"
                                            >

                                                {{ $product->stock }}

                                                <span class="ml-1">
                                                    menipis
                                                </span>

                                            </span>

                                        @else

                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full bg-[#edf3ea] text-[#66805e] text-xs font-semibold"
                                            >

                                                {{ $product->stock }}

                                                <span class="ml-1">
                                                    tersedia
                                                </span>

                                            </span>

                                        @endif

                                    </td>


                                    {{-- ACTION --}}

                                    <td class="px-6 py-4">

                                        <div class="flex items-center justify-end gap-2">


                                            {{-- EDIT --}}

                                            <a
                                                href="{{ route('products.edit', $product) }}"
                                                class="w-9 h-9 rounded-xl bg-[#eee8df] text-[#6f6254] flex items-center justify-center hover:bg-[#e3d9ca] transition"
                                                title="Edit"
                                            >

                                                <svg
                                                    class="w-4 h-4"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >

                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="1.8"
                                                        d="M11 5H6a2 2 0 00-2
                                                        2v11a2 2 0 002 2h11a2
                                                        2 0 002-2v-5m-1.5-9.5
                                                        a2.121 2.121 0 013 3L12
                                                        15l-4 1 1-4 9.5-9.5z"
                                                    />

                                                </svg>

                                            </a>


                                            {{-- DELETE --}}

                                            <form
                                                method="POST"
                                                action="{{ route('products.destroy', $product) }}"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="w-9 h-9 rounded-xl bg-[#f8e5e1] text-[#a45d50] flex items-center justify-center hover:bg-[#f2d6d1] transition"
                                                    title="Hapus"
                                                >

                                                    <svg
                                                        class="w-4 h-4"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                    >

                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="1.8"
                                                            d="M6 7h12M10 11v6M14 11v6
                                                            M9 7V5a1 1 0 011-1h4a1
                                                            1 0 011 1v2m3 0l-1 13H7L6
                                                            7h12z"
                                                        />

                                                    </svg>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="6"
                                        class="px-6 py-14 text-center"
                                    >

                                        <div class="w-14 h-14 mx-auto rounded-2xl bg-[#f1e9dd] flex items-center justify-center mb-4">

                                            <svg
                                                class="w-7 h-7 text-[#8d7b68]"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M20 7l-8-4-8 4m16
                                                    0v10l-8 4m8-14l-8
                                                    4m0 0L4 7m8 4v10"
                                                />

                                            </svg>

                                        </div>

                                        <h3 class="font-semibold text-[#51473d]">

                                            Produk belum tersedia

                                        </h3>

                                        <p class="text-sm text-[#a09282] mt-1">

                                            Tambahkan produk pertama Anda.

                                        </p>


                                        <a
                                            href="{{ route('products.create') }}"
                                            class="cream-button mt-5"
                                        >

                                            Tambah Produk

                                        </a>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- =================================================
                    MOBILE CARDS
                ================================================== --}}

                <div class="md:hidden divide-y divide-[#f0e9df]">

                    @forelse($products as $product)

                        <div class="p-5">

                            <div class="flex items-start justify-between gap-4">


                                <div class="flex items-center gap-3 min-w-0">

                                    <div class="w-11 h-11 rounded-xl bg-[#f1e9dd] flex items-center justify-center flex-shrink-0">

                                        <svg
                                            class="w-5 h-5 text-[#6f5b45]"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M20 7l-8-4-8 4m16
                                                0v10l-8 4m8-14l-8
                                                4m0 0L4 7m8 4v10"
                                            />

                                        </svg>

                                    </div>


                                    <div class="min-w-0">

                                        <div class="font-semibold text-[#51473d] truncate">

                                            {{ $product->name }}

                                        </div>

                                        <div class="text-xs text-[#a09282] mt-1">

                                            {{ $product->sku }}

                                        </div>

                                    </div>

                                </div>


                                {{-- ACTION --}}

                                <div class="flex items-center gap-1 flex-shrink-0">

                                    <a
                                        href="{{ route('products.edit', $product) }}"
                                        class="w-9 h-9 rounded-xl bg-[#eee8df] text-[#6f6254] flex items-center justify-center"
                                    >

                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M11 5H6a2 2 0 00-2
                                                2v11a2 2 0 002 2h11a2
                                                2 0 002-2v-5m-1.5-9.5
                                                a2.121 2.121 0 013 3L12
                                                15l-4 1 1-4 9.5-9.5z"
                                            />

                                        </svg>

                                    </a>


                                    <form
                                        method="POST"
                                        action="{{ route('products.destroy', $product) }}"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="w-9 h-9 rounded-xl bg-[#f8e5e1] text-[#a45d50] flex items-center justify-center"
                                        >

                                            <svg
                                                class="w-4 h-4"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M6 7h12M10 11v6M14 11v6
                                                    M9 7V5a1 1 0 011-1h4a1
                                                    1 0 011 1v2m3 0l-1 13H7L6
                                                    7h12z"
                                                />

                                            </svg>

                                        </button>

                                    </form>

                                </div>

                            </div>


                            <div class="grid grid-cols-2 gap-4 mt-5">

                                <div>

                                    <div class="text-[11px] uppercase tracking-wide text-[#a09282]">
                                        Kategori
                                    </div>

                                    <div class="text-sm font-medium text-[#6f6254] mt-1">

                                        {{ $product->category->name ?? '-' }}

                                    </div>

                                </div>


                                <div>

                                    <div class="text-[11px] uppercase tracking-wide text-[#a09282]">
                                        Harga
                                    </div>

                                    <div class="text-sm font-semibold text-[#51473d] mt-1">

                                        Rp {{ number_format($product->price, 0, ',', '.') }}

                                    </div>

                                </div>

                            </div>


                            <div class="mt-4">

                                <div class="text-[11px] uppercase tracking-wide text-[#a09282] mb-2">
                                    Stok
                                </div>


                                @if($product->stock <= 2)

                                    <span
                                        class="inline-flex px-3 py-1 rounded-full bg-[#f8e5e1] text-[#a45d50] text-xs font-semibold"
                                    >

                                        {{ $product->stock }} kritis

                                    </span>

                                @elseif($product->stock <= 5)

                                    <span
                                        class="inline-flex px-3 py-1 rounded-full bg-[#f5edda] text-[#967b43] text-xs font-semibold"
                                    >

                                        {{ $product->stock }} menipis

                                    </span>

                                @else

                                    <span
                                        class="inline-flex px-3 py-1 rounded-full bg-[#edf3ea] text-[#66805e] text-xs font-semibold"
                                    >

                                        {{ $product->stock }} tersedia

                                    </span>

                                @endif

                            </div>

                        </div>

                    @empty

                        <div class="p-10 text-center">

                            <p class="text-sm text-[#a09282]">
                                Produk belum tersedia.
                            </p>

                        </div>

                    @endforelse

                </div>


                {{-- =================================================
                    PAGINATION
                ================================================== --}}

                @if($products->hasPages())

                    <div class="px-5 sm:px-6 py-5 border-t border-[#eee6da]">

                        {{ $products->links() }}

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>