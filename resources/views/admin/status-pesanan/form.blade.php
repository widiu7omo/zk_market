<div class='flex flex-wrap'><div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
        <label for="status_pesanan" class="block uppercase text-xs font-bold mb-2">{{ 'Status Pesanan' }}</label>
        <input class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150" name="status_pesanan" type="text" id="status_pesanan" value="{{ isset($statuspesanan->status_pesanan) ? $statuspesanan->status_pesanan : ''}}" required>

        {!! $errors->first('status_pesanan', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    </div>
</div>
</div>

<hr class="my-4 border-b-1 border-gray-400"/>
    <button class="bg-green-400 text-white float-right active:bg-green-500 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="submit">{{ $formMode === 'edit' ? 'Edit' : 'Simpan' }}</button>
