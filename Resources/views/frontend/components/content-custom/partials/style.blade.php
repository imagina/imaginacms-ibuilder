<style>
    @if($withTitle)
        #{{$id}} .custom-item-title .title {
        @if($titleColorByClass == "text-custom")
  color: {{$titleColor}};
        @endif
  font-size: {{$titleFontSize}}px;
        letter-spacing: {{$titleLetterSpacing}};
    @if(!empty($titleStyle))
        {!!$titleStyle!!}
    @endif


    }

    @if(!empty($titleIconStyle))
            #{{$id}} .custom-item-title .title i {
    {!!$titleIconStyle!!}


    }

    @endif

        @if($withLineTitle == 1)
            #{{$id}} .custom-item-title .title:after {
        content: '';
        display: block;
    @foreach($lineTitleConfig as $key => $line)
        {{$key}}: {{$line}};
    @endforeach


    }

    @endif
    @endif

    @if($withMedia)
        #{{$id}} .custom-item-image .img-style,
    #{{$id}} .custom-item-image .cover-img {
        object-fit: {{$imageObjectFit}};
        object-position: {{$imageObjectPosicion}};
        aspect-ratio: {{$imageAspectRatio == 'aspect-custom' ? $imageAspectRatioCustom : $imageAspectRatio}};
    @if(!empty($imageStyle))
        {!!$imageStyle!!}
    @endif


    }

    @endif

    @if($withBody)
        #{{$id}} .custom-item-body .body {
        @if($bodyColorByClass == "text-custom")
  color: {{$bodyColor}};
        @endif
  font-size: {{$bodyFontSize}}px;
    @if(!empty($bodyStyle))
        {!!$bodyStyle!!}
    @endif


    }

    @endif

    @if($withGallery ?? $withGallery == 1)
        @if($galleryTitleDisplay == 1)
            .title-gallery .title {
        color: {{$galleryTitleColorCustom}};
        font-size: {{$galleryTitleSize}}px;
        margin-top: {{$galleryTitleMarginTop}};
        margin-bottom: {{$galleryTitleMarginBottom}};
    @if(!empty($galleryTitleStyle))
        {!! $galleryTitleStyle !!}
    @endif

    }

    @if($galleryWithLineTitle == 1)
                .title-gallery .title::after {
        content: '';
        display: block;
    @foreach($galleryWithLineTitleConfig as $key => $line)
        {{$key}}: {{$line}};
    @endforeach

    }

    @endif
       @endif

        #{{$id}} .custom-item-gallery .gallery {
        @if(!empty($galleryStyle))
                {!!$galleryStyle!!}
            @endif
            @if($galleryLayout != "gallery-layout-3")
                & img {
            object-fit: {{$galleryObjectFit}};
            object-position: {{$galleryObjectPosicion}};
            aspect-ratio: {{$galleryAspectRatio == 'aspect-custom' ? $galleryAspectRatioCustom : $galleryAspectRatio}};
        }

    @endif


    }

    @if($galleryNav)
            #{{$id}} .custom-item-gallery .gallery .owl-nav {
        & i {
            font-size: {{$galleryNavSize}}px;
            color: {{$galleryNavColor}};

            &:hover {
                color: {{$galleryNavColorHover}};
            }
        }

        & [class*=owl-]:hover {
            background: transparent;
        }

        @if($galleryLayout == "gallery-layout-1")
  margin-top: 0;
        @if($galleryNavPosition == 2)
  text-align: right;
        @endif
        @if($galleryNavPosition == 3)
  text-align: left;
        @endif
        @if($galleryNavPosition == 5)
  position: absolute;
        top: -{{$galleryNavSize + 15}}px;
        left: 0;
        right: 0;
        @endif
        @if($galleryNavPosition == 6)
  position: absolute;
        top: -{{$galleryNavSize + 15}}px;
        @endif
        @if($galleryNavPosition == 7)
  position: absolute;
        top: -{{$galleryNavSize + 15}}px;
        right: 0;
    @endif
@endif


    }

    @if($galleryLayout == "gallery-layout-1" && $galleryNavPosition == 4)
@media (min-width: 768px) {
        #{{$id}} .custom-item-gallery .gallery .owl-nav {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            pointer-events: none;

            & .owl-prev,
            & .owl-next {
                background: none;
                border: none;
                pointer-events: all;
            }

            & .owl-prev {
                position: absolute;
                left: -{{$galleryNavSize + 10}}px;
            }

            & .owl-next {
                position: absolute;
                right: -{{$galleryNavSize + 10}}px;
            }
        }
    }

    @endif

            @if($galleryLayout == "gallery-layout-7")
                #{{$id}} .custom-item-gallery .gallery .arrow i {
        color: {{$galleryNavColor}};

        &:hover {
            color: {{$galleryNavColorHover}};
        }
    }

    @endif
        @endif

        @if($galleryDots)
            @if($galleryDotsStyle == "dots-linear")
                @if(empty($galleryDotsStyleColor)) @php($galleryDotsStyleColor = 'primary') @endif
                @if(empty($galleryDotsSize)) @php($galleryDotsSize = '25') @endif
                #{{$id}} .custom-item-gallery .gallery .owl-dots .owl-dot span {
        width: {{$galleryDotsSize}}px;
        height: 5px;
        margin: 0 5px;
        border-radius: 0;
    }

    #{{$id}} .custom-item-gallery .gallery .owl-dots .owl-dot.active span,
    #{{$id}} .custom-item-gallery .gallery .owl-dots .owl-dot:hover span {
        background: var(--{{$galleryDotsStyleColor}});
    }

    @endif

            @if($galleryDotsStyle == "dots-circular")
                @if(empty($galleryDotsSize)) @php($galleryDotsSize = '10') @endif
                #{{$id}} .custom-item-gallery .gallery .owl-dots .owl-dot span {
        width: {{$galleryDotsSize}}px;
        height: {{$galleryDotsSize}}px;
    }

    #{{$id}} .custom-item-gallery .gallery .owl-dots .owl-dot.active span,
    #{{$id}} .custom-item-gallery .gallery .owl-dots .owl-dot:hover span {
        background: var(--{{$galleryDotsStyleColor}});
    }

    @endif

            @if($galleryDotsStyle == "dots-square")
                @if(empty($galleryDotsSize)) @php($galleryDotsSize = '10') @endif
                #{{$id}} .custom-item-gallery .gallery .owl-dots .owl-dot span {
        width: {{$galleryDotsSize}}px;
        height: {{$galleryDotsSize}}px;
        border-radius: 0;
    }

    #{{$id}} .custom-item-gallery .gallery .owl-dots .owl-dot.active span,
    #{{$id}} .custom-item-gallery .gallery .owl-dots .owl-dot:hover span {
        background: var(--{{$galleryDotsStyleColor}});
    }

    @endif

            @if($galleryDotsStyle == "dots-oval")
                @if(empty($galleryDotsSize)) @php($galleryDotsSize = '13') @endif
                #{{$id}} .custom-item-gallery .gallery .owl-dots .owl-dot span {
        width: {{$galleryDotsSize}}px;
        height: 8px;
        border-radius: 10px;
    }

    #{{$id}} .custom-item-gallery .gallery .owl-dots .owl-dot.active span,
    #{{$id}} .custom-item-gallery .gallery .owl-dots .owl-dot:hover span {
        background: var(--{{$galleryDotsStyleColor}});
    }

    @endif

            @if($galleryDotsStyle == "dots-circular-double" || $galleryDotsStyle == "dots-square-double")
                @if(empty($galleryDotsStyleColor)) @php($galleryDotsStyleColor = 'primary') @endif
                @if(empty($galleryDotsSize)) @php($galleryDotsSize = '13') @endif
                #{{$id}} .custom-item-gallery .gallery .owl-dots .owl-dot span {
        width: {{$galleryDotsSize}}px;
        height: {{$galleryDotsSize}}px;
        margin: 5px;
        border: 2px solid var(--{{$galleryDotsStyleColor}});
        background-color: var(--{{$galleryDotsStyleColor}});
        position: relative;
        background-clip: border-box;
        opacity: 1;
        flex: 0 1 auto;
        @if($galleryDotsStyle == "dots-square-double")
  border-radius: 0;
    @endif


    }

    #{{$id}} .custom-item-gallery .gallery .owl-dots .owl-dot.active span {
        border: 2px solid var(--{{$galleryDotsStyleColor}});
        background-color: transparent;
    }

    #{{$id}} .custom-item-gallery .gallery .owl-dots .owl-dot.active span:after {
        width: {{$galleryDotsSize - 8}}px;
        height: {{$galleryDotsSize - 8}}px;
        background-color: var(--{{$galleryDotsStyleColor}});
        bottom: 2px !important;
        left: 2px !important;
        content: "";
        position: absolute;
        @if($galleryDotsStyle == "dots-circular-double")
  border-radius: 50%;
    @endif


    }

    @endif
        @endif
    @endif

    @if($withShare && !empty($shareStyle))
        #{{$id}} .custom-item-share .share {
    {!!$shareStyle!!}


    }

    @endif

    @if($withVideoExternal && !empty($videoExternalStyle))
        #{{$id}} .custom-item-video-external .video-external {
    {!!$videoExternalStyle!!}


    }

    @endif

    @if(empty($itemListTitle))
        #{{$id}} .custom-page-content .items-list .top-content {
        display: none;
    }

    @endif

    @if($itemListPag && $typeContent != 'page')
          /* paginador */
    @if(!empty($itemListPagStyleGeneral))
            #{{$id}} .post-list-pagination {
    {!!$itemListPagStyleGeneral!!}


    }

    @endif
        #{{$id}} .post-list-pagination .page-link {
        color: {{$itemListPagStyle['color'] ?? 'var(--dark)'}};
        background-color: {{$itemListPagStyle['backgroundInactivo'] ?? 'transparent'}};
        width: {{$itemListPagStyle['width'] ?? '30'}}px;
        height: {{$itemListPagStyle['height'] ?? '30'}}px;
        font-size: {{$itemListPagStyle['size'] ?? '12'}}px;
        line-height: {{$itemListPagStyle['size'] ?? '12'}}px;
        border-radius: {{$itemListPagStyle['radius'] ?? '50%'}}   !important;
        margin: {{$itemListPagStyle['margin'] ?? '0 1px'}};
        padding: 0;
        justify-content: center;
        align-items: center;
        display: inline-flex;
    }

    #{{$id}} .post-list-pagination .page-item.active .page-link {
        background-color: {{$itemListPagStyle['backgroundActivo'] ?? 'var(--primary)'}};
        color: {{$itemListPagStyle['colorActivo'] ?? '#ffffff'}};
    }

    #{{$id}} .post-list-pagination .page-link:hover {
        background-color: {{$itemListPagStyle['backgroundHover'] ?? 'var(--light)'}};
    }

    #{{$id}} .post-list-pagination .page-item.disabled .page-link {
        color: {{$itemListPagStyle['colorHover'] ?? 'var(--light)'}};
        background-color: {{$itemListPagStyle['backgroundInactivo'] ?? 'transparent'}};
    }

    @endif

    @if(!empty($filtersStyle))
        #{{$id}} .filters {
    {!!$filtersStyle!!}


    }
    @endif
</style>