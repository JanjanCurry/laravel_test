<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $actors = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/person/popular')->json()['results'];

      //  dump($actors);
    return view('actors.index', [
      'actors' => $actors
    ]);
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

$actor = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/person/'.$id)->json();
$social = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/person/'.$id . '/external_ids')->json();
$credits = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/person/'.$id . '/combined_credits')->json();
$genresArray = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres'];

 $genres = collect($genresArray)->mapWithKeys(function ($genre){
  return [$genre['id'] => $genre['name']];
 });
      // dump($actor);
      // dump($social);
      // dump($credits);
         return view('actors.show', [
            'actor' => $actor,
            'social' => $social,
            'genres' => $genres,
            'credits' => $credits
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
