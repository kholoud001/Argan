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
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </div>
        </nav>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Product Area Wrapper ==-->
        <section class="section-space">
            <div class="container">
                <div class="shopping-cart-form table-responsive">
                    <!-- Table of  products in cart -->
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="coupon-wrap">
                            <h4 class="title">Coupon</h4>
                            <p class="desc">Enter your coupon code if you have one.</p>
                            <input type="text" class="form-control" placeholder="Coupon code">
                            <button type="button" class="btn-coupon">Apply coupon</button>
                        </div>
                    </div>
{{--                    Checkout--}}
                    <div class="col-12 col-lg-6">
                        <div class="cart-totals-wrap">
                            <h2 class="title">Cart totals</h2>
                            <table>
                                <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td>
                                        <span class="amount"></span>
                                    </td>
                                </tr>
                                <tr class="shipping-totals">
                                    <th>Shipping</th>
                                    <td>
                                        <ul class="shipping-list">
                                            <li class="radio">
                                                <input type="radio" name="shipping" id="radio2" checked="">
                                                <label for="radio2">Free shipping (Morocco)</label>
                                            </li>
                                            <li class="radio">
                                                <input type="radio" name="shipping" id="radio3">
                                                <label for="radio3">Paid shipping (Abroad)</label>
                                            </li>
                                        </ul>

                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td>
                                        <span class="amount"></span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="text-end">
                                <a href="{{route('get.checkout')}}" class="checkout-button">Proceed to checkout</a>
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


//display cart items page
<script>
    var token = localStorage.getItem("access_token");

    axios.get('/api/cart/items', {
        headers: {
            'Authorization': 'Bearer ' + token
        }
    })
        .then(response => {
            const cartItems = response.data.cartItems;
            //console.log(cartItems);
            let totalPrice = response.data.totalPrice.toFixed(2);
            let subtotal = parseFloat(totalPrice);

            // Update cart items
            const tableBody = document.querySelector('.table tbody');

            cartItems.forEach(item => {
                const row = document.createElement('tr');
                row.classList.add('tbody-item');

                row.innerHTML = `
                <td class="product-remove">
                        <a class="remove" href="javascript:void(0)" data-id="${item.id}">×</a>
                </td>
                <td class="product-thumbnail">
                    <div class="thumb">
                        <a href="{{ route('product.details', '') }}/${item.product.id}">
                            <img src="{{ asset('/') }}${item.product.image}" width="68" height="84" alt="${item.product.name}">
                        </a>
                    </div>
                </td>
                <td class="product-name">
                    <a class="title" href="{{ route('product.details', '') }}/${item.product.id}">${item.product.name}</a>
                </td>
                <td class="product-price">
                    <span class="price">${item.product.price}</span>
                </td>
                <td class="product-quantity">
                    <div class="pro-qty">
                        <input type="text" class="quantity" title="Quantity" value="${item.quantity}">
                    </div>
                </td>
                <td class="product-subtotal">
                    <span class="price">${(item.product.price * item.quantity).toFixed(2)}</span>
                </td>
            `;

                tableBody.appendChild(row);
            });

            //Sub total
            const subtotalElement = document.querySelector('.cart-subtotal .amount');
            subtotalElement.textContent = `${totalPrice} Dhs`;

            // Paid shipping logic
            const shippingCheckbox = document.getElementById('radio3');
            shippingCheckbox.addEventListener('change', function () {
                let totalAmount = document.querySelector('.order-total .amount');
                console.log("changed");
                if (shippingCheckbox.checked) {
                    var shippingCost = 10;
                    localStorage.setItem('shippingCost', shippingCost);
                    subtotal += 10;
                } else {
                    var shippingCost1 = 0;
                    localStorage.setItem('shippingCost', shippingCost1);
                    subtotal += 0;
                }

                // Update total price
                totalPrice = subtotal.toFixed(2);
                totalAmount.textContent = `${totalPrice} Dhs`;
            });


            // Remove item logic
            const removeButtons = document.querySelectorAll('.product-remove a');
            removeButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    const itemId = button.getAttribute('data-id');
                    var token = localStorage.getItem("access_token");

                    axios.delete(`/api/cart/items/${itemId}`, {
                        headers: {
                            'Authorization': 'Bearer ' + token
                        }
                    })
                        .then(response => {
                            const removedRow = button.closest('tr');
                            const subtotalElement = document.querySelector('.cart-subtotal .amount');
                            const totalAmountElement = document.querySelector('.order-total .amount');

                            removedRow.remove();

                            // Recalculate subtotal and total
                            let subtotal = parseFloat(subtotalElement.textContent.replace(' Dhs', ''));
                            const itemSubtotal = parseFloat(removedRow.querySelector('.product-subtotal .price').textContent);
                            subtotal -= itemSubtotal;
                            subtotalElement.textContent = subtotal.toFixed(2) + ' Dhs';

                            // Update total amount if needed
                            const shippingCheckbox = document.getElementById('radio3');
                            if (shippingCheckbox.checked) {
                                subtotal += 10;
                            }
                            totalAmountElement.textContent = (subtotal + 0).toFixed(2) + ' Dhs';
                        })
                        .catch(error => {
                            console.error('Error removing item:', error);
                        });
                });
            });


            // Get all quantity input fields
            const quantityInputs = document.querySelectorAll('.pro-qty input[type="text"]');

            // Attach event listeners to each input field
            quantityInputs.forEach(input => {
                // Add event listener for when the input value changes
                input.addEventListener('change', function(event) {
                    // Get the new quantity value
                    const newQuantity = parseInt(event.target.value);
                    console.log(newQuantity);

                    // Ensure the quantity is a positive integer
                    if (newQuantity > 0 && Number.isInteger(newQuantity)) {
                        // Find the closest parent element with the class .tbody-item
                        const tbodyItem = input.closest('.tbody-item');
                        console.log(tbodyItem);

                        if (tbodyItem) {
                            // Get the corresponding cart item ID from the data-item-id attribute
                            const itemId = tbodyItem.querySelector('.remove').getAttribute('data-id');
                            console.log('Item ID:', itemId);

                            updateCartItemQuantity(itemId, newQuantity);
                        } else {
                            console.error('Error: Parent element with class .tbody-item not found.');
                        }
                    } else {
                        // Revert the input value to the previous quantity if invalid input is entered
                        input.value = parseInt(input.value);
                    }
                });
            });


            // Function to send a request to update the quantity via AJAX
            function updateCartItemQuantity(itemId, newQuantity) {
                // Send a PATCH request to the API endpoint to update the quantity
                axios.patch(`/api/cart/items/${itemId}`, {
                    quantity: newQuantity
                }, {
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                })
                    .then(response => {

                    })
                    .catch(error => {
                        // Handle any errors if the request fails
                        console.error('Error updating quantity:', error);
                    });
            }






            //View cart
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
