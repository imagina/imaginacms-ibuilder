@extends('layouts.master')

@section('content')
    <div class="home page container-fluid">
        <div class="row">
            @foreach($blocks as $block)
                <div class="col-12 {{ $block["gridPosition"] }}">
                    <x-ibuilder::block :blockConfig="$block"/>
                </div>
            @endforeach
        </div>
    </div>
@stop