<?php

use App\Http\Controllers\Landing;
use App\Http\Controllers\Dashboard\Profile;
use App\Http\Controllers\Dashboard\Candidate;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Storage\ServeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
|
| You can list public endpoint for any user in here. These routes are not guarded
| by any authentication system. In other words, any user can access it directly.
| Remember not to list anything of importance, use authenticate route instead.
*/

Route::get('/', Landing\HomeController::class)->name('landing');
Route::get('/timeline', Landing\TimelineController::class)->name('timeline');
Route::get('/candidates', Landing\CandidateController::class)->name('candidates');

Route::get('storage/{path}', ServeController::class)->where('path', '.*')
    ->middleware('throttle:15,1');

/*
|--------------------------------------------------------------------------
| Authenticated Route
|--------------------------------------------------------------------------
|
| In here you can list any route for authenticated user. These routes
| are meant to be used privately since the access is exclusive to authenticated
| user who had obtained their access through the login process.
*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', HomeController::class)->name('dashboard');

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/account', Profile\AccountController::class)->name('account');
    });

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('/candidates', Candidate\CandidateController::class);

        Route::get('/voters', function () {
            return view('dashboard.voters.index');
        })->name('voters');

        Route::get('/batches', function () {
            return view('dashboard.batches.index');
        })->name('batches');

        Route::get('/sessions', function () {
            return view('dashboard.sessions.index');
        })->name('sessions');

        Route::get('/admins', function () {
            return view('dashboard.admins.index');
        })->name('admins');

        Route::get('/settings', function () {
            return view('dashboard.settings.index');
        })->name('settings');

        Route::get('/profile', function () {
            return view('dashboard.profile.index');
        })->name('profile');
    });
});
