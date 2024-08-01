@if(isset($item)&&!empty($item))
<section id="breadcrumbSection" class="{{$sectionClass}} @if($breadcrumbPosition==1) d-flex flex-column @endif">
    <div class="breadcrumb-frame @if($breadcrumbPosition==1) order-1 @elseif($breadcrumbPosition==2) d-none @endif">
        <div class="{{$container}} {{$containerClass}}">
            <div class="{{$row}}">
                <div class="{{$col}}">
                    <nav aria-label="breadcrumb">
                        @include('ibuilder::frontend.components.breadcrumb-custom.partials.breadcrumb')
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb-image position-relative overlay-hidden @if($breadcrumbPosition==1) order-0 @endif">
        <div class="breadcrumb-info breadcrumb-overlay">
            <div class="h-100 {{$container}} {{$containerClass}}">
                <div class="h-100 {{$row}}">
                    <div class="{{$col}}">
                        @if($titlePosition==2&&$withTitle)
                            <div class="title-section {{$colorTitleByClass}} {{$titleClass}}">{{$item->title}}</div>
                        @endif
                        @if($breadcrumbPosition==2)
                        <nav aria-label="breadcrumb">
                            @include('ibuilder::frontend.components.breadcrumb-custom.partials.breadcrumb')
                        </nav>
                        @endif
                        @if($titlePosition==1&&$withTitle)
                        <div class="title-section  {{$colorTitleByClass}} {{$titleClass}}">{{$item->title}}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if(($withImage) && isset($item->mediaFiles()->breadcrumbimage) && !empty($item->mediaFiles()->breadcrumbimage))
            @if($overlay) <div class="overlay"></div> @endif
            @if(!is_null($item->mediaFiles()) && !is_null($item->mediaFiles()->breadcrumbimage->id))
            <x-media::single-image
                    :title="$item->title ?? 'breadcrumbimage'"
                    :isMedia="true"
                    :mediaFiles="$item->mediaFiles()"
                    zone="breadcrumbimage"
                    imgClasses="b-image {{$imageClass}}"
            />
            @else
                <div class="b-image {{$imageClass}}"></div>
            @endif
        @endif
    </div>
</section>
<style>
@if(!empty($sectionStyle))
#breadcrumbSection {
{!!$sectionStyle!!}
}
@endif
@if(!empty($icon) || !empty($iconFont))
#breadcrumbSection .breadcrumb-item + .breadcrumb-item::before {
    @if(!empty($iconFont))
    content: "\{{$iconFont}}";
    font-family: "Font Awesome 6 Pro";
    @else
    content: "{!! $icon !!}";
    @endif
}
@endif
#breadcrumbSection .breadcrumb {
    font-size: {{$breadcrumbFontSize}}px;
    line-height: {{$breadcrumbFontSize}}px;
    @if(!empty($breadcrumbStyle))
    {!!$breadcrumbStyle!!}
    @endif
}
#breadcrumbSection .title-section {
    @if($colorTitleByClass=="text-custom")  color: {{$colorTitle}}; @endif
    font-size: {{$fontSizeTitle}}px;
    @if(!empty($titleStyle))
    {!!$titleStyle!!}
    @endif
    z-index: 3;
}
@if($withImage)
#breadcrumbSection .breadcrumb-overlay {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1;
}
@endif
@if(!empty($overlay))
#breadcrumbSection .overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    right: 0;
    background: {{$overlay}};
}
@endif
@if(!empty($breadcrumbColor))
#breadcrumbSection .breadcrumb-item a,
#breadcrumbSection .breadcrumb-item.active,
#breadcrumbSection .breadcrumb-item + .breadcrumb-item::before {
    color: {{$breadcrumbColor}};
}
@endif
#breadcrumbSection .b-image {
    object-fit: {{$imageObjectFit}};
    object-position: {{$imageObjectPosicion}};
    aspect-ratio: {{$imageAspectRatio}};
    @if(!empty($imageStyle))
    {!!$imageStyle!!}
    @endif
}
@if(!is_null($imageAspectRatioMobile))
@media (max-width: 767.98px) {
    #breadcrumbSection .b-image {
        aspect-ratio: {{$imageAspectRatioMobile}};
    }
}
@endif
</style>
@endif