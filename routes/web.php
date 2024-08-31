<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('contacts')// 頭に contacts をつける
    ->middleware(['auth'])//認証
    ->name('contacts.')//ルート名
    ->controller(ContactFormController::class)//コントローラー指定
    ->group(function(){//グループ化
        Route::get('/','index')->name('index');//名前付きルート
        Route::get('/create','create')->name('create');//名前付きルート
        Route::post('/','store')->name('store');//名前付きルート
        Route::get('/{id}', 'show')->name('show'); // {id}でviewからのルートパラメータを取得できる
        Route::get('/{id}/edit','edit')->name('edit');//名前付きルート
        Route::post('/{id}','update')->name('update');//名前付きルート
        Route::post('/{id}/destroy','destroy')->name('destroy');//


});


require __DIR__.'/auth.php';
