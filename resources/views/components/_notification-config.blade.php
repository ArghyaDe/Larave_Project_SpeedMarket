@if ($notification->type=='App\Notifications\PaymentReceived')
<p class="flex">Payment of <b class="ml-1 mr-1">Rs. {{$notification->data['price']}}</b> has been received by
    "<b>{{$notification->data['supplier']}}</b>".</p>
@endif

@if ($notification->type=='App\Notifications\ProductCreated')
<p class="flex">New product "<b>{{$notification->data['product_name']}}</b>" has been created
    on "<b>{{$notification->data['product_created_at']}}</b>".</p>
@endif

@if ($notification->type=='App\Notifications\ProductEdited')
<p class="flex">Product "<b>{{$notification->data['product_name']}}</b>" has been updated.</p>
@endif

@if ($notification->type=='App\Notifications\ProductDeleted')
<p class="flex">Product "<b>{{$notification->data['product_name']}}</b>" has been deleted.</p>
@endif

@if ($notification->type=='App\Notifications\SupplyCreated')
<p class="flex">Product "<b>{{$notification->data['product_name']}}</b>" manufactured by "
    <b>{{$notification->data['manufacturer']}}</b>" has been added to your supply.</p>
@endif

@if ($notification->type=='App\Notifications\SupplyDeleted')
<p class="flex">Product "<b>{{$notification->data['product_name']}}</b>" manufactured by "
    <b>{{$notification->data['manufacturer']}}</b>" has been removed from your supply.</p>
@endif

@if ($notification->type=='App\Notifications\AddToCart')
<p class="flex">Product "<b>{{$notification->data['product_name']}}</b>" selled by "
    <b>{{$notification->data['seller']}}</b>" has been added to your cart.</p>
@endif

@if ($notification->type=='App\Notifications\RemoveFromCart')
<p class="flex">Product "<b>{{$notification->data['product_name']}}</b>" selled by "
    <b>{{$notification->data['seller']}}</b>" has been removed from your cart.</p>
@endif

@if ($notification->type=='App\Notifications\ProfileUpdated')
<p class="flex text-green-500">Your Profile has been updated.</p>
@endif
