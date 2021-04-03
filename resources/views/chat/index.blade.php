@extends('layouts.app')

@section('content')
	<div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="container">
                                    <div style="width: 100%;text-align: center;" class="alert alert-success alert-block">
                                        <strong>Chatea con tus Amigos</strong>
                                    </div> 
                                </div>
                                <div class="container row">
                                    @forelse($friends as $friend)
                                         <div class="col friendDiv">
                                            <a class="friendA" href="{{ route('chat.show', $friend->id) }}">
                                                <div class="friendAcomodar">
                                                    <div class="bg">
                                                        <span class="text-modified">
                                                            {{ $friend->name }}
                                                        </span>
                                                        <img style="width: 100px; height: 100px;" class="img-active" src="img/{{ $friend->avatar }}">
                                                    </div>
                                                </div>
                                            </a>
                                         </div>
                                    @empty 
                                        <div class="panel-block"> 
                                            You don't have any friends.
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection