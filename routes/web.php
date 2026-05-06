<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembershipController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/memberships', [MembershipController::class, 'index']);
Route::get('/memberships/create', [MembershipController::class, 'create']);
Route::post('/memberships', [MembershipController::class, 'store']);
Route::get('/memberships/{id}/edit', [MembershipController::class, 'edit']);
Route::put('/memberships/{id}', [MembershipController::class, 'update']);
Route::delete('/memberships/{id}', [MembershipController::class, 'destroy']);

require __DIR__.'/auth.php';