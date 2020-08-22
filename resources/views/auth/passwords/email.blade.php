@extends('layouts.app')

@section('content')
<div class="container lg:justify-between mx-auto p-8 mt-20">
    <div class="flex justify-center">
        <div class="bg-gray-300 p-8 rounded-lg shadow">
            <div class="card">
                <div class="font-bold title-font flex justify-center text-xl mb-2 text-gray-800">
                    {{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row m-2">
                            <label for="email" class="text-gray-700 text-md">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror focus:outline-none"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <h1 class="text-xs text-red-500">{{ $message }}</h1>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"
                                    class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                    {{ __('Send Reset Link') }}
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