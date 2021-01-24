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

//Route::middleware(['auth'])->post('/issues', 'IssueController@store');
Route::middleware(['auth'])->get('/issues/list', 'IssueController@list'); //remove middleware if issue list is intended to be publicly visible
Route::middleware(['auth'])->get('/issues/{issue}/resolve', 'IssueController@resolve');
Route::middleware(['auth'])->resource('issues','IssueController');  //remove middleware if issues are intended to be publicly visible
Route::get('/account', 'AccountController@index');
Route::get('/account/edit', 'AccountController@edit');
Route::put('/account/edit', 'AccountController@update');

Auth::routes(['register' => false]);
