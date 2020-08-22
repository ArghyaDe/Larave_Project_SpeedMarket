@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="wrapper m-10">
        <div class="flex justify-center ">
            <h1 class="text-2xl font-bold bg-blue-300 rounded-lg px-2 py-1">Create Supply</h1>
        </div>
        <form method="POST" action="{{route('supply.store',['seller'=>$user->seller->first()])}}">
            @csrf
            <div class="m-2">
                <label class="text-xl font-bold text-gray-600" for="name">Product: </label>
                {{-- <form action=""> --}}
                {{-- @csrf --}}
                <input class="border-black border-2 w-full" list="products" name="product_id" id="product_id">
                @error('product_id')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
                <datalist id="products" onkeypress="">
                    @if ($options)
                    @forelse ($options as $option)
                    <option value="{{$option->id}}">{{$option->name}} manufactured by
                        {{$option->manufacturer->company_name}}</option>
                    @empty
                    {{null}}
                    @endforelse
                    @endif

                </datalist>
                {{-- </form> --}}

            </div>
            <div class="m-2">
                <label class="text-xl font-bold text-gray-600" for="price">Supplier Name: </label>
                <h1 class="ml-2 inline font-bold">{{$user->seller->first()->company_name}}</h1>

            </div>
            <div class="m-2">
                <div><label class="text-xl font-bold text-gray-600" for="price">Product Price: </label></div>

                <input class="border-black border-2 w-full" name="price" type="text" value="{{@old('price')}}">
                @error('price')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="flex justify-center">
                <button
                    class="text-white bg-indigo-500 m-1 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg w-100"
                    type="submit">Create Supply</button>
                <a href="{{route('profile.show',['user'=>current_user()])}}"
                    class="text-white bg-indigo-500 m-1 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg w-100">
                    Cancel </a>
            </div>
        </form>
    </div>
</div>
@endsection
