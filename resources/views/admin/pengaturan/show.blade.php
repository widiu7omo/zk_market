<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan') }}
        </h2>
    </x-slot>
    @livewire('admin.components.navbar',['active'=>'Manajemen Pengaturan'])
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
                        <h6 class="text-gray-800 text-xl font-bold">Detail Pengaturan #{{ $pengaturan->name }} </h6>
                        <div>
                            <a href="{{ url('/admin/pengaturan/' . $pengaturan->id . '/edit') }}"
                               title="Edit Pengaturan">
                                <button
                                    class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                                    <i class="fa fa-pencil-square-o"
                                       aria-hidden="true"></i> Edit
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="rounded">
                            <tbody>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    Nama Bisnis
                                </th>
                                <td class="font-bold px-2"> {{ $pengaturan->nama_bisnis }} </td>
                            </tr>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    No Wa
                                </th>
                                <td class="font-bold px-2"> {{ $pengaturan->no_wa }} </td>
                            </tr>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    Tipe Ongkir
                                </th>
                                <td class="font-bold px-2"> {{ $pengaturan->tipe_ongkir }} </td>
                            </tr>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    Alamat
                                </th>
                                <td class="font-bold px-2"> {{ $pengaturan->alamat }} </td>
                            </tr>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    Koordinat
                                </th>
                                <td class="font-bold px-2">
                                    <div>
                                        <span>Latitude : {{ $pengaturan->lat }}</span><span> Longiture : {{ $pengaturan->long }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    Google Maps Api Key
                                </th>
                                <td class="font-bold px-2"> {{ $pengaturan->google_api }} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
