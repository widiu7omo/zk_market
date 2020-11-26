<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="alamat_lengkap" class="tracking-wide uppercase text-sm font-bold ">{{ 'Alamat Lengkap' }}
        <input required type="text" id="alamat_lengkap" name="alamat_lengkap" placeholder="Input alamat_lengkap"
               value="{{ isset($alamat->alamat_lengkap) ? $alamat->alamat_lengkap : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('alamat_lengkap', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="rincian_alamat" class="tracking-wide uppercase text-sm font-bold ">{{ 'Rincian Alamat' }}
        <input required type="text" id="rincian_alamat" name="rincian_alamat" placeholder="Input rincian_alamat"
               value="{{ isset($alamat->rincian_alamat) ? $alamat->rincian_alamat : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('rincian_alamat', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="lat" class="tracking-wide uppercase text-sm font-bold ">{{ 'Lat' }}
        <input required type="text" id="lat" name="lat" placeholder="Input lat"
               value="{{ isset($alamat->lat) ? $alamat->lat : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('lat', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="long" class="tracking-wide uppercase text-sm font-bold ">{{ 'Long' }}
        <input required type="text" id="long" name="long" placeholder="Input long"
               value="{{ isset($alamat->long) ? $alamat->long : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('long', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>


<div class="p-2 pt-0 w-full">
    <input
        class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold"
        type="submit" value="{{ 'Simpan' }}">
</div>
