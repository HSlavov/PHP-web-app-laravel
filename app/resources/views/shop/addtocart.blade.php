@extends('shop.layout')

@section ('content')
    <!-- Page Content -->
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-1 col-sm-offset-1">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="badge">{{ $product['qty'] }}</span>
                            <strong>{{ $product['item']['name'] }}</strong>
                            <span class="label label-success">${{ $product['new_price'] }}</span>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('shop.reduceByOne', ['id'=> $product['item']['id']]) }}"> Reduce 1</a></li>
                                    <li><a href="{{ route('shop.remove', ['id'=> $product['item']['id']]) }}"> Reduce All</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h3><strong><u>Total: ${{ $totalPrice }}</u></strong></h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No items in Cart</h2>
                <hr>
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            </div>
        </div>
    @endif
@endsection