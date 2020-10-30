<div class="flex flex-wrap">
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label
                class="block uppercase {{ $errors->has('kategori') ? 'text-red-500':'text-gray-700' }}  text-xs font-bold mb-2"> {{ 'Nama Kategori Produk' }} </label>
            <input type="text" name="kategori"
                   class="px-3 py-3 placeholder-gray-400 {{ $errors->has('kategori') ? 'text-red-500 bg-red':'text-gray-700 bg-white' }} rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                   placeholder="Input Kategori" value="{{$kategori->kategori ?? ''}}"/>
            {!! $errors->first('kategori', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                <label>Upload Icon
                    <a href="javascript:void(0)"
                       class="custom-file-container__image-clear"
                       title="Clear Image">&times;</a>
                </label>
                <label class="custom-file-container__custom-file">
                    <input
                        name="file"
                        type="file"
                        class="custom-file-container__custom-file__custom-file-input"
                        accept="image/*"
                        aria-label="Pilih Icon"/>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div class="custom-file-container__image-preview"></div>
            </div>
        </div>
    </div>
</div>

<hr class="my-4 border-b-1 border-gray-400"/>
<button
    class="bg-green-400 text-white float-right active:bg-green-500 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
    type="submit">{{ $formMode === 'edit' ? 'Ganti' : 'Simpan' }}</button>
@push('script')
    <script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>

    <script>
        var upload = new FileUploadWithPreview("myUniqueUploadId", {
            presetFiles: {!! isset($kategori->icon) ? "[".$kategori->icon."]" : '[]'  !!}
        });
    </script>
@endpush
