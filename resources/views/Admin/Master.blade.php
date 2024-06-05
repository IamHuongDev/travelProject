<!doctype html>
<html lang="en">
   <head>
        @include('Admin.Shared.Head-Css')
        @yield('css')
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         @include('Admin.Shared.Menu')
         @include('Admin.Shared.Header')
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
                @yield('content')
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
      <!-- Footer -->
       @include('Admin.Shared.Footer')
       @include('Admin.Shared.Sub-menu')
      <!-- Footer END -->
      @include('Admin.Shared.Foot-Js')
      @yield('js')
   </body>
</html>
