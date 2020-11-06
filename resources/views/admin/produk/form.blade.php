<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="nama" class="block uppercase text-xs font-bold mb-2">{{ 'Nama' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="nama" type="text" id="nama" value="{{ isset($produk->nama) ? $produk->nama : ''}}" required>

            {!! $errors->first('nama', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="harga" class="block uppercase text-xs font-bold mb-2">{{ 'Harga' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="harga" type="text" id="harga" value="{{ isset($produk->harga) ? $produk->harga : ''}}" required>

            {!! $errors->first('harga', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
</div>
<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="harga_promo" class="block uppercase text-xs font-bold mb-2">{{ 'Harga Promo' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="harga_promo" type="text" id="harga_promo"
                value="{{ isset($produk->harga_promo) ? $produk->harga_promo : ''}}">

            {!! $errors->first('harga_promo', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="deskripsi" class="block uppercase text-xs font-bold mb-2">{{ 'Deskripsi' }}</label>
            <textarea name="deskripsi" type="textarea" id="deskripsi" required rows="5"
                      class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150">{{ isset($produk->deskripsi) ? $produk->deskripsi : ''}}</textarea>

            {!! $errors->first('deskripsi', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
</div>
<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
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
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="kategori_id" class="block uppercase text-xs font-bold mb-2">{{ 'Kategori Id' }}</label>
            <select name="kategori_id" class="form-select mt-1 block w-full" id="kategori_id">
                @foreach ($kategori as $optionKey => $optionValue)
                    <option
                        value="{{ $optionValue->id }}" {{ (isset($produk->kategori_id) && $produk->kategori_id == $optionValue->id) ? 'selected' : ''}}>{{ $optionValue->kategori }}</option>
                @endforeach
            </select>

            {!! $errors->first('kategori_id', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
</div>
<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="terlaris" class="block uppercase text-xs font-bold mb-2">{{ 'Terlaris' }}</label>
            <label class="inline-flex items-center mt-3">
                <input type="radio" name="terlaris"
                       {{ (isset($produk) && 1 == $produk->terlaris) ? 'checked' : '' }} value="1"
                       class="form-radio h-5 w-5 text-blue-500">
                <span class="ml-2 text-gray-700">Ya</span>
            </label>
            <label class="inline-flex items-center mt-3">
                <input type="radio" name="terlaris"
                       {{ (isset($produk) && 0 == $produk->terlaris) ? 'checked' : '' }} value="0"
                       class="form-radio h-5 w-5 text-blue-500">
                <span class="ml-2 text-gray-700">Tidak</span>
            </label>

            {!! $errors->first('terlaris', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="promosi" class="block uppercase text-xs font-bold mb-2">{{ 'Promosi' }}</label>
            <label class="inline-flex items-center mt-3">
                <input type="radio" name="promosi"
                       {{ (isset($produk) && 1 == $produk->promosi) ? 'checked' : '' }} value="1"
                       class="form-radio h-5 w-5 text-blue-500">
                <span class="ml-2 text-gray-700">Ya</span>
            </label>
            <label class="inline-flex items-center mt-3">
                <input type="radio" name="promosi"
                       {{ (isset($produk) && 0 == $produk->promosi) ? 'checked' : '' }} value="0"
                       class="form-radio h-5 w-5 text-blue-500">
                <span class="ml-2 text-gray-700">Tidak</span>
            </label>

            {!! $errors->first('promosi', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
</div>
<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="status" class="block uppercase text-xs font-bold mb-2">{{ 'Produk baru' }}</label>
            <label class="inline-flex items-center mt-3">
                <input type="radio" name="baru"
                       {{ (isset($produk) && 1 == $produk->baru) ? 'checked' : '' }} value="1"
                       class="form-radio h-5 w-5 text-blue-500">
                <span class="ml-2 text-gray-700">Ya</span>
            </label>
            <label class="inline-flex items-center mt-3">
                <input type="radio" name="baru"
                       {{ (isset($produk) && 0 == $produk->baru) ? 'checked' : '' }} value="0"
                       class="form-radio h-5 w-5 text-blue-500">
                <span class="ml-2 text-gray-700">Tidak</span>
            </label>

            {!! $errors->first('status', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="status" class="block uppercase text-xs font-bold mb-2">{{ 'Status' }}</label>
            <label class="inline-flex items-center mt-3">
                <input type="radio" name="status"
                       {{ (isset($produk) && 1 == $produk->status) ? 'checked' : '' }} value="1"
                       class="form-radio h-5 w-5 text-blue-500">
                <span class="ml-2 text-gray-700">Ya</span>
            </label>
            <label class="inline-flex items-center mt-3">
                <input type="radio" name="status"
                       {{ (isset($produk) && 0 == $produk->status) ? 'checked' : '' }} value="0"
                       class="form-radio h-5 w-5 text-blue-500">
                <span class="ml-2 text-gray-700">Tidak</span>
            </label>

            {!! $errors->first('status', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
</div>

<hr class="my-4 border-b-1 border-gray-400"/>
<button
    class="bg-green-400 text-white float-right active:bg-green-500 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
    type="submit">{{ $formMode === 'edit' ? 'Edit' : 'Simpan' }}</button>
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
