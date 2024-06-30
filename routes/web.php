<?php

use App\Http\Controllers\clients\AuthController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\OrderController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/danh-muc/{id}', [OrderController::class, 'getProducts'])->name('danh-muc');
Route::post('/danh-muc/{id}', [OrderController::class, 'filterProducts'])->name('filter-pro');

Route::get('/san-pham/{id}', [OrderController::class, 'productDetail'])->name('chi-tiet');
Route::post('/san-pham/{id}', [OrderController::class, 'filterVariant'])->name('filter-var');

Route::get('tim-kiem', [OrderController::class, 'searchProducts'])->name('search-pro');

Route::post('binh-luan', [OrderController::class, 'comment'])->name('gui-binh-luan');

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

Route::get('dang-nhap', [AuthController::class, 'login'])->name('dang-nhap');
Route::post('dang-nhap', [AuthController::class, 'handleLogin'])->name('xu-ly-dang-nhap');
Route::post('dang-ky', [AuthController::class, 'handleSignUp'])->name('xu-ly-dang-ky');

Route::get('dang-xuat', [AuthController::class, 'logout'])->name('dang-xuat');

Route::get('/lich-su-don-hang', function() {
    return view('clients.list-order', ['title' => 'Don hang']);
})->name('lich-su-don-hang');

Route::get('/chi-tiet-don-hang', function() {
    return view('clients.order-detail', ['title' => 'Chi tiet don hang']);
});

Route::get('/doi-mat-khau', function() {
    return view('clients.password', ['title' => 'Doi mat khau']);
})->name('doi-mat-khau');

Route::get('/thong-tin-nguoi-dung', function() {
    return view('clients.personal', ['title' => 'Thong tin nguoi dung']);
})->name('thong-tin-nguoi-dung');