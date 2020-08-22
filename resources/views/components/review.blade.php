<div class="mt-4">
    @foreach ($reviews as $review)
    @if ($review->user_id!=current_user()->id)
    <div class="m-2 flex justify-between">
        <div class="flex items-center">
            <a href="{{route('profile.show',$review->reviewer)}}">
                <img src="{{$review->reviewer->avatar}}" class="rounded-full" alt="" width="30">
            </a>
            <div class="ml-2">
                <a href="{{route('profile.show',$review->reviewer)}}">
                    <b class="text-sm hover:text-blue-500">{{$review->reviewer->name}}</b>
                </a>
                <p class="text-sm">{{$review->review}}</p>
            </div>

        </div>
        <div>
            <h1 class="bg-green-500 items-center rounded-full px-1 text-white text-xs inline">{{$review->rating}}
                <img class="inline mb-1" src="/images/star-full.svg" width="13" alt="">
                <h1>
        </div>
    </div>

    <hr>
    @endif

    @endforeach

    <div class="mb-2 flex justify-center">
        <p style="list-style: -webkit-linear-gradient();">{{$reviews->links()}}</p>
    </div>
</div>