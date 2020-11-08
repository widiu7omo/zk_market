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
    </div>
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script>
    console.log(window.$);

    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("bg-white");
        document.getElementById(collapseID).classList.toggle("m-2");
        document.getElementById(collapseID).classList.toggle("py-3");
        document.getElementById(collapseID).classList.toggle("px-6");
    }

    function openTableOptions(event, optionID) {
        let element = event.target;
        while (element.nodeName !== "A") {
            element = element.parentNode;
        }
        var popper = new Popper(element, document.getElementById(optionID), {
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
