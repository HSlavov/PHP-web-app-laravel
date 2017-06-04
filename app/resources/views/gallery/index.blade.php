@extends('layout')

@section ('content')

    @include('layouts.nav')
    <div class="content-wrapper py-3">
        <div class="container">
            <div class="row">
                <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="gallery-title">Gallery</h1>
                </div>


                    <br/>
                @foreach($gallery as $media)
                    <div class="gallery-title" >
                        <a class="gallery" href="<?php echo asset("app/$media->gallery")?>" data-lightbox="gallery" >
                           <img class="img-responsive" src="<?php echo asset("app/$media->gallery")?>" data-lightbox="gallery" height="365" width="365" border="1px solid #777" alt="One" />
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        </section>

    </div>
 @endsection