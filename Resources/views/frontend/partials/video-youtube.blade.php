@php
  $exists = strpos($video, 'youtube');
  if($exists !== false) {
      $query = parse_url($video, PHP_URL_QUERY);
      parse_str($query, $params);
      if(isset($params['v'])){
          $youtubeId = $params['v'];
          $video= 'https://www.youtube.com/embed/'.$youtubeId;
      }
  }
@endphp
<div class="embed-responsive {{$videoResponsive}}">
    <iframe class="embed-responsive-item video" src="{{$video}}"></iframe>
</div>