<!doctype html>
<html lang="en">
  <head>
  <title>{{ $title }}</title>
  <!--
  
  DIGITAL TREND
  
  https://templatemo.com/tm-538-digital-trend
  
  -->
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=Edge">
       <meta name="description" content="">
       <meta name="keywords" content="">
       <meta name="author" content="">
       <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
       <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
       <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
       <link rel="stylesheet" href="{{ asset('css/aos.css')}}">
       <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
       <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">
  
       <!-- MAIN CSS -->
       <link rel="stylesheet" href="{{ asset('css/templatemo-digital-trend.css') }}">
       <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css')}}">
  
      <link rel="stylesheet" href="{{ asset('css/style.css')}}">
      <script src="{{ asset('js/jquery.min.js')}}"></script>
     <script src="{{ asset('js/bootstrap.min.js')}}"></script>
     <script src="{{ asset('js/aos.js')}}"></script>
     <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
     <script src="{{ asset('js/smoothscroll.js')}}"></script>
     <script src="{{ asset('js/custom.js')}}"></script>
      
  
  </head>

    @include('partials/navbar1')
      {{-- <div class="container" style="margin-top: 50px" > --}}
    @yield('container')
    </div>

    @include('partials/footer')
  
   

   
    

    
    
  
</html>