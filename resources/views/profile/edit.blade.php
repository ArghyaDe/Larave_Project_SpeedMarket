@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center wrapper">
        <div class="p-4 bg-blue-500 m-10 rounded-lg">

            <div class="bg-white p-4 rounded-lg">
                <form method="POST" action="{{$user->path()}}" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center m-4 items-center">
                        <img src="{{$user->avatar}}" class="rounded-full mr-1" width="80x" alt="{{$user->name}}">
                    </div>
                    <div class="ml-4">
                        <div class="flex justify-center items-center">
                            <label class="font-bold text-xl text-gray-700 m-2" for="avatar">Avatar:</label>
                            <input class="ml-2" name="avatar" type="file" value={{old('avatar')}}>
                        </div>
                        <div class="flex justify-between items-baseline">
                            <label class="font-bold text-xl text-gray-700 m-2" for="name">Name:</label>
                            <input type="text" class="border border-gray-300 p-2 w-auto focus:outline-none" name="name"
                                id="name" required value="{{$user->name}}">
                            @error('name')
                            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex justify-between items-baseline">
                            <label class="font-bold text-xl text-gray-700 m-2" for="username">User Name:</label>
                            <input type="text" class="border border-gray-300 p-2 w-auto focus:outline-none"
                                name="username" id="username" required value="{{$user->username}}">
                            @error('username')
                            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex justify-between items-baseline">
                            <label class="font-bold text-xl text-gray-700 m-2" for="email">Email:</label>
                            <input type="text" class="border border-gray-300 p-2 w-auto focus:outline-none" name="email"
                                id="email" required value="{{$user->email}}">
                            @error('email')
                            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex justify-between items-baseline">
                            <label class="font-bold text-xl text-gray-700 m-2" for="phone_no">Phone No. :</label>
                            <input type="text" maxlength="11"
                                class="border border-gray-300 p-2 w-auto focus:outline-none" name="phone_no"
                                id="phone_no" value="{{$user->phone_no}}">
                            @error('phone_no')
                            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="font-bold text-xl text-gray-700 m-2" for="address">Address:</label>
                            <input type="text" class="border border-gray-300 p-2 w-full focus:outline-none"
                                name="address" id="address" value="{{$user->address}}">
                            @error('address')
                            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex items-baseline">
                            <label class="font-bold text-xl text-gray-700 m-2" for="is_seller">Seller:</label>
                            <select name="is_seller" id="is_seller" class="focus:outline-none">
                                @if ($user->is_seller==1)
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>

                                @else
                                <option value="0" selected>No</option>
                                <option value="1">Yes</option>
                                @endif
                            </select>
                        </div>
                        <div>
                            <label class="font-bold text-xl text-gray-700 m-2" for="seller_company_name">Seller Company:
                            </label>
                            <input type="text" class="border border-gray-300 p-2 w-full focus:outline-none"
                                name="seller_company_name" id="seller_company_name"
                                value="{{($user->is_seller) ? $user->seller->first()->company_name : old('seller_company_name')}}"
                                placeholder="Fill if you are seller">
                            @error('seller_company_name')
                            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="font-bold text-xl text-gray-700 m-2" for="seller_company_address">Seller
                                Company Address:
                            </label>
                            <input type="text" class="border border-gray-300 p-2 w-full focus:outline-none"
                                name="seller_company_address" id="seller_company_address"
                                value="{{($user->is_seller) ? $user->seller->first()->company_address : old('seller_company_address')}}"
                                placeholder="Fill if you are seller">
                            @error('seller_company_address')
                            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex items-baseline">
                            <label class="font-bold text-xl text-gray-700 m-2"
                                for="is_manufacturer">Manufacturer:</label>
                            <select name="is_manufacturer" id="is_manufacturer" class="focus:outline-none">
                                @if ($user->is_manufacturer==1)
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>

                                @else
                                <option value="0" selected>No</option>
                                <option value="1">Yes</option>
                                @endif

                            </select>
                        </div>
                        <div>
                            <label class="font-bold text-xl text-gray-700 m-2" for="manufacturer_company_name">
                                Manufacturer Company:
                            </label>
                            <input type="text" class="border border-gray-300 p-2 w-full focus:outline-none"
                                name="manufacturer_company_name" id="manufacturer_company_name"
                                value="{{($user->is_manufacturer) ? $user->manufacturer->first()->company_name : old('manufacturer_company_name')}}"
                                placeholder="Fill if you are manufacturer">
                            @error('manufacturer_company_name')
                            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="font-bold text-xl text-gray-700 m-2" for="manufacturer_company_address">
                                Manufacturer Company Address:
                            </label>
                            <input type="text" class="border border-gray-300 p-2 w-full focus:outline-none"
                                name="manufacturer_company_address" id="manufacturer_company_address"
                                value="{{($user->is_manufacturer) ? $user->manufacturer->first()->company_address : old('manufacturer_company_address')}}"
                                placeholder="Fill if you are manufacturer">
                            @error('manufacturer_company_address')
                            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="flex justify-center">
                        <button
                            class="text-white bg-indigo-500 border-0 py-2 px-8 m-2 focus:outline-none hover:bg-indigo-600 rounded text-lg w-auto"
                            type="submit">Update</button>
                        <a class="text-white bg-indigo-500 border-0 py-2 px-8 m-2 focus:outline-none hover:bg-indigo-600 rounded text-lg w-auto"
                            href="{{$user->path()}}">Cancel</a>

                    </div>
                </form>
                <form method="POST" action="{{route('profile.delete',['user'=>$user])}}">
                    @csrf
                    <div class="flex justify-center">
                        <button
                            class="text-white bg-indigo-500 border-0 py-2 px-8 m-2 focus:outline-none hover:bg-indigo-600 rounded text-lg w-auto"
                            type="submit">Delete Profile</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@endsection
