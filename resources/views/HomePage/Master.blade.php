<!DOCTYPE html>
<html lang="en">

<head>
    @include('HomePage.Shared.head')
</head>

<body>
    <section class="listing-details-wrapper bgimage">

        @include('HomePage.Shared.menu')
        <!-- ends: .mainmenu-wrapper -->

        @yield('title')
        <!-- ends: .listing-info -->
    </section>
    <!-- ends: .card-details-wrapper -->
    <section class="directory_listiing_detail_area single_area section-bg section-padding-strict">
        @yield('content')
    </section>
    <!-- ends: .directory_listiing_detail_area -->

    @include('HomePage.Shared.bottom')
    <!-- ends: .footer -->

    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modal_label"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="login_modal_label">
                        <i class="la la-lock"></i> Sign In
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/" id="login-form">
                        <input type="text" class="form-control" placeholder="Username or Email" required />
                        <input type="password" class="form-control" placeholder="Password" required />
                        <div
                            class="keep_signed custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                            <input type="checkbox" class="custom-control-input" name="keep_signed_in" value="1"
                                id="keep_signed_in" />
                            <label for="keep_signed_in" class="not_empty custom-control-label">Keep me signed in</label>
                        </div>
                        <button type="submit" class="btn btn-block btn-lg btn-gradient btn-gradient-two">
                            Sign In
                        </button>
                    </form>

                    <div class="form-excerpts">
                        <ul class="list-unstyled">
                            <li>Not a member? <a href="">Sign up</a></li>
                            <li><a href="">Recover Password</a></li>
                        </ul>
                        <div class="social-login">
                            <span>Or connect with</span>
                            <p>
                                <a href="" class="btn btn-outline-secondary"><i class="fab fa-facebook-f"></i>
                                    Facebook</a><a href="" class="btn btn-outline-danger"><i
                                        class="fab fa-google-plus-g"></i> Google</a>
                            </p>
                        </div>
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
                        <i class="la la-lock"></i> Sign Up
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/" id="signup-form">
                        <input type="email" class="form-control" placeholder="Email" required />
                        <input type="password" class="form-control" placeholder="Password" required />
                        <button type="submit" class="btn btn-block btn-lg btn-gradient btn-gradient-two">
                            Sign Up
                        </button>
                    </form>

                    <div class="form-excerpts">
                        <ul class="list-unstyled">
                            <li>Already a member? <a href="">Sign In</a></li>
                            <li><a href="">Recover Password</a></li>
                        </ul>
                        <div class="social-login">
                            <span>Or Signup with</span>
                            <p>
                                <a href="" class="btn btn-outline-secondary"><i class="fab fa-facebook-f"></i>
                                    Facebook</a><a href="" class="btn btn-outline-danger"><i
                                        class="fab fa-google-plus-g"></i> Google</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('HomePage.Shared.foot')
    @yield('js')
</body>

</html>
