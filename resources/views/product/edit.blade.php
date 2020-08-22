@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="wrapper m-10">
        <div class="flex justify-center ">
            <h1 class="text-2xl font-bold bg-blue-300 rounded-lg px-2 py-1">Edit Product</h1>
        </div>
        <form method="POST" action="{{route('product.update',['product'=>$product])}}" enctype="multipart/form-data">
            @csrf
            <div class="m-2">
                <div><label class="text-xl font-bold text-gray-600" for="name">Product Name: </label></div>

                <input class="border-black border-2 w-full" name="name" type="text" value="{{$product->name}}">
                @error('name')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="lg:flex m-2 items-baseline">
                <label class="text-xl font-bold text-gray-600" for="name">Manufacturer: </label>
                <h1 class="ml-2">{{$product->manufacturer->company_name}}</h1>
            </div>
            <div class="flex justify-center m-10">
                <img src="{{$product->photo}}" alt="product image" width="600" height="600">
            </div>
            <div class="lg:flex justify-center m-2">

                <label class="text-xl font-bold text-gray-600" for="photo">Product Photo: </label>
                <input class="border-0 lg:ml-4 w-auto" name="photo" type="file">
            </div>
            <div class="m-2">
                <label class="text-xl font-bold text-gray-600" for="specification">Product Specifications: </label>
                <textarea class="border-black border-2 mt-1 w-full" name="specification" cols="160"
                    rows="10">{{$product->specification}}</textarea>
                @error('specification')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class=" m-2">
                <div class="lg:flex">
                    <label class="text-xl font-bold text-gray-600" for="category">Product Categories: </label>
                    <select class="ml-4" name="category[]" multiple>
                        @foreach ($categorys as $category)
                        @if ($product->category->contains($category))
                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                        @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

                @error('category')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="flex justify-center">
                <button
                    class="text-white bg-indigo-500 m-1 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg w-100"
                    type="submit">Update Product</button>
                <a href="{{route('product.show',['product'=>$product])}}"
                    class="text-white bg-indigo-500 m-1 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg w-100">
                    Cancel </a>
            </div>
        </form>
        <form method="POST" action="{{route('product.delete',['product'=>$product])}}">
            @csrf
            <div class="flex justify-center">
                <button
                    class="text-white bg-indigo-500 border-0 py-2 px-8 m-2 focus:outline-none hover:bg-indigo-600 rounded text-lg w-auto"
                    type="submit">Delete Product</button>
            </div>

        </form>
    </div>
</div>
@endsection