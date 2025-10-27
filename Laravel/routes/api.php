<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EatingController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HealthsController;
use App\Http\Controllers\MeasureController;
use App\Http\Controllers\SleepController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/logged', function (Request $request) {
    return $request->user();
});

// Route - Eat
Route::middleware('auth:sanctum')->get('/eats', [EatingController::class, 'index'])->name('eat.index');
Route::middleware('auth:sanctum')->get('/eats/{eat}', [EatingController::class, 'show'])->whereAlphaNumeric('eat')->name('eat.show');
Route::middleware('auth:sanctum')->post('/eats', [EatingController::class, 'store'])->name('eat.store');
Route::middleware('auth:sanctum')->put('/eats/{eat}', [EatingController::class, 'update'])->whereAlphaNumeric('eat')->name('eat.update');
Route::middleware('auth:sanctum')->delete('/eats/{eat}', [EatingController::class, 'destroy'])->whereAlphaNumeric('eat')->name('eat.destroy');

// Route - Event
Route::middleware('auth:sanctum')->get('/events', [EventsController::class, 'index'])->name('event.index');
Route::middleware('auth:sanctum')->get('/events/{event}', [EventsController::class, 'show'])->whereAlphaNumeric('event')->name('event.show');
Route::middleware('auth:sanctum')->post('/events', [EventsController::class, 'store'])->name('event.store');
Route::middleware('auth:sanctum')->put('/events/{event}', [EventsController::class, 'update'])->whereAlphaNumeric('event')->name('event.update');
Route::middleware('auth:sanctum')->delete('/events/{event}', [EventsController::class, 'destroy'])->whereAlphaNumeric('event')->name('event.destroy');

// Route - Health
Route::middleware('auth:sanctum')->get('/healths', [HealthsController::class, 'index'])->name('health.index');
Route::middleware('auth:sanctum')->get('/healths/{health}', [HealthsController::class, 'show'])->whereAlphaNumeric('health')->name('health.show');
Route::post('/healths', [HealthsController::class, 'store'])->name('health.store');
Route::middleware('auth:sanctum')->put('/healths/{health}', [HealthsController::class, 'update'])->whereAlphaNumeric('health')->name('health.update');
Route::middleware('auth:sanctum')->delete('/healths/{health}', [HealthsController::class, 'destroy'])->whereAlphaNumeric('health')->name('health.destroy');

// Route - Measure
Route::middleware('auth:sanctum')->get('/measures', [MeasureController::class, 'index'])->name('measure.index');
Route::middleware('auth:sanctum')->get('/measures/{measure}', [MeasureController::class, 'show'])->whereAlphaNumeric('measure')->name('measure.show');
Route::middleware('auth:sanctum')->post('/measures', [MeasureController::class, 'store'])->name('measure.store');
Route::middleware('auth:sanctum')->put('/measures/{measure}', [MeasureController::class, 'update'])->whereAlphaNumeric('measure')->name('measure.update');
Route::middleware('auth:sanctum')->delete('/measures/{measure}', [MeasureController::class, 'destroy'])->whereAlphaNumeric('measure')->name('measure.destroy');

// Route - Sleep
Route::middleware('auth:sanctum')->get('/sleeps', [SleepController::class, 'index'])->name('sleep.index');
Route::middleware('auth:sanctum')->get('/sleeps/{sleep}', [SleepController::class, 'show'])->whereAlphaNumeric('sleep')->name('sleep.show');
Route::middleware('auth:sanctum')->post('/sleeps', [SleepController::class, 'store'])->name('sleep.store');
Route::middleware('auth:sanctum')->put('/sleeps/{sleep}', [SleepController::class, 'update'])->whereAlphaNumeric('sleep')->name('sleep.update');
Route::middleware('auth:sanctum')->delete('/sleeps/{sleep}', [SleepController::class, 'destroy'])->whereAlphaNumeric('sleep')->name('sleep.destroy');

// Route - Training
Route::middleware('auth:sanctum')->get('/trainings', [TrainingController::class, 'index'])->name('training.index');
Route::middleware('auth:sanctum')->get('/trainings/{training}', [TrainingController::class, 'show'])->whereAlphaNumeric('training')->name('training.show');
Route::middleware('auth:sanctum')->post('/trainings', [TrainingController::class, 'store'])->name('training.store');
Route::middleware('auth:sanctum')->put('/trainings/{training}', [TrainingController::class, 'update'])->whereAlphaNumeric('training')->name('training.update');
Route::middleware('auth:sanctum')->delete('/trainings/{training}', [TrainingController::class, 'destroy'])->whereAlphaNumeric('training')->name('training.destroy');

// Route - User
Route::middleware('auth:sanctum')->get('/users', [UsersController::class, 'index'])->name('user.index');
Route::middleware('auth:sanctum')->get('/user', [UsersController::class, 'show'])->name('user.show');
Route::post('/users', [UsersController::class, 'store'])->name('user.store');
Route::middleware('auth:sanctum')->put('/users/{user}', [UsersController::class, 'update'])->whereAlphaNumeric('user')->name('user.update');
Route::middleware('auth:sanctum')->delete('/users/{user}', [UsersController::class, 'destroy'])->whereAlphaNumeric('user')->name('user.destroy');

Route::post("/login", [AuthController::class, "authenticate"])->name("login");
Route::post("/logout", [AuthController::class, "logout"])->name("logout");