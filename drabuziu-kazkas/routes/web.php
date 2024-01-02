<?php

use App\Http\Controllers\KategorijaController;
use App\Models\Kategorija;
use App\Http\Controllers\MedziagaController;
use App\Models\Medziaga;
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

Route::get('/uzsakymai/sektiuzsakymapvz', function () {
    return view('uzsakymai\sektiuzsakymapvz');
})->name('sektiuzsakymapvz');

#Route::get('/uzsakymai/pildytiuzsakyma', function () {
#    return view('uzsakymai\pildytiuzsakyma');
#})->name('pildytiuzsakyma');

#Route::get('/uzsakymai/pildytiuzsakymapvz', function () {
#    return view('uzsakymai\pildytiuzsakymapvz');
#})->name('pildytiuzsakymapvz');


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
Route::resource("/medziaga", MedziagaController::class);

use App\Http\Controllers\OrderController;

Route::post('/check-order-information', [OrderController::class, 'checkOrderInformation'])->name('check.order.information');


//bandau zinutes kurti pats
use App\Http\Controllers\MessageController;

Route::get('/messages', [MessageController::class, 'getMessages'])->name('messages.get');
Route::post('/messages', [MessageController::class, 'sendMessage'])->name('messages.send');

Route::get('/messages/user-ids', [MessageController::class, 'getUserIds'])->name('messages.userIds');

// In your routes/web.php or routes/api.php file
use App\Http\Controllers\AdminMessageController;

// Route to display the admin dashboard
Route::get('/admin', [AdminMessageController::class, 'adminDashboard'])->name('admin.dashboard');

// Route to send a message
Route::post('/admin/send-message', [AdminMessageController::class, 'sendMessage'])->name('admin.send-message');

// Route to get all messages
Route::get('/admin/get-messages', [AdminMessageController::class, 'getMessages'])->name('admin.get-messages');

// Route to get messages by a specific user
Route::get('/admin/get-messages-by-user/{userId}', [AdminMessageController::class, 'getMessagesByUser'])->name('admin.get-messages-by-user');

Route::get('/messages/user-ids', [AdminMessageController::class, 'getUserIds'])->name('messages.userIds');


//zinutes iki cia

Route::get('/uzsakymai/sektiuzsakyma', [OrderController::class, 'enterOrderIdForm'])->name('sektiuzsakyma');
Route::get('/uzsakymai/sektiuzsakymapvz/{orderId}', [OrderController::class, 'viewOrderInformation'])->name('sektiuzsakymapvz');

Route::get('/uzsakymai/pildytiuzsakyma', [OrderController::class, 'showOrderStatusForm'])->name('order.status.form');
Route::get('/uzsakymai/pildytiuzsakymapvz/{orderId}', [OrderController::class, 'editOrderStatusForm'])->name('order.edit.form');
Route::post('/uzsakymai/update-status/{orderId}', [OrderController::class, 'updateOrderStatus'])->name('order.update.status');
Route::get('/uzsakymai/view/{orderId}', [OrderController::class, 'viewOrderInformation'])->name('order.view');
// web.php
Route::get('/uzsakymai/visi', [OrderController::class, 'showAllOrders'])->name('order.show.all');

// web.php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\FilterController;

// Route for filtering products
// routes/web.php

// Route for filtering products


Route::post('Prekes', [FilterController::class, 'filterProducts'])->name('Prekes.filter');
Route::post('/Prekes/filtered_products', [FilterController::class, 'filterProducts']);

