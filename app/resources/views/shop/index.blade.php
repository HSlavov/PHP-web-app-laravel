@extends('shop.layout')

@section ('content')
    {{--Slider --}}
    <div class="row carousel-holder">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="slide-image" src="<?php echo asset("app/slide1.png")?>" alt="">
                    </div>
                    <div class="item">
                        <img class="slide-image" src="<?php echo asset("app/slide2.png")?>" alt="">
                    </div>
                    <div class="item">
                        <img class="slide-image" src="<?php echo asset("app/slide3.png")?>" alt="">
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
    {{-- endSlider --}}

    <!-- Page Content -->
    <div class="row">
        @foreach($products as $product)
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    @foreach ($product->productsMedia as $key => $image)
                        @if($key ==0 )
                            @include('layouts.main_image') <br/>
                        @endif
                    @endforeach
                    <div class="caption">
                        <h4 class="pull-right"><strike>${{$product->old_price}}</strike></h4>
                        <h3 class="fa-pull-right"><i class="fa fa-usd" aria-hidden="true">${{$product->new_price}}</i>
                        </h3>
                        <h4><a data-toggle="modal" data-target="#{{$product->id}}">{{$product->name}}</a></h4>
                        <p></p>
                    </div>
                    <a href="{{ route('shop.AddToCart', ['id' => $product->id]) }}" type="button"
                       class="btn btn-primary btn-lg">Add to cart</a>

                </div>
            </div>
            @include('layouts.popup')
        @endforeach
    </div>

    </div>

    </div>

    </div>
    <!-- /.container -->

@endsection