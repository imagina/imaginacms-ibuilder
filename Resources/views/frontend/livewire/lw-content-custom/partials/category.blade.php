<div class="{{$orderClasses["category"] ?? 'col-12 order-8'}} item-category">
    <div class="category {{$categoryColorByClass}} {{$categoryAlign}} {{$categoryClass}}">
        @if($typeContent=='ad')
            @foreach($item->categories as $category)
                {{$category->title ?? $category->name ?? ''}}
            @endforeach
        @else
        {{$item->category->title ?? $item->category->name ?? ''}}
        @endif
    </div>
</div>

