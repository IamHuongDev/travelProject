@extends('HomePage.Master')

@section('title')
    <section class="header-breadcrumb bgimage overlay overlay--dark">
        <div class="bg_image_holder" style="background-image: url(&quot;img/breadcrumb1.jpg&quot;); opacity: 1;">
            <img src="img/breadcrumb1.jpg" alt="img/breadcrumb1.jpg">
        </div>
        @include('HomePage.Shared.menu')
        <!-- ends: .mainmenu-wrapper -->
        <div class="breadcrumb-wrapper content_above">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="page-title">All Listing</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb" style="background-color: unset; ">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">All Listings</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ends: .breadcrumb-wrapper -->
    </section>
@endsection

@section('content')
    <div class="container">
        @if(count($list) == 0)
        <div class="alert alert-danger" role="alert">
            <b>Không tìm thấy kết quả</b>
        </div>
        @else
        <div class="row">
            @foreach ($list as $key => $value)


                <div class="col-md-4">
                    <div class="atbd_single_listing ">
                        <article class="atbd_single_listing_wrapper">
                            <figure class="atbd_listing_thumbnail_area">
                                <div class="atbd_listing_image">
                                    <a href="/nha-hang-khach-san/detail/{{$value->slug . '-' . $value->id}}">
                                        <img src="{{ $value->banner }}" alt="listing image">
                                    </a>
                                </div><!-- ends: .atbd_listing_image -->

                                <div class="atbd_thumbnail_overlay_content">
                                    <ul class="atbd_upper_badge">
                                        <li><span class="atbd_badge atbd_badge_featured">Featured</span></li>
                                    </ul><!-- ends .atbd_upper_badge -->
                                </div><!-- ends: .atbd_thumbnail_overlay_content -->
                            </figure><!-- ends: .atbd_listing_thumbnail_area -->

                            <div class="atbd_listing_info">
                                <div class="atbd_content_upper">
                                    <h4 class="atbd_listing_title">
                                        <a href="/nha-hang-khach-san/detail/{{$value->slug . '-' . $value->id}}">{{ $value->name }}</a>
                                    </h4>

                                    <div class="atbd_listing_meta">
                                        <span class="atbd_meta atbd_listing_rating">{{ $value->rate / 2 }} <ion-icon
                                                name="star"></ion-icon> </span>

                                        <span class="atbd_meta atbd_listing_price">
                                            $ {{ $value->muc_gia / 2 }}
                                        </span>
                                        <span class="atbd_meta atbd_badge_open">Open Now</span>

                                    </div><!-- End atbd listing meta -->
                                    <div class="atbd_listing_data_list">
                                        <ul>
                                            <li>
                                                <p><span><ion-icon name="location-outline"></ion-icon></span>{{ $value->dia_chi }}</p>
                                            </li>
                                            <li>
                                                <p><span><ion-icon name="call-outline"></ion-icon></span>{{ $value->so_dien_thoai }}</p>
                                            </li>
                                            <li>
                                                <p><span class="la la-calendar-check-o"></span>{{ Carbon\Carbon::parse($value->created_at)->format('H:i d/m/Y') }}</p>
                                            </li>
                                        </ul>
                                    </div><!-- End atbd listing meta -->

                                </div><!-- end .atbd_content_upper -->

                                <div class="atbd_listing_bottom_content">
                                    <div class="atbd_content_left">
                                        <div class="atbd_listing_category">
                                            <a href=""><span><ion-icon
                                                        name="restaurant-outline"></ion-icon></span>{{$value->loai_danh_muc == 1 ? 'Nhà hàng' : 'Khách sạn'}}</a>

                                        </div>
                                    </div>
                                    <ul class="atbd_content_right">
                                        <li class="atbd_count"><span class="la la-eye"></span>{{rand(600, 4000)}}+</li>
                                        <li class="atbd_save">
                                            <span class="la la-heart-o"></span>
                                        </li>

                                    </ul>
                                </div><!-- end .atbd_listing_bottom_content -->
                            </div><!-- ends: .atbd_listing_info -->
                        </article><!-- atbd_single_listing_wrapper -->
                    </div>
                </div>

            @endforeach
            {{ $list->links() }}

        </div>
        @endif
    </div>
@endsection
