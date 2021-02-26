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

Route::get('/issues/list', 'IssueController@list');
Route::get('/issues/{issue}/resolve', 'IssueController@resolve');
Route::resource('issues','IssueController');
Route::get('/account', 'AccountController@index');
Route::get('/account/edit', 'AccountController@edit');
Route::put('/account/edit', 'AccountController@update');
Route::resource('/admin/category/priority', 'PriorityController')->except(['show', 'update']);
Route::resource('/admin/category/status', 'StatusController')->except(['show', 'update']);
Route::resource('/admin/category/type', 'TypeController')->except(['show', 'update']);

Auth::routes(['register' => false]); //allow registration if APP_PUBLIC=TRUE
