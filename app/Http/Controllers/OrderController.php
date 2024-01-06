<?php

namespace App\Http\Controllers;

use App\Http\Services\Booking\BookingService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;
    public function __construct(BookingService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function myOrder($id)
    {
        return view('user.my-order', [
            'title' => 'Đơn hàng của tôi - BookStoreVN',
            'activeHome' => '',
            'activeCgr' => '',
            'activePrd' => '',
            'name_page' => 'Đơn hàng của tôi',
            'orders' => $this->orderService->listInfo($id)
        ]);
    }

    public function detailOrder($id, $date)
    {
        $customer = $this->orderService->getInfor($id, $date);
        $carts = $this->orderService->getOrder($id, $date);
        return view('user.detail-order', [
            'title' => "Chi tiết đơn hàng - BookStoreVN",
            'activeHome' => '',
            'activeCgr' => '',
            'activePrd' => '',
            'name_page' => 'Chi tiết đơn hàng',
            'date' => $date,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
}
