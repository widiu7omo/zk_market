<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <img style="height: 100px" src="{{asset('images/logo-zona-kopi.png')}}" alt="logo">
        </div>
        <div class="w-full sm:max-w-md mt-6 px-4 py-4 bg-gray-300 shadow-md overflow-hidden sm:rounded-lg">

            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 rounded-lg border-0">
                <div class="rounded-t mb-0 px-6 py-6">
                    <div class="text-center mb-3">
                        <h6 class="text-gray-600 text-sm font-bold">
                            Daftar dengan
                        </h6>
                    </div>
                    <div class="btn-wrapper text-center">
                        <a href="{{ url('auth/google') }}"
                           class="bg-white active:bg-gray-100 text-gray-800 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                           type="button">
                            <svg width="28px" height="28px" viewBox="0 0 36 36" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 43.2 (39069) - http://www.bohemiancoding.com/sketch -->
                                <title>UI/icons/color/google</title>
                                <desc>Created with Sketch.</desc>
                                <defs/>
                                <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="UI/icons/color/google">
                                        <g id="Group" transform="translate(2.000000, 2.000000)">
                                            <path
                                                d="M32.4365525,16.6024012 C32.4365525,15.4515967 32.3313665,14.344128 32.1357206,13.2820585 L16.5492615,13.2820585 L16.5492615,19.5616128 L25.4557094,19.5616128 C25.0721312,21.5908257 23.9059692,23.3098098 22.1535707,24.4613022 L22.1535707,28.5341733 L27.5019274,28.5341733 C30.631561,25.7077204 32.4365525,21.5461142 32.4365525,16.6024012 L32.4365525,16.6024012 Z"
                                                id="Shape" fill="#4285F4"/>
                                            <path
                                                d="M16.5492615,32.4674071 C21.0175621,32.4674071 24.7635856,31.0139403 27.5019274,28.5341733 L22.1535707,24.4613022 C20.6718508,25.4353244 18.7756982,26.0110706 16.5492615,26.0110706 C12.2387399,26.0110706 8.59088994,23.1557272 7.2893887,19.3181072 L1.76011213,19.3181072 L1.76011213,23.5244249 C4.48302664,28.8299569 10.0796222,32.4674071 16.5492615,32.4674071 L16.5492615,32.4674071 Z"
                                                id="Shape" fill="#34A853"/>
                                            <path
                                                d="M7.2893887,19.3181072 C6.95840347,18.344085 6.77047118,17.3033395 6.77047118,16.2337035 C6.77047118,15.1640676 6.95840347,14.1233221 7.2893887,13.1492999 L7.2893887,8.94298219 L1.76011213,8.94298219 C0.639530783,11.1345322 0,13.6142992 0,16.2337035 C0,18.8531079 0.639530783,21.3328749 1.76011213,23.5244249 L7.2893887,19.3181072 L7.2893887,19.3181072 Z"
                                                id="Shape" fill="#FBBC05"/>
                                            <path
                                                d="M16.5492615,6.4563365 C18.9790577,6.4563365 21.160615,7.27558824 22.8758478,8.88382548 L27.6225407,4.22764161 C24.755872,1.60892511 21.0098485,0 16.5492615,0 C10.0803235,0 4.48302664,3.63813805 1.76011213,8.94298219 L7.2893887,13.1492999 C8.59088994,9.31236774 12.2394411,6.4563365 16.5492615,6.4563365 Z"
                                                id="Shape" fill="#EA4335"/>
                                        </g>
                                    </g>
                                </g>
                            </svg>&nbsp;
                            Google
                        </a>
                    </div>
                    <hr class="mt-6 border-b-1 border-gray-400"/>
                </div>
                <div class="flex-auto lg:px-6 py-10 pt-0">
                    <div class="text-gray-500 text-center mb-3 font-bold">
                        <small>Atau daftar dengan data sendiri</small>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="relative w-full mb-3">
                            <label
                                class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                htmlFor="grid-password"
                            >
                                Nama
                            </label>
                            <x-jet-input placeholder="Name" class="block mt-1 w-full" type="text" name="name"
                                         :value="old('name')" required autofocus autocomplete="name"/>
                        </div>

                        <div class="relative w-full mb-3">
                            <label
                                class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                htmlFor="grid-password"
                            >
                                Email
                            </label>
                            <x-jet-input placeholder="Email" class="block mt-1 w-full" type="email" name="email"
                                         :value="old('email')" required/>
                        </div>

                        <div class="relative w-full mb-3">
                            <label
                                class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                htmlFor="grid-password">Kata Sandi
                            </label>
                            <x-jet-input placeholder="Kata Sandi" class="block mt-1 w-full" type="password"
                                         name="password"
                                         required autocomplete="new-password"/>
                        </div>
                        <div class="relative w-full mb-3">
                            <label
                                class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                htmlFor="grid-password">Konfirmasi Kata Sandi
                            </label>
                            <x-jet-input placeholder="Konfirmasi Kata Sandi" class="block mt-1 w-full" type="password"
                                         name="password_confirmation" required
                                         autocomplete="new-password"/>
                        </div>
                        <div class="text-center mt-6">
                            <button
                                class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                type="button">
                                Buat Akun
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-wrap mt-6 mx-6">
                <div class="w-1/2 text-left">
                    <a href="{{route('login')}}" class="text-gray-600 font-bold"><small>Sudah punya akun ?</small></a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
