<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css"
        integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/4.24.0-lts/standard/skins/moono-lisa/editor.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! NoCaptcha::renderJs() !!}

</head>

<body class="text-center">
    <form class="form-signin">
        <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt=""
            width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>

        <input type="email" id="email" class="form-control" placeholder="Email address" required>
        <p id="message" class="text-left text-danger mt-1"></p>
        <input type="password" id="password" class="form-control mt-3" placeholder="Password" required>
        <input type="password" id="re_password" class="form-control mt-3" placeholder="Re-Password" required>
        <input type="date" id="dob" class="form-control mt-3" placeholder="Birthday" required>
        <input type="tel" id="phone" class="form-control mt-3" placeholder="Number phone" required>
        <input type="text" id="full_name" class="form-control mt-3 mb-3" placeholder="Full name" required>
        {!! NoCaptcha::display() !!}
        <button class="btn btn-lg btn-primary btn-block mt-4" type="submit" id="register">Sign up</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
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

        $(document).ready(function(e) {
            $("#email").blur(function() {

                var payload = {
                    'email': $("#email").val(),
                };
                $.ajax({
                    url: '/partner/check-email',
                    type: 'post',
                    data: payload,
                    success: function($res) {
                        if ($res.status) {
                            $("#message").html("Email này đã tồn tại");
                            $("#email").addClass("border border-danger");
                            $("#register").attr("disabled", true);
                        } else {
                            $("#message").html("");
                            $("#email").removeClass("border border-danger");
                            $("#register").removeAttr("disabled");
                        }
                    },
                    error: function($err) {
                        var listError = $err.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });

            $("#register").click(function(event) {
                event.preventDefault(); // Prevent the form from submitting the default way

                var email = $("#email").val();
                var password = $("#password").val();
                var re_password = $("#re_password").val();
                var dob = $("#dob").val();
                var phone = $("#phone").val();
                var full_name = $("#full_name").val();

                var register = {
                    'email': email,
                    'password': password,
                    're_password': re_password,
                    'dob': dob,
                    'phone': phone,
                    'full_name': full_name,
                    'g-recaptcha-response': $("#g-recaptcha-response").val(),
                };

                $.ajax({
                    url: '/partner/register',
                    type: 'post',
                    data: register,
                    success: function($res) {
                        if ($res.status) {
                            toastr.success("Đã thêm mới tài khoản thành công ");
                            // location.reload();
                        } else {
                            toastr.error("có lỗi hệ thống ");
                        }
                    },
                    error: function($err) {
                        var listError = $err.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });
        });
    </script>
</body>

</html>
