<!DOCTYPE html>
<html class="no-js" lang="zxx">
@include('components/head')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{url('myJs/IsConected.js')}}"></script>
<body>

<!--== Wrapper Start ==-->
<div class="wrapper">

    <!--== Start Header Wrapper ==-->
    @include('components/navbar')
    <!--== End Header Wrapper ==-->


    <main class="main-content">

        <!--== Start Page Header Area Wrapper ==-->
        <nav aria-label="breadcrumb" class="breadcrumb-style1">
            <div class="container">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div>
        </nav>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Shopping Checkout Area Wrapper ==-->
        <section class="shopping-checkout-wrap section-space">
            <div class="container">
                <div class="checkout-page-coupon-wrap">
                    <!--== Start Checkout Coupon Accordion ==-->
                    <div class="coupon-accordion" id="CouponAccordion">
                        <div class="card">
                            <h3>
                                <i class="fa fa-info-circle"></i>
                                Have a Coupon?
                                <a href="#/" data-bs-toggle="collapse" data-bs-target="#couponaccordion">Click here to enter your code</a>
                            </h3>
                            <div id="couponaccordion" class="collapse" data-bs-parent="#CouponAccordion">
                                <div class="card-body">
                                    <div class="apply-coupon-wrap">
                                        <p>If you have a coupon code, please apply it below.</p>
                                        <form action="#" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" placeholder="Coupon code">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" class="btn-coupon">Apply coupon</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--== End Checkout Coupon Accordion ==-->
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <!--== Start Billing Accordion ==-->
                        <div class="checkout-billing-details-wrap">
                            <h2 class="title">Billing details</h2>
                            <div class="billing-form-wrap">
                                <form >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="f_name">First name <abbr class="required" title="required">*</abbr></label>
                                                <input id="f_name" type="text" class="form-control">
                                                <div id="f_name_error" class="text-danger"></div> <!-- Error message container -->

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="l_name">Last name <abbr class="required" title="required">*</abbr></label>
                                                <input id="l_name" type="text" class="form-control">
                                                <div id="l_name_error" class="text-danger"></div> <!-- Error message container -->

                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-4">
                                            <div class="form-group">
                                                <label for="country">City <abbr class="required" title="required">*</abbr></label>
                                                <select id="country" class="form-control wide">
                                                    <option>Casablanca</option>
                                                    <option>Rabat</option>
                                                    <option>Fes</option>
                                                    <option>Marrakech</option>
                                                    <option>Tangier</option>
                                                    <option>Agadir</option>
                                                    <option>Meknes</option>
                                                    <option>Oujda</option>
                                                    <option>Kenitra</option>
                                                    <option>Fez</option>
                                                </select>
                                                <div id="country_error" class="text-danger"></div> <!-- Error message container -->
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="street-address">Street address <abbr class="required" title="required">*</abbr></label>
                                                <input id="street-address" type="text" class="form-control" placeholder="House number and street name">
                                                <div id="street-address_error" class="text-danger"></div> <!-- Error message container -->

                                            </div>
                                            <div class="form-group">
                                                <label for="street-address2" class="visually-hidden">Street address 2 <abbr class="required" title="required">*</abbr></label>
                                                <input id="street-address2" type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pz-code">Postcode / ZIP (optional)</label>
                                                <input id="pz-code" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="phone">Phone (optional)</label>
                                                <input id="phone" type="text" class="form-control">
                                                <div id="phone_error" class="text-danger"></div> <!-- Error message container -->
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email">Email address <abbr class="required" title="required">*</abbr></label>
                                                <input id="email" type="text" class="form-control">
                                                <div id="email_error" class="text-danger"></div> <!-- Error message container -->
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-0">
                                                <label for="order-notes">Order notes (optional)</label>
                                                <textarea id="order-notes" class="form-control" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--== End Billing Accordion ==-->
                    </div>
                    <div class="col-lg-6">
                        <!--== Start Order Details Accordion ==-->
                        <div class="checkout-order-details-wrap">
                            <div class="order-details-table-wrap table-responsive">
                                <h2 class="title mb-25">Your order</h2>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Product</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-body">
                                    <tr class="cart-item">
                                        <td class="product-name">Satin gown <span class="product-quantity">× 1</span></td>
                                        <td class="product-total">£69.99</td>
                                    </tr>
                                    </tbody>
                                    <tfoot class="table-foot">
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td>£89.99</td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>Shipping</th>
                                        <td>Flat rate: £2.00</td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total </th>
                                        <td>£91.99</td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="shop-payment-method">
                                    <div id="PaymentMethodAccordion">
                                        <div class="card">
                                            <div class="card-header" id="check_payments3">
                                                <h5 class="title" data-bs-toggle="collapse" data-bs-target="#itemThree" aria-controls="itemTwo" aria-expanded="true">Cash on delivery</h5>
                                            </div>
                                            <div id="itemThree" class="collapse" aria-labelledby="check_payments3" data-bs-parent="#PaymentMethodAccordion">
                                                <div class="card-body">
                                                    <p>Pay with cash upon delivery.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="p-text">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#/">privacy policy.</a></p>
                                    <div class="agree-policy">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="privacy" class="custom-control-input visually-hidden">
                                            <label for="privacy" class="custom-control-label">I have read and agree to the website terms and conditions <span class="required">*</span></label>
                                        </div>
                                    </div>
                                    <a href="#" class="btn-place-order" onclick="placeOrder()">Place order</a>
                                </div>
                            </div>
                        </div>
                        <!--== End Order Details Accordion ==-->
                    </div>
                </div>
            </div>
        </section>
        <!--== End Shopping Checkout Area Wrapper ==-->

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
                //console.log('Image Source:', '{{ asset("storage/") }}' + item.product.image);

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


            const checkoutLink = document.querySelector('.btn-total[href="product-checkout.html"]');
            checkoutLink.href = "product-checkout.html";
        })
        .catch(error => {
            console.error('Error fetching cart items:', error);
        });
</script>


//order get checkout:
<script>
    var token = localStorage.getItem("access_token");

    axios.get('/api/cart/items', {
        headers: {
            'Authorization': 'Bearer ' + token
        }
    })
        .then(response => {
            const cartItems = response.data.cartItems;
            let subtotal = 0;
            const shippingCost = localStorage.getItem('shippingCost');
            console.log(shippingCost)


            // Calculate subtotal
            cartItems.forEach(item => {
                subtotal += item.quantity * item.product.price;
            });
            console.log('Subtotal:', subtotal);
            const total = (parseFloat(subtotal) + parseFloat(shippingCost)).toFixed(2);
            console.log(total)


            // Update cart items
            const tableBody = document.querySelector('.table-body');
            tableBody.innerHTML = '';

            cartItems.forEach(item => {
                const row = document.createElement('tr');
                row.classList.add('cart-item');



                const productNameCell = document.createElement('td');
                productNameCell.classList.add('product-name');
                productNameCell.textContent = item.product.name;

                const quantitySpan = document.createElement('span');
                quantitySpan.classList.add('product-quantity');
                quantitySpan.textContent = '× ' + item.quantity;

                productNameCell.appendChild(quantitySpan);

                const productTotalCell = document.createElement('td');
                productTotalCell.classList.add('product-total');
                productTotalCell.textContent =  (item.quantity * item.product.price).toFixed(2)+ ' Dhs '  ;

                row.appendChild(productNameCell);
                row.appendChild(productTotalCell);



                tableBody.appendChild(row);
            });

            // Update subtotal
            const subtotalElement = document.querySelector(' .cart-subtotal');
            if (subtotalElement) {
                subtotalElement.textContent = '=' + '\t '+ subtotal.toFixed(2) +' Dhs ';
            } else {
                console.error('Subtotal element not found.');
            }

            // Update shipping
            const shippingElement = document.querySelector(' .shipping ');
            shippingElement.textContent = 'Shipping:' + shippingCost +' Dhs ';

            // Update total
            const totalElement = document.querySelector('.order-total ');
            totalElement.textContent = 'Total:   ' + total +' Dhs ';

        })
        .catch(error => {
            console.error('Error fetching cart items:', error);
        });
</script>

//order post checkout:
<script>
    var token = localStorage.getItem("access_token");

    function placeOrder() {
        var formData = {
            f_name: document.getElementById('f_name').value,
            l_name: document.getElementById('l_name').value,
            country: document.getElementById('country').value,
            street_address: document.getElementById('street-address').value,
            street_address2: document.getElementById('street-address2').value,
            pz_code: document.getElementById('pz-code').value,
            phone: document.getElementById('phone').value,
            email: document.getElementById('email').value,
            order_notes: document.getElementById('order-notes').value
        };
        checkout(formData);
    }

    function checkout(formData) {
        axios.post('/api/checkout', formData, {
            headers: {
                'Authorization': 'Bearer ' + token
            }
        })
            .then(response => {
                console.log("Checkout successful");
                 window.location.href = '{{ route('account.view') }}';
            })
            .catch(error => {
                console.error("Checkout failed:", error.response.data.error);
                if (error.response.data.error) {
                    displayErrors(error.response.data.error);
                }
            });
    }

    function displayErrors(errors) {
        Object.keys(errors).forEach(field => {
            let errorMessage = errors[field];
            if (Array.isArray(errorMessage)) {
                errorMessage = errorMessage.join('<br>');
            }
            const errorContainer = document.getElementById(field + '_error');
            if (errorContainer) {
                errorContainer.innerHTML = errorMessage;
            }
        });
    }

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
