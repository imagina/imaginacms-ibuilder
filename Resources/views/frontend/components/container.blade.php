@php
  // ... any logic
@endphp

<div class="container-block">
  <div class="row no-gutters">
    @foreach($children as $block)
      <div class="col-12 {{ $block["gridPosition"] }}">
        <x-ibuilder::block :blockConfig="$block"/>
      </div>
    @endforeach
  </div>
</div>
