<?php

namespace App\Http\Services\Menu;
use Illuminate\Support\Str;
use App\Models\Menu;

class MenuService 
{

// ============================= ADMIN =============================
    public function create($request)
    {
        try {
            Menu::create([
                'name_category' => (string) $request->input('name_category'),
                'status' => (string) $request->input('status'),
                'url' => Str::slug($request->input('name_category'), '-')   // Chuyển tên danh mục thành dạng phù hợp với url (Điện thoại -> dien-thoai)
            ]);
            session()->flash('success', 'Thêm danh mục thành công');
        } catch (\Exception $e) {
            session()->flash('error', 'Danh mục này đã tồn tại');
            return false;
        }
        return true;
    }

    public function getAll()
    {
        return Menu::search()->paginate(4);
    }

    public function updateCategory($request, $menu): bool
    {
        $menu->name_category = (string) $request->input('name_category');
        $menu->status = (int) $request->input('status');
        $menu->url = Str::slug($request->input('name_category'), '-');

        $menu->save();

        session()->flash('success', 'Cập nhật danh mục thành công.');
        return true;
    }

    public function delCategory($request)
    {
        $id = (int) $request->input('id');
        $cgr = Menu::where('id', $id)->first();

        if ($cgr) {
            return Menu::where('id', $id)->delete();
        }
        return false;
    }

    public function getIdAdmin($id)
    {
        return Menu::where('id', $id)->firstOrFail();
    }

    public function getProductAdmin($category)
    {
        return $category->products()
                           ->select('id', 'name', 'file', 'author', 'nxb', 'price', 'description', 'id_category', 'status', 'url')
                           ->search()
                           ->paginate(10);
    }


// ============================= USER =============================

// Category Page
    public function getId($id)
    {
        return Menu::where('id', $id)->where('status', 1)->firstOrFail();
    }

    public function getProduct($category)
    {
        return $category->products()
                           ->select('id', 'name', 'file', 'author', 'nxb', 'price', 'description', 'url')
                           ->where('status',1)
                           ->search()
                           ->paginate(20);
    }
}