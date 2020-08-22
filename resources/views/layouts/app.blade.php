<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SpeedMarket</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

        <header>
            <div class="wrapper">
                <div class="flex justify-between bg-blue-300 p-2">
                    <a href="{{route('home')}}">
                        <div class="flex bg-white rounded-lg p-1 items-center">
                            <img src="/images/icon.png" width="40" alt="logo">
                            <h1 class="text-blue-400 m-1">SpeedMarket</h1>
                        </div>
                    </a>



                    <div class="flex items-center">
                        <form action="{{route('search')}}" method="GET">
                            @csrf
                            <div class="flex items-center bg-white rounded-full mr-2">
                                <input name="search" id="search"
                                    class="px-2 py-2 bg-white rounded-l-full focus:outline-none " style="width: 300px"
                                    type="text" placeholder="Search Now" value={{($search ?? null)? $search : ""}}>
                                    {{-- <datalist id="products">
                                    </datalist>
                                    <script>
                                        function data(params) {
                                            var search_list = document.getElementById('products');
                                            search_list.innerHTML='<option value='+product+'>'+product+'</option>';
                                        }

                                    </script> --}}

                                <button type="submit"
                                    class="p-2 m-0 bg-white rounded-r-full inline hover:opacity-50 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="24" height="24">
                                        <path
                                            d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"
                                            fill="gray" /></svg>
                                </button>
                            </div>

                        </form>
                        @auth


                        <a href="{{route('profile.show',['user'=>current_user()])}}">
                            <div
                                class="bg-blue-300 border hover:bg-blue-200 border-white rounded-lg px-3 py-3 mr-2 focus:outline-none relative">
                                @if (current_user()->unreadNotifications->first())
                                <p class="absolute bg-red-500 text-white text-xs rounded-full px-1"
                                    style="top: 1px; left: 24px;">
                                    {{(current_user()->unreadNotifications->count()>99)?"99+":current_user()->unreadNotifications->count()}}
                                </p>
                                @endif

                                <img src="/images/notifications.svg" width="20" alt="">
                            </div>
                        </a>
                        <a href="{{current_user()->path()}}">
                            <div
                                class="flex items-center bg-white rounded-full border border-blue-500 border-4 p-1 mr-4">
                                <img src="{{current_user()->avatar}}" class="rounded-full mr-1"
                                    alt="{{current_user()->name}}" width="40px">
                                <h1 class="text-blue-400 p-1">{{current_user()->name}}</h1>
                            </div>
                        </a>

                        <div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-white text-blue-400 rounded-lg p-2 focus:outline-none">Logout</button>
                            </form>
                        </div>
                        @else
                        <a href="{{ route('login') }}">
                            <div class="bg-white rounded-lg p-1 mr-1">
                                <h1 class="text-blue-400 m-1">Login</h1>
                            </div>
                        </a>
                        <a href="{{ route('register') }}">
                            <div class="bg-white rounded-lg p-1">
                                <h1 class="text-blue-400 m-1">Register</h1>
                            </div>
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

    </div>
</body>

<script src="http://unpkg.com/turbolinks"></script>

</html>
