<?php

namespace App\Providers;

use App\Models\DanhMuc;
use App\Models\SanPham;
// use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
{
    // Lấy danh mục đang hoạt động
    $listDanhMucs = DanhMuc::where('trang_thai', 1)->get();
    
    // Lấy sản phẩm đang hoạt động
    $listSanPhams = SanPham::where('trang_thai', 1)->get();
    
    // Chia sẻ biến này cho tất cả view
    View::share([
        'listDanhMucs' => $listDanhMucs,
        'listSanPhams' => $listSanPhams
    ]);
    
    View::composer('*', function ($view) {
        $coupon = Session::get('coupon', 0);
        $view->with('coupon', $coupon);
    });

    
}
}
