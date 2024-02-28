<?php

use App\Livewire\Accounts;
use App\Livewire\Accounts\Create;
use App\Livewire\Accounts\Edit;
use App\Livewire\Accounts\Show;
use App\Livewire\Categories;
use App\Livewire\Categories\Create as CategoriesCreate;
use App\Livewire\Categories\Show as CategoriesShow;
use App\Livewire\CreditCards;
use App\Livewire\CreditCards\Create as CreditCardsCreate;
use App\Livewire\Transactions;
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
        Route::get('/{category}', CategoriesShow::class)->name('categories.show');
    });

    Route::prefix('/credit-cards')->group(function () {
        Route::get('/', CreditCards::class)->name('credit-cards');
        Route::get('/create', CreditCardsCreate::class)->name('credit-cards.create');
    });
})->middleware(['auth', 'verified']);

Route::prefix('transactions')->group(function () {
    Route::get('/', Transactions::class)->name('transactions');
})->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
