<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="nama" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Nama' }}
        <input required type="text" id="nama" name="nama" placeholder="Input nama"
               value="{{ isset($produk->nama) ? $produk->nama : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('nama', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="harga" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Harga' }}
        <input required type="text" id="harga" name="harga" placeholder="Input harga" autocomplete="off"
               value="{{ isset($produk->harga) ? $produk->harga : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('harga', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="harga_promo" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Harga Promo' }}
        <input type="text" id="harga_promo" name="harga_promo" placeholder="Input harga_promo" autocomplete="off"
               value="{{ isset($produk->harga_promo) ? $produk->harga_promo : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('harga_promo', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="deskripsi" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Deskripsi' }}
        <textarea rows="5" name="deskripsi" id="deskripsi" required placeholder="Input deskripsi"
                  class="px-3 py-3 mt-2 placeholder-gray-400 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none border-2 border-white focus:outline-none focus:shadow-outline w-full transition duration-200 ease-in-out">{{ isset($produk->deskripsi) ? $produk->deskripsi : ''}}</textarea>

        {!! $errors->first('deskripsi', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <div class="relative w-full mb-3">
        <div class="custom-file-container" data-upload-id="myUniqueUploadId">
            <label>Upload Foto
                <a href="javascript:void(0)"
                   class="custom-file-container__image-clear"
                   title="Clear Image">&times;</a>
            </label>
            <label class="custom-file-container__custom-file">
                <input
                    name="gambar[]"
                    type="file"
                    class="custom-file-container__custom-file__custom-file-input"
                    accept="image/*"
                    multiple
                    aria-label="Choose File"/>
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                <span class="custom-file-container__custom-file__custom-file-control"></span>
            </label>
            <div class="custom-file-container__image-preview"></div>
        </div>
    </div>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="kategori_id" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Kategori' }}
        <select name="kategori_id" id="kategori_id"
                class="mt-1 text-gray-800 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-200 ease-in-out sm:text-sm sm:leading-5">
            @foreach ($kategori as $optionKey => $optionValue)
                <option
                    value="{{ $optionValue->id }}" {{ (isset($produk->kategori_id) && $produk->kategori_id == $optionValue->id) ? 'selected' : ''}}>{{ $optionValue->kategori }}</option>
            @endforeach
        </select>

        {!! $errors->first('kategori_id', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="terlaris" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Terlaris' }}
        <fieldset class="p-2 pt-0 w-full md:w-6/12">
            <p class="text-sm leading-5 text-gray-200"></p>
            <div class="mt-4">
                <div class="flex items-center">
                    <input id="terlaris_1" name="terlaris" type="radio" value="1"
                           {{ (isset($produk) && 1 == $produk->terlaris) ? 'checked' : '' }}
                           class="form-radio h-4 w-4 text-blue-500 transition duration-200 ease-in-out">
                    <label for="terlaris_1" class="ml-3">
                        <span class="block text-sm leading-5 font-medium text-gray-900">Ya</span>
                    </label>
                </div>
                <div class="flex items-center">
                    <input id="terlaris_0" name="terlaris" type="radio" value="0"
                           @if (isset($produk)) {{ (0 == $produk->terlaris) ? 'checked' : '' }} @else {{ 'checked' }} @endif
                           class="form-radio h-4 w-4 text-blue-500 transition duration-200 ease-in-out">
                    <label for="terlaris_0" class="ml-3">
                        <span class="block text-sm leading-5 font-medium text-gray-900">Tidak</span>
                    </label>
                </div>
            </div>
        </fieldset>

        {!! $errors->first('terlaris', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="promosi" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Promosi' }}
        <fieldset class="p-2 pt-0 w-full md:w-6/12">
            <p class="text-sm leading-5 text-gray-200"></p>
            <div class="mt-4">
                <div class="flex items-center">
                    <input id="promosi_1" name="promosi" type="radio" value="1"
                           {{ (isset($produk) && 1 == $produk->promosi) ? 'checked' : '' }}
                           class="form-radio h-4 w-4 text-blue-500 transition duration-200 ease-in-out">
                    <label for="promosi_1" class="ml-3">
                        <span class="block text-sm leading-5 font-medium text-gray-900">Ya</span>
                    </label>
                </div>
                <div class="flex items-center">
                    <input id="promosi_0" name="promosi" type="radio" value="0"
                           @if (isset($produk)) {{ (0 == $produk->promosi) ? 'checked' : '' }} @else {{ 'checked' }} @endif
                           class="form-radio h-4 w-4 text-blue-500 transition duration-200 ease-in-out">
                    <label for="promosi_0" class="ml-3">
                        <span class="block text-sm leading-5 font-medium text-gray-900">Tidak</span>
                    </label>
                </div>
            </div>
        </fieldset>

        {!! $errors->first('promosi', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="status" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Status' }}
        <fieldset class="p-2 pt-0 w-full md:w-6/12">
            <p class="text-sm leading-5 text-gray-200"></p>
            <div class="mt-4">
                <div class="flex items-center">
                    <input id="status_1" name="status" type="radio" value="1"
                           {{ (isset($produk) && 1 == $produk->status) ? 'checked' : '' }}
                           class="form-radio h-4 w-4 text-blue-500 transition duration-200 ease-in-out">
                    <label for="status_1" class="ml-3">
                        <span class="block text-sm leading-5 font-medium text-gray-900">Ya</span>
                    </label>
                </div>
                <div class="flex items-center">
                    <input id="status_0" name="status" type="radio" value="0"
                           @if (isset($produk)) {{ (0 == $produk->status) ? 'checked' : '' }} @else {{ 'checked' }} @endif
                           class="form-radio h-4 w-4 text-blue-500 transition duration-200 ease-in-out">
                    <label for="status_0" class="ml-3">
                        <span class="block text-sm leading-5 font-medium text-gray-900">Tidak</span>
                    </label>
                </div>
            </div>
        </fieldset>

        {!! $errors->first('status', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="status" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Produk Baru' }}
        <fieldset class="p-2 pt-0 w-full md:w-6/12">
            <p class="text-sm leading-5 text-gray-200"></p>
            <div class="mt-4">
                <div class="flex items-center">
                    <input id="baru_1" name="baru" type="radio" value="1"
                           {{ (isset($produk) && 1 == $produk->baru) ? 'checked' : '' }}
                           class="form-radio h-4 w-4 text-blue-500 transition duration-200 ease-in-out">
                    <label for="status_1" class="ml-3">
                        <span class="block text-sm leading-5 font-medium text-gray-900">Ya</span>
                    </label>
                </div>
                <div class="flex items-center">
                    <input id="baru_0" name="baru" type="radio" value="0"
                           @if (isset($produk)) {{ (0 == $produk->baru) ? 'checked' : '' }} @else {{ 'checked' }} @endif
                           class="form-radio h-4 w-4 text-blue-500 transition duration-200 ease-in-out">
                    <label for="status_0" class="ml-3">
                        <span class="block text-sm leading-5 font-medium text-gray-900">Tidak</span>
                    </label>
                </div>
            </div>
        </fieldset>

        {!! $errors->first('status', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>


<div class="p-2 pt-0 w-full">
    <input
        class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold"
        type="submit" value="{{ 'Simpan' }}">
</div>
@push('style')
    <link rel="stylesheet" type="text/css"
          href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css"/>
@endpush
@push('script')
    <script src="{{asset('vendor/autonumeric/autoNumeric.min.js')}}"></script>
    <script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>
    @php
        if(isset($produk)){
            $gambar = json_decode($produk->gambar ?? '[]');
            $gambarWithPath = array_map(function ($item){
                return asset('storage/'.$item);
            },$gambar);
        }
    @endphp
    <script>
        var upload = new FileUploadWithPreview("myUniqueUploadId", {
            presetFiles: {!! isset($gambarWithPath) ? json_encode($gambarWithPath) : '[]'  !!}
        });
        new AutoNumeric('#harga', {
            currencySymbol: 'Rp. ',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            allowDecimalPadding: false,
        });
        new AutoNumeric('#harga_promo', {
            currencySymbol: 'Rp. ',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            allowDecimalPadding: false,
        });
    </script>
@endpush
