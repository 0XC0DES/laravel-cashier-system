<x-app-layout>

    <x-slot name="header">

        <div>

            {{-- Breadcrumb --}}
            <div class="flex items-center gap-2 text-sm text-[#9a8d7d] mb-2">

                <a
                    href="{{ route('transactions.index') }}"
                    class="hover:text-[#6f5b45] transition"
                >
                    Transaksi
                </a>

                <span>•</span>

                <span>Kasir</span>

            </div>


            {{-- Title --}}
            <h2 class="text-2xl sm:text-3xl font-bold text-[#453c33]">
                Kasir
            </h2>


            <p class="text-sm text-[#8d7e6d] mt-2">
                Buat transaksi penjualan baru.
            </p>

        </div>

    </x-slot>


    <div class="pb-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- ================================================= --}}
            {{-- ERROR SESSION --}}
            {{-- ================================================= --}}

            @if(session('error'))

                <div class="mb-5 rounded-2xl bg-[#f8e5e1] border border-[#efd4ce] p-4">

                    <div class="flex items-center gap-3">

                        <svg
                            class="w-5 h-5 text-[#a45d50]"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 9v3m0 4h.01M10.29 3.86L2.82 17a2 2 0 001.71 3h14.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"
                            />

                        </svg>


                        <p class="text-sm font-medium text-[#8f5147]">

                            {{ session('error') }}

                        </p>

                    </div>

                </div>

            @endif


            {{-- ================================================= --}}
            {{-- VALIDATION ERROR --}}
            {{-- ================================================= --}}

            @if($errors->any())

                <div class="mb-5 rounded-2xl bg-[#f8e5e1] border border-[#efd4ce] p-4">

                    <p class="font-semibold text-[#8f5147] text-sm mb-2">

                        Terdapat kesalahan:

                    </p>


                    <ul class="space-y-1">

                        @foreach($errors->all() as $error)

                            <li class="text-xs text-[#a45d50]">

                                • {{ $error }}

                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- ================================================= --}}
            {{-- FORM TRANSACTION --}}
            {{-- ================================================= --}}

            <form
                id="transaction-form"
                method="POST"
                action="{{ route('transactions.store') }}"
            >

                @csrf


                <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">


                    {{-- ================================================= --}}
                    {{-- PRODUCT SECTION --}}
                    {{-- ================================================= --}}

                    <div class="xl:col-span-2">

                        <div class="cream-card overflow-hidden">


                            {{-- HEADER --}}

                            <div class="p-5 border-b border-[#eee6da]">

                                <div class="flex flex-col sm:flex-row gap-4 sm:items-center sm:justify-between">


                                    <div>

                                        <h3 class="font-bold text-lg text-[#453c33]">

                                            Pilih Produk

                                        </h3>


                                        <p class="text-sm text-[#9a8d7d] mt-1">

                                            Klik produk untuk menambahkannya ke keranjang.

                                        </p>

                                    </div>


                                    {{-- SEARCH --}}

                                    <div class="relative w-full sm:w-72">

                                        <svg
                                            class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-[#a09282]"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m21 21-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"
                                            />

                                        </svg>


                                        <input
                                            type="text"
                                            id="product-search"
                                            placeholder="Cari nama atau SKU..."
                                            autocomplete="off"
                                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border-[#e6ddd1] bg-[#fcfaf7] text-sm text-[#51473d] placeholder-[#b2a699] focus:border-[#b6a28b] focus:ring-[#d8cabb]"
                                        >

                                    </div>

                                </div>

                            </div>


                            {{-- ================================================= --}}
                            {{-- PRODUCT GRID --}}
                            {{-- ================================================= --}}

                            <div class="p-5">

                                <div
                                    id="product-grid"
                                    class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4"
                                >


                                    @foreach($products as $product)

                                        <button
                                            type="button"
                                            class="product-card text-left group {{ $product->stock <= 0 ? 'cursor-not-allowed' : '' }}"
                                            data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}"
                                            data-sku="{{ $product->sku }}"
                                            data-price="{{ $product->price }}"
                                            data-stock="{{ $product->stock }}"
                                            {{ $product->stock <= 0 ? 'disabled' : '' }}
                                        >

                                            <div
                                                class="
                                                    h-full
                                                    rounded-2xl
                                                    border
                                                    p-4
                                                    transition
                                                    duration-200

                                                    {{ $product->stock > 0
                                                        ? 'border-[#eee6da] bg-[#fcfaf7] hover:border-[#cdbda9] hover:-translate-y-0.5 hover:shadow-sm'
                                                        : 'border-[#eee6da] bg-[#f4f0ea] opacity-60'
                                                    }}
                                                "
                                            >


                                                {{-- PRODUCT ICON --}}

                                                <div class="w-11 h-11 rounded-xl bg-[#f1e9dd] flex items-center justify-center mb-3">

                                                    <svg
                                                        class="w-5 h-5 text-[#7d6b58]"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                    >

                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="1.8"
                                                            d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m-8-4l8 4m0 0v10"
                                                        />

                                                    </svg>

                                                </div>


                                                {{-- PRODUCT NAME --}}

                                                <h4 class="font-semibold text-sm text-[#453c33] line-clamp-2 min-h-[40px]">

                                                    {{ $product->name }}

                                                </h4>


                                                {{-- SKU --}}

                                                <p class="text-[11px] text-[#a09282] mt-1">

                                                    SKU: {{ $product->sku }}

                                                </p>


                                                {{-- PRICE --}}

                                                <p class="mt-2 font-bold text-[#6f5b45]">

                                                    Rp {{ number_format($product->price, 0, ',', '.') }}

                                                </p>


                                                {{-- STOCK --}}

                                                @if($product->stock > 0)

                                                    <p class="mt-1 text-xs text-[#9a8d7d]">

                                                        Stok {{ $product->stock }}

                                                    </p>

                                                @else

                                                    <p class="mt-1 text-xs font-semibold text-[#a45d50]">

                                                        Stok Habis

                                                    </p>

                                                @endif


                                            </div>

                                        </button>

                                    @endforeach


                                </div>


                                {{-- ================================================= --}}
                                {{-- EMPTY SEARCH --}}
                                {{-- ================================================= --}}

                                <div
                                    id="empty-search"
                                    class="hidden text-center py-12"
                                >

                                    <div class="w-14 h-14 mx-auto rounded-2xl bg-[#f1e9dd] flex items-center justify-center mb-4">

                                        <svg
                                            class="w-6 h-6 text-[#9a8d7d]"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="m21 21-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"
                                            />

                                        </svg>

                                    </div>


                                    <p class="font-semibold text-[#5b5045]">

                                        Produk tidak ditemukan

                                    </p>


                                    <p class="text-sm text-[#9a8d7d] mt-1">

                                        Coba gunakan nama produk atau SKU lain.

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- CART --}}
                    {{-- ================================================= --}}

                    <div class="xl:col-span-1">

                        <div class="cream-card overflow-hidden xl:sticky xl:top-24">


                            {{-- CART HEADER --}}

                            <div class="p-5 border-b border-[#eee6da]">

                                <div class="flex items-center justify-between">


                                    <div>

                                        <h3 class="font-bold text-lg text-[#453c33]">

                                            Keranjang

                                        </h3>


                                        <p
                                            id="cart-count"
                                            class="text-sm text-[#9a8d7d] mt-1"
                                        >

                                            0 item

                                        </p>

                                    </div>


                                    <button
                                        type="button"
                                        id="clear-cart"
                                        class="hidden text-xs font-semibold text-[#a45d50] hover:text-[#81483f]"
                                    >

                                        Kosongkan

                                    </button>

                                </div>

                            </div>


                            {{-- ================================================= --}}
                            {{-- CART ITEMS --}}
                            {{-- ================================================= --}}

                            <div
                                id="cart-items"
                                class="p-5 space-y-3 max-h-[420px] overflow-y-auto"
                            >

                                <div
                                    id="empty-cart"
                                    class="text-center py-10"
                                >

                                    <div class="w-14 h-14 mx-auto rounded-2xl bg-[#f1e9dd] flex items-center justify-center mb-4">

                                        <svg
                                            class="w-6 h-6 text-[#9a8d7d]"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-2 2h12m-9 4a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z"
                                            />

                                        </svg>

                                    </div>


                                    <p class="font-semibold text-[#5b5045]">

                                        Keranjang kosong

                                    </p>


                                    <p class="text-xs text-[#9a8d7d] mt-1">

                                        Pilih produk untuk memulai transaksi.

                                    </p>

                                </div>

                            </div>


                            {{-- ================================================= --}}
                            {{-- SUMMARY --}}
                            {{-- ================================================= --}}

                            <div class="border-t border-[#eee6da] p-5 space-y-4">


                                {{-- TOTAL --}}

                                <div class="flex items-center justify-between">

                                    <span class="text-sm text-[#8d7e6d]">

                                        Total

                                    </span>


                                    <span
                                        id="cart-total"
                                        class="text-xl font-bold text-[#453c33]"
                                    >

                                        Rp 0

                                    </span>

                                </div>


                                {{-- PAYMENT --}}

                                <div>

                                    <label
                                        for="payment_display"
                                        class="block text-sm font-semibold text-[#5b5045] mb-2"
                                    >

                                        Pembayaran

                                    </label>


                                    <div class="relative">

                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#9a8d7d]">

                                            Rp

                                        </span>


                                        <input
                                            type="text"
                                            id="payment_display"
                                            inputmode="numeric"
                                            autocomplete="off"
                                            placeholder="0"
                                            class="w-full pl-11 pr-4 py-3 rounded-xl border-[#e6ddd1] bg-[#fcfaf7] text-[#51473d] placeholder-[#b2a699] focus:border-[#b6a28b] focus:ring-[#d8cabb]"
                                        >


                                        <input
                                            type="hidden"
                                            name="payment"
                                            id="payment"
                                            value="0"
                                        >

                                    </div>

                                </div>


                                {{-- CHANGE --}}

                                <div class="rounded-2xl bg-[#f5efe6] p-4">

                                    <div class="flex items-center justify-between">

                                        <span class="text-sm text-[#8d7e6d]">

                                            Kembalian

                                        </span>


                                        <span
                                            id="change"
                                            class="font-bold text-[#6f5b45]"
                                        >

                                            Rp 0

                                        </span>

                                    </div>

                                </div>


                                {{-- SUBMIT --}}

                                <button
                                    type="submit"
                                    id="submit-transaction"
                                    disabled
                                    class="w-full cream-button justify-center disabled:opacity-40 disabled:cursor-not-allowed"
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


                                    Proses Transaksi

                                </button>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- HIDDEN ITEMS --}}
                {{-- ================================================= --}}

                <div id="hidden-items"></div>

            </form>

        </div>

    </div>


    {{-- ================================================= --}}
    {{-- JAVASCRIPT --}}
    {{-- ================================================= --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {


            /*
            |--------------------------------------------------------------------------
            | CART
            |--------------------------------------------------------------------------
            */

            const cart = {};


            /*
            |--------------------------------------------------------------------------
            | ELEMENTS
            |--------------------------------------------------------------------------
            */

            const productCards =
                document.querySelectorAll('.product-card');

            const productSearch =
                document.getElementById('product-search');

            const emptySearch =
                document.getElementById('empty-search');

            const cartItems =
                document.getElementById('cart-items');

            const emptyCart =
                document.getElementById('empty-cart');

            const cartCount =
                document.getElementById('cart-count');

            const cartTotal =
                document.getElementById('cart-total');

            const clearCart =
                document.getElementById('clear-cart');

            const paymentDisplay =
                document.getElementById('payment_display');

            const paymentInput =
                document.getElementById('payment');

            const changeElement =
                document.getElementById('change');

            const submitButton =
                document.getElementById('submit-transaction');

            const hiddenItems =
                document.getElementById('hidden-items');

            const transactionForm =
                document.getElementById('transaction-form');


            /*
            |--------------------------------------------------------------------------
            | FORMAT NUMBER
            |--------------------------------------------------------------------------
            */

            function formatNumber(number)
            {
                return new Intl.NumberFormat('id-ID')
                    .format(number);
            }


            /*
            |--------------------------------------------------------------------------
            | RENDER CART
            |--------------------------------------------------------------------------
            */

            function renderCart()
            {

                cartItems.innerHTML = '';


                const items =
                    Object.values(cart);


                /*
                |--------------------------------------------------------------------------
                | EMPTY CART
                |--------------------------------------------------------------------------
                */

                if (items.length === 0) {

                    cartItems.appendChild(emptyCart);

                    emptyCart.classList.remove('hidden');

                    clearCart.classList.add('hidden');

                }


                /*
                |--------------------------------------------------------------------------
                | CART HAS ITEMS
                |--------------------------------------------------------------------------
                */

                else {

                    emptyCart.classList.add('hidden');

                    clearCart.classList.remove('hidden');


                    items.forEach(function (item) {


                        const wrapper =
                            document.createElement('div');


                        wrapper.className =
                            'rounded-xl border border-[#eee6da] bg-[#fcfaf7] p-3';


                        wrapper.innerHTML = `

                            <div class="flex justify-between gap-3">

                                <div class="min-w-0">

                                    <p class="font-semibold text-sm text-[#453c33] truncate">

                                        ${item.name}

                                    </p>


                                    <p class="text-xs text-[#9a8d7d] mt-1">

                                        Rp ${formatNumber(item.price)}

                                    </p>

                                </div>


                                <button
                                    type="button"
                                    class="remove-item text-[#a45d50] text-xs"
                                    data-id="${item.id}"
                                >

                                    Hapus

                                </button>

                            </div>


                            <div class="flex items-center justify-between mt-3">


                                <div class="flex items-center border border-[#e6ddd1] rounded-lg overflow-hidden">


                                    <button
                                        type="button"
                                        class="quantity-btn px-3 py-1.5 text-[#6f5b45] hover:bg-[#f1e9dd]"
                                        data-id="${item.id}"
                                        data-action="minus"
                                    >

                                        −

                                    </button>


                                    <span class="px-3 text-sm font-semibold text-[#51473d]">

                                        ${item.quantity}

                                    </span>


                                    <button
                                        type="button"
                                        class="quantity-btn px-3 py-1.5 text-[#6f5b45] hover:bg-[#f1e9dd]"
                                        data-id="${item.id}"
                                        data-action="plus"
                                    >

                                        +

                                    </button>

                                </div>


                                <p class="font-bold text-sm text-[#453c33]">

                                    Rp ${formatNumber(
                                        item.price *
                                        item.quantity
                                    )}

                                </p>

                            </div>

                        `;


                        cartItems.appendChild(wrapper);

                    });

                }


                updateSummary();

                updateHiddenInputs();

            }


            /*
            |--------------------------------------------------------------------------
            | UPDATE SUMMARY
            |--------------------------------------------------------------------------
            */

            function updateSummary()
            {

                const items =
                    Object.values(cart);


                const total =
                    items.reduce(
                        function (sum, item) {

                            return sum +
                                (
                                    item.price *
                                    item.quantity
                                );

                        },
                        0
                    );


                const count =
                    items.reduce(
                        function (sum, item) {

                            return sum +
                                item.quantity;

                        },
                        0
                    );


                /*
                |--------------------------------------------------------------------------
                | CART COUNT
                |--------------------------------------------------------------------------
                */

                cartCount.textContent =
                    `${count} item${count !== 1 ? 's' : ''}`;


                /*
                |--------------------------------------------------------------------------
                | TOTAL
                |--------------------------------------------------------------------------
                */

                cartTotal.textContent =
                    `Rp ${formatNumber(total)}`;


                /*
                |--------------------------------------------------------------------------
                | PAYMENT
                |--------------------------------------------------------------------------
                */

                const payment =
                    parseInt(
                        paymentInput.value || 0
                    );


                /*
                |--------------------------------------------------------------------------
                | CHANGE
                |--------------------------------------------------------------------------
                */

                const change =
                    payment - total;


                changeElement.textContent =
                    `Rp ${formatNumber(
                        Math.max(change, 0)
                    )}`;


                /*
                |--------------------------------------------------------------------------
                | ENABLE SUBMIT
                |--------------------------------------------------------------------------
                */

                submitButton.disabled =
                    items.length === 0 ||
                    payment < total;

            }


            /*
            |--------------------------------------------------------------------------
            | HIDDEN INPUTS
            |--------------------------------------------------------------------------
            */

            function updateHiddenInputs()
            {

                hiddenItems.innerHTML = '';


                Object.values(cart)
                    .forEach(function (item, index) {


                        hiddenItems.innerHTML += `

                            <input
                                type="hidden"
                                name="items[${index}][product_id]"
                                value="${item.id}"
                            >


                            <input
                                type="hidden"
                                name="items[${index}][quantity]"
                                value="${item.quantity}"
                            >

                        `;

                    });

            }


            /*
            |--------------------------------------------------------------------------
            | ADD PRODUCT
            |--------------------------------------------------------------------------
            */

            function addProduct(product)
            {

                const id =
                    product.dataset.id;


                const name =
                    product.dataset.name;


                const price =
                    parseFloat(
                        product.dataset.price
                    );


                const stock =
                    parseInt(
                        product.dataset.stock
                    );


                /*
                |--------------------------------------------------------------------------
                | CHECK STOCK
                |--------------------------------------------------------------------------
                */

                if (stock <= 0) {

                    alert(
                        `Produk ${name} sedang habis.`
                    );

                    return;

                }


                /*
                |--------------------------------------------------------------------------
                | EXISTING PRODUCT
                |--------------------------------------------------------------------------
                */

                if (cart[id]) {


                    if (
                        cart[id].quantity >=
                        stock
                    ) {

                        alert(
                            `Stok ${name} hanya ${stock}.`
                        );

                        return;

                    }


                    cart[id].quantity++;

                }


                /*
                |--------------------------------------------------------------------------
                | NEW PRODUCT
                |--------------------------------------------------------------------------
                */

                else {

                    cart[id] = {

                        id: id,

                        name: name,

                        price: price,

                        stock: stock,

                        quantity: 1

                    };

                }


                renderCart();

            }


            /*
            |--------------------------------------------------------------------------
            | PRODUCT CLICK
            |--------------------------------------------------------------------------
            */

            productCards.forEach(function (card) {


                card.addEventListener(
                    'click',
                    function () {

                        addProduct(this);

                    }
                );

            });


            /*
            |--------------------------------------------------------------------------
            | CART CLICK
            |--------------------------------------------------------------------------
            */

            cartItems.addEventListener(
                'click',
                function (event) {


                    const quantityButton =
                        event.target.closest(
                            '.quantity-btn'
                        );


                    const removeButton =
                        event.target.closest(
                            '.remove-item'
                        );


                    /*
                    |--------------------------------------------------------------------------
                    | QUANTITY BUTTON
                    |--------------------------------------------------------------------------
                    */

                    if (quantityButton) {


                        const id =
                            quantityButton.dataset.id;


                        const action =
                            quantityButton.dataset.action;


                        if (!cart[id]) {

                            return;

                        }


                        /*
                        |--------------------------------------------------------------------------
                        | PLUS
                        |--------------------------------------------------------------------------
                        */

                        if (action === 'plus') {


                            if (
                                cart[id].quantity >=
                                cart[id].stock
                            ) {

                                alert(
                                    `Stok ${cart[id].name} hanya ${cart[id].stock}.`
                                );

                                return;

                            }


                            cart[id].quantity++;

                        }


                        /*
                        |--------------------------------------------------------------------------
                        | MINUS
                        |--------------------------------------------------------------------------
                        */

                        if (action === 'minus') {


                            cart[id].quantity--;


                            if (
                                cart[id].quantity <= 0
                            ) {

                                delete cart[id];

                            }

                        }


                        renderCart();

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | REMOVE
                    |--------------------------------------------------------------------------
                    */

                    if (removeButton) {


                        const id =
                            removeButton.dataset.id;


                        delete cart[id];


                        renderCart();

                    }

                }
            );


            /*
            |--------------------------------------------------------------------------
            | CLEAR CART
            |--------------------------------------------------------------------------
            */

            clearCart.addEventListener(
                'click',
                function () {


                    Object.keys(cart)
                        .forEach(function (key) {

                            delete cart[key];

                        });


                    renderCart();

                }
            );


            /*
            |--------------------------------------------------------------------------
            | SEARCH PRODUCT
            |--------------------------------------------------------------------------
            */

            productSearch.addEventListener(
                'input',
                function () {


                    const keyword =
                        this.value
                            .toLowerCase()
                            .trim();


                    let visible = 0;


                    productCards.forEach(
                        function (card) {


                            const name =
                                (
                                    card.dataset.name ||
                                    ''
                                ).toLowerCase();


                            const sku =
                                (
                                    card.dataset.sku ||
                                    ''
                                ).toLowerCase();


                            /*
                            |--------------------------------------------------------------------------
                            | SEARCH NAME OR SKU
                            |--------------------------------------------------------------------------
                            */

                            const match =
                                name.includes(keyword) ||
                                sku.includes(keyword);


                            if (match) {

                                card.classList.remove(
                                    'hidden'
                                );

                                visible++;

                            }

                            else {

                                card.classList.add(
                                    'hidden'
                                );

                            }

                        }
                    );


                    /*
                    |--------------------------------------------------------------------------
                    | EMPTY SEARCH
                    |--------------------------------------------------------------------------
                    */

                    if (visible === 0) {

                        emptySearch.classList.remove(
                            'hidden'
                        );

                    }

                    else {

                        emptySearch.classList.add(
                            'hidden'
                        );

                    }

                }
            );


            /*
            |--------------------------------------------------------------------------
            | PAYMENT FORMAT
            |--------------------------------------------------------------------------
            */

            paymentDisplay.addEventListener(
                'input',
                function () {


                    /*
                    |--------------------------------------------------------------------------
                    | Hanya angka
                    |--------------------------------------------------------------------------
                    */

                    const raw =
                        this.value.replace(
                            /\D/g,
                            ''
                        );


                    /*
                    |--------------------------------------------------------------------------
                    | Simpan angka asli
                    |--------------------------------------------------------------------------
                    */

                    paymentInput.value =
                        raw;


                    /*
                    |--------------------------------------------------------------------------
                    | Tampilkan format Indonesia
                    |--------------------------------------------------------------------------
                    */

                    this.value =
                        raw
                            ? formatNumber(
                                parseInt(raw)
                            )
                            : '';


                    updateSummary();

                }
            );


            /*
            |--------------------------------------------------------------------------
            | SUBMIT
            |--------------------------------------------------------------------------
            */

            transactionForm.addEventListener(
                'submit',
                function (event) {


                    const items =
                        Object.values(cart);


                    const total =
                        items.reduce(
                            function (sum, item) {

                                return sum +
                                    (
                                        item.price *
                                        item.quantity
                                    );

                            },
                            0
                        );


                    const payment =
                        parseInt(
                            paymentInput.value || 0
                        );


                    /*
                    |--------------------------------------------------------------------------
                    | NO PRODUCT
                    |--------------------------------------------------------------------------
                    */

                    if (items.length === 0) {

                        event.preventDefault();


                        alert(
                            'Silakan pilih minimal satu produk.'
                        );


                        return;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | PAYMENT NOT ENOUGH
                    |--------------------------------------------------------------------------
                    */

                    if (payment < total) {

                        event.preventDefault();


                        alert(
                            'Pembayaran tidak mencukupi.'
                        );


                        return;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | UPDATE INPUT
                    |--------------------------------------------------------------------------
                    */

                    updateHiddenInputs();

                }
            );


            /*
            |--------------------------------------------------------------------------
            | INITIAL RENDER
            |--------------------------------------------------------------------------
            */

            renderCart();

        });

    </script>

</x-app-layout>