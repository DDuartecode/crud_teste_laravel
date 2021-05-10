<?php

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

Route::get('/', function () {
    return view('pessoas.home');
});

Auth::routes();

Route::get('/admin', [App\Http\Controllers\PersonController::class, 'showPeoples'])->name('admin');
Route::get('/admin/login', [App\Http\Controllers\PersonController::class, 'showLogin'])->name('admin_login');
Route::post('/admin/login/do', [App\Http\Controllers\PersonController::class, 'login'])->name('admin_login_do');
Route::get('/admin/logout', [App\Http\Controllers\PersonController::class, 'logout'])->name('admin_logout');

Route::get('/cad', [App\Http\Controllers\PersonController::class, 'cadUser'])->name('cad_user');

Route::get('/people/{id}/show', [App\Http\Controllers\PersonController::class, 'show'])->name('show_peoples');
Route::get('/people/new', [App\Http\Controllers\PersonController::class, 'create'])->name('cad_people');
Route::post('/people/new', [App\Http\Controllers\PersonController::class, 'store'])->name('save_people');
Route::get('/people/{id}/edit', [App\Http\Controllers\PersonController::class, 'edit'])->name('edit_people');
Route::put('/people/{id}/edit', [App\Http\Controllers\PersonController::class, 'update'])->name('edit_people');
Route::delete('/people/{id}/del', [App\Http\Controllers\PersonController::class, 'destroy'])->name('del_people');


