@extends('HomePage.Master')

@section('title')
    <section class="intro-wrapper bgimage overlay overlay--dark">
        <div class="bg_image_holder">
          <img src="img/intro.jpg" alt="">
        </div>
        @include('HomePage.Shared.menu')
        <!-- ends: .mainmenu-wrapper -->
        <div class="directory_content_area">
          <div class="container">
            <div class="row">
              <div class="col-lg-10 offset-lg-1">
                <div class="search_title_area">
                  <h2 class="title">Find the Best Places to Be</h2>
                  <p class="sub_title">All the top locations – from restaurants and clubs, to galleries, famous places and more..</p>
                </div>
                <!-- ends: .search_title_area -->
                <form action="/search" class="search_form">
                  <div class="atbd_seach_fields_wrapper">
                    <div class="single_search_field search_query">
                      <input name="keyword" class="form-control search_fields" type="text" placeholder="What are you looking for?">
                    </div>
                    <div class="atbd_submit_btn">
                      <button type="submit" class="btn btn-block btn-gradient btn-gradient-one btn-md btn_search">Search</button>
                    </div>
                  </div>
                </form>
                <!-- ends: .search_form -->
                <div class="directory_home_category_area">
                  <ul class="categories">
                    <li>
                      <a href="/nha-hang/list">
                        <span class="color-primary">
                            <ion-icon name="restaurant-outline"></ion-icon>
                        </span> Restaurants </a>
                    </li>
                    <li>
                      <a href="">
                        <span class="color-success">
                            <ion-icon name="location-outline"></ion-icon>
                        </span> Places </a>
                    </li>
                    <li>
                      <a href="">
                        <span class="color-warning">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span> Shopping </a>
                    </li>
                    <li>
                      <a href="/khach-san/list">
                        <span class="color-danger">
                            <ion-icon name="bed-outline"></ion-icon>
                        </span> Hotels </a>
                    </li>
                  </ul>
                </div>
                <!-- ends: .directory_home_category_area -->
              </div>
              <!-- ends: .col-lg-10 -->
            </div>
          </div>
        </div>
        <!-- ends: .directory_search_area -->
      </section>
@endsection
