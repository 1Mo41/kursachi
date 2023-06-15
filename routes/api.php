<?php
use Src\Route;
Route::add('GET', '/', [Controller\Api::class, 'index']);
Route::add('POST', '/echo', [Controller\Api::class, 'echo']);
Route::add('POST', '/signup', [Controller\Api::class, 'signup']);
Route::add('POST', '/login', [Controller\Api::class, 'login']);
Route::add('POST', '/logout', [Controller\Api::class, 'logout']);
Route::add('POST', '/add_menu', [Controller\Api::class, 'add_menu']);
Route::add('DELETE', '/delete_menu/{id}', [Controller\Api::class, 'delete_menu']);
Route::add('POST', '/izmenenie_menu/{id}', [Controller\Api::class, 'izmenenie_menu']);
Route::add('POST', '/search', [Controller\Api::class, 'search']);
