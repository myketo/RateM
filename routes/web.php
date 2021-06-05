<?php

use App\Http\Controllers\ItemListController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Models\ItemList;
use App\Models\User;
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
    return view('home.welcome');
});

Route::get('/register', [RegistrationController::class, 'create']);
Route::post('register', [RegistrationController::class, 'store']);

Route::get('/login', [LoginController::class, 'create']);
Route::post('login', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'destroy']);

Route::get('/user/{user:name}', [UserController::class, 'show'])->middleware('auth');

Route::resource('user.list', ItemListController::class)->parameters([
    'user' => 'user:name',
    'list' => 'list:name',
])->except([
    'list.index'
]);
Route::get('/user/{user:name}/lists', [ItemListController::class, 'index']);