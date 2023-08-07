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
            <div class="nav-items">
                <div class="brand-container">
                    <h1>SN</h1>
                </div>
                <ul class="category-list mb-0"> 
                    <li><a href="#">Everything</a></li>
                    <li><a href="#">Women</a></li>
                    <li><a href="#">Men</a></li>
                    <li><a href="#">Accessories</a></li>
                </ul>
            </div>
            {{-- <div class="nav-items">
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
            </div> --}}
            <div class="mobile-btn">
                <i class="fa-solid fa-bars mobile-iconn" ></i>
                <i class="fa-solid fa-xmark mobile-iconn" name="close-icon"></i>
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
{{-- <div class="row gx-5 mt-2" id="category-container">
    <div class="col-lg-4 position-relative category-image-container">
        <div class="category-image">
            <img src="https://img.freepik.com/free-photo/fashion-girl-posing-studio-wearing-smart-casual-sportive-outfit-business-style-sweet-pastel-colors-sunglasses-backpack-denim-jacket-mint-background-stylish-woman_291049-1800.jpg?w=2000" alt="">
        </div>
        <div class="inner-wrapper col" style="margin-top: 15rem !important; padding:10px !important">
            <div class="inner-content" style="color: white;z-index:12;position: relative;">
                20% Off On Tank Tops
            </div>
        <div class="mt-2" style="color: white;z-index:12;position: relative; font-weight:500;text-align:justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
        <button class="mt-2" id="shop" style="z-index:12;position: relative;">Shop Now</button>
        </div>
    </div>
    <div class="col-lg-4 position-relative category-image-container">
        <div class="category-image">
            <img src="https://img.freepik.com/free-photo/fashion-girl-posing-studio-wearing-smart-casual-sportive-outfit-business-style-sweet-pastel-colors-sunglasses-backpack-denim-jacket-mint-background-stylish-woman_291049-1800.jpg?w=2000" alt="">
        </div>
        <div class="inner-wrapper col" style="margin-top: 15rem !important; padding:10px !important">
            <div class="inner-content" style="color: white;z-index:12;position: relative;">
                20% Off On Tank Tops
            </div>
        <div class="mt-2" style="color: white;z-index:12;position: relative; font-weight:500;text-align:justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
        <button class="mt-2" id="shop" style="z-index:12;position: relative;">Shop Now</button>
        </div>
    </div>
    <div class="col-lg-4 position-relative category-image-container">
        <div class="category-image">
            <img src="https://img.freepik.com/free-photo/fashion-girl-posing-studio-wearing-smart-casual-sportive-outfit-business-style-sweet-pastel-colors-sunglasses-backpack-denim-jacket-mint-background-stylish-woman_291049-1800.jpg?w=2000" alt="">
        </div>
        <div class="inner-wrapper col" style="margin-top: 15rem !important; padding:10px !important">
            <div class="inner-content" style="color: white;z-index:12;position: relative;">
                20% Off On Tank Tops
            </div>
        <div class="mt-2" style="color: white;z-index:12;position: relative; font-weight:500;text-align:justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
        <button class="mt-2" id="shop" style="z-index:12;position: relative;">Shop Now</button>
        </div>
    </div>
    
</div> --}}

</body>

 {{-- custom js --}}
 {{-- <script src="{{asset('user/js/main.js')}}"></script> --}}

 <script>

 </script>
</html>