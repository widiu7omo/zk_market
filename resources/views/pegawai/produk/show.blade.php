@extends('layouts.app')

@section('content')
    <div class="px-4 md:px-10 mx-auto w-full h-full -mt-24">
        <div class="flex flex-wrap">
            <div class="w-full xl:mx-auto xl:w-full mb-16 px-4 h-full">
                <div
                    class="relative flex flex-col min-w-0 break-words h-full w-full mb-6 shadow-lg rounded-lg bg-gray-100 xl:max-w-screen-lg xl:mx-auto">
                    <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                <h6 class="uppercase text-gray-900 mb-1 text-xs font-semibold">
                                    View
                                </h6>
                                <h2 class="text-gray-900 text-xl font-semibold">
                                    Data Produk
                                </h2>
                            </div>
                            <a href="{{ url('/pegawai/produk') }}"
                               class="uppercase tracking-wide text-sm py-3 px-3 bg-red-500 hover:bg-red-400 shadow-lg rounded-lg text-white font-bold mr-2">Kembali</a>
                            <a href="{{ url('/pegawai/produk/' . $produk->id . '/edit') }}"
                               class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold mr-2">Edit</a>
                            <form method="POST" action="{{ url('pegawai/produk' . '/' . $produk->id) }}"
                                  accept-charset="UTF-8" class="m-0 p-0">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit"
                                        class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold"
                                        title="Delete Produk" onclick="return confirmModal(this)"><i
                                        class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    <span class="flex flex-wrap p-3 justify-start flex-row m-3">
                        <table class="table-responsive text-gray-900">
                            <tr>
                                <th class="w-12/12 border-r-2 text-left">ID#</th>
                                <td class="px-4 py-2">{{ $produk->id }}</td>
                            </tr>
                            <tr>
                                <th class="w-12/12 border-r-2 font-bold tracking-wider uppercase text-left"> Nama</th>
                                <td class="px-4 py-2 leading-snug"> {{ $produk->nama }} </td>
                            </tr>
                            <tr>
                                <th class="w-12/12 border-r-2 font-bold tracking-wider uppercase text-left"> Harga</th>
                                <td class="px-4 py-2 leading-snug"> {{ $produk->harga }} </td>
                            </tr>
                            <tr>
                                <th class="w-12/12 border-r-2 font-bold tracking-wider uppercase text-left"> Harga
                                    Promo
                                </th>
                                <td class="px-4 py-2 leading-snug"> {{ $produk->harga_promo }} </td>
                            </tr>
                            <tr>
                                <th class="w-12/12 border-r-2 font-bold tracking-wider uppercase text-left"> Gambar
                                    Produk
                                </th>
                                <td class="px-4 py-2 leading-snug">
                                    @foreach(json_decode($produk->gambar) ?? [] as $gambar)
                                        <span>
                                            <img style="height: 200px" class="h-50 rounded-lg my-2 shadow-sm"
                                                 src="{{asset("storage/$gambar")}}" alt="{{$gambar}}">
                                        </span>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
