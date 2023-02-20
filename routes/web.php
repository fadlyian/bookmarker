<?php
declare(strict_types=1);

use App\Http\Controllers\BukuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Request;
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
Route::redirect('/here', '/there', 301);

Route::view('/welcome', 'login');

// Route::get('/user/{name?}', function($name = "kosong"){
//     return 'user '. $name;
// });

//route with parameter
Route::get('jono/{id}', function(Request $request, $id){
   return 'Useeerrr ' . $id ; 
});

// route Controller
Route::controller(BukuController::class)->group(function (){
    Route::get('/buku', 'index');
});

//route prefix
Route::prefix('tlogosari')->group(function(){
    Route::get('/',function(){
        return view('comingSoon');
    });
    Route::get('/blog',function(){
        return view('blog');
    });
});

// route named
Route::get('/user/profile', function () {
    // ...
    return "profile";
})->name('profile');

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


// tambahan dari fadly Sofyansyah

Route::get('/halamanUtama', function () {
    return view('halamanUtama');
});

Route::get('/halamanUtama', function () {
    return view('halamanUtama');
})->middleware(['auth']);

// Route::get('/user', [UserController::class, 'index']);



require __DIR__.'/auth.php';
