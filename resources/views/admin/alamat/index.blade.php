@extends('layouts.app')

@section('content')
    <div class="px-4 md:px-10 mx-auto w-full h-full -mt-24">
        <div class="flex flex-wrap">
            <div class="w-full xl:mx-auto xl:w-full mb-16 px-4 h-full">
                <div
                    class="relative flex flex-col min-w-0 break-words h-full w-full mb-6 shadow-lg rounded-lg bg-gray-100 w-full xl:max-w-screen-lg xl:mx-auto">
                    <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                <h6 class="uppercase mb-1 text-xs font-semibold">
                                    Data
                                </h6>
                                <h2 class="text-xl font-semibold">
                                    Alamat
                                </h2>
                            </div>
                            <div class="relative flex flex-wrap items-stretch lg:w-3/12 block mr-5">
                                <span
                                    class="z-10 h-full leading-snug font-normal absolute text-center text-gray-500 absolute bg-transparent rounded-lg text-base items-center justify-center w-8 pl-3 py-3">
                                    <i class="fas fa-search text-gray-600"></i>
                                </span>
                                <form method="GET" action="{{ url('/admin/alamat') }}" accept-charset="UTF-8"
                                      class="m-0 p-0 w-full">
                                    <input name="search" autocomplete="off"
                                           class="px-3 py-3 placeholder-gray-600 text-gray-700 relative focus:bg-gray-100 bg-gray-300 rounded-lg text-sm outline-none focus:outline-none focus:shadow-outline w-full pl-10"
                                           placeholder="Cari Alamat"
                                           type="text" value="{{ request('search') }}"/>
                                </form>
                            </div>
                            @if(strpos(request()->route()->getName() ,'customer') !== false)
                                <a class="uppercase tracking-wide text-sm py-3 px-3 bg-red-200 hover:bg-red-300 shadow rounded-lg text-red-500 font-bold"
                                   href="{{ url('/admin/customer') }}">Kembali</a>
                            @endif
                        </div>
                    </div>
                    <div
                        class="m-4 flex-auto rounded-t-2xl rounded-2xl bg-gray-100 shadow overflow-x-scroll border-gray-700 sm:rounded-lg">
                        <table class="table-responsive rounded-2xl w-full">
                            <thead class="bg-gray-300 border-gray-400 border-0">
                            <tr>
                                <th class="px-4 py-2 w-1/12 text-gray-700 text-left font-light" colspan="2">#</th>
                                <th class="px-4 py-2 w-8/12 text-gray-700 text-left tracking-wider font-light uppercase text-sm">
                                    Alamat Lengkap
                                </th>
                                <th class="px-4 py-2 w-3/12 text-gray-700 text-left tracking-wider font-light uppercase text-sm">
                                    Rincian Alamat
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($alamat as $item)
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
                                            <a title="View Alamat"
                                               class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                               href="{{ url('/admin/alamat/' . $item->id) }}"><i
                                                    class="fas fa-info-circle"></i>&nbsp; View</a>
                                            <a title="Edit Alamat"
                                               class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                               href="{{ url('/admin/alamat/' . $item->id . '/edit') }}"><i
                                                    class="fas fa-pen"></i>&nbsp; Edit</a>
                                            <form method="POST" action="{{ url('/admin/alamat' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit"
                                                        class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                                        title="Delete Alamat"
                                                        onclick="return confirmModal(this)"><i
                                                        class="fas fa-trash"></i>&nbsp; Delete
                                                </button>
                                            </form>
                                            <div class="h-0 my-2 border border-solid border-gray-200"></div>
                                            <a class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                               href="#">Another
                                                Operation</a>
                                        </div>
                                    </td>
                                    <td class="whitespace-no-wrap px-4 py-4 text-center">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-4">{{ $item->alamat_lengkap }}</td>
                                    <td class="whitespace-no-wrap px-4 py-4">{{ $item->rincian_alamat == ''?'Tidak ada detail alamat':$item->rincian_alamat }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-4 text-center">Data Empty</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="px-3 py-4 float-right">
                            {!! $alamat->onEachSide(1)->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
