<!-- Template to render the block GRID -->
<div class="container-fluid px-0">
  <div class="row no-gutters">
    @foreach($blocks as $block)
      <div class="{{ $block["gridPosition"] }}">
        <x-ibuilder::block :blockConfig="$block"/>
      </div>
    @endforeach
  </div>
</div>
