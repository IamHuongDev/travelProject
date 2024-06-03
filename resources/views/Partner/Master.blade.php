<!doctype html>
<html lang="en">
   <head>
        @include('Partner.Shared.Head-Css')
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
         @include('Partner.Shared.Menu')
         @include('Partner.Shared.Header')
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
                @yield('content')
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
      <!-- Footer -->
       @include('Partner.Shared.Footer')
       @include('Partner.Shared.Sub-menu')
      <!-- Footer END -->
      @include('Partner.Shared.Foot-Js')
      @yield('js')
   </body>
</html>
