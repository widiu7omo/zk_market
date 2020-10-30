<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="nama" class="block uppercase text-xs font-bold mb-2">{{ 'Nama' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="nama" type="text" id="nama" value="{{ isset($customer->nama) ? $customer->nama : ''}}" required>

            {!! $errors->first('nama', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="no_hp" class="block uppercase text-xs font-bold mb-2">{{ 'No Hp' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="no_hp" type="text" id="no_hp" value="{{ isset($customer->no_hp) ? $customer->no_hp : ''}}"
                required>

            {!! $errors->first('no_hp', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
</div>
<hr class="my-4 border-b-1 border-gray-400"/>
<h6 class="text-gray-500 text-sm mt-3 mb-6 font-bold uppercase"> Akun </h6>
<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="email" class="block uppercase text-xs font-bold mb-2">{{ 'Email' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 {{ isset($customer->user->email) ? 'bg-gray-200' : 'bg-white'}} text-gray-700 rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="email" type="email" id="email" {{ isset($customer->user->email) ? 'readonly' : ''}}
                value="{{ isset($customer->user->email) ? $customer->user->email : ''}}">
            {!! $errors->first('email', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
        <div class="relative w-full mb-3">
            <label for="password" class="block uppercase text-xs font-bold mb-2">{{ 'Password' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="password" type="password" id="password">
            <small class="text-red-400">Jangan di isi jika tidak ingin mengganti password</small>
            {!! $errors->first('password', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
</div>

<hr class="my-4 border-b-1 border-gray-400"/>
<button
    class="bg-green-400 text-white float-right active:bg-green-500 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
    type="submit">{{ $formMode === 'edit' ? 'Edit' : 'Simpan' }}</button>
