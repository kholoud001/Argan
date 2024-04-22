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
        <nav aria-label="breadcrumb" class="breadcrumb-style1 mb-10">
            <div class="container">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </div>
        </nav>

        <!--== Start Blog Area Wrapper ==-->
        <section class="section-space pt-0">
            <div class="container">
                <div class="row justify-content-between flex-xl-row-reverse">
                    <div class="col-xl-8">
                        <div class="row">
                            @foreach($blogs as $blog)
                                <div class="col-sm-6 col-lg-4 col-xl-6 mb-8">
                                    <!--== Start Blog Item ==-->
                                    <div class="post-item">
                                        <a href="{{ route('blog.details', $blog->id) }}" class="thumb">
                                            <img src="{{ asset($blog->picture) }}" width="370" height="320" alt="Blog Image">

                                        </a>
                                        <div class="content">
                                            <a class="post-category"  href="{{route('blog.details',$blog->id)}}">{{ $blog->category }}</a>
                                            <h4 class="title"><a href="{{ route('blog.details', $blog->id) }}">{{ $blog->title }}</a></h4>
                                            <ul class="meta">
                                                <li class="post-date">{{ $blog->created_at->format('F d, Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--== End Blog Item ==-->
                                </div>
                            @endforeach


                            <!--pagination -->
                            <div class="col-12">
                                <ul class="pagination justify-content-center me-auto ms-auto mt-7 mb-8 mb-xl-0">
                                    <li class="page-item">
                                        <a class="page-link previous" href="product.html" aria-label="Previous">
                                            <span class="fa fa-chevron-left" aria-hidden="true"></span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="product.html">01</a></li>
                                    <li class="page-item"><a class="page-link" href="product.html">02</a></li>
                                    <li class="page-item"><a class="page-link" href="product.html">03</a></li>
                                    <li class="page-item"><a class="page-link" href="product.html">....</a></li>
                                    <li class="page-item">
                                        <a class="page-link next" href="product.html" aria-label="Next">
                                            <span class="fa fa-chevron-right" aria-hidden="true"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="blog-sidebar-widget">
                            <div class="blog-search-widget">
                                <form action="#">
                                    <input type="search" placeholder="Search Here">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="blog-widget">
                                <h4 class="blog-widget-title">Popular Categoris</h4>
                                <ul class="blog-widget-category">
                                    <li><a href="blog.html">Accesasories <span>(6)</span></a></li>
                                    <li><a href="blog.html">Computer <span>(4)</span></a></li>
                                    <li><a href="blog.html">Covid-19 <span>(2)</span></a></li>
                                    <li><a href="blog.html">Electronics <span>(12)</span></a></li>
                                    <li><a href="blog.html">Furniture <span>(9)</span></a></li>
                                </ul>
                            </div>
                            <div class="blog-widget">
                                <h4 class="blog-widget-title">Recent Posts</h4>
                                <div class="blog-widget-post">
                                    <div class="blog-widget-single-post">
                                        <a href="blog-details.html">
                                            <img src="assets/images/blog/s1.webp" width="75" height="78" alt="Images">
                                            <span class="title">Lorem ipsum dolor sit amet conse adipis.</span>
                                        </a>
                                        <span class="date">Sep 24,2022</span>
                                    </div>
                                    <div class="blog-widget-single-post">
                                        <a href="blog-details.html">
                                            <img src="assets/images/blog/s2.webp" width="75" height="78" alt="Images">
                                            <span class="title">Lorem ipsum dolor sit amet conse adipis.</span>
                                        </a>
                                        <span class="date">Sep 25,2022</span>
                                    </div>
                                    <div class="blog-widget-single-post">
                                        <a href="blog-details.html">
                                            <img src="assets/images/blog/s3.webp" width="75" height="78" alt="Images">
                                            <span class="title">Lorem ipsum dolor sit amet conse adipis.</span>
                                        </a>
                                        <span class="date">Sep 26,2022</span>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-widget mb-0">
                                <h4 class="blog-widget-title">Popular Tags</h4>
                                <ul class="blog-widget-tags">
                                    <li><a href="blog.html">Beauty</a></li>
                                    <li><a href="blog.html">MakeupArtist</a></li>
                                    <li><a href="blog.html">Makeup</a></li>
                                    <li><a href="blog.html">Hair</a></li>
                                    <li><a href="blog.html">Nails</a></li>
                                    <li><a href="blog.html">Hairstyle</a></li>
                                    <li><a href="blog.html">Skincare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Blog Area Wrapper ==-->

        <!--== Start News Letter Area Wrapper ==-->
        <section class="section-space pt-0">
            <div class="container">
                <div class="newsletter-content-wrap" data-bg-img="assets/images/photos/bg1.webp">
                    <div class="newsletter-content">
                        <div class="section-title mb-0">
                            <h2 class="title">Join with us</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam.</p>
                        </div>
                    </div>
                    <div class="newsletter-form">
                        <form>
                            <input type="email" class="form-control" placeholder="enter your email">
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