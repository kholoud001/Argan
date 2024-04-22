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
                                <li class="breadcrumb-item active text-dark" aria-current="page">Products</li>
                            </ol>
                            <h2 class="page-header-title">All Products</h2>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h5 class="showing-pagination-results mt-5 mt-md-9 text-center text-md-end">Showing 09 Results</h5>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Product Area Wrapper ==-->
        <section class="section-space">
            <div class="container">
                <div class="row justify-content-between flex-xl-row-reverse">
                    <div class="col-xl-9">
                        <div class="row g-3 g-sm-6">
                            <!--products-->
                            <div id="product-collection" class="row">
                                @foreach ($products as $product)
                                    <div class="col-6 col-lg-4 col-xl-4 mb-4 mb-sm-8">
                                        <!-- Start Product Item -->
                                        <div class="product-item product-st3-item">
                                            <div class="product-thumb">
                                                <a class="d-block" href="{{route('product.details',$product->id)}}">
                                                    <img src="{{ asset( $product->image) }}" width="370" height="450" alt="{{  $product->image }}">
                                                </a>
                                                    <span class="flag-new">{{ $product->category->name }}</span>

                                                <div class="product-action">
                                                    <!-- Expand product details -->
                                                    <button type="button" class="product-action-btn action-btn-quick-view"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#action-QuickViewModal-{{$product->id}}">
                                                        <i class="fa fa-expand"></i>
                                                    </button>
                                                    <!--add to cart button -->
                                                    <button type="button"
                                                            class="product-action-btn action-btn-cart"
                                                            data-bs-toggle="modal"
                                                            onclick="addToCart('{{ $product->id }}')"
                                                            data-bs-target="#action-CartAddModal1-{{$product->id}}">

                                                        <span>Add to cart</span>
                                                    </button>
                                                    <!--Add to wishlist-->
                                                    <button type="button" class="product-action-btn action-btn-wishlist"
                                                            data-bs-toggle="modal"
                                                            onclick="addToWishList('{{ $product->id }}')"
                                                            data-bs-target="#action-WishlistModal-{{$product->id}}">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-rating">
                                                    <!-- Add rating stars here -->
                                                </div>
                                                <h4 class="title"><a href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a></h4>
                                                <div class="prices">
                                                    <span class="price">{{ $product->price }} Dhs</span>
{{--                                                    @if ($product->old_price)--}}
{{--                                                        <span class="price-old">${{ $product->old_price }}</span>--}}
{{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            <div class="product-action-bottom">
                                                <!-- Expand product details -->
                                                <button type="button" class="product-action-btn action-btn-quick-view"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#action-QuickViewModal-{{$product->id}}">
                                                    <i class="fa fa-expand"></i>
                                                </button>
                                                <!--add to cart button -->
                                                <button type="button"
                                                        class="product-action-btn action-btn-cart"
                                                        data-bs-toggle="modal"
                                                        onclick="addToCart('{{ $product->id }}')"
                                                        data-bs-target="#action-CartAddModal1-{{$product->id}}">

                                                    <span>Add to cart</span>
                                                </button>
                                                <!--Add to wishlist-->
                                                <button type="button" class="product-action-btn action-btn-wishlist"
                                                        data-bs-toggle="modal"
                                                        onclick="addToWishList('{{ $product->id }}')"
                                                        data-bs-target="#action-WishlistModal-{{$product->id}}">
                                                    <i class="fa fa-heart-o"></i>
                                                </button>                                            </div>
                                        </div>
                                        <!-- End Product Item -->
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
                            </div>
                            <!-- Pagination -->
                            <div class="col-12">
                                @php
                                    $pageNumber = $products->currentPage();
                                    $counter = ($pageNumber - 1) * $products->perPage() + 1;
                                @endphp

                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $pageNumber == 1 ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">&laquo;</a>
                                    </li>

                                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                                        <li class="page-item {{ $pageNumber == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    <li class="page-item {{ !$products->hasMorePages() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">&raquo;</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-xl-3">
                        <div class="product-sidebar-widget">
                            <!--search-->
                            <div class="product-widget-search">
                                <form action="{{ route('search') }}" method="GET">
                                    <input type="search" name="search_query" id="searchInput" placeholder="Search Your Product Name">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>

                            <!-- Categories -->
                            <div class="product-widget">
                                <h4 class="product-widget-title">Categoris</h4>
                                @foreach( $categories as $category)
                                <ul class="product-widget-category">
                                    <li><a href="product.html">{{$category->name}} <span>({{ $category->products()->count() }})</span></a></li>
                                </ul>
                                @endforeach
                            </div>
                            <div class="product-widget mb-0">
                                <h4 class="product-widget-title">Popular Tags</h4>
                                <ul class="product-widget-tags">
                                    <li><a href="#">Beauty</a></li>
                                    <li><a href="#">Makeup</a></li>
                                    <li><a href="#">Hair</a></li>
                                    <li><a href="#">Nails</a></li>
                                    <li><a href="#">Hairstyle</a></li>
                                    <li><a href="#">Skincare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Product Area Wrapper ==-->

        <!--== Start Product Banner Area Wrapper ==-->
        <section>
            <div class="container">
                <!--== Start Product Category Item ==-->
                <a href="{{route('products.collection')}}" class="product-banner-item">
                    <img src="{{url('assets/images/shop/banner/7.webp')}}" width="1170" height="240" alt="Image-HasTech">
                </a>
                <!--== End Product Category Item ==-->
            </div>
        </section>
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
                <div class="row mb-n10">
                    <div class="col-12">
                        <div class="swiper related-product-slide-container">
                            <div class="swiper-wrapper">
                                @foreach ($latestProducts as $product)
                                    <div class="swiper-slide mb-8">
                                        <!-- Start Product Item -->
                                        <div class="product-item">
                                            <div class="product-thumb">
                                                <a class="d-block" href="{{ route('product.details', $product->id) }}">
                                                    <img src="{{ asset($product->image) }}" width="370" height="450" alt="{{ $product->image }}">
                                                </a>
                                                <span class="flag-new">{{ $product->category->name }}</span>
                                                <div class="product-action">
                                                    <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal-{{$product->id}}">
                                                        <i class="fa fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal1-{{$product->id}}" onclick="addToCart('{{ $product->id }}')">
                                                        <span>Add to cart</span>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal-{{$product->id}}" onclick="addToWishList('{{ $product->id }}')">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-rating">
                                                    <!-- Add rating stars here -->
                                                </div>
                                                <h4 class="title"><a href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a></h4>
                                                <div class="prices">
                                                    <span class="price">{{ $product->price }} Dhs</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product Item -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<!-- MyJS -->
//search
<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var searchQuery = $(this).val();

            $.ajax({
                url: '{{ route("search") }}',
                method: 'GET',
                data: { search_query: searchQuery },
                dataType: 'json',
                success: function(response) {
                    console.log(response);

                    if (response.products && response.products.data.length > 0) {
                        // Build HTML content for search results
                        var html = '';
                        $.each(response.products.data, function(index, product) {
                            html += '<div class="col-6 col-lg-4 col-xl-4 mb-4 mb-sm-8">';
                            html += '<div class="product-item product-st3-item">';
                            html += '<div class="product-thumb">';
                            html += '<a class="d-block" href="{{ url('/products/') }}/' + product.id + '">';
                            html += '<img src="{{ asset('/') }}' + product.image + '" width="370" height="450" alt="' + product.image + '">';
                            html += '</a>';
                            html += '<span class="flag-new">' + product.category.name + '</span>';
                            html += '<div class="product-action">';
                            // Add buttons for expand product details, add to cart, and add to wishlist here
                            html += '</div>';
                            html += '</div>';
                            html += '<div class="product-info">';
                            html += '<div class="product-rating">';
                            // Add rating stars here
                            html += '</div>';
                            html += '<h4 class="title"><a href="{{ url('/products/') }}/' + product.id + '">' + product.name + '</a></h4>';
                            html += '<div class="prices">';
                            html += '<span class="price">' + product.price + ' Dhs</span>';
                            // Add logic for displaying old price if needed
                            html += '</div>';
                            html += '</div>';
                            html += '<div class="product-action-bottom">';
                            // Add buttons for expand product details, add to cart, and add to wishlist here
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                        });

                        $('#product-collection').html(html);
                    } else {
                        $('#product-collection').html('<p>No products found.</p>');
                    }

                    //
                    $('#product-collection').removeClass('d-none');


                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>




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


//navbar account
<script src="{{url('myJs/account.js')}}"></script>

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


            const checkoutLink = document.querySelector('.btn-total[href="{{route('get.checkout')}}"]');
            checkoutLink.href = "{{route('get.checkout')}}";
        })
        .catch(error => {
            console.error('Error fetching cart items:', error);
        });
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
<script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
