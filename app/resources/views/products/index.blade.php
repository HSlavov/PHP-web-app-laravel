@extends('layout')

@section ('content')

@include('layouts.nav')
<div class="content-wrapper py-3">
    <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Web App</a></li>
            <li class="breadcrumb-item active">Products</li>
        </ol>
        <!-- Tables Card -->

        <div class="card-header">
            <i class="fa fa-table"></i> Products
        </div>
        <div class="card-block">

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Logo</th>
                        <th>Price</th>
                        <th>Promo Price</th>
                        <th>Date Add</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Logo</th>
                        <th>Price</th>
                        <th>Promo Price</th>
                        <th>Date Add</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>

                    <tbody>

                    @foreach($products as $product)
                        <form method="POST" action=" ">
                            <tr>
                                <td>{{$product->id }}</td>
                                <td>{{$product->name }}</td>
                                <td>{{$product->sku}}</td>
                                <td>
                                    @foreach ($product->productsMedia as $key => $image)
                                            @if($key ==0 )
                                               @include('layouts.main_image') <br/>
                                            @endif
                                    @endforeach
                                </td>
                                <td><strike>{{$product->old_price}}</strike></td>
                                <td>{{$product->new_price}}</td>
                                <td>{{$product->created_at}}</td>
                                <td>
                                    <a style="width:80px" class="btn btn-lg btn-success" href="/product/{{$product->id}}/edit" > Update</a>
                                    <a style="width:80px" type="submit" class="btn btn-lg btn-danger" href="/product/{{$product->id}}" >Delete</a>
                                    <a style="width:80px" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#{{$product->id}}">View</a>

                                </td>
                            </tr>
                        </form>
                        @include('layouts.popup')
                    @endforeach
                    </tbody>
                </table>
        </div>
            <div class="row">
                <div class="col-lg-4">
                    <a class="btn btn-lg btn-warning" href="/product/create">Add Product</a></div>
            </div>
    </div>
    <!-- /.container-fluid -->
</div>


@endsection