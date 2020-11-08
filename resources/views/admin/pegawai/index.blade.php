@extends('layouts.app')

@section('content')
<div class="px-4 md:px-10 mx-auto w-full h-screen -m-24">
        <div class="flex flex-wrap">
            <div class="w-full xl:m-auto xl:w-full mb-12 xl:mb-0 px-4 h-full">
                <div class="relative flex flex-col min-w-0 break-words h-full w-full mb-6 shadow-lg rounded-lg bg-gray-100 w-full xl:max-w-screen-lg xl:mx-auto">
                    <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                <h6 class="uppercase text-gray-900 mb-1 text-xs font-semibold">
                                    Tabel
                                </h6>
                                <h2 class="text-gray-900 text-xl font-semibold">
                                    Pegawai
                                </h2>
                            </div>
                            <div class="relative flex flex-wrap items-stretch lg:w-3/12 block mr-5">
                                <span class="z-10 h-full leading-snug font-normal absolute text-center text-gray-500 absolute bg-transparent rounded-lg text-base items-center justify-center w-8 pl-3 py-3">
                                    <i class="fas fa-search text-gray-600"></i>
                                </span>
                                <form method="GET" action="{{ url('/admin/pegawai') }}" accept-charset="UTF-8" class="m-0 p-0 w-full">
                                    <input name="search" autocomplete="off" class="px-3 py-3 placeholder-gray-600 text-gray-700 relative focus:bg-gray-100 bg-gray-300 rounded-lg text-sm outline-none focus:outline-none focus:shadow-outline w-full pl-10"
                                       placeholder="Cari data Pegawai"
                                       type="text" value="{{ request('search') }}"/>
                                </form>
                            </div>
                            <a class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold"
                               href="{{ url('/admin/pegawai/create') }}">Add New Pegawai</a>
                        </div>
                    </div>
                    <div class="m-4 flex-auto rounded-t-2xl rounded-2xl bg-gray-100 shadow overflow-x-scroll border-gray-700 sm:rounded-lg">
                        <table class="table-fixed rounded-2xl">
                            <thead class="bg-gray-300 border-gray-400 border-0">
                            <tr>
                                <th class="px-4 py-2 w-1/12 text-gray-500 text-left font-light" colspan="2">#</th>
                                <th class="px-4 py-2 w-10/12 text-gray-500 text-left tracking-wider font-light uppercase text-sm">Nama</th><th class="px-4 py-2 w-10/12 text-gray-500 text-left tracking-wider font-light uppercase text-sm">Jenis Kelamin</th><th class="px-4 py-2 w-10/12 text-gray-500 text-left tracking-wider font-light uppercase text-sm">Nohp</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($pegawai as $item)
                            <tr>
                                <td class="px-4 py-4 text-center whitespace-no-wrap">
                                    <a class="bg-gray-200 text-gray-600 rounded p-2"
                                       href="#" onclick="openTableOptions(event,'options-dropdown-{{ $loop->iteration }}')"><i
                                            class="fas fa-ellipsis-v text-gray-600"></i></a>
                                    <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                                         id="options-dropdown-{{ $loop->iteration }}"
                                         style="min-width: 12rem;">
                                        <a title="View Pegawai" class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                           href="{{ url('/admin/pegawai/' . $item->id) }}"><i class="fas fa-info-circle"></i>&nbsp; View</a>
                                        <a title="Edit Pegawai" class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                           href="{{ url('/admin/pegawai/' . $item->id . '/edit') }}"><i class="fas fa-pen"></i>&nbsp; Edit</a>
                                        <form method="POST" action="{{ url('/admin/pegawai' . '/' . $item->id) }}" accept-charset="UTF-8">
                                           {{ method_field('DELETE') }}
                                           {{ csrf_field() }}
                                           <button type="submit" class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800" title="Delete Pegawai" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash"></i>&nbsp; Delete</button>
                                        </form>
                                        <div class="h-0 my-2 border border-solid border-gray-200"></div>
                                        <a class="text-sm py-2 px-4 font-normal block whitespace-no-wrap bg-transparent hover:bg-gray-300 m-2 rounded text-gray-800"
                                           href="#">Another
                                            Operation</a>
                                    </div>
                                </td>
                                <td class=" px-4 py-4 text-center">{{ $loop->iteration }}</td>
                                <td class="px-4 py-4">{{ $item->nama }}</td><td class="px-4 py-4">{{ $item->jenis_kelamin }}</td><td class="px-4 py-4">{{ $item->nohp }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="" style="width: 100%">Data Empty</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="px-3 py-4 float-right">
                            {!! $pegawai->onEachSide(1)->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
