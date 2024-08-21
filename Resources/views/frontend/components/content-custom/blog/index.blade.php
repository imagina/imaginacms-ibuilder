@if(!is_null($item))
    <section id="{{$id}}" class="custom-content">
        <div class="custom-content-row {{$row}}">

            <div class="custom-page-sidebar {{$orderSidebar["sidebar"]}}">
                @if($withFilterCategory)
                    <livewire:isite::filters :filters="['categories' => $filters]"/>
                @endif

                @if($withListLateral)
                    <div class="list-lateral">
                        <h4 class="{{$itemListLateralTitleClass}}">{{trans($itemListLateralTitle)}}</h4>
                        <livewire:isite::items-list
                                moduleName="Iblog"
                                itemComponentName="isite::item-list"
                                itemComponentNamespace="Modules\Isite\View\Components\ItemList"
                                :configLayoutIndex="['default' => 'one', 'options' => [ 'one' => [
                                                                        'name' => 'one',
                                                                        'class' => $itemListLateralCol,
                                                                        'icon' => 'fa fa-align-justify',
                                                                        'status' => true], ], ]"
                                :itemComponentAttributes="$itemListLateralAttr"
                                :entityName="$itemListLateralType"
                                :showTitle="false"
                                :pagination="['show'=>false]"
                                :params="['take'=> $itemListLateralTake,'filter' => $filterBlog]"
                                :responsiveTopContent="['mobile'=>false,'desktop'=>false]"
                        />
                    </div>
                @endif
            </div>
            <div class="custom-page-content {{$orderSidebar["content"]}}">
                <div class="custom-page-content-row {{$orderSidebar["content-row"]}}">

                    @if($withTitle==1)
                        @include('ibuilder::frontend.components.content-custom.partials.title')
                    @endif

                    @if($withListMain && $typeContent=='category')
                        <div class="{{$orderClasses["list"] ?? 'col-12 order-0'}} custom-list">
                        <livewire:isite::items-list
                                moduleName="Iblog"
                                itemComponentName="isite::item-list"
                                itemComponentNamespace="Modules\Isite\View\Components\ItemList"
                                :configLayoutIndex="['default' => 'one', 'options' => [
                                                            'one' => [
                                                                'name' => 'one',
                                                                'class' => $itemListCol,
                                                                'icon' => 'fa fa-align-justify',
                                                                'status' => true], ], ]"
                                :itemComponentAttributes="$itemListAttr"
                                :entityName="$itemListType"
                                :title="$itemListTitle"
                                :pagination="[ 'show' => $itemListPag, 'type' => $itemListPagType]"
                                :showTitle="!empty($itemListTitle) ? true : false"
                                :params="['filter' => [$itemListFilter => $item->id ?? null],'take'=> $itemListTake]"
                                :responsiveTopContent="['mobile'=>false,'desktop'=>false]"
                        />
                        </div>
                    @endif

                    @if($typeContent=='post')
                        @if($withSummary==1)
                            @include('ibuilder::frontend.components.content-custom.partials.summary')
                        @endif
                        @if($withDate==1)
                            @include('ibuilder::frontend.components.content-custom.partials.date')
                        @endif
                        @if($withUser==1)
                            @include('ibuilder::frontend.components.content-custom.partials.user')
                        @endif
                    @endif

                    @if($withBody)
                        <div class="{{$orderClasses["body"] ?? 'order-2'}} custom-item-body">
                            <div class="body-content {{$bodyContentInside}}">
                                @if($withTitle==2)
                                    @include('ibuilder::frontend.components.content-custom.partials.title')
                                @endif
                                @if($typeContent=='post')
                                    @if($withSummary==2)
                                        @include('ibuilder::frontend.components.content-custom.partials.summary')
                                    @endif
                                    @if($withDate==2)
                                        @include('ibuilder::frontend.components.content-custom.partials.date')
                                    @endif
                                    @if($withUser==2)
                                        @include('ibuilder::frontend.components.content-custom.partials.user')
                                    @endif
                                @endif
                                @if($withMedia==2)
                                    @include('ibuilder::frontend.components.content-custom.partials.media')
                                @endif
                                @if($withGallery==2)
                                    @include('ibuilder::frontend.components.content-custom.partials.gallery')
                                @endif
                                @if($withBodyExtra==2 && !is_null($bodyExtra))
                                    @include('ibuilder::frontend.components.content-custom.partials.body-extra')
                                @endif
                                @if($withVideoExternal==2 && !empty($videoExternal))
                                    @include('ibuilder::frontend.components.content-custom.partials.video-extra')
                                @endif
                            </div>

                            <div class="body {{$bodyColorByClass}} {{$bodyAlign}} {{$bodyClass}}">
                              @if($withTitle==4)
                                @include('ibuilder::frontend.components.content-custom.partials.title')
                              @endif
                                {!! $item->body ?? $item->description ?? $item->custom_html ?? '' !!}
                            </div>
                        </div>
                    @endif

                    @if($withMedia==1)
                        @include('ibuilder::frontend.components.content-custom.partials.media')
                    @endif
                    @if($withGallery==1)
                        @include('ibuilder::frontend.components.content-custom.partials.gallery')
                    @endif
                    @if($withBodyExtra==1 && !is_null($bodyExtra))
                        @include('ibuilder::frontend.components.content-custom.partials.body-extra')
                    @endif
                    @if($withVideoExternal==1 && !empty($videoExternal))
                        @include('ibuilder::frontend.components.content-custom.partials.video-extra')
                    @endif

                    @if($withShare)
                        <div class="{{$orderClasses["share"] ?? 'order-6'}} custom-item-share">
                            <div class="share {{$shareClass}}">
                                <div class="{{$shareFontClass}}">{{trans('iblog::common.social.share')}}:</div>
                                <div class="sharethis-inline-share-buttons"></div>
                                <style>
                                    #st-1 {
                                        z-index: 8;
                                    }
                                </style>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="custom-page-extra {{$orderSidebar["extra"] ?? 'col-12 pb-5'}}">
                @if($withCarousel)
                    <x-isite::carousel.owl-carousel
                            id="{{$id}}Articles"
                            title="{{trans($carouselTitle)}}"
                            :owlTitleClasses="$carouselAttr['titleClasses'] ?? ''"
                            :dotsStyle="$carouselAttr['dotsStyle'] ?? ''"
                            :dotsStyleColor="$carouselAttr['dotsStyleColor'] ?? ''"
                            :dotsSize="$carouselAttr['dotsSize'] ?? ''"
                            :center="$carouselAttr['center'] ?? false"
                            :stagePadding="$carouselAttr['stagePadding'] ?? 0"
                            repository="Modules\Iblog\Repositories\PostRepository"
                            :params="['take' => $carouselAttr['take'] ?? 20,'filter' => $filterBlog]"
                            :margin="$carouselAttr['margin'] ?? 25"
                            :loops="$carouselAttr['loops'] ?? false"
                            :dots="$carouselAttr['dots'] ?? false"
                            :mediaImage="$carouselAttr['mediaImage'] ?? mainimage"
                            :autoplay="$carouselAttr['autoplay'] ?? false"
                            :responsive="$carouselAttr['responsive']"
                            :itemComponentAttributes="$carouselItems"
                    />
                @endif
            </div>
        </div>
    </section>
    @include('ibuilder::frontend.components.content-custom.partials.style')
@section("scripts")
    @parent
    <script defer type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=5fd9384eb64d610011fa8357&product=inline-share-buttons"
            async="async"></script>

@stop
@endif