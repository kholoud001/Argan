<!--== Start Header Wrapper ==-->
<header class="header-area sticky-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-5 col-sm-6 col-lg-3">
                <div class="header-logo">
                    <a href="{{route('home')}}">
                        <img class="logo-main" src="{{url('assets/images/logo.webp')}}" width="95" height="68" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div class="header-navigation">
                    <ul class="main-nav justify-content-start">
                        <li class="has-submenu"><a href="i{{route('home')}}">home</a>

                        </li>
                        <li><a href="about-us.html">about</a></li>
                        <li class="has-submenu position-static"><a href="product.html">shop</a>

                        </li>
                        <li class="has-submenu"><a href="blog.html">Blog</a>

                        </li>
                        <li class="has-submenu"><a href="account-login.html">Pages</a>
                            <ul class="submenu-nav">
                                <li><a href="account-login.html">My Account</a></li>
                                <li><a href="faq.html">Frequently Questions</a></li>
                                <li><a href="page-not-found.html">Page Not Found</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-7 col-sm-6 col-lg-3">
                <div class="header-action justify-content-end">
                    <!-- search -->
                    <button class="header-action-btn ms-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasSearch" aria-controls="AsideOffcanvasSearch">
                                <span class="icon">
                  <svg width="30" height="30" viewbox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect class="icon-rect" width="30" height="30" fill="url(#pattern1)"></rect>
                    <defs>
                      <pattern id="pattern1" patterncontentunits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_504:11" transform="scale(0.0333333)"></use>
                      </pattern>
                      <image id="image0_504:11" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABiUlEQVRIie2Wu04CQRSGP0G2EUtIbHwA8B3EQisLIcorEInx8hbEZ9DKy6toDI1oAgalNFpDoYWuxZzJjoTbmSXERP7kZDbZ859vdmb27MJcf0gBUAaugRbQk2gBV3IvmDa0BLwA4Zh4BorTACaAU6fwPXAI5IAliTxwBDScvJp4vWWhH0BlTLEEsC+5Fu6lkgNdV/gKDnxHCw2I9rSiNQNV8baBlMZYJtpTn71KAg9SY3dUYn9xezLPgG8P8BdwLteq5X7CzDbnAbXKS42WxtQVUzoGeFlqdEclxXrnhmhhkqR+8KuMqzHA1vumAddl3IwB3pLxVmOyr1NjwKQmURJ4lBp7GmOAafghpg1qdSDeDrCoNReJWmZB4dsAPsW7rYVa1Rx4FbOEw5TEPKmFvgMZX3DCgYeYNniMaQ5piTXghGhPLdTmZ33hYNpem98f/UHRwSxvhqhXx4anMA3/EmhiOlJPJnSBOb3uQcpOE65VhujPpAms/Bu4u+x3swRbeB24mTV4LgB+AFuLedkPkcmmAAAAAElFTkSuQmCC"></image>
                    </defs>
                  </svg>
                </span>
                    </button>
                    <!-- Cart -->
                    <button class="header-action-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasCart" aria-controls="AsideOffcanvasCart">
                                <span class="icon">
                  <svg width="30" height="30" viewbox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect class="icon-rect" width="30" height="30" fill="url(#pattern2)"></rect>
                    <defs>
                      <pattern id="pattern2" patterncontentunits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_504:9" transform="scale(0.0333333)"></use>
                      </pattern>
                      <image id="image0_504:9" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABFUlEQVRIie2VMU7DMBSGvwAqawaYuAmKxCW4A1I5Qg4AA93KBbp1ZUVUlQJSVVbCDVhgzcTQdLEVx7WDQ2xLRfzSvzzb+d6zn2MYrkugBBYevuWsHKiFn2JBMwH8Bq6Aw1jgBwHOYwGlPgT4LDZ4I8BJDNiEppl034UEJ8DMAJ0DByHBACPgUYEugePQUKkUWAmnsaB/Ry/YO9aXCwlT72AdrqaWEohwBWxSwc8ReIVtYIr5bM5pXqO+Men7rozGlkVSv4lJj1WQfsbvXVkNVNk1eEK4ik9/yuwzAPhLh5iuU4jtftMDR4ZJJXChxTJ2H3zXGDgWc43/X2Wro8G81a8u2fXU2nXiLVAxvNIKuPGW/r/2SltF+a3Rkw4pmwAAAABJRU5ErkJggg=="></image>
                    </defs>
                  </svg>
                </span>
                    </button>

                    <!--Account-->
                    <a id="account-link" class="header-action-btn" href="#">
                        <span class="icon">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect class="icon-rect" width="30" height="30" fill="url(#pattern3)"></rect>
                                <defs>
                                    <pattern id="pattern3" patterncontentunits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_504:10" transform="scale(0.0333333)"></use>
                                    </pattern>
                                    <image id="image0_504:10" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABEUlEQVRIie3UMUoDYRDF8Z8psqUpLBRrBS+gx7ATD6E5iSjeQQ/gJUzEwmChnZZaKZiQ0ljsLkhQM5/5Agr74DX7DfOfgZ1Hoz+qAl30Marcx2H1thCtY4DJN76parKqmAH9DM+6eTcArX2QE3yVAO7lBA8TwMNIw6UgeJI46My+rWCjUQL0LVIUBd8lgEO1UfBZAvg8oXamCuWNRu64nRNMmUo/wReSXLXayoDoKc9miMvqW/ZNG2VRNLla2MYudrCFTvX2intlnl/gGu/zDraGYzyLZ/UTjrD6G2AHpxgnAKc9xgmWo9BNPM4BnPYDNiLg24zQ2oNpyFdZvRKZLlGhnvvKPzXXti/Yy7hEo3+iD9EHtgdqxQnwAAAAAElFTkSuQmCC"></image>
                                </defs>
                            </svg>
                        </span>
                    </a>

                    <!--Mobile menu -->
                    <button class="header-menu-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<!--== End Header Wrapper ==-->
