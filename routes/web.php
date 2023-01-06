<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CameraImageController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProductController;
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

Route::middleware(['auth'])->group(function () {
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

    Route::group(['prefix' => "product", "as" => "product"], function (){
        Route::get('', [ProductController::class, 'index'])->name('.index');
        Route::get('create', [ProductController::class, 'create'])->name('.create');
        Route::post('create', [ProductController::class, 'store'])->name('.store');
        Route::get('show/{id}', [ProductController::class, 'show'])->name('.show');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('.edit');
        Route::post('edit/{id}', [ProductController::class, 'update'])->name('.update');
        Route::get('delete/{id}', [ProductController::class, 'destroy'])->name('.destroy');
    });

    Route::group(['prefix' => 'camera-images', 'as' => 'camera-images'], function () {
        Route::get('', [CameraImageController::class, 'index'])->name('.index');
    });
});


Route::get('uploads/find', [UploadController::class, 'find'])->name('find');
Route::get('uploads/products/{file}', [UploadController::class, 'product'])->name('uploads.file');
Route::get('uploads/{id}', [UploadController::class, 'show'])->name('uploads');
Route::get('uploads', [UploadController::class, 'index'])->name('uploads.index');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'checkUser'])->name('login.check');
Route::get('register', [AuthController::class, 'register'])->name('register.index');
Route::post('register', [AuthController::class, 'createUser'])->name('register.create');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');