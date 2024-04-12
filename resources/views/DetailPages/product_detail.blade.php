<!DOCTYPE html>
<html class="no-js" lang="zxx">

@include('components/head')

<body>

<!--== Wrapper Start ==-->
<div class="wrapper">

    <!--== Start Header Wrapper ==-->
    @include('components/navbar')
    <!--== End Header Wrapper ==-->



    <main class="main-content">

        <!--== Start Page Header Area Wrapper ==-->
        <section class="page-header-area pt-10 pb-9" data-bg-color="#FFF3DA">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="page-header-st3-content text-center text-md-start">
                            <ol class="breadcrumb justify-content-center justify-content-md-start">
                                <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active text-dark" aria-current="page">Product Detail</li>
                            </ol>
                            <h2 class="page-header-title">Product Detail</h2>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Product Details Area Wrapper ==-->
        <section class="section-space">
            <div class="container">
                <div class="row product-details">
                    <div class="col-lg-6">
                        <div class="product-details-thumb">
                            <img src="{{ asset('storage/' . $productDetails->image) }}" width="570" height="693" alt="Product Image">
                            <span class="flag-new">{{$productDetails->category->name}}</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details-content">
                            <h5 class="product-details-collection">{{$productDetails->category->name}}</h5>
                            <h3 class="product-details-title">{{ $productDetails->name }}</h3>
                            <div class="product-details-review mb-7">
                                <div class="product-review-icon">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <button type="button" class="product-review-show">150 reviews</button>
                            </div>
                            <p class="mb-7">{{ $productDetails->description }}</p>
                            <div class="product-details-pro-qty">
                                <div class="pro-qty">
                                    <input type="text" id="quantityInput" title="Quantity" value="01">
                                </div>
                            </div>
                            <div class="product-details-action">
                                <h4 class="price">{{ $productDetails->price }} Dhs</h4>
                                <div class="product-details-cart-wishlist">
                                    <button type="button" class="btn-wishlist"
                                            onclick="addToWishList('{{ $productDetails->id }}')"
                                            data-bs-toggle="modal"
                                            data-bs-target="#action-WishlistModal">
                                        <i class="fa fa-heart-o"></i>
                                    </button>
                                    <button type="button" class="btn ps-5"
                                            onclick="addToCart('{{ $productDetails->id }}')"
                                            data-bs-toggle="modal"
                                            data-bs-target="#action-CartAddModal">
                                        Buy Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="nav product-details-nav" id="product-details-nav-tab" role="tablist">
                            <button class="nav-link" id="specification-tab" data-bs-toggle="tab" data-bs-target="#specification" type="button" role="tab" aria-controls="specification" aria-selected="false">Specification</button>
                            <button class="nav-link active" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="true">Review</button>
                        </div>
                        <div class="tab-content" id="product-details-nav-tabContent">
                            <div class="tab-pane" id="specification" role="tabpanel" aria-labelledby="specification-tab">
                                <ul class="product-details-info-wrap">
                                    <li><span>Weight</span>
                                        <p>250 g</p>
                                    </li>
                                    <li><span>Dimensions</span>
                                        <p>10 x 10 x 15 cm</p>
                                    </li>
                                    <li><span>Materials</span>
                                        <p>60% cotton, 40% polyester</p>
                                    </li>
                                    <li><span>Other Info</span>
                                        <p>American heirloom jean shorts pug seitan letterpress</p>
                                    </li>
                                </ul>

                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius velit corporis quo voluptate culpa soluta, esse accusamus, sunt quia omnis amet temporibus sapiente harum quam itaque libero tempore. Ipsum, ducimus. lorem</p>
                            </div>

                            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                                <!--== Start Reviews Content Item ==-->
                                <div class="product-review-item">
                                    <div class="product-review-top">
                                        <div class="product-review-thumb">
                                            <img src="assets/images/shop/product-details/comment1.webp" alt="Images">
                                        </div>
                                        <div class="product-review-content">
                                            <span class="product-review-name">Tomas Doe</span>
                                            <span class="product-review-designation">Delveloper</span>
                                            <div class="product-review-icon">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra amet, sodales faucibus nibh. Vivamus amet potenti ultricies nunc gravida duis. Nascetur scelerisque massa sodales.</p>
                                    <button type="button" class="review-reply"><i class="fa fa fa-undo"></i></button>
                                </div>
                                <!--== End Reviews Content Item ==-->

                                <!--== Start Reviews Content Item ==-->
                                <div class="product-review-item product-review-reply">
                                    <div class="product-review-top">
                                        <div class="product-review-thumb">
                                            <img src="assets/images/shop/product-details/comment2.webp" alt="Images">
                                        </div>
                                        <div class="product-review-content">
                                            <span class="product-review-name">Tomas Doe</span>
                                            <span class="product-review-designation">Delveloper</span>
                                            <div class="product-review-icon">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra amet, sodales faucibus nibh. Vivamus amet potenti ultricies nunc gravida duis. Nascetur scelerisque massa sodales.</p>
                                    <button type="button" class="review-reply"><i class="fa fa fa-undo"></i></button>
                                </div>
                                <!--== End Reviews Content Item ==-->

                                <!--== Start Reviews Content Item ==-->
                                <div class="product-review-item mb-0">
                                    <div class="product-review-top">
                                        <div class="product-review-thumb">
                                            <img src="assets/images/shop/product-details/comment3.webp" alt="Images">
                                        </div>
                                        <div class="product-review-content">
                                            <span class="product-review-name">Tomas Doe</span>
                                            <span class="product-review-designation">Delveloper</span>
                                            <div class="product-review-icon">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra amet, sodales faucibus nibh. Vivamus amet potenti ultricies nunc gravida duis. Nascetur scelerisque massa sodales.</p>
                                    <button type="button" class="review-reply"><i class="fa fa fa-undo"></i></button>
                                </div>
                                <!--== End Reviews Content Item ==-->
                            </div>
                        </div>
                    </div>

{{--                    Reviews--}}
                    <div class="col-lg-5">
                        <div class="product-reviews-form-wrap">
                            <h4 class="product-form-title">Leave a replay</h4>
                            <div class="product-reviews-form">
                                <form action="#">
                                    <div class="form-input-item">
                                        <textarea class="form-control" placeholder="Enter you feedback"></textarea>
                                    </div>
                                    <div class="form-input-item">
                                        <input class="form-control" type="text" placeholder="Full Name">
                                    </div>
                                    <div class="form-input-item">
                                        <input class="form-control" type="email" placeholder="Email Address">
                                    </div>
                                    <div class="form-input-item">
                                        <div class="form-ratings-item">
                                            <select id="product-review-form-rating-select" class="select-ratings">
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                                <option value="5">05</option>
                                            </select>
                                            <span class="title">Provide Your Ratings</span>
                                            <div class="product-ratingsform-form-wrap">
                                                <div class="product-ratingsform-form-icon">
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div id="product-review-form-rating" class="product-ratingsform-form-icon-fill">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reviews-form-checkbox">
                                            <input class="form-check-input" type="checkbox" value="" id="ReviewsFormCheckbox" checked="">
                                            <label class="form-check-label" for="ReviewsFormCheckbox">Provide ratings anonymously.</label>
                                        </div>
                                    </div>
                                    <div class="form-input-item mb-0">
                                        <button type="submit" class="btn">SUBMIT</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Product Details Area Wrapper ==-->

        <!--== Start Product Banner Area Wrapper ==-->
        <div class="container">
            <!--== Start Product Category Item ==-->
            <a href="product.html" class="product-banner-item">
                <img src="{{url('assets/images/shop/banner/7.webp')}}" width="1170" height="240" alt="Image-HasTech">
            </a>
            <!--== End Product Category Item ==-->
        </div>
        <!--== End Product Banner Area Wrapper ==-->

        <!--== Start Product Area Wrapper ==-->
        <section class="section-space">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2 class="title">Related Products</h2>
                            <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
                                @foreach($latestProducts as $product)

                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                                    <div class="product-item product-st2-item">
                                        <div class="product-thumb">
                                            <a class="d-block" href="{{route('product.details',$product->id)}}">
                                                <img src="{{ asset('storage/' . $product->image) }}" width="370" height="450" alt="{{$product->image}}">
                                            </a>
                                            <span class="flag-new">{{ $product->category->name }}</span>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-rating">
                                                <div class="rating">
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                                <div class="reviews">150 reviews</div>
                                            </div>
                                            <h4 class="title"><a href="{{route('product.details',$product->id)}}">{{$product->name}}</a></h4>
                                            <div class="prices">
                                                <span class="price">  {{$product->price}} Dhs </span>
                                                {{--                                    <span class="price-old">300.00</span>--}}
                                            </div>
                                            <div class="product-action">
                                                <!--add to cart button -->
                                                <button type="button"
                                                        class="product-action-btn action-btn-cart"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#action-CartAddModal1-{{$product->id}}"
                                                        onclick="addToCart('{{ $product->id }}')"
                                                >

                                                    <span>Add to cart</span>
                                                </button>
                                                <!-- Expand product details -->
                                                <button type="button" class="product-action-btn action-btn-quick-view"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#action-QuickViewModal-{{$product->id}}">
                                                    <i class="fa fa-expand"></i>
                                                </button>
                                                <!--Add to wishlist-->
                                                <button type="button" class="product-action-btn action-btn-wishlist"
                                                        onclick="addToWishList('{{ $product->id }}')"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#action-WishlistModal-{{$product->id}}">
                                                    <i class="fa fa-heart-o"></i>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!--== Start Product Quick View Modal ==-->
                                @include('Modal/productModal')
                                <!--== End Product Quick View Modal ==-->

                                <!--== Start Product Quick Add Cart Modal ==-->
                                @include('Modal/cartModal1')
                                <!--== End Product Quick Add Cart Modal ==-->

                                <!--== Start Product Quick Add Wishlist Modal ==-->
                                @include('Modal/wishlistModal')
                                <!--== End Product Quick Add Wishlist Modal ==-->

                                @endforeach
                                <!--== End prPduct Item ==-->
                            </div>

                        </div>
        </section>
        <!--== End Product Area Wrapper ==-->

    </main>


    <!--== Start Footer Area Wrapper ==-->
    @include('components/footer')
    <!--== End Footer Area Wrapper ==-->

    <!--== Scroll Top Button ==-->
    <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-up"></span></div>

    <!--== Start Product Quick Wishlist Modal ==-->
    @include('Modal/wishlistModalDetail')
    <!--== End Product Quick Wishlist Modal ==-->

    <!--== Start Product Quick Add Cart Modal ==-->
    @include('Modal/cartModal')
    <!--== End Product Quick Add Cart Modal ==-->


    <!--== Start Aside Search Form ==-->
    <aside class="aside-search-box-wrapper offcanvas offcanvas-top" tabindex="-1" id="AsideOffcanvasSearch" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
            <h5 class="d-none" id="offcanvasTopLabel">Aside Search</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa fa-close"></i></button>
        </div>
        <div class="offcanvas-body">
            <div class="container pt--0 pb--0">
                <div class="search-box-form-wrap">
                    <div class="search-note">
                        <p>Start typing and press Enter to search</p>
                    </div>
                    <form action="#" method="post">
                        <div class="aside-search-form position-relative">
                            <label for="SearchInput" class="visually-hidden">Search</label>
                            <input id="SearchInput" type="search" class="form-control" placeholder="Search entire store…">
                            <button class="search-button" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </aside>
    <!--== End Aside Search Form ==-->



    <!--== Start Aside Cart ==-->
    @include('components/cartAside')
    <!--== End Aside Cart ==-->

    <!--== Start Aside Menu ==-->
    <aside class="off-canvas-wrapper offcanvas offcanvas-start" tabindex="-1" id="AsideOffcanvasMenu" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h1 class="d-none" id="offcanvasExampleLabel">Aside Menu</h1>
            <button class="btn-menu-close" data-bs-dismiss="offcanvas" aria-label="Close">menu <i class="fa fa-chevron-left"></i></button>
        </div>
        <div class="offcanvas-body">
            <div id="offcanvasNav" class="offcanvas-menu-nav">
                <ul>
                    <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="#">home</a>
                        <ul>
                            <li><a href="index.html">Home One</a></li>
                            <li><a href="index-two.html">Home Two</a></li>
                        </ul>
                    </li>
                    <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="about-us.html">about</a></li>
                    <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="#">shop</a>
                        <ul>
                            <li><a href="#" class="offcanvas-nav-item">Shop Layout</a>
                                <ul>
                                    <li><a href="product.html">Shop 3 Column</a></li>
                                    <li><a href="product-four-columns.html">Shop 4 Column</a></li>
                                    <li><a href="product-left-sidebar.html">Shop Left Sidebar</a></li>
                                    <li><a href="product-right-sidebar.html">Shop Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="offcanvas-nav-item">Single Product</a>
                                <ul>
                                    <li><a href="product-details-normal.html">Single Product Normal</a></li>
                                    <li><a href="product-details.html">Single Product Variable</a></li>
                                    <li><a href="product-details-group.html">Single Product Group</a></li>
                                    <li><a href="product-details-affiliate.html">Single Product Affiliate</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="offcanvas-nav-item">Others Pages</a>
                                <ul>
                                    <li><a href="product-cart.html">Shopping Cart</a></li>
                                    <li><a href="product-checkout.html">Checkout</a></li>
                                    <li><a href="product-wishlist.html">Wishlist</a></li>
                                    <li><a href="product-compare.html">Compare</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="#">Blog</a>
                        <ul>
                            <li><a class="offcanvas-nav-item" href="#">Blog Layout</a>
                                <ul>
                                    <li><a href="blog.html">Blog Grid</a></li>
                                    <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                    <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="#">Pages</a>
                        <ul>
                            <li><a href="account-login.html">My Account</a></li>
                            <li><a href="faq.html">Frequently Questions</a></li>
                            <li><a href="page-not-found.html">Page Not Found</a></li>
                        </ul>
                    </li>
                    <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="contact.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </aside>
    <!--== End Aside Menu ==-->

</div>
<!--== Wrapper End ==-->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- MyJS -->
//add to cart
<script>
    function addToCart(productId) {
        var quantity = document.getElementById('quantityInput').value;
        console.log(quantity);
        var token = localStorage.getItem("access_token");

        axios.post(`/api/product/${productId}/addToCart`, {
            _token: '{{ csrf_token() }}',
            quantity: quantity
            }, {
            headers: {
                'Authorization': 'Bearer ' + token
            }
        })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.error(error);
            });
    }
</script>
//Add to wishlist
<script>
    function addToWishList(productId) {
        var token = localStorage.getItem("access_token");

        axios.post(`/api/wishlist/${productId}/add`, {
            _token: '{{ csrf_token() }}',
        }, {
            headers: {
                'Authorization': 'Bearer ' + token
            }
        })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.error(error);
            });
    }
</script>
//display cart items
<script>
    var token = localStorage.getItem("access_token");

    axios.get('/api/cart/items', {
        headers: {
            'Authorization': 'Bearer ' + token
        }
    })
        .then(response => {
            const cartItems = response.data.cartItems;
            const totalPrice = response.data.totalPrice.toFixed(2);

            // Update cart items
            const cartList = document.querySelector('.aside-cart-product-list');
            const cartItemTemplate = document.getElementById('cart-item-template');

            cartItems.forEach(item => {
                const listItem = cartItemTemplate.content.cloneNode(true);
                listItem.querySelector('.product-title').textContent = item.product.name;
                listItem.querySelector('.product-price').textContent = `${item.quantity} ×  ${item.product.price} Dhs`;
                listItem.querySelector('img').src = '{{ asset("storage/") }}/' + item.product.image;
                console.log('Image Source:', '{{ asset("storage/") }}' + item.product.image);

                listItem.querySelector('img').alt = item.product.name;

                cartList.appendChild(listItem);
            });

            // Update subtotal
            const subtotalElement = document.querySelector('.cart-total .amount');
            subtotalElement.textContent = `${totalPrice} Dhs`;

            // Update View cart and Checkout links
            const viewCartLink = document.querySelector('.btn-total[href="product-cart.html"]');
            viewCartLink.href = "product-cart.html";

            const checkoutLink = document.querySelector('.btn-total[href="product-checkout.html"]');
            checkoutLink.href = "product-checkout.html";
        })
        .catch(error => {
            console.error('Error fetching cart items:', error);
        });
</script>




<!-- JS Vendor, Plugins & Activation Script Files -->
<!-- Vendors JS -->
<script src="{{asset('assets/js/vendor/modernizr-3.11.7.min.js)')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>

<!-- Plugins JS -->
<script src="{{asset('assets/js/plugins/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/fancybox.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.nice-select.min.js')}}"></script>

<!-- Custom Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
