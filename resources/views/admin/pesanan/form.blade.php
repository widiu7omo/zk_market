<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="waktu_pesan" class="block uppercase text-xs font-bold mb-2">{{ 'Waktu Pesan' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="waktu_pesan" type="text" id="waktu_pesan"
                value="{{ isset($pesanan->waktu_pesan) ? $pesanan->waktu_pesan : ''}}" required>

            {!! $errors->first('waktu_pesan', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="waktu_sampai" class="block uppercase text-xs font-bold mb-2">{{ 'Waktu Sampai' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="waktu_sampai" type="text" id="waktu_sampai"
                value="{{ isset($pesanan->waktu_sampai) ? $pesanan->waktu_sampai : ''}}" required>

            {!! $errors->first('waktu_sampai', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
</div>
<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="tanggal" class="block uppercase text-xs font-bold mb-2">{{ 'Tanggal' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="tanggal" type="text" id="tanggal" value="{{ isset($pesanan->tanggal) ? $pesanan->tanggal : ''}}"
                required>

            {!! $errors->first('tanggal', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="lat" class="block uppercase text-xs font-bold mb-2">{{ 'Lat' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="lat" type="text" id="lat" value="{{ isset($pesanan->lat) ? $pesanan->lat : ''}}" required>

            {!! $errors->first('lat', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
</div>
<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="long" class="block uppercase text-xs font-bold mb-2">{{ 'Long' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="long" type="text" id="long" value="{{ isset($pesanan->long) ? $pesanan->long : ''}}" required>

            {!! $errors->first('long', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="total_bayar" class="block uppercase text-xs font-bold mb-2">{{ 'Total Bayar' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="total_bayar" type="text" id="total_bayar"
                value="{{ isset($pesanan->total_bayar) ? $pesanan->total_bayar : ''}}" required>

            {!! $errors->first('total_bayar', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
</div>
<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="catatan" class="block uppercase text-xs font-bold mb-2">{{ 'Catatan' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="catatan" type="text" id="catatan" value="{{ isset($pesanan->catatan) ? $pesanan->catatan : ''}}"
                required>

            {!! $errors->first('catatan', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="keterangan" class="block uppercase text-xs font-bold mb-2">{{ 'Keterangan' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="keterangan" type="text" id="keterangan"
                value="{{ isset($pesanan->keterangan) ? $pesanan->keterangan : ''}}" required>

            {!! $errors->first('keterangan', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
</div>
<div class='flex flex-wrap'>
    <input
        class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
        name="customer_id" type="hidden" id="customer_id"
        value="{{ isset($pesanan->customer_id) ? $pesanan->customer_id : ''}}">

    {!! $errors->first('customer_id', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="status_pesanan_id"
                   class="block uppercase text-xs font-bold mb-2">{{ 'Status Pesananan Id' }}</label>
            <select name="status_pesanan_id" class="form-select mt-1 block w-full" id="status_pesanan_id">
                @foreach ($statusPesanan as $optionKey => $optionValue)
                    <option
                        value="{{ $optionValue->id }}" {{ (isset($pesanan->status_pesanan_id) && $pesanan->status_pesanan_id == $optionValue->id) ? 'selected' : ''}}>{{ $optionValue->status_pesanan }}</option>
                @endforeach
            </select>
            {!! $errors->first('status_pesanan_id', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
</div>
<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="status_bayar_id" class="block uppercase text-xs font-bold mb-2">{{ 'Status Bayar Id' }}</label>
            <select name="status_bayar_id" class="form-select mt-1 block w-full" id="status_pesanan_id">
                @foreach ($statusPembayaran as $optionKey => $optionValue)
                    <option
                        value="{{ $optionValue->id }}" {{ (isset($statusPembayaran->status_bayar_id) && $statusPembayaran->status_bayar_id == $optionValue->id) ? 'selected' : ''}}>{{ $optionValue->status_bayar }}</option>
                @endforeach
            </select>
            {!! $errors->first('status_bayar_id', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
</div>

<hr class="my-4 border-b-1 border-gray-400"/>
<button
    class="bg-green-400 text-white float-right active:bg-green-500 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
    type="submit">{{ $formMode === 'edit' ? 'Edit' : 'Simpan' }}</button>
