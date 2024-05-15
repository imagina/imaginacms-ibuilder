@php
    // ... any logic
@endphp

<div id="{{$id}}" class="container-block test">
    <div class="{{$containerBlock}}">
        <div class="row {{$row}}">
            @foreach($children as $block)
                <div class="{{ $block["gridPosition"] }}">
                    <x-ibuilder::block :blockConfig="$block" container="" row="mx-0 d-block" columns="" />
                </div>
            @endforeach
        </div>
    </div>
</div>
<style>
    #{{$id}} {
        @if(isset($backgroundGeneral) && !empty($backgroundGeneral))
            background: {{$backgroundGeneral}};
        @else
            @if(!empty($backgroundImg) && strpos($backgroundImg, 'default.jpg') == false) background-image: url({{$backgroundImg}}); @endif
            @if(!empty($backgrounds['position'])) background-position: {{$backgrounds['position']}}; @endif
            @if(!empty($backgrounds['size'])) background-size: {{$backgrounds['size']}}; @endif
            @if(!empty($backgrounds['repeat'])) background-repeat: {{$backgrounds['repeat']}}; @endif
            @if(!empty($backgrounds['attachment'])) background-attachment: {{$backgrounds['attachment']}}; @endif
            @if(!empty($backgrounds['color'])) background-color: {{$backgrounds['color']}}; @endif
        @endif
        @if(!empty($styleContainer))
            {!!$styleContainer!!}
        @endif
    }
</style>
@if(!empty($scriptContainer))
@section('scripts')
    @parent
    <script type="text/javascript">
    {!!$scriptContainer!!}
    </script>
@stop
@endif
