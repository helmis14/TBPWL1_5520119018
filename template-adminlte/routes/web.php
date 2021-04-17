<?php

use App\Http\Controllers\AdminController as Admin;
use App\Http\Controllers\HomeController as Home;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [Home::class, 'index'])
    ->name('home')
    ->middleware('auth');

Route::get('/admin/home', [Admin::class, 'index'])
    ->name('admin.home')
    ->middleware('is_admin');

Route::get('/admin/books', [Admin::class, 'books'])
    ->name('admin.books')
    ->middleware('is_admin');

Route::post('/admin/books', [Admin::class, 'submit_book'])
    ->name('admin.book.submit')
    ->middleware('is_admin');

Route::patch('admin/books/update', [App\Http\Controllers\AdminController::class, 'update_book'])
    ->name('admin.book.update')
    ->middleware('is_admin');

Route::get('/admin/api/dataBuku/{id}', [Admin::class, 'getDataBuku'])
    ->name('api.book')
    ->middleware('is_admin');

Route::delete('admin/books/delete', [App\Http\Controllers\AdminController::class, 'delete_book'])
    ->name('admin.book.delete')
    ->middleware('is_admin');
