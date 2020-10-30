<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alamat') }}
        </h2>
    </x-slot>
    @livewire('admin.components.navbar',['active'=>'Manajemen Alamat'])
    <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12">
        <div class="px-4 md:px-10 mx-auto w-full">
            @livewire('admin.components.widget',['show'=>false])
        </div>
    </div>
    <div class="w-full lg:w-8/12 px-4 mx-auto -m-24">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-200 border-0">
            <div class="rounded-t bg-white mb-0 px-6 py-6">
                <div class="text-center flex justify-between">
                    <h6 class="text-gray-800 text-xl font-bold">Ubah Alamat</h6>
                    <div>
                        <a href="{{ url('/admin/alamat') }}" title="Back">
                            <button
                                class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Kembali
                            </button>
                        </a>
                    </div>
                </div>
            </div>
             @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="{{ url('/admin/alamat/' . $alamat->id) }}" method="post" accept-charset="UTF-8"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <h6 class="text-gray-500 text-sm mt-3 mb-6 font-bold uppercase"> Alamat </h6>
                    @include ('admin.alamat.form', ['formMode' => 'edit'])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
