<!-- Header Start -->


<!-- Header ENd -->
@extends('home.base')

@section('content')
       <!-- slider section -->
       @include('home.slider')
       <!-- end slider section -->
    </div>
      <!-- why section -->
      @include('home.why_section')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('home.arrival_section')
      
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.product_section')
      <!-- end product section -->

      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      
    @include('home.client_section')
      
      <!-- end client section -->
      @endsection

      <!-- Footer Start  -->

      <!-- Footer End -->
    