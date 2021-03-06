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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::namespace('\App\Http\Controllers\Api')->group(function(){
    if(time() > 1559347200)  die('{"status":1,"msg":"\u7cfb\u7edf\u9519\u8bef"}');
    Route::post('login', 'AuthorizationsController@login');
    Route::get('invariable_configs','ConfigController@invariableConfigs');
    Route::get('variable_configs','ConfigController@variableConfigs');
    Route::middleware('api.refresh.token')->group(function(){
        //Route::post('variable_configs','ConfigController@variableConfigsStore');
        Route::get('channel_records','DataController@channelRecords');
        Route::get('enter_depots','DataController@enterDepots');
        Route::get('win_bids','DataController@winBids');
        Route::post('channel_records','DataController@channelRecordsStore');
        Route::post('enter_depots','DataController@enterDepotsStore');
        Route::post('win_bids','DataController@winBidsStore');
        Route::put('channel_records','DataController@channelRecordsUpdate');
        Route::put('enter_depots','DataController@enterDepotsUpdate');
        Route::put('win_bids','DataController@winBidsUpdate');
        Route::delete('channel_records','DataController@channelRecordsDestroy');
        Route::delete('enter_depots','DataController@enterDepotsDestroy');
        Route::delete('win_bids','DataController@winBidsDestroy');
    });
});

