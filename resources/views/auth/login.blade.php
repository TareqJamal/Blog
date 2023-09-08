<!doctype html>
<html lang="en">

<!-- Mirrored from bootstrap.gallery/elite-admin-dashboard/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Jun 2021 22:36:04 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Elite Admin Panel" />
    <meta name="keywords" content="Login, Unify Login, Admin, Admin Dashboard, Dashboard, Bootstrap4, Sass, CSS3, HTML5, Responsive Dashboard, Responsive Admin Template, Admin Template, Best Admin Template, Bootstrap Template, Themeforest" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="shortcut icon" href="{{asset('Admin')}}/img/favicon.ico" />
    <title> Dashboard - Login</title>

    <!--
        **********************
        **********************
        Common CSS files
        **********************
        **********************
    -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('Admin')}}/css/bootstrap.min.css" />

    <!-- Icomoon Icons CSS -->
    <link rel="stylesheet" href="{{asset('Admin')}}/fonts/icomoon/icomoon.css" />

    <!-- Master CSS -->
    <link rel="stylesheet" href="{{asset('Admin')}}/css/main.css" />

</head>

<body>

<!-- Container start -->
<div class="container">

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row justify-content-md-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="login-screen">
                    <div class="login-box">
                        <a href="#" class="login-logo">
                            <img src="{{asset('Admin')}}/img/logo.png" alt="Elite Admin Dashboard" />
                        </a>
                        <div class="form-group">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
{{--                            <input type="text" class="form-control" placeholder="Username" />--}}
                        </div>
                        <div class="form-group">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="form-control"
                                          type="password"
                                          name="password"
                                          required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
{{--                            <input type="password" class="form-control" placeholder="Password" />--}}
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control">
                                <option>Choose</option>
                                <option value="admin">Admin</option>
                                <option value="writer">Writer</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                                <div class="actions">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<!-- Container end -->

</body>

<!-- Mirrored from bootstrap.gallery/elite-admin-dashboard/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Jun 2021 22:36:04 GMT -->
</html>


