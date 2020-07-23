<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ViewModels\MovieViewModel;
use Carbon\Carbon;
class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $popularTvShows = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/tv/popular')->json()['results'];

        $genresArray = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/genre/tv/list')->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre){
          return [$genre['id'] => $genre['name']];
        });

        $topRated = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/tv/top_rated')->json()['results'];

        // dump($topRated);
         //dump($popularTvShows);
        $viewModel = new MovieViewModel(
            $popularTvShows,
            $genres,
            $topRated,
        );
    return view('tv.index', $viewModel);
    // return view('tv.index', [
    //   'popularTvShows' => $popularTvShows,
    //   'genres' => $genres,
    //   'topRated' => $topRated
    // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
     
    $movie = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/tv/'.$id .'?append_to_response=credits,videos,images')->json();

      //  dump($movie);
    return view('tv.show',[
      'movie' => $movie,

    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
