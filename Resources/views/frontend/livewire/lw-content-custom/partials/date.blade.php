<div class="{{$orderClasses["date"] ?? 'col-12 order-9'}} item-date">
    <div class="date {{$dateColorByClass}} {{$dateAlign}} {{$dateClass}}">
        {{ $item->created_at->format($formatCreatedDate) }}
    </div>
</div>