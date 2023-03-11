<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\OwnersController;
use App\Http\Controllers\Admin\TeamOwnersController;
use App\Http\Controllers\Admin\ConventionsController;
use App\Http\Controllers\Admin\LeaguesController;
use App\Http\Controllers\Admin\PlayersController;
use App\Http\Controllers\Admin\csvController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\GameCheckController;
use App\Http\Controllers\Admin\PastsController;
use App\Http\Controllers\Admin\AdminTeamOwnersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('admin.welcome');
// });

// Leagues
Route::resource('leagues', LeaguesController::class)
    ->middleware('auth:admin')->except(['show']);

// conventions
Route::resource('conventions', ConventionsController::class)
    ->middleware('auth:admin')->except(['show']);

Route::middleware('auth:admin')->group(function () {
    Route::get('/pastmove', [PastsController::class, 'pastmove'])->name('pastmove');
    Route::get('/pastplayermove', [PastsController::class, 'past_player_move'])->name('pastplayermove');
});



// conventions ソフトデリート
Route::prefix('expired-conventions')
    ->middleware('auth:admin')->group(function () {
        Route::get('index', [ConventionsController::class, 'expiredConventionIndex'])->name('expired-conventions.index');
        Route::post('destroy/{convention}', [ConventionsController::class, 'expiredConventionDestroy'])->name('expired-conventions.destroy');
    });

// team_owners
Route::resource('team_owners', TeamOwnersController::class)
    ->middleware('auth:admin');

// Admin用team_ownersからのplayer一覧
Route::middleware('auth:admin')->group(function () {
    Route::get('edit/{team_player}', [AdminTeamOwnersController::class, 'edit'])->name('team_player.edit');
    Route::put('update/{team_player}', [AdminTeamOwnersController::class, 'update'])->name('team_player.update');
    Route::delete('destroy/{team_player}', [AdminTeamOwnersController::class, 'destroy'])->name('team_player.destroy');
});

// team_owners ソフトデリート
Route::prefix('expired-team_owners')
    ->middleware('auth:admin')->group(function () {
        Route::get('index', [TeamOwnersController::class, 'expiredTeamOwnerIndex'])->name('expired-team_owners.index');
        Route::post('destroy/{team_owner}', [TeamOwnersController::class, 'expiredTeamOwnerDestroy'])->name('expired-team_owners.destroy');
    });
// players
Route::resource('players', PlayersController::class)
    ->middleware('auth:admin');

Route::resource('owners', OwnersController::class)
    ->middleware('auth:admin')->except(['show']);

Route::prefix('expired-owners')
    ->middleware('auth:admin')->group(function () {
        Route::get('index', [OwnersController::class, 'expiredOwnerIndex'])->name('expired-owners.index');
        Route::post('destroy/{owner}', [OwnersController::class, 'expiredOwnerDestroy'])->name('expired-owners.destroy');
    });

Route::prefix('import')
    ->middleware('auth:admin')->group(function () {
        Route::get('csv', [csvController::class, 'index'])->name('import.csv');
        Route::post('csv/upload', [csvController::class, 'upload'])->name('upload.csv');
    });

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin'])->name('dashboard');

Route::prefix('info')
    ->middleware('auth:admin')->group(function () {
        Route::get('/', [InfoController::class, 'index'])->name('info.index');
        Route::get('create', [InfoController::class, 'create'])->name('info.create');
        Route::post('store', [InfoController::class, 'store'])->name('info.store');
        Route::get('edit/{info}', [InfoController::class, 'edit'])->name('info.edit');
        Route::post('update/{info}', [InfoController::class, 'update'])->name('info.update');
    });
Route::get('/game_check', [GameCheckController::class, 'index'])
    ->middleware('auth:admin')
    ->name('game_check.index');

// Route::get('/register', [RegisteredUserController::class, 'create'])
//     ->middleware('guest')
//     ->name('register');

// Route::post('/register', [RegisteredUserController::class, 'store'])
//     ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth:admin')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth:admin', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth:admin', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth:admin')
    ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('auth:admin');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:admin')
    ->name('logout');
