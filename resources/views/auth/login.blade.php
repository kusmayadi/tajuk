@extends('layouts.login')

@section('content')
<div class="w-full bg-white shadow px-8 pt-6 pb-8 mb-4">
    <form method="POST" action="{{  route('login') }}">
        @csrf
        <div class="mb-5">
            <input
                name="email"
                id="email"
                type="text"
                class="@error('email') border-red-500 @enderror border w-full py-2 px-3"
                value="{{ old('email') }}"
                autocomplete="email" autofocus
                placeholder="Email"
            >

            @error('email')
                <p class="text-red-500 text-xs italic font-semibold mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-5">
            <input
                name="password"
                id="password"
                type="password"
                class="@error('password') border-red-500 @enderror border w-full py-2 px-3"
                placeholder="Password"
            >

            @error('password')
                <p class="text-red-500 text-xs italic font-semibold mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-6">
            <input
                class="border"
                type="checkbox"
                name="remember"
                id="remember"
                {{ old('remember') ? 'checked' : '' }}
            >

            <label class="text-sm" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-700 py-2 px-5 text-white font-semibold rounded">
                Login
            </button>

            @if (Route::has('password.request'))
                <a class="text-blue-700 font-semibold text-sm" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>
</div>
@endsection
