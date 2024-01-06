<?php


namespace App\Http\Services\Product;


use App\Models\Comment;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ProductAdminService
{
    public function getMenu()
    {
        return Menu::where('status', 1)->get();
    }

    public function insert($request)
    {
        try {
            Product::create([
                'name' => (string) $request->input('name'),
                'id_category' => (int) $request->input('id_category'),
                'author' => (string) $request->input('author'),
                'file' => (string) $request->input('file'),
                'description' => (string) $request->input('description'),
                'price' => (int) $request->input('price'),
                'nxb' => (string) $request->input('nxb'),
                'status' => (string) $request->input('status'),
                'url' => Str::slug($request->input('name'), '-')
            ]);

            session()->flash('success', 'Thêm Sách thành công');
        } catch (\Exception $e) {
            dd($e->getMessage());
            session()->flash('error', 'Không thể thêm sách này');
            Log::info($e->getMessage());
            return  false;
        }

        return  true;
    }

    public function get()
    {
        return Product::with('category')->search()->paginate(10);
    }   

    public function updateProduct($request, $product)
    {
        try {
            $product->fill($request->input());
            $product->url = Str::slug($request->input('name'), '-');
            
            $product->save();

            session()->flash('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            session()->flash('error', 'Lỗi. Cập nhật thất bại');
            Log::info($e->getMessage());
            
            return false;
        }

        return true;
    }

    public function delProduct($request)
    {
        $id = (int) $request->input('id');
        $prd = Product::where('id', $id)->first();

        if ($prd) {
            return Product::where('id', $id)->delete();
        }
        return false;
    }

    public function getId($id)
    {
        return Product::where('id', $id)
                        ->with('category')
                        ->firstOrFail();
    }

    public function getComment($id) {
        return Comment::where('id_product', $id)->orderbyDesc('created_at')->with('user')->paginate(5);
    }
}