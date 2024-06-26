<aside class="product-cart-view-modal modal fade"
       id="action-QuickViewModal-{{$product->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="product-quick-view-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <span class="fa fa-close"></span>
                    </button>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <!--== Start Product Thumbnail Area ==-->
                                <div class="product-single-thumb">
                                    <img src="{{ asset($product->image) }}" width="544" height="560" alt="{{$product->image}}">
                                </div>
                                <!--== End Product Thumbnail Area ==-->
                            </div>
                            <div class="col-lg-6">
                                <!--== Start Product Info Area ==-->
                                <div class="product-details-content">
                                    <h5 class="product-details-collection">{{ $product->category->name }}</h5>
                                    <h3 class="product-details-title">{{$product->name}}</h3>
                                    <div class="product-details-review mb-5">
                                        <div class="product-review-icon">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <button type="button" class="product-review-show">150 reviews</button>
                                    </div>
                                    <p class="mb-6">
                                        {{$product->description}}
                                    </p>
                                    <div class="product-details-pro-qty">
                                        <div class="pro-qty">
                                            <input type="text" id="quantityInput" title="Quantity" value="01">
                                        </div>
                                    </div>
                                    <div class="product-details-action">
                                        <h4 class="price">{{$product->price}} Dhs</h4>
{{--                                        <div class="product-details-cart-wishlist">--}}
{{--                                            <button type="button" class="btn"--}}
{{--                                                    onclick="addToCart('{{ $product->id }}')"--}}
{{--                                                    data-bs-toggle="modal"--}}
{{--                                                    data-bs-target="#action-CartAddModal1-{{$product->id}}">--}}
{{--                                                Add to cart--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                                <!--== End Product Info Area ==-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
