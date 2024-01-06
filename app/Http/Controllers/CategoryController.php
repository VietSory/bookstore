<?php

namespace App\Http\Controllers;

use App\Http\Services\Product\ProductService;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;

class CategoryController extends Controller
{

    protected $category;
    protected $productService;

    public function __construct(MenuService $category, ProductService $productService)
    {
        $this->category = $category;
        $this->productService = $productService;
    }

    public function index(Request $request, $id, $url)
    {
        $category = $this->category->getId($id); 
        $products = $this->category->getProduct($category);

        return view('user.book', [
            'title' => $category->name_category . ' - BookStoreVN',
            'activeHome' => '',
            'activeCgr' => 'active active-menu',
            'activePrd' => '',
            'name_page' => 'Danh mục - ' . $category->name_category,
            'category' => $category,
            'products' => $products,
            'newbooks' => $this->productService->new()
        ]);
    }
}
