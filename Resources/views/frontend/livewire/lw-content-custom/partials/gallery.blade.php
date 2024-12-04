@if(!empty($item->mediaFiles()->$galleryZone))
@php
    $navText = [ "<i class='$galleryNavIcons[0]'></i>", "<i class='$galleryNavIcons[1]'></i>" ];
@endphp
<div class="{{$orderClasses["gallery"] ?? 'col-12 order-3'}} custom-item-gallery">
    <div class="gallery {{$galleryClass}}">
        <x-media::gallery
                :layout="$galleryLayout"
                :responsive="$galleryResponsive"
                :dots="$galleryDots"
                :nav="$galleryNav"
                :navText="$navText"
                :zones="[$galleryZone]"
                :autoplayVideo="$galleryAutoPlay"
                :dataFancybox="$galleryFancybox"
                :loopVideo="$galleryLoop"
                :mutedVideo="$galleryMuted"
                :controlsVideo="$galleryControls"
                :mediaFiles="$item->mediaFiles()" />
    </div>
</div>
@endif