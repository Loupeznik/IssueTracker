<?php

use App\Http\Controllers\AdminController;
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

// Issues
Route::get('/issues/list', 'IssueController@list');
Route::get('/issues/{issue}/resolve', 'IssueController@resolve');
Route::resource('issues','IssueController');

// Accounts
Route::get('/account', 'AccountController@index');
Route::get('/account/edit', 'AccountController@edit');
Route::put('/account/edit', 'AccountController@update');

// Helper category administration
Route::resource('/admin/category/priority', 'PriorityController')->except(['show', 'update']);
Route::resource('/admin/category/status', 'StatusController')->except(['show', 'update']);
Route::resource('/admin/category/type', 'TypeController')->except(['show', 'update']);

// User administration
Route::get('/admin/user', 'AdminController@userList');
Route::get('/admin/user/add', 'AdminController@addUserForm');
Route::post('/admin/user/add', 'AdminController@addUser');
Route::get('/admin/user/{id}/edit', 'AdminController@editUserForm');
Route::put('/admin/user/{id}/edit', 'AdminController@editUser');
Route::delete('/admin/user/{id}', 'AdminController@removeUser');

// Authentication routes
Auth::routes(['register' => false]); //allow registration if APP_PUBLIC=TRUE
