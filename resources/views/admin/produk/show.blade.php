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
        <div class="w-full lg:w-8/12 px-4 mx-auto">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-200 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-gray-800 text-xl font-bold">Detail Produk #{{ $produk->id }} </h6>
                        <div>
                            <a href="{{ url('/admin/produk') }}" title="Back">
                                <button
                                    class="bg-gray-500 text-white active:bg-gray-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    Kembali
                                </button>
                            </a>
                            <a href="{{ url('/admin/produk/' . $produk->id . '/edit') }}" title="Edit Produk">
                                <button
                                    class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                                    <i class="fa fa-pencil-square-o"
                                       aria-hidden="true"></i> Edit
                                </button>
                            </a>
                            <form method="POST" action="{{ url('admin/produk' . '/' . $produk->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit"
                                        class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                        title="Delete Produk"
                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                                                                 aria-hidden="true"></i>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="rounded">
                            <tbody>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    ID
                                </th>
                                <td class="font-bold px-2">{{ $produk->id }}</td>
                            </tr>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    Nama
                                </th>
                                <td class="font-bold px-2"> {{ $produk->nama }} </td>
                            </tr>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    Deskripsi
                                </th>
                                <td class="font-bold px-2"> {{ $produk->deskripsi }} </td>
                            </tr>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    Harga
                                </th>
                                <td class="font-bold px-2">Rp. {{number_format($produk->harga,'0',',','.') }} </td>
                            </tr>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    Harga Promo
                                </th>
                                <td class="font-bold px-2">
                                    Rp. {{ number_format($produk->harga_promo,'0',',','.') }} </td>
                            </tr>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    Terlaris
                                </th>
                                <td class="font-bold px-2"> {{ $produk->terlaris }} </td>
                            </tr>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    Promosi
                                </th>
                                <td class="font-bold px-2"> {{ $produk->promosi }} </td>
                            </tr>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    Status
                                </th>
                                <td class="font-bold px-2"> {{ $produk->status }} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
