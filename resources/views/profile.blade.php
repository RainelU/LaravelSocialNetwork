@extends('layouts.app')
@section('content')
@guest
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Left Side Of Navbar -->
    <ul class="navbar-nav mr-auto">

    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    </ul>
</div>
@else
    <div class="container">
        <div class="column justify-content-end nav-absolute">
            <nav class="navbar nav nav-media">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a href="{{ route('user_image') }}" class="nav-link">User Image</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Password Security</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Email Security</a></li>
                </ul>
            </nav>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <hr>
                        <img src=" ./img/{{ Auth::user()->avatar }} " class="img-avatar justify-content-center">    
                        <hr>
                        <span class="alert alert-success btn-block text-align-center"> {{ Auth::user()->name }}</span>
                        <span class="alert alert-success btn-block text-align-center"> {{ Auth::user()->email }}</span>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endguest
@endsection