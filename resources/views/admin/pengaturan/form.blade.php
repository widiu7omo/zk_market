<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="nama_bisnis" class="tracking-wide uppercase text-sm font-bold text-white">{{ 'Nama Bisnis' }}
        <input required type="text" id="nama_bisnis" name="nama_bisnis" placeholder="Input nama_bisnis" value="{{ isset($pengaturan->nama_bisnis) ? $pengaturan->nama_bisnis : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('nama_bisnis', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="no_wa" class="tracking-wide uppercase text-sm font-bold text-white">{{ 'No Wa' }}
        <input required type="text" id="no_wa" name="no_wa" placeholder="Input no_wa" value="{{ isset($pengaturan->no_wa) ? $pengaturan->no_wa : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('no_wa', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="tipe_ongkir" class="tracking-wide uppercase text-sm font-bold text-white">{{ 'Tipe Ongkir' }}
        <input required type="text" id="tipe_ongkir" name="tipe_ongkir" placeholder="Input tipe_ongkir" value="{{ isset($pengaturan->tipe_ongkir) ? $pengaturan->tipe_ongkir : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('tipe_ongkir', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="alamat" class="tracking-wide uppercase text-sm font-bold text-white">{{ 'Alamat' }}
        <input required type="text" id="alamat" name="alamat" placeholder="Input alamat" value="{{ isset($pengaturan->alamat) ? $pengaturan->alamat : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('alamat', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="lat" class="tracking-wide uppercase text-sm font-bold text-white">{{ 'Lat' }}
        <input required type="text" id="lat" name="lat" placeholder="Input lat" value="{{ isset($pengaturan->lat) ? $pengaturan->lat : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('lat', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="long" class="tracking-wide uppercase text-sm font-bold text-white">{{ 'Long' }}
        <input required type="text" id="long" name="long" placeholder="Input long" value="{{ isset($pengaturan->long) ? $pengaturan->long : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('long', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="google_api" class="tracking-wide uppercase text-sm font-bold text-white">{{ 'Google Api' }}
        <input required type="text" id="google_api" name="google_api" placeholder="Input google_api" value="{{ isset($pengaturan->google_api) ? $pengaturan->google_api : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('google_api', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>


<div class="p-2 pt-0 w-full">
    <input class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
