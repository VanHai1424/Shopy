<?php

use App\Http\Controllers\Admins\CategoryController;
use App\Http\Controllers\Admins\ColorController;
use App\Http\Controllers\Admins\CommentController;
use App\Http\Controllers\Admins\DashboardController;
use App\Http\Controllers\Admins\OrderController as AdminsOrderController;
use App\Http\Controllers\Admins\ProductController;
use App\Http\Controllers\Admins\SizeController;
use App\Http\Controllers\Admins\UserController;
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
Route::get('gio-hang', [OrderController::class, 'cart'])->name('gio-hang');
Route::post('them-vao-gio-hang', [OrderController::class, 'addToCart'])->name('them-vao-gio-hang');
Route::post('thay-doi-so-luong', [OrderController::class, 'updateQuantity'])->name('thay-doi-so-luong');
Route::post('remove-to-cart', [OrderController::class, 'removeToCart'])->name('remove-to-cart');
Route::post('dat-hang', [OrderController::class, 'placeOrder'])->name('dat-hang');
Route::get('dat-hang-thanh-cong', [OrderController::class, 'orderSuccess'])->name('thanh-cong');

Route::get('lien-he', function() {
    return view('clients.contact', ['title' => 'Liên hệ']);
})->name('lien-he');

Route::get('gioi-thieu', function() {
    return view('clients.about', ['title' => 'Giới thiệu']);
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
    Route::get('lich-su-don-hang', [AccountController::class, 'historyOrder'])->name('lich-su-don-hang');
    Route::get('doi-mat-khau', [AccountController::class, 'changePass'])->name('doi-mat-khau');
    Route::post('cap-nhat-mat-khau', [AccountController::class, 'handleChangePass'])->name('cap-nhat-mat-khau');
    Route::get('thanh-toan', [OrderController::class, 'checkout'])->name('thanh-toan');
});


// Admin
Route::middleware('isAdmin')->prefix('admin')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::resource('category', CategoryController::class);

    Route::prefix('product')->group(function() {
        Route::get('/', [ProductController::class, 'list'])->name('product.list');
    });

    Route::prefix('color')->group(function() {
        Route::get('/', [ColorController::class, 'list'])->name('color.list');
    });

    Route::prefix('size')->group(function() {
        Route::get('/', [SizeController::class, 'list'])->name('size.list');
    });

    Route::prefix('comment')->group(function() {
        Route::get('/', [CommentController::class, 'list'])->name('comment.list');
    });

    Route::prefix('order')->group(function() {
        Route::get('/', [AdminsOrderController::class, 'list'])->name('order.list');
    });

    Route::prefix('user')->group(function() {
        Route::get('/', [UserController::class, 'list'])->name('user.list');
    });
});