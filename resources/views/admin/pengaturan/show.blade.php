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
                                    Data Pengaturan
                                </h2>
                            </div>
                            <a href="{{ url('/admin/pengaturan') }}"
                               class="uppercase tracking-wide text-sm py-3 px-3 bg-red-500 hover:bg-red-400 shadow-lg rounded-lg text-white font-bold mr-2">Kembali</a>
                            <a href="{{ url('/admin/pengaturan/' . $pengaturan->id . '/edit') }}"
                               class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold mr-2">Edit</a>
                        </div>
                    </div>
                    <div class="flex flex-wrap p-3 justify-start flex-row m-3">
                        <table class="table-responsive text-gray-900">
                            <tr>
                                <th class="w-3/12 text-left uppercase">Pengaturan</th>
                                <td class="px-4 py-2">Default</td>
                            </tr>
                            <tr>
                                <th class="w-3/12  font-bold whitespace-no-wrap text-left tracking-wider uppercase">
                                    Nama Bisnis
                                </th>
                                <td class="px-4 py-2 leading-snug"> {{ $pengaturan->nama_bisnis }} </td>
                            </tr>
                            <tr>
                                <th class="w-3/12  font-bold whitespace-no-wrap text-left tracking-wider uppercase">
                                    No Wa
                                </th>
                                <td class="px-4 py-2 leading-snug"> {{ $pengaturan->no_wa }} </td>
                            </tr>
                            <tr>
                                <th class="w-3/12 font-bold whitespace-no-wrap text-left tracking-wider uppercase">
                                    Alamat
                                </th>
                                <td class="px-4 py-2 leading-snug"> {{ $pengaturan->alamat }} </td>
                            </tr>
                            <tr>
                                <th class="w-3/12 font-bold tracking-wider text-left uppercase"> Tipe Ongkir</th>
                                <td class="px-4 py-2 leading-snug uppercase"> {{ $pengaturan->tipe_ongkir }} </td>
                            </tr>
                            <tr>
                                <th class="w-3/12 font-bold tracking-wider text-left uppercase whitespace-no-wrap">
                                    Harga
                                    Ongkir
                                </th>
                                <td class="px-4 py-2 leading-snug uppercase">
                                    Rp. {{ number_format($pengaturan->harga_ongkir,0,',','.') }} </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:max-w-screen-lg xl:mx-auto">
        <p class="font-bold text-gray-500 text-sm uppercase mb-4">Lokasi Peta Bisnis</p>
        <div class="mb-24 shadow-lg " style="height: 400px;border-radius: 12px"
             id="map"></div>
        </div>
    </div>
    @push('script')
        <script
            src="https://maps.google.com/maps/api/js?key={{$pengaturan->google_api??'NULL'}}&libraries=places&amp;"></script>
        <script>
            let opts = {
                zoom: 17,
                center: {
                    lat: -{!! $pengaturan->lat ?? 0 !!}, lng: {!! $pengaturan->long ?? 0 !!}},
                disableDefaultUI: true
            }
            let maps = new google.maps.Map(document.getElementById('map'), opts);
            marker = new google.maps.Marker({
                map: maps,
                anchorPoint: new google.maps.Point(0, -29)
            });
            marker.setPosition({lat: -{!! $pengaturan->lat ?? 0 !!}, lng: {!! $pengaturan->long ?? 0 !!}})
        </script>
    @endpush
@endsection
