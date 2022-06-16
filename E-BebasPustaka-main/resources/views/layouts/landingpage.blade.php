<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>E-Bebas Pustaka ITS</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="/kp_depan/public/assets/img/favicons/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="/kp_depan/public/assets/img/favicons/favicon.ico">

    <link rel="manifest" href="/kp_depan/public/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="/kp_depan/public/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="stylesheet" href="/kp_depan/public/vendors/plyr/plyr.css">
    <link rel="stylesheet" href="/kp_depan/public/assets/css/theme.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous">
    </script>
  </head>
  
  
  <body>
    @include('sweetalert::alert')
    @include('layouts/nav_landingpage')

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      @yield('content')
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    {{-- <script src="{{asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script> --}}
    <script src="{{asset('kp_depan')}}/public/vendors/@popperjs/popper.min.js"></script>
    <script src="{{asset('kp_depan')}}/public/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="{{asset('kp_depan')}}/public/assets/js/activelink.js"></script>
    <script src="{{asset('kp_depan')}}/public/assets/js/theme.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
  </body>

</html>