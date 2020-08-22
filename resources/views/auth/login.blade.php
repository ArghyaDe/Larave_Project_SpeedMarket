@extends('layouts.app')

@section('content')
<div class="container lg:justify-between mx-auto p-8 mt-20">
    <div class="flex justify-center">
        <div class="bg-gray-300 p-8 rounded-lg shadow">
            <div class="font-bold title-font flex justify-center text-xl mb-2 text-gray-800">Login</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row m-2">
                    <label for="email" class="text-gray-700 text-md">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="focus:outline-none" autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <h1 class="text-xs text-red-500">{{ $message }}</h1>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row m-2">
                    <label for="password" class="text-gray-700 text-md">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror focus:outline-none"
                            name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <h1 class="text-xs text-red-500">{{ $message }}</h1>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row m-2">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit"
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link text-blue-500 hover:text-blue-700 m-1"
                            href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                        @endif
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection