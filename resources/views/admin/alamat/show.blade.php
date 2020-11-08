@extends('layouts.app')

@section('content')
<div class="px-4 md:px-10 mx-auto w-full h-full -mt-24">
        <div class="flex flex-wrap">
            <div class="w-full xl:mx-auto xl:w-full mb-16 px-4 h-full">
                <div class="relative flex flex-col min-w-0 break-words h-full w-full mb-6 shadow-lg rounded-lg bg-gray-100 xl:max-w-screen-lg xl:mx-auto">
                    <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                <h6 class="uppercase text-gray-900 mb-1 text-xs font-semibold">
                                    View
                                </h6>
                                <h2 class="text-gray-900 text-xl font-semibold">
                                    Data Alamat
                                </h2>
                            </div>
                            <a href="{{ url('/admin/alamat') }}"
                               class="uppercase tracking-wide text-sm py-3 px-3 bg-red-500 hover:bg-red-400 shadow-lg rounded-lg text-white font-bold mr-2">Kembali</a>
                            <a href="{{ url('/admin/alamat/' . $alamat->id . '/edit') }}"
                               class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold mr-2">Edit</a>
                            <form method="POST" action="{{ url('admin/alamat' . '/' . $alamat->id) }}" accept-charset="UTF-8" class="m-0 p-0">
                               {{ method_field('DELETE') }}
                               {{ csrf_field() }}
                               <button type="submit" class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold" title="Delete Alamat" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="flex flex-wrap p-3 justify-start flex-row m-3">
                        <table class="table-fixed text-gray-900">
                            <tr>
                                <th class="w-3/12 border-r-2 text-left">ID#</th>
                                <td class="px-4 py-2">{{ $alamat->id }}</td>
                            </tr>
                            <tr><th class="w-3/12 border-r-2 font-bold tracking-wider uppercase"> Alamat Lengkap </th><td class="px-4 py-2 leading-snug"> {{ $alamat->alamat_lengkap }} </td></tr><tr><th class="w-3/12 border-r-2 font-bold tracking-wider uppercase"> Rincian Alamat </th><td class="px-4 py-2 leading-snug"> {{ $alamat->rincian_alamat }} </td></tr><tr><th class="w-3/12 border-r-2 font-bold tracking-wider uppercase"> Lat </th><td class="px-4 py-2 leading-snug"> {{ $alamat->lat }} </td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
