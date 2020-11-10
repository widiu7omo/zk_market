<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="keterangan" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Keterangan' }}
        <input required type="text" id="keterangan" name="keterangan" placeholder="Input keterangan"
               value="{{ isset($slider->keterangan) ? $slider->keterangan : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('keterangan', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
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
                    name="file"
                    type="file"
                    class="custom-file-container__custom-file__custom-file-input"
                    accept="image/*"
                    aria-label="Choose File"/>
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                <span class="custom-file-container__custom-file__custom-file-control"></span>
            </label>
            <div class="custom-file-container__image-preview"></div>
        </div>
    </div>
</div>

<div class="p-2 pt-0 w-full">
    <input
        class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold"
        type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
@push('style')
    <link rel="stylesheet" type="text/css"
          href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css"/>
@endpush
@push('script')
    <script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>
    <script>
        var upload = new FileUploadWithPreview("myUniqueUploadId", {
            presetFiles: {{isset($slider->url)?'['.$slider->url.']':'[]'}}
        });
    </script>
@endpush
