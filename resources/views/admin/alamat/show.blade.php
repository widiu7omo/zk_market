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
    <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <div class="w-full lg:w-8/12 px-4 mx-auto">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-200 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-gray-800 text-xl font-bold">Detail Alamat #{{ $alamat->id }} </h6>
                        <div>
                            <a href="{{ url('/admin/alamat') }}" title="Back">
                                <button
                                    class="bg-gray-500 text-white active:bg-gray-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    Kembali
                                </button>
                            </a>
                            <a href="{{ url('/admin/alamat/' . $alamat->id . '/edit') }}" title="Edit Alamat">
                                <button
                                    class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                                    <i class="fa fa-pencil-square-o"
                                       aria-hidden="true"></i> Edit
                                </button>
                            </a>
                            <form method="POST" action="{{ url('admin/alamat' . '/' . $alamat->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit"
                                        class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                        title="Delete Alamat"
                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                                                                 aria-hidden="true"></i>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="rounded">
                            <tbody>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    ID
                                </th>
                                <td class="font-bold px-2">{{ $alamat->id }}</td>
                            </tr>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    Alamat Lengkap
                                </th>
                                <td class="font-bold px-2"> {{ $alamat->alamat_lengkap }} </td>
                            </tr>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    Rincian Alamat
                                </th>
                                <td class="font-bold px-2"> {{ $alamat->rincian_alamat }} </td>
                            </tr>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    Latiture
                                </th>
                                <td class="font-bold px-2"> {{ $alamat->lat }} </td>
                            </tr>
                            <tr>
                                <th class="px-5 w-5 align-middle py-3 text-sm uppercase whitespace-no-wrap font-semibold text-left bg-gray-100 text-gray-600 border-gray-200">
                                    Longiture
                                </th>
                                <td class="font-bold px-2"> {{ $alamat->long }} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
