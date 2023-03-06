<?php

use Illuminate\Http\Request;

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

Route::post('/login' , 'API\APIController@login');

Route::post('/new-user' , 'API\APIController@new_user');

Route::get('get/wabastagan/latest-clip' , 'API\APIController@get_user_five_wabastagans');

Route::get('/get-clips' , 'API\APIController@get_clips');

Route::get('/get-helping-videos' , 'API\APIController@get_helping_videos');





Route::group(['middleware' => 'auth_user'], function () {

Route::post('change-password' , 'API\APIController@change_password');

Route::get('get-user-profile' , 'API\APIController@get_profile');

Route::get('get-wabastagans' , 'API\APIController@get_wabastagans');

Route::get('get-user-tags' , 'API\APIController@get_user_tags');

Route::get('tag/get-wabastagans' , 'API\APIController@get_user_tag_wabastagans');


Route::post('/add-to-watch-clip' , 'API\APIController@add_to_watch_clip');


Route::post('/create-new-tag' , 'API\APIController@create_new_tag');

Route::post('/delete-tag' , 'API\APIController@delete_tag');

Route::post('/delete-wabasta' , 'API\APIController@delete_wabasta');

Route::post('/update-user-profile' , 'API\APIController@update_user_profile');

Route::post('/add-to-broadcast-list' , 'API\APIController@add_to_broadcast_list');

Route::post('/edit-broadcast-list' , 'API\APIController@edit_broadcast_list');

Route::get('/get-districts' , 'API\APIController@get_districts');

Route::get('/get/districts/forums/institutes/professions/activities' , 'API\APIController@get_districts_forums_institutes_professions_activities');

Route::get('/get-forums' , 'API\APIController@get_forums');



Route::get('/get-educational-institutes' , 'API\APIController@get_institutes');

Route::get('/get-tehsils-of-districts' , 'API\APIController@get_tehsils_of_districts');


});

// Route::middleware('auth:api')->get('/user', function (Request $request) {

//     return $request->user();

// });
