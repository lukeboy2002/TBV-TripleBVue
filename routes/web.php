<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('team', function () {
    return Inertia::render('Team');
})->name('team');
Route::get('games', function () {
    return Inertia::render('Games');
})->name('games');
Route::get('images', function () {
    return Inertia::render('Images');
})->name('images');
Route::get('posts', function () {
    return Inertia::render('Posts');
})->name('posts');
Route::get('agenda', function () {
    return Inertia::render('Agenda');
})->name('agenda');
