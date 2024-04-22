<!--== Start Product Quick Add Cart Modal ==-->
<aside class="product-action-modal modal fade" id="action-CartAddModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="product-action-view-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="modal-action-messages">
                        <i class="fa fa-check-square-o"></i> Added to cart successfully!
                    </div>
                    <div class="modal-action-product">
                        <div class="thumb">
                            <img src="{{ asset($product->image) }}" alt="{{$productDetails->image}}" width="466" height="320">
                        </div>
                        <h4 class="product-name"><a href="{{route('product.details',$product->id)}}">{{ $productDetails->name }}</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<!--== End Product Quick Add Cart Modal ==-->
