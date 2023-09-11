<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SN Pasal | Shop with us</title>
    <link rel="stylesheet" href="{{asset('user/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/utils.css')}}">
    {{-- bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    {{-- bootstrap css end --}}
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>
    {{-- main-container start --}}
    <div class="main-container">
        <div class="navbar-container">
            <div class="nav-item-wrapper">
                <div class="brand-container">
                    <h1>SN</h1>
                </div>
                <div class="nav-items">
                    <ul class="category-list mb-0"> 
                        <li><a href="#">Everything</a></li>
                        <li><a href="#">Women</a></li>
                        <li><a href="#">Men</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#" name="dashed-line">|</a></li>
                    </ul>
                    <div class="nav-items-2">
                        <ul class="category-list mb-0"> 
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact Us</a></li>
                            @if (Auth::user())
                            <li style="padding-right: 0"><a href="#">$0.00 <i style="margin-left: 3px" class="fa-solid fa-cart-shopping"></i></a></li>
                            <li style="padding-right: 0"><a href="#"><i class="fa-solid fa-user"></i></a></li>
                            @else
                            <li style="padding-right: 0"><a href="{{route('register')}}">Register</a></li> 
                            @endif
                        </ul>

                    </div>

                </div>
                <div class="mobile-btn">
                    <i class="fa-solid fa-bars mobile-iconn" id="hamburger"></i>
                    <i class="fa-solid fa-xmark mobile-iconn" name="close-icon" id="closeMenu"></i>
                </div>
            </div>
        </div>
    {{-- Navbar ENd --}}
    <div class="inner-content-wrapper">
        Raining Offers For Hot Summer
        <div class="inner-content mt-2">
            25% Off On All Products
        </div>
        <div class="inner-content-2 mt-3">
            <button id="shop">Shop Now</button>
            <button id="find">Find More</button>
        </div>
        
    </div>
    
</div>
{{-- main-container end --}}
<div class="category-wrapper m-auto mt-2 mb-4">
    <div class="category-card">
        @foreach ($categories as $category)
        <div class="image-card">
            <img src="{{asset($category->image)}}" alt="">
            <div class="image-card-title">
                {{$category->name}}
            </div>
        </div>
        @endforeach
    </div>
</div>

</body>

 {{-- custom js --}}
 {{-- <script src="{{asset('user/js/main.js')}}"></script> --}}
 <script>
     var hamburger = document.querySelector('#hamburger');
     var closeMenu = document.querySelector('#closeMenu');
     var navbar = document.querySelector('.navbar-container');
     console.log(navbar);
     hamburger.onclick = ()=>{
        navbar.classList.toggle('active');
        hamburger.style.display ='none';
        closeMenu.style.display = 'block';
        
     }
     closeMenu.onclick = () =>{
        navbar.classList.toggle('active');
        hamburger.style.display ='block';
        closeMenu.style.display = 'none';
     }

 </script>
</html>