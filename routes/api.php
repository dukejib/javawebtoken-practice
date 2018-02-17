<?php

use Illuminate\Http\Request;
use App\Joke;
use App\Transformers\JokeTransformer;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/user',function(Request $request){
    
    $token = JWTAuth::getToken();
    $user = JWTAuth::toUser($token);
    return $user;
    
})->middleware('jwt.auth');

Route::post('/authenticate','ApiAuthController@authenticate')->name('authenticate');

Route::post('/register','ApiAuthController@register')->name('register');

Route::get('/jokes', function () {

    return fractal(Joke::all(),new JokeTransformer);

})->middleware('jwt.auth');

Route::post('/like', 'LikesController@like')->name('like');
Route::post('/unlike', 'LikesController@unlike')->name('unlike');

Route::resource('jokes', 'JokesController');