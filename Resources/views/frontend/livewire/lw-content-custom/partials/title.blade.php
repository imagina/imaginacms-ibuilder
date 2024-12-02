<div class="{{$orderClasses["title"] ?? 'col-12 order-0'}} custom-item-title">
    <h2 class="title {{$titleColorByClass}} {{$titleAlign}} {{$titleClass}}">
        @if($titleIconPosition == 1 || $titleIconPosition == 3) <i class="{{$titleIcon}} {{$titleIconPosition==3 ? 'd-block': ''}}"></i>  @endif
        <span> {{ $item->title ?? $item->name ?? '' }}</span>
        @if($titleIconPosition == 2 || $titleIconPosition == 4) <i class="{{$titleIcon}} {{$titleIconPosition==4 ? 'd-block': ''}}"></i>  @endif
    </h2>
</div>