<div class='flex flex-wrap' xmlns="http://www.w3.org/1999/html">
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="alamat_lengkap" class="block uppercase text-xs font-bold mb-2">{{ 'Alamat Lengkap' }}</label>
            <textarea rows="4"
                      class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                      name="alamat_lengkap" type="text" id="alamat_lengkap"
                      required>{{ isset($alamat->alamat_lengkap) ? $alamat->alamat_lengkap : ''}}</textarea>

            {!! $errors->first('alamat_lengkap', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="rincian_alamat" class="block uppercase text-xs font-bold mb-2">{{ 'Rincian Alamat' }}</label>
            <textarea rows="4"
                      class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                      name="rincian_alamat" type="text" id="rincian_alamat"
                      required>{{ isset($alamat->rincian_alamat) ? $alamat->rincian_alamat : ''}}</textarea>

            {!! $errors->first('rincian_alamat', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
</div>
<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="lat" class="block uppercase text-xs font-bold mb-2">{{ 'Lat' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="lat" type="text" id="lat" value="{{ isset($alamat->lat) ? $alamat->lat : ''}}" required>

            {!! $errors->first('lat', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="long" class="block uppercase text-xs font-bold mb-2">{{ 'Long' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="long" type="text" id="long" value="{{ isset($alamat->long) ? $alamat->long : ''}}" required>

            {!! $errors->first('long', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
</div>
<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <input class="hidden" name="customer_id" type="hidden" id="customer_id"
                   value="{{ isset($alamat->customer_id) ? $alamat->customer_id : ''}}">
        </div>
    </div>
</div>

<hr class="my-4 border-b-1 border-gray-400"/>
<button
    class="bg-green-400 text-white float-right active:bg-green-500 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
    type="submit">{{ $formMode === 'edit' ? 'Edit' : 'Simpan' }}</button>
