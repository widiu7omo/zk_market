<div class='flex flex-wrap'><div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
        <label for="nama_bisnis" class="block uppercase text-xs font-bold mb-2">{{ 'Nama Bisnis' }}</label>
        <input class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150" name="nama_bisnis" type="text" id="nama_bisnis" value="{{ isset($pengaturan->nama_bisnis) ? $pengaturan->nama_bisnis : ''}}" required>

        {!! $errors->first('nama_bisnis', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    </div>
</div>
<div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
        <label for="no_wa" class="block uppercase text-xs font-bold mb-2">{{ 'No Wa' }}</label>
        <input class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150" name="no_wa" type="text" id="no_wa" value="{{ isset($pengaturan->no_wa) ? $pengaturan->no_wa : ''}}" required>

        {!! $errors->first('no_wa', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    </div>
</div>
</div><div class='flex flex-wrap'><div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
        <label for="tipe_ongkir" class="block uppercase text-xs font-bold mb-2">{{ 'Tipe Ongkir' }}</label>
        <input class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150" name="tipe_ongkir" type="text" id="tipe_ongkir" value="{{ isset($pengaturan->tipe_ongkir) ? $pengaturan->tipe_ongkir : ''}}" required>

        {!! $errors->first('tipe_ongkir', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    </div>
</div>
<div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
        <label for="alamat" class="block uppercase text-xs font-bold mb-2">{{ 'Alamat' }}</label>
        <input class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150" name="alamat" type="text" id="alamat" value="{{ isset($pengaturan->alamat) ? $pengaturan->alamat : ''}}" required>

        {!! $errors->first('alamat', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    </div>
</div>
</div><div class='flex flex-wrap'><div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
        <label for="lat" class="block uppercase text-xs font-bold mb-2">{{ 'Lat' }}</label>
        <input class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150" name="lat" type="text" id="lat" value="{{ isset($pengaturan->lat) ? $pengaturan->lat : ''}}" required>

        {!! $errors->first('lat', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    </div>
</div>
<div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
        <label for="long" class="block uppercase text-xs font-bold mb-2">{{ 'Long' }}</label>
        <input class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150" name="long" type="text" id="long" value="{{ isset($pengaturan->long) ? $pengaturan->long : ''}}" required>

        {!! $errors->first('long', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    </div>
</div>
</div><div class='flex flex-wrap'><div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
        <label for="google_api" class="block uppercase text-xs font-bold mb-2">{{ 'Google Api' }}</label>
        <input class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150" name="google_api" type="text" id="google_api" value="{{ isset($pengaturan->google_api) ? $pengaturan->google_api : ''}}" required>

        {!! $errors->first('google_api', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    </div>
</div>
</div>

<hr class="my-4 border-b-1 border-gray-400"/>
    <button class="bg-green-500 float-right text-white hover:bg-green-700 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="submit">{{ $formMode === 'edit' ? 'Edit' : 'Simpan' }}</button>
