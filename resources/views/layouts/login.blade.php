<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <div class="flex h-screen bg-gray-300">
        <div class="w-1/4 m-auto">
            <div class="mx-auto font-bold text-2xl text-blue-700 text-center mb-6">
                {{ config('app.name') }}
            </div>

            @yield('content')
        </div>
    </div>
</body>
</html>
