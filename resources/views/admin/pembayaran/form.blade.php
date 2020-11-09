<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="kategori" class="tracking-wide uppercase text-sm font-bold">{{ 'Kategori' }}
        <input required type="text" id="kategori" name="kategori" placeholder="Input kategori" value="{{ isset($kategori->kategori) ? $kategori->kategori : ''}}"
class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>
       {!! $errors->first('kategori', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>


<div class="p-2 pt-0 w-full">
    <input class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-white font-bold" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
