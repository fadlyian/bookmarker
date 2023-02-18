<?php
declare(strict_types=1);

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post(
    'bookmarks',
    App\Http\Controllers\Bookmarks\StoreController::class,
)->middleware(['auth'])->name('bookmarks.store');


Route::delete(
    'bookmarks/{bookmark}',
    App\Http\Controllers\Bookmarks\DeleteController::class,
)->middleware(['auth'])->name('bookmarks.delete');

Route::get(
    'bookmarks/{bookmark}',
    App\Http\Controllers\Bookmarks\RedirectController::class,
)->middleware(['auth'])->name('bookmarks.redirect');

Route::get('/halamanJono', function () {
    return view('halamanJono');
});

require __DIR__.'/auth.php';
