<ol class="breadcrumb {{$breadcrumbClass}}">
  <li class="breadcrumb-item">
    <a href="{{ \LaravelLocalization::localizeUrl('/') }}">{{trans('isite::common.menu.home')}}</a>
  </li>
  @if($breadcrumbOnlyMainCategory == 1)
    @isset($item->category)
      <li class="breadcrumb-item">
        <a href="{{$item->category->url}}">{{ $item->category->title }}</a>
      </li>
    @endisset
  @else
    @isset($item->categories)
      @foreach($item->categories as $key => $breadcrumb)
        <li class="breadcrumb-item">
          <a href="{{$breadcrumb->url}}">{{ $breadcrumb->title }}</a>
        </li>
      @endforeach
    @endisset
  @endif
  <li class="breadcrumb-item active" aria-current="item">{{$item->title}}</li>
</ol>