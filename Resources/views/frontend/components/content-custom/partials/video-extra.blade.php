<div class="{{$orderClasses["videoExternal"] ?? 'col-12 order-5'}} custom-item-video-external">
  <div class="video-external {{$videoExternalClass}}">
    @foreach($videoExternal as $external)
      @php
        $video = $item->options->{$external} ?? false;
        $isInstagram = false;

        // Youtube
        $exists = strpos($video, 'youtube');
        if($exists !== false) {
            $query = parse_url($video, PHP_URL_QUERY);
            parse_str($query, $params);
            if(isset($params['v'])){
                $youtubeId = $params['v'];
                $video = 'https://www.youtube.com/embed/'.$youtubeId;
            }
        }
        // Instagram
        if (stripos($video, 'instagram.com') !== false) {
            $isInstagram = true;
        }
      @endphp
      @if(isset($video) && !empty($video))
        <div class="video-external-mini {{$videoExternalMiniClass}}">

          @if ($isInstagram)
            <div style="max-width:350px;margin:auto">
              <blockquote class="instagram-media"
                          data-instgrm-permalink="{{ $video }}"
                          data-instgrm-version="14"></blockquote>
            </div>
            @once
              <script async src="https://www.instagram.com/embed.js"></script>
            @endonce
          @else

            @if($videoExternalResponsive!=='none')
              <div class="embed-responsive {{$videoExternalResponsive}}">
                <iframe class="embed-responsive-item" src="{{$video}}"></iframe>
              </div>
            @else
              <iframe allowfullscreen width="{{$videoExternalWidth}}" height="{{$videoExternalHeight}}"
                      src="{{$video}}"></iframe>
            @endif

          @endif

        </div>
      @endif
    @endforeach
  </div>
</div>
