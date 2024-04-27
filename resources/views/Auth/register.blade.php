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
                        <!--== Start Register Area Wrapper ==-->
                        <div class="my-account-item-wrap">
                            <h3 class="title">Register</h3>
                            <div class="my-account-form">
                                <!--== Toast container ==-->
                                <div id="toast-container" class="toast-container"></div>
                                <form id="register-form">
                                    @csrf
                                    <div class="form-group mb-6">
                                        <label for="name">Username <sup>*</sup></label>
                                        <input type="name" id="name" name="name">
                                        <span id="name-error" class="text-danger"></span> <!-- Error message placeholder -->
                                    </div>
                                    <div class="form-group mb-6">
                                        <label for="email">Email Address <sup>*</sup></label>
                                        <input type="email" id="email" name="email">
                                        <span id="email-error" class="text-danger"></span> <!-- Error message placeholder -->
                                    </div>

                                    <div class="form-group mb-6">
                                        <label for="password">Password <sup>*</sup></label>
                                        <input type="password" id="password" name="password">
                                        <span id="password-error" class="text-danger"></span> <!-- Error message placeholder -->
                                    </div>
                                    <div class="form-group mb-6">
                                        <label for="password_confirmation">Confirm Password <sup>*</sup></label>
                                        <input type="password" id="password_confirmation" name="password_confirmation">
                                    </div>

                                    <div class="form-group">
                                        <p class="desc mb-4">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>
                                        <button type="submit" class="btn">Register</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!--== End Register Area Wrapper ==-->
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('register-form').addEventListener('submit', function(event) {
            event.preventDefault();

            // Clear previous errors
            document.getElementById('name-error').textContent = '';
            document.getElementById('email-error').textContent = '';
            document.getElementById('password-error').textContent = '';

            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var passwordConfirmation = document.getElementById('password_confirmation').value;

            // Form data
            var formData = {
                name: name,
                email: email,
                password: password,
                password_confirmation: passwordConfirmation
            };

            // Send registration request using Axios
            axios.post('/api/auth/register', formData)
                .then(response => {
                    var data = response.data;

                    if (data.errors) {
                        if (data.errors.name) {
                            document.getElementById('name-error').textContent = data.errors.name[0];
                        }
                        if (data.errors.email) {
                            document.getElementById('email-error').textContent = data.errors.email[0];
                        }
                        if (data.errors.password) {
                            document.getElementById('password-error').textContent = data.errors.password[0];
                        }
                        return;
                    }

                    showToast('Success! : ' + data.message, 'success');
                })
                .catch(error => {
                    console.error('Error:', error);

                    // Handle registration failure
                    showToast('Registration failed. Please check the form for errors.', 'error');
                });
        });

        function showToast(message, style) {
            var toastContainer = document.getElementById("toast-container");
            var toast = document.createElement('div');
            toast.textContent = message;
            toast.style.padding = '0.75rem';
            toast.style.marginBottom = '0.5rem';
            toast.style.borderRadius = '0.375rem';
            toast.style.border = style === 'success' ? '1px solid #34D399' : '1px solid #EF4444';
            toast.style.backgroundColor = style === 'success' ? '#ECFDF5' : '#FEE2E2';
            toast.style.color = style === 'success' ? '#059669' : '#DC2626';
            toastContainer.appendChild(toast);

            if (style === 'success') {
                setTimeout(() => {
                    toastContainer.removeChild(toast);
                    setTimeout(() => {
                        window.location.href = '{{ route("login") }}';
                    }, 1000);
                }, 5000);
            }
            else {
                setTimeout(() => {
                    toastContainer.removeChild(toast);
                }, 5000);
            }
        }
    });</script>



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
