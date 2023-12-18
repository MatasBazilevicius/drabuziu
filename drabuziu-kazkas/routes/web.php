<?php

use App\Http\Controllers\KategorijaController;
use App\Models\Kategorija;
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
#Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
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

/*Route::get('/Kategorijos/kategorijos_redagavimas', function () {
    return view('Kategorijos\kategorijos_redagavimas');
})->name('kategorijosredag');*/

Route::get('/views/welcome', function () {
    return view('welcome');
})->name('meniu');

Route::get('/Prekes/Prekiuinfo/preke1', function () {
    return view('Prekes\Prekiuinfo\preke1');
})->name('preke1');

Route::get('/Prekes/Prekiuinfo/preke2', function () {
    return view('Prekes\Prekiuinfo\preke2');
})->name('preke2');

Route::get('/Prekes/Prekiuinfo/prekeRedag', function () {
    return view('Prekes\Prekiuinfo\prekeRedag');
})->name('prekeRedag');

Route::get('/Prekes/Prekiuinfo/prekeKurt', function () {
    return view('Prekes\Prekiuinfo\prekeKurt');
})->name('prekekurt');

//cia zinutes yra
Route::get('/Zinutes/zinutes/', function () {
    return view('Zinutes\zinutes');
})->name('zinut');
//workin progress zinuciu
Route::get('/Zinutes/zinutes1/', function () {
    return view('Zinutes\zinutes1');
})->name('zinut1');

Route::get('/Zinutes/homezinut/', function () {
    return view('Zinutes\homezinut');
})->name('homezinut');

Route::get('/krepselis/uzsakymas/', function () {
    return view('krepselis\uzsakymas');
})->name('uzsakymas');

Route::get('/krepselis/apmokejimas/', function () {
    return view('krepselis\apmokejimas');
})->name('apmokejimas');

Route::get('/krepselis/PavAutentifikacija/', function () {
    return view('krepselis\PavAutentifikacija');
})->name('PavAutentifikacija');

Route::get('/krepselis/NePavAutentifikacija/', function () {
    return view('krepselis\NePavAutentifikacija');
})->name('NePavAutentifikacija');

Route::get('/Kategorijos/kategorijos_kurimas/', function () {
    return view('Kategorijos\kategorijos_kurimas');
})->name('kategorijos_k');

Route::get('/Kategorijos/kategorijos_redagavimas/', function () {
    return view('Kategorijos\kategorijos_redagavimas');
})->name('kategorijos_r');

Route::get('/uzsakymai/visiuzsakymai', function () {
    return view('uzsakymai\visiuzsakymai');
})->name('visiuzsakymai');

Route::get('/uzsakymai/ivykdytiuzsakymai', function () {
    return view('uzsakymai\ivykdytiuzsakymai');
})->name('ivykdytiuzsakymai');

Route::get('/uzsakymai/sektiuzsakyma', function () {
    return view('uzsakymai\sektiuzsakyma');
})->name('sektiuzsakyma');

Route::get('/uzsakymai/pildytiuzsakyma', function () {
    return view('uzsakymai\pildytiuzsakyma');
})->name('pildytiuzsakyma');

Route::get('/uzsakymai/sektiuzsakymapvz', function () {
    return view('uzsakymai\sektiuzsakymapvz');
})->name('sektiuzsakymapvz');

Route::get('/uzsakymai/pildytiuzsakymapvz', function () {
    return view('uzsakymai\pildytiuzsakymapvz');
})->name('pildytiuzsakymapvz');


use App\Http\Controllers\PaypalController;

//Apmokejimas

Route::post('paypal/payment',[PaypalController::class, 'payment'])->name('paypal');
Route::get('paypal/success',[PaypalController::class, 'success'])->name('paypal.success');
Route::get('paypal/cancel',[PaypalController::class, 'cancel'])->name('paypal.cancel');
// routes/web.php
use App\Http\Controllers\ProductController1;
use App\Http\Controllers\DrabuziaiPerz;
//bandau duomenu baze prijugnti cia 
Route::get('/preke/{id}', [DrabuziaiPerz::class, 'preke'])->name('preke');
//Prekiu editinimas 
Route::get('/prekes/{id}/edit', [ProductController1::class, 'showEditForm'])->name('editProduct');
//Route::get('/preke/{id}', 'DrabuziaiPerz@preke')->name('preke3');

//Cia del produktu kurimo
Route::get('/create-product', [ProductController1::class, 'showCreateForm'])->name('showCreateForm');
Route::post('/create-product', [ProductController1::class, 'createProduct'])->name('createProduct');

// Krepselis

use App\Http\Controllers\CartController;

Route::get('/shopping-cart', [CartController::class, 'ProductCart'])->name('shopping.cart');
Route::get('/drabuzis/{id}', [CartController::class, 'addProducttoCart'])->name('adddrabuzis.to.cart');
Route::delete('/delete-cart-product', [CartController::class, 'deleteProduct'])->name('delete.cart.product');
Route::post('/apply/discount', [CartController::class, 'applyDiscount'])->name('apply.discount');

// Uzsakymas 
use App\Http\Controllers\PaymentController;

Route::get('payment',[PaymentController::class, 'index'])->name('payment');

use App\Http\Controllers\KategorijaPerz;
/*Route::get('/kategorija/{id}', [KategorijaPerz::class, 'kategorija'])->name('kategorija');
Route::get('/kategorija/{id}/edit', [KategorijaController::class, 'showEditForm'])->name('editKategorija');
Route::get('/create-category', [KategorijaController::class, 'showCreateForm'])->name('showCreateForm');
Route::post('/create-category', [KategorijaController::class, 'createCategory'])->name('createCategory');*/

Route::resource("/kategorija", KategorijaController::class);
