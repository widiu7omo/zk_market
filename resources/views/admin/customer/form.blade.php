<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="nama" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Nama' }}
        <input required type="text" id="nama" name="nama" placeholder="Input nama"
               value="{{ isset($customer->nama) ? $customer->nama : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('nama', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="no_hp" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'No Hp' }}
        <input required type="text" id="no_hp" name="no_hp" placeholder="Input no_hp"
               value="{{ isset($customer->no_hp) ? $customer->no_hp : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('no_hp', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<p class="text-sm text-gray-400 uppercase w-full font-bold border-b-2 border-gray-200 my-3">Akun Customer</p>
@if(!isset($customer->user->id))
    <p class="text-lg text-center uppercase bg-red-100 text-red-500 w-full p-2 rounded my-3 font-bold">Customer tidak mempunyai Akun</p>
@else
    <div class="p-2 pt-0 w-full md:w-6/12">
        <label for="email" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'E-mail' }}
            <input type="text" id="email" name="email" placeholder="Input E-mail"
                   value="{{ isset($customer->user->email) ? $customer->user->email : ''}}"
                   class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('email') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('email') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

            {!! $errors->first('email', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
        </label>
    </div>
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
@endif

<div class="p-2 pt-0 w-full">
    <input
        class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold"
        type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
