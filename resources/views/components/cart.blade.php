<div>
    <ul>
        @forelse ($user->cart as $cart)
        <li class="flex p-4 bg-blue-100 hover:bg-blue-200 rounded-lg mt-10">
            <div class="flex justify-center w-1/2">
                <a class="block relative h-48 rounded overflow-hidden"
                    href="{{route('supply.show',['supply'=>$cart->supply])}}">
                    <img alt="ecommerce" class="object-cover object-center h-full block"
                        src="{{$cart->supply->product->photo}}">
                </a>
            </div>
            <div class="mt-4 ml-8 w-1/2">
                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                    @forelse ($cart->supply->product->category as $category)
                    {{$category->name}} ,
                    @empty
                    No Category found
                    @endforelse
                </h3>
                <h2 class="text-gray-900 title-font text-md font-medium">{{$cart->supply->product->name}}</h2>
                <h2 class="text-gray-900 title-font text-md font-medium"><b>Manufacturers:
                    </b>{{$cart->supply->product->manufacturer->first()->company_name}}</h2>
                <div class="flex mt-1 items-center">
                    <h1>{{$cart->supply->price}}</h1>
                    <h1 class="bg-green-500 ml-4 items-center rounded-full px-1 text-white text-xs">
                        {{$cart->supply->rating}}
                        <img class="inline mb-1" src="/images/star-full.svg" width="13" alt="">
                        <h1>
                </div>

            </div>
        </li>
        @empty

        <div class="flex justify-center">
            <h1 class="text-2xl text-green-500 font-bold">Cart Is Empty</h1>
        </div>

        @endforelse
    </ul>

</div>
