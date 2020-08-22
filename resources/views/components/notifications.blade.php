<div>
    <ul class="mb-8 mt-10">
        @forelse ($user->unreadNotifications as $notification)
        <li class="flex p-4 bg-blue-100 hover:bg-blue-200 rounded-lg mt-2">
            <x-_notification-config :notification='$notification' />
        </li>
        @empty
        <div class="flex justify-center">
            <h1 class="text-2xl text-green-500 font-bold">No New Notification</h1>
        </div>
        @endforelse
    </ul>
    <hr>
    <ul>
        @forelse ($user->readNotifications as $notification)
        <li class="flex p-4 bg-gray-200 hover:bg-gray-300 rounded-lg mt-2">
            <x-_notification-config :notification='$notification' />
        </li>
        @empty

        @endforelse
    </ul>
    @foreach ($user->unreadNotifications as $notification)
    {{$notification->markAsRead()}}
    @endforeach
</div>