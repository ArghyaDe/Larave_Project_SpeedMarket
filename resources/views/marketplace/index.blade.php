@extends('layouts.app')

@section('content')
<div class="bg-blue-100">
    <section class="text-gray-700 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                @forelse ($products as $product)
                <x-product :product="$product" />
				@empty
				<div class="mx-auto flex h-full">
				<p class="text-gray-400 text-5xl font-bold">No Product Found</p>
				</div>
                @endforelse


            </div>
        </div>
        <div class="mb-2 flex justify-center">
            <p style="list-style: -webkit-linear-gradient();">{{$products->links()}}</p>
        </div>
    </section>
</div>

@endsection
