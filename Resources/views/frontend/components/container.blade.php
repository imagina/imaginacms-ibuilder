@php
  // ... any logic
@endphp

<div class="container-block test">
  <div class="row">
    @foreach($children as $block)
      <div class="{{ $block["gridPosition"] }}">
        <x-ibuilder::block :blockConfig="$block"/>
      </div>
    @endforeach
  </div>
</div>
