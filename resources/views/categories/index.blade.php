<x-app-layout>

    <x-slot name="header">

        <div>
            <p class="text-sm text-stone-500">
                Kelola kategori produk toko
            </p>

            <h2 class="mt-1 text-2xl font-bold text-stone-800">
                Kategori
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

                    <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <p class="text-sm font-medium text-stone-500">
                                Manajemen kategori
                            </p>

                            <h1 class="mt-1 text-2xl font-bold text-stone-800">
                                Daftar Kategori
                            </h1>

                            <p class="mt-2 text-sm text-stone-400">
                                Kelola kategori yang digunakan untuk mengelompokkan produk.
                            </p>

                        </div>


                        <a
                            href="{{ route('categories.create') }}"
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

                            Tambah Kategori

                        </a>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                SUCCESS MESSAGE
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


            {{-- =====================================================
                ERROR MESSAGE
            ====================================================== --}}

            @if(session('error'))

                <div
                    class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-700"
                >
                    {{ session('error') }}
                </div>

            @endif


            {{-- =====================================================
                CATEGORY TABLE
            ====================================================== --}}

            <div
                class="overflow-hidden rounded-[24px] border border-stone-200/70 bg-white shadow-[0_15px_40px_rgba(80,60,40,0.05)]"
            >

                {{-- Table Header --}}

                <div
                    class="flex flex-col gap-2 border-b border-stone-100 p-6 sm:flex-row sm:items-center sm:justify-between"
                >

                    <div>

                        <h3 class="font-bold text-stone-800">
                            Semua Kategori
                        </h3>

                        <p class="mt-1 text-xs text-stone-400">
                            {{ $categories->total() }} kategori tersedia
                        </p>

                    </div>

                </div>


                {{-- Table --}}

                <div class="overflow-x-auto">

                    <table class="w-full min-w-[700px] text-sm">

                        <thead class="bg-[#faf8f5]">

                            <tr class="border-b border-stone-100">

                                <th class="px-6 py-4 text-left font-semibold text-stone-500">
                                    #
                                </th>

                                <th class="px-6 py-4 text-left font-semibold text-stone-500">
                                    Nama Kategori
                                </th>

                                <th class="px-6 py-4 text-left font-semibold text-stone-500">
                                    Deskripsi
                                </th>

                                <th class="px-6 py-4 text-left font-semibold text-stone-500">
                                    Dibuat
                                </th>

                                <th class="px-6 py-4 text-right font-semibold text-stone-500">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-stone-100">

                            @forelse($categories as $category)

                                <tr class="transition duration-200 hover:bg-[#fdfbf8]">

                                    <td class="px-6 py-5">

                                        <span
                                            class="flex h-8 w-8 items-center justify-center rounded-xl bg-[#f4ede4] text-xs font-bold text-stone-600"
                                        >
                                            {{ $categories->firstItem() + $loop->index }}
                                        </span>

                                    </td>


                                    <td class="px-6 py-5">

                                        <div class="font-semibold text-stone-800">
                                            {{ $category->name }}
                                        </div>

                                    </td>


                                    <td class="max-w-md px-6 py-5">

                                        @if($category->description)

                                            <p class="line-clamp-2 text-stone-500">
                                                {{ $category->description }}
                                            </p>

                                        @else

                                            <span class="text-stone-400">
                                                Tidak ada deskripsi
                                            </span>

                                        @endif

                                    </td>


                                    <td class="px-6 py-5 text-stone-500">

                                        {{ $category->created_at->format('d M Y') }}

                                    </td>


                                    <td class="px-6 py-5">

                                        <div class="flex justify-end gap-2">

                                            {{-- Edit --}}

                                            <a
                                                href="{{ route('categories.edit', $category) }}"
                                                class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-[#f4ede4] text-stone-600 transition hover:bg-stone-800 hover:text-white"
                                                title="Edit"
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
                                                        d="M16.862 4.487l1.651-1.651a2.25 2.25 0 013.182 3.182l-1.651 1.651M16.862 4.487L7.5 13.849 6 18l4.151-1.5 9.893-9.832M16.862 4.487l3.182 3.182"
                                                    />
                                                </svg>

                                            </a>


                                            {{-- Delete --}}

                                            <form
                                                action="{{ route('categories.destroy', $category) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-red-50 text-red-500 transition hover:bg-red-500 hover:text-white"
                                                    title="Hapus"
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
                                                            d="M6 7h12M10 11v6M14 11v6M9 7V5h6v2m-8 0l1 14h8l1-14"
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
                                                        d="M4 7h16M4 7v12a1 1 0 001 1h14a1 1 0 001-1V7M4 7l2-3h12l2 3"
                                                    />
                                                </svg>

                                            </div>

                                            <h3 class="mt-4 font-semibold text-stone-700">
                                                Belum ada kategori
                                            </h3>

                                            <p class="mt-1 text-sm text-stone-400">
                                                Tambahkan kategori pertama untuk mulai mengelompokkan produk.
                                            </p>

                                            <a
                                                href="{{ route('categories.create') }}"
                                                class="mt-5 inline-flex items-center rounded-xl bg-stone-800 px-4 py-2.5 text-sm font-semibold text-white hover:bg-stone-700"
                                            >
                                                Tambah Kategori
                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- Pagination --}}

                @if($categories->hasPages())

                    <div class="border-t border-stone-100 p-5">

                        {{ $categories->links() }}

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>