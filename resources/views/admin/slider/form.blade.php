<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="keterangan" class="block uppercase text-xs font-bold mb-2">{{ 'Keterangan' }}</label>
            <textarea rows="4"
                      class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                      name="keterangan" type="text" id="keterangan"
                      required>{{ isset($slider->keterangan) ? $slider->keterangan : ''}}</textarea>

            {!! $errors->first('keterangan', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
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
</div>

<hr class="my-4 border-b-1 border-gray-400"/>
<button
    class="bg-green-400 text-white float-right active:bg-green-500 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
    type="submit">{{ $formMode === 'edit' ? 'Edit' : 'Simpan' }}</button>
@push('script')
    <script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>
    <script>
        var upload = new FileUploadWithPreview("myUniqueUploadId", {
            presetFiles: {{isset($slider->url)?'['.$slider->url.']':'[]'}}
        });
    </script>
@endpush
