<p class="text-sm text-gray-400 uppercase w-full font-bold border-b-2 border-gray-200 mb-3">Detail Pegawai</p>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="nama" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Nama' }}
        <input required type="text" id="nama" name="nama" placeholder="Input nama"
               value="{{ isset($pegawai->nama) ? $pegawai->nama : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('nama', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<fieldset class="p-2 pt-0 w-full md:w-6/12">
    <legend class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Jenis Kelamin' }}</legend>
    <div class="my-2 flex flex-row flex-wrap w-full">
        <div class="flex items-center m-2 p-3 rounded-lg bg-gray-200">
            <input id="lakilaki" name="jenis_kelamin" type="radio"
                   value="Laki-Laki"
                   class="form-radio h-4 w-4 text-brown transition duration-200 ease-in-out" {{ isset($pegawai->jenis_kelamin ) && $pegawai->jenis_kelamin === 'Laki-Laki'?'checked':''}}>
            <label for="lakilaki" class="ml-3">
                <span class="block text-sm leading-5 font-bold text-gray-500 uppercase">Laki-Laki</span>
            </label>
        </div>
        <div class="flex items-center m-2 p-3 rounded-lg bg-gray-200">
            <input id="perempuan" name="jenis_kelamin" type="radio"
                   value="Perempuan"
                   class="form-radio h-4 w-4 text-brown transition duration-200 ease-in-out" {{ isset($pegawai->jenis_kelamin ) && $pegawai->jenis_kelamin === 'Perempuan'?'checked':''}}>
            <label for="perempuan" class="ml-3">
                    <span
                        class="block text-sm leading-5 font-bold text-gray-500 uppercase">Perempuan</span>
            </label>
        </div>
    </div>
    {!! $errors->first('jenis_kelamin', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
</fieldset>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="nohp" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Nohp' }}
        <input required type="text" id="nohp" name="nohp" data-mask="0000-0000-0000" placeholder="Input nohp"
               value="{{ isset($pegawai->nohp) ? $pegawai->nohp : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('nohp', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="alamat" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Alamat' }}
        <input required type="text" id="alamat" name="alamat" placeholder="Input alamat"
               value="{{ isset($pegawai->alamat) ? $pegawai->alamat : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('alamat', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<p class="text-sm text-gray-400 uppercase w-full font-bold border-b-2 border-gray-200 my-3">Akun Pegawai</p>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="email" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'E-mail' }}
        <input type="text" id="email" name="email" placeholder="Input E-mail"
               value="{{ isset($pegawai->user->email) ? $pegawai->user->email : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('email') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('email') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('email', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<fieldset class="p-2 pt-0 w-full md:w-6/12">
    <legend class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Role' }}</legend>
    <div class="my-2 flex flex-row flex-wrap w-full">
        @foreach($roles ?? [] as $role)
            <div class="flex items-center m-2 p-3 rounded-lg bg-gray-200">
                <input id="{{$role->name}}" name="role_id[]" type="checkbox"
                       value="{{$role->name}}"
                       class="form-check h-4 w-4 text-brown transition duration-200 ease-in-out" {{ isset($pegawai->user) && in_array($role->id,$pegawai->user->roles->pluck('id')->toArray() ?? [])?'checked':''}}>
                <label for="{{$role->name}}" class="ml-3">
                    <span class="block text-sm leading-5 font-bold text-gray-500 uppercase">{{$role->name}}</span>
                </label>
            </div>
        @endforeach
    </div>
    {!! $errors->first('jenis_kelamin', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
</fieldset>
<p class="w-full border-b border-gray-200 text-sm font-bold uppercase text-gray-400 my-2">Ganti Password</p>
<small class="text-gray-400 text-xs w-full"><i>Kosongkan jika tidak ingin mengganti password</i></small>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="password" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Password' }}
        <input type="password" id="password" name="password" placeholder="Input Password"
               value=""
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('password') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('password') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('password', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="password_confirmation"
           class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Konfirmasi Password' }}
        <input type="password" id="password_confirmation" name="password_confirmation"
               placeholder="Input Konfirmasi Password"
               value=""
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('password_confirmation') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('confirm-password') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('password_confirmation', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>

<div class="p-2 pt-0 w-full">
    <input
        class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold"
        type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
