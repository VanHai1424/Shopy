<?php

use App\Http\Controllers\Clients\AccountController;
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

Route::get('danh-muc/{id}', [OrderController::class, 'getProducts'])->name('danh-muc');
Route::post('danh-muc/{id}', [OrderController::class, 'filterProducts'])->name('filter-pro');

Route::get('san-pham/{id}', [OrderController::class, 'productDetail'])->name('chi-tiet');
Route::post('san-pham/{id}', [OrderController::class, 'filterVariant'])->name('filter-var');

Route::get('tim-kiem', [OrderController::class, 'searchProducts'])->name('search-pro');

Route::post('binh-luan', [OrderController::class, 'comment'])->name('gui-binh-luan');

Route::get('gio-hang', function() {
    return view('clients.cart', ['title' => 'Gio hang']);
});

Route::get('thanh-toan', function() {
    return view('clients.checkout', ['title' => 'Thanh toan']);
});

Route::get('don-hang', function() {
    return view('clients.order', ['title' => 'Don hang']);
});

Route::get('lien-he', function() {
    return view('clients.contact', ['title' => 'Lien he']);
})->name('lien-he');

Route::get('gioi-thieu', function() {
    return view('clients.about', ['title' => 'Gioi thieu']);
})->name('gioi-thieu');

// Auth
Route::get('dang-nhap', [AuthController::class, 'login'])->name('dang-nhap');
Route::post('dang-nhap', [AuthController::class, 'handleLogin'])->name('xu-ly-dang-nhap');
Route::post('dang-ky', [AuthController::class, 'handleSignUp'])->name('xu-ly-dang-ky');
Route::get('dang-xuat', [AuthController::class, 'logout'])->name('dang-xuat');

// Account
Route::middleware(['isLogin'])->group(function () {
    Route::get('thong-tin-nguoi-dung', [AccountController::class, 'info'])->name('thong-tin-nguoi-dung');    
    Route::post('cap-nhat-nguoi-dung', [AccountController::class, 'updateInfo'])->name('cap-nhat-nguoi-dung');    

    Route::get('lich-su-don-hang', function() {
        return view('clients.list-order', ['title' => 'Don hang']);
    })->name('lich-su-don-hang');
    
    Route::get('chi-tiet-don-hang', function() {
        return view('clients.order-detail', ['title' => 'Chi tiet don hang']);
    });
    
    Route::get('doi-mat-khau', [AccountController::class, 'changePass'])->name('doi-mat-khau');
    Route::post('cap-nhat-mat-khau', [AccountController::class, 'handleChangePass'])->name('cap-nhat-mat-khau');
});