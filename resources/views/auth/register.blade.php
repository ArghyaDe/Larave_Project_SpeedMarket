@extends('layouts.app')

@section('content')
<div class="container lg:justify-between mx-auto p-8 mt-10">
    <div class="flex justify-center">
        <div class="bg-gray-300 p-8 rounded-lg shadow">
            <div class="card">
                <div class="font-bold title-font flex justify-center text-xl mb-2 text-gray-800">Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row m-2">
                            <label for="username" class="text-gray-700 text-md">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror focus:outline-none"
                                    name="username" value="{{ old('username') }}" required autocomplete="username"
                                    autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <h1 class="text-xs text-red-500">{{ $message }}</h1 class="text-xs text-red-500">
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row m-2">
                            <label for="name" class="text-gray-700 text-md">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror focus:outline-none"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <h1 class="text-xs text-red-500">{{ $message }}</h1 class="text-xs text-red-500">
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row m-2">
                            <label for="email" class="text-gray-700 text-md">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror focus:outline-none"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <h1 class="text-xs text-red-500">{{ $message }}</h1 class="text-xs text-red-500">
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row m-2">
                            <label for="password" class="text-gray-700 text-md">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror focus:outline-none"
                                    name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <h1 class="text-xs text-red-500">{{ $message }}</h1 class="text-xs text-red-500">
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row m-2">
                            <label for="password-confirm"
                                class="text-gray-700 text-md">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control focus:outline-none"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="flex justify-center offset-md-4">
                                <button type="submit"
                                    class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
