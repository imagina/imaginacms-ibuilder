@if(!empty($item->mediaFiles()->gallery))
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
                :mediaFiles="$item->mediaFiles()" />
    </div>
</div>
@endif