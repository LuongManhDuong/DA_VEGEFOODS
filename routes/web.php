<?php

use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\ThongTinTrangWebController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\ChiTietDanhMuc;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\DanhMucClientController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\SanPhamChiTietController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VnpayController;
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\CheckRoleAdminMiddleware;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/home', function(){
//     return view('home');
// })->middleware('auth');

Auth::routes();

// ĐN-ĐK-ĐX
Route::get('login', [AuthController::class, 'showFromLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFromRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN ROUTES
Route::middleware(['auth'])->prefix('admins')
    ->as('admins.')
    ->group(function () {
        Route::get('/', function () {
            return view('admins.dashboard');
        })->name('dashboard');

        Route::prefix('danhmucs')
        ->as('danhmucs.')
        ->group(function () {
            // Các route cho admin
            Route::get('/',                 [DanhMucController::class, 'index'])->name('index');
            Route::get('/create',           [DanhMucController::class, 'create'])->name('create');
            Route::post('/store',           [DanhMucController::class, 'store'])->name('store');
            Route::get('/show/{id}',        [DanhMucController::class, 'show'])->name('show');
            Route::get('{id}/edit',         [DanhMucController::class, 'edit'])->name('edit');
            Route::put('{id}/update',       [DanhMucController::class, 'update'])->name('update');
            Route::delete('{id}/destroy',   [DanhMucController::class, 'destroy'])->name('destroy');
        });
         // san pham
         Route::prefix('sanphams')
         ->as('sanphams.')
         ->group(function (){
             Route::get('/',                 [SanPhamController::class,'index'])->name('index');
             Route::get('/create',           [SanPhamController::class,'create'])->name('create');
             Route::post('/store',           [SanPhamController::class,'store'])->name('store');
             Route::get('/show/{id}',        [SanPhamController::class,'show'])->name('show');
             Route::get('{id}/edit',         [SanPhamController::class,'edit'])->name('edit');
             Route::put('{id}/update',       [SanPhamController::class,'update'])->name('update');
             Route::delete('{id}/destroy',   [SanPhamController::class,'destroy'])->name('destroy');
         });
         Route::prefix('donhangs')
         ->as('donhangs.')
         ->group(function (){
             Route::get('/',                 [DonHangController::class,'index'])->name('index');
             Route::get('/show/{id}',        [DonHangController::class,'show'])->name('show');
             Route::put('{id}/update',       [DonHangController::class,'update'])->name('update');
             Route::delete('{id}/destroy',   [DonHangController::class,'destroy'])->name('destroy');
         });
         Route::prefix('thongtintrangwebs')
         ->as('thongtintrangwebs.')
         ->group(function (){
             Route::get('/',                 [ThongTinTrangWebController::class,'index'])->name('index');
             Route::put('{id}/update',       [ThongTinTrangWebController::class,'update'])->name('update');

         });
         Route::prefix('taikhoans')
         ->as('taikhoans.')
         ->group(function (){
             Route::get('/',                 [UserController::class,'index'])->name('index');
             Route::get('/create',                 [UserController::class,'create'])->name('create');
             Route::post('/store',                 [UserController::class,'store'])->name('store');
             Route::get('/edit/{id}',                 [UserController::class,'edit'])->name('edit');
             Route::get('/show/{id}',        [UserController::class,'show'])->name('show');
             Route::put('{id}/update',       [UserController::class,'update'])->name('update');
             Route::delete('{id}/destroy',   [UserController::class,'destroy'])->name('destroy');
         });
         Route::prefix('coupons')
         ->as('coupons.')
         ->group(function (){
             Route::get('/',                 [CouponController::class,'index'])->name('index');
             Route::get('/create',                 [CouponController::class,'create'])->name('create');
             Route::post('/store',                 [CouponController::class,'store'])->name('store');
             Route::get('/edit/{id}',                 [CouponController::class,'edit'])->name('edit');
             Route::get('/show/{id}',        [CouponController::class,'show'])->name('show');
             Route::put('{id}/update',       [CouponController::class,'update'])->name('update');
             Route::delete('{id}/destroy',   [CouponController::class,'destroy'])->name('destroy');
         });
    
    });

// CLIENT ROUTES (nếu có)
Route::middleware(['auth'])->prefix('clients')
    ->as('clients.')
    ->group(function () {

        // Route::get('/', function () {
        //     return view('clients.home.index');
        // })->name('clients.index');
        Route::get('/', [HomeController::class, 'index'])->name('home.index');


        Route::prefix('blogs')
            ->as('blogs.')
            ->group(function () {
                Route::get('/', [BlogController::class, 'index'])->name('index');
                // Route::get('/show/{id}', [BlogController::class, 'show'])->name('show');
                });

        Route::prefix('shops')
            ->as('shops.')
            ->group(function () {
                    Route::get('/', [ShopController::class, 'index'])->name('index');
                    // Route::get('/show/{id}', [DanhMucController::class, 'show'])->name('show');
                    // Route::get('/san-pham/{id}', [ShopController::class, 'show'])->name('clients.shops.detail');

                });

        Route::prefix('abouts')
            ->as('abouts.')
            ->group(function () {
                    Route::get('/', [AboutController::class, 'index'])->name('index');
                    // Route::get('/show/{id}', [DanhMucController::class, 'show'])->name('show');
                });
            
        Route::prefix('contacts')
            ->as('contacts.')
            ->group(function () {
                    Route::get('/', [ContactController::class, 'index'])->name('index');
                    // Route::get('/show/{id}', [DanhMucController::class, 'show'])->name('show');
                });
        Route::prefix('sanphams')
            ->group(function () {
                    Route::get('/{id}', [SanPhamChiTietController::class, 'index'])->name('sanphams.chitiet');
                });
                // Route::prefix('carts')
                // ->group(function () {
                //     // Định nghĩa route cho addToCart
                //     Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('carts.addToCart');
                // });
});
Route::get('/thong-tin-trang-web', [ThongTinTrangWebController::class, 'show'])->name('client.thongtintrangweb');

Route::get('/product/detail/{id}',          [HomeController::class, 'chiTietSanPham'])->name('products.detail');
Route::get('/list-cart',                    [CartController::class, 'listCart'])->name('cart.list');
Route::post('/list-cart-store',             [CartController::class, 'storeCart'])->name('cart.store');
Route::post('/add-to-cart',                 [CartController::class, 'addCart'])->name('cart.add');
Route::post('/update-cart',                 [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/apply-coupon',           [CartController::class, 'applyCoupon'])->name('cart.apply_coupon');

Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist',                 [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add',            [WishlistController::class, 'addWishlist'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{id}',  [WishlistController::class, 'removeWishlist'])->name('wishlist.remove');
});


Route::middleware(['auth'])->prefix('donhangs')
    ->as('donhangs.')
    ->group(function () {
            Route::get('/',                 [OrderController::class, 'index'])->name('index');
            Route::get('/create',           [OrderController::class, 'create'])->name('create');
            Route::post('/store',           [OrderController::class, 'store'])->name('store');
            Route::get('/show/{id}',        [OrderController::class, 'show'])->name('show');
            Route::get('{id}/edit',         [OrderController::class, 'edit'])->name('edit');
            Route::put('{id}/update',       [OrderController::class, 'update'])->name('update');
            Route::delete('{id}/destroy',   [OrderController::class, 'destroy'])->name('destroy');
            Route::get('/create2',  [DonHangController::class, 'createDonHang'])->name('donhangs.create');

});

// thanh toan VNPAY
Route::post('/vnpay_payment', [OrderController::class, 'vnpay_payment'])->name('donhangs.vnpay_payment');