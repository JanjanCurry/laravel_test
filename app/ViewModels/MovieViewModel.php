<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;
class MovieViewModel extends ViewModel
{
	public $popularTvShows;
	public $genres;
	public $topRated;
  
    public function __construct($popularTvShows, $genres, $topRated)
    {
        $this->popularTvShows = $popularTvShows;
        $this->genres = $genres;
        $this->topRated = $topRated;
    }
   
    public function popularTvShows()
    {

    	return collect($this->popularTvShows)->map(function($movie){
    		//return $movie;
    		return collect($movie)->merge([
    			'poster_path' => 'https://image.tmdb.org/t/p/w185' . $movie['poster_path'],
    			'vote_average' => $movie['vote_average'] * 10 . '%'
    		]);
    	});
    	//return $this->popularTvShows;
    }
   
    public function genres()
    {
    	return $this->genres;
    }
    public function topRated()
    {
    	return collect($this->topRated)->map(function($movie){
    		//return $movie;
    		return collect($movie)->merge([
    			'poster_path' => 'https://image.tmdb.org/t/p/w185' . $movie['poster_path'],
    			'vote_average' => $movie['vote_average'] * 10 . '%'
    		]);
    	});
    }
}
