<?php
use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello']);
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add(['GET', 'POST'], '/add_personal', [Controller\Admin::class, 'add_personal'])
    ->middleware('admin');
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/glavnaya', [Controller\Site::class, 'glavnaya']);
Route::add(['GET','POST'], '/add_menu', [Controller\Admin::class, 'add_menu'])
    ->middleware('auth','admin');
Route::add(['POST','GET'], '/search', [Controller\Site::class, 'search']);
Route::add(['POST','GET'], '/update', [Controller\Admin::class, 'update']);
Route::add(['GET','POST'], '/proverkaAdmina', [Controller\Admin::class, 'proverkaAdmina'])
    ->middleware('auth','admin');
Route::add(['GET','POST'], '/proverka', [Controller\Site::class, 'proverka']);
Route::add(['GET','POST'], '/izmenenie', [Controller\Admin::class, 'izmenenie']);
Route::add(['GET','POST'], '/reviews', [Controller\Site::class, 'reviews']);
Route::add(['GET','POST'], '/add_reviews', [Controller\Site::class, 'add_reviews'])
    ->middleware('auth','admin');

