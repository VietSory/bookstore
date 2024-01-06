<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\AddCgrFormRequest;
use App\Http\Services\Product\ProductService;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use \Illuminate\Http\JsonResponse;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $menuService;
    protected $productService;

    public function __construct(MenuService $menuService) 
    {
        $this->menuService = $menuService;
    }

    public function addCategory() 
    {
        return view('admin.menu.add-category', [
            'title' => 'Thêm danh mục',
            'activeDash' => '',
            'activeUser' => '',
            'activeCgr' => 'active active-menu',
            'activePrd' => '',
            'activeOrder' => '',
        ]);
    }

    public function handle(AddCgrFormRequest $request) 
    {
        $this->menuService->create($request);
        return redirect()->back();
    }

    public function listCategory()
    {
        return view('admin.menu.list-category', [
            'title' => 'Danh sách danh mục',
            'activeDash' => '',
            'activeUser' => '',
            'activeCgr' => 'active active-menu',
            'activePrd' => '',
            'activeOrder' => '',
            'lists' => $this->menuService->getAll()
        ]);
    }

    public function getPrdfromCgr(Request $request, $id, $url)
    {
        $category = $this->menuService->getIdAdmin($id); 
        $products = $this->menuService->getProductAdmin($category); 

        return view('admin.product.list-product', [
            'title' => $category->name_category,
            'activeDash' => '',
            'activeUser' => '',
            'activeCgr' => 'active active-menu',
            'activePrd' => '',
            'activeOrder' => '',
            'products' => $products,
        ]);

    }

    public function getListCgr()
    {
        return $this->menuService->getAll();
    }

    public function editCategory(Menu $menu)
    {
        return view('admin.menu.edit', [
            'title' => 'Chỉnh sửa danh mục - ' . $menu->name_category,
            'activeDash' => '',
            'activeUser' => '',
            'activeCgr' => 'active active-menu',
            'activePrd' => '',
            'activeOrder' => '',
            'menu' => $menu
        ]);
    }

    public function updateCategory(Menu $menu, AddCgrFormRequest $request)
    {
        $this->menuService->updateCategory($request, $menu);
        return redirect('/admin/menus/list-category');
    }

    public function delCategory(Request $request): JsonResponse
    {
        $result = $this->menuService->delCategory($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Đã xoá danh mục.'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
