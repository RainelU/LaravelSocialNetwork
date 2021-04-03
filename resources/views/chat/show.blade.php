@extends('layouts.appmessage')

@section('content')
	@guest
	@else
	<div class="container">
		<div class="column is-8 is-offset-2">
			<div class="card">
				<div class="card-body">
					<div class="card-body">
						<img src="../img/{{ $friends->avatar }}" width="80px" height="80px" class="img-active">
						{{ $friends->name }}
					</div>
					<form method="POST" action="{{ route('messages.store') }}">
						{{ csrf_field() }}
						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
						<input type="hidden" name="friend_id" value="{{ $friends->id }}">

						<input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
						<input type="hidden" name="friend_name" value="{{ $friends->name }}">
						<div class="card-body">
							<div class="box-message form-group" id="box-message" style="border:.2px solid black;height: 200px;overflow-y:scroll;bottom: 0;">
								<div class="card-body">
									@if(isset($chats))
										@foreach($chats as $chat)
											@if(Auth::user()->id === $chat->friend_id)
												<div style="display:grid;grid-template-columns: auto auto auto;">
													<div class="display-flex">
														<img class="img-notification" src="../img/{{ $friends->avatar }}">
														<p class="btn-secondary container" style="border-radius: 50px;padding:0px 0px 0px 10px ;float: left;">
															<strong>{{ $chat->user_name }}:</strong> {{ $chat->chat }}
														</p>
													</div>
												</div>
											@else
												<div style="text-align:right;display:grid;grid-template-columns: auto auto auto;">
													<p></p>
													<p></p>
													<div class="display-flex">
														<p class="btn-primary container" style="border-radius: 50px;padding:0px 10px 0px 0px;">
															<strong>{{ Auth::user()->name }}:</strong> {{ $chat->chat }}
														</p>
														<img class="img-notification" src="../img/{{ Auth::user()->avatar }}">
													</div>
												</div>
											@endif
										@endforeach
									@endif
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="form-group">
								<textarea name="chat" id="textarea" style="height: 50px;" class="form-control" placeholder="Escribe aquí tu mensaje"></textarea>
							</div>
							<button class="btn btn-primary btn-block">Enviar</button>
						</div>
					</form>
					<div class="container is-pulled-right">
						<a href="{{ url('/home') }}" class="is-link">
							<i class="fa fa-arrow-left"></i>
							Go Back
						</a>
					</div>
					<chat></chat>
				</div>
			</div>
		</div>
	</div>
	@endguest
@endsection