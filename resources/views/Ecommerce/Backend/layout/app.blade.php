<!DOCTYPE html>
<html lang="en">
<!-- <html lang="ar" dir="rtl"> -->
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"> -->
    <!-- Bootstrap CSS RTL-->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.rtl.min.css"> -->
    <!-- Fontawesome CSS-->
    <!-- <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css"> -->
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v7.0.1/css/all.css">
    <!-- Data Table CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Backend/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Backend/assets/css/ltr/style.ltr.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('Backend/assets/css/rtl/style.rtl.css') }}"> -->
     
     @yield('css')

  </head>
  <!-- 
    oncontextmenu='return false' 

    Private Html Ctrl U
  -->
  <body>


      @include('Ecommerce.Backend.Dashboard.topbar')
      
      @include('Ecommerce.Backend.Dashboard.sidebar')
      
      <div id="layoutSidenav_content" class="dashboard-main">
          <main class="main container">
              @yield('content')
              
      <br><br>
    </main>
  </div>
  

    @include('Ecommerce.Backend.Dashboard.footer')


    <!-- JQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- Fontawesome JS -->
    <!-- <script type="text/javascript" src="https://use.fontawesome.com/releases/v6.0.0/js/all.js"></script> -->
    <!-- <script type="text/javascript" src="https://use.fontawesome.com/releases/v7.0.1/js/all.js"></script> -->
    <!-- Feather JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script><script>feather.replace()</script>
    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- DataTable JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="{{ asset('Backend/assets/js/style.js') }}"></script>
    <script type="text/javascript" src="{{ asset('Backend/assets/js/datatable-english.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('Backend/assets/js/datatable-arabic.js') }}"></script> -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('javascript')

  </body>
</html>