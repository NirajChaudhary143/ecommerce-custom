<div class="left-side-container">
    <div class="brand-container">
        <div class="brand-image-container">
            @php
            $name = Auth::user()->name;
            $initials = '';
            if ($name) {
                $nameParts = explode(' ', $name);
                foreach ($nameParts as $part) {
                    $initials .= strtoupper(substr($part, 0, 1));
                }
            }
        @endphp
        <div class="profile">
            {{$initials}}
        </div>
        </div>
        <div class="brand-name-container">
            <div class="brand-name mb-0">
                {{auth()->user()->name}}
            </div>
            <div class="brand-position">
                @foreach (Auth::user()->roles as $role)
                {{ $role->name }}
                @endforeach
            </div>
        </div>
    </div>
    <div class="sidebar">
        <p class="mb-1">Main Links</p>
        <div class="main-links-list">
            <a href="{{url('/admin-panel')}}"> 
                <div class="main-link">
                    <div class="icon"><img width="16px" src="{{asset('image/home.svg')}}" alt="" srcset=""></div>
                    <div class="link-name">Home</div>
                </div>
            </a>
            <a href="{{route('store_user')}}"> 
                <div class="main-link">
                    <div class="icon"><img width="16px" src="{{asset('image/users.svg')}}" alt="" srcset=""></div>
                    <div class="link-name">Store User</div>
                </div>
            </a>
            <a href="{{route('all.permission')}}"> 
                <div class="main-link">
                    <div class="icon"><img width="16px" src="{{asset('image/users.svg')}}" alt="" srcset=""></div>
                    <div class="link-name">Store User Permission</div>
                </div>
            </a>
            <a href="{{route('admin.category')}}"> 
                <div class="main-link">
                    <div class="icon"><img width="16px" src="{{asset('image/categories.svg')}}" alt="" srcset=""></div>
                    <div class="link-name">Categories</div>
                </div>
            </a>
            <a href="{{route('show.product')}}"> 
                <div class="main-link">
                    <div class="icon"><img width="16px" src="{{asset('image/products.svg')}}" alt="" srcset=""></div>
                    <div class="link-name">Products</div>
                </div>
            </a>
        </div>
    </div>
</div>

<script>
    var navLink = document.querySelectorAll("a");
    var activeLink =window.location.pathname;

    // console.log(activeLink);
    navLink.forEach(link => {
        // console.log(link.href);
        if(link.href.includes(`${activeLink}`)){
            console.log(link.children[0]);
            link.children[0].classList.add('active');
        }
    });
</script>