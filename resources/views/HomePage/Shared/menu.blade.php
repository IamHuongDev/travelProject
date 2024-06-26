<div class="mainmenu-wrapper">
    <div class="menu-area menu1 menu--light">
        <div class="top-menu-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-fullwidth">
                            <div class="logo-wrapper order-lg-0 order-sm-1">
                                <div class="logo logo-top">
                                    <a href="/"><img src="https://demo.jsnorm.com/html/direo/img/logo-white.png"
                                            alt="logo image" class="img-fluid" /></a>
                                </div>
                            </div>
                            <!-- ends: .logo-wrapper -->

                            <div class="menu-container order-lg-1 order-sm-0">
                                <div class="d_menu">
                                    <nav class="navbar navbar-expand-lg mainmenu__menu">
                                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                            data-target="#direo-navbar-collapse" aria-controls="direo-navbar-collapse"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon icon-menu"><i
                                                    class="la la-reorder"></i></span>
                                        </button>
                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse" id="direo-navbar-collapse">
                                            <ul class="navbar-nav">
                                                <li>
                                                    <a href="/">Home</a>
                                                </li>
                                                <li>
                                                    <a href="/nha-hang/list">Nhà hàng</a>
                                                </li>
                                                <li>
                                                    <a href="/khach-san/list">Khách sạn</a>
                                                </li>

                                            </ul>
                                        </div>
                                        <!-- /.navbar-collapse -->
                                    </nav>
                                </div>
                            </div>

                            <div class="menu-right order-lg-2 order-sm-2">
                                <div class="search-wrapper">
                                    <div class="nav_right_module search_module">
                                        <span class="icon-left" id="basic-addon9"><ion-icon
                                                name="search-outline"></ion-icon></span>
                                        <div class="search_area">
                                            <form action="/search">
                                                <div class="input-group input-group-light">
                                                    <input name="keyword" type="text"
                                                        class="form-control search_field top-search-field"
                                                        placeholder="What are you looking for?" autocomplete="off" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="search-categories">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href=""><span class="bg-danger"><ion-icon name="wine-outline"></ion-icon></span>
                                                    Food & Drinks</a>
                                            </li>
                                            <li>
                                                <a href="/nha-hang/list"><span class="bg-primary"><ion-icon name="restaurant-outline"></ion-icon></span>
                                                    Restaurants</a>
                                            </li>
                                            <li>
                                                <a href=""><span class="bg-success"><ion-icon name="location-outline"></ion-icon></span>
                                                    Places</a>
                                            </li>
                                            <li>
                                                <a href=""><span class=" bg-warning"><ion-icon name="cart-outline"></ion-icon></span>
                                                    Shopping & Store</a>
                                            </li>
                                            <li>
                                                <a href="/khack-san/list"><span class="bg-info"><ion-icon name="bed-outline"></ion-icon></span>
                                                    Hotels</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <!-- ends: .search-wrapper -->
                                <!-- start .author-area -->
                                <div class="author-area">
                                    <div class="author__access_area">
                                        <ul class="d-flex list-unstyled align-items-center">
                                            {{-- <li>
                                                <a href="add-listing.html"
                                                    class="btn btn-xs btn-gradient btn-gradient-two">
                                                    <span><ion-icon name="add-outline"></ion-icon></span> Add Listing
                                                </a>
                                            </li> --}}
                                            <li>
                                                @if (Auth::guard('customer')->user())
                                                    <a href="/logout" class="access-link">Logout</a>
                                                @else
                                                    <a href="#" class="access-link" data-toggle="modal"
                                                        data-target="#login_modal">Login</a>
                                                    <span>or</span>
                                                    <a href="#" class="access-link" data-toggle="modal"
                                                        data-target="#signup_modal">Register</a>
                                                @endif

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end .author-area -->

                                <div class="offcanvas-menu d-none">
                                    <a href="" class="offcanvas-menu__user"><i class="la la-user"></i></a>
                                    <div class="offcanvas-menu__contents">
                                        <a href="" class="offcanvas-menu__close"><i
                                                class="la la-times-circle"></i></a>
                                        <div class="author-avatar">
                                            <img src="img/author-avatar.png" alt="" class="rounded-circle" />
                                        </div>
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="dashboard-listings.html">My Profile</a>
                                            </li>
                                            <li>
                                                <a href="dashboard-listings.html">My Listing</a>
                                            </li>
                                            <li>
                                                <a href="dashboard-listings.html">Favorite Listing</a>
                                            </li>
                                            <li><a href="add-listing.html">Add Listing</a></li>
                                            <li><a href="">Logout</a></li>
                                        </ul>
                                        <div class="search_area">
                                            <form action="/">
                                                <div class="input-group input-group-light">
                                                    <input type="text" class="form-control search_field"
                                                        placeholder="Search here..." autocomplete="off" />
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-secondary">
                                                    Search
                                                </button>
                                            </form>
                                        </div>
                                        <!-- ends: .search_area -->
                                    </div>
                                    <!-- ends: .author-info -->
                                </div>
                                <!-- ends: .offcanvas-menu -->
                            </div>
                            <!-- ends: .menu-right -->
                        </div>
                    </div>
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end  -->
    </div>
</div>
