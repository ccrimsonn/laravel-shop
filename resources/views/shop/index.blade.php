@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @foreach($products->chunk(4) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
                <div class="col-12 col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ $product->imagePatch}}" alt="Card image cap"/>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title}}</h5>
                            <p class="card-text description">{{ $product->description}}</p>
                            <div class="float-left price">
                                $ {{ $product->price}}
                            </div>
                            <a href="{{ route('addToCart', ['id' => $product->id]) }}" class="btn btn-success float-right">Add to Cart</a>
                        </div>
                    </div>
                    <div class="clearfix" style="margin-bottom: 10px;"></div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
