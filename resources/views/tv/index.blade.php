@extends('layouts.movie')

@section('content')
<div class="container">
	<h2>Popular Tv Shows</h2>
    <div class="row justify-content-center">
    	
        @foreach ($popularTvShows as $show)
        <div class="col-md-3">
        	<a href="{{ route('tvshows.show',  $show['id']) }}">
        	<img src="{{ $show['poster_path'] }}">
        	</a>
        	 <div>
        	<a href="{{ route('tvshows.show',  $show['id']) }}">{{$show['original_name']}}</a>    
       		 </div>
       		 <div class="justify-content-center">
        		<span>{{ $show['vote_average'] }}</span>
        		<span> | </span>
        		<span> {{ $show['first_air_date'] }}</span>
        	</div>
        	<div>
        	@foreach ($show['genre_ids'] as $genre)
         {{ $genres->get($genre) }} @if (!$loop->last), @endif
        	@endforeach
        	</div>
        </div>
   @endforeach
    </div>
    <br>
    <hr>
    <h2><b>Top Rated Tv Shows</b></h2>
    <div class="row justify-content-center">
        @foreach ($topRated as $show)
        <div class="col-md-3">
        	<a href="{{ route('tvshows.show',  $show['id']) }}">
        	<img src="{{ $show['poster_path'] }}">
        	</a>
        	 <div>
        	<a href="{{ route('tvshows.show',  $show['id']) }}">{{$show['original_name']}}</a>    
       		 </div>
       		 <div class="justify-content-center">
        		<span>{{ $show['vote_average'] }}</span>
        		<span> | </span>
        		<span> {{ $show['first_air_date'] }}</span>
        	</div>
        	<div>
        	@foreach ($show['genre_ids'] as $genre)
         {{ $genres->get($genre) }} @if (!$loop->last), @endif
        	@endforeach
        	</div>
        </div>
   @endforeach
    </div>
</div>
@endsection
