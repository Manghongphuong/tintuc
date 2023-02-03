<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TinController;
use App\Http\Middleware\Quantri;
use App\Http\Controllers\Admin\HomeAdminController;


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


Route::get('/', function () {
    return view('layouts.header');
})->middleware('auth','QuanTri');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//homeuser
Route::get('/', [TinController::class, 'index']);
Route::get('/detail/{id}', [TinController::class, 'detail']);
Route::get('/tincd/{id}', [TinController::class, 'tincd']);

//admin
Route::get('/qtv', [HomeAdminController::class, 'qtv'])->middleware('auth','QuanTri');

//category
Route::get('/dm/ds', [HomeAdminController::class, 'dsdm']);
Route::get('/dm/them',[HomeAdminController::class, 'themdm']);
Route::post('/dm/them',[HomeAdminController::class, 'themdm_']);
Route::get('/dm/xoa/{id}',[HomeAdminController::class, 'xoadm']);
Route::get('/dm/sua/{id}',[HomeAdminController::class, 'suadm']);
Route::post('/dm/sua/{id}',[HomeAdminController::class, 'suadm_']);
//post
Route::get('/post/ds', [HomeAdminController::class, 'dspost']);
Route::get('/post/them', [HomeAdminController::class, 'thempost']);
Route::post('/post/them', [HomeAdminController::class, 'thempost_']);
Route::get('/post/xoa/{id}', [HomeAdminController::class, 'xoapost']);
Route::get('/post/sua/{id}', [HomeAdminController::class, 'suapost']);
Route::post('/post/sua/{id}', [HomeAdminController::class, 'suapost_']);
//user
Route::get('/user/ds', [HomeAdminController::class, 'dsuser']);
Route::get('/user/xoa/{id}', [HomeAdminController::class, 'xoauser']);
Route::get('/user/sua/{id}', [HomeAdminController::class, 'suauser']);
Route::post('/user/sua/{id}', [HomeAdminController::class, 'suauser_']);




