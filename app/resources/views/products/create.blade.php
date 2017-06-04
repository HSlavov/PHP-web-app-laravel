@extends('layout')

@section ('content')

    @include('layouts.nav')
    <div class="content-wrapper py-3">

        <div class="card-header">
            <H4>Create product : </H4>
        </div>
        <!-- /.row -->
        <div class="card-block">
            <div class="col-lg-6">
                <form action="/product" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}



                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" id="name" name="name"  required >
                    </div>
                    <div class="form-group">
                        <label>SKU</label>
                        <input class="form-control" id="sku" name="sku" required >
                    </div>
                    <div class="form-group">
                        <label for="featured_img">Upload Featured Image:</label>
                        <input type="file" name="photos[]" id="image" multiple required>
                    </div>
                    <div class="form-group">
                        <label>Old Price</label>
                        <input class="form-control" id="old_price" name="old_price" required >
                    </div>
                    <div class="form-group">
                        <label>Promo Price</label>
                        <input class="form-control" id="new_price" name="new_price" required >
                    </div>
                    <button type="submit" value="Submit" class="btn btn-lg btn-success">Create</button>
                    <button type="reset" class="btn btn-lg btn-danger">Reset Button</button>
                </form>
            </div>
        </div>

    </div>
@endsection