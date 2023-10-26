<?php

use App\Http\Controllers\SiteController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [SiteController::class, 'tests'])->name('tests');
Route::get('/results/check', [SiteController::class, 'results'])->name('check.results');
Route::get('/results/get', [SiteController::class, 'results_get'])->name('get.results');

Route::get('/test/registration-{do}', [SiteController::class, 'registration'])->name('test.registration');

Route::get('/test/suicide', [SiteController::class, 'suicide'])->name('test.suicide');
Route::get('/test/conflict', [SiteController::class, 'conflict'])->name('test.conflict');
Route::get('/test/coping', [SiteController::class, 'coping'])->name('test.coping');

Route::get('/test/suicide_send', [SiteController::class, 'send_suicide'])->name('test.suicide.send');
Route::get('/test/conflict_send', [SiteController::class, 'send_conflict'])->name('test.conflict.send');
Route::get('/test/coping_send', [SiteController::class, 'send_coping'])->name('test.coping.send');