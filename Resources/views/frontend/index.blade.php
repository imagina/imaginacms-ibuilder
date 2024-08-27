@extends($useLayout ?? 'isite::frontend.layouts.blank')

@section('meta')
  @if(isset($viewParams['IbuilderLayoutMetaTags']))
    @include($viewParams['IbuilderLayoutMetaTags'], $viewParams)
  @endif
@endsection

@section('content')
  @include('ibuilder::frontend.partials.blockGrid')
@stop

@section("scripts")
  @parent
  <script>
    // Get the value of the APP_DEBUG environment variable
    const isDebugMode = {{ env('APP_DEBUG') ? 'true' : 'false' }};
    // Set the offset height based on the debug mode
    const offsetHeightValue = isDebugMode ? 80 : 0;

    // Create a ResizeObserver instance
    const observer = new ResizeObserver(() => {
      // Send a postMessage with the height details
      window.parent.postMessage({
        offsetHeight: document.body.offsetHeight,
        clientHeight: document.body.clientHeight + offsetHeightValue,
        scrollHeight: document.body.scrollHeight,
        elementId: "iframeLayout{{$layout->id}}"
      }, '*');
    });

    // Specify the target element to observe (in this case, the entire document)
    const targetElement = document.documentElement;

    // Start observing the target element
    observer.observe(targetElement);
  </script>
@endsection
