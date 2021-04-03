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
                    <li class="nav-item"><a href="#" class="nav-link">Password Security</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Email Security</a></li>
                </ul>
            </nav>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger alert-block">
                                @foreach($errors->all() as $error)
                                   <li> {{ __($error) }}</li>
                                @endforeach                                
                            </div>
                        @endif
                        <?php $message = Session::get('sucess'); ?>
                        @if($message)
                            <div class="alert alert-success w100">
                                <strong class="container">{{ __($message) }}</strong>
                            </div>
                        @endif
                        <img src="../img/{{ Auth::user()->avatar }} " class="img-avatar justify-content-center">    
                        <form action="/profile" method="POST" enctype="multipart/form-data">
                            <hr>
                            <div class="container" id="container">
                                <label for="files" id="label" class="btn btn-primary btn-block">
                                    <i class="icon-whatever"></i>
                                    Select User Image
                                </label>
                            </div>
                            <input type="file" id="files" name="avatar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="custom-btn margin-top-10px pull-right btn btn-sm btn-success">Submit</button>
                       </form>
                       <br>
                    </div>
                    <div class="col-md-2">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/jquery.js"></script>
    <script src="./js/main.js"></script>
@endguest
@endsection