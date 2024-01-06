<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'author' => 'required',
            'nxb' => 'required',
            'file' => 'required',
            'description' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên sách!',
            'author.required' => 'Vui lòng nhập tên tác giả!',
            'nxb.required' => 'Vui lòng nhập tên NXB!',
            'file.required' => 'Vui lòng thêm ảnh!',
            'description.required' => 'Vui lòng nhập mô tả sách!'
        ];
    }
}
