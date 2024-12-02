@if(!empty($item->mediaFiles()->gallery))
    @php
        $navText = [ "<i class='$galleryNavIcons[0]'></i>", "<i class='$galleryNavIcons[1]'></i>" ];
    @endphp
    <div class="{{$orderClasses["gallery"] ?? 'col-12 order-3'}} custom-item-gallery">
        @if($galleryTitleDisplay === "1")
            <div class="title-gallery col-md-12">
                <div class="{{$galleryTitleColorByClass}} {{$galleryTitlePosition}}">
                    <h2 class="title {{$galleryTitleClass}}">{{$galleryTitle}}</h2>
                </div>
            </div>
        @endif
        <div class="gallery {{$galleryClass}}">
            <x-media::gallery
                    :layout="$galleryLayout"
                    :responsive="$galleryResponsive"
                    :dots="$galleryDots"
                    :nav="$galleryNav"
                    :navText="$navText"
                    :mediaFiles="$item->mediaFiles()"
                    :margin="$galleryMarginItems"
            />
        </div>
    </div>
@endif