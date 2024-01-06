<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class AddCgrFormRequest extends FormRequest
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
            // 'title' => 'required|unique:posts|max:255',      // unique:posts: ktra tên đã tồn tại trong csdl của bảng posts
            'name_category' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name_category.required' => 'Vui lòng nhập tên danh mục!'
        ];
    }
}
