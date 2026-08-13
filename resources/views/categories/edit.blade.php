<x-app-layout>

    <x-slot name="header">

        <div>

            <p class="text-sm text-stone-500">
                Manajemen kategori
            </p>

            <h2 class="mt-1 text-2xl font-bold text-stone-800">
                Edit Kategori
            </h2>

        </div>

    </x-slot>


    <div class="min-h-screen bg-[#f7f3ed] py-8">

        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">


            <div
                class="overflow-hidden rounded-[28px] border border-stone-200/70 bg-white shadow-[0_20px_60px_rgba(80,60,40,0.06)]"
            >

                {{-- Header --}}

                <div class="border-b border-stone-100 p-6 sm:p-8">

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#f4ede4] text-stone-600"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16.862 4.487l1.651-1.651a2.25 2.25 0 013.182 3.182l-1.651 1.651M16.862 4.487L7.5 13.849 6 18l4.151-1.5 9.893-9.832M16.862 4.487l3.182 3.182"
                                />
                            </svg>

                        </div>


                        <div>

                            <h1 class="text-xl font-bold text-stone-800">
                                Edit Kategori
                            </h1>

                            <p class="mt-1 text-sm text-stone-400">
                                Perbarui informasi kategori.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Form --}}

                <form
                    action="{{ route('categories.update', $category) }}"
                    method="POST"
                    class="p-6 sm:p-8"
                >

                    @csrf

                    @method('PUT')


                    {{-- Name --}}

                    <div>

                        <label
                            for="name"
                            class="block text-sm font-semibold text-stone-700"
                        >
                            Nama Kategori
                        </label>


                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name', $category->name) }}"
                            required
                            autofocus
                            class="mt-2 block w-full rounded-xl border-stone-200 bg-[#fdfbf8] px-4 py-3 text-sm text-stone-800 shadow-sm outline-none transition placeholder:text-stone-300 focus:border-stone-400 focus:ring-stone-400"
                        >


                        @error('name')

                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Description --}}

                    <div class="mt-6">

                        <label
                            for="description"
                            class="block text-sm font-semibold text-stone-700"
                        >
                            Deskripsi
                        </label>


                        <textarea
                            id="description"
                            name="description"
                            rows="5"
                            placeholder="Jelaskan kategori ini..."
                            class="mt-2 block w-full resize-none rounded-xl border-stone-200 bg-[#fdfbf8] px-4 py-3 text-sm text-stone-800 shadow-sm outline-none transition placeholder:text-stone-300 focus:border-stone-400 focus:ring-stone-400"
                        >{{ old('description', $category->description) }}</textarea>


                        @error('description')

                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Info --}}

                    <div class="mt-6 rounded-2xl bg-[#faf8f5] p-4">

                        <p class="text-xs text-stone-400">
                            Terakhir diperbarui
                        </p>

                        <p class="mt-1 text-sm font-medium text-stone-700">

                            {{ $category->updated_at
                                ? $category->updated_at->format('d M Y H:i')
                                : '-'
                            }}

                        </p>

                    </div>


                    {{-- Buttons --}}

                    <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                        <a
                            href="{{ route('categories.index') }}"
                            class="inline-flex items-center justify-center rounded-xl bg-[#f4ede4] px-5 py-3 text-sm font-semibold text-stone-600 transition hover:bg-stone-200"
                        >
                            Batal
                        </a>


                        <button
                            type="submit"
                            class="inline-flex items-center justify-center rounded-xl bg-stone-800 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-stone-700"
                        >
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>