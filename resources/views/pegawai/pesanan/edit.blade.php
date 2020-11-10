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
                                <h6 class="uppercase text-gray-900 mb-1 text-xs font-semibold">
                                    Edit
                                </h6>
                                <h2 class="text-gray-900 text-xl font-semibold">
                                    Data Pesanan #{{ $pesanan->id }}
                                </h2>
                            </div>
                            <a href="{{ url('/pegawai/pesanan') }}"
                               class="uppercase tracking-wide text-sm py-3 px-3 bg-red-500 hover:bg-red-400 shadow-lg rounded-lg text-white font-bold mr-2">Kembali</a>
                        </div>
                    </div>
                    <form method="POST" action="{{ url('/pegawai/pesanan/' . $pesanan->id) }}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="flex flex-wrap p-3 justify-start">

                            @include ('pegawai.pesanan.form', ['formMode' => 'edit'])

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
