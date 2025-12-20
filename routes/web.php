<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\FrontendController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'home');
});

