@extends('layouts.app')
    <meta http-equiv="refresh" content="url={{ route('tweets') }}">
    <title>Tweets by Rainel1978 Developer</title>
@section('test')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tweets - Laravel</div>
                <div class="alert alert-danger" style="text-align: center;" role="alert">
                    THIS IS THE FUCKING BETTER BASKET IN ALL THE WORLD, NO FUCKING WAY
                </div>
                <div style="display: flex;">
                    <div class="card-body">
                        <a class="twitter-timeline" href="https://twitter.com/NBA/likes?ref_src=twsrc%5Etfw">Tweets Liked by @NBA</a> <script src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                    <div class="card-body">
                        <a href="https://instawidget.net/v/user/nba" id="link-a6a79888ed7733325a032de0d657cb4c8f40c755681cdb59afd01391a87feee0">@nba</a>
                        <script src="https://instawidget.net/js/instawidget.js?u=a6a79888ed7733325a032de0d657cb4c8f40c755681cdb59afd01391a87feee0&width=300px"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
