<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SN PASAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- Js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('admin/css/admin.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="main-container">
        {{-- Sidebar start --}}
        <div class="left-side-container">
            <div class="brand-container">
                <div class="brand-image-container">
                    <img class="brand-image" src="{{asset('image/snLogo.png')}}" alt="">
                </div>
                <div class="brand-name-container">
                    <div class="brand-name mb-0">
                        SN PASAL
                    </div>
                    <div class="brand-position">
                        OWNER
                    </div>
                </div>
            </div>
            <div class="sidebar">
                <p class="mb-1">Main Links</p>
                <div class="main-links-list">
                    <a href=""> 
                        <div class="main-link">
                            <div class="icon"><img width="16px" src="{{asset('image/home.svg')}}" alt="" srcset=""></div>
                            <div class="link-name">Home</div>
                        </div>
                    </a>
                    <a href=""> 
                        <div class="main-link">
                            <div class="icon"><img width="16px" src="{{asset('image/users.svg')}}" alt="" srcset=""></div>
                            <div class="link-name">Store User</div>
                        </div>
                    </a>
                    <a href=""> 
                        <div class="main-link">
                            <div class="icon"><img width="16px" src="{{asset('image/categories.svg')}}" alt="" srcset=""></div>
                            <div class="link-name">Categories</div>
                        </div>
                    </a>
                    <a href=""> 
                        <div class="main-link">
                            <div class="icon"><img width="16px" src="{{asset('image/products.svg')}}" alt="" srcset=""></div>
                            <div class="link-name">Products</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        {{-- Sidebar End --}}
        <div class="right-side-container">
            <div class="navbar-container">

            </div>
            <div class="content-container">

            </div>
        </div>
    </div>
</body>
</html>