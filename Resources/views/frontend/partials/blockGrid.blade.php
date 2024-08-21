@php
  $tag = 'div';
  $viewParams = $viewParams ?? [];
  if(isset($layout) && in_array($layout->type, ['header', 'footer'])) $tag = $layout->type;
@endphp
<!-- Template to render the block GRID -->
<{{ $tag }} class="container-fluid px-0">
  <div class="row g-0">
    @foreach($blocks as $block)
      <div class="{{ $block["gridPosition"] }}">
        <!-- Block Title (Demo)-->
        @if(isset($isDemoLayout) && $isDemoLayout)
          <div class="mt-5 pt-3 mb-3 text-center">
            <div class="d-inline-block bg-white p-3 rounded shadow">
              ......::::::
              <i class="fa-light fa-puzzle-piece text-primary mr-2" style="font-size: 25px"></i>
              <span class="h4">{{$block['internalTitle']}}</span>
              <i class="fa-light fa-puzzle-piece text-primary ml-2" style="font-size: 25px"></i>
              ::::::......
            </div>
          </div>
        @endIf

        <!-- Block -->
        <x-ibuilder::block :blockConfig="$block" :viewParams="$viewParams"/>
      </div>
    @endforeach
  </div>
</{{ $tag }}>
