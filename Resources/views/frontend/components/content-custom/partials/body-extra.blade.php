<div class="{{$orderClasses["bodyExtra"] ?? 'col-12 order-4'}} custom-item-body-extra">
  <div class="body-extra {{$bodyExtraColorByClass}} {{$bodyExtraAlign}} {{$bodyExtraClass}}">
    @foreach($bodyExtra as $extra)
      @php
          $extraBodyData = null;
          if(isset($item->options->{$extra})) $extraBodyData = $item->options->{$extra};
          if(!$extraBodyData && method_exists($item, 'formatFillableToModel')) $extraBodyData = $item->getFieldByName($extra);
      @endphp
      <div class="body-extra-mini {{$bodyExtraMiniClass}}">
        {!! $extraBodyData ?? '' !!}
      </div>
    @endforeach
    </div>
</div>