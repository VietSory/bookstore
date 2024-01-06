<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Booking\BookingService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;
    public function __construct(BookingService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        return view('admin.order.list', [
            'title' => 'Danh sách đơn đặt Tour',
            'activeDash' => '',
            'activeUser' => '',
            'activeCgr' => '',
            'activePrd' => '',
            'activeOrder' => 'active active-menu',
            'customers' => $this->orderService->getCustomer()
        ]);
    }

    public function detailOrder($id, $date)
    {
        $customer = $this->orderService->getInfor($id, $date);
        $carts = $this->orderService->getOrder($id, $date);
        return view('admin.order.detail', [
            'title' => "Chi tiết đơn hàng",
            'activeDash' => '',
            'activeUser' => '',
            'activeCgr' => '',
            'activePrd' => '',
            'activeOrder' => 'active active-menu',
            'date' => $date,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
}
