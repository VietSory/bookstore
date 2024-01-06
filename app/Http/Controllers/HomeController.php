<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;

class HomeController extends Controller
{

    protected $productService;
    protected $menuService;

    public function __construct(ProductService $productService, MenuService $menuService)
    {
        $this->productService = $productService;
        $this->menuService = $menuService;
    }

    public function home()
    {
        return view('user.home', [
            'title' => 'Trang chủ BookStoreVN', 
            'activeHome' => 'active active-menu',
            'activeCgr' => '',
            'activePrd' => '',
            'name_page' => 'Trang chủ',
            'sliders' => $this->productService->slider(),
            'products' => $this->productService->suggest()
        ]);
    }
}
