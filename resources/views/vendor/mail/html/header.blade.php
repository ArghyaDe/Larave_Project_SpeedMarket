<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
<div class="flex bg-white rounded-lg p-1 items-center">
    <img src="{{$url .'/images/icon.png'}}" width="40" alt="{{ $slot }}">
    <h1 class="text-blue-400 m-1">SpeedMarket</h1>
</div>
@endif
</a>
</td>
</tr>
