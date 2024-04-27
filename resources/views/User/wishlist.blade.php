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
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                </ol>
            </div>
        </nav>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Wishlist Area Wrapper ==-->
        <section class="section-space">
            <div class="container">
                <div class="shopping-wishlist-form table-responsive">
                    <table class="table text-center">
                        <thead>
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
                        <!-- Wishlist items  -->
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
        <!--== End Wishlist Area Wrapper ==-->

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
                            <img src="{{ asset('/') }}${item.product.image}"width="68" height="84" alt="${item.product.image}">
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
               // console.log('Image Source:', '{{ asset("storage/") }}' + item.product.image);

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
