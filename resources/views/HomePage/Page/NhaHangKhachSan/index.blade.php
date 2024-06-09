@extends('HomePage.Master')

@section('title')
<section class="listing-details-wrapper bgimage">
    @include('HomePage.Shared.menu')

<div class="bg_image_holder">
    <img src="{{ $data->banner }}" alt="" />
</div>
<div class="listing-info content_above">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <ul class="list-unstyled listing-info--badges">
                    <li>
                        <span class="atbd_badge atbd_badge_featured">Featured</span>
                    </li>
                    <li>
                        <span class="atbd_badge atbd_badge_popular">Popular</span>
                    </li>
                </ul>
                <ul class="list-unstyled listing-info--meta">
                    <li>
                        <span class="atbd_meta atbd_listing_average_pricing" data-toggle="tooltip" data-placement="top"
                            title="" data-original-title="Average">
                            @php
                                $i = $data->muc_gia % 2 == 0 ? 0 : 1;
                            @endphp
                            @for ($i; $i < $data->muc_gia / 2; $i++)
                                <span class="atbd_active"><img src="/assets_homePages/img/svg/dollar.svg" class="svg"
                                        alt="" /></span>
                            @endfor
                            @for ($i = 0; $i < $data->muc_gia % 2; $i++)
                                <span><img src="/assets_homePages/img/svg/dollar.svg" class="svg"
                                        alt="" /></span>
                            @endfor
                        </span>
                    </li>
                    <li>
                        <div class="average-ratings">
                            <span class="atbd_meta atbd_listing_rating ">{{ number_format($data->rate / 2, 1) }}<ion-icon name="star-outline"></ion-icon></span>
                            <span><strong>26</strong> Reviews</span>
                        </div>
                    </li>
                    <li>
                        @php
                            $arr = ['', 'Nhà Hàng', 'Khách sạn'];
                            $icon = ['', 'restaurant-outline', 'bed-outline'];
                        @endphp
                        <div class="atbd_listing_category">
                            <a href=""><span><ion-icon
                                        name="{{ $icon[$data->danhMuc->loai_danh_muc] }}"></ion-icon></span>{{ $arr[$data->danhMuc->loai_danh_muc] }}</a>
                        </div>
                    </li>
                </ul>
                <!-- ends: .listing-info-meta -->

                <h1>{{ $data->name }}</h1>
                <p class="subtitle">{{ $data->mo_ta_ngan }}</p>
            </div>
            <div class="col-lg-4 col-md-5 d-flex align-items-end justify-content-start justify-content-md-end">
                <div class="atbd_listing_action_area">
                    <div class="atbd_action atbd_save">
                        <div class="action_button">
                            <a href="" class="atbdp-favourites"><span class="la la-heart-o"></span> Save</a>
                        </div>
                    </div>
                    <div class="atbd_action atbd_share dropdown">
                        <span id="social-links" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false" role="menu">
                            <span><ion-icon name="share-social-outline"></ion-icon></span><a href="{{ $data->facebook }}" target="_blank" style="color: white;">Share</a>
                        </span>

                        <!-- Ends social share -->
                    </div>
                    <!-- Report Abuse-->
                    <div class="atbd_action atbd_report">
                        <div class="action_button">
                            <a href="" data-toggle="modal" data-target="#atbdp-report-abuse-modal"><span
                                    class="la la-flag-o"></span> Report</a>
                        </div>
                        <!-- Modal (report abuse form) -->
                    </div>
                </div>
                <!-- ends: .atbd_listing_action_area -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="atbdp-report-abuse-modal" tabindex="-1" role="dialog" aria-hidden="true"
        aria-labelledby="atbdp-report-abuse-modal-label">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/" id="atbdp-report-abuse-form" class="form-vertical">
                    <div class="modal-header">
                        <h3 class="modal-title" id="atbdp-report-abuse-modal-label">
                            Report Abuse
                        </h3>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="atbdp-report-abuse-message" class="not_empty">Your Complaint<span
                                    class="atbdp-star">*</span></label>
                            <textarea class="form-control" id="atbdp-report-abuse-message" rows="4" placeholder="Message..." required=""></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-secondary btn-sm">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="moda_claim_listing" tabindex="-1" role="dialog" aria-labelledby="claim_listing_label"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="claim_listing_label">
                        <i class="la la-check-square"></i> Claim This Listing
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" placeholder="Your Name" class="form-control" required />
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Email Address"
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Phone Number" required />
                                </div>
                                <div class="col-md-6">
                                    <input type="url" class="form-control" placeholder="Listing URL" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <textarea class="form-control" rows="6" placeholder="Provie Listing Information" required></textarea>
                                    <button type="submit" class="btn btn-secondary">
                                        Submit Query
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="atbd_content_module atbd_listing_details">
                    <div class="atbd_content_module__tittle_area">
                        <div class="atbd_area_title">
                            <h4>
                                <span class="la la-file-text-o"></span>Mô tả chi tiết
                            </h4>
                        </div>
                    </div>
                    <div class="atbdb_content_module_contents">
                        <p>
                            {!! $data->mo_ta_chi_tiet !!}
                        </p>
                    </div>
                </div>
                <!-- ends: .atbd_content_module -->

                <div class="atbd_content_module atbd_listing_gallery">
                    <div class="atbd_content_module__tittle_area">
                        <div class="atbd_area_title">
                            <h4><span class="la la-image"></span>Gallery</h4>
                        </div>
                    </div>
                    <div class="atbdb_content_module_contents">
                        <div class="gallery-wrapper">
                            <div class="gallery-images">
                                @php
                                    $danhSachHinh = explode(',', $data->danh_sach_hinh_anh);
                                @endphp
                                @foreach ($danhSachHinh as $image)
                                    <div class="single-image" style="max-height: 500px;">
                                        <img src="{{ $image }}" alt="" />
                                    </div>
                                @endforeach
                            </div>
                            <!-- ends: .gallery-images -->
                            <div class="gallery-thumbs">
                                @foreach ($danhSachHinh as $image)
                                    <div class="single-thumb">
                                        <img src="{{ $image }}" alt="" />
                                    </div>
                                @endforeach
                            </div>

                            <!-- ends: .gallery-thumbs -->
                        </div>
                        <!-- ends: .gallery-wrapper -->
                    </div>
                </div>
                <!-- ends: .atbd_content_module -->

                <div class="atbd_content_module atbd_listing_features">
                    <div class="atbd_content_module__tittle_area">
                        <div class="atbd_area_title">
                            <h4><span class="la la-list-alt"></span>Thuộc tính</h4>
                        </div>
                    </div>
                    <div class="atbdb_content_module_contents">
                        {!! $data->thuoc_tinh !!}
                    </div>
                </div>
                <!-- ends: .atbd_content_module -->

                <div class="atbd_content_module atbd_custom_fields_contents">
                    <div class="atbd_content_module__tittle_area">
                        <div class="atbd_area_title">
                            <h4><span class="la la-youtube-play"></span>Video</h4>
                        </div>
                    </div>
                    <div class="atbdb_content_module_contents">
                        <div class="video-wrapper">
                            <iframe width="100%" height="315" src="{{ $data->video }}"></iframe>
                            {{-- <figure>
                                <img src="https://demo.jsnorm.com/html/direo/img/video.jpg" alt="" />
                                <figcaption>
                                    <a href="{{$data->video}}" class="video-iframe play-btn">
                                        <span class="la la-youtube-play"></span>
                                    </a>
                                </figcaption>
                            </figure> --}}
                        </div>
                    </div>
                </div>
                <!-- ends: .atbd_content_module -->

                <div class="atbd_content_module atbd_contact_information_module">
                    <div class="atbd_content_module__tittle_area">
                        <div class="atbd_area_title">
                            <h4>
                                <span><ion-icon name="headset"></ion-icon></span>Contact Information
                            </h4>
                        </div>
                    </div>
                    <div class="atbdb_content_module_contents">
                        <div class="atbd_contact_info">
                            <ul>
                                <li>
                                    <div class="atbd_info_title">
                                        <span><ion-icon name="location-outline"></ion-icon></span>Address:
                                    </div>
                                    <div class="atbd_info">{{ $data->dia_chi }}</div>
                                </li>
                                <li>
                                    <div class="atbd_info_title">
                                        <span><ion-icon name="call-outline"></ion-icon></span>Phone Number:
                                    </div>
                                    <div class="atbd_info">{{ $data->so_dien_thoai }}</div>
                                </li>
                                <li>
                                    <div class="atbd_info_title">
                                        <span ><ion-icon name="mail-outline"></ion-icon></span>Email:
                                    </div>
                                    <span class="atbd_info">{{ $data->email }}</span>
                                </li>
                                <li>
                                    <div class="atbd_info_title">
                                        <span><ion-icon name="earth-outline"></ion-icon></span>Website:
                                    </div>
                                    <a href="" class="atbd_info">{{ $data->website }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="atbd_director_social_wrap">
                            <a target="_blank" href=""><span class="fab fa-behance"></span></a>
                            <a target="_blank" href=""><span class="fab fa-facebook-f"></span></a>
                            <a target="_blank" href=""><span class="fab fa-twitter"></span></a>
                            <a target="_blank" href=""><span class="fab fa-youtube"></span></a>
                        </div>
                    </div>
                </div>
                <!-- ends: .atbd_content_module -->

                <div class="atbd_content_module atbd_faqs_module">
                    <div class="atbd_content_module__tittle_area">
                        <div class="atbd_area_title">
                            <h4>
                                <span><ion-icon name="help-circle-outline"></ion-icon></span>Lisiitng FAQ's
                            </h4>
                        </div>
                    </div>
                    <div class="atbdb_content_module_contents">
                        <div class="atbdp-accordion">
                            <div class="accordion-single selected">
                                <h3 class="faq-title">
                                    <a href="#">Question number one</a>
                                </h3>
                                <p class="ac-body" style="display: block">
                                    Ensuring productivity and growth is essential for
                                    architecture and engineering teams. The industry requires
                                    a high level of precision, full legal compliance
                                </p>
                            </div>
                            <div class="accordion-single">
                                <h3 class="faq-title">
                                    <a href="#">Question number two and others</a>
                                </h3>
                                <p class="ac-body" style="display: none">
                                    Ensuring productivity and growth is essential for
                                    architecture and engineering teams. The industry requires
                                    a high.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ends: .atbd_content_module -->

                <div class="atbd_content_module atbd_review_module">
                    <div class="atbd_content_module__tittle_area">
                        <div class="atbd_area_title">
                            <h4><span class="la la-star-o"></span>{{count($list_review)}} Reviews</h4>
                        </div>
                    </div>
                    <div class="atbdb_content_module_contents">
                        <div id="client_review_list">

                                @foreach ($list_review as $key_review => $value_review)
                                <div class="atbd_single_review atbdp_static">
                                    <div class="atbd_review_top">
                                        <div class="atbd_avatar_wrapper">
                                            <div class="atbd_name_time">
                                                <p>{{$value_review->customer->first_name . ' ' . $value_review->customer->last_name}}</p>
                                                <span class="review_time">{{ Carbon\Carbon::parse($value_review->created_at)->format('H:i d/m/Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="atbd_rated_stars">
                                            <ul>
                                                @for ($i = 1; $i <= $value_review->rate; $i++)
                                                    <li><span><ion-icon name="star"></ion-icon></span></li>
                                                @endfor
                                                @for ($i = 1; $i <= 5 - $value_review->rate; $i++)
                                                    <li><span><ion-icon name="star-outline"></ion-icon></span></li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review_content ml-3">
                                        <p>
                                            {{$value_review->content}}
                                        </p>
                                    </div>
                                </div>
                                @endforeach


                        </div>
                        {{$list_review->links()}}

                    </div>
                </div>
                <!-- ends: .atbd_content_module -->

                <div class="atbd_content_module atbd_review_form">
                    <div class="atbd_content_module__tittle_area">
                        <div class="atbd_area_title">
                            <h4><span ><ion-icon name="star-outline"></ion-icon></span>Add a Review</h4>
                        </div>
                    </div>
                    <div class="atbdb_content_module_contents atbd_give_review_area">
                        @if ($user = Auth::guard('customer')->user())
                        <div class="atbd_notice alert alert-success" role="alert">
                            Chào bạn, {{$user->first_name . ' ' . $user->last_name}}
                        </div>
                        @else
                        <div class="atbd_notice alert alert-info" role="alert">
                            <span aria-hidden="true"><ion-icon name="information-outline"></ion-icon></span>
                            You need to <a href="" class="access-link" data-toggle="modal"
                            data-target="#login_modal">Login</a> or <a href="" class="access-link" data-toggle="modal"
                            data-target="#signup_modal">Register</a> to
                            submit a review
                        </div>
                        @endif
                        <!-- ends: .atbd_notice -->

                        <form  id="atbdp_review_form">
                            <div class="atbd_review_rating_area">
                                <div class="atbd_review_update_rating">
                                    <span>Rating: </span>
                                    <div class="atbd_rating_stars">
                                        <div class="star-rating">
                                            <input type="radio" name="star" id="star1" value="1"><label for="star1"><ion-icon name="star"></ion-icon></label>
                                            <input type="radio" name="star" id="star2" value="2"><label for="star2"><ion-icon name="star"></ion-icon></label>
                                            <input type="radio" name="star" id="star3" value="3"><label for="star3"><ion-icon name="star"></ion-icon></label>
                                            <input type="radio" name="star" id="star4" value="4"><label for="star4"><ion-icon name="star"></ion-icon></label>
                                            <input type="radio" name="star" id="star5" value="5"><label for="star5"><ion-icon name="star"></ion-icon></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea name="content" id="content" class="form-control" placeholder="Message" required></textarea>
                            </div>
                            <input type="hidden" id="id_nha_hang_khach_san" value="{{ $data->id }}">
                            <button class="btn btn-gradient btn-gradient-one" type="button" id="atbdp_review_form_submit">
                                Submit Review
                            </button>
                        </form>
                    </div>
                    <!-- ends: .atbd_give_review_area -->
                </div>
                <!-- ends: .atbd_content_module -->
            </div>
            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="widget atbd_widget widget-card">
                    <div class="atbd_widget_title">
                        <h4><span><ion-icon name="person-outline"></ion-icon></span>Seller Info</h4>
                    </div>
                    <!-- ends: .atbd_widget_title -->
                    <div class="widget-body atbd_author_info_widget">
                        <div class="atbd_avatar_wrapper">
                            <div class="atbd_name_time">
                                <h4>
                                    {{ $data->name }}
                                    <span class="verified" data-toggle="tooltip" data-placement="top"
                                        title="Verified"></span>
                                </h4>
                            </div>
                        </div>
                        <!-- ends: .atbd_avatar_wrapper -->

                        <div class="atbd_widget_contact_info">
                            <ul>
                                <li>
                                    <span><ion-icon name="location-outline"></ion-icon></span>
                                    <span class="atbd_info">{{ $data->dia_chi }}</span>
                                </li>
                                <li>
                                    <span><ion-icon name="call-outline"></ion-icon></span>
                                    <span class="atbd_info">{{ $data->so_dien_thoai }}</span>
                                </li>
                                <li>
                                    <span><ion-icon name="mail-outline"></ion-icon></span>
                                    <span style="font-size: 13px;" class="atbd_info">{{ $data->email }}</span>
                                </li>
                                <li>
                                    <span><ion-icon name="earth-outline"></ion-icon></span>
                                    <a href="" class="atbd_info">{{ $data->website }}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- ends: .atbd_widget_contact_info -->

                        <div class="atbd_social_wrap">
                            <p>
                                <a href="{{ $data->facebook }}"><span class="fab fa-facebook-f"></span></a>
                            </p>
                            <p>
                                <a href="{{ $data->twiter }}"><span class="fab fa-twitter"></span></a>
                            </p>
                        </div>
                        <!-- ends: .atbd_social_wrap -->

                        <a href="" class="btn btn-outline-primary btn-block">View Profile</a>
                    </div>
                    <!-- ends: .widget-body -->
                </div>
                <!-- ends: .widget -->

                <div class="widget atbd_widget widget_claim_listing">
                    <a href="" class="btn btn-block btn-gradient btn-gradient-two btn-lg claim-btn"
                        data-toggle="modal" data-target="#moda_claim_listing">Claim This Business</a>
                </div>
                <!-- ends: .widget -->

                <div class="widget atbd_widget widget-card">
                    <div class="atbd_widget_title">
                        <h4><span class="la la-clock-o"></span> Business Hours</h4>
                        <span class="badge badge-success">Open Now</span>
                    </div>
                    <!-- ends: .atbd_widget_title -->
                    <div class="directory_open_hours">
                        <ul>
                            @for ($i = 2; $i <= 8; $i++)
                                @php
                                    $name = 'gio_lam_viec_thu_' . $i;
                                    $arr = ['', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ Nhật'];
                                @endphp
                                <li class="atbd_open">
                                    <span class="day">{{ $arr[$i - 1] }}</span>
                                    <div class="atbd_open_close_time">
                                        <span class="time">{{ $data->$name }}</span>
                                    </div>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
                <div class="widget atbd_widget widget-card">
                    <div class="atbd_widget_title">
                        <h4><span class="la la-list-alt"></span> Similar Listings</h4>
                        <a href="">View All</a>
                    </div>
                    <!-- ends: .atbd_widget_title -->
                    <div class="atbd_categorized_listings atbd_similar_listings">
                        <ul class="listings">
                            <li>
                                <div class="atbd_left_img">
                                    <a href=""><img src="img/sl1.jpg" alt="listing image" /></a>
                                </div>
                                <div class="atbd_right_content">
                                    <div class="cate_title">
                                        <h4><a href="">Clothing Shopping Mall</a></h4>
                                    </div>
                                    <p class="listing_value">
                                        <span>$25,800</span>
                                    </p>
                                    <p class="directory_tag">
                                        <span class="la la-cutlery" aria-hidden="true"></span>
                                        <span>
                                            <a href="">Food & Drink</a>
                                            <span class="atbd_cat_popup">+3
                                                <span class="atbd_cat_popup_wrapper">
                                                    <span>
                                                        <a href="">Food<span>,</span></a>
                                                        <a href="">Others<span>,</span></a>
                                                        <a href="">Service<span>,</span></a>
                                                    </span>
                                                </span> </span><!-- ends: .atbd_cat_popup -->
                                        </span>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="atbd_left_img">
                                    <a href=""><img src="img/sl2.jpg" alt="listing image" /></a>
                                </div>
                                <div class="atbd_right_content">
                                    <div class="cate_title">
                                        <h4><a href="">Flanders Heat & Air Systems</a></h4>
                                    </div>
                                    <p class="listing_value">
                                        <span>$38,4800</span>
                                    </p>
                                    <p class="directory_tag">
                                        <span class="la la-bed" aria-hidden="true"></span>
                                        <span><a href="">Hotel & Travel</a></span>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="atbd_left_img">
                                    <a href=""><img src="img/sl3.jpg" alt="listing image" /></a>
                                </div>
                                <div class="atbd_right_content">
                                    <div class="cate_title">
                                        <h4><a href="">Favorite Place Fog Bank</a></h4>
                                    </div>
                                    <p class="listing_value">
                                        <span>$95,700</span>
                                    </p>
                                    <p class="directory_tag">
                                        <span class="la la-bookmark" aria-hidden="true"></span>
                                        <span><a href="">Art & History</a></span>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="atbd_left_img">
                                    <a href=""><img src="img/sl4.jpg" alt="listing image" /></a>
                                </div>
                                <div class="atbd_right_content">
                                    <div class="cate_title">
                                        <h4><a href="">Favorite Place Fog Bank</a></h4>
                                    </div>
                                    <p class="listing_value">
                                        <span>$45,800</span>
                                    </p>
                                    <p class="directory_tag">
                                        <span class="la la-bookmark" aria-hidden="true"></span>
                                        <span><a href="">Shopping</a></span>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- ends .atbd_similar_listings -->
                </div>
                <!-- ends: .widget -->

                <div class="widget atbd_widget widget-card">
                    <div class="atbd_widget_title">
                        <h4><span class="la la-list-alt"></span> Popular Listings</h4>
                        <a href="">View All</a>
                    </div>
                    <!-- ends: .atbd_widget_title -->
                    <div class="atbd_categorized_listings atbd_popular_listings">
                        <ul class="listings">
                            <li>
                                <div class="atbd_left_img">
                                    <a href=""><img src="img/sl5.jpg" alt="listing image" /></a>
                                </div>
                                <div class="atbd_right_content">
                                    <div class="cate_title">
                                        <h4><a href="">Flanders Heat & Air Systems</a></h4>
                                    </div>
                                    <p class="directory_tag">
                                        <span class="la la-glass" aria-hidden="true"></span>
                                        <span><a href="">Restaurant</a></span>
                                    </p>
                                    <div class="atbd_rated_stars">
                                        <ul>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_active"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="atbd_left_img">
                                    <a href=""><img src="img/sl6.jpg" alt="listing image" /></a>
                                </div>
                                <div class="atbd_right_content">
                                    <div class="cate_title">
                                        <h4><a href="">Expert Services Agency</a></h4>
                                    </div>
                                    <p class="directory_tag">
                                        <span class="la la-map-marker" aria-hidden="true"></span>
                                        <span>
                                            <a href="">Places</a>
                                            <span class="atbd_cat_popup">+4
                                                <span class="atbd_cat_popup_wrapper">
                                                    <span>
                                                        <a href="">Food<span>,</span></a>
                                                        <a href="">Others<span>,</span></a>
                                                        <a href="">Service<span>,</span></a>
                                                        <a href="">Travel<span>,</span></a>
                                                    </span>
                                                </span> </span><!-- ends: .atbd_cat_popup -->
                                        </span>
                                    </p>
                                    <div class="atbd_rated_stars">
                                        <ul>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_disable"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="atbd_left_img">
                                    <a href=""><img src="img/sl7.jpg" alt="listing image" /></a>
                                </div>
                                <div class="atbd_right_content">
                                    <div class="cate_title">
                                        <h4><a href="">Sydney Restaurant Towers</a></h4>
                                    </div>
                                    <p class="directory_tag">
                                        <span class="la la-shopping-cart" aria-hidden="true"></span>
                                        <span><a href="">Shopping</a></span>
                                    </p>
                                    <div class="atbd_rated_stars">
                                        <ul>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_disable"></span></li>
                                            <li><span class="rate_disable"></span></li>
                                            <li><span class="rate_disable"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="atbd_left_img">
                                    <a href=""><img src="img/sl8.jpg" alt="listing image" /></a>
                                </div>
                                <div class="atbd_right_content">
                                    <div class="cate_title">
                                        <h4><a href="">Favorite Architecture Places</a></h4>
                                    </div>
                                    <p class="directory_tag">
                                        <span class="la la-bank" aria-hidden="true"></span>
                                        <span><a href="">Art & History</a></span>
                                    </p>
                                    <div class="atbd_rated_stars">
                                        <ul>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_disable"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- ends .atbd_similar_listings -->
                </div>
                <!-- ends: .widget -->
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#atbdp_review_form_submit").click(function() {

                var id = $("#id_nha_hang_khach_san").val();
                var content = $("#content").val();
                var rate = $("input[name='star']:checked").val();

                var payload = {
                    'nha_hang_khach_san_id': id,
                    'rate': rate,
                    'content': content,
                };


                axios.post('/nha-hang-khach-san/review', payload)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success('Đánh giá thành công');
                            location.reload();
                        } else {
                            toastr.error('Vui lòng đăng nhập để đánh giá');
                        }
                    })

            });
        });
    </script>
@endsection
