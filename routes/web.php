<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\TaskController;

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');



use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');


    use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
use App\Http\Controllers\ProfileController;

Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profile.edit');
use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;


                Route::middleware(['auth'])->group(function () {
                    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
                    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
                });
                Route::middleware(['auth'])->group(function () {
                    Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
                                ->name('verification.notice');
                    Route::get('/email/verify/{id}/{hash}', [EmailVerificationNotificationController::class, 'verify'])
                                ->middleware(['signed', 'throttle:6,1'])
                                ->name('verification.verify');
                    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                                ->middleware(['throttle:6,1'])
                                ->name('verification.send');
                });





                use App\Http\Controllers\Auth\NewPasswordController;

                Route::middleware(['auth'])->group(function () {
                    Route::post('/user/password', [NewPasswordController::class, 'store'])
                                ->name('password.update');
                });


                Route::middleware(['auth'])->group(function () {
                    Route::delete('/user/profile', [ProfileController::class, 'destroy'])
                                ->name('profile.destroy');
                });










