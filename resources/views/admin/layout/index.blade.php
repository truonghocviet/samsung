<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Purple Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('')}}vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{asset('')}}vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="{{asset('')}}vendors/datatable/datatables.min.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('')}}css/style.css">
  <link rel="stylesheet" href="{{asset('')}}css/Mycss.css">
  <!-- endinject -->
  <!-- <link rel="shortcut icon" href="{{asset('')}}images/favicon.png" /> -->
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    
    @include('admin.layout.nav')
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->

      @include('admin.layout.sidebar')
      <!-- partial -->
      <div class="main-panel">
        
        <!-- content-wrapper-->
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        
        <!-- partial:../../partials/_footer.html -->
        @include('admin.layout.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('')}}vendors/js/vendor.bundle.base.js"></script>
  <script src="{{asset('')}}vendors/js/vendor.bundle.addons.js"></script>
  <script src="{{asset('')}}vendors/datatable/datatables.min.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('')}}js/off-canvas.js"></script>
  <script src="{{asset('')}}js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('')}}js/chart.js"></script>
  <!-- End custom js for this page-->
  <script src="{{asset('')}}js/Myjs.js"></script>

  <script src="{{asset('')}}vendors/number-input-format/dist/jquery.masknumber.js"></script>


  @yield('script');
</body>

</html>