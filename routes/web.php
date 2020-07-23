<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Address;
use App\Post;
use App\Tag;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/one-to-one', 'RelationshipController@one_to_one');

Route::get('/one-to-many', 'RelationshipController@one_to_many');

Route::get('/many-to-many', 'RelationshipController@many_to_many');
Route::get('/has-one-through', 'RelationshipController@has_one_through');
Route::get('/has-many-through', 'RelationshipController@has_many_through');

Route::get('/user', function () {
	// has() method fetch only the users who has posts/ doesntHave() method is the oppsit
    $users = \App\User::has('posts')->with('posts')->get();
    return view('user.index', compact('users'));


});

Route::get('/post', function () {
	// \App\Tag::create([
 //    	'name' => 'VueJS'
 //    ]);
   
    // $tag = \App\Tag::first();
     //$post = \App\Post::with('tag')->first();
    // $post->tag()->attach([2,3,4]);
   // $post->tag()->sync([2,4]);
    $posts = \App\Post::with('user', 'tag')->get();
    return view('post.index', compact('posts'));
});
Route::get('/tags', function () {

  $tags = \App\Tag::with('post')->get();
    return view('tags.index', compact('tags'));
});
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebookProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookProviderCallback');
Route::get('login/google', 'Auth\LoginController@redirectToGoogleProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleProviderCallback');

Route::get('/movies', function () {
 $popular_movies = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/popular')->json()['results'];

 $genresArray = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres'];

 $genres = collect($genresArray)->mapWithKeys(function ($genre){
  return [$genre['id'] => $genre['name']];
 });

 $now_playing = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/now_playing')->json()['results'];

    //    dump($now_playing);
    return view('movies.index', [
      'popular_movies' => $popular_movies,
      'genres' => $genres,
      'now_playing' => $now_playing
    ]);
});
Route::get('/movies_show/{id}', function ($id) {
 
$movie = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/'.$id .'?append_to_response=credits,videos,images')->json();

     //   dump($movie);
    return view('movies.show',[
      'movie' => $movie,

    ]);
});

Route::resource('actors', 'ActorsController');
Route::resource('tvshows', 'TvController');

