@extends('layout')

@section ('content')

    @include('layouts.nav')
    <div class="content-wrapper py-3">

        <div class="card-header">
           <H4>Edit product: [{{ $product->id }}]{{ $product->name }}  </H4>
        </div>
            <!-- /.row -->
        <div class="card-block">
            <div class="col-lg-6">
            <form role="form" method="POST" action="/product/{{$product->id}}/">
                {{ csrf_field() }}
                {{method_field('PUT')}}

                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" id="name" name="name" value="{{ $product->name}}">
                </div>
                <div class="form-group">
                    <label>SKU</label>
                    <input class="form-control" id="sku" name="sku" value="{{ $product->sku }}">
                </div>
                <div class="form-group">
                    <label>Images:</label>
                    <div class="image-set">
                        <div class="table-responsive">
                            <table method="POST"    class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                                @foreach($product->productsMedia as $image)
                                    <tr>
                                        <td>
                                            <a class="gallery-item" name="{{$image->id}}" href="<?php echo asset("app/$image->gallery")?>" data-lightbox="{{$product->id}}" >
                                                <img class="img-responsive"  src="<?php echo asset("app/$image->gallery")?>" data-lightbox="{{$product->id}}" height="150" width="150" alt="One" />
                                            </a>
                                            <input type="hidden" name="id" value="{{$image->id}}">
                                            <button type="submit" name="delete_image" value="{{$image->gallery}}" id="{{$image->id}}" class="btn btn-danger"  >Delete Image</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="featured_img">Upload Featured Image:</label>
                    <input type="file" name="photos[]" id="image" multiple  >
                </div>
                <div class="form-group">
                    <label>Old Price</label>
                    <input class="form-control" id="old_price" name="old_price" value="{{ $product->old_price }}">
                </div>
                <div class="form-group">
                    <label>Promo Price</label>
                    <input class="form-control" id="new_price" name="new_price" value="{{ $product->new_price }}" >
                </div>
                <button type="submit" name="update_product" value="update" class="btn btn-lg btn-success">Update</button>
                <button type="reset" class="btn btn-lg btn-danger">Reset Button</button>
            </form>
        </div>
        </div>

    </div>
@endsection