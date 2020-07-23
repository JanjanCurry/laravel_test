@extends('layouts.movie')

@section('content')
<div class="container">
	
    <div class="row">
    	<div class="col-md-6">
    		<a href="{{ route('actors.show',  $actor['id']) }}">
        	<img src="https://image.tmdb.org/t/p/w500/{{$actor['profile_path']}}">
        	</a>
        	<div>
        		<ul >
        	 @if ($social['twitter_id'])   
        		<li style="display: inline;"><a href="https://twitter.com/{{ $social['twitter_id'] }}">Twitter</a></li>
        	 @endif
        	 @if ($social['facebook_id'])
        		<li style="display: inline;"><a href="https://facebook.com/{{ $social['facebook_id'] }}">Facebook</a></li>
        	 @endif
        	 @if ($social['instagram_id'])
        		<li style="display: inline;"><a href="https://instagram.com/{{ $social['instagram_id'] }}">Instagram</a></li>
        	 @endif
        		</ul>
        	</div>
    	</div>
    	<div class="col-md-6">
    		<div class="justify-content-center">
    			<h2>{{ $actor['name'] }}</h2>
        		<span>{{ $actor['birthday'] }} @ {{ $actor['place_of_birth'] }}</span>
        	</div>
        	<div>
	        	<p>{{ $actor['biography'] }}</p>
        	</div>
    	</div>	
    </div>

    <br>
    <hr>
    <div class="row">
        <h2><b>Movies: </b></h2>
    </div>
    <div class="row">
         @foreach ($credits['cast'] as $cast)
                @if ($loop->index < 8)

            <div class="col-md-3">
            <a href="{{ url('/movies_show/' .  $cast['id']) }}">
            <img src="https://image.tmdb.org/t/p/w185/{{$cast['poster_path']}}">
            </a>
             <div>
            <a href="{{ url('/movies_show/' .  $cast['id']) }}">{{$cast['title']}}</a>    
             </div>
             <div class="justify-content-center">
                <span>{{ $cast['vote_average'] * 10 . '%' }}</span>
                <span> | </span>
                <span> {{ $cast['release_date'] }}</span>
            </div>
            <div>
            @foreach ($cast['genre_ids'] as $genre)
         {{ $genres->get($genre) }} @if (!$loop->last), @endif
            @endforeach
            </div>
        </div>
                
                @endif
            @endforeach
    </div>

    <br>
    <hr>
    
    <div class="row">
        <h2><b>Credits: </b></h2>
    </div>
    <div class="row">
         
        <div class="col-md-3">
            <ul>
            @foreach ($credits['cast'] as $cast)
            @if ($loop->index < 30)

                <li>{{ $cast['release_date'] }} &middot; <strong>{{ $cast['original_title'] }}</strong> as {{ $cast['character'] }} </li>
            @endif
            @endforeach
            </ul>
        </div>
    </div>

    
 </div>
@endsection