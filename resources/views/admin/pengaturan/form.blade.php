<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="nama_bisnis" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Nama Bisnis' }}
        <input required type="text" id="nama_bisnis" name="nama_bisnis" placeholder="Input nama_bisnis"
               value="{{ isset($pengaturan->nama_bisnis) ? $pengaturan->nama_bisnis : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('nama_bisnis', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="no_wa" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'No Wa' }}
        <input required type="text" id="no_wa" name="no_wa" placeholder="Input no_wa" data-mask="0000-0000-0000"
               value="{{ isset($pengaturan->no_wa) ? $pengaturan->no_wa : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('no_wa', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<fieldset class="p-2 pt-0 w-full md:w-6/12">
    <legend class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Tipe Ongkir' }}</legend>
    <div class="my-4 flex flex-row flex-wrap w-full">
        <div class="flex items-center m-2 p-3 rounded-lg bg-gray-200">
            <input id="dinamis" name="tipe_ongkir" type="radio"
                   value="dinamis"
                   class="form-radio h-4 w-4 text-brown transition duration-200 ease-in-out" {{ isset($pengaturan->tipe_ongkir) && $pengaturan->tipe_ongkir === 'dinamis'?'checked':''}}>
            <label for="dinamis" class="ml-3">
                <span class="block text-sm leading-5 font-bold text-gray-500 uppercase">Dinamis</span>
            </label>
        </div>
        <div class="flex items-center m-2 p-3 rounded-lg bg-gray-200">
            <input id="statis" name="tipe_ongkir" type="radio"
                   value="statis"
                   class="form-radio h-4 w-4 text-brown transition duration-200 ease-in-out" {{ isset($pesanan->status_bayar_id) && $pesanan->status_bayar_id === 'statis'?'checked':''}}>
            <label for="statis" class="ml-3">
                    <span
                        class="block text-sm leading-5 font-bold text-gray-500 uppercase">Statis</span>
            </label>
        </div>
        <small class="text-gray-500"><i>tipe ongkir <strong class="uppercase">dinamis</strong> berdasarkan jarak KM dari
                toko ke lokasi pengantaran</i></small>
        <small class="text-gray-500"><i>tipe ongkir <strong class="uppercase">statis</strong> sesuai harga yang tertera
                pada harga ongkir</i></small>
    </div>
    {!! $errors->first('tipe_ongkir', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
</fieldset>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="alamat" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Alamat' }}
        <input required type="text" id="alamat" name="alamat" placeholder="Input alamat"
               value="{{ isset($pengaturan->alamat) ? $pengaturan->alamat : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('alamat', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="lat" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Lat' }}
        <input required type="text" id="lat" name="lat" placeholder="Input lat"
               value="{{ isset($pengaturan->lat) ? $pengaturan->lat : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('lat', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="long" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Long' }}
        <input required type="text" id="long" name="long" placeholder="Input long"
               value="{{ isset($pengaturan->long) ? $pengaturan->long : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('long', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="google_api" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Google Api' }}
        <input required type="text" id="google_api" name="google_api" placeholder="Input google_api"
               value="{{ isset($pengaturan->google_api) ? $pengaturan->google_api : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('google_api', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>


<div class="p-2 pt-0 w-full">
    <input
        class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-gray-100 font-bold"
        type="submit" value="{{ $formMode === 'edit' ? 'Simpan' : 'Create' }}">
</div>
