<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::post('/locale', [\App\Http\Controllers\LocaleController::class, 'update'])->name('locale.update');
Route::get('/mail', function () {
    return Inertia::render('mail');
})->name('mail');
Route::get('contact',[\App\Http\Controllers\ContactController::class,'create'])->name('contact.create');
Route::post('contact',[\App\Http\Controllers\ContactController::class,'store'])->name('contact.store');
Route::get('dashboards', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboards');
Route::get('/test',function(){
    return view('mail.new_contact');
    foreach (['yassine.elmalki@gmail.com'] as $recipient) {
        \Illuminate\Support\Facades\Mail::to($recipient)->send(new \App\Mail\NewContactMail(null));
    }
    return 'ok';
});
require __DIR__.'/settings.php';
#require __DIR__.'/auth.php';
