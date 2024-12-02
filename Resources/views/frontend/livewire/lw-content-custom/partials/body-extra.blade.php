<div class="{{$orderClasses["bodyExtra"] ?? 'col-12 order-4'}} custom-item-body-extra">
    <div class="body-extra {{$bodyExtraColorByClass}} {{$bodyExtraAlign}} {{$bodyExtraClass}}">
        @foreach($bodyExtra as $extra)
            <div class="body-extra-mini {{$bodyExtraMiniClass}}">
                {!! $item->options->{$extra} ?? '' !!}
            </div>
        @endforeach
    </div>
</div>