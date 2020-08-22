@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="wrapper lg:flex lg:justify-between">
        <div class="flex justify-center lg:m-10 lg:w-1/2">
            <div class="w-full">
                <img class="w-full" src="{{$product->photo}}" alt="{{$product->name}}">
                @can('edit_product', $product)
                <div class="flex justify-between mt-2">
                    <form class="w-full m-1" method="GET" action="{{route('product.edit',['product'=>$product])}}">
                        @csrf
                        <button
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg w-full"
                            type="submit">Edit Product</button>
                    </form>

                </div>
                @endcan

            </div>
        </div>
        <div class="lg:w-1/2 m-2">
            <ul class="col-gap-1">
                <li class="mt-4">
                    <h1 class="inline text-3xl mt-1 mb-1 font-bold">{{$product->name}}</h1>
                </li>
                <li class="mt-4">
                    @forelse ($product->category as $category)
                    <p class="text-white inline text-xs font-bold m-1 py-1 px-2 rounded-full bg-gray-500">
                        {{$category->name}}</p>
                    @empty
                    <p class="bg-gray-500 rounded-full text-white text-xs inline font-bold m-1 py-1 px-2">
                        NO CATEGORY FOUND</p>
                    @endforelse
                </li>
                <li>
                    <div class="lg:flex mt-4 items-baseline">
                        <label class="text-xl font-bold" for="name">Manufacturer: </label>
                        <h1 class="ml-2">{{$product->manufacturer->company_name}}</h1>
                    </div>
                </li>

                <li class="mt-4">
                    <b class="text-xl font-bold">Specifications: </b>
                    <p>{{$product->specification}}</hp>
                </li>
                <li class="mt-4">
                    @if ((bool)$product->supply->first())
                    <b>Sellers: </b><br>
                    @foreach ($product->supply as $sup)
                    <a class="hover:text-blue-500" href="{{route('supply.show',['supply'=>$sup])}}">
                        <b class="ml-2">Seller Name:</b>
                        <h1 class="inline font-bold">{{$sup->seller->name}}</h1>
                        <b class="ml-2 ">Price: </b>
                        <h2 class="inline"> {{$sup->price}}</h2>
                        <b class="ml-2 ">Rating: </b>
                        @if ($sup->rating==0|$sup->rating==null)
                        <h1 class="inline ml-2 text-xs text-red-500">Not Rated Yet</h1>
                        @else
                        <h1 class="bg-green-500 items-center rounded-full px-1 text-white text-xs inline">
                            {{$sup->rating}}
                            <img class="inline mb-1" src="/images/star-full.svg" width="13" alt="">
                            <h1>
                                @endif
                    </a>
                    <hr class="m-1">
                    @endforeach
                    @else
                    <b class="text-red-500">No Seller Available</b>
                    @endif

                </li>
            </ul>

        </div>
    </div>
</div>
@endsection
