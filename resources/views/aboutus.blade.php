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
        <section class="page-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7 col-lg-7 col-xl-5">
                        <div class="page-header-content">
                            <div class="title-img"><img src="assets/images/photos/about-title.webp" alt="Image"></div>
                            <h2 class="page-header-title">We, are Argan Beauty</h2>
                            <h4 class="page-header-sub-title">Best Organic Argan Product Provider</h4>
                            <p class="page-header-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis.</p>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5 col-xl-7">
                        <div class="page-header-thumb">
                            <img src="assets/images/photos/about0.jpg" width="570" height="669" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Funfact Area Wrapper ==-->
        <section class="funfact-area section-space">
            <div class="container">
                <div class="row mb-n6">
                    <div class="col-sm-6 col-lg-4 mb-6">
                        <!--== Start Funfact Item ==-->
                        <div class="funfact-item">
                            <div class="icon">
                                <img src="assets/images/icons/funfact1.webp" width="110" height="110" alt="Icon">
                            </div>
                            <h2 class="funfact-number">5000+</h2>
                            <h6 class="funfact-title">Clients</h6>
                        </div>
                        <!--== End Funfact Item ==-->
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-6">
                        <!--== Start Funfact Item ==-->
                        <div class="funfact-item">
                            <div class="icon">
                                <img src="assets/images/icons/funfact2.webp" width="110" height="110" alt="Icon">
                            </div>
                            <h2 class="funfact-number">250+</h2>
                            <h6 class="funfact-title">Projects</h6>
                        </div>
                        <!--== End Funfact Item ==-->
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-6">
                        <!--== Start Funfact Item ==-->
                        <div class="funfact-item">
                            <div class="icon">
                                <img src="assets/images/icons/funfact3.webp" width="110" height="110" alt="Icon">
                            </div>
                            <h2 class="funfact-number">1.5M+</h2>
                            <h6 class="funfact-title">Revenue</h6>
                        </div>
                        <!--== End Funfact Item ==-->
                    </div>
                </div>
            </div>
        </section>
        <!--== End Funfact Area Wrapper ==-->


       <section class="section-space"></section>
        <!--== Start About Area Wrapper ==-->
        <section class="section-space pt-0 mb-n1">
            <div class="container">
                <div class="about-thumb">
                    <img src="assets/images/photos/about2.webp" alt="Image">
                </div>
                <div class="about-content">
                    <h2 class="title">Best Organic Argan Product Provider</h2>
                    <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel arcu aliquet sem risus nisl. Neque, scelerisque in erat lacus ridiculus habitant porttitor. Malesuada pulvinar sollicitudin enim, quis sapien tellus est. Pellentesque amet vel maecenas nisi. In elementum magna nulla ridiculus sapien mollis volutpat sit. Arcu egestas massa consectetur felis urna porttitor ac.</p>
                </div>
            </div>
        </section>
        <!--== End About Area Wrapper ==-->

        <!--== Start Feature Area Wrapper ==-->
        <div class="feature-area section-space">
            <div class="container">
                <div class="row mb-n9">
                    <div class="col-md-6 col-lg-4 mb-8">
                        <!--== Start Feature Item ==-->
                        <div class="feature-item">
                            <h5 class="title"><img class="icon" src="assets/images/icons/feature1.webp" width="60" height="60" alt="Icon"> Support Team</h5>
                            <p class="desc">Lorem ipsum dolor amet, consectetur adipiscing. Ac tortor enim metus, turpis.</p>
                        </div>
                        <!--== End Feature Item ==-->
                    </div>
                    <div class="col-md-6 col-lg-4 mb-8">
                        <!--== Start Feature Item ==-->
                        <div class="feature-item">
                            <h5 class="title"><img class="icon" src="assets/images/icons/feature2.webp" width="60" height="60" alt="Icon"> Certification</h5>
                            <p class="desc">Lorem ipsum dolor amet, consectetur adipiscing. Ac tortor enim metus, turpis.</p>
                        </div>
                        <!--== End Feature Item ==-->
                    </div>
                    <div class="col-md-6 col-lg-4 mb-8">
                        <!--== Start Feature Item ==-->
                        <div class="feature-item">
                            <h5 class="title"><img class="icon" src="assets/images/icons/feature3.webp" width="60" height="60" alt="Icon"> Natural Products</h5>
                            <p class="desc">Lorem ipsum dolor amet, consectetur adipiscing. Ac tortor enim metus, turpis.</p>
                        </div>
                        <!--== End Feature Item ==-->
                    </div>
                </div>
            </div>
        </div>
        <!--== End Feature Area Wrapper ==-->

    </main>




    <!--== Start Footer Area Wrapper ==-->
    @include('components/footer')
    <!--== End Footer Area Wrapper ==-->



    @include('components/cartAside')
    <!--== End Aside Cart ==-->

    <!--== Start Aside Menu ==-->
    @include('components/offcanvasMenu')
    <!--== End Aside Menu ==-->

</div>
<!--== Wrapper End ==-->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- MyJS -->
//navbar account
<script src="{{url('myJs/account.js')}}"></script>

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
<script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
