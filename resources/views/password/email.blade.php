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
                                <li class="breadcrumb-item"><a class="text-dark" href="href="{{route('home')}}">Home</a></li>
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
                            <h3 class="title">Reset Password</h3>
                            <div class="my-account-form">
                                <form id="resetPasswordForm" method="post" action="{{ route('password.email') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-6">
                                        <label for="email">Enter Your Email Address <sup>*</sup></label>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>

                                    <div class="form-group d-flex align-items-center mb-14">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
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

    <!--== Start Success Modal ==-->
    <!-- Success modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    Password reset link sent successfully.
                </div>
            </div>
        </div>
    </div>
    <!--== End Success Modal ==-->


    <!--== Start Fail Modal ==-->
    <div class="modal fade" id="failureModal" tabindex="-1" role="dialog" aria-labelledby="failureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    Failed to send password reset link.
                </div>
            </div>
        </div>
    </div>
    <!--== End Fail Modal ==-->



    <!--== Start Footer Area Wrapper ==-->
    @include('components/footer')
    <!--== End Footer Area Wrapper ==-->

    <!--== Start Aside Cart ==-->
    <aside class="aside-cart-wrapper offcanvas offcanvas-end" tabindex="-1" id="AsideOffcanvasCart" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h1 class="d-none" id="offcanvasRightLabel">Shopping Cart</h1>
            <button class="btn-aside-cart-close" data-bs-dismiss="offcanvas" aria-label="Close">Shopping Cart <i class="fa fa-chevron-right"></i></button>
        </div>
        <div class="offcanvas-body">
            <ul class="aside-cart-product-list">
                <li class="aside-product-list-item">
                    <a href="#/" class="remove">×</a>
                    <a href="product-details.html">
                        <img src="assets/images/shop/cart1.webp" width="68" height="84" alt="Image">
                        <span class="product-title">Leather Mens Slipper</span>
                    </a>
                    <span class="product-price">1 × £69.99</span>
                </li>
                <li class="aside-product-list-item">
                    <a href="#/" class="remove">×</a>
                    <a href="product-details.html">
                        <img src="assets/images/shop/cart2.webp" width="68" height="84" alt="Image">
                        <span class="product-title">Quickiin Mens shoes</span>
                    </a>
                    <span class="product-price">1 × £20.00</span>
                </li>
            </ul>
            <p class="cart-total"><span>Subtotal:</span><span class="amount">£89.99</span></p>
            <a class="btn-total" href="product-cart.html">View cart</a>
            <a class="btn-total" href="product-checkout.html">Checkout</a>
        </div>
    </aside>
    <!--== End Aside Cart ==-->


    <!--== Start Aside Menu ==-->
    @include('components/offcanvasMenu')
    <!--== End Aside Menu ==-->

</div>
<!--== Wrapper End ==-->

<!-- My Js -->
<script>
    document.getElementById("resetPasswordForm").addEventListener("submit", function(event) {
        event.preventDefault();

        var form = event.target;
        var formData = new FormData(form);

        fetch(form.action, {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-Token": "{{ csrf_token() }}",
            },
        })
            .then(function(response) {
                if (response.ok) {
                    $('#successModal').modal('show');
                } else {
                    $('#failureModal').modal('show');
                }
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
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
