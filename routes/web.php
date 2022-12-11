<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UploadController;
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
    return view('home.index');
})->name('home');

Route::group(['prefix' => "characters", "as" => "character"], function (){
    Route::get('', [CharacterController::class, 'index'])->name('.index');
    Route::get('create', [CharacterController::class, 'create'])->name('.create');
    Route::post('create', [CharacterController::class, 'store'])->name('.store');
    Route::get('files/{id}', [CharacterController::class, 'show'])->name('.show');
});

Route::group(['prefix' => "file", "as" => "file"], function (){
    Route::get('', [FileController::class, 'index'])->name('.index');
    Route::get('open', [FileController::class, 'fileOpen'])->name('.file-open');
    Route::get('create', [FileController::class, 'create'])->name('.create');
    Route::post('create', [FileController::class, 'store'])->name('.store');
    Route::get('show/{id}', [FileController::class, 'show'])->name('.show');
});

Route::get('uploads/find', [UploadController::class, 'find'])->name('find');
Route::get('uploads/{id}', [UploadController::class, 'show'])->name('uploads');
Route::get('uploads', [UploadController::class, 'index'])->name('uploads.index');

Route::get('login', [AuthController::class, 'index'])->name('login.index');
Route::post('login', [AuthController::class, 'checkUser'])->name('login.check');
Route::get('register', [AuthController::class, 'register'])->name('register.index');
Route::post('register', [AuthController::class, 'createUser'])->name('register.create');