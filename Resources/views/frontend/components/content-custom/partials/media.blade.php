@php($imageZone = $imageZone ?? 'mainimage')
@if(!is_null($item->mediaFiles()) && !is_null($item->mediaFiles()->$imageZone->id))
<div class="{{$orderClasses["media"] ?? 'col-12 order-1'}} custom-item-image">
    <div class="image @if($item->mediaFiles()->mainimage->mediaType=='video') {{$imageClass}} @endif">
        <x-media::single-image
                :title="$item->title ?? $item->name ?? ''"
                :isMedia="true"
                width="100%"
                :zone="$imageZone"
                :withVideoControls="$videoControls" :loopVideo="$videoLoop"
                :autoplayVideo="$videoAutoplay" :mutedVideo="$videoMuted"
                :mediaFiles="$item->mediaFiles() ?? null"
                imgClasses="{{$imageClass}} img-style"
        />
    </div>
</div>
@endif