<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\FrontendController;
use App\Http\Controllers\Backend\BackendController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['controller' => FrontendController::class], function() {
    Route::get('/', 'home')->name('home');
    Route::any('/user/login', 'user_login')->name('user.login');
    Route::any('/new-account', 'newAccount')->name('user.login');
});


Route::group([/*'prefix' => 'admin', 'as' => 'admin.',*/ 'controller' => BackendController::class, 'middleware' => ['auth', 'verified', 'role:admin']], function() {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/user_logout', 'user_logout')->name('user.logout');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
