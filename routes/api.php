<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Photo;
use App\Photographer;
use App\ShowCase;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// posts
// CRUD is basically
// 1. get all (GET) /api/posts
// 2. create a post (POST) /api/posts
// 3. get a single (GET) /api/posts/{id}
// 4. update a single (PUT/PATCH) /api/posts/{id}
// 5. delete (DELETE) /api/posts/{id}

//Route::get('/photos', 'PhotoController@index');
//Route::post('/photos', 'PhotoController@store');
//Route::put('/photos', 'PhotoController@update');
//Route::delete('/photos', 'PhotoController@destroy');
//short way

Route::apiResource('photos', 'PhotoController');
Route::apiResource('photographers', 'PhotographerController');
Route::apiResource('galleries', 'GalleryController');
Route::apiResource('showcases', 'ShowCaseController');
//Route::get('/showcases', 'ShowCaseController@index');//CRR note: these will exclude all other methods,.. which is ideal, but getting 1 by id fails
//Route::get('/showcases/$id', 'ShowCaseController@index');

// to create a resource (posts) in laravel
// 1. create the database
// 2. create a model
// 2.5 create a service? Eloquent ORM!
// 3. create a controller to get info from the database
// 4. return that info

/*Route::get('/testing-the-api', function() {
    return ['message' => 'hello'];
});*///just an exercise

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
