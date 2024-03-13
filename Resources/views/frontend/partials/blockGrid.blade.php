@php
  $tag = 'div';
  if(isset($layout) && in_array($layout->type, ['header', 'footer'])) $tag = $layout->type;
@endphp
<!-- Template to render the block GRID -->
<{{ $tag }} class="container-fluid px-0">
  <div class="row no-gutters">
    @foreach($blocks as $block)
      <div class="{{ $block["gridPosition"] }}">
        <x-ibuilder::block :blockConfig="$block"/>
      </div>
    @endforeach
  </div>
</{{ $tag }}>
