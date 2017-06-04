@extends('shop.layout')

@section ('content')
    <!-- Page Content -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>User Profile</h1>
            <hr>
            <h2>My Orders</h2>
            @foreach($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($order->cart->items as $item)
                                <li class="list-group-item">
                                    <span class="badge">$ {{ $item['new_price'] }}  </span>
                                    {{ $item['item']['name'] }} | {{ $item['qty'] }} Units
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-body">
                        <i>Ordered on: {{ $order->created_at }}</i>
                    </div>
                    <div class="panel-footer">
                        <strong>Total Price: $ {{ $order->cart->totalPrice }} </strong>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection