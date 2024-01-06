<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Services\Booking\BookingService;

class BookingController extends Controller
{
    protected $bookService;

    public function __construct(BookingService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $products = $this->bookService->getProduct();

        return view('user.cart', [
            'title' => 'Giỏ Hàng',
            'activeHome' => '',
            'activeCgr' => '',
            'activePrd' => '',
            'name_page' => 'Thông tin giỏ hàng',
            'products' => $products,
            'carts' => session()->get('carts')
        ]);
    }

    public function addCart(Request $request)
    {
        $result = $this->bookService->create($request);
        if ($result === false) {
            return redirect()->back();
        }

        return redirect('/gio-hang');
    }

    public function updateCart(Request $request)
    {
        $this->bookService->update($request);

        return redirect('/gio-hang');
    }

    public function removePrd($id )
    {
        $this->bookService->remove($id);

        return redirect('/gio-hang');
    }

    public function booking(Request $request)
    {
        $this->bookService->booking($request);

        return redirect()->back();
    }
}
