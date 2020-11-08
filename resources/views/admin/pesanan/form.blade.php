<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="waktu_pesan" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Waktu Pesan' }}
        <input required type="text" id="waktu_pesan" name="waktu_pesan" placeholder="Input waktu_pesan" value="{{ isset($pesanan->waktu_pesan) ? $pesanan->waktu_pesan : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('waktu_pesan', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="waktu_sampai" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Waktu Sampai' }}
        <input required type="text" id="waktu_sampai" name="waktu_sampai" placeholder="Input waktu_sampai" value="{{ isset($pesanan->waktu_sampai) ? $pesanan->waktu_sampai : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('waktu_sampai', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="tanggal" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Tanggal' }}
        <input required type="text" id="tanggal" name="tanggal" placeholder="Input tanggal" value="{{ isset($pesanan->tanggal) ? $pesanan->tanggal : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('tanggal', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="lat" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Lat' }}
        <input required type="text" id="lat" name="lat" placeholder="Input lat" value="{{ isset($pesanan->lat) ? $pesanan->lat : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('lat', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="long" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Long' }}
        <input required type="text" id="long" name="long" placeholder="Input long" value="{{ isset($pesanan->long) ? $pesanan->long : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('long', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="total_bayar" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Total Bayar' }}
        <input required type="text" id="total_bayar" name="total_bayar" placeholder="Input total_bayar" value="{{ isset($pesanan->total_bayar) ? $pesanan->total_bayar : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('total_bayar', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="catatan" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Catatan' }}
        <input required type="text" id="catatan" name="catatan" placeholder="Input catatan" value="{{ isset($pesanan->catatan) ? $pesanan->catatan : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('catatan', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="keterangan" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Keterangan' }}
        <input required type="text" id="keterangan" name="keterangan" placeholder="Input keterangan" value="{{ isset($pesanan->keterangan) ? $pesanan->keterangan : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('keterangan', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="customer_id" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Customer Id' }}
        <input  type="number" id="customer_id" name="customer_id" placeholder="Input customer_id" value="{{ isset($pesanan->customer_id) ? $pesanan->customer_id : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('customer_id', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="status_pesanan_id" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Status Pesanan Id' }}
        <input  type="number" id="status_pesanan_id" name="status_pesanan_id" placeholder="Input status_pesanan_id" value="{{ isset($pesanan->status_pesanan_id) ? $pesanan->status_pesanan_id : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('status_pesanan_id', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="status_bayar_id" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Status Bayar Id' }}
        <input  type="number" id="status_bayar_id" name="status_bayar_id" placeholder="Input status_bayar_id" value="{{ isset($pesanan->status_bayar_id) ? $pesanan->status_bayar_id : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('status_bayar_id', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>


<div class="p-2 pt-0 w-full">
    <input class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
