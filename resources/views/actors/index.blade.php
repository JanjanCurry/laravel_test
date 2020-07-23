@extends('layouts.movie')

@section('content')
<div class="container">
	<h2>Popular Actors</h2>
    <div class="row justify-content-center">
    	
        @foreach ($actors as $actor)
        <div class="col-md-3">
        	<a href="{{ route('actors.show',  $actor['id']) }}">
        	<img src="https://image.tmdb.org/t/p/w185/{{$actor['profile_path']}}">
        	</a>
        	 <div>
        	<a href="{{ route('actors.show',  $actor['id']) }}">{{$actor['name']}}</a>    
       		 </div>
       		 <div class="justify-content-center">
        		<span>{{ $actor['known_for_department'] }}</span>
        	</div>
        	 <div>
            @foreach ($actor['known_for'] as $films)
         @if(array_key_exists('title', $films))
            {{ $films['title'] }}
         
         @else
            {{ $films['name'] }}
          @endif

          @if (!$loop->last), @endif
            @endforeach
            </div>
        </div>
       
   @endforeach
   
    </div>
        
</div>
@endsection
