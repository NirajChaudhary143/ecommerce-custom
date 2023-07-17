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
    <link rel="icon" href="{{asset('admin/img/favicon_io/android-chrome-512x512.png')}}">
</head>
<body>
    {{-- Category Pop up Start --}}
    <div class="category-popup">
        
    </div>

    {{-- Category Pop Up End --}}
    <div class="main-container">

        {{-- Sidebar start --}}
            @include('admin.include.sidebar')
        {{-- Sidebar End --}}

        <div class="right-side-container">

            {{-- Navbar Sart --}}
            @include('admin.include.navbar')
            {{-- Navbar End --}}

            {{-- Content Start --}}
        
            <div class="content-container">
                @yield('main-section')
            </div>
            {{-- COntent ENd --}}
        </div>
    </div>
</body>
</html>