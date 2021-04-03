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
        <div class="column justify-content-end" style="position: absolute";>
            <nav class="navbar nav">
                <ul class="navbar-nav">
                    <li><a href="#">Password Security</a></li>
                    <li><a href="#">Email Security</a></li>
                </ul>
            </nav>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <img src="../img/{{ Auth::user()->avatar }} " class="img-avatar justify-content-center">    
                        <form action="/profile" method="POST" enctype="multipart/form-data">
                            <hr>
                            <label for="files" id="label" class="input-label btn btn-primary">
                                <i class="icon-whatever"></i>
                                Select User Image
                            </label>
                            <input type="file" id="files" name="avatar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="custom-btn margin-top-10px pull-right btn btn-sm btn-success">Submit</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endguest
@endsection