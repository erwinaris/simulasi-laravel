<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    return view('pages.home', ['title' => 'homepage']);
});

Route::get('/todo-list', [TodoListController::class, 'index']);
Route::post('/todo-list', [TodoListController::class, 'store']);
// Route::get('/todo-list/{id}/', [TodoListController::class, 'edit']);
Route::put('/todo-list/{id}', [TodoListController::class, 'update']);
Route::delete('/todo-list/{id}', [TodoListController::class, 'destroy']);

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);

Route::get('/edit', fn() => view('pages.blog.edit', ['title' => 'about']));
