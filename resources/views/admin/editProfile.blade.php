@extends('admin.adminPanel')


@section('main-section')

<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="user-title">
            Edit Profile
        </div>
        <div class="profile-update-container">
            <form action="{{route('profile.update',['id'=>$user->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="col bg-white rounded-3 p-1">
                <label for="">Name</label>
               <input type="text" name="name" value="{{$user->name}}" class="form-control mt-1">
               <span class="text-danger">
                   @error('name')
                       {{$message}}
                   @enderror
        
               </span>
            </div>
            <div class="col bg-white p-1 mt-2">
                <label for="">Username</label>
                <input type="text" name="username" value="{{$user->username}}" class="form-control mt-1">
                <span class="text-danger">
                    @error('username')
                        {{$message}}
                    @enderror
         
                </span>
            </div>
            <div class="col bg-white p-1 mt-2">
                <label for="">Phone Number</label>
                <input type="number" name="phone_number" value="{{$user->phone_number}}" class="form-control mt-1">
                <span class="text-danger">
                    @error('phone_number')
                        {{$message}}
                    @enderror
         
                </span>
            </div>
            <div class="col bg-white p-1 mt-2">
                <label for="">Location</label>
                <input type="text" name="address" value="{{$user->address}}" class="form-control mt-1">
                <span class="text-danger">
                    @error('address')
                        {{$message}}
                    @enderror
         
                </span>
            </div>
            <div class="col bg-white p-1 mt-2">
                <label for="">User Profile</label>
                <input type="file" name="image" id="user_profile" value="" class="form-control mt-1">
                <div class="col image-preview-container">
                    <!-- Image preview container -->
                    <img id="image-preview-from-database" src="{{asset($user->user_profile)}}" alt="Image Preview" style="max-width: 100%; max-height: 200px; margin-top: 5px; display: @if($user->user_profile) block @else none @endif;">
        
                    <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 100%; max-height: 200px; margin-top: 5px; display: none;">
        
                    <!-- "Cancel" button to delete the preview -->
                    <i id="cancelButton" style="margin-top: 5px; display: none; color:rgb(243, 72, 72);font-size:20px" class="fa fa-window-close" aria-hidden="true"></i>
                </div>
                <span class="text-danger">
                    @error('image')
                    {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="col bg-white p-1 mt-2">
                <label for="">Email</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control mt-1">
                <span class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
         
                </span>
            </div>
           <input type="submit" value="Update Information" class="form-control mt-2" style="    background-color: rgb(143, 68, 235);
           font-weight: bold;
           color: white;
           margin-top: 5px;
           text-align: center;">
            </form>
        </div>

    </div>
    <div class="col-lg-6 col-md-6">
        <div class="col">
            @include('admin.update-password')
    
        </div>
        <div class="col mt-2">
            <div class="user-title">
                Delete Account
            </div>
            <div class="alert alert-warning">
                Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
            </div>
            <form id="deleteForm" method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <label for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control">
                <span class="text-danger">
                    @error('password','userDeletion')
                        {{$message}}
                        <br>
                    @enderror
                    
                </span>
                <button id="deleteButton" class="btn btn-danger mt-2">Delete Account</button>
            </form>
            
            <script>
                document.getElementById('deleteButton').addEventListener('click', function(event) {
                    event.preventDefault();
                    if (confirm('Are you sure you want to delete your account?')) {
                        document.getElementById('deleteForm').submit();
                    }
                });
            </script>         
        </div>

    </div>

</div>


<script>
    var userImage = document.querySelector('#user_profile');
    var imagePreview = document.querySelector('#imagePreview');
    var cancelButton = document.querySelector('#cancelButton');
    var imagePreviewDatabse = document.querySelector('#image-preview-from-database');

    userImage.onchange = function() {

        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block'; // Show the image preview
                cancelButton.style.display = 'inline-block'; // Show the "Cancel" button
            };
            reader.readAsDataURL(file);
            imagePreviewDatabse.remove();
        } 
        else {
            imagePreview.src = '#';
            imagePreview.style.display = 'none'; // Hide the image preview if no file is selected
            cancelButton.style.display = 'none'; // Hide the "Cancel" button
        }
    };

    cancelButton.onclick = function() {
        // Reset the image preview and hide the "Cancel" button
        imagePreview.src = '#';
        imagePreview.style.display = 'none';
        cancelButton.style.display = 'none';
        // Clear the selected file from the input
        userImage.value = '';
    };
</script>
    
@endsection