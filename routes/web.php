<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Ruta asociada a la tabla contacts y a ContactController
    Route::resource('contacts', ContactController::class);

    //Ruta para ir a una página no asociada a un Controller
    Route::get('prueba', function () {
        return 'prueba';
    });

});
