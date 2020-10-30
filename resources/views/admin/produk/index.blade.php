<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produk') }}
        </h2>
    </x-slot>
    @livewire('admin.components.navbar',['active'=>'Manajemen Produk'])
    <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12">
        <div class="px-4 md:px-10 mx-auto w-full">
            @livewire('admin.components.widget',['show'=>false])
        </div>
    </div>
    <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <div class="lg:w-full mb-12 px-4 mx-auto">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1 flex items-center">
                            <h3 class="font-semibold text-lg text-gray-800"> Data Produk </h3>
                        </div>
                        <div>
                            <a href="{{ url('/admin/produk/create') }}"
                               class="bg-blue-600 text-white hover:bg-blue-500 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                               title="Tambah Produk">
                                <i class="fa fa-plus" aria-hidden="true"></i> Tambah
                            </a>
                        </div>
                    </div>
                </div>
                <div class="block w-full overflow-x-auto">
                    <!-- Projects table -->
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                        <tr>
                            <th class="pl-6 w-5 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                No.
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                Nama
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                Deskripsi
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                Harga
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                Harga Promo
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                Terlaris
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                Promosi
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                Status
                            </th>
                            <th class="px-6 w-10 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                <form method="GET" action="{{ url('/admin/produk') }}" accept-charset="UTF-8"
                                      class="form-inline px-3 my-lg-0 float-right" role="search">
                                    <div class="relative flex w-48 flex-wrap items-stretch">
                                    <span
                                        class="z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-5 pl-3 py-2"><i
                                            class="fas fa-search"></i></span>
                                        <input value="{{ request('search') }}" type="text" placeholder="Cari"
                                               name="search"
                                               class="px-3 py-2 placeholder-gray-400 bg-white focus:bg-white text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pl-10">
                                    </div>
                                </form>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($produk) == 0)
                            <tr>
                                <td colspan="0"
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 w-1/3 text-md whitespace-no-wrap p-4">
                                    Belum ada data Produk
                                </td>
                            </tr>
                        @endif
                        @foreach($produk as $item)
                            <tr>
                                <td class="border-t-0 pl-6 align-middle border-l-0 border-r-0 whitespace-no-wrap p-4">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 w-1/3 text-md whitespace-no-wrap p-4">{{ $item->nama }}</td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 w-1/3 text-md whitespace-no-wrap p-4">{{ $item->deskripsi }}</td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 w-1/3 text-md whitespace-no-wrap p-4">
                                    Rp. {{ number_format($item->harga,'0',',','.') }}</td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 w-1/3 text-md whitespace-no-wrap p-4">
                                    Rp. {{ number_format($item->harga_promo,'0',',','.') }}</td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 w-1/3 text-md whitespace-no-wrap p-4">
                                    <span
                                        class="bg-{{ $item->terlaris == 1?'green':'red' }}-500 rounded p-1 w-auto text-white">{{ $item->terlaris == 1?'Ya':'Tidak' }}</span>
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 w-1/3 text-md whitespace-no-wrap p-4">
                                    <span
                                        class="bg-{{ $item->promosi == 1?'green':'red' }}-500 rounded p-1 w-auto text-white">{{ $item->promosi == 1?'Ya':'Tidak' }}</span>
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 w-1/3 text-md whitespace-no-wrap p-4">
                                    <span
                                        class="bg-{{ $item->status == 1?'green':'red' }}-500 rounded p-1 w-auto text-white">{{ $item->status == 1?'Ya':'Tidak' }}</span>
                                </td>
                                <td class="text-right pr-5">
                                    <a href="#" class="text-gray-600 block py-1 px-3"
                                       onclick="openDropdown(event,'table-light-{{$loop->iteration}}-dropdown')">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div
                                        class="hidden bg-white text-base mx-auto z-50 py-2 list-none text-left rounded shadow-md min-w-64 rounded"
                                        id="table-light-{{$loop->iteration}}-dropdown">
                                        <a href="{{ url('/admin/produk/' . $item->id . '/edit') }}"
                                           class="text-left text-sm py-2 px-4 hover:text-white hover:bg-blue-500 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"><i
                                                class="fa fa-pen"></i>&nbsp;Edit</a>
                                        <a href="{{ url('/admin/produk/' . $item->id) }}"
                                           class="text-left text-sm py-2 px-4 hover:text-white hover:bg-green-500 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"><i
                                                class="fa fa-eye"></i>&nbsp;Lihat</a>
                                        <form method="POST" action="{{ url('/admin/produk' . '/' . $item->id) }}"
                                              accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit"
                                                    class="w-full text-left px-4 py-2 hover:text-white hover:bg-red-500 text-decoration-none bg-white border-none text-sm font-normal text-gray-800"
                                                    title="Delete Produk"
                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                    class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div
                        class="mx-6 my-4"> {!! $produk->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
