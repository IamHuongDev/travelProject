     @jquery
     @toastr_js
     @toastr_render


     <script src="/js/app.js"></script>
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="/assets_partner/js/jquery.min.js"></script>
     <!-- Rtl and Darkmode -->
     <script src="/assets_partner/js/rtl.js"></scrip>
     <script src="/assets_partner/js/customizer.js"></script>
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
     <!-- lottie JavaScript -->
     <script src="/assets_partner/js/lottie.js"></script>
     <!-- am core JavaScript -->
     <script src="/assets_partner/js/core.js"></script>
     <!-- am charts JavaScript -->
     <script src="/assets_partner/js/charts.js"></script>
     <!-- am animated JavaScript -->
     <script src="/assets_partner/js/animated.js"></script>
     <!-- am kelly JavaScript -->
     <script src="/assets_partner/js/kelly.js"></script>
     <!-- am maps JavaScript -->
     <script src="/assets_partner/js/maps.js"></script>
     <!-- am worldLow JavaScript -->
     <script src="/assets_partner/js/worldLow.js"></script>
     <!-- Flatpicker Js -->
     <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
     <!-- Chart Custom JavaScript -->
     <script src="/assets_partner/js/chart-custom.js"></script>
     <!-- Custom JavaScript -->
     <script src="/assets_partner/js/custom.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
         integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
         integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw=="
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@latest/dist/emoji-button.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script>
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
     </script>

     <script>
         @if (count($errors) > 0)
             @foreach ($errors->all() as $error)
                 toastr.error("{{ $error }}");
             @endforeach
         @endif
     </script>
