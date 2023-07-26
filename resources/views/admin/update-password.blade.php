<div class="user-title">
    Update Password
</div>
@if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
@endif
<div class="password-update-container">
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="col rounded-3 bg-white p-1">
            <label for="current_password">Current Password</label>
            <input type="password" class="form-control mt-1" name="current_password">
            <span class="text-danger">
                @error('current_password','updatePassword')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="col rounded-3 bg-white p-1 mt-2">
            <label for="password">New Password</label>
            <input type="password" class="form-control mt-1" name="password">
            <span class="text-danger">
                @error('password','updatePassword')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="col rounded-3 bg-white p-1 mt-2">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control mt-1" name="password_confirmation">
            <span class="text-danger">
                @error('password_confirmation','updatePassword')
                    {{$message}}
                @enderror
            </span>
        </div>
        <input type="submit" value="Update Password" class="form-control mt-2" style="    background-color: rgb(143, 68, 235);
        font-weight: bold;
        color: white;
        margin-top: 5px;
        text-align: center;">

    </form>
</div>



