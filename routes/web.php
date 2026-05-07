<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembershipController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Membership View (USER + ADMIN can view)
|--------------------------------------------------------------------------
*/

Route::get('/memberships', [MembershipController::class, 'index'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Admin Only Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/memberships/create', [MembershipController::class, 'create']);
    Route::post('/memberships', [MembershipController::class, 'store']);
    Route::get('/memberships/{id}/edit', [MembershipController::class, 'edit']);
    Route::put('/memberships/{id}', [MembershipController::class, 'update']);
    Route::delete('/memberships/{id}', [MembershipController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| Join Membership (USER)
|--------------------------------------------------------------------------
*/

Route::post('/join-membership/{id}', [MembershipController::class, 'join'])
    ->middleware('auth');

require __DIR__.'/auth.php';