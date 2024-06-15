<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="dark" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
  @include('partials.preloader')

  <div class="auth-main v2">
    <div class="bg-overlay bg-dark"></div>
    @yield('content')
  </div>
  <!-- [ Main Content ] end -->
  <!-- Required Js -->
 @include('partials.scripts')



  <script>layout_sidebar_change('dark');</script>




  <script>layout_header_change('dark');</script>





  <script>change_box_container('false');</script>


  <script>layout_caption_change('true');</script>




  <script>layout_rtl_change('false');</script>

</body>
<!-- [Body] end -->

</html>
