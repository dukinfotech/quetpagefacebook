<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

Route::view('/', 'welcome');
Route::post('/api/users/login', [UserController::class, 'login']);