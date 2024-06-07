<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Vito - Responsive Bootstrap 4 Admin Dashboard Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets_partner/images/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets_partner/css/bootstrap.min.css">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="/assets_partner/css/typography.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="/assets_partner/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/assets_partner/css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css"
        integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/4.24.0-lts/standard/skins/moono-lisa/editor.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Sign in Start -->
    <section class="sign-in-page">
        <div class="container bg-white mt-5 p-0">
            <div class="row no-gutters">
                <div class="col-sm-6 align-self-center">
                    <div class="sign-in-from">
                        <h1 class="mb-0 dark-signin">Sign in</h1>
                        <p>Enter your email address and password to access admin panel.</p>
                        <form class="mt-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control mb-0" id="exampleInputEmail1"
                                    placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <a href="#" class="float-right">Forgot password?</a>
                                <input type="password" class="form-control mb-0" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="d-inline-block w-100">
                                <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Sign in</button>
                            </div>
                            <div class="sign-info">
                                <span class="dark-color d-inline-block line-height-2">Don't have an account? <a
                                        href="#">Sign up</a></span>
                                <ul class="iq-social-media">
                                    <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                    <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                                    <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 text-center">
                    <div class="sign-in-detail text-white">
                        <a class="sign-in-logo mb-5" href="#"><img src="/assets_partner/images/logo-white.png"
                                class="img-fluid" alt="logo"></a>
                        <div class="slick-slider11" data-autoplay="true" data-loop="true" data-nav="false"
                            data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1"
                            data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                            <div class="item">
                                <img src="/assets_partner/images/login/1.png" class="img-fluid mb-4" alt="logo">
                                <h4 class="mb-1 text-white">Manage your orders</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content.</p>
                            </div>
                            <div class="item">
                                <img src="/assets_partner/images/login/1.png" class="img-fluid mb-4" alt="logo">
                                <h4 class="mb-1 text-white">Manage your orders</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content.</p>
                            </div>
                            <div class="item">
                                <img src="/assets_partner/images/login/1.png" class="img-fluid mb-4" alt="logo">
                                <h4 class="mb-1 text-white">Manage your orders</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sign in END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/assets_partner/js/jquery.min.js"></script>
    <script src="/assets_partner/js/popper.min.js"></script>
    <script src="/assets_partner/js/bootstrap.min.js"></script>
    <!-- Appear JavaScript -->
    <script src="/assets_partner/js/jquery.appear.js"></script>
    <!-- Countdown JavaScript -->
    <script src="/assets_partner/js/countdown.min.js"></script>
    <!-- Counterup JavaScript -->
    <script src="/assets_partner/js/waypoints.min.js"></script>
    <script src="/assets_partner/js/jquery.counterup.min.js"></script>
    <!-- Wow JavaScript -->
    <script src="/assets_partner/js/wow.min.js"></script>
    <!-- Apexcharts JavaScript -->
    <script src="/assets_partner/js/apexcharts.js"></script>
    <!-- Slick JavaScript -->
    <script src="/assets_partner/js/slick.min.js"></script>
    <!-- Select2 JavaScript -->
    <script src="/assets_partner/js/select2.min.js"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="/assets_partner/js/owl.carousel.min.js"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="/assets_partner/js/jquery.magnific-popup.min.js"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="/assets_partner/js/smooth-scrollbar.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="/assets_partner/js/chart-custom.js"></script>
    <!-- Custom JavaScript -->
    <script src="/assets_partner/js/custom.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
        integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif

        // $(document).ready(function(e) {
        //     $("#login").click(function(event) {
        //         event.preventDefault(); // Prevent the form from submitting the default way
        //         console.log("Đã click được!!");
        //         var email = $("#email").val();
        //         var password = $("#password").val();

        //         var login = {
        //             'email': email,
        //             'password': password,

        //         };

        //         $.ajax({
        //             url: '/partner/login',
        //             type: 'post',
        //             data: login,
        //             success: function($res) {
        //                 if ($res.status == 1) {
        //                     toastr.warning("Tài khoản chưa xác minh");
        //                 } else if ($res.status == 2) {
        //                     toastr.success("Đăng nhập thành công");
        //                     location.href = "/partner"
        //                 } else {
        //                     toastr.error("Đăng nhập thất bại");
        //                 }
        //             },
        //             error: function($err) {
        //                 var listError = $err.responseJSON.errors;
        //                 $.each(listError, function(key, value) {
        //                     toastr.error(value[0]);
        //                 });
        //             },
        //         });
        //     });
        // });
    </script>
</body>

</html>
