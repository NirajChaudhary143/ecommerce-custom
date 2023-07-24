<div class="navbar-container">
    <div class="navbar-list">
        <div class="logo-img">
            <img height="36px" src="{{asset('image/Sn logo-1.png')}}" alt="" srcset="">
        </div>
        @php
            $userProfile = Auth::user()->user_profile;
            $name = Auth::user()->name;
            $initials = '';
            if ($name) {
                $nameParts = explode(' ', $name);
                foreach ($nameParts as $part) {
                    $initials .= strtoupper(substr($part, 0, 1));
                }
            }
            
        @endphp
            <div class="profile-container">
                <div class="profile-container2">
                    <div class="empty-container">

                    </div>
                    <button onclick="activeDropdown(event)">
                        <div class="profile">
                            @if (isset($userProfile) == null)
                                {{$initials}}
                            @else
                            <img class="profile" src="{{asset($userProfile)}}" width="50px" height="50px" alt="">
                            @endif
                        </div>
                    </button>
                </div>
                <div class="dropdown-container">
                
                </div>
            </div>
    </div>
    <form action="{{route('logout')}}" method="post" hidden>@csrf        <input id="logout" type="submit" value="Logout">   </form>     
</div>
<script>

function activeDropdown(event) {
    event.preventDefault();
    var dropdownContainer = document.querySelector('.dropdown-container');
    dropdownContainer.classList.toggle('active');
    var newContent = '';
    
    if (dropdownContainer.classList.contains('active')) {
        newContent = '<div class="edit-profile"><div class="dropdown-icon"><i class="fa fa-user" aria-hidden="true"></i></div><div class="dropdown-title"><a href="{{route('profile.edit')}}">Edit Profile</a></div></div><div class="logout-btn" style="cursor:pointer"><div class="dropdown-icon"><i class="fa fa-sign-out" aria-hidden="true"></i></div><div class="dropdown-title logout-redirect">Logout</div></div>';
    }
    
    dropdownContainer.innerHTML = newContent;
}

document.onclick = function(e) {
        console.log(e.target);

        if(e.target.className !== 'profile' && e.target.className !== 'dropdown-container'){
            var dropdownContainer = document.querySelector('.dropdown-container');
                dropdownContainer.classList.remove('active');
                dropdownContainer.innerHTML ='';
        }
        if(e.target.className === 'dropdown-title logout-redirect'){
            console.log(e.target);
            document.querySelector('#logout').click();
        }
    }


</script>
