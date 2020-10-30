<div class='flex flex-wrap'><div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
        <label for="pesanan_id" class="block uppercase text-xs font-bold mb-2">{{ 'Pesanan Id' }}</label>
        <input class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150" name="pesanan_id" type="text" id="pesanan_id" value="{{ isset($detailpesanan->pesanan_id) ? $detailpesanan->pesanan_id : ''}}" required>

        {!! $errors->first('pesanan_id', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    </div>
</div>
<div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
        <label for="produk_id" class="block uppercase text-xs font-bold mb-2">{{ 'Produk Id' }}</label>
        <input class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150" name="produk_id" type="text" id="produk_id" value="{{ isset($detailpesanan->produk_id) ? $detailpesanan->produk_id : ''}}" required>

        {!! $errors->first('produk_id', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    </div>
</div>
</div><div class='flex flex-wrap'><div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
        <label for="jumlah" class="block uppercase text-xs font-bold mb-2">{{ 'Jumlah' }}</label>
        <input class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150" name="jumlah" type="text" id="jumlah" value="{{ isset($detailpesanan->jumlah) ? $detailpesanan->jumlah : ''}}" required>

        {!! $errors->first('jumlah', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    </div>
</div>
<div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
        <label for="subtotal" class="block uppercase text-xs font-bold mb-2">{{ 'Subtotal' }}</label>
        <input class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150" name="subtotal" type="text" id="subtotal" value="{{ isset($detailpesanan->subtotal) ? $detailpesanan->subtotal : ''}}" required>

        {!! $errors->first('subtotal', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    </div>
</div>
</div>

<hr class="my-4 border-b-1 border-gray-400"/>
    <button class="bg-green-400 text-white float-right active:bg-green-500 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="submit">{{ $formMode === 'edit' ? 'Edit' : 'Simpan' }}</button>
