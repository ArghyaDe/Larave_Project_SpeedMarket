<div>
    <div align="right">
        <a class="bg-gray-400 hover:bg-gray-300 py-1 px-2 rounded-full"
            href="{{route('supply.create',['seller'=>$user->seller->first()])}}"><b>+</b> New
            Supply</a>
    </div>
    <ul>
        @forelse ($user->supply as $supply)
        <li class="flex p-4 bg-blue-100 rounded-lg mt-10">
            <div class="flex justify-center w-1/2">
                <a class="block relative h-48 rounded overflow-hidden"
                    href="{{route('supply.show',['supply'=>$supply])}}">
                    <img alt="ecommerce" class="object-cover object-center h-full block"
                        src="{{$supply->product->photo}}">
                </a>
            </div>
            <div class="mt-4 ml-8 w-1/2">
                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                    @forelse ($supply->product->category as $category)
                    {{$category->name}} ,
                    @empty
                    No Category found
                    @endforelse
                </h3>
                <h2 class="text-gray-900 title-font text-md font-medium">{{$supply->product->name}}</h2>
                <h2 class="text-gray-900 title-font text-md font-medium"><b>Manufacturers:
                    </b>{{$supply->product->manufacturer->first()->company_name}}</h2>
                <div class="flex mt-1 items-center">
                    <h1>{{$supply->price}}</h1>
                    @if ($supply->rating==0|$supply->rating==null)
                    <h1 class="inline ml-2 text-xs text-red-500">Not Rated Yet</h1>
                    @else
                    <h1 class="bg-green-500 items-center ml-2 rounded-full px-1 text-white text-xs inline">
                        {{$supply->rating}}
                        <img class="inline mb-1" src="/images/star-full.svg" width="13" alt="">
                        <h1>
                            @endif
                </div>

            </div>
        </li>
        @empty

        <div class="flex justify-center">
            <h1 class="text-2xl text-green-500 font-bold">No Supplies</h1>
        </div>

        @endforelse
    </ul>

</div>