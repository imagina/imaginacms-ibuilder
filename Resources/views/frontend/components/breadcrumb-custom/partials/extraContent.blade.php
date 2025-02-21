@foreach($extraContent as $extra)
    @php
        $data = null;

         if(isset($item->options->{$extra})) $data = $item->options->{$extra};
         if(!$data && method_exists($item, 'formatFillableToModel')) $data = $item->getFieldByName($extra);

    @endphp

    {{--  Return extra fields if exist--}}
    @if($data)
        <div class="extra-content {{$extraContentPosition}} {{$extraContentColorClass}} {{$extraContentClass}}">
           {!! $data!!}
        </div>
    @endif
@endforeach
