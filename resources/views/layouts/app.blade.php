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
    <div id="app" class="min-h-screen bg-red-100">
        <header class="bg-blue-900 w-full py-3 mb-4">
            <div class="container mx-auto flex justify-between text-white">
                <div class="font-bold">
                    {{  config('app.name', 'Tajuk') }}
                </div>

                <div class="dropdown">
                    <button class="inline-flex items-center">
                        <span class="mr-1">{{  Auth::user()->name }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                    </button>

                    <ul class="dropdown-menu absolute hidden bg-blue-800 p-4">
                        <li>
                            <a
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
        </header>

        <div class="container mx-auto flex justify-start">
            <!-- Navigation -->
            <div class="bg-blue-700 py-4 px-5 w-1/6 min-h-full rounded-lg text-white">
                <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
            </div>
            <!-- End Navigation -->

            <!-- Content -->
            <div class="py-4 px-5">
                @yield('content')
            </div>
            <!-- End content -->
        </div>
    </div>
</body>
</html>
