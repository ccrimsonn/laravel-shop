@extends('layouts.master')

@section('content')
    <div class="row ">
        <div class="col-sm-6 offset-sm-3">
            <div class="card">
                <div class="card-header">
                    <h1>User Profile</h1>
                </div>
                @foreach($orders as $order)
                    <div class="card-body">
                        <ul class="list-group">
                            <h5 class="card-title">Order ID: {{ $order->paymentId }}</h5>
                            {{--{{ dd($order) }}--}}
                            @foreach($order->cart->items as $item)
                                <li class="list-group-item">
                                    <span class="badge badge-info float-right">$ {{ $item['price'] }}</span>
                                    {{ $item['item']['title'] }} | {{ $item['qty'] }} Units
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer text-muted">
                        <strong>Total Price: $ {{ $order->cart->totalPrice }}</strong>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection