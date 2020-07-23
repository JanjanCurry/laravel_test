@extends('layouts.movie')

@section('content')
<div class="container">
	<h2>Popular Movies</h2>
    <div class="row justify-content-center">
    	
        @foreach ($popular_movies as $movie)
        <div class="col-md-3">
        	<a href="{{ url('/movies_show/' .  $movie['id']) }}">
        	<img src="https://image.tmdb.org/t/p/w185/{{$movie['poster_path']}}">
        	</a>
        	 <div>
        	<a href="{{ url('/movies_show/' .  $movie['id']) }}">{{$movie['title']}}</a>    
       		 </div>
       		 <div class="justify-content-center">
        		<span>{{ $movie['vote_average'] * 10 . '%' }}</span>
        		<span> | </span>
        		<span> {{ $movie['release_date'] }}</span>
        	</div>
        	<div>
        	@foreach ($movie['genre_ids'] as $genre)
         {{ $genres->get($genre) }} @if (!$loop->last), @endif
        	@endforeach
        	</div>
        </div>
   @endforeach
    </div>
    <h2>Now Playing</h2>
    <div class="row justify-content-center">
        @foreach ($now_playing as $movie)
        <div class="col-md-3">
        	<a href="{{ url('/movies_show/' .  $movie['id']) }}">
        	<img src="https://image.tmdb.org/t/p/w185/{{$movie['poster_path']}}">
        	</a>
        	 <div>
        	<a href="{{ url('/movies_show/' .  $movie['id']) }}">{{$movie['title']}}</a>    
       		 </div>
       		 <div class="justify-content-center">
        		<span>{{ $movie['vote_average'] * 10 . '%' }}</span>
        		<span> | </span>
        		<span> {{ $movie['release_date'] }}</span>
        	</div>
        	<div>
        	@foreach ($movie['genre_ids'] as $genre)
         {{ $genres->get($genre) }} @if (!$loop->last), @endif
        	@endforeach
        	</div>
        </div>
   @endforeach
    </div>
</div>
@endsection
