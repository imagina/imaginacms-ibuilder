@foreach($extraContent as $extra)
  @php
    $data = $item->{$extra}
      ?? $item->options->{$extra}
      ?? (method_exists($item, 'formatFillableToModel')
         ? $item->getFieldByName($extra) : null);
  @endphp

    {{--  Return extra fields if exist--}}
    @if($data)
        <div class="extra-content {{$extraContentPosition}} {{$extraContentColorClass}} {{$extraContentClass}}">
           {!! $data!!}
        </div>
    @endif
@endforeach
