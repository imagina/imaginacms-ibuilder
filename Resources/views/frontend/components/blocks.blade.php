@php
    $componentName = $componentConfig["systemName"];
    $nameSpace = $componentConfig["nameSpace"];
    $attributes = $componentConfig["attributes"];
    if($componentName=='ibuilder::block-custom')  {
       $attributes['image'] = $blockConfig->mediaFiles->custommainimage ?? null;
       $attributes['gallery'] = $blockConfig->mediaFiles->customgallery ?? null;
    }
    if(!empty($blockConfig->mediaFiles->blockbgimage)) {
        if(!empty($blockConfig->mediaFiles->blockbgimage->extraLargeThumb))  {
            $blockImage = $blockConfig->mediaFiles->blockbgimage->extraLargeThumb;
        } else {
            $blockImage = $blockConfig->mediaFiles->blockbgimage->path;
        }
    }
    $block = $blockConfig->attributes->mainblock;
@endphp
<section id="block{{$block->id ?? $id}}"
         class="{{$block->blockClasses ?? $blockClasses}}"
         @if(!empty($block->animateBlockName)) data-aos="{{$block->animateBlockName}}" @endif
         @if(!empty($block->animateBlockDelay)) data-aos-delay="{{$block->animateBlockDelay}}" @endif
         @if(!empty($block->animateBlockDuration)) data-aos-duration="{{$block->animateBlockDuration}}" @endif
         @if(!empty($block->animateBlockOffset)) data-aos-offset="{{$block->animateBlockOffset}}" @endif
         @if(!empty($block->animateBlockEasing)) data-aos-easing="{{$block->animateBlockEasing}}" @endif
         @if(!empty($block->animateBlockOnce)) data-aos-once="{{$block->animateBlockOnce}}" @endif
         @if(!empty($block->animateBlockMirror)) data-aos-mirror="{{$block->animateBlockMirror}}" @endif
>

  @if($editLink)
    <x-isite::edit-link
      link="{{$editLink}}"
      tooltip="{{$tooltipEditLink}}"
      icon="fas fa-palette"
      bottom="0"
      left="20px !important"
      top="unset !important"
      right="unset !important"
      bgColor="#c700db"
    />
  @endif

  @if($block->overlay ?? $overlay)
    <!--Overlay-->
    <div id="overlay{{$block->id ?? $id}}"></div>
  @endif
  <div id="container{{$block->id ?? $id}}"
       class="{{$block->container ?? $container}}">
    <div class="row {{$block->row ?? $row}}">
      <div class="{{$block->columns ?? $columns}} ">

        <!--Dynamic Component-->
        <div id="component{{$block->id ?? $id}}">
          <!--blade Component-->
          @if($componentType == "blade")
            @if(!empty($nameSpace))
                <?php
                $hash = sha1($nameSpace);
                if (isset($component)) {
                  $__componentOriginal{$hash} = $component;
                }
                $component = $__env->getContainer()->make($nameSpace, $attributes ?? []);
                $component->withName($componentName);
                if ($component->shouldRender()):
                  $__env->startComponent($component->resolveView(), $component->data());
                  if (isset($__componentOriginal{$hash})):
                    $component = $__componentOriginal{$hash};
                    unset($__componentOriginal{$hash});
                  endif;
                  echo $__env->renderComponent();
                endif;
                ?>
            @endif
          @endif
          <!--Livewire Component-->
          @if($componentType == "livewire")
            @livewire($componentName, $attributes)
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
<style>

    #block{{$block->id ?? $id}}  {
        @if(!empty($block->position)) position: {{$block->position}}; @endif
        @if(!empty($block->top)) top: {{$block->top}}; @endif
        @if(!empty($block->left)) left: {{$block->left}}; @endif
        @if(!empty($block->right)) right: {{$block->right}}; @endif
        @if(!empty($block->bottom)) bottom: {{$block->bottom}}; @endif
        @if(!empty($block->zIndex)) z-index: {{$block->zIndex}}; @endif
        @if(!empty($block->width)) width: {{$block->width}}; @endif
        @if(!empty($block->height)) height: {{$block->height}}; @endif

        @if($block->backgroundColor)
        background: {{$block->backgroundColor}};
        @elseif(isset($block->backgrounds))
        background-image: url({{$blockImage ?? ''}});
        background-position: {{$block->backgrounds->position}};
        background-size: {{$block->backgrounds->size}};
        background-repeat: {{$block->backgrounds->repeat}};
        background-attachment: {{$block->backgrounds->attachment}};
        background-color: {{$block->backgrounds->color}};
        @endif
    }
    @if($block->blockStyle)
          {!!$block->blockStyle!!}
    @endif

    @if(!empty($block->overlay))
    #overlay{{$block->id ?? $id}} {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0%;
        right: 0%;
        background: {{$block->overlay}};
    }
    @endif

    @if(!empty($block->blockStyleResponsive) && count($block->blockStyleResponsive)>0)
    @foreach($block->blockStyleResponsive as $items)
    @media ({{$items->media}}: {{$items->value}}) {
    @foreach($items->class as $class)
    #block{{$block->id ?? $id}} {{$class->name}} {
        @foreach($class->attributes as $key => $value)
          {{$key}}: {{$value}};
        @endforeach
    }
    @endforeach
    }
    @endforeach
    @endif
</style>
