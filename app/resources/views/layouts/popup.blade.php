<!-- Modal -->
<div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" width="100x" height="100x">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Product review</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <a input class="form-control" id="name" name="name" >{{ $product->name}} </a>
                </div>
                <div class="form-group">
                    <label>SKU</label>
                    <a input class="form-control" id="sku" name="sku">{{ $product->sku }} </a>
                </div>

                <div class="form-group">
                    <label>Images:</label>
                    <div class="image-set">
                        @foreach($product->productsMedia as $image)
                            <a class="gallery-item" href="<?php echo asset("app/$image->gallery")?>" data-lightbox="{{$product->id}}" >
                                <img class="img-responsive" src="<?php echo asset("app/$image->gallery")?>" data-lightbox="{{$product->id}}" height="150" width="150" alt="One" />
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label>Old Price</label>
                    <a input class="form-control" id="old_price" name="old_price"> {{ $product->old_price }}</a>
                </div>
                <div class="form-group">
                    <label>Promo Price</label>
                    <a input class="form-control" id="new_price" name="new_price">{{ $product->new_price }} </a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>