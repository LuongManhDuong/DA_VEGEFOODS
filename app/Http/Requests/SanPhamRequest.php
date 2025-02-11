<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ma_san_pham' => 'required|string|unique:san_phams,ma_san_pham',
            'ten_san_pham' => 'required|string',
            'gia_san_pham' => 'required|numeric|min:0',
            'gia_khuyen_mai' => 'nullable|numeric|min:0',
            'so_luong' => 'required|integer|min:0',
            'ngay_nhap' => 'required|date',
            'danh_muc_id' => 'required|exists:danh_mucs,id',
            'trang_thai' => 'required|boolean', // Trạng thái bắt buộc phải chọn
        ];
    }

}
