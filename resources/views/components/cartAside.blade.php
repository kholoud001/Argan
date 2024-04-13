<!-- Start Aside Cart -->
<aside class="aside-cart-wrapper offcanvas offcanvas-end" tabindex="-1" id="AsideOffcanvasCart" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h1 class="d-none" id="offcanvasRightLabel">Shopping Cart</h1>
        <button class="btn-aside-cart-close" data-bs-dismiss="offcanvas" aria-label="Close">Shopping Cart <i class="fa fa-chevron-right"></i></button>
    </div>
    <div class="offcanvas-body">
        <ul class="aside-cart-product-list">
            <!-- Cart items will be dynamically inserted here -->
        </ul>
        <p class="cart-total"><span>Subtotal:</span><span class="amount"></span></p>
        <a class="btn-total"  href="{{route('cart.view')}}">View cart</a>
        <a class="btn-total" href="{{route('get.checkout')}}">Checkout</a>
    </div>
</aside>
<!-- End Aside Cart -->

<!-- Template for cart item -->
<template id="cart-item-template">
    <li class="aside-product-list-item">
        <a href="" class="product-link">
            <img src="" alt="">
            <span class="product-title"></span>
        </a>
        <span class="product-price"></span>
    </li>
</template>
