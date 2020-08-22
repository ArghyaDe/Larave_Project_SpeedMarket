@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="lg:flex {{($user==current_user())?"lg:justify-between":"lg:justify-center"}} wrapper">
        <div class="{{($user==current_user())?"lg:w-1/3":""}}">
            <div class="p-4 bg-blue-500 m-10 rounded-lg">
                <div class="bg-white p-4 rounded-lg">
                    <div class="flex justify-center m-4">
                        <img src="{{$user->avatar}}" class="rounded-full mr-1" width="80x" alt="{{$user->name}}">
                    </div>
                    <div class="ml-4">
                        <div class="flex items-baseline">
                            <label class="font-bold text-xl text-gray-700 m-2" for="name">Name</label>
                            <h1 class="text-sm m-2 text-gray-500">{{$user->name}}<h1>
                        </div>

                        <div class="flex items-baseline">
                            <label class="font-bold text-xl text-gray-700 m-2" for="username">User Name</label>
                            <h1 class="text-sm m-2 text-gray-500">{{$user->username}}<h1>
                        </div>

                        <div class="flex items-baseline">
                            <label class="font-bold text-xl text-gray-700 m-2" for="email">Email</label>
                            <h1 class="text-sm m-2 text-gray-500">{{$user->email}}<h1>
                        </div>

                        <div class="flex items-baseline">
                            <label class="font-bold text-xl text-gray-700 m-2" for="phone_no">Phone No.</label>
                            <h1 class="text-sm m-2 text-gray-500">{{$user->phone_no ? $user->phone_no : ''}}<h1>
                        </div>

                        <div class="flex items-baseline">
                            <label class="font-bold text-xl text-gray-700 m-2" for="address">Address</label>
                            <h1 class="text-sm m-2 text-gray-500">{{$user->address ? $user->address : ''}}<h1>
                        </div>

                        <div class="flex items-baseline">
                            <label class="font-bold text-xl text-gray-700 m-2" for="seller">Seller</label>
                            <h1 class="text-sm m-2 text-gray-500">{{$user->is_seller==true?'Yes':'No'}}<h1>
                        </div>
                        <div class="flex items-baseline">
                            <label class="font-bold text-xl text-gray-700 m-2" for="manufacturer">Manufacturer</label>
                            <h1 class="text-sm m-2 text-gray-500">{{$user->is_manufacturer==true?'Yes':'No'}}<h1>
                        </div>
                    </div>
                    @can('edit', $user)
                    <a class="flex justify-center text-white bg-indigo-500 border-0 py-2 px-8 mt-2 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                        href="{{$user->path('edit')}}">Edit</a>
                    @endcan

                </div>
            </div>
        </div>

        @can('edit',$user)
        <div class="lg:w-2/3">
            <div class="flex justify-between border-blue-500 mt-2 mr-2 ml-2">
                <button id="Notificatios_button"
                    class="w-full bg-white inline-block py-2 px-4 text-blue-500 focus:outline-none hover:text-blue-800 font-semibold Tab text-blue-700 border-l-4 border-r-4 border-t-4 rounded-t-lg border-blue-500"
                    onclick="openTab(this,'Notificatios')">Notificatios</button>
                <button id="Cart_button"
                    class="w-full bg-white inline-block py-2 px-4 text-blue-500 focus:outline-none hover:text-blue-800 font-semibold Tab"
                    onclick="openTab(this,'Cart')">Cart</button>
                @if ($user->is_seller)
                <button id="Supplies_button"
                    class="w-full bg-white inline-block py-2 px-4 text-blue-500 focus:outline-none hover:text-blue-800 font-semibold Tab"
                    onclick="openTab(this,'Supplies')">Supplies</button>
                @endif
                @if ($user->is_manufacturer)
                <button id=Products_button"
                    class="w-full bg-white inline-block py-2 px-4 text-blue-500 focus:outline-none hover:text-blue-800 font-semibold Tab"
                    onclick="openTab(this,'Products')">Products</button>
                @endif
            </div>
            <div class="border-l-4 border-r-4 border-t-4 rounded-t-lg border-blue-500 p-4">
                <div id="Notificatios" class="container specials">
                    <x-notifications :user="$user" />
                </div>

                <div id="Cart" class="container specials" style="display:none">
                    <x-cart :user="$user" />
                </div>
                @if ($user->is_seller)
                <div id="Supplies" class="container specials" style="display:none">
                    <x-selling-product :user="$user" />
                </div>
                @endif
                @if ($user->is_manufacturer)
                <div id="Products" class="container specials" style="display:none">
                    <x-manufacturing-product :user="$user" />
                </div>
                @endif

            </div>


            <script>
                window.onload=function(){
                    var tabName=location.search.split("tab=")[1];
                    var ele = document.getElementById(tabName+"_button");
                    (ele) ? openTab(ele,tabName) : null;
                }
                function openTab(ele,tabName) {
                    var i;
                    var x = document.getElementsByClassName("specials");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none"
                    }
                    var tab=document.getElementsByClassName('Tab');
                    for (let i = 0; i < tab.length; i++) {
                        tab[i].classList.remove('text-blue-700');
                        tab[i].classList.remove('border-l-4');
                        tab[i].classList.remove('border-r-4');
                        tab[i].classList.remove('border-t-4');
                        tab[i].classList.remove('rounded-t-lg');
                        // tab[i].classList.remove('bg-blue-200');
                        tab[i].classList.remove('border-blue-500');
                    }
                    ele.classList.add('text-blue-700');
                    ele.classList.add('border-l-4');
                    ele.classList.add('border-r-4');
                    ele.classList.add('border-t-4');
                    ele.classList.add('rounded-t-lg');
                    // ele.classList.add('bg-blue-200');
                    ele.classList.add('border-blue-500');
                    document.getElementById(tabName).style.display = "block";
                }
            </script>
        </div>
        @endcan

    </div>
</div>

@endsection
