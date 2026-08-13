<x-app-layout>

    <x-slot name="header">

        <div>

            <div class="flex items-center gap-2 text-sm text-[#9a8d7d] mb-2">

                <a
                    href="{{ route('products.index') }}"
                    class="hover:text-[#6f5b45] transition"
                >
                    Produk
                </a>

                <span>•</span>

                <span>Edit Produk</span>

            </div>

            <h2 class="text-2xl sm:text-3xl font-bold text-[#453c33]">

                Edit Produk

            </h2>

            <p class="text-sm text-[#8d7e6d] mt-2">

                Perbarui informasi produk yang tersedia di toko.

            </p>

        </div>

    </x-slot>


    <div class="pb-10">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- VALIDATION ERROR --}}

            @if($errors->any())

                <div class="mb-5 p-4 rounded-2xl bg-[#f8e5e1] border border-[#efd4ce]">

                    <div class="flex gap-3">

                        <svg
                            class="w-5 h-5 text-[#a45d50] flex-shrink-0"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 9v3m0 4h.01M10.29
                                3.86L2.82 17a2 2 0 001.71
                                3h14.94a2 2 0 001.71-3
                                L13.71 3.86a2 2 0
                                00-3.42 0z"
                            />

                        </svg>


                        <div>

                            <p class="font-semibold text-[#8f5147] text-sm">

                                Terdapat kesalahan pada form.

                            </p>


                            <ul class="mt-2 space-y-1">

                                @foreach($errors->all() as $error)

                                    <li class="text-xs text-[#a45d50]">

                                        • {{ $error }}

                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    </div>

                </div>

            @endif


            {{-- FORM --}}

            <div class="cream-card overflow-hidden">


                {{-- HEADER --}}

                <div class="px-6 py-5 border-b border-[#eee6da]">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-[#f1e9dd] flex items-center justify-center">

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
                                    d="M11 5H6a2 2 0 00-2
                                    2v11a2 2 0 002 2h11a2
                                    2 0 002-2v-5m-1.5-9.5
                                    a2.121 2.121 0 013 3L12
                                    15l-4 1 1-4 9.5-9.5z"
                                />

                            </svg>

                        </div>


                        <div>

                            <h3 class="font-bold text-lg text-[#453c33]">

                                {{ $product->name }}

                            </h3>

                            <p class="text-sm text-[#9a8d7d]">

                                SKU: {{ $product->sku }}

                            </p>

                        </div>

                    </div>

                </div>


                <form
                    method="POST"
                    action="{{ route('products.update', $product) }}"
                >

                    @csrf

                    @method('PUT')


                    <div class="p-6 space-y-6">


                        {{-- CATEGORY --}}

                        <div>

                            <label
                                for="category_id"
                                class="block text-sm font-semibold text-[#5b5045] mb-2"
                            >

                                Kategori

                                <span class="text-[#a45d50]">*</span>

                            </label>


                            <select
                                id="category_id"
                                name="category_id"
                                required
                                class="w-full rounded-xl border-[#e6ddd1] bg-[#fcfaf7] text-[#51473d] focus:border-[#b6a28b] focus:ring-[#d8cabb]"
                            >

                                <option value="">
                                    Pilih kategori
                                </option>

                                @foreach($categories as $category)

                                    <option
                                        value="{{ $category->id }}"
                                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                                    >

                                        {{ $category->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- NAME + SKU --}}

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                            <div>

                                <label
                                    for="name"
                                    class="block text-sm font-semibold text-[#5b5045] mb-2"
                                >

                                    Nama Produk

                                    <span class="text-[#a45d50]">*</span>

                                </label>


                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name', $product->name) }}"
                                    required
                                    maxlength="150"
                                    placeholder="Contoh: Nasi Goreng Spesial"
                                    class="w-full rounded-xl border-[#e6ddd1] bg-[#fcfaf7] text-[#51473d] placeholder-[#b2a699] focus:border-[#b6a28b] focus:ring-[#d8cabb]"
                                >

                            </div>


                            <div>

                                <label
                                    for="sku"
                                    class="block text-sm font-semibold text-[#5b5045] mb-2"
                                >

                                    SKU

                                    <span class="text-[#a45d50]">*</span>

                                </label>


                                <input
                                    type="text"
                                    id="sku"
                                    name="sku"
                                    value="{{ old('sku', $product->sku) }}"
                                    required
                                    maxlength="50"
                                    placeholder="Contoh: MKN-001"
                                    class="w-full rounded-xl border-[#e6ddd1] bg-[#fcfaf7] text-[#51473d] placeholder-[#b2a699] focus:border-[#b6a28b] focus:ring-[#d8cabb]"
                                >

                            </div>

                        </div>


                        {{-- PRICE + STOCK --}}

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                            {{-- PRICE --}}

                            <div>

                                <label
                                    for="price_display"
                                    class="block text-sm font-semibold text-[#5b5045] mb-2"
                                >

                                    Harga

                                    <span class="text-[#a45d50]">*</span>

                                </label>


                                <div class="relative">

                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#9a8d7d]">

                                        Rp

                                    </span>


                                    <input
                                        type="text"
                                        id="price_display"
                                        inputmode="numeric"
                                        autocomplete="off"
                                        value="{{ old('price') !== null ? number_format(old('price'), 0, ',', '.') : number_format($product->price, 0, ',', '.') }}"
                                        placeholder="20.000"
                                        class="w-full pl-11 pr-4 rounded-xl border-[#e6ddd1] bg-[#fcfaf7] text-[#51473d] placeholder-[#b2a699] focus:border-[#b6a28b] focus:ring-[#d8cabb]"
                                    >


                                    <input
                                        type="hidden"
                                        id="price"
                                        name="price"
                                        value="{{ old('price', $product->price) }}"
                                    >

                                </div>

                            </div>


                            {{-- STOCK --}}

                            <div>

                                <label
                                    for="stock"
                                    class="block text-sm font-semibold text-[#5b5045] mb-2"
                                >

                                    Stok

                                    <span class="text-[#a45d50]">*</span>

                                </label>


                                <input
                                    type="number"
                                    id="stock"
                                    name="stock"
                                    value="{{ old('stock', $product->stock) }}"
                                    required
                                    min="0"
                                    placeholder="0"
                                    class="w-full rounded-xl border-[#e6ddd1] bg-[#fcfaf7] text-[#51473d] placeholder-[#b2a699] focus:border-[#b6a28b] focus:ring-[#d8cabb]"
                                >

                            </div>

                        </div>


                        {{-- DESCRIPTION --}}

                        <div>

                            <label
                                for="description"
                                class="block text-sm font-semibold text-[#5b5045] mb-2"
                            >

                                Deskripsi

                                <span class="text-xs font-normal text-[#a09282]">
                                    (opsional)
                                </span>

                            </label>


                            <textarea
                                id="description"
                                name="description"
                                rows="5"
                                placeholder="Tuliskan deskripsi produk..."
                                class="w-full rounded-xl border-[#e6ddd1] bg-[#fcfaf7] text-[#51473d] placeholder-[#b2a699] focus:border-[#b6a28b] focus:ring-[#d8cabb] resize-none"
                            >{{ old('description', $product->description) }}</textarea>

                        </div>

                    </div>


                    {{-- FOOTER --}}

                    <div class="px-6 py-5 bg-[#faf7f2] border-t border-[#eee6da] flex flex-col-reverse sm:flex-row sm:justify-between gap-3">


                        <a
                            href="{{ route('products.index') }}"
                            class="cream-button-secondary justify-center"
                        >

                            ← Kembali

                        </a>


                        <button
                            type="submit"
                            class="cream-button justify-center"
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
                                    d="M5 13l4 4L19 7"
                                />

                            </svg>

                            Simpan Perubahan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    {{-- PRICE FORMAT --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const priceDisplay =
                document.getElementById('price_display');

            const priceInput =
                document.getElementById('price');


            if (!priceDisplay || !priceInput) {
                return;
            }


            priceDisplay.addEventListener('input', function () {

                let value =
                    this.value.replace(/\D/g, '');


                if (value === '') {

                    this.value = '';

                    priceInput.value = '';

                    return;

                }


                this.value =
                    new Intl.NumberFormat('id-ID')
                        .format(value);


                priceInput.value = value;

            });


            const form = priceDisplay.closest('form');


            if (form) {

                form.addEventListener('submit', function () {

                    priceInput.value =
                        priceDisplay.value.replace(/\D/g, '');

                });

            }

        });

    </script>

</x-app-layout>