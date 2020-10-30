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
        <div class="lg:w-full mb-12 px-4 mx-auto">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1 flex items-center">
                            <h3 class="font-semibold text-lg text-gray-800"> Data Pengaturan </h3>
                        </div>
                        <div>
                            <a href="{{ url('/admin/pengaturan/create') }}"
                               class="bg-blue-600 text-white hover:bg-blue-500 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                               title="Tambah Pengaturan">
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
                                Nama Bisnis
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                No Wa
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                Tipe Ongkir
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                Alamat
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                Latitude
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                Longitude
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                Google Api
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                <form method="GET" action="{{ url('/admin/pengaturan') }}" accept-charset="UTF-8"
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
                        @if(count($pengaturan) == 0)
                            <tr>
                                <td colspan="0"
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 w-1/3 text-md whitespace-no-wrap p-4">
                                    Belum ada data Pengaturan
                                </td>
                            </tr>
                        @endif
                        @foreach($pengaturan as $item)
                            <tr>
                                <td class="border-t-0 pl-6 align-middle border-l-0 border-r-0 whitespace-no-wrap p-4">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 w-1/3 text-md whitespace-no-wrap p-4">{{ $item->nama_bisnis }}</td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 w-1/3 text-md whitespace-no-wrap p-4">{{ $item->no_wa }}</td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 w-1/3 text-md whitespace-no-wrap p-4">{{ $item->tipe_ongkir }}</td>
                                <td class="text-right pr-5">
                                    <a href="#" class="text-gray-600 block py-1 px-3"
                                       onclick="openDropdown(event,'table-light-{{ $loop->iteration }}-dropdown')">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div
                                        class="hidden bg-white text-base mx-auto z-50 py-2 list-none text-left rounded shadow-md min-w-64 rounded"
                                        id="table-light-{{ $loop->iteration }}-dropdown">
                                        <a href="{{ url('/admin/pengaturan/' . $item->id . '/edit') }}"
                                           class="text-left text-sm py-2 px-4 hover:text-white hover:bg-blue-500 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"><i
                                                class="fa fa-pen"></i>&nbsp;Edit</a>
                                        <a href="{{ url('/admin/pengaturan/' . $item->id) }}"
                                           class="text-left text-sm py-2 px-4 hover:text-white hover:bg-green-500 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"><i
                                                class="fa fa-eye"></i>&nbsp;Lihat</a>
                                        <form method="POST" action="{{ url('/admin/pengaturan' . '/' . $item->id) }}"
                                              accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit"
                                                    class="w-full text-left px-4 py-2 hover:text-white hover:bg-red-500 text-decoration-none bg-white border-none text-sm font-normal text-gray-800"
                                                    title="Delete Pengaturan"
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
                        class="mx-6 my-4"> {!! $pengaturan->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
