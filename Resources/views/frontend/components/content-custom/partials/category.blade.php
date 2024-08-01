<div class="{{$orderClasses["category"] ?? 'col-12 order-8'}} item-category">
    <div class="category {{$categoryColorByClass}} {{$categoryAlign}} {{$categoryClass}}">
        {{$item->category->title ?? $item->category->name}}
    </div>
</div>
