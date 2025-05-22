@php
  $imageZone = $imageZone ?? 'mainimage';

   if ( isset( $item->options->UrlExternalVideoPost ) && !empty( $item->options->UrlExternalVideoPost ) ){
       // Get url from crud field
       $video = $item->options->UrlExternalVideoPost ?? '';
       // Check  if it's YouTube video
       if ( !empty( $video) && strpos($video, 'youtube' ) !== false ){
           $query = parse_url( $video, PHP_URL_QUERY );
           parse_str( $query, $params );
           if ( isset( $params[ 'v' ] ) ){
             $youtubeId = $params[ 'v' ];
             $video= 'https://www.youtube.com/embed/' . $youtubeId;
          }
       }
   }

       $showVideo =  isset($video) && !empty($video);
       $showImage = !is_null($item->mediaFiles()) && !is_null($item->mediaFiles()->$imageZone->id);
@endphp

<div
  class="{{$orderClasses["media"] ?? 'col-12 order-1'}} @if($showVideo)custom-item-video @else custom-item-image @endif">

  {{--  Show Video or Image  prioritizing video --}}
  @if($typeMediaToShow == 0)
    @if($showVideo)
      <div class="iframe {{$imageClass}}">
        <iframe
          src="{{$video}}"
          id="{{$item->slug ?? ''.$item->id}}"
          title="{{$item->slug ?? ''.$item->id}}"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          referrerpolicy="strict-origin-when-cross-origin"
          allowfullscreen
          :controls="$videoControls"
          :autoplay="$videoAutoplay"
          :loop="$videoLoop"
          :muted="$videoMuted"
          width="100%"
          height="100%"
          style="aspect-ratio: 1/1;"
        ></iframe>
      </div>
    @elseif($showImage)
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
    @endif
  @endif

  {{--  Show only Image--}}
  @if($typeMediaToShow == 1 && $showImage)
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
  @endif

  {{--  Show only Video--}}
  @if($typeMediaToShow == 2 && $showVideo)
    <div class="iframe {{$imageClass}}">
      <iframe
        src="{{$video}}"
        id="{{$item->slug ?? ''.$item->id}}"
        title="{{$item->slug ?? ''.$item->id}}"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin"
        allowfullscreen
        :controls="$videoControls"
        :autoplay="$videoAutoplay"
        :loop="$videoLoop"
        :muted="$videoMuted"
        width="100%"
        height="100%"
        style="aspect-ratio: 1/1;"
      ></iframe>
    </div>
  @endif
</div>
