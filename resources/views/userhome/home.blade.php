
<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>ZVCart</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="homecontent/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="homecontent/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="homecontent/css/style.css" rel="stylesheet" />
      {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
      <!-- responsive style -->
      <link href="homecontent/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('userhome.navbar2')
         <!-- slider section -->
        @include('userhome.slider')
      </div>
      <!-- why section -->
      @include('userhome.why')
      
      <!-- arrival section -->
      @include('userhome.arrival')
      @include('userhome.ourproducts')

      <!-- footer start -->
      @include('userhome.footer')

      @auth
          <a href="{{url('/re')}}"></a>
      @endauth
      <!-- jQery -->
      <script src="homecontent/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="homecontent/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="homecontent/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="homecontent/js/custom.js"></script>
   </body>
</html>