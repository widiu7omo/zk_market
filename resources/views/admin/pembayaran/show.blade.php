@extends('layouts.app')

@section('content')
    <div class="px-4 md:px-10 mx-auto w-full h-full -mt-24">
        <div class="flex flex-wrap">
            <div class="w-full xl:m-auto flex flex-wrap xl:flex-no-wrap xl:w-full xl:mb-20 mb-16 px-4 h-full">
                <div
                    class="relative flex flex-col min-w-0 break-words h-full w-full max-w-screen-lg xl:mx-auto mb-6 shadow-lg rounded-lg bg-gray-100 mr-0 ">
                    <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                <h6 class="uppercase text-gray-900 mb-1 text-xs font-semibold">
                                    Informasi
                                </h6>
                                <h2 class="text-gray-900 text-xl font-semibold">
                                    Pembayaran #{{$pembayaran->id}}
                                </h2>
                            </div>
                            <a href="{{ url('/admin/pembayaran') }}"
                               class="uppercase tracking-wide text-sm py-3 px-3 bg-red-500 hover:bg-red-400 shadow-lg rounded-lg text-white font-bold mr-2">Kembali</a>
                        </div>
                    </div>
                    <div class="flex flex-wrap lg:flex-no-wrap w-full">
                        <div class="w-full">
                            <div class="p-3 pb-0 text-sm font-bold text-gray-500 uppercase">Detail Pemesan</div>
                            <div class="flex flex-wrap p-3 pt-0 justify-start flex-row m-3 border-2 rounded-lg">
                                <table class="table-responsive text-gray-900">
                                    <tr>
                                        <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase"> Nama
                                            Pemesan
                                        </th>
                                        <td class="px-4 py-2 leading-snug uppercase"> {{ $pembayaran->pesanan->alamat->customer->nama }} </td>
                                    </tr>
                                    <tr>
                                        <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase"> Nomor Hp
                                        </th>
                                        <td class="px-4 py-2 leading-snug"> {{ $pembayaran->pesanan->alamat->customer->no_hp}} </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 pb-0 text-sm font-bold text-gray-500 uppercase">Pembayaran</div>
                    <div class="flex flex-wrap p-3 pt-0 justify-start flex-row m-3 border-2 rounded-lg">
                        <table class="table-responsive text-gray-900">
                            <tr>
                                <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase"> Metode Pembayaran
                                </th>
                                <td class="px-4 py-2 leading-snug"> {{ $pembayaran->pesanan->pembayaran->metode_pembayaran }} </td>
                            </tr>
                            <tr>
                                <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase"> Status Pembayaran
                                </th>
                                <td class="px-4 py-2 leading-snug"><span
                                        class="p-2 font-bold uppercase text-white rounded {{ $pembayaran->pesanan->status_bayar->status_bayar == 'belum bayar'?'bg-brown':($pembayaran->pesanan->status_bayar->status_bayar === 'gagal bayar'?'bg-red-500':'bg-green-500')}}">{{ $pembayaran->pesanan->status_bayar->status_bayar}}</span>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase">
                                    Amount / Total yang di bayar
                                </th>
                                <td class="px-4 py-2 leading-snug font-bold">
                                    Rp. {{ number_format($pembayaran->pesanan->pembayaran->amount,0,',','.') }} </td>
                            </tr>
                        </table>
                    </div>
                    <div class="p-3 pb-0 text-sm font-bold text-gray-500 uppercase">Produk dibeli</div>
                    <div class="flex flex-wrap p-3 pt-0 justify-start flex-row m-3 border-2 rounded-lg">
                        <table class="table-responsive text-gray-900 w-full">
                            @foreach($pembayaran->pesanan->detail_pesanans ?? [] as $detail)
                                <tr>
                                    <th class="w-12/12 text-left mr-2 tracking-wide text-gray-600 text-sm"> {{$detail->produk->nama}}
                                        x {{$detail->jumlah}}
                                    </th>
                                    <td class="px-0 py-2 leading-snug text-gray-600 text-right text-sm font-bold">
                                        Rp. {{ number_format(($detail->produk->harga * $detail->jumlah) ,0,',','.') }} </td>
                                </tr>
                                @if($detail->produk->promosi == 1)
                                    <tr>
                                        <th class="w-12/12 text-left mr-2 tracking-wide text-gray-600 text-sm">Promo
                                        </th>
                                        <td class="px-0 py-2 leading-snug text-red-400 text-right text-sm font-bold">
                                            -
                                            Rp. {{ number_format((($detail->produk->harga - $detail->produk->harga_promo) * $detail->jumlah),0,',','.') }} </td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr class="border-t-2">
                                <th class="w-12/12 text-left mr-2 font-bold tracking-wide uppercase text-sm text-orange-400">
                                    Ongkos Kirim
                                </th>
                                <td class="px-0 py-2 leading-snug text-sm font-bold text-right text-orange-400">
                                    Rp. {{ number_format($pembayaran->pesanan->total_ongkir,0,',','.') }} </td>
                            </tr>
                            <tr>
                                <th class="w-12/12 text-left mr-2 font-bold tracking-wider uppercase text-sm font-bold text-gray-600">
                                    Amount / Total yang di bayar
                                </th>
                                <td class="px-0 py-2 leading-snug font-bold text-sm text-right font-bold text-gray-600">
                                    Rp. {{ number_format($pembayaran->pesanan->total_bayar,0,',','.') }} </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
