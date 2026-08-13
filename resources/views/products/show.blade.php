<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <div>
                <h2 class="font-semibold text-xl text-gray-800">
                    Detail Produk
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Informasi lengkap produk.
                </p>
            </div>

            <a
                href="{{ route('products.index') }}"
                class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200"
            >
                Kembali
            </a>

        </div>

    </x-slot>

    <div class="py-8">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-xl shadow-sm overflow-hidden">

                {{-- Header --}}

                <div class="p-6 border-b">

                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">

                        <div>

                            <p class="text-sm text-gray-500">
                                SKU
                            </p>

                            <h2 class="text-2xl font-bold text-gray-900 mt-1">
                                {{ $product->name }}
                            </h2>

                            <p class="font-mono text-sm text-gray-500 mt-1">
                                {{ $product->sku }}
                            </p>

                        </div>

                        <div>

                            @if ($product->stock <= 5)

                                <span class="inline-flex px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-700">
                                    Stok Menipis
                                </span>

                            @else

                                <span class="inline-flex px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-700">
                                    Stok Tersedia
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

                {{-- Informasi --}}

                <div class="p-6">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                        <div>

                            <p class="text-sm text-gray-500">
                                Kategori
                            </p>

                            <p class="font-medium text-gray-900 mt-1">
                                {{ $product->category->name }}
                            </p>

                        </div>

                        <div>

                            <p class="text-sm text-gray-500">
                                Harga
                            </p>

                            <p class="font-semibold text-gray-900 mt-1">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>

                        </div>

                        <div>

                            <p class="text-sm text-gray-500">
                                Stok
                            </p>

                            <p class="font-semibold text-gray-900 mt-1">
                                {{ $product->stock }} unit
                            </p>

                        </div>

                        <div>

                            <p class="text-sm text-gray-500">
                                Dibuat
                            </p>

                            <p class="font-medium text-gray-900 mt-1">
                                {{ $product->created_at->format('d M Y H:i') }}
                            </p>

                        </div>

                    </div>

                    <div class="mt-8">

                        <p class="text-sm text-gray-500">
                            Deskripsi
                        </p>

                        <div class="mt-2 text-gray-700 leading-relaxed">

                            @if ($product->description)

                                {{ $product->description }}

                            @else

                                <span class="text-gray-400">
                                    Tidak ada deskripsi.
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

                {{-- Actions --}}

                <div class="px-6 py-4 bg-gray-50 border-t flex flex-col sm:flex-row gap-3 sm:justify-end">

                    <a
                        href="{{ route('products.edit', $product) }}"
                        class="px-4 py-2 text-center bg-gray-900 text-white rounded-lg hover:bg-gray-700"
                    >
                        Edit Produk
                    </a>

                    <form
                        action="{{ route('products.destroy', $product) }}"
                        method="POST"
                        onsubmit="return confirm('Hapus produk ini?')"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="w-full px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200"
                        >
                            Hapus Produk
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>