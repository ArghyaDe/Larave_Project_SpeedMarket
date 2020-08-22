@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="wrapper lg:flex lg:justify-between">
        <div class="flex justify-center lg:m-10 lg:w-1/2">
            <div class="w-full">
                <img class="w-full" src="{{$supply->product->photo}}" alt="{{$supply->product->name}}">
                <div class="flex justify-between mt-2">

                    @can('edit_supply',$supply->seller)

                    <form class="w-full m-1" method="POST"
                        action="{{route('supply.delete',['supply'=>$supply{{--,'user'=>$supply->seller--}}])}}">
                        @csrf
                        <button
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg w-full"
                            type="submit">Delete Supply</button>
                    </form>

                    @else

                    <form class="w-1/2 m-1" method="POST"
                        action="{{route('addOrRemoveCart',['supply'=>$supply,'user'=>current_user()])}}">
                        @csrf
                        @if ($supply->cart->contains('user_id',current_user()->id))
                        <button
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg w-full"
                            type="submit">Remove From Cart</button>
                        @else
                        <button
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg w-full"
                            type="submit">Add To Cart</button>
                        @endif

                    </form>
                    <form class="w-1/2 m-1" method="POST" action="{{route('payment',['supply'=>$supply->id])}}">
                        @csrf
                        <button
                            class="text-white bg-orange-500 border-0 py-2 px-8  focus:outline-none hover:bg-orange-600 rounded text-lg w-full"
                            type="submit">Buy Now</button>
                    </form>

                    @endcan



                </div>
            </div>
        </div>
        <div class="lg:w-1/2 m-2">
            <ul class="col-gap-1">
                <li>
                    <h1 class="inline text-3xl mt-1 mb-1 font-bold">{{$supply->product->name}}</h1>
                </li>
                <li>
                    @forelse ($supply->product->category as $category)
                    <p class="text-white inline text-xs font-bold m-1 py-1 px-2 rounded-full bg-gray-500">
                        {{$category->name}}</p>
                    @empty
                    <p class="bg-gray-500 rounded-full text-white text-xs inline font-bold m-1 py-1 px-2">
                        NO CATEGORY FOUND</p>
                    @endforelse
                </li>
                <li class="mt-1">
                    <b>Rating: </b>
                    @if ($supply->rating==0|$supply->rating==null)
                    <h1 class="inline ml-2 text-xs text-red-500">Not Rated Yet</h1>
                    @else
                    <h1 class="bg-green-500 items-center rounded-full px-1 text-white text-xs inline">
                        {{$supply->rating}}
                        <img class="inline mb-1" src="/images/star-full.svg" width="13" alt="">
                        <h1>
                            @endif


                </li>
                <li class="mt-1">
                    <b>Price: </b>
                    <h1 class="inline">{{$supply->price}}</h1>
                </li>
                <li class="mt-1">
                    <b>Seller: </b>
                    <h1 class="inline">{{$supply->seller->seller->first()->company_name}}</h1>
                </li>
                <li class="mt-1">
                    <b>Specifications: </b>
                    <h1 class="inline">{{$supply->product->specification}}</h1>
                </li>
                <li class="mt-1">
                    @if ($supply->product->supply->count()>1)
                    <b>Other Sellers: </b><br>
                    @foreach ($supply->product->supply as $sup)
                    @if ($sup->id!=$supply->id)
                    <a class="hover:text-blue-500" href="{{route('supply.show',['supply'=>$sup])}}">
                        <b class="ml-2">Seller Name:</b>
                        <h1 class="inline font-bold">{{$sup->seller->seller->first()->company_name}}</h1>
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
                    @endif
                    @endforeach
                    @else
                    <b class="text-red-500">No Other Seller</b class="text-red-500">
                    @endif

                </li>
                <li class="mt-1">
                    <h1 class="text-xl"><u>Reviews:</u> </h1>
                    @if ($supply->review->map(function($review){return $review->reviewer;})->contains(current_user()))
                    <div id="my_review">
                        <div align="right">
                            <button class="focus:outline-none" onclick="edit_post()"><img class="hover:opacity-50 mr-2"
                                    src="/images/edit-pencil.svg" width="13"
                                    {{$review=current_user()->reviews->where('supply_id',$supply->id)->first()->review}}></button>

                        </div>

                        <div class="m-2 flex justify-between">

                            <div class="flex items-center">
                                <img src="{{current_user()->avatar}}" class="rounded-full" alt="" width="30">

                                <div class="ml-2">
                                    <b class="text-sm">{{current_user()->name}}</b>
                                    <p class="text-sm">
                                        {{$review}}</p>
                                </div>

                            </div>
                            <div>
                                <h1 class="bg-green-500 items-center rounded-full px-1 text-white text-xs inline"
                                    {{$rating=current_user()->reviews->where('supply_id',$supply->id)->first()->rating}}>
                                    {{$rating}}
                                    <img class="inline mb-1" src="/images/star-full.svg" width="13" alt="">
                                    <h1>
                            </div>
                        </div>
                    </div>

                    <hr>


                    <div id="my_review_edit" style="display: none">
                        <form method="POST" action="{{route('supply.review.update',['supply'=>$supply])}}">
                            @csrf
                            <div>
                                <b>Rate: </b>
                                <select class="focus:outline-none bg-green-500 rounded-full" name="rating" id="rating"
                                    {{$value=5}}>
                                    @while ($value>=1) <option class="text-white" value={{$value}}
                                        {{($value==$rating) ? "selected":""}}>
                                        {{$value}}
                                    </option>
                                    {{$value=$value-0.5}}
                                    @endwhile

                                </select>
                                <svg class="inline mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    width="15">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
                                        fill="green" />
                                </svg>
                            </div>


                            <textarea name="review" id="" class="w-full p-1 m-1 focus:outline-none"
                                placeholder="Add review">{{$review}}</textarea>
                            <hr>
                            @error('review')
                            <p class="text-red-500 text-sm">{{$message}}</p>
                            @enderror
                            <footer class="flex justify-between mt-2">
                                <a href="{{route('profile.show',auth()->user())}}">
                                    <img src="{{auth()->user()->avatar}}" class="rounded-full" alt="" width="30">
                                </a>
                                <div>
                                    <button type="submit"
                                        class="hover:bg-blue-600 bg-blue-500 rounded-lg shadow px-2 py-1 text-white focus:outline-none">Update
                                        Post</button>
                                    <a class="hover:bg-blue-600 bg-blue-500 rounded-lg shadow px-2 py-1 text-white focus:outline-none"
                                        href="">Clancel</a>
                                </div>

                            </footer>
                        </form>

                    </div>

                    <script>
                        function edit_post() {
                            document.getElementById("my_review").style.display="none";
                            document.getElementById("my_review_edit").style.display="block";
                        }
                    </script>

                    @else

                    <x-publish-review :supply="$supply" />

                    @endif

                    <x-review : supply="$supply" :reviews="$reviews" />
                </li>
            </ul>

        </div>
    </div>
</div>
@endsection