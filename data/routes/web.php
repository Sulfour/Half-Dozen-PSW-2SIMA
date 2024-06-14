<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/', function () {
    return view('index');
}); 

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});



Route::get('admin_register', function(){
    return view('auth.register');
});

Route::get('quality', [App\Http\Controllers\OurProductController::class, 'retrieve_quality']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/insert', function () {
        return view('untuk_admin.insert');
    });
    
    
    
    Route::get('/admin', [App\Http\Controllers\OurProductController::class, 'retrieve_admin']);
    
    Route::get('/edit/{id}', [App\Http\Controllers\OurProductController::class, 'edit_page']);
    
    Route::post('/inserting', [App\Http\Controllers\OurProductController::class, 'insert']);
    
    Route::patch('/updating/{id}', [App\Http\Controllers\OurProductController::class, 'update']);
    
    Route::delete('/delete/{id}', [App\Http\Controllers\OurProductController::class, 'delete']);
    


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
