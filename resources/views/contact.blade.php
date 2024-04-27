<!DOCTYPE html>
<html class="no-js" lang="zxx">

@include('components/head')

<body>

<!--== Wrapper Start ==-->
<div class="wrapper">

    <!--== Start Header Wrapper ==-->
@include('components/navbar')




    <main class="main-content">

        <!--== Start Form Contact Area Wrapper ==-->
        <section class="contact-area">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-6 col-lg-6">
                        <div class="section-title position-relative">
                            <h2 class="title">Get in touch</h2>
                            <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing aliquam, purus sit amet luctus venenatis</p>
                            <div class="line-left-style mt-4 mb-1"></div>
                        </div>
                        <!--== Start Contact Form ==-->
                        <div class="contact-form">
                            <form  action="{{ route('contact.send') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="con_name" placeholder="First Name">
                                            @error('con_name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" type="email" name="con_email" placeholder="Email address">
                                            @error('con_email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="con_message" placeholder="Message"></textarea>

                                            @error('con_message')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-0">
                                            <button class="btn btn-sm" type="submit">SUBMIT</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--== End Contact Form ==-->

                        <!--== Message Notification ==-->
                        <div class="form-message"></div>
                    </div>
                </div>
            </div>
            <div class="contact-left-img" data-bg-img="assets/images/photos/contact.webp"></div>
        </section>
        <!--== End Form Contact Area Wrapper ==-->

        <!--== Start Contact info Area Wrapper ==-->
        <section class="section-space">
            <div class="container">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <img class="icon" src="assets/images/icons/1.webp" width="30" height="30" alt="Icon">
                        <a href="tel://+11020303023">+11 0203 03023</a>
                    </div>
                    <div class="contact-info-item">
                        <img class="icon" src="assets/images/icons/2.webp" width="30" height="30" alt="Icon">
                        <a href="mailto://arganbrancy@gmail.com">arganbrancy@gmail.com</a>
                    </div>
                    <div class="contact-info-item mb-0">
                        <img class="icon" src="assets/images/icons/3.webp" width="30" height="30" alt="Icon">
                        <p>Safi, Morocco, 46000</p>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Contact info  Area Wrapper ==-->

{{--        <div class="map-area">--}}
{{--            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d802879.9165497769!2d144.83475730949783!3d-38.180874157285366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sbd!4v1636803638401!5m2!1sen!2sbd"></iframe>--}}
{{--        </div>--}}

    </main>


    <!--== Start Footer Area Wrapper ==-->
    @include('components/footer')
    <!--== End Footer Area Wrapper ==-->



    <!--== Start Aside Cart ==-->
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
/google api
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
