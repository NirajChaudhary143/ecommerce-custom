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
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('backend') }}/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="{{ asset('backend') }}/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('backend') }}/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('backend') }}/css/responsive.css" rel="stylesheet" />
      <style>
         .product-container{
            /* height: 30vh; */
            width: 80vw;
            background-color: rgb(219, 211, 211);
            padding: 10px;
            /* margin-top: 10px; */
         }
         .product-image{
            /* height: 300px; */
            width: 20vw;
            background-color: white;
            margin-right: 5px;
            padding: 10px;
         }
         .product-title{
            /* width: 100%; */
            /* background-color: rgb(126, 95, 95); */
            color: black;
            font-size: 25px;
            font-weight: 400;
            /* height: 50px; */
         }
         .product{
            display: flex;
         }
         .product-detail{
            /* height: 300px; */
            width: 60vw;
            padding: 10px;
         }
         .product-price{
            margin-top: 10px;
            font-size: 30px;
            color: #f85606;
            font-weight: 300;
         }
         .product-discount{
            font-size: 15px;
            color: rgb(71, 68, 68);
            text-decoration: line-through;
         }
         .product-description{
            width: 75vw;
            padding: 10px;
         }
         .description-content{
            text-align: justify;
         }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="{{ asset('backend') }}/images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="about.html">About</a></li>
                              <li><a href="testimonial.html">Testimonial</a></li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="product.html">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/display-carts')}}">Cart</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                        </form>
                        @if(Route::has('login'))

                        @auth
                        <x-app-layout>
                        </x-app-layout>

                        @else
                        <li class="nav-item">
                           <a class="btn btn-primary" href="{{ route('login') }}">Log In</a>
                        </li>
                        <li class="nav-item ml-2">
                           <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                        @endif
                        <!--  -->
                      
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->
     
   
   