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
        <nav aria-label="breadcrumb" class="breadcrumb-style1">
            <div class="container">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog Detail</li>
                </ol>
            </div>
        </nav>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Blog Detail Area Wrapper ==-->
        <section class="section-space pb-0">
            <div class="container">
                <div class="blog-detail">
                    <h3 class="blog-detail-title">{{ $blogDetails->title }}</h3>
                    <div class="blog-detail-category">
                        @foreach($blogDetails->categories as $category)
                            <a class="category" href="#">{{ $category->name }}</a>
                        @endforeach
                    </div>
                    <img class="blog-detail-img mb-7 mb-lg-10" src="{{ asset($blogDetails->picture) }}" width="1170" height="1012" alt="Image">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-7">
                                    <ul class="blog-detail-meta">
                                        <li>{{ $blogDetails->created_at->format('F d, Y') }}</li>
                                    </ul>
                                </div>
                                <div class="col-md-5">
                                    <div class="blog-detail-social">
                                        <span>Share:</span>
                                        <a href="https://www.pinterest.com/" target="_blank" rel="noopener"><i class="fa fa-pinterest-p"></i></a>
                                        <a href="https://twitter.com/" target="_blank" rel="noopener"><i class="fa fa-twitter"></i></a>
                                        <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="fa fa-facebook"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="desc mt-4 mt-lg-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae mauris, feugiat malesuada adipiscing est. Turpis at cras scelerisque cursus et enim. Tellus integer purus scelerisque convallis gravida volutpat elit. In purus amet, suspendisse et lorem. At in id et facilisi molestie interdum blandit elementum. Arcu lectus in ultrices mauris amet, volutpat arcu. Habitant ac vitae, quam egestas in sed. Dignissim odio nunc fermentum donec risus. Volutpat elementum aliquet nec ligula. Rhoncus sem condimentum egestas scelerisque. Ac commodo neque auctor porttitor enim, tristique mollis laoreet. Interdum tellus tortor senectus erat enim in. Penatibus odio sed in dui a id urna. Tellus odio adipiscing erat viverra tempor.</p>
                            <p class="desc mb-6 mb-lg-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida quis turpis feugiat sapien venenatis. Iaculis nunc nisl risus mattis elit id lobortis. Proin erat fermentum tempor elementum bibendum. Proin sed in nunc purus. Non duis eu pretium dictumst sed habitant sit vitae eget. Nisi sit lacus, fusce diam. Massa odio sit velit sed purus quis dolor.</p>
                        </div>
                    </div>
                    <img class="blog-detail-img" src="{{url('assets/images/blog/blog-detail2.webp')}}" width="1170" height="700" alt="Image">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <p class="desc mt-6 mt-lg-10">{{ $blogDetails->content }}</p>
                            <ul class="blog-detail-list">
                                <li>• Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                <li>• Massa odio sit velit sed purus quis dolor.</li>
                                <li>• Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                <li>• Proin sed in nunc purus. Non duis eu pretium dictumst</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <blockquote class="blog-detail-blockquote mt-6 mt-lg-10 mb-6 mb-lg-10">
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris semper purus, at venenatis scelerisque nibh. Nisl sit convallis accumsan integer lorem. Nibh nunc in nulla quis pulvinar dictum. Eget nisi, praesent proin viverra.</p>
                                <span class="user-name">BY Argan Beauty</span>
                                <img class="quote-icon" src="{{url('assets/images/icons/quote1.webp')}}" width="84" height="60" alt="Icon">
                            </blockquote>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <p class="desc mb-6 mb-lg-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida quis turpis feugiat sapien venenatis. Iaculis nunc nisl risus mattis elit id lobortis. Proin erat fermentum tempor elementum bibendum. Proin sed in nunc purus. Non duis eu pretium dictumst sed habitant sit vitae eget. Nisi sit lacus, fusce diam. Massa odio sit velit sed purus quis dolor.</p>
                            <img class="blog-detail-img" src="{{url('assets/images/blog/blog-detail3.webp')}}" width="1070" height="340" alt="Image">
                        </div>
                    </div>
                </div>

                <div class="section-space pb-0">
                    <!--== Start Product Category Item ==-->

                    <!--== End Product Category Item ==-->
                </div>

                <!-- Comments section -->
                <!--post-->
                <div class="blog-comment-form-wrap">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <h4 class="blog-comment-form-title">Comment</h4>
                            <div class="blog-comment-form-info">
                                <div class="blog-comment-form-social">
                                    <span>Share:</span>
                                    <a href="https://www.pinterest.com/" target="_blank" rel="noopener"><i class="fa fa-pinterest-p"></i></a>
                                    <a href="https://twitter.com/" target="_blank" rel="noopener"><i class="fa fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="fa fa-facebook"></i></a>
                                </div>
                                <select class="blog-comment-form-select">
                                    <option selected="">Short By Newest</option>
                                    <option value="1">Best</option>
                                    <option value="2">Newest</option>
                                    <option value="3">Oldest</option>
                                </select>
                            </div>
                            <div class="blog-comment-form">

                                {{--                                <div class="user-name">--}}
                                {{--                                    <!-- Replace "user_name_here" with the actual user's name -->--}}
                                {{--                                    <span>User Name</span>--}}
                                {{--                                </div>--}}
                                <textarea id="comment-content" class="blog-comment-control" placeholder="Type your comment"></textarea>
                                <button id="submit-comment" class="btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--get-->
                <div class="blog-comments-wrap">
                    <div class="row justify-content-center ">
                        <div class="col-lg-10">
                            <div id="comment-list"></div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
        <!--== End Blog Detail Area Wrapper ==-->

        <!--== Start Blog Area Wrapper ==-->
        <section class="section-space">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">Blog posts</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-n9">
                    @foreach ($posts as $post)
                        <div class="col-sm-6 col-lg-4 mb-8">
                            <!--== Start Blog Item ==-->
                            <div class="post-item">
                                <a href="{{route('blog.details',$post->id)}}" class="thumb">
                                    <img src="{{ asset( $post->picture) }}" width="370" height="320" alt="{{ $post->picture }}">
                                </a>
                                <div class="content">
                                    <a class="post-category" href="blog.html">{{ $post->category }}</a>
                                    <h4 class="title"><a href="{{route('blog.details',$post->id)}}">{{ $post->title }}</a></h4>
                                    <ul class="meta">
                                        <li class="author-info"><span>By:</span> </li>
                                        <li class="post-date">{{ $post->created_at->format('F d, Y') }}</li>
                                    </ul>
                                </div>
                            </div>
                            <!--== End Blog Item ==-->
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!--== End Blog Area Wrapper ==-->

        <!--== Start News Letter Area Wrapper ==-->
        <section class="section-space pt-0">
            <div class="container">
                <div class="newsletter-content-wrap" data-bg-img="assets/images/photos/bg1.webp">
                    <div class="newsletter-content">
                        <div class="section-title mb-0">
                            <h2 class="title">Join with us</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam.</p>
                        </div>
                    </div>
                    <div class="newsletter-form">
                        <form>
                            <input type="email" class="form-control" placeholder="enter your email">
                            <button class="btn-submit" type="submit"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--== End News Letter Area Wrapper ==-->

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
<!-- MY JS -->

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<!-- Get comments -->
<script>
    // Get comments
    document.addEventListener('DOMContentLoaded', function() {
        let currentUrl = window.location.href;
        let urlParts = currentUrl.split('/');
        let blogPostId = urlParts[urlParts.length - 1];

        const commentList = document.getElementById('comment-list');

        axios.get(`/api/comments/${blogPostId}`)
            .then(response => {
                const comments = response.data.comments;

                console.log('Comments:', comments);

                comments.forEach(comment => {
                    const commentItem = createCommentItem(comment);
                    const repliesContainer = document.createElement('div');
                    repliesContainer.classList.add('replies-container');
                    commentItem.appendChild(repliesContainer);
                    commentList.appendChild(commentItem);

                    // Fetch and append replies
                    axios.get(`/api/comments/${comment.id}/replies`)
                        .then(replyResponse => {
                            const replies = replyResponse.data.replies;
                            console.log('Replies for comment', comment.id, ':', replies);
                            replies.forEach(reply => {
                                const replyItem = createReplyItem(reply);
                                repliesContainer.appendChild(replyItem);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching replies for comment', comment.id, ':', error);
                        });
                });
            })
            .catch(error => {
                console.error('Error fetching comments:', error);
            });

        function createCommentItem(comment) {
            const commentItem = document.createElement('div');
            commentItem.classList.add('product-review-item', 'mb-3');
            commentItem.setAttribute('data-commentId', comment.id);

            const reviewTop = document.createElement('div');
            reviewTop.classList.add('product-review-top');
            commentItem.appendChild(reviewTop);

            const reviewContent = document.createElement('div');
            reviewContent.classList.add('product-review-content');
            reviewTop.appendChild(reviewContent);

            const userName = document.createElement('span');
            userName.classList.add('product-review-name');
            userName.textContent = comment.user.name;
            reviewContent.appendChild(userName);

            const createdAt = document.createElement('span');
            createdAt.classList.add('product-review-designation');
            createdAt.textContent = formatDate(comment.created_at);
            reviewContent.appendChild(createdAt);

            const desc = document.createElement('p');
            desc.classList.add('desc');
            desc.textContent = comment.content;
            commentItem.appendChild(desc);

            // Reply button
            // const replyButtonContainer = document.createElement('div');
            // replyButtonContainer.classList.add('reply-button-container');
            //
            // const replyButton = document.createElement('button');
            // replyButton.classList.add('btn', 'btn-primary', 'reply-button');
            // replyButton.textContent = 'Reply';
            // replyButtonContainer.appendChild(replyButton);
            // reviewTop.appendChild(replyButtonContainer);

            return commentItem;
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            const options = { day: 'numeric', month: 'short', year: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true };
            return date.toLocaleDateString('en-US', options);
        }
    });
</script>


{{--<!-- Reply to comments -->--}}
{{--<script>--}}
{{--    document.addEventListener('DOMContentLoaded', function() {--}}
{{--        let currentUrl = window.location.href;--}}
{{--        let urlParts = currentUrl.split('/');--}}
{{--        let blogPostId = urlParts[urlParts.length - 1];--}}

{{--        document.addEventListener('click', function(event) {--}}
{{--            if (event.target.classList.contains('reply-button')) {--}}
{{--                const commentItem = event.target.closest('.product-review-item');--}}
{{--                console.log(commentItem.dataset);--}}
{{--                const commentId = commentItem.dataset.commentid;--}}
{{--                console.log(commentId);--}}

{{--                const commentTextarea = document.createElement('textarea');--}}
{{--                commentTextarea.classList.add('form-control', 'mb-2', 'comment-reply-textarea');--}}
{{--                commentTextarea.placeholder = 'Write your reply here...';--}}

{{--                const submitButton = document.createElement('button');--}}
{{--                submitButton.classList.add('btn', 'btn-primary', 'submit-reply-button', 'mb-2');--}}
{{--                submitButton.textContent = 'Submit';--}}

{{--                const replyContainer = document.createElement('div');--}}
{{--                replyContainer.classList.add('comment-reply-container');--}}
{{--                replyContainer.appendChild(commentTextarea);--}}
{{--                replyContainer.appendChild(submitButton);--}}

{{--                // Append the reply container after the review top--}}
{{--                commentItem.appendChild(replyContainer);--}}

{{--                submitButton.addEventListener('click', () => {--}}
{{--                    const replyContent = commentTextarea.value;--}}
{{--                    axios.post(`/api/blog-posts/${blogPostId}/comments`, {--}}
{{--                        content: replyContent,--}}
{{--                        parent_comment_id: commentId,--}}
{{--                    },{--}}
{{--                            headers: {--}}
{{--                                'Authorization': 'Bearer ' + localStorage.getItem('access_token')--}}
{{--                            }--}}
{{--                    })--}}
{{--                        .then(response => {--}}
{{--                            console.log('Reply submitted successfully:', response.data.message);--}}
{{--                        })--}}
{{--                        .catch(error => {--}}
{{--                            if (error.response) {--}}
{{--                                // The request was made and the server responded with a status code--}}
{{--                                // that falls out of the range of 2xx--}}
{{--                                console.error('Error submitting reply:', error.response.data);--}}
{{--                                console.error('Status code:', error.response.status);--}}
{{--                            } else if (error.request) {--}}
{{--                                // The request was made but no response was received--}}
{{--                                console.error('Error submitting reply:', error.request);--}}
{{--                            } else {--}}
{{--                                // Something happened in setting up the request that triggered an Error--}}
{{--                                console.error('Error submitting reply:', error.message);--}}
{{--                            }--}}
{{--                        });--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}


{{--</script>--}}








//store comments
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentUrl = window.location.href;
        let urlParts = currentUrl.split('/');
        let blogPostId = urlParts[urlParts.length - 1];
        // console.log(blogPostId);

        const submitBtn = document.getElementById('submit-comment');

        submitBtn.addEventListener('click', function() {
            const content = document.getElementById('comment-content').value;

            axios.post(`/api/blog-posts/${blogPostId}/comments`, {
                content: content
            }, {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('access_token')
                }
            })
                .then(response => {
                    console.log('Comment added successfully: ', response.data);
                })
                .catch(error => {
                    console.error('Error adding comment:', error);
                    window.location.href = '{{ route('login') }}';

                });
        });
    });
</script>


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
