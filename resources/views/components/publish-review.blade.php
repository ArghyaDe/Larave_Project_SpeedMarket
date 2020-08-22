<div>
    <form method="POST" action="{{route('supply.review',['supply'=>$supply])}}">
        @csrf
        <div>
            <b>Rate: </b>
            <select class="focus:outline-none bg-green-500 rounded-full" name="rating" id="rating">
                {{$value=5}}>
                @while ($value>=1) <option class="text-white" value={{$value}}>
                    {{$value}}
                </option>
                {{$value=$value-0.5}}
                @endwhile

            </select>
            <svg class="inline mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="15">
                <path
                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
                    fill="green" />
            </svg>
        </div>


        <textarea name="review" id="" class="w-full p-1 m-1 focus:outline-none" placeholder="Add review"></textarea>
        <hr>
        @error('review')
        <p class="text-red-500 text-sm">{{$message}}</p>
        @enderror
        <footer class="flex justify-between mt-2">
            <a href="{{route('profile.show',auth()->user())}}">
                <img src="{{auth()->user()->avatar}}" class="rounded-full" alt="" width="30">
            </a>
            <button type="submit"
                class="hover:bg-blue-600 bg-blue-500 rounded-lg shadow px-2 py-1 text-white">Post</button>
        </footer>
    </form>
</div>