<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Zona Kopi Delivery') }}</title>

    <!-- Styles -->
    <link href="{{mix('css/app.css')}}" rel="stylesheet">
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          rel="stylesheet"/>
    @stack('style')
</head>
<body class="antialiased">
<noscript>You need to enable JavaScript to run this app.</noscript>
<div id="app">
    <nav id="drawer"
         class="transform top-0 left-0 ease-in-out transition-all duration-300 z-30 translate-x-0 md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-no-wrap md:overflow-hidden bg-gray-300 shadow-inner flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
        <div
            class="md:flex-col md:items-stretch md:min-h-full md:flex-no-wrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
            <button
                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                onclick="toggleNavbar('example-collapse-sidebar')" type="button">
                <i class="fas fa-bars"></i></button>
            <a class="md:block text-center md:pb-2 text-gray-700 mr-0 inline-block whitespace-no-wrap text-lg uppercase font-bold px-0"
               href="javascript:void(0)">
                <div
                    class="py-4 py-4 bg-gray-300 md:bg-gray-100 md:rounded-lg">{{ config('app.name', 'Laravel') }}</div>
                <!-- Laravel App Name -->
            </a>
            {{-- Notifications Panel--}}
            <ul class="md:hidden items-center flex flex-wrap list-none">
                <li class="inline-block relative">
                    <a class="text-gray-600 block py-1 px-3" href="#"
                       onclick="openDropdown(event,'notification-dropdown')"><i class="fas fa-bell"></i></a>
                    <div
                        class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                        id="notification-dropdown" style="min-width: 12rem;">
                        <a class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"
                           href="#">8
                            Notifications</a>
                        <a class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"
                           href="#">Bla
                            bla</a>
                        <a class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"
                           href="#">Bloo
                            Boooo</a>
                    </div>
                </li>
                <li class="inline-block relative">
                    <a class="text-gray-600 block" href="#"
                       onclick="openDropdown(event,'user-responsive-dropdown')">
                        <div class="items-center flex">
                                <span
                                    class="w-12 h-12 text-sm text-white bg-gray-300 inline-flex items-center justify-center rounded-full"><img
                                        alt="..." class="w-full rounded-full align-middle border-none shadow-lg"
                                        src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=random"/></span>
                        </div>
                    </a>
                    <div
                        class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                        id="user-responsive-dropdown" style="min-width: 12rem;">
                        <a class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"
                           href="#">Profile</a>
                        <a class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"
                           href="#">Settings</a>
                        <a class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"
                           href="#">About</a>
                        <div class="h-0 my-2 border border-solid border-gray-200"></div>
                        <a class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"
                           href="{{ url('/logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            @include('admin.sidebar')
        </div>
    </nav>
    <div id="content" class="relative md:ml-64 bg-white ease-in-out transition-all duration-300">
        <!-- TopBar -->
        <nav
            class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-no-wrap md:justify-start flex items-center p-4">
            <div class="w-full mx-auto items-center flex justify-between md:flex-no-wrap flex-wrap md:px-10 px-4">
                <a class="text-white text-base uppercase hidden lg:inline-block font-semibold mr-8"
                   href="#" onclick="toggleSidebar()">
                    <span class="px-5 py-3 bg-white rounded-3xl mr-2"><i class="fas fa-bars text-gray-600"></i></span>
                    Menu</a>
                <form class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3 w-1/3">
                    <div class="relative flex w-full flex-wrap items-stretch">
                            <span
                                class="z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded-lg text-base items-center justify-center w-8 pl-3 py-3">
                                <i class="fas fa-search text-gray-600"></i>
                            </span>
                        <input
                            class="px-3 py-3 placeholder-gray-600 text-gray-700 shadow-inner relative focus:bg-gray-100 bg-gray-200 rounded-lg text-sm outline-none focus:outline-none focus:shadow-outline w-full pl-10"
                            placeholder="Search here..."
                            type="text"/>
                    </div>
                </form>
                {{-- Profile Panel--}}
                <div class="flex-col md:flex-row list-none items-center hidden md:flex">
                    <a class="text-gray-600 block" href="#" onclick="openDropdown(event,'user-dropdown')">
                        <div class="items-center flex">
                                <span
                                    class="w-12 h-12 text-sm text-white bg-gray-300 inline-flex items-center justify-center rounded-full"><img
                                        alt="..." class="w-full rounded-full align-middle border-none shadow-lg"
                                        src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=random"/></span>
                        </div>
                    </a>
                    <div
                        class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                        id="user-dropdown" style="min-width: 12rem;">
                        <a class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"
                           href="#">Profile</a><a
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"
                            href="#">Settings</a><a
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"
                            href="#">About</a>
                        <div class="h-0 my-2 border border-solid border-gray-200"></div>
                        <a class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"
                           href="{{ url('/logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                {{-- End Profile Panel--}}

            </div>
        </nav>
        <!-- End TopBar -->
        <!-- Bg Header -->
        <div class="relative bg-brown-lighter md:pt-32 pb-32 pt-12">
            <div class="px-4 md:px-10 mx-auto w-full"></div>
        </div>
        <!-- End Bg Header -->
        <!-- Content-->
        <main class="py-4 bg-white h-full flex flex-1">
            @yield('content')
        </main>
        <!-- End Content-->
        <!-- Footer-->
        <footer class="bottom-0 fixed mt-4 pb-4 w-full right-0 left-0 bg-white">
            <div class="">
                <hr class="mb-4 border-b-1 border-gray-300"/>
                <div class="flex flex-wrap items-center md:justify-between justify-center">
                    <div class="w-full md:w-4/12 px-4">
                        <div class="text-sm text-gray-600 font-semibold py-1">
                            Copyright © <span id="javascript-date"></span>
                            <a class="text-gray-600 hover:text-gray-800 text-sm font-semibold py-1"
                               href="https://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </div>
                    </div>
                    <div class="w-full md:w-8/12 px-4">
                        <ul class="flex flex-wrap list-none md:justify-end  justify-center">
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 text-sm font-semibold block py-1 px-3"
                                   href="https://www.creative-tim.com">
                                    Creative Tim
                                </a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 text-sm font-semibold block py-1 px-3"
                                   href="https://www.creative-tim.com/presentation">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 text-sm font-semibold block py-1 px-3"
                                   href="http://blog.creative-tim.com">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 text-sm font-semibold block py-1 px-3"
                                   href="https://github.com/creativetimofficial/tailwind-starter-kit/blob/master/LICENSE.md">
                                    MIT License
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer-->
        <!-- Modal Delete-->
        <div id="modal-switch" class="fixed z-50 inset-0 overflow-y-auto hidden">
            <div
                class="flex ease-out items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div id="modal-overlay" class="fixed inset-0 transition-opacity ease-out duration-300 opacity-100">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden opari sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
                <div id="modal-component"
                     class="opacity-100 translate-y-4 sm:translate-y-0 sm:scale-95 ease-out duration-300 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                     role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                    Peringatan
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm leading-5 text-gray-500" id="modal-content">
                                        Apakah anda yakin ingin menghapus data ini ?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                      <button type="button" id="modal-btn-confirm"
                              class="inline-flex btn-ok justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Hapus
                      </button>
                    </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                      <button type="button"
                              class="inline-flex btn-cancel justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Batal
                      </button>
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script>
    var $this;
    $(document).ready(function () {
        const modalSwitch = $('#modal-switch');
        modalSwitch.find('.btn-cancel').on('click', function () {
            $('#modal-switch').toggleClass('hidden');
        })
        modalSwitch.find('.btn-ok').on('click', function () {
            $($this).parent('form').submit();
        })
    })
    var popperElement;

    function confirmModal(thisElement, title, content, btn) {
        $('#modal-switch').toggleClass('hidden');
        typeof title !== "undefined" && $('#modal-headline').text(title);
        typeof content !== "undefined" && $('#modal-content').text(content);
        typeof btn !== "undefined" && $('#modal-btn-confirm').text(btn);
        $this = thisElement;
        return false;
    }

    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("bg-white");
        document.getElementById(collapseID).classList.toggle("m-2");
        document.getElementById(collapseID).classList.toggle("py-3");
        document.getElementById(collapseID).classList.toggle("px-6");
    }

    function openTableOptions(event, optionID) {
        popperElement = event.target;
        while (popperElement.nodeName !== "A") {
            popperElement = popperElement.parentNode;
        }
        var popper = new Popper(popperElement, document.getElementById(optionID), {
            placement: "right-end"
        });
        document.getElementById(optionID).classList.toggle("hidden");
    }

    /* Function for dropdowns */
    function openDropdown(event, dropdownID) {
        let element = event.target;
        while (element.nodeName !== "A") {
            element = element.parentNode;
        }
        var popper = new Popper(element, document.getElementById(dropdownID), {
            placement: "bottom-end"
        });
        document.getElementById(dropdownID).classList.toggle("hidden");
        document.getElementById(dropdownID).classList.toggle("block");
    }

    var isOpen = false;

    function toggleSidebar() {
        const drawer = document.getElementById('drawer');
        const content = document.getElementById('content');
        drawer.classList.remove(isOpen ? '-translate-x-full' : 'translate-x-0');
        drawer.classList.add(isOpen ? 'translate-x-0' : '-translate-x-full');
        content.classList.remove(isOpen ? 'md:ml-0' : 'md:ml-64');
        content.classList.add(isOpen ? 'md:ml-64' : 'md:ml-0');
        isOpen = !isOpen;
    }
</script>
@stack('script')
</body>
</html>
