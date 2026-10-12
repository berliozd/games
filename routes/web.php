<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome/Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'games' => DB::table('games')->orderBy('created_at', 'desc')->get()
    ]);
});

Route::get('/sitemap.xml', function () {
    $games = DB::table('games')->select('slug', 'updated_at')->orderBy('id')->get();

    return response()
        ->view('sitemap', ['games' => $games])
        ->header('Content-Type', 'application/xml');
});

Route::get('/g/{slug}', [App\Http\Controllers\GameController::class, 'index'])->name('game');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
