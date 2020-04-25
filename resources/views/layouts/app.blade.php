<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="flex justify-start">
        <div class="w-1/6 bg-blue-800 min-h-screen text-white">
            <!--- Logo -->
            <div class="font-bold bg-blue-900 py-3 px-5">
                {{  config('app.name', 'Tajuk') }}
            </div>
            <!-- End Logo -->

            <!-- Navigation -->
            <div id="navigation" class="py-3 px-5">
                <a dusk="nav-dashboard" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
            </div>
            <!-- End Navigation -->
        </div>

        <div class="w-5/6">
            <!-- Profile -->
            <div id="profile" class="text-right items-right py-3 px-5 bg-gray-200">
                <div class="dropdown inline-block relative">
                    <button class="inline-flex items-center">
                        <span dusk="user" class="mr-1 text-sm">{{  Auth::user()->name }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                    </button>

                    <ul dusk="profile_menu" class="dropdown-menu absolute hidden bg-blue-700 p-4 text-white text-sm">
                        <li>
                            <a
                                dusk="logout"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            >
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End Profile -->

            <!-- Content -->
            <div class="py-2 px-5">
                @yield('content')
            </div>
            <!-- End content -->
        </div>
    </div>
</body>
</html>
