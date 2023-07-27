<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SN Pasal | Reset Password</title>
    <link rel="stylesheet" href="{{asset('admin/css/admin.css')}}">
    <link rel="icon" href="{{asset('admin/img/favicon_io/android-chrome-512x512.png')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
    <div class="login-container">
        <div class="login">
            <div class="login-title">Forget Password</div>
            <div class="text-justify">Please enter your email to get reset password link.</div>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                    <!-- Session Status -->
                <x-auth-session-status class="my-2 px-2 rounded-3 text-success bg-white" :status="session('status')" />
                {{-- Email Address --}}
                <div class="mt-2">
                    <label for="email">Email</label>
                    <input type="email" class="form-control rounded-3" name="email" :value="old('email')" required>
                    
                        @error('email')
                        <span class="bg-white text-danger px-2 rounded-3">
                            {{$message}}
                        </span>  
                        @enderror
                </div>

                <input type="submit" value="Email Password Reset Link" class="form-control mt-2" style="    background-color: rgb(143, 68, 235);
                font-weight: bold;
                color: white;
                margin-top: 5px;
                text-align: center;">

            </form>

        </div>
    </div>
</body>
</html>


{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
