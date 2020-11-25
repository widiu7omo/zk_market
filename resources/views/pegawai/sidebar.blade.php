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
            <a class="my-1 hover:shadow-md text-gray-800 hover:text-white rounded-lg px-4 {{$routeName==='slider.index'?'bg-brown-lighter':''}} hover:bg-brown-lighter text-xs uppercase py-3 font-bold block"
               href="{{route('pegawai.slider.index')}}"><i class="fas fa-ticket-alt mr-2 text-sm"></i>
                Slider</a>
        </li>
        <li class="items-center">
            <a class="my-1 hover:shadow-md text-gray-800 hover:text-white rounded-lg px-4 {{$routeName==='produk.index'?'bg-brown-lighter':''}} hover:bg-brown-lighter text-xs uppercase py-3 font-bold block"
               href="{{route('pegawai.produk.index')}}"><i class="fas fa-pizza-slice mr-2 text-sm"></i>
                Produk</a>
        </li>
    </ul>
    <h6 class="md:min-w-full text-gray-600 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
        Transaksi
    </h6>
    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
        <li class="items-center">
            <a class="my-1 hover:shadow-md text-gray-800 hover:text-white rounded-lg px-4 {{$routeName==='pesanan.index'?'bg-brown-lighter':''}} hover:bg-brown-lighter text-xs uppercase py-3 font-bold block"
               href="{{url('pegawai/pesanan')}}"><i class="fas fa-money-check mr-2 text-sm"></i>
                Pesanan</a>
        </li>
    </ul>
</div>
