<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="pesanan_id" class="tracking-wide uppercase text-sm font-bold text-white">{{ 'Pesanan Id' }}
        <input required type="number" id="pesanan_id" name="pesanan_id" placeholder="Input pesanan_id" value="{{ isset($detailpesanan->pesanan_id) ? $detailpesanan->pesanan_id : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('pesanan_id', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="produk_id" class="tracking-wide uppercase text-sm font-bold text-white">{{ 'Produk Id' }}
        <input required type="number" id="produk_id" name="produk_id" placeholder="Input produk_id" value="{{ isset($detailpesanan->produk_id) ? $detailpesanan->produk_id : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('produk_id', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="jumlah" class="tracking-wide uppercase text-sm font-bold text-white">{{ 'Jumlah' }}
        <input required type="text" id="jumlah" name="jumlah" placeholder="Input jumlah" value="{{ isset($detailpesanan->jumlah) ? $detailpesanan->jumlah : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('jumlah', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="subtotal" class="tracking-wide uppercase text-sm font-bold text-white">{{ 'Subtotal' }}
        <input required type="text" id="subtotal" name="subtotal" placeholder="Input subtotal" value="{{ isset($detailpesanan->subtotal) ? $detailpesanan->subtotal : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

       {!! $errors->first('subtotal', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>


<div class="p-2 pt-0 w-full">
    <input class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
