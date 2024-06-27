<?php

use App\Http\Controllers\Clients\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/san-pham', function() {
    return view('clients.products', ['title' => 'San pham']);
});

Route::get('/chi-tiet-san-pham', function() {
    return view('clients.product-detail', ['title' => 'Chi tiet san pham']);
});

Route::get('/gio-hang', function() {
    return view('clients.cart', ['title' => 'Gio hang']);
});

Route::get('/thanh-toan', function() {
    return view('clients.checkout', ['title' => 'Thanh toan']);
});

Route::get('/don-hang', function() {
    return view('clients.order', ['title' => 'Don hang']);
});

Route::get('/dang-nhap', function() {
    return view('clients.login', ['title' => 'Dang nhap']);
});

Route::get('/lien-he', function() {
    return view('clients.contact', ['title' => 'Lien he']);
})->name('lien-he');

Route::get('/gioi-thieu', function() {
    return view('clients.about', ['title' => 'Gioi thieu']);
})->name('gioi-thieu');

Route::get('/lich-su-don-hang', function() {
    return view('clients.list-order', ['title' => 'Don hang']);
});

Route::get('/chi-tiet-don-hang', function() {
    return view('clients.order-detail', ['title' => 'Chi tiet don hang']);
});

Route::get('/doi-mat-khau', function() {
    return view('clients.password', ['title' => 'Doi mat khau']);
});

Route::get('/thong-tin-nguoi-dung', function() {
    return view('clients.personal', ['title' => 'Thong tin nguoi dung']);
});