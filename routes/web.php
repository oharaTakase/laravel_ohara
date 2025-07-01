<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactFormController;
use Illuminate\Support\Facades\Route;

// routing for test
Route::get('tests/test', [TestController::class, 'index'])->name('test.index');

// お問い合わせフォーム用ルート
// Route::get('/cantacts',[ContactFormContoller::class, 'index'])->name('contacts.index');

// リソースコントローラー用のまとめてルート作成
// Route::resource('contacts', ContactFormController::class);

Route::prefix('contacts') // 頭に contacts をつける 
->middleware(['auth']) // 認証 
->name('contacts.') // ルート名 
->controller(ContactFormController::class) // コントローラ指定 
->group(function(){ // グループ化 
	Route::get('/', 'index')->name('index'); // 名前つきルート 
	Route::get('/create', 'create')->name('create'); 
}); 


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

require __DIR__.'/auth.php';
