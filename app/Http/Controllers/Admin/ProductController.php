<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductAdminService;
use \Illuminate\Http\JsonResponse;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService;
    }

    public function listProduct()
    {
        return view('admin.product.list-product', [
            'title' => 'Tất cả sách',
            'activeDash' => '',
            'activeUser' => '',
            'activeCgr' => '',
            'activePrd' => 'active active-menu',
            'activeOrder' => '',
            'products' => $this->productService->get()
        ]);
    }

    public function addProduct()
    {
        return view('admin.product.add-product', [
            'title' => 'Thêm sách',
            'activeDash' => '',
            'activeUser' => '',
            'activeCgr' => '',
            'activePrd' => 'active active-menu',
            'activeOrder' => '',
            'menus' => $this->productService->getMenu()
        ]);   
    }

    public function store(ProductRequest $request)
    {
        $this->productService->insert($request);
        return redirect()->back();
    }

    public function editProduct(Product $product)
    {
        return view('admin.product.edit-product', [
            'title' => 'Chỉnh sửa thông tin sách',
            'activeDash' => '',
            'activeUser' => '',
            'activeCgr' => '',
            'activePrd' => 'active active-menu',
            'activeOrder' => '',
            'product' => $product,
            'menus' => $this->productService->getMenu()
        ]);
    }

    public function updateProduct(Product $product, ProductRequest $request)
    {
        $this->productService->updateProduct($request, $product);
        return redirect('/admin/products/list-product');
    } 

    public function delProduct(Request $request): JsonResponse
    {
        $result = $this->productService->delProduct($request); 
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Đã xoá sách.'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function detail(Product $product, $id)
    {
        $product = $this->productService->getId($id); 
        $comments = $this->productService->getComment($id);
        return view('admin.product.detail',[
            'title' => 'Thông tin chi tiết - ' . $product->name,
            'activeDash' => '',
            'activeUser' => '',
            'activeCgr' => '',
            'activePrd' => 'active active-menu',
            'activeOrder' => '',
            'product' => $product,
            'comments' => $comments
        ]);
    }
}
