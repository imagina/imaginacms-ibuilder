@if(!is_null($item))
<section id="{{$id}}" class="custom-content">
    <div class="custom-content-row {{$row}}">

        @if($withTitle==1)
            @include('ibuilder::frontend.components.content-custom.partials.title')
        @endif

        @if($withBody)
            <div class="{{$orderClasses["body"] ?? 'order-2'}} custom-item-body">
                <div class="body-content {{$bodyContentInside}}">
                    @if($withTitle==2)
                        @include('ibuilder::frontend.components.content-custom.partials.title')
                    @endif
                    @if($withMedia==2)
                            @include('ibuilder::frontend.components.content-custom.partials.media')
                    @endif
                    @if($withGallery==2)
                            @include('ibuilder::frontend.components.content-custom.partials.gallery')
                    @endif
                    @if($withBodyExtra==2 && !is_null($bodyExtra))
                            @include('ibuilder::frontend.components.content-custom.partials.body-extra')
                    @endif
                    @if($withVideoExternal==2 && !empty($videoExternal))
                            @include('ibuilder::frontend.components.content-custom.partials.video-extra')
                    @endif
                </div>

                <div class="body {{$bodyColorByClass}} {{$bodyAlign}} {{$bodyClass}}">
                  @if($withTitle==4)
                    @include('ibuilder::frontend.components.content-custom.partials.title')
                  @endif
                    {!! $item->body ?? $item->description ?? $item->custom_html ?? '' !!}
                </div>
            </div>
        @endif

        @if($withMedia==1)
            @include('ibuilder::frontend.components.content-custom.partials.media')
        @endif
        @if($withGallery==1)
            @include('ibuilder::frontend.components.content-custom.partials.gallery')
        @endif
        @if($withBodyExtra==1 && !is_null($bodyExtra))
            @include('ibuilder::frontend.components.content-custom.partials.body-extra')
        @endif
        @if($withVideoExternal==1 && !empty($videoExternal))
            @include('ibuilder::frontend.components.content-custom.partials.video-extra')
        @endif

       @if($withShare)
       <div class="{{$orderClasses["share"] ?? 'order-6'}} custom-item-share">
           <div class="share {{$shareClass}}">
               <div class="{{$shareFontClass}}">{{trans('iblog::common.social.share')}}:</div>
               <div class="sharethis-inline-share-buttons"></div>
               <style>
                   #st-1 {
                       z-index: 8;
                   }
               </style>
           </div>
       </div>
       @endif
   </div>
</section>
@include('ibuilder::frontend.components.content-custom.partials.style')
@section("scripts")
    @parent
    <script defer type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=5fd9384eb64d610011fa8357&product=inline-share-buttons"
            async="async"></script>

@stop
@endif