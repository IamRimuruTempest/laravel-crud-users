<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">




    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">

        <!-- ========== HEADER ========== -->
        <header class="flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full py-7">
            <nav class="relative max-w-7xl w-full flex flex-wrap md:grid md:grid-cols-12 basis-full items-center px-4 md:px-6 md:px-8 mx-auto">
                <div class="md:col-span-3">

                    <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80" href="/users" aria-label="Preline">
                        {{ Auth::user()->fullname }}
                    </a>
                    <!-- End Logo -->
                </div>

                <!-- Button Group -->
                <div class="flex items-center gap-x-1 md:gap-x-2 ms-auto py-1 md:ps-6 md:order-3 md:col-span-3">

                    @guest
                    @if (Route::has('login'))
                    <a href="{{ route('login') }}" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl bg-white border border-gray-200 text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none ">
                        Sign in
                    </a>
                    @endif
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl bg-white border border-gray-200 text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none ">
                            Sign in
                        </a>
                    </li>
                    @endif
                    @else
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-white py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl border border-transparent bg-blue-600  hover:bg-blue-700 focus:outline-none focus:bg-blue-500 transition disabled:opacity-50 disabled:pointer-events-none">
                            Logout
                        </button>
                    </form>
                    @endguest


                    <div class="md:hidden">
                        <button type="button" class="hs-collapse-toggle size-[38px] flex justify-center items-center text-sm font-semibold rounded-xl border border-gray-200 text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none " id="hs-navbar-hcail-collapse" aria-expanded="false" aria-controls="hs-navbar-hcail" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-hcail">
                            <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="3" x2="21" y1="6" y2="6" />
                                <line x1="3" x2="21" y1="12" y2="12" />
                                <line x1="3" x2="21" y1="18" y2="18" />
                            </svg>
                            <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18" />
                                <path d="m6 6 12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- End Button Group -->

                <!-- Collapse -->
                <div id="hs-navbar-hcail" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block md:w-auto md:basis-auto md:order-2 md:col-span-6" aria-labelledby="hs-navbar-hcail-collapse">
                    <!-- <div class="flex flex-col gap-y-4 gap-x-0 mt-5 md:flex-row md:justify-center md:items-center md:gap-y-0 md:gap-x-7 md:mt-0">
                        <div>
                            <a class="relative inline-block text-black focus:outline-none before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 " href="#" aria-current="page">Users</a>
                        </div>
                        <div>
                            <a class="inline-block text-black hover:text-gray-600 focus:outline-none focus:text-gray-600 " href="#">About</a>
                        </div>
                        <div>
                            <a class="inline-block text-black hover:text-gray-600 focus:outline-none focus:text-gray-600 " href="#">Account</a>
                        </div>

                    </div> -->
                </div>
                <!-- End Collapse -->
            </nav>
        </header>
        <!-- ========== END HEADER ========== -->

        <main class="">
            <div class="max-w-[85rem] px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto">
                @yield('content')
                <div>
        </main>
    </div>

    <script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>