<div class='flex flex-wrap'><div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
        <label for="metode" class="block uppercase text-xs font-bold mb-2">{{ 'Metode' }}</label>
        <input class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150" name="metode" type="text" id="metode" value="{{ isset($metodepembayaran->metode) ? $metodepembayaran->metode : ''}}" required>

        {!! $errors->first('metode', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    </div>
</div>
<div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
        <label for="token" class="block uppercase text-xs font-bold mb-2">{{ 'Token' }}</label>
        <input class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150" name="token" type="text" id="token" value="{{ isset($metodepembayaran->token) ? $metodepembayaran->token : ''}}" required>

        {!! $errors->first('token', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    </div>
</div>
</div><div class='flex flex-wrap'><div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
        <label for="api" class="block uppercase text-xs font-bold mb-2">{{ 'Api' }}</label>
        <input class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150" name="api" type="text" id="api" value="{{ isset($metodepembayaran->api) ? $metodepembayaran->api : ''}}" required>

        {!! $errors->first('api', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    </div>
</div>
<div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
        <label for="callback" class="block uppercase text-xs font-bold mb-2">{{ 'Callback' }}</label>
        <input class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150" name="callback" type="text" id="callback" value="{{ isset($metodepembayaran->callback) ? $metodepembayaran->callback : ''}}" required>

        {!! $errors->first('callback', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
    </div>
</div>
</div>

<hr class="my-4 border-b-1 border-gray-400"/>
    <button class="bg-green-400 text-white float-right active:bg-green-500 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="submit">{{ $formMode === 'edit' ? 'Edit' : 'Simpan' }}</button>
