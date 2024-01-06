<?php

namespace App\Http\Controllers;

use App\Http\Services\Menu\MenuService;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Models\Product;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function allBook()
    {
        return view('user.book', [
            'title' => 'Tất cả Sách - BookStoreVN',
            'activeHome' => '',
            'activeCgr' => '',
            'activePrd' => 'active active-menu',
            'name_page' => 'Tất cả Sách',
            'products' => $this->productService->get(),
            'newbooks' => $this->productService->new()
        ]);
    }

    public function detail(Product $product, $id, $idCgr)
    {
        $product = $this->productService->getId($id);

        $idCgr = $product->category->id;
        $products = $this->productService->getIdCgr($id, $idCgr);

        return view('user.detail',[
            'title' => 'Thông tin chi tiết - ' . $product->name,
            'activeHome' => '',
            'activeCgr' => '',
            'activePrd' => 'active active-menu',
            'name_page' => 'Thông tin chi tiết',
            'product' => $product,
            'products' => $products
        ]); 
    }

    public function load_comment(Request $request)
    {
        $id_product = $request->id_product;
        $comment = Comment::where('id_product', $id_product)->orderbyDesc('created_at')->with('user')->take(5)->get();

        $html = '';
        foreach ($comment as $key => $cmt) {
            $createdDate = Carbon::parse($cmt->created_at)->setTimezone('Asia/Ho_Chi_Minh');
            $formattedDate = $createdDate->format('d-m-Y H:i');
            $html .= '
                <div class="all__cmt ">
                    <label style="font-weight: bold">' . $cmt->user->name . '</label>
                    <span style="font-size: 15px; color: #7F8487">' . $formattedDate . '</span><br>
                    <p>' . $cmt->star . ' <i class="ri-star-fill"></i></p>
                    <p>' . $cmt->content . '</p>
                </div>
            ';
        }

        echo $html;
    }

    public function add_comment(Request $request)
    {
        $id_user = $request->id_user;
        $id_product = $request->id_product;
        $content = $request->content;
        $star    = $request->star;

        $comment = new Comment;
        $comment->id_product = $id_product;
        $comment->id_user = $id_user;
        $comment->content = $content;
        $comment->star    = $star;
        $comment->save();
    }
}
