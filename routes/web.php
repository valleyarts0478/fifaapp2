<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComponentTestController;
use App\Http\Controllers\LifeCycleTestController;
use App\Http\Controllers\User\ItemController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\MatchController;
use App\Http\Controllers\User\ConventionsResultsController;
use App\Http\Controllers\User\PlayerRankController;
use App\Http\Controllers\User\TeamListController;
// use App\Http\Controllers\User\UserInfoController;
use App\Http\Controllers\User\PlayerRecruitmentController;
use App\Http\Controllers\User\PlayerRankTotalController;
use App\Http\Controllers\User\WelcomeController;

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
//Laravelbreezeにより追加
// Route::get('/dashboard', function () {
//     return view('user.dashboard');
// })->middleware(['auth:users'])->name('dashboard');

// Route::get('/', function () {
//     return view('user.welcome');
// })->middleware('guest')->name('welcome');
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('user.welcome');
// })->middleware('guest')->name('welcome');


Route::middleware('guest')->group(function () {
    Route::get('/', [WelcomeController::class, 'index'])->name('index');
    Route::get('/infolist', [welcomeController::class, 'infolist'])->name('infolist');
    Route::get('/infolist/{id}', [welcomeController::class, 'show'])->name('infolist.show');
});


Route::get('/regulation', function () {
    return view('user/regulation');
})->middleware('guest')->name('regulation');

Route::get('/recruitment', function () {
    return view('user/recruitment');
})->middleware('guest')->name('recruitment');

Route::resource('player_recruitment', PlayerRecruitmentController::class)
    ->middleware('guest');

//スライダー
Route::get('/slider', function () {
    return view('user/slider');
})->middleware('guest')->name('slider');
// Route::get('/team_owner/login', function () {
//     return view('team_owner.welcome');
// })->middleware('guest');

//得点王・アシスト王New
Route::get('/player_rank_total', [PlayerRanktotalController::class, 'index'])
    ->middleware('guest')
    ->name('playerranktotal');
//過去大会結果
Route::middleware('guest')->group(function () {
  Route::get('/past_competitions', [ConventionsResultsController::class, 'past'])->name('past_competitions'); 
  Route::get('/current_competitions', [ConventionsResultsController::class, 'current'])->name('current_competitions');
});
   
//得点王・アシスト王
// Route::get('/player_rank', [PlayerRankController::class, 'index'])
//     ->middleware('guest')
//     ->name('player_rank');
//ランキングなし
Route::get('/no_match', [PlayerRankController::class, 'no_match'])
    ->middleware('guest')
    ->name('no_match');
//チーム一覧
Route::get('/team_list', [TeamListController::class, 'index'])
    ->middleware('guest')
    ->name('team_list');

Route::get('/team_list/{team}', [TeamListController::class, 'show'])
    ->middleware('guest')
    ->name('teams.show');

Route::get('/team_schedule/{team}', [TeamListController::class, 'schedule'])
    ->middleware('guest')
    ->name('team.schedule');

Route::get('/schedule_list', [TeamListController::class, 'schedule_list'])
    ->middleware('guest')
    ->name('schedule_list');

Route::get('/day_schedule/{team}', [TeamListController::class, 'day_schedule'])
    ->middleware('guest')
    ->name('day.schedule');

Route::get('/day_schedule2/{team}', [TeamListController::class, 'day_schedule2'])
    ->middleware('guest')
    ->name('day.schedule2');

Route::get('/day_schedule_show/{team}', [TeamListController::class, 'day_schedule_show'])
    ->middleware('guest')
    ->name('day.schedule_show');

Route::get('/team_rank', [ConventionsResultsController::class, 'index'])
    ->middleware('guest')
    ->name('team_rank');

// Route::controller(TeamListController::class)
//     ->middleware('guest')->group(function () {
//         Route::get('/team_list', 'index')->name('team_list');
//         Route::get('/team_list/{id}', 'show')->name('team_show');
//     });


Route::get('/match', [MatchController::class, 'index'])
    ->middleware('guest')
    ->name('match');

Route::get('/results', [ConventionsResultsController::class, 'index'])
    ->middleware('guest')
    ->name('results');



// Route::middleware('auth:users')->group(function () {
//     Route::get('/', [ItemController::class, 'index'])->name('items.index');
//     Route::get('show/{item}', [ItemController::class, 'show'])->name('items.show');
// });

// Route::prefix('cart')->middleware('auth:users')->group(function () {
//     Route::get('/', [CartController::class, 'index'])->name('cart.index');
//     Route::post('add', [CartController::class, 'add'])->name('cart.add');
//     Route::post('delete/{item}', [CartController::class, 'delete'])->name('cart.delete');
//     Route::get('checkout', [CartController::class, 'checkout'])->name('cart.checkout');
//     Route::get('success', [CartController::class, 'success'])->name('cart.success');
//     Route::get('cancel', [CartController::class, 'cancel'])->name('cart.cancel');
// });

// Route::get('/dashboard', function () {
//     return view('user.dashboard');
// })->middleware(['auth:users'])->name('dashboard');


require __DIR__ . '/auth.php';
