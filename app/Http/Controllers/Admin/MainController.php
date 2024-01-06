<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Dashboard\DashboardService;
use \Illuminate\Http\JsonResponse;
use App\Http\Services\User\UserService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function income()
    {
        return view('admin.dashboard.income', [
            'title' => 'Thống kê doanh thu',
            'activeDash' => 'active active-menu',
            'activeUser' => '',
            'activeCgr' => '',
            'activePrd' => '',
            'activeOrder' => '',
        ]);
    }

    public function handleIncome(Request $request): JsonResponse
    {
        $year = $request->input('year');
        $data = $this->dashboardService->handleIncome($year);
        return response()->json($data);
    }

    public function numPrd()
    {
        return view('admin.dashboard.product', [
            'title' => 'Thống kê số lượt đặt sách',
            'activeDash' => 'active active-menu',
            'activeUser' => '',
            'activeCgr' => '',
            'activePrd' => '',
            'activeOrder' => '',
            'incomes' => $this->dashboardService->handleProduct(),
        ]);
    }
}
