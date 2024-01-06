<?php


namespace App\Http\Services\Product;

use App\Models\Product;

class ProductService
{
    public function get()
    {
        return Product::select('id', 'name', 'file', 'author', 'price', 'url')
                        ->where('status', 1)
                        ->search()
                        ->paginate(20);
    }

    public function slider()
    {
        return Product::select('file')
                        ->orderbyDesc('id')
                        ->where('status', 1)
                        ->take(9)
                        ->get();
    }

    public function suggest()
    {
        return Product::select('id', 'name', 'file', 'author', 'price', 'url')
                        ->where('status', 1)
                        ->take(12)
                        ->get();
    }

    public function new()
    {
        return Product::select('id', 'name', 'file', 'author', 'price', 'url')
                        ->where('status', 1)
                        ->orderbyDesc('id')
                        ->take(6)
                        ->get();
    }

    public function getId($id)
    {
        return Product::where([
                            ['id', $id],
                            ['status', 1]
                        ])
                        ->with('category')
                        ->firstOrFail();
    }

    public function getIdCgr($id, $idCgr)
    {
        return Product::where([
                            ['id', '!=', $id],
                            ['id_category', $idCgr],
                            ['status', 1]
                        ])
                        ->orderbyDesc('id')
                        ->take(5)
                        ->get();
    }
}