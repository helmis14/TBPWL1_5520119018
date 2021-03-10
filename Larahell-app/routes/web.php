<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelolaController;
use App\Http\Controllers\ProfileController;


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
    return view('welcome');
});

Route::get('/test',function (){
    return 'Hello World';
});

Route::get('/halaman',function (){
    return view('admin');
});

Route::view('/greeting', 'greeting', ['name' => 'Ucok']);

Route::get('users/{id}', function ($id) {
    return 'User ' . $id;
});

Route::get('members/{name?}', function ($name = 'Samsul') {
    return 'Hello ' . $name;
})->name('mbr');

Route::get('posts/{title}', function ($title) {
    return 'Ini Post ' . $title;
})->where('title', '[A-Za-z]+');

Route::redirect('/halaman', '/greeting');
Route::get('/user/{name}', 'UserController@show');
//Route::get('/kelola', [KelolaController::class, 'index']);
Route::resource('kelola_barang', KelolaBarang::class);


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/book/create', [BookController::class, 'create'])->name('book');

