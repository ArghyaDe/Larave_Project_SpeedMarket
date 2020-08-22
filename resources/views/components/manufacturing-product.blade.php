<div>
    <div align="right">
        <a class="bg-gray-400 hover:bg-gray-300 py-1 px-2 rounded-full"
            href="{{route('product.create',['manufacturer'=>$user->manufacturer->first()])}}"><b>+</b> New
            Product</a>
    </div>
    <ul>
        @forelse ($user->manufacturer->first()->product as $product)
        <li class="flex p-4 bg-blue-100 hover:bg-blue-200 rounded-lg mt-10">
            <div class="lg:flex lg:justify-center lg:w-1/2">
                <a class="block relative h-48 rounded overflow-hidden"
                    href="{{route('product.show',['product'=>$product])}}">
                    <img alt="ecommerce" class="object-cover object-center h-full block" src="{{$product->photo}}">
                </a>
            </div>
            <div class="mt-4 ml-8 lg:w-1/2">
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
                    <b>Best Price:</b>
                    <h1 class="ml-2 inline">{{$product->bestSupply()->price}}</h1>
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
        </li>
        @empty
        <div class="flex justify-center">
            <h1 class="text-2xl text-green-500 font-bold">No Product</h1>
        </div>

        @endforelse

    </ul>
</div>