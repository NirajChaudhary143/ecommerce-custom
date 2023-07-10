<div class="navbar-container">
    <div class="navbar-list">
        <div class="logo-img">
            <img height="36px" src="{{asset('image/Sn logo-1.png')}}" alt="" srcset="">
        </div>
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
</div>