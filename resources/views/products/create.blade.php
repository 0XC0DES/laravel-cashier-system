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

                <span>Tambah Produk</span>

            </div>

            <h2 class="text-2xl sm:text-3xl font-bold text-[#453c33]">

                Tambah Produk

            </h2>

            <p class="text-sm text-[#8d7e6d] mt-2">

                Tambahkan produk baru ke dalam katalog toko.

            </p>

        </div>

    </x-slot>


    <div class="pb-10">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- ERROR VALIDATION --}}

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

                <div class="px-6 py-5 border-b border-[#eee6da]">

                    <h3 class="font-bold text-lg text-[#453c33]">

                        Informasi Produk

                    </h3>

                    <p class="text-sm text-[#9a8d7d] mt-1">

                        Isi informasi produk dengan lengkap.

                    </p>

                </div>


                <form
                    method="POST"
                    action="{{ route('products.store') }}"
                >

                    @csrf


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
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}
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
                                    value="{{ old('name') }}"
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
                                    value="{{ old('sku') }}"
                                    required
                                    maxlength="50"
                                    placeholder="Contoh: MKN-001"
                                    class="w-full rounded-xl border-[#e6ddd1] bg-[#fcfaf7] text-[#51473d] placeholder-[#b2a699] focus:border-[#b6a28b] focus:ring-[#d8cabb]"
                                >

                            </div>

                        </div>


                        {{-- PRICE + STOCK --}}

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                            <div>

                                <label
                                    for="price"
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
                                        value="{{ old('price') ? number_format(old('price'), 0, ',', '.') : '' }}"
                                        placeholder="20.000"
                                        class="w-full pl-11 pr-4 rounded-xl border-[#e6ddd1] bg-[#fcfaf7] text-[#51473d] placeholder-[#b2a699] focus:border-[#b6a28b] focus:ring-[#d8cabb]"
                                    >

                                    {{-- Nilai asli yang dikirim ke Laravel --}}
                                    <input
                                        type="hidden"
                                        id="price"
                                        name="price"
                                        value="{{ old('price') }}"
                                    >

                                </div>

                            </div>


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
                                    value="{{ old('stock', 0) }}"
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
                            >{{ old('description') }}</textarea>

                        </div>

                    </div>


                    {{-- FOOTER BUTTONS --}}

                    <div class="px-6 py-5 bg-[#faf7f2] border-t border-[#eee6da] flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

                        <a
                            href="{{ route('products.index') }}"
                            class="cream-button-secondary justify-center"
                        >

                            Batal

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

                            Simpan Produk

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const priceDisplay = document.getElementById('price_display');
            const priceInput = document.getElementById('price');

            if (!priceDisplay || !priceInput) {
                return;
            }

            function formatRupiah(value) {

                value = value.replace(/\D/g, '');

                if (value === '') {
                    return '';
                }

                return new Intl.NumberFormat('id-ID').format(value);
            }


            priceDisplay.addEventListener('input', function () {

                let value = this.value.replace(/\D/g, '');

                this.value = formatRupiah(value);

                priceInput.value = value;

            });


            priceDisplay.form?.addEventListener('submit', function () {

                priceInput.value = priceDisplay.value.replace(/\D/g, '');

            });

        });
    </script>

</x-app-layout>