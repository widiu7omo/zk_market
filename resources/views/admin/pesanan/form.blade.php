<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="waktu_pesan" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Waktu Pesan' }}
        <input required type="text" id="waktu_pesan" name="waktu_pesan" data-mask="00:00:00"
               placeholder="Input waktu_pesan"
               value="{{ isset($pesanan->waktu_pesan) ? $pesanan->waktu_pesan : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('waktu_pesan') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('waktu_pesan') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('waktu_pesan', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="waktu_sampai" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Waktu Sampai' }}
        <input type="text" id="waktu_sampai" name="waktu_sampai" data-mask="00:00:00"
               placeholder="Input waktu_sampai"
               value="{{ isset($pesanan->waktu_sampai) ? $pesanan->waktu_sampai : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('waktu_sampai') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('waktu_sampai') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('waktu_sampai', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="tanggal" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Tanggal' }}
        <input required type="text" id="tanggal" name="tanggal" placeholder="Input tanggal"
               value="{{ isset($pesanan->tanggal) ? $pesanan->tanggal : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('tanggal') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('tanggal') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('tanggal', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="total_bayar" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Total Bayar' }}
        <input required readonly type="text" id="total_bayar" placeholder="Input total_bayar"
               value="Rp. {{ isset($pesanan->total_bayar) ? number_format($pesanan->total_bayar,0,',','.') : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 bg-gray-200 {{ $errors->has('total_bayar') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('total_bayar') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('total_bayar', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="catatan" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Catatan' }}
        <textarea required type="text" id="catatan" name="catatan" placeholder="Input catatan"
                  class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('catatan') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('catatan') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out">{{ isset($pesanan->catatan) ? $pesanan->catatan : ''}}</textarea>

        {!! $errors->first('catatan', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="pegawai_id" class="tracking-wide uppercase text-sm font-bold text-gray-900">{{ 'Pegawai' }}
        <select name="pegawai_id" id="pegawai_id"
                class="mt-1 text-gray-800 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-200 ease-in-out sm:text-sm sm:leading-5">
            <option value="">Pilih Pegawai Pengantar</option>
            @forelse($pegawai ?? [] as $optionKey => $optionValue)
                <option
                    value="{{ $optionValue->id }}" {{ (isset($pesanan->pegawai_id) && $pesanan->pegawai_id == $optionValue->id) ? 'selected' : ''}}>{{ $optionValue->nama }}</option>
            @empty
                <option value="">Tidak ada data pegawai</option>
            @endforelse
        </select>

        {!! $errors->first('kategori_id', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<fieldset class="p-2 pt-0 w-full md:w-6/12">
    <legend class="text-base leading-6 font-medium uppercase">{{ 'Status Pesanan' }}</legend>
    <div class="my-4 flex flex-row flex-wrap w-full">
        @foreach($statusPesanan ?? [] as $status)
            <div
                class="flex items-center m-2 {{ isset($pesanan->status_pesanan_id) && $pesanan->status_pesanan_id === $status->id?'bg-gray-400':'bg-gray-200'}} p-3 rounded-lg">
                <input id="{{$status->status_pesanan}}" name="status_pesanan_id" type="radio" value="{{$status->id}}"
                       class="form-radio h-4 w-4 text-brown transition duration-200 ease-in-out" {{ isset($pesanan->status_pesanan_id) && $pesanan->status_pesanan_id === $status->id?'checked':''}}>
                <label for="{{$status->status_pesanan}}" class="ml-3">
                    <span
                        class="block text-sm leading-5 {{ isset($pesanan->status_pesanan_id) && $pesanan->status_pesanan_id === $status->id?'text-white':'text-gray-500'}} font-bold uppercase">{{$status->status_pesanan}}</span>
                </label>
            </div>
        @endforeach
    </div>
</fieldset>
<fieldset class="p-2 pt-0 w-full md:w-6/12">
    <legend class="text-base leading-6 font-medium uppercase">{{ 'Status Bayar' }}</legend>
    <div class="my-4 flex flex-row flex-wrap w-full">
        @foreach($statusPembayaran ?? [] as $status)
            <div
                class="flex items-center m-2 {{ isset($pesanan->status_pesanan_id) && $pesanan->status_pesanan_id === $status->id?'bg-gray-400':'bg-gray-200'}} p-3 rounded-lg">
                <input id="{{$status->status_bayar}}" name="status_bayar_id" type="radio" value="{{$status->id}}"
                       class="form-radio h-4 w-4 text-brown transition duration-200 ease-in-out" {{ isset($pesanan->status_bayar_id) && $pesanan->status_bayar_id === $status->id?'checked':''}}>
                <label for="{{$status->status_bayar}}" class="ml-3">
                    <span
                        class="block text-sm leading-5 font-bold {{ isset($pesanan->status_pesanan_id) && $pesanan->status_pesanan_id === $status->id?'text-white':'text-gray-500'}} uppercase">{{$status->status_bayar}}</span>
                </label>
            </div>
        @endforeach
    </div>
</fieldset>

<div class="p-2 pt-0 w-full">
    <input
        class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold"
        type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
