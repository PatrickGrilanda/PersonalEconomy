<?php

use App\Livewire\Accounts;
use App\Livewire\Accounts\Create;
use App\Livewire\Accounts\Edit;
use App\Livewire\Accounts\Show;
use App\Livewire\Categories;
use App\Livewire\Categories\Create as CategoriesCreate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::prefix('configurations')->group(function () {
    Route::prefix('/accounts')->group(function () {
        Route::get('/', Accounts::class)->name('accounts');
        Route::get('/create', Create::class)->name('accounts.create');
        Route::get('/{account}', Show::class)->name('accounts.show')->middleware('can:view,account');
        Route::get('/{account}/edit', Edit::class)->name('accounts.edit')->middleware('can:update,account');
    });

    Route::prefix('/categories')->group(function () {
        Route::get('/', Categories::class)->name('categories');
        Route::get('/create', CategoriesCreate::class)->name('categories.create');
    });
})->middleware(['auth']);

require __DIR__ . '/auth.php';
