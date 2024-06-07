<!DOCTYPE html>
<html lang="en">

<head>
    @include('HomePage.Shared.head')
</head>

<body>
    <section class="listing-details-wrapper bgimage">
        @include('HomePage.Shared.menu')
        @yield('title')
    </section>

    <section class="directory_listiing_detail_area single_area section-bg section-padding-strict">
        @yield('content')
    </section>

    @include('HomePage.Shared.bottom')

    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modal_label"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="login_modal_label">
                        <ion-icon name="lock-closed-outline"></ion-icon></i> Sign In
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="login-form">
                        <input type="email" name="email" class="form-control" placeholder="Username or Email" />
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                        <button type="submit" class="btn btn-block btn-lg btn-gradient btn-gradient-two">
                            Sign In
                        </button>
                    </form>
                    <div class="form-excerpts">
                        <ul class="list-unstyled">
                            <li>Not a member? <a href="">Sign up</a></li>
                            <li><a href="">Recover Password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signup_modal" tabindex="-1" role="dialog" aria-labelledby="signup_modal_label"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signup_modal_label">
                        <ion-icon name="lock-closed-outline"></ion-icon></i> Sign Up
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="signup-form">
                        <input type="email" name="email" class="form-control" placeholder="Email" />
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                        <input type="password" name="re_password" class="form-control" placeholder="Re-Password" />
                        <input type="text" name="full_name" class="form-control" placeholder="Full name" />
                        <input type="text" name="so_dien_thoai" class="form-control" placeholder="Phone number" />
                        <button type="submit" class="btn btn-block btn-lg btn-gradient btn-gradient-two">
                            Sign Up
                        </button>
                    </form>
                    <div class="form-excerpts">
                        <ul class="list-unstyled">
                            <li>Already a member? <a href="">Sign In</a></li>
                            <li><a href="">Recover Password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('HomePage.Shared.foot')
    @yield('js')



    <script>
        $(document).ready(function() {

            $("#signup-form").submit(function(event) {
                event.preventDefault();

                const payload = window.getFormData($(this));

                axios.post('/register', payload)
                    .then((res) => {
                        if (res.data.data) {
                            toastr.success('Đã đăng ký tài khoản thành công');
                            location.reload();
                        }
                    })
                    .catch(function(res) {
                        displayErorr(res);
                    });
            });

            $("#login-form").submit(function(event) {
                event.preventDefault();

                const payload = window.getFormData($(this));

                axios.post('/login', payload)
                    .then((res) => {
                        if (res.data.status == 0) {
                            toastr.error('Tài khoản hoặc mật khẩu không đúng');
                        } else if (res.data.status == 1) {
                            toastr.warning('Bạn cần xác minh tài khoản');
                        } else {
                            toastr.success('Đăng nhập thành công');
                            location.reload();
                        }
                    })
                    .catch(function(res) {
                        displayErorr(res);
                    });
            });
        });
    </script>

</body>
</html>
