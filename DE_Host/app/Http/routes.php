<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Login Process
 */

use Illuminate\Support\Facades\Redis;

Route::get('/', 'Auth\DesignerAuthController@getLogin');
Route::post('/loginProcess', 'Auth\DesignerAuthController@postLogin');
Route::get('/logout', 'Auth\DesignerAuthController@getLogout');
// functioning page
Route::get('homepage', [
    'middleware' => 'auth',
    'uses' => 'PagesController@homepage'
]);
Route::get('userprofile', [
    'middleware' => 'auth',
    'uses' => 'PagesController@userprofile'
]);

Route::get('footweardata', [
    'middleware' => 'auth',
    'uses' => 'PagesController@footweardata'
]);

Route::get('datamenu', [
    'middleware' => 'auth',
    'uses' => 'PagesController@dataanalysis'
]);
Route::get('datamenu/ppd', [
    'middleware' => 'auth',
    'uses' => 'PagesController@dataanalysis_PPD'
]);

Route::get('datamenu/cop', [
    'middleware' => 'auth',
    'uses' => 'PagesController@dataanalysis_COP'
]);

Route::get('datamenu/ma', [
    'middleware' => 'auth',
    'uses' => 'PagesController@dataanalysis_MA'
]);
Route::get('modelling', [
    'middleware' => 'auth',
    'uses' => 'PagesController@modelling'
]);

Route::get('message', [
    'middleware' => 'auth',
    'uses' => 'PagesController@messageToUser'
]);

Route::post('message', [
    'middleware' => 'auth',
    'uses' => 'pagesController@messageToUserPost'
]);

/**
 * New Designer Registration
 */
Route::get('designer', 'Auth\DesignerAuthController@getRegister');
Route::post('designer/outcome', 'Auth\DesignerAuthController@postRegister');

Route::get('forgetPassword', 'NewDesignerController@forgetPassword');
Route::post('forgetPassword/redirect', 'NewDesignerController@emailVerification');


/**
 * Sensor Data Post
 */

Route::get('sensor', function(){
    return view('sensorData.windows');
});

/**
 * EMAIL VERIFICATON TEST
 */
get('test', 'RegisterController@register');
post('test', 'RegisterController@postRegister');
get('register/confirm/{email_token}', 'RegisterController@confirmEmail');
get('test/login', 'SessionController@login');
post('test/login', 'SessionController@postlogin');
get('test/logout', 'SessionController@logout');
get('test/dashboard', ['middleware' => 'auth', function(){

    return 'test success';

}]);