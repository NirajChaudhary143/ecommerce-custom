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
            <div class="profile-container">
                <div class="profile-container2">
                    <div class="empty-container">

                    </div>
                    <button onclick="activeDropdown(event)">
                        <div class="profile">
                            {{$initials}}
                        </div>
                    </button>
                </div>
                <div class="dropdown-container">
                
                </div>
            </div>
    </div>
</div>
<script>

function activeDropdown(event) {
    event.preventDefault();
    var dropdownContainer = document.querySelector('.dropdown-container');
    dropdownContainer.classList.toggle('active');
    var newContent = '';
    
    if (dropdownContainer.classList.contains('active')) {
        newContent = '<div class="edit-profile"><div class="dropdown-icon"><i class="fa fa-user" aria-hidden="true"></i></div><div class="dropdown-title">Edit Profile</div></div><div class="logout-btn"><div class="dropdown-icon"><i class="fa fa-sign-out" aria-hidden="true"></i></div><div class="dropdown-title">Logout</div></div>';
    }
    
    dropdownContainer.innerHTML = newContent;
}

document.onclick = function(e) {
        // console.log(e.target);
        if(e.target.className !== 'profile'){
            var dropdownContainer = document.querySelector('.dropdown-container');
                dropdownContainer.classList.remove('active');
                dropdownContainer.innerHTML ='';
        }
    }


</script>
