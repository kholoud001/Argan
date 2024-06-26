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
        <!--== Start Hero Area Wrapper ==-->
        <section class="hero-two-slider-area position-relative">
            <div class="swiper hero-two-slider-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide hero-two-slide-item">
                        <div class="container">
                            <div class="row align-items-center position-relative">
                                <div class="col-12 col-md-6">
                                    <div class="hero-two-slide-content">
                                        <div class="hero-two-slide-text-img"><img src="assets/images/slider/text-light.webp" width="427" height="232" alt="Image"></div>
                                        <h2 class="hero-two-slide-title">ANTI AGEING</h2>
                                        <p class="hero-two-slide-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis.</p>
                                        <div class="hero-two-slide-meta">
                                            <a class="btn btn-border-primary" href="{{route('products.collection')}}">BUY NOW</a>
                                            <a class="ht-popup-video" data-fancybox="" data-type="iframe" href="https://player.vimeo.com/video/172601404?autoplay=1">
                                                <i class="fa fa-play icon"></i>
                                                <span>Play Now</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="hero-two-slide-thumb">
                                        <img src="assets/images/slider/slider3.webp" width="690" height="690" alt="Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide hero-two-slide-item">
                        <div class="container">
                            <div class="row align-items-center position-relative">
                                <div class="col-12 col-md-6">
                                    <div class="hero-two-slide-content">
                                        <div class="hero-two-slide-text-img"><img src="assets/images/slider/text-light.webp" width="427" height="232" alt="Image"></div>
                                        <h2 class="hero-two-slide-title">CLEAN FRESH</h2>
                                        <p class="hero-two-slide-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis.</p>
                                        <div class="hero-two-slide-meta">
                                            <a class="btn btn-border-primary" href="product.html">BUY NOW</a>
                                            <a class="ht-popup-video" data-fancybox="" data-type="iframe" href="https://player.vimeo.com/video/172601404?autoplay=1">
                                                <i class="fa fa-play icon"></i>
                                                <span>Play Now</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="hero-two-slide-thumb">
                                        <img src="assets/images/slider/slider4.webp" width="690" height="690" alt="Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--== Add Pagination ==-->
                <div class="hero-two-slider-pagination"></div>
            </div>
        </section>
        <!--== End Hero Area Wrapper ==-->

     <section class="section-space"></section>

        <!--== Recent Start Product Area Wrapper ==-->
        <section class="section-space pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2 class="title">Recent Product</h2>
                            <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
                    <!-- Loop through recent products -->
                    @foreach($recentProducts as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                            <div class="product-item product-st2-item">
                                <div class="product-thumb">
                                    <a class="d-block" href="{{route('product.details',$product->id)}}">
                                        <img src="{{ asset($product->image) }}" width="370" height="450" alt="{{$product->image}}">
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
                                                data-bs-toggle="modal"
                                                class="product-action-btn action-btn-cart"
                                                onclick="addToCart('{{ $product->id }}')"
{{--                                                data-target="#action-CartAddModal1-{{ $product->id }}"--}}
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
                                                data-bs-toggle="modal"
                                                onclick="addToWishList('{{ $product->id }}')">
{{--                                                data-bs-target="#action-WishlistModal-{{$product->id}}">--}}
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
                        <!--== Start Product Quick Wishlist Modal ==-->
                        @include('Modal/wishlistModal')
                        <!--== End Product Quick Wishlist Modal ==-->


                    @endforeach
                        <!--== End prPduct Item ==-->
                    </div>

                </div>
        </section>
        <!--== End Product Area Wrapper ==-->

        <!--== Start Product Banner Area Wrapper ==-->
        <section class="section-space pt-0">
            <div class="container">

                <!--== Start Product Category Item ==-->
                <a href="{{route('products.collection')}}" class="product-banner-item">
                    <img src="{{url('assets/images/shop/banner/7.webp')}}" width="1170" height="240" alt="Image-HasTech">
                </a>
                <!--== End Product Category Item ==-->
            </div>
        </section>
        <!--== End Product Banner Area Wrapper ==-->



        <!-- Blogs -->
        <section class="section-space pt-0">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">Blog posts</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                        </div>
                    </div>
                </div>
                    <div class="row mb-n9">
                        @foreach ($posts as $post)
                            <div class="col-sm-6 col-lg-4 mb-8">
                                <!--== Start Blog Item ==-->
                                <div class="post-item">
                                    <a href="{{route('blog.details',$post->id)}}" class="thumb">
                                        <img src="{{ asset($post->picture) }}" width="370" height="320" alt="{{ $post->picture }}">
                                    </a>
                                    <div class="content">
                                        <a class="post-category" href="{{route('blog.details',$post->id)}}">{{ $post->category }}</a>
                                        <h4 class="title"><a href="{{route('blog.details',$post->id)}}">{{ $post->title }}</a></h4>
                                        <ul class="meta">
                                            <li class="author-info"><span>By: Lilly</span> <a href="{{route('blog.details',$post->id)}}"></a></li>
                                            <li class="post-date">{{ $post->created_at->format('F d, Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <!--== End Blog Item ==-->
                            </div>
                @endforeach
            </div>
            </div>
        </section>
        <!--== End Blog Area Wrapper ==-->

        <!--== Start News Letter Area Wrapper ==-->
        <section class="section-space pt-0">
            <div class="container">
                <div class="newsletter-content-wrap" data-bg-img="{{url('assets/images/photos/bg1.webp')}}">
                    <div class="newsletter-content">
                        <div class="section-title mb-0">
                            <h2 class="title">Join with us</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam.</p>
                        </div>
                    </div>
                    <div class="newsletter-form">
                        <form action="{{ route('subscribe') }}" method="POST">
                            @csrf
                            <input name="email" type="email" class="form-control" placeholder="enter your email">
                            <button class="btn-submit" type="submit"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--== End News Letter Area Wrapper ==-->

    </main>

    <!--== Start Footer Area Wrapper ==-->
    @include('components/footer')
    <!--== End Footer Area Wrapper ==-->

    <!--== Scroll Top Button ==-->
    <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-up"></span></div>




    <!--== Start Aside Cart ==-->
    @include('components/cartAside')
    <!--== End Aside Cart ==-->

    <!--== Start Aside Menu ==-->
    @include('components/offcanvasMenu')
    <!--== End Aside Menu ==-->

</div>
<!--== Wrapper End ==-->


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap bundle -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- MyJS -->



//navbar account
<script src="{{url('myJs/account.js')}}"></script>

//add to cart
<script>
    function addToCart(productId) {
        var quantity = document.getElementById('quantityInput').value;
        var token = localStorage.getItem("access_token");

        if (token == null ) {
            window.location.href = '/login';
        } else {
            axios.post(`/api/product/${productId}/addToCart`, {
                _token: '{{ csrf_token() }}',
                quantity: quantity
            }, {
                headers: {
                    'Authorization': 'Bearer ' + token
                }
            })
                .then(function(response) {
                    //console.log(response);
                    $('#action-CartAddModal1-' + productId).modal('show');
                })
                .catch(function(error) {
                    if (error.response && error.response.status === 401) {
                         window.location.href = '/login';
                    } else {
                        console.error('carterror', error);
                    }
                });
        }
    }
</script>


//Add to wishlist
<script>

    function addToWishList(productId) {
        // $('#action-WishlistModal-' + productId).modal('hide');

        var token = localStorage.getItem("access_token");

        if (token === null ) {
            window.location.href = '/login';
        } else {
            axios.post(`/api/wishlist/${productId}/add`, {
                _token: '{{ csrf_token() }}',
            }, {
                headers: {
                    'Authorization': 'Bearer ' + token
                }
            })
                .then(function(response) {

                    $('#action-WishlistModal-' + productId).modal('show');
                    console.log('wish', response);
                })
                .catch(function(error) {
                    if (error.response && error.response.status === 401) {
                       window.location.href = '/login';
                    } else {
                        alert( error.response.data.message);
                    }
                });
        }
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
                listItem.querySelector('img').src = '{{ asset("/") }}' + item.product.image;
                {{--console.log('Image Source:', '{{ asset("storage/") }}' + item.product.image);--}}

                listItem.querySelector('img').alt = item.product.name;

                // Set the product link dynamically
                const productLink = listItem.querySelector('.product-link');
                if (productLink) {
                    productLink.href = '{{ route('product.details', '') }}/' + item.product.id;
                }


                cartList.appendChild(listItem);
            });

            // Update subtotal
            const subtotalElement = document.querySelector('.cart-total .amount');
            subtotalElement.textContent = `${totalPrice} Dhs`;

            //   View cart
            const viewCartLink = document.querySelector('.btn-total[href="{{route('cart.view')}}"]');
            viewCartLink.addEventListener('click', function(event) {
                event.preventDefault();
                window.location.href = "{{ route('cart.view') }}";
            });


            const checkoutLink = document.querySelector('.btn-total[href="{{route('cart.view')}}"]');
            checkoutLink.href = "{{route('cart.view')}}";
        })
        .catch(error => {
            console.error('Error fetching cart items:', error);
        });
</script>

//google api
<script>
    try {
        const urlParams = new URLSearchParams(window.location.search);
        const token = urlParams.get('token');

        if (token) {
            localStorage.setItem('access_token', token);
            console.log('Token set in local storage:', token);
        } else {
            console.error('Token not found in URL query parameters.');
        }
    } catch (error) {
        console.error('Error setting token in local storage:', error);
    }
</script>



<!-- JS Vendor, Plugins & Activation Script Files -->
<!-- Vendors JS -->
{{--<script src="{{asset('assets/js/vendor/modernizr-3.11.7.min.js)')}}"></script>--}}
<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>

<!-- Plugins JS -->
<script src="{{asset('assets/js/plugins/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/fancybox.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.nice-select.min.js')}}"></script>

<!-- Custom Main JS -->
<!-- <script src="{{asset('assets/js/main.js')}}"></script> -->

</body>

</html>
