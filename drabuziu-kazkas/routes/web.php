<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
use App\Http\Controllers\ProfileController;

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/profile/delete', [ProfileController::class, 'showDeleteForm'])->name('profile.delete');
Route::post('/profile/delete', [ProfileController::class, 'deleteProfile']);


Route::get('/profile/kazkas', function () {
    return view('profiles\kazkas');
})->name('kazkas');


Route::get('/Prekes/prekiu_perziura', function () {
    return view('Prekes\prekiu_perziura');
})->name('prekes');


Route::get('/krepselis/krepselis', function () {
    return view('krepselis\krepselis');
})->name('krepsys');


Route::get('/Kategorijos/kategorijos', function () {
    return view('Kategorijos\Kategorijos');
})->name('kategorijos');

Route::get('/views/welcome', function () {
    return view('welcome');
})->name('meniu');

Route::get('/Prekes/Prekiuinfo/preke1', function () {
    return view('Prekes\Prekiuinfo\preke1');
})->name('preke1');

Route::get('/Prekes/Prekiuinfo/preke2', function () {
    return view('Prekes\Prekiuinfo\preke2');
})->name('preke2');



// routes/web.php



