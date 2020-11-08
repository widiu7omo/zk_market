@extends('layouts.app')

@section('content')
    <div class="px-4 md:px-10 mx-auto w-full h-full -mt-24">
        <div class="flex flex-wrap">
            <div class="w-full xl:mx-auto xl:w-full mb-16 px-4 h-full">
                <div
                    class="relative flex flex-col min-w-0 break-words h-full w-full mb-6 shadow-lg rounded-lg bg-gray-100 xl:mx-auto">
                    <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                <h6 class="uppercase text-gray-900 mb-1 text-xs font-semibold">
                                    Detail
                                </h6>
                                <h2 class="text-gray-900 text-xl font-semibold">
                                    Pesanan #{{$pesanan->id}}
                                </h2>
                            </div>
                            <a href="{{ url('/admin/pesanan') }}"
                               class="uppercase tracking-wide text-sm py-3 px-3 bg-red-500 hover:bg-red-400 shadow-lg rounded-lg text-white font-bold mr-2">Kembali</a>
                            <a href="{{ url('/admin/pesanan/' . $pesanan->id . '/edit') }}"
                               class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold mr-2">Edit</a>
                            <form method="POST" action="{{ url('admin/pesanan' . '/' . $pesanan->id) }}"
                                  accept-charset="UTF-8" class="m-0 p-0">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit"
                                        class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold"
                                        title="Delete Pesanan" onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                        class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="flex flex-wrap lg:flex-no-wrap w-full">
                        <div class="w-full">
                            <div class="pl-3 m-0 pb-0 text-sm font-bold text-gray-500 uppercase">Rincian Pesanan</div>
                            <div class="flex flex-wrap p-3 pt-0 justify-start flex-row m-3 border-2 rounded-lg">
                                <table class="table-fixed text-gray-900">
                                    <tr>
                                        <th class="w-12/12 mr-2 text-left">ID#</th>
                                        <td class="px-4 py-2">{{ $pesanan->id }}</td>
                                    </tr>
                                    <tr>
                                        <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase"> Waktu
                                            Pesan
                                        </th>
                                        <td class="px-4 py-2 leading-snug"> {{ $pesanan->waktu_pesan }} </td>
                                    </tr>
                                    <tr>
                                        <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase"> Waktu
                                            Sampai
                                        </th>
                                        <td class="px-4 py-2 leading-snug"> {{ $pesanan->waktu_sampai == ''?'Belum ditentukan':$pesanan->waktu_sampai }} </td>
                                    </tr>
                                    <tr>
                                        <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase"> Tanggal
                                        </th>
                                        <td class="px-4 py-2 leading-snug"> {{ $pesanan->created_at->isoFormat('DD MMMM YYYY') }} </td>
                                    </tr>
                                    <tr>
                                        <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase"> Status
                                            Pemesanan
                                        </th>
                                        <td class="px-4 py-2 leading-snug"><span
                                                class="p-2 bg-brown uppercase rounded text-white font-bold">{{ $pesanan->status_pesanan->status_pesanan }}</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="p-3 pb-0 text-sm font-bold text-gray-500 uppercase">Detail Pemesan</div>
                            <div class="flex flex-wrap p-3 pt-0 justify-start flex-row m-3 border-2 rounded-lg">
                                <table class="table-fixed text-gray-900">
                                    <tr>
                                        <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase"> Nama
                                            Pemesan
                                        </th>
                                        <td class="px-4 py-2 leading-snug uppercase"> {{ $pesanan->alamat->customer->nama }} </td>
                                    </tr>
                                    <tr>
                                        <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase"> Nomor Hp
                                        </th>
                                        <td class="px-4 py-2 leading-snug"> {{ $pesanan->alamat->customer->no_hp}} </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 pb-0 text-sm font-bold text-gray-500 uppercase">Pembayaran</div>
                    <div class="flex flex-wrap p-3 pt-0 justify-start flex-row m-3 border-2 rounded-lg">
                        <table class="table-fixed text-gray-900">
                            <tr>
                                <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase"> Metode Pembayaran
                                </th>
                                <td class="px-4 py-2 leading-snug"> {{ $pesanan->pembayaran->metode_pembayaran }} </td>
                            </tr>
                            <tr>
                                <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase"> Status Pembayaran
                                </th>
                                <td class="px-4 py-2 leading-snug"><span
                                        class="p-2 font-bold uppercase text-white rounded {{ $pesanan->pembayaran->status_pembayaran == 'PENDING'?'bg-red-500':'bg-brown'}}">{{ $pesanan->pembayaran->status_pembayaran}}</span>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase">
                                    Amount / Total yang di bayar
                                </th>
                                <td class="px-4 py-2 leading-snug font-bold">
                                    Rp. {{ number_format($pesanan->pembayaran->amount,0,',','.') }} </td>
                            </tr>
                        </table>
                    </div>
                    <div class="p-3 pb-0 text-sm font-bold text-gray-500 uppercase">Alamat Pengantaran</div>
                    <div class="flex flex-wrap p-3 pt-0 justify-start flex-row m-3 border-2 rounded-lg">
                        <table class="table-fixed text-gray-900">
                            <tr>
                                <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase"> Alamat
                                    Lengkap
                                </th>
                                <td class="px-4 py-2 leading-snug"> {{ $pesanan->alamat->alamat_lengkap }} </td>
                            </tr>
                            <tr>
                                <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase"> Keterangan
                                </th>
                                <td class="px-4 py-2 leading-snug"> {{ $pesanan->alamat->rincian_alamant == ''?'Tidak ada keterangan tambahan':$pesanan->alamat->rincian_alamant}} </td>
                            </tr>
                            <tr>
                                <th class="w-12/12 text-left mr-2 font-bold tracking-wider flex justify-start uppercase">
                                    Direction
                                </th>
                                <td class="px-4 py-2 leading-snug">
                                    <div>
                                        <a href="{{url('')}}"
                                           class="p-2 bg-blue-400 rounded mb-2 font-bold hover:bg-blue-800 hover:text-white"><i
                                                class="fa fa-map"></i>&nbsp;Direction Map</a>
                                        <div class="mt-2">
                                            <small><i>Anda akan di arahkan ke
                                                    aplikasi google maps.</i></small></div>
                                    </div>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
