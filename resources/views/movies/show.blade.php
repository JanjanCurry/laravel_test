@extends('layouts.movie')

@section('content')
<div class="container">
	
    <div class="row">
    	<div class="col-md-6">
    		<a href="{{ url('/movies_show/' .  $movie['id']) }}">
        	<img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}">
        	</a>
    	</div>
    	<div class="col-md-6">
    		<div class="justify-content-center">
    			<h2>{{ $movie['title'] }}</h2>
        		<span>{{ $movie['vote_average'] * 10 . '%' }}</span>
        		<span> | </span>
        		<span> {{ $movie['release_date'] }}</span>
        	</div>
        	<div>
        	@foreach ($movie['genres'] as $genre)
         {{ $genre['name'] }} @if (!$loop->last), @endif
        	@endforeach
        	</div>
        	<div>
        		<p>{{ $movie['overview'] }}</p>
        	</div>
        	<div>
        		<h4>Featured Crew</h4>
        		@foreach ($movie['credits']['crew'] as $crew)
        			@if ($loop->index < 2)
        			<div>{{ $crew['name'] }}</div>
        			<div>{{ $crew['job'] }}</div>
                    @else
                        @break
        			@endif
        		@endforeach
        	</div>
            <div>
                <a href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}" class="btn-primary">
                    <i class="fa fa-home"> Play Trailer </i>
                </a>
            </div>
    	</div>	
    </div>

    <br>
    <hr>
    <div class="row">
        <h2><b>Cast and Characters: </b></h2>
    </div>
      <div class="row">
        @foreach ($movie['credits']['cast'] as $cast)
        @if ($cast['profile_path'] && $loop->index < 5)    
       <div class="col-md-3">
        
            <a href="{{ route('actors.show',  $cast['id']) }}">          
            <img src="https://image.tmdb.org/t/p/w185/{{$cast['profile_path']}}">
            </a>
          
             <div class="justify-content-center">
                <span>{{$cast['name']}} as</span>
                <div>{{$cast['character']}}</div>
                
            </div>
           
        </div>
        @endif  
        @endforeach 
    </div>

    <br>
    <hr>
    <div class="row">
        <h2><b>Images: </b></h2>
    </div>
      <div class="row">
        @foreach ($movie['images']['backdrops'] as $image)
        @if ($loop->index < 11)    
      
       <div class="col-md-4" style="margin-bottom: 50px">
         <img src="https://image.tmdb.org/t/p/w342/{{$image['file_path']}}">
       </div>
       @else
                        @break
       @endif
        @endforeach 
    </div>
 </div>
@endsection