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
                                <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
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
                            <h3 class="title">Login</h3>

                            <div class="my-account-form">
                                <!-- Login with Gmail -->
                                <form action="{{route('google-auth')}}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary mb-3 d-flex align-items-center" style="width: calc(100% - 24px);">
                                        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Gmail Logo" class="logo me-2" style="height: 24px;"> Login with Gmail
                                    </button>
                                </form>

                                <!-- Login with Facebook -->
{{--                                <form action="{{route('facebook.redirect')}}" method="GET">--}}
{{--                                    @csrf--}}
{{--                                    <button type="submit" class="btn btn-primary mb-3 d-flex align-items-center" style="width: calc(100% - 24px);">--}}
{{--                                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook Logo" class="logo me-2" style="height: 24px;"> Login with Facebook--}}
{{--                                    </button>--}}
{{--                                </form>--}}
                                <form  id="login-form">
                                    @csrf
                                    <div class="form-group mb-6">
                                        <label for="email">Email Address <sup>*</sup></label>
                                        <input type="email" id="email" name="email" class="form-control">
                                        <span id="email-error" class="text-danger"></span> <!-- Error message placeholder -->
                                    </div>

                                    <div class="form-group mb-6">
                                        <label for="password">Password <sup>*</sup></label>
                                        <input type="password" id="password" name="password" class="form-control">
                                        <span id="password-error" class="text-danger"></span> <!-- Error message placeholder -->
                                    </div>

                                    <div class="form-group d-flex align-items-center mb-14">
                                        <button type="submit" class="btn">Login</button>

                                        <div class="form-check ms-3">
                                            <input type="checkbox" class="form-check-input" id="remember_pwsd">
                                            <label class="form-check-label" for="remember_pwsd">Remember Me</label>
                                        </div>
                                    </div>
                                    <a class="lost-password" href="{{ route('password.email') }}">Lost your Password?</a>
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

    <!--== Start Footer Area Wrapper ==-->
    @include('components/footer')
    <!--== End Footer Area Wrapper ==-->

    <!--== Start Aside Menu ==-->
    @include('components/offcanvasMenu')
    <!--== End Aside Menu ==-->

</div>
<!--== Wrapper End ==-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('login-form').addEventListener('submit', function(event) {
            event.preventDefault();

            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            // Clear previous errors
            document.getElementById('email-error').textContent = '';
            document.getElementById('password-error').textContent = '';

            if (!email) {
                document.getElementById('email-error').textContent = 'Email is required.';
                return;
            }

            if (!password) {
                document.getElementById('password-error').textContent = 'Password is required.';
                return;
            }

            // Form data
            var formData = {
                email: email,
                password: password,
                role: 1
            };

            axios.post('/api/auth/login', formData)
                .then(response => {
                    var data = response.data;
                    //console.log(data);

                    if (data.errors && (data.errors.email || data.errors.password)) {
                        document.getElementById('email-error').textContent = data.errors.email ? data.errors.email[0] : '';
                        document.getElementById('password-error').textContent = data.errors.password ? data.errors.password[0] : '';
                        return;
                    }

                    localStorage.setItem('access_token', data.token);


                    if (data.message === 'Login successful') {
                        var redirectUrl = data.role === 1 ? data.redirect_url_admin : data.redirect_url_user;

                        //redirectUrl += '?role=' + data.role;
                        window.location.href = redirectUrl;

                    } else {
                        document.getElementById('password-error').textContent = data.message;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
</script>


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
