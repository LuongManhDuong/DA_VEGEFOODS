<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $title = 'Danh sách khuyến mãi';
        
        $ngayTao = request('ngay_tao');
        $ngay = request('ngay');
        $loai = request('loai');

        $query = Coupon::query();

        if ($loai) {
            $query->where('type', $loai);
        }


        switch ($ngayTao) {
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'week':
                $query->whereBetween('created_at', [
                    Carbon::now()->startOfWeek(), // Ngày đầu tuần
                    Carbon::now()->endOfWeek()    // Ngày cuối tuần
                ]);
                break;
            case 'month':
                $query->whereMonth('created_at', Carbon::now()->month); // Tháng hiện tại
                break;
            case 'quarter':
                $query->whereBetween('created_at', [
                    Carbon::now()->startOfQuarter(), // Ngày bắt đầu quý
                    Carbon::now()->endOfQuarter()    // Ngày kết thúc quý
                ]);
                break;
        }

        if ($ngay) {
            $query->whereDate('created_at', Carbon::parse($ngay)); // Lọc theo ngày người dùng chọn
        }

        $listCoupons = $query->orderByDesc('id')->get();
        return view('admins.coupons.index', compact('listCoupons','title'));
    }

    public function create()
    {
        $title = 'Thêm khuyến mãi';

        return view('admins.coupons.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:coupons',
            'type' => 'required|in:percentage,fixed',
            'value' => 'required|numeric',
            'expiration_date' => 'required|date|after:today',
        ]);

        Coupon::create($request->all());
        return redirect()->route('admins.coupons.index')->with('success', 'Thêm mã giảm giá thành công.');
    }

    public function edit(Coupon $coupon, $id)
    {
        $title = 'Sửa khuyến mãi';
        $coupon = Coupon::findOrFail($id); // Đảm bảo coupon tồn tại
        return view('admins.coupons.edit', compact('coupon','title'));
    }

    public function update(Request $request, Coupon $coupon, string $id)
    {
            if ($request->isMethod('PUT')) {
            $params = $request->except('_token', '_method');
            $coupons = Coupon::findOrFail($id);
            
    
            // Cập nhật dữ liệu
            $coupons->update($params);
    
            return redirect()->route('admins.coupons.index')->with('success', 'Cập nhật danh mục thành công');
        }

    }

    public function destroy(Coupon $coupon, $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect()->route('admins.coupons.index')->with('success', 'Xóa mã giảm giá thành công.');
    }
}
