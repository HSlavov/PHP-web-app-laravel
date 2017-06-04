@extends('layout')

@section ('content')

    @include('layouts.nav')
    <div class="content-wrapper py-3">
        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Web App</a></li>
                <li class="breadcrumb-item active">Orders</li>
            </ol>
            <!-- Tables Card -->

            <div class="card-header">
                <i class="fa fa-table"></i> Users
            </div>
            <div class="card-block">

                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Purchage date</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Item</th>
                            <th>Total price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Purchase date</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Item</th>
                            <th>Total price</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        @foreach($orders as $order)
                            <form method="POST" action=" ">
                                <tr>
                                    <td>{{$order->id }}</td>
                                    <td>{{$order->created_at }}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->address}}</td>

                                    <td>
                                        @foreach($order->cart->items as $item)
                                            <li class="list-group-item">
                                                <span class="badge">$ {{ $item['new_price'] }}  </span>
                                                {{ $item['item']['name'] }} | {{ $item['qty'] }} Units
                                            </li> <br/>
                                        @endforeach

                                    </td>


                                    <td> $ {{ $order->cart->totalPrice }}  </td>
                                    <td>
                                        <a type="submit" class="btn btn-lg btn-danger" href="#" >Delete</a>
                                    </td>

                                </tr>
                            </form>

                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>
@endsection