
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
        <section class="page-header-area pt-10 pb-9" data-bg-color="#FFF3DA">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="page-header-st3-content text-center text-md-start">
                            <ol class="breadcrumb justify-content-center justify-content-md-start">
                                <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
                                <li class="breadcrumb-item active text-dark" aria-current="page">My Account</li>
                            </ol>
                            <h2 class="page-header-title">My Account</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start My Account Area Wrapper ==-->
        <section class="my-account-area section-space">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="my-account-tab-menu nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</button>

                            <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false">Orders</button>

                            <button class="nav-link" id="wishlists-tab" data-bs-toggle="tab" data-bs-target="#wishlists" type="button" role="tab" aria-controls="wishlists" aria-selected="false">Wishlist</button>

                            <button class="nav-link" id="account-info-tab" data-bs-toggle="tab" data-bs-target="#account-info" type="button" role="tab" aria-controls="account-info" aria-selected="false">Account Details</button>

{{--logout--}}
                            <button class="nav-link" id="logout-button" type="button">Logout</button>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content" id="nav-tabContent">

                            {{--                            dashboard--}}
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="myaccount-content">
                                    <h3>Dashboard</h3>
                                    <div class="welcome">
                                        <p id="userGreeting">Loading...</p>
                                    </div>
                                    <p>From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                </div>
                            </div>

                            {{--                            orders--}}
                            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="myaccount-content">
                                    <h3>Orders</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Aug 22, 2018</td>
                                                <td>Pending</td>
                                                <td>$3000</td>
                                                <td><a href="shop-cart.html" class="check-btn sqr-btn ">View</a></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            {{--wishlist--}}
                            <div class="tab-pane fade" id="wishlists" role="tabpanel" aria-labelledby="wishlists-tab">
                                <div class="myaccount-content">
                                    <h3>My Wishlist</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                            <tr>
                                                <th class="product-remove">&nbsp;</th>
                                                <th class="product-thumbnail">&nbsp;</th>
                                                <th class="product-name">Product name</th>
                                                <th class="product-price">Unit price</th>
                                                <th class="product-stock-status">Stock status</th>
                                                <th class="product-add-to-cart">&nbsp;</th>
                                            </tr>
                                            </thead>
                                            <tbody id="wishlistTableBody">
                                            <!-- Wishlist items will be dynamically added here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            {{-- account info--}}
                            <div class="tab-pane fade" id="account-info" role="tabpanel" aria-labelledby="account-info-tab">
                                <div class="myaccount-content">
                                    <h3>Account Details</h3>
                                    <div class="account-details-form">
                                        <form id="account-info-form" >
                                            <!-- Input field for profile picture -->
{{--                                            <div class="single-input-item">--}}
{{--                                                <label for="profile-picture">Profile Picture</label>--}}
{{--                                                <input type="file" id="profile-picture" name="profile-picture">--}}
{{--                                            </div>--}}

                                            <!-- Display the existing user information -->
                                            <div class="single-input-item">
                                                <label for="name" class="required">Name</label>
                                                <input type="text" id="name" name="name">
                                                <!-- Container for displaying the name validation error -->
                                                <div id="name-error" class="error-message"></div>
                                            </div>

                                            <div class="single-input-item">
                                                <label for="email" class="required">Email Address</label>
                                                <input type="email" id="email" name="email">
                                                <!-- Container for displaying the email validation error -->
                                                <div id="email-error" class="error-message"></div>
                                            </div>

                                            <fieldset>
                                                <legend>Password change</legend>
                                                <div class="single-input-item">
                                                    <label for="current-pwd" class="required">Current Password</label>
                                                    <input type="password" id="current-pwd" name="current-pwd">
                                                    <div id="current-pwd-error" class="error-message"></div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="new-pwd" class="required">New Password</label>
                                                            <input type="password" id="new-pwd" name="new-pwd">
                                                            <div id="new-pwd-error" class="error-message"></div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="confirm-pwd" class="required">Confirm Password</label>
                                                            <input type="password" id="confirm-pwd" name="new-pwd_confirmation">
                                                            <div id="new-pwd_confirmation-error" class="error-message"></div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <div class="single-input-item">
                                                <button class="check-btn sqr-btn">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End My Account Area Wrapper ==-->

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



//auth
{{--<script>--}}
{{--    document.addEventListener("DOMContentLoaded", function() {--}}
{{--        var token = localStorage.getItem("access_token");--}}

{{--        axios.get('/api/auth-check', {--}}
{{--            headers: {--}}
{{--                'Authorization': 'Bearer ' + token--}}
{{--            }--}}
{{--        })--}}
{{--            .then(function(response) {--}}
{{--                console.log('hna',response);--}}
{{--                if (response.data.authenticated) {--}}
{{--                    document.getElementById('account-link').setAttribute('href', '/account');--}}
{{--                } else {--}}
{{--                    document.getElementById('account-link').setAttribute('href', '/login');--}}
{{--                }--}}
{{--            })--}}
{{--            .catch(function(error) {--}}
{{--                window.location.href = '/login'; // Redirect to login page immediately--}}
{{--            });--}}
{{--    });--}}
{{--</script>--}}

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


            const checkoutLink = document.querySelector('.btn-total[href="product-checkout.html"]');
            checkoutLink.href = "product-checkout.html";
        })
        .catch(error => {
            console.error('Error fetching cart items:', error);
        });
</script>

//add to cart
<script>
    function addToCart(productId) {

        var token = localStorage.getItem("access_token");

        axios.post(`/api/product/${productId}/addToCart`, {
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

    ////////////////         wishlist management
    var token = localStorage.getItem("access_token");
    axios.get('/api/wishlist/items', {
        headers: {
            'Authorization': 'Bearer ' + token
        }
    })
        .then(response => {
            const wishlistItems = response.data;

            const tableBody = document.getElementById('wishlistTableBody');

            wishlistItems.forEach(item => {
                // Create a new table row
                const row = document.createElement('tr');
                row.classList.add('tbody-item');

                // Populate the row with item details
                row.innerHTML = `
                <td class="product-remove">
                    <a class="remove" href="javascript:void(0)" data-id="${item.id}">×</a>
                </td>
                <td class="product-thumbnail">
                    <div class="thumb">
                        <a href="{{ route('product.details', '') }}/${item.product.id}">
                            <img src="{{ asset('/') }}${item.product.image}"width="68" height="84" alt="${item.product.name}">
                        </a>
                    </div>
                </td>
                <td class="product-name">
                    <a class="title" href="{{ route('product.details', '') }}/${item.product.id}">${item.product.name}</a>
                </td>
                <td class="product-price">
                    <span class="price">${item.product.price}</span>
                </td>
                <td class="product-stock-status">
                    <span class="wishlist-in-stock">In Stock</span>
                </td>
                <td class="product-add-to-cart">
                    <a class="btn-shop-cart" href="javascript:void(0)" onclick="addToCart(${item.product.id})">Add to Cart</a>
                </td>
            `;

                tableBody.appendChild(row);
            });


            //remove item from wishlist
            const removeButtons = document.querySelectorAll('.product-remove a');
            removeButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const itemId = button.getAttribute('data-id');
                    console.log(itemId);
                    var token = localStorage.getItem("access_token");

                    axios.delete(`/api/wishlist/items/${itemId}`, {
                        headers: {
                            'Authorization': 'Bearer ' + token
                        }
                    })
                        .then(response => {
                            button.closest('.tbody-item').remove();
                        })
                        .catch(error => {
                            console.error('Error removing item from wishlist:', error);
                        });
                });
            });

        })
        .catch(error => {
            console.error('Error fetching wishlist items:', error);
        });

</script>

//dashboard
<script>
    var token = localStorage.getItem("access_token");

    document.addEventListener("DOMContentLoaded", function() {
        axios.get('/api/my-account',
        {
            headers: {
                'Authorization': 'Bearer ' + token
            }
        })
            .then(function(response) {
                const user = response.data.user;
                const welcomeMessage = document.getElementById('userGreeting');
                welcomeMessage.innerHTML = `Hello, <strong>${user.name}</strong>  `;
            })
            .catch(function(error) {
                console.error('Error fetching user information:', error);
            });
    });
</script>

//my orders
<script>
    var token = localStorage.getItem("access_token");

    document.addEventListener('DOMContentLoaded', function() {
        axios.get('/api/my-orders',
            {
                headers: {
                    'Authorization': 'Bearer ' + token
                }
            })
            .then(response => {
                const orders = response.data; // Assuming the API returns an array of orders

                const tableBody = document.querySelector('#orders tbody');

                // Clear any existing rows in the table body
                tableBody.innerHTML = '';

                orders.forEach(order => {
                    const row = `
            <tr>
              <td>${order.order_number}</td>
              <td>${order.created_at}</td>
              <td>${order.status}</td>
              <td>${order.price} Dhs</td>
              <td><a href="{{route('cart.view')}}" class="check-btn sqr-btn">View</a></td>
            </tr>
          `;
                    tableBody.innerHTML += row;
                });
            })
            .catch(error => {
                console.error('Error fetching orders:', error);
            });
    });
</script>


//Account
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const accountInfoForm = document.getElementById('account-info-form');

        function populateFormFields() {
            axios.get('/api/user-info', {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('access_token')
                }
            })
                .then(response => {
                    const userData = response.data;
                    // console.log(userData);
                    document.getElementById('name').value = userData.name;
                    document.getElementById('email').value = userData.email;
                })
                .catch(error => {
                    console.error(error.response.data);
                });
        }

        populateFormFields();



            accountInfoForm.addEventListener('submit', function (event) {
                event.preventDefault();

                // Create an object to hold form data
                const formData = {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    current_pwd: document.getElementById('current-pwd').value,
                    new_pwd: document.getElementById('new-pwd').value,
                    new_pwd_confirmation: document.getElementById('confirm-pwd').value
                };

                // Send form data to the server using Axios
                axios.put('/api/user-info/update', formData, {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('access_token')
                    }
                })
                    .then(response => {
                        console.log(response.data);
                    })
                    .catch(error => {
                        if (error.response.status === 422) {
                            const errors = error.response.data.errors;
                            for (let field in errors) {
                                const errorMessage = errors[field][0];
                                const errorField = document.getElementById(`${field}-error`);
                                if (errorField) {
                                    errorField.textContent = errorMessage;
                                    errorField.style.color = 'red';
                                }
                            }
                        } else {
                            console.error(error.response.data);
                            // Optionally, you can show an error message to the user
                        }
                    });
            });


});

</script>

//logout
<script>
    document.getElementById('logout-button').addEventListener('click', function () {
        axios.post('/api/logout', null, {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('access_token')
            }
        })
            .then(response => {
                //console.log(response);
                localStorage.clear();
                window.location.href = response.data.redirect_url;
            })
            .catch(error => {
                console.error('Logout failed:', error.response.data);
            });
    });
</script>



//toggling
<script>
    // Toggle dashboard tab
    document.getElementById('dashboard-tab').addEventListener('click', function () {
        document.getElementById('orders').classList.remove('show', 'active');
        document.getElementById('wishlists').classList.remove('show', 'active');
        document.getElementById('account-info').classList.remove('show', 'active');
        document.getElementById('dashboard').classList.add('show', 'active');
    });

    // Toggle orders tab
    document.getElementById('orders-tab').addEventListener('click', function () {
        document.getElementById('dashboard').classList.remove('show', 'active');
        document.getElementById('wishlists').classList.remove('show', 'active');
        document.getElementById('account-info').classList.remove('show', 'active');
        document.getElementById('orders').classList.add('show', 'active');
    });

    // Toggle wishlist tab
    document.getElementById('wishlists-tab').addEventListener('click', function () {
        document.getElementById('dashboard').classList.remove('show', 'active');
        document.getElementById('orders').classList.remove('show', 'active');
        document.getElementById('account-info').classList.remove('show', 'active');
        document.getElementById('wishlists').classList.add('show', 'active');
    });

    // Toggle account-info tab
    document.getElementById('account-info-tab').addEventListener('click', function () {
        document.getElementById('dashboard').classList.remove('show', 'active');
        document.getElementById('orders').classList.remove('show', 'active');
        document.getElementById('wishlists').classList.remove('show', 'active');
        document.getElementById('account-info').classList.add('show', 'active');
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
