@extends('layouts.app')

@section('content')
    <div class="px-4 md:px-10 mx-auto w-full h-full -mt-24">
        <div class="flex flex-wrap">
            <div class="w-full xl:mx-auto xl:w-full mb-16 px-4 h-full flex flex-wrap xl:flex-no-wrap">
                <div
                    class="relative flex flex-col min-w-0 break-words h-full w-full mb-6 shadow-lg rounded-lg bg-gray-100 w-full xl:w-8/12 xl:mx-auto">
                    <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                        <div class="flex flex-wrap items-center flex-col lg:flex-row">
                            <div class="relative w-full max-w-full flex-grow w-full xl:w-7/12">
                                <h6 class="uppercase mb-1 text-xs font-semibold">
                                    Tabel
                                </h6>
                                <h2 class="text-xl font-semibold">
                                    Pembayaran
                                </h2>
                            </div>
                            <div class="relative flex flex-no-wrap w-full xl:w-5/12 space-x-2 ">
                                <div class="w-full">
                                <span
                                    class="z-10 h-full leading-snug font-normal absolute text-center text-gray-500 absolute bg-transparent rounded-lg text-base items-center justify-center w-8 pl-3 py-3">
                                    <i class="fas fa-calendar-alt text-gray-600"></i>
                                </span>
                                    <input type="text" id="range_date"
                                           class="px-3 font-bold py-3 placeholder-gray-600 text-gray-700 relative focus:bg-gray-100 bg-gray-300 rounded-lg text-sm outline-none focus:outline-none focus:shadow-outline pl-10">
                                </div>
                                <div class="w-full">
                                <span
                                    class="z-10 h-full leading-snug font-normal absolute text-center text-gray-500 absolute bg-transparent rounded-lg text-base items-center justify-center w-8 pl-3 py-3">
                                    <i class="fas fa-search text-gray-600"></i>
                                </span>
                                    <form method="GET" action="{{ url('/admin/pembayaran') }}" accept-charset="UTF-8"
                                          class="m-0 p-0 w-full">
                                        <input name="search" autocomplete="off"
                                               class="px-3 py-3 placeholder-gray-600 text-gray-700 relative focus:bg-gray-100 bg-gray-300 rounded-lg text-sm outline-none focus:outline-none focus:shadow-outline w-full pl-10"
                                               placeholder="Cari data Pembayaran"
                                               type="text" value="{{ request('search') }}"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="m-4 flex-auto rounded-t-2xl rounded-2xl bg-gray-100 shadow overflow-x-scroll border-gray-700 sm:rounded-lg">
                        <table class="table-responsive rounded-2xl w-full">
                            <thead class="bg-gray-300 border-gray-400 border-0">
                            <tr>
                                <th class="px-4 py-2 w-1/12 text-gray-500 text-left font-light" colspan="2">#</th>
                                <th class="px-4 py-2 w-2/12 text-gray-500 text-left tracking-wider font-light uppercase text-sm">
                                    Metode Pembayaran
                                </th>
                                <th class="px-4 py-2 w-2/12 text-gray-500 text-left tracking-wider font-light uppercase text-sm">
                                    ID Pesanan
                                </th>
                                <th class="px-4 py-2 w-3/12 text-gray-500 text-left tracking-wider font-light uppercase text-sm">
                                    Tanggal Pembayaran
                                </th>
                                <th class="px-4 py-2 w-3/12 text-gray-500 text-left tracking-wider font-light uppercase text-sm">
                                    Status Pembayaran
                                </th>
                                <th class="px-4 py-2 w-3/12 text-gray-500 text-left tracking-wider font-light uppercase text-sm">
                                    Total Bayar
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($pembayaran as $item)
                                <tr>
                                    <td class="whitespace-no-wrap px-4 py-4 text-center whitespace-no-wrap">
                                        <a class="bg-gray-200 text-gray-600 rounded p-2"
                                           href="#"
                                           onclick="openTableOptions(event,'options-dropdown-{{ $loop->iteration }}')"><i
                                                class="fas fa-ellipsis-v text-gray-600"></i></a>
                                        <div
                                            class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                                            id="options-dropdown-{{ $loop->iteration }}"
                                            style="min-width: 12rem;">
                                            <a title="View Pembayaran"
                                               class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                               href="{{ url('/admin/pembayaran/' . $item->id) }}"><i
                                                    class="fas fa-info-circle"></i>&nbsp; Rincian Pembayaran</a>
                                            <div class="h-0 my-2 border border-solid border-gray-200"></div>
                                            <a class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                               href="#">Another
                                                Operation</a>
                                        </div>
                                    </td>
                                    <td class="whitespace-no-wrap px-4 py-4 text-center">{{ $loop->iteration }}</td>
                                    <td class="whitespace-no-wrap px-4 py-4"><img style="height:40px"
                                                                                  src="{{asset('storage/'.$item->metode->icon)}}"/>
                                    </td>
                                    <td class="whitespace-no-wrap px-4 py-4">Pesanan #{{ $item->pesanan->id }}</td>
                                    <td class="whitespace-no-wrap px-4 py-4">{{$item->created_at->isoFormat('DD MMMM YYYY')}}</td>
                                    <td class="whitespace-no-wrap px-4 py-4"><span
                                            class="p-2 text-white text-sm rounded-lg shadow-lg font-bold leading-5 {{ $item->status_pembayaran=='PENDING'?'bg-brown':($item->status_pembayaran === 'SUCCESS'?'bg-green-500':'bg-red-500') }}">{{ $item->status_pembayaran }}</span>
                                    </td>
                                    <td class="whitespace-no-wrap px-4 py-4">
                                        Rp. {{ number_format($item->amount,0,',','.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-4 text-center">Data Empty</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="px-3 py-4 float-right">
                            {!! $pembayaran->onEachSide(1)->links() !!}
                        </div>
                    </div>
                </div>
                <div class="relative flex w-full xl:w-4/12">
                    <div class="mx-auto w-full">
                        <div class="flex flex-wrap flex-col">
                            <div class="w-full px-4 mb-3">
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white rounded-lg mb-6 xl:mb-0 shadow-lg">
                                    <div class="flex-auto p-4">
                                        <div class="flex flex-wrap">
                                            <div class="relative w-full pr-4 max-w-full flex-grow flex-1"><h5
                                                    class="text-gray-500 uppercase font-bold text-xs">Pembayaran
                                                    Tertunda</h5><span
                                                    class="font-semibold text-xl text-gray-800">Rp. {{number_format($pesananDibayar['total'],0,',','.')}}</span>
                                            </div>
                                            <div class="relative w-auto pl-4 flex-initial">
                                                <div
                                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                                                    <i class="far fa-chart-bar"></i></div>
                                            </div>
                                        </div>
                                        <p class="text-sm text-gray-500 mt-4"><span class="text-green-500 mr-2"><i
                                                    class="fas fa-arrow-up"></i> {{number_format($pesananDibayar['jumlah'],0,',','.')}}</span><span
                                                class="whitespace-no-wrap">Pembayaran</span>
                                        </p></div>
                                </div>
                            </div>
                            <div class="w-full px-4 mb-3">
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                    <div class="flex-auto p-4">
                                        <div class="flex flex-wrap">
                                            <div class="relative w-full pr-4 max-w-full flex-grow flex-1"><h5
                                                    class="text-gray-500 uppercase font-bold text-xs">Transaksi
                                                    Selesai</h5>
                                                <span
                                                    class="font-semibold text-xl text-gray-800">Rp. {{number_format($pesananTertunda['total'],0,',','.')}}</span>
                                            </div>
                                            <div class="relative w-auto pl-4 flex-initial">
                                                <div
                                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500">
                                                    <i class="fas fa-chart-pie"></i></div>
                                            </div>
                                        </div>
                                        <p class="text-sm text-gray-500 mt-4"><span class="text-red-500 mr-2"><i
                                                    class="fas fa-arrow-down"></i> {{number_format($pesananTertunda['jumlah'],0,',','.')}}</span><span
                                                class="whitespace-no-wrap">Pembayaran</span>
                                        </p></div>
                                </div>
                            </div>
                            @if($metodePembayaran['total_transaksi'] !== 0 && $metodePembayaran['transfer'])
                                <div class="w-full px-4 mb-3">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1"><h5
                                                        class="text-gray-500 uppercase font-bold text-xs">Pembayaran Transfer</h5>
                                                    <span
                                                        class="font-semibold text-xl text-gray-800">{{$metodePembayaran['transfer']}}</span>
                                                </div>
                                                <div class="relative w-auto pl-4 flex-initial">
                                                    <div
                                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500">
                                                        <i class="fas fa-users"></i></div>
                                                </div>
                                            </div>
                                            <p class="text-sm text-gray-500 mt-4"><span class="text-green-500 mr-2"><i
                                                        class="fas fa-arrow-up"></i> {{(int)($metodePembayaran['transfer']*100/$metodePembayaran['total_transaksi'])}}%</span><span
                                                    class="whitespace-no-wrap">Menggunakan pembayaran Transfer Bank</span>
                                            </p></div>
                                    </div>
                                </div>
                            @endif
                            @if($metodePembayaran['total_transaksi'] !== 0 && $metodePembayaran['cod'])
                                <div class="w-full px-4 mb-3">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1"><h5
                                                        class="text-gray-500 uppercase font-bold text-xs">Bayar ditempat</h5>
                                                    <span
                                                        class="font-semibold text-xl text-gray-800">{{$metodePembayaran['cod']}}</span>
                                                </div>
                                                <div class="relative w-auto pl-4 flex-initial">
                                                    <div
                                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-blue-500">
                                                        <i class="fas fa-percent"></i></div>
                                                </div>
                                            </div>
                                            <p class="text-sm text-gray-500 mt-4"><span class="text-green-500 mr-2"><i
                                                        class="fas fa-arrow-up"></i> {{(int)($metodePembayaran['cod']*100/$metodePembayaran['total_transaksi'])}}%</span><span
                                                    class="whitespace-no-wrap">Menggunakan pembayaran COD</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
