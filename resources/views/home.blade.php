@extends('layouts.app')
@section('content')

@if(Auth::user()->role === "ADM")
    <div class="container">
        <div class="navbar-nav navbar container">
            <span>Usuarios Registrados: 
                <strong>
                    <?php $count = count($users); echo $count; ?>
                </strong>
            </span>

        </div>
        <div class="navbar-nav navbar container">
            <?php
                $stack = array();
                foreach ($users as $user) {
                    if ($user->isOnline()) {
                        array_push($stack, $user->id);
                    }
                }

                $countUsers = count($stack);

                echo"<span>
                        Usuarios Online: 
                        <strong>" . 
                            $countUsers .
                        "</strong>
                    </span>";
            ?>
        </div>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">        
                    <div class="row">
                        @if(Auth::user()->role != "ADM")
                            <div class="navbar-nav navbar container">
                                <span>Usuarios Registrados: 
                                    <strong>
                                        <?php $count = count($users); echo $count;?>
                                    </strong>
                                </span>
                            </div>
                        @endif
                        @if($users)
                            @if(Auth::user()->role === "ADM")
                                <div class="container">
                                    <div style="width: 100%;text-align: center;" class="alert alert-success alert-block">User's & Admin's OnLine... <strong>Rank: {{ Auth::user()->name . ' [ ' . Auth::user()->role . ' ]' }}</strong></div> 
                                </div>  
                            @endif
                            @foreach($users as $user)
                                @if($user->isOnline())
                                    @if(Auth::user()->role === "ADM")
                                        <div style="margin-bottom: 20px;" class="col-md-6">
                                            <div class="col">
                                                <div class="button-online"></div>
                                                <div class="">
                                                    <img width="80px" height="80px" class="img-active" src="./img/{{ $user->avatar }}">
                                                    <span class="pos-ab prueba">{{ $user->name }}</span>
                                                    <strong>[ {{ $user->role }} ]</strong>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('contentunder')
@if($users)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="container">
                                    <div style="width: 100%;text-align: center;" class="alert alert-success alert-block">
                                        <strong>Chat with Friends</strong>
                                    </div> 
                                </div>
                                <div class="container row">
                                    @forelse($friends as $friend)
                                        @if($friend->isOnline())
                                            <div class="col friendDiv">
                                                <a class="friendA" href="{{ route('chat.show', $friend->id) }}">
                                                    <div class="friendAcomodar">
                                                        <div class="bg">
                                                            <div class="button-online-friend">
                                                                <span class="text-modified">
                                                                {{ $friend->name }}
                                                                </span>
                                                                <img style="width: 100px; height: 100px;" class="img-active" src="img/{{ $friend->avatar }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                             </div>
                                        @else
                                            <div class="col friendDiv">
                                                <a class="friendA" href="{{ route('chat.show', $friend->id) }}">
                                                    <div class="friendAcomodar">
                                                        <div class="bg">
                                                            <div class="button-offline-friend">
                                                                <span class="text-modified">
                                                                    {{ $friend->name }}
                                                                </span>
                                                                <img style="width: 100px; height: 100px;" class="img-active" src="img/{{ $friend->avatar }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                             </div>
                                        @endif
                                    @empty 
                                        <div class="panel-block center"> 
                                            <h4>No tienes amigos, agrega nuevos amigos.</h4>
                                            //! NECESITAMOS COLOCAR LISTADO DE PERSONAS Y AL PULSAR QUE ENVIE SOLICITUD
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endif            
@endsection

