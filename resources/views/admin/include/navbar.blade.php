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
                   <div class="edit-profile">
                    <div class="dropdown-icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="dropdown-title">
                        Edit Profile
                    </div>
                   </div>
                   <div class="logout-btn">
                        <div class="dropdown-icon">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                        </div>
                        <div class="dropdown-title">
                            Logout
                        </div>
                   </div>
                </div>
            </div>
    </div>
</div>
<script>
  function activeDropdown(event) {
    event.preventDefault();
    var dropdownContainer = document.querySelector('.dropdown-container');
    dropdownContainer.classList.toggle('active');
  }

//   document.addEventListener('click', function (event) {
//     var targetElement = event.target;
//     var dropdownContainer = document.querySelector('.dropdown-container');
//     if (!dropdownContainer.contains(targetElement) && !targetElement.classList.contains('dropdown-container')) {
//       dropdownContainer.classList.remove('active');
//     }
//   });
</script>
