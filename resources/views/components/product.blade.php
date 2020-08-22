<div class="lg:w-1/4 md:w-1/2 p-4 w-full">
    <div class="flex justify-center">
        <a class="block relative h-48 rounded overflow-hidden"
            href="{{($product->bestSupply()) ? route('supply.show',['supply'=>$product->bestSupply()->id]) : route('product.show',['product'=>$product->id])}}">
            <img alt="ecommerce" class="object-cover object-center h-full block" src="{{$product->photo}}">
        </a>
    </div>
    <div class="mt-4">
        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
            @forelse ($product->category as $category)
            {{$category->name}} ,
            @empty
            No Category found
            @endforelse
        </h3>
        <h2 class="text-gray-900 title-font text-lg font-medium">{{$product->name}}</h2>

        @if ($product->bestSupply())
        <div class="flex mt-1 items-center">
            <h1>{{$product->bestSupply()->price}}</h1>
            @if ($product->bestSupply()->rating==0|$product->bestSupply()->rating==null)
            <h1 class="inline ml-2 text-xs text-red-500">Not Rated Yet</h1>
            @else
            <h1 class="bg-green-500 items-center ml-2 rounded-full px-1 text-white text-xs inline">
                {{$product->bestSupply()->rating}}
                <img class="inline mb-1" src="/images/star-full.svg" width="13" alt="">
                <h1>
                    @endif
        </div>

        @else
        <p class="mt-1 text-red-500">No Sellers Available</p>
        @endif

    </div>
</div>