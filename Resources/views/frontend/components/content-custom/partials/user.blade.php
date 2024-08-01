<div class="{{$orderClasses["user"] ?? 'col-12 order-10'}} item-user">
    <div class="user {{$userColorByClass}} {{$userAlign}} {{$userClass}}">
        {{$item->user->present()->fullname()}}
    </div>
</div>
