<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SN Pasal</title>
    <link rel="stylesheet" href="{{asset('admin/css/admin.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
    <div class="login-container">
        <div class="login">
            <div class="login-title">Log In</div>
            <div class="text-center">Please enter your login and password</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                {{-- Email Address --}}
                <div class="">
                    <label for="email">Email</label>
                    <input type="email" class="form-control rounded-3" name="email" :value="old('email')" required>
                    
                        @error('email')
                        <span class="alert-danger">
                            {{$message}}
                        </span>  
                        @enderror
                </div>

                {{-- Password --}}
                <div class="">
                    <label for="password">Password</label>
                    <input type="password" class="form-control rounded-3" name="password" required>
                    @error('password')
                    <span class="alert-danger">
                        {{$message}}
                    </span>  
                    @enderror
                </div>
                <input type="submit" value="Log In" class="form-control mt-2" style="    background-color: rgb(143, 68, 235);
                font-weight: bold;
                color: white;
                margin-top: 5px;
                text-align: center;">

            <div class="row align-items-center">
                <div class="col ">
                    <div class="rememberMe" style="margin-left: 10px">
                        <label for="remember_me" class="d-flex align-items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                </div>
                <div class="col">
                    @if (Route::has('password.request'))
                    <a class="forgetpw" style="color: white;text-decoration:none" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                </div>
            </div>
            </form>

        </div>
    </div>
</body>
</html>
{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
