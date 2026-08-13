<nav
    x-data="{ open: false }"
    class="fixed top-4 left-0 right-0 z-50 px-4 sm:px-6 lg:px-8"
>

    <div class="max-w-7xl mx-auto">

        <div
            class="bg-[#fffdf9]/95 backdrop-blur-xl border border-[#e9e0d3] shadow-[0_10px_35px_rgba(82,64,42,0.10)] rounded-2xl"
        >

            <div class="h-16 px-4 sm:px-6 flex items-center justify-between">


                {{-- LOGO --}}

                <div class="flex items-center">

                    <a
                        href="{{ route('dashboard') }}"
                        class="flex items-center gap-3"
                    >

                        <div
                            class="w-10 h-10 rounded-xl bg-[#6f5b45] text-white flex items-center justify-center shadow-sm"
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
                                    d="M3 3h18v18H3z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M7 7h10M7 11h10M7 15h6"
                                />

                            </svg>

                        </div>


                        <div class="hidden sm:block">

                            <div class="font-bold text-[#453c33] leading-none">
                                KasirKu
                            </div>

                            <div class="text-[11px] text-[#9a8d7d] mt-1">
                                Point of Sale
                            </div>

                        </div>

                    </a>

                </div>


                {{-- DESKTOP NAVIGATION --}}

                <div class="hidden md:flex items-center gap-1">

                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                    >
                        Dashboard
                    </x-nav-link>


                    @if(auth()->user()->role === 'admin')

                        <x-nav-link
                            :href="route('categories.index')"
                            :active="request()->routeIs('categories.*')"
                        >
                            Kategori
                        </x-nav-link>


                        <x-nav-link
                            :href="route('products.index')"
                            :active="request()->routeIs('products.*')"
                        >
                            Produk
                        </x-nav-link>

                    @endif


                    <x-nav-link
                        :href="route('transactions.index')"
                        :active="request()->routeIs('transactions.*')"
                    >
                        Transaksi
                    </x-nav-link>


                    @if(auth()->user()->role === 'admin')

                        <x-nav-link
                            :href="route('reports.sales')"
                            :active="request()->routeIs('reports.*')"
                        >
                            Laporan
                        </x-nav-link>

                    @endif

                </div>


                {{-- USER --}}

                <div class="hidden md:flex items-center gap-3">

                    <div class="text-right hidden lg:block">

                        <div class="text-sm font-semibold text-[#51473d]">

                            {{ Auth::user()->name }}

                        </div>

                        <div class="text-[11px] text-[#9a8d7d] capitalize">

                            {{ Auth::user()->role }}

                        </div>

                    </div>


                    <div class="w-10 h-10 rounded-xl bg-[#eee7dc] flex items-center justify-center">

                        <span class="font-semibold text-[#6f5b45]">

                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                        </span>

                    </div>


                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="w-10 h-10 rounded-xl text-[#8d7e6d] hover:bg-[#f1ebe2] hover:text-[#6f5b45] transition"
                            title="Logout"
                        >

                            <svg
                                class="w-5 h-5 mx-auto"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M10 17l5-5-5-5M15 12H3"
                                />

                            </svg>

                        </button>

                    </form>

                </div>


                {{-- MOBILE BUTTON --}}

                <button
                    @click="open = !open"
                    class="md:hidden w-10 h-10 rounded-xl bg-[#eee7dc] text-[#6f5b45]"
                >

                    <svg
                        x-show="!open"
                        class="w-5 h-5 mx-auto"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                    </svg>


                    <svg
                        x-show="open"
                        class="w-5 h-5 mx-auto"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />

                    </svg>

                </button>

            </div>


            {{-- MOBILE NAVIGATION --}}

            <div
                x-show="open"
                x-transition
                class="md:hidden border-t border-[#ebe3d7] px-4 py-4"
            >

                <div class="space-y-1">

                    <x-responsive-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                    >
                        Dashboard
                    </x-responsive-nav-link>


                    @if(auth()->user()->role === 'admin')

                        <x-responsive-nav-link
                            :href="route('categories.index')"
                            :active="request()->routeIs('categories.*')"
                        >
                            Kategori
                        </x-responsive-nav-link>


                        <x-responsive-nav-link
                            :href="route('products.index')"
                            :active="request()->routeIs('products.*')"
                        >
                            Produk
                        </x-responsive-nav-link>

                    @endif


                    <x-responsive-nav-link
                        :href="route('transactions.index')"
                        :active="request()->routeIs('transactions.*')"
                    >
                        Transaksi
                    </x-responsive-nav-link>


                    @if(auth()->user()->role === 'admin')

                        <x-responsive-nav-link
                            :href="route('reports.sales')"
                            :active="request()->routeIs('reports.*')"
                        >
                            Laporan
                        </x-responsive-nav-link>

                    @endif

                </div>


                <div class="border-t border-[#ebe3d7] mt-4 pt-4">

                    <div class="flex items-center gap-3 px-3">

                        <div class="w-10 h-10 rounded-xl bg-[#eee7dc] flex items-center justify-center">

                            <span class="font-semibold text-[#6f5b45]">

                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                            </span>

                        </div>


                        <div>

                            <div class="font-semibold text-sm text-[#51473d]">

                                {{ Auth::user()->name }}

                            </div>

                            <div class="text-xs text-[#9a8d7d] capitalize">

                                {{ Auth::user()->role }}

                            </div>

                        </div>

                    </div>


                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                        class="mt-3"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="w-full text-left px-3 py-2.5 rounded-xl text-sm text-[#8d7e6d] hover:bg-[#f3eee7]"
                        >

                            Logout

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</nav>