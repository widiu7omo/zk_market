<?php

use App\Http\Controllers\Auth\GoogleSocialiteController;
use App\Http\Controllers\Customer\AddressController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OfflineController;
use App\Http\Controllers\Customer\ProdukController;
use App\Http\Livewire\Customer\Address;
use App\Http\Livewire\Customer\Cart;
use App\Http\Livewire\Customer\Checkout;
use App\Http\Livewire\Customer\DetailOrder;
use App\Http\Livewire\Customer\DetailProduk;
use App\Http\Livewire\Customer\Home;
use App\Http\Livewire\Customer\ListOrder;
use App\Http\Livewire\Customer\ListProduk;
use App\Http\Livewire\Customer\NotFound;
use App\Http\Livewire\Customer\Payment;
use App\Http\Livewire\Customer\PickAddress;
use App\Http\Livewire\Customer\Profile;
use App\Http\Livewire\Customer\Search;
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
    return redirect()->route('homepage');
});

Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);
Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');

Route::middleware(['auth'])->group(function () {
//Basic Route
    Route::get('/offline', [OfflineController::class, 'index'])->name('offline');
    Route::get('/home', [App\Http\Controllers\Customer\HomeController::class, 'index'])->name('home.index');
    Route::post('/pay', [\App\Http\Controllers\Customer\PaymentController::class, 'pay'])->name('pay');
//    Route::get('search', [\App\Http\Controllers\Customer\SearchController::class, 'index'])->name('search.index');
//    Route::get('profile', [\App\Http\Controllers\Customer\ProfileController::class, 'index'])->name('profile.index');
//    Route::get('cart', [\App\Http\Controllers\Customer\CartController::class, 'index'])->name('cart.index');
    Route::get('admin/alamat/all/{id}', [App\Http\Controllers\Admin\AlamatController::class, 'all']);
    Route::get('admin/detail-pesanan/all/{id}', [App\Http\Controllers\Admin\DetailPesananController::class, 'all']);
    Route::resource('admin/produk', 'App\Http\Controllers\Admin\ProdukController');
    Route::resource('admin/kategori', 'App\Http\Controllers\Admin\KategoriController');
    Route::resource('admin/pegawai', 'App\Http\Controllers\Admin\PegawaiController');
    Route::resource('admin/pengaturan', 'App\Http\Controllers\Admin\PengaturanController');
    Route::resource('admin/metode-pembayaran', 'App\Http\Controllers\Admin\MetodePembayaranController');
    Route::resource('admin/slider', 'App\Http\Controllers\Admin\SliderController');
    Route::resource('admin/pegawai', 'App\Http\Controllers\Admin\PegawaiController');
    Route::resource('admin/customer', 'App\Http\Controllers\Admin\CustomerController');
    Route::resource('admin/status-bayar', 'App\Http\Controllers\Admin\StatusBayarController');
    Route::resource('admin/status-pesanan', 'App\Http\Controllers\Admin\StatusPesananController');
    Route::resource('admin/alamat', 'App\Http\Controllers\Admin\AlamatController');
    Route::resource('admin/customer', 'App\Http\Controllers\Admin\CustomerController');
    Route::resource('admin/pesanan', 'App\Http\Controllers\Admin\PesananController');
    Route::resource('admin/detail-pesanan', 'App\Http\Controllers\Admin\DetailPesananController');
});
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/cart_products', [ProdukController::class, 'getDataProduk']);
Route::post('/address', [AddressController::class, 'store'])->name('store_address');
Route::get('/address/{id}/show', [AddressController::class, 'show']);
Route::post('/items', [CartController::class, 'retrieveItems']);

//LiveWire Customer
Route::get('/homepage', Home::class)->name('homepage');
Route::get('/detail', DetailProduk::class)->name('detail');
Route::get('/list/{name}', ListProduk::class);
Route::get('/notfound', NotFound::class)->name('notfound');
Route::get('/search', Search::class)->name('search');
Route::get('/profile', Profile::class);
Route::get('/cart', Cart::class)->name('cart');
Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/address', Address::class)->name('address');
Route::get('/pick_address', PickAddress::class)->name('pick_address');
Route::get('/payment', Payment::class)->name('payment');
Route::get('/orders', ListOrder::class)->name('orders');
Route::get('/detail_order/{id}', DetailOrder::class);
