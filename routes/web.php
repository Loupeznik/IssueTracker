<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    if (Auth::user()) {
        return redirect('/issues');
    }
    return redirect('/login');
});

Route::post('/issues', 'IssueController@store');
Route::get('/issues/list', 'IssueController@list');
Route::get('/issues/{issue}/resolve', 'IssueController@resolve');
Route::resource('issues','IssueController');
Route::get('/account', 'AccountController@index');

Auth::routes(['register' => false]);
