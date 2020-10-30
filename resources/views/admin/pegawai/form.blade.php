<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="nama" class="block uppercase text-xs font-bold mb-2">{{ 'Nama' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="nama" type="text" id="nama" value="{{ isset($pegawai->nama) ? $pegawai->nama : ''}}" required>

            {!! $errors->first('nama', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="jenis_kelamin" class="block uppercase text-xs font-bold mb-2">{{ 'Jenis Kelamin' }}</label>
            <select name="jenis_kelamin" class="form-select mt-1 block w-full" id="jenis_kelamin" required>
                <option
                    value="Laki-Laki" {{ (isset($pegawai->jenis_kelamin) && $pegawai->kategori_id == 'Laki-Laki') ? 'selected' : ''}}>
                    Laki-Laki
                </option>
                <option
                    value="Perempuan" {{ (isset($pegawai->jenis_kelamin) && $pegawai->kategori_id == 'Perempuan') ? 'selected' : ''}}>
                    Perempuan
                </option>
            </select>
            {!! $errors->first('jenis_kelamin', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
</div>
<div class='flex flex-wrap'>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="nohp" class="block uppercase text-xs font-bold mb-2">{{ 'No Hp' }}</label>
            <input
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="nohp" type="text" id="nohp" value="{{ isset($pegawai->nohp) ? $pegawai->nohp : ''}}" required>

            {!! $errors->first('nohp', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
        </div>
    </div>
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-full mb-3">
            <label for="alamat" class="block uppercase text-xs font-bold mb-2">{{ 'Alamat' }}</label>
            <textarea
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="alamat" rows="4" id="alamat"
                required>{{ isset($pegawai->alamat) ? $pegawai->alamat : ''}}</textarea>

            {!! $errors->first('alamat', '<p class="text-sm mt-2 text-red-500">:message</p>') !!}
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
                class="px-3 py-3 placeholder-gray-400 {{ isset($pegawai->user->email) ? 'bg-gray-200' : 'bg-white'}} text-gray-700 rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                name="email" type="email" id="email" {{ isset($pegawai->user->email) ? 'readonly' : ''}}
                value="{{ isset($pegawai->user->email) ? $pegawai->user->email : ''}}">
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
