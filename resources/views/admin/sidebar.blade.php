<div
    class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
    id="example-collapse-sidebar">
    <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-gray-300">
        <div class="flex flex-wrap">
            <div class="w-6/12">
                <a class="md:block text-center md:pb-2 text-gray-700 mr-0 inline-block whitespace-no-wrap text-sm uppercase font-bold p-4 px-0"
                   href="javascript:void(0)">
                    Zona Kopi Delivery
                </a>
            </div>
            <div class="w-6/12 flex justify-end">
                <button
                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                    onclick="toggleNavbar('example-collapse-sidebar')"
                    type="button">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>
    <form class="mt-6 mb-4 md:hidden">
        <div class="mb-3 pt-0">
            <input
                class="px-3 py-2 h-12 border border-solid border-gray-600 placeholder-gray-400 text-gray-700 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal"
                placeholder="Search"
                type="text"/>
        </div>
    </form>
    <hr class="my-4 md:min-w-full"/>
    @php $routeName = request()->route()->getName()@endphp
    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
        <li class="items-center">
            <a class="my-1 hover:shadow-md text-gray-800 hover:text-white rounded-lg px-4 {{$routeName==='dashboard'?'bg-brown-lighter':''}} hover:bg-brown-lighter text-xs uppercase py-3 font-bold block"
               href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt mr-2 text-sm"></i>
                Dashboard</a>
        </li>
    </ul>
    <h6 class="md:min-w-full text-gray-600 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
        Produk
    </h6>
    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
        <li class="items-center">
            <a class="my-1 hover:shadow-md text-gray-800 hover:text-white rounded-lg px-4 {{$routeName==='kategori.index'?'bg-brown-lighter':''}} hover:bg-brown-lighter text-xs uppercase py-3 font-bold block"
               href="{{route('kategori.index')}}"><i class="fas fa-box mr-2 text-sm"></i>
                Kategori</a>
        </li>
        <li class="items-center">
            <a class="my-1 hover:shadow-md text-gray-800 hover:text-white rounded-lg px-4 {{$routeName==='slider.index'?'bg-brown-lighter':''}} hover:bg-brown-lighter text-xs uppercase py-3 font-bold block"
               href="{{route('slider.index')}}"><i class="fas fa-ticket-alt mr-2 text-sm"></i>
                Slider</a>
        </li>
        <li class="items-center">
            <a class="my-1 hover:shadow-md text-gray-800 hover:text-white rounded-lg px-4 {{$routeName==='produk.index'?'bg-brown-lighter':''}} hover:bg-brown-lighter text-xs uppercase py-3 font-bold block"
               href="{{route('produk.index')}}"><i class="fas fa-pizza-slice mr-2 text-sm"></i>
                Produk</a>
        </li>
    </ul>
    <h6 class="md:min-w-full text-gray-600 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
        Transaksi
    </h6>
    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
        <li class="items-center">
            <a class="my-1 hover:shadow-md text-gray-800 hover:text-white rounded-lg px-4 {{$routeName==='pesanan.index'?'bg-brown-lighter':''}} hover:bg-brown-lighter text-xs uppercase py-3 font-bold block"
               href="{{route('pesanan.index')}}"><i class="fas fa-money-check mr-2 text-sm"></i>
                Pesanan</a>
        </li>
        <li class="items-center">
            <a class="my-1 hover:shadow-md text-gray-800 hover:text-white rounded-lg px-4 {{$routeName==='pembayaran.index'?'bg-brown-lighter':''}} hover:bg-brown-lighter text-xs uppercase py-3 font-bold block"
               href="{{route('pembayaran.index')}}"><i class="fas fa-dollar-sign mr-2 text-sm"></i>
                Pembayaran</a>
        </li>
    </ul>
    <h6 class="md:min-w-full text-gray-600 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
        Master
    </h6>
    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
        <li class="items-center">
            <a class="my-1 hover:shadow-md text-gray-800 hover:text-white rounded-lg px-4 {{$routeName==='customer.index'?'bg-brown-lighter':''}} hover:bg-brown-lighter text-xs uppercase py-3 font-bold block"
               href="{{route('customer.index')}}"><i class="fas fa-users mr-2 text-sm"></i>
                Data Customer</a>
        </li>
        <li class="items-center">
            <a class="my-1 hover:shadow-md text-gray-800 hover:text-white rounded-lg px-4 {{$routeName==='pegawai.index'?'bg-brown-lighter':''}} hover:bg-brown-lighter text-xs uppercase py-3 font-bold block"
               href="{{route('pegawai.index')}}"><i class="fas fa-user-tie mr-2 text-sm"></i>
                Data Pegawai</a>
        </li>
        <li class="items-center">
            <a class="my-1 hover:shadow-md text-gray-800 hover:text-white rounded-lg px-4 {{$routeName==='status-bayar.index'?'bg-brown-lighter':''}} hover:bg-brown-lighter text-xs uppercase py-3 font-bold block"
               href="{{route('status-bayar.index')}}"><i class="fas fa-money-check-alt mr-2 text-sm"></i>
                Data Status Bayar</a>
        </li>
        <li class="items-center">
            <a class="my-1 hover:shadow-md text-gray-800 hover:text-white rounded-lg px-4 {{$routeName==='status-pesanan.index'?'bg-brown-lighter':''}} hover:bg-brown-lighter text-xs uppercase py-3 font-bold block"
               href="{{route('status-pesanan.index')}}"><i class="fas fa-vote-yea mr-2 text-sm"></i>
                Data Status Pesanan</a>
        </li>
    </ul>
    <h6 class="md:min-w-full text-gray-600 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
        Pengaturan
    </h6>
    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
        <li class="items-center">
            <a class="my-1 hover:shadow-md text-gray-800 hover:text-white rounded-lg px-4 {{$routeName==='pengaturan.index'?'bg-brown-lighter':''}} hover:bg-brown-lighter text-xs uppercase py-3 font-bold block"
               href="{{route('pengaturan.index')}}"><i class="fas fa-dice-d6 mr-2 text-sm"></i>
                General</a>
        </li>
    </ul>
</div>
