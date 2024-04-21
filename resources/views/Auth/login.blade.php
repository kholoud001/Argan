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
                                <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
                                <li class="breadcrumb-item active text-dark" aria-current="page">Account</li>
                            </ol>
                            <h2 class="page-header-title">Account</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Account Area Wrapper ==-->
        <section class="section-space">
            <div class="container">
                <div class="row justify-content-center mb-n8">
                    <div class="col-lg-6 mb-8">
                        <!--== Start Login Area Wrapper ==-->
                        <div class="my-account-item-wrap">
                            <h3 class="title">Login</h3>

                            <div class="my-account-form">
                                <!-- Login with Gmail -->
                                <form action="{{route('google-auth')}}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary mb-3 d-flex align-items-center" style="width: calc(100% - 24px);">
                                        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Gmail Logo" class="logo me-2" style="height: 24px;"> Login with Gmail
                                    </button>
                                </form>

                                <!-- Login with Facebook -->
{{--                                <form action="{{route('facebook.redirect')}}" method="GET">--}}
{{--                                    @csrf--}}
{{--                                    <button type="submit" class="btn btn-primary mb-3 d-flex align-items-center" style="width: calc(100% - 24px);">--}}
{{--                                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook Logo" class="logo me-2" style="height: 24px;"> Login with Facebook--}}
{{--                                    </button>--}}
{{--                                </form>--}}
                                <form  id="login-form">
                                    @csrf
                                    <div class="form-group mb-6">
                                        <label for="email">Email Address <sup>*</sup></label>
                                        <input type="email" id="email" name="email" class="form-control">
                                        <span id="email-error" class="text-danger"></span> <!-- Error message placeholder -->
                                    </div>

                                    <div class="form-group mb-6">
                                        <label for="password">Password <sup>*</sup></label>
                                        <input type="password" id="password" name="password" class="form-control">
                                        <span id="password-error" class="text-danger"></span> <!-- Error message placeholder -->
                                    </div>

                                    <div class="form-group d-flex align-items-center mb-14">
                                        <button type="submit" class="btn">Login</button>

                                        <div class="form-check ms-3">
                                            <input type="checkbox" class="form-check-input" id="remember_pwsd">
                                            <label class="form-check-label" for="remember_pwsd">Remember Me</label>
                                        </div>
                                    </div>
                                    <a class="lost-password" href="{{ route('password.email') }}">Lost your Password?</a>
                                </form>
                            </div>
                        </div>
                        <!--== End Login Area Wrapper ==-->
                    </div>
                </div>
            </div>
        </section>

        <!--== End Account Area Wrapper ==-->

    </main>

    <!--== Start Footer Area Wrapper ==-->
    @include('components/footer')
    <!--== End Footer Area Wrapper ==-->

    <!--== Scroll Top Button ==-->
    <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-up"></span></div>



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
{{--    <aside class="aside-cart-wrapper offcanvas offcanvas-end" tabindex="-1" id="AsideOffcanvasCart" aria-labelledby="offcanvasRightLabel">--}}
{{--        <div class="offcanvas-header">--}}
{{--            <h1 class="d-none" id="offcanvasRightLabel">Shopping Cart</h1>--}}
{{--            <button class="btn-aside-cart-close" data-bs-dismiss="offcanvas" aria-label="Close">Shopping Cart <i class="fa fa-chevron-right"></i></button>--}}
{{--        </div>--}}
{{--        <div class="offcanvas-body">--}}
{{--            <ul class="aside-cart-product-list">--}}
{{--                <li class="aside-product-list-item">--}}
{{--                    <a href="#/" class="remove">×</a>--}}
{{--                    <a href="product-details.html">--}}
{{--                        <img src="assets/images/shop/cart1.webp" width="68" height="84" alt="Image">--}}
{{--                        <span class="product-title">Leather Mens Slipper</span>--}}
{{--                    </a>--}}
{{--                    <span class="product-price">1 × £69.99</span>--}}
{{--                </li>--}}
{{--                <li class="aside-product-list-item">--}}
{{--                    <a href="#/" class="remove">×</a>--}}
{{--                    <a href="product-details.html">--}}
{{--                        <img src="assets/images/shop/cart2.webp" width="68" height="84" alt="Image">--}}
{{--                        <span class="product-title">Quickiin Mens shoes</span>--}}
{{--                    </a>--}}
{{--                    <span class="product-price">1 × £20.00</span>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <p class="cart-total"><span>Subtotal:</span><span class="amount">£89.99</span></p>--}}
{{--            <a class="btn-total" href="product-cart.html">View cart</a>--}}
{{--            <a class="btn-total" href="product-checkout.html">Checkout</a>--}}
{{--        </div>--}}
{{--    </aside>--}}
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('login-form').addEventListener('submit', function(event) {
            event.preventDefault();

            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            // Clear previous errors
            document.getElementById('email-error').textContent = '';
            document.getElementById('password-error').textContent = '';

            if (!email) {
                document.getElementById('email-error').textContent = 'Email is required.';
                return;
            }

            if (!password) {
                document.getElementById('password-error').textContent = 'Password is required.';
                return;
            }

            // Form data
            var formData = {
                email: email,
                password: password
            };

            axios.post('/api/auth/login', formData)
                .then(response => {
                    var data = response.data;

                    if (data.errors && (data.errors.email || data.errors.password)) {
                        document.getElementById('email-error').textContent = data.errors.email ? data.errors.email[0] : '';
                        document.getElementById('password-error').textContent = data.errors.password ? data.errors.password[0] : '';
                        return;
                    }

                    localStorage.setItem('access_token', data.token);
                    // document.cookie = `access_token=${data.token}; `;


                    if (data.message === 'Login successful') {
                        var redirectUrl = data.role === 1 ? data.redirect_url_admin : data.redirect_url_user;
                        window.location.href = redirectUrl;
                    } else {
                        document.getElementById('password-error').textContent = data.message;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
</script>


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
