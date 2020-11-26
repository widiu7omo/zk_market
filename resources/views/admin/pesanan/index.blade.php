@extends('layouts.app')

@section('content')
    <div class="px-4 md:px-10 mx-auto w-full h-full -mt-24">
        <div class="flex flex-wrap">
            <div class="w-full xl:mx-auto xl:w-full mb-16 px-4 h-full">
                <div
                    class="relative flex flex-col min-w-0 break-words h-full w-full mb-6 shadow-lg rounded-lg bg-gray-100 w-full xl:mx-auto">
                    <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                        <div class="flex flex-wrap items-center flex-col lg:flex-row">
                            <div class="relative w-full max-w-full flex-grow w-full xl:w-8/12">
                                <h6 class="uppercase text-gray-900 mb-1 text-xs font-semibold">
                                    Tabel
                                </h6>
                                <h2 class="text-gray-900 text-xl font-semibold">
                                    Pesanan
                                </h2>
                            </div>
                            <div class="relative flex flex-no-wrap w-full xl:w-4/12 space-x-2">
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
                                    <form method="GET" action="{{ url('/admin/pesanan') }}" accept-charset="UTF-8"
                                          class="m-0 p-0 w-full">
                                        <input name="search" autocomplete="off"
                                               class="px-3 py-3 placeholder-gray-600 text-gray-700 relative focus:bg-gray-100 bg-gray-300 rounded-lg text-sm outline-none focus:outline-none focus:shadow-outline w-full pl-10"
                                               placeholder="Cari data Pesanan"
                                               type="text" value="{{ request('search') }}"/>
                                    </form>
                                </div>
                            </div>
                            @if(strpos(request()->route()->getName() ,'customer') !== false)
                                <a class="uppercase tracking-wide text-sm py-3 px-3 bg-red-200 hover:bg-red-300 shadow rounded-lg text-red-500 font-bold"
                                   href="{{ url('/admin/customer') }}">Kembali</a>
                            @endif
                        </div>
                    </div>
                    <div
                        class="m-4 flex-auto rounded-t-2xl rounded-2xl bg-gray-100 shadow overflow-auto border-gray-700 sm:rounded-lg">
                        <table class="table-responsive rounded-2xl w-full">
                            <thead class="bg-gray-300 border-gray-400 border-0">
                            <tr>
                                <th class="px-4 py-2 w-1/12 text-gray-500 text-left font-bold" colspan="2">#</th>
                                <th class="px-4 py-2 w-2/12 text-gray-500 text-left tracking-wider font-bold uppercase text-sm">
                                    Status
                                </th>
                                <th class="px-4 py-2 w-2/12 text-gray-500 text-left tracking-wider font-bold uppercase text-sm">
                                    Pemesan
                                </th>
                                <th class="px-4 py-2 w-2/12 text-gray-500 text-left tracking-wider font-bold uppercase text-sm">
                                    Pegawai Pengantar
                                </th>
                                <th class="px-4 py-2 w-3/12 text-gray-500 text-left tracking-wider font-bold uppercase text-sm">
                                    Catatan
                                </th>
                                <th class="px-4 py-2 w-2/12 text-gray-500 text-left tracking-wider font-bold uppercase text-sm">
                                    Waktu
                                </th>
                                <th class="px-4 py-2 w-2/12 text-gray-500 text-left tracking-wider font-bold uppercase text-sm">
                                    Total Pembayaran
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($pesanan as $item)
                                <tr>
                                    <td class="px-4 py-4 text-center whitespace-no-wrap">
                                        <a class="bg-gray-200 text-gray-600 rounded p-2"
                                           href="javascript:void(0)"
                                           onclick="openTableOptions(event,'options-dropdown-{{ $loop->iteration }}')"><i
                                                class="fas fa-ellipsis-v text-gray-600"></i></a>
                                        <div
                                            class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                                            id="options-dropdown-{{ $loop->iteration }}"
                                            style="min-width: 12rem;">
                                            <a title="View Pesanan"
                                               class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                               href="{{ url('/admin/pesanan/' . $item->id) }}"><i
                                                    class="fas fa-info-circle"></i>&nbsp; Detail Pesanan</a>
                                            <a title="Edit Pesanan"
                                               class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                               href="{{ url('/admin/pesanan/' . $item->id . '/edit') }}"><i
                                                    class="fas fa-pen"></i>&nbsp; Edit</a>
                                            <form method="POST"
                                                  action="{{ url('/admin/pesanan' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit"
                                                        class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                                        title="Delete Pesanan"
                                                        onclick="return confirmModal(this)"><i
                                                        class="fas fa-trash"></i>&nbsp; Delete
                                                </button>
                                            </form>
                                            <div class="h-0 my-2 border border-solid border-gray-200"></div>
                                            <form method="POST"
                                                  action="{{ url('/admin/pesanan/' . $item->id) }}"
                                                  accept-charset="UTF-8">
                                                {{ method_field('PATCH') }}
                                                {{ csrf_field() }}
                                                <input type="hidden" name="status_pesanan_id"
                                                       value="{{$statusPembuatanId}}">
                                                <button type="submit"
                                                        class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                                        title="Proses Pembuatan"
                                                        onclick="return confirmModal(this,'Konfirmasi','Apakah anda yakin kembali ke proses pemesanan ?','Yups :D')">
                                                    <i class="fas fa-undo-alt"></i>&nbsp; Proses Pemesanan
                                                </button>
                                            </form>
                                            <form method="POST"
                                                  action="{{ url('/admin/pesanan/' . $item->id) }}"
                                                  accept-charset="UTF-8">
                                                {{ method_field('PATCH') }}
                                                {{ csrf_field() }}
                                                <input type="hidden" name="status_pesanan_id"
                                                       value="{{$statusPembuatanId}}">
                                                <button type="submit"
                                                        class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                                        title="Proses Pembuatan"
                                                        onclick="return confirmModal(this,'Konfirmasi','Apakah anda yakin melanjutkan ke proses pembuatan ?','Yups :D')">
                                                    <i class="fas fa-sync-alt"></i>&nbsp; Proses Pembuatan
                                                </button>
                                            </form>
                                            <form method="POST"
                                                  action="{{ url('/admin/pesanan/' . $item->id) }}"
                                                  accept-charset="UTF-8">
                                                {{ method_field('PATCH') }}
                                                {{ csrf_field() }}
                                                <input type="hidden" name="status_pesanan_id"
                                                       value="{{$statusPengantaranId}}">
                                                <button type="submit"
                                                        class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                                        title="Proses Pengantaran"
                                                        onclick="return confirmModal(this,'Konfirmasi','Apakah anda yakin melakukan proses pengantaran oleh kurir ?','Antar Dong :D')">
                                                    <i class="fas fa-people-carry"></i>&nbsp;Proses Pengantaran
                                                </button>
                                            </form>
                                            <form method="POST"
                                                  action="{{ url('/admin/pesanan/' . $item->id) }}"
                                                  accept-charset="UTF-8">
                                                {{ method_field('PATCH') }}
                                                {{ csrf_field() }}
                                                <input type="hidden" name="status_pesanan_id"
                                                       value="{{$statusSelesaiId}}">
                                                <button type="submit"
                                                        class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                                        title="Pesanan Selesai"
                                                        onclick="return confirmModal(this,'Konfirmasi','Apakah anda yakin ingin menyelesaikan pemesanan ?','Selesai Kaka :D')">
                                                    <i class="fas fa-check"></i>&nbsp; Pesanan Selesai
                                                </button>
                                            </form>
                                            <form method="POST"
                                                  action="{{ url('/admin/pesanan/' . $item->id) }}"
                                                  accept-charset="UTF-8">
                                                {{ method_field('PATCH') }}
                                                {{ csrf_field() }}
                                                <input type="hidden" name="status_pesanan_id"
                                                       value="{{$statusBatalId}}">
                                                <button type="submit"
                                                        class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                                        title="Batalkan Pesanan"
                                                        onclick="return confirmModal(this,'Konfirmasi','Apakah anda yakin ingin membatalkan pemesanan ?','Iya, Batal Kaka :D')">
                                                    <i class="fas fa-trash"></i>&nbsp; Pesanan Batal
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="whitespace-no-wrap px-4 py-4 text-center">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-4 whitespace-no-wrap">
                                        <span
                                            class="px-2 py-1 text-white text-sm shadow-lg font-bold  uppercase bg-{{
                                                $item->status_pesanan->status_pesanan == 'pemesanan'?'brown':
                                                    ($item->status_pesanan->status_pesanan == 'pembuatan'?'orange-400':
                                                        ($item->status_pesanan->status_pesanan == 'pengantaran'?'blue-400':
                                                            ($item->status_pesanan->status_pesanan == 'sampai'?'green-400':'red-400')
                                                        )
                                                    )
                                                }} rounded">{{ $item->status_pesanan->status_pesanan }}</span><br>
                                        <small class="text-gray-500 text-sm">Pembayaran:</small><br>
                                        <span
                                            class="px-2 py-1 text-white text-sm shadow-lg font-bold  uppercase {{$item->status_bayar->status_bayar=='belum bayar'?'bg-red-500':'bg-green-500'}} rounded">{{ $item->status_bayar->status_bayar }}</span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-no-wrap">
                                        <div class="text-sm text-gray-500">#{{$item->id}}</div>
                                        <div
                                            class="text-sm uppercase font-bold">{{ $item->alamat->customer->nama ?? ''}}</div>
                                        <div class="text-sm font-italic">{{ $item->alamat->customer->no_hp ?? ''}}</div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-no-wrap text-sm uppercase leading-5 font-bold">{!! $item->pegawai->nama??'<span class="p-2 rounded-lg bg-red-500 text-white">Belum ditentukan</span>'!!} </td>
                                    <td class="px-4 py-4 whitespace-no-wrap text-sm">{{ $item->catatan == ''?'Tidak ada catatan':$item->catatan }}</td>
                                    <td class="px-4 py-4 whitespace-no-wrap text-sm font-bold text-gray-600">{{ $item->created_at->isoFormat('DD MMMM YYYY') }}
                                        <br>{{ $item->created_at->isoFormat('HH:mm') }}</td>
                                    <td class="px-4 py-4 whitespace-no-wrap text-sm font-bold text-gray-800">
                                        Rp. {{ number_format($item->total_bayar,0,',','.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="p-4 text-gray-800 text-center">Data Empty</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="px-3 py-4 float-right">
                            {!! $pesanan->onEachSide(1)->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
