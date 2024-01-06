<?php


namespace App\Http\Services\Dashboard;

use App\Models\Cart;

class DashboardService
{
    public function handleIncome($year)
    {
        $results = Cart::selectRaw('MONTH(created_at) as month, SUM(price*qty) as revenue')
                        ->whereYear('created_at', $year)
                        ->groupByRaw('MONTH(created_at)')
                        ->get();
        return $results;
    }

    public function handleProduct()
    {
        $results = Cart::join('products', 'carts.id_product', '=', 'products.id')
                        ->selectRaw('carts.id_product as id, products.name as namePrd, products.file as imgPrd, SUM(carts.qty) as qtyBuy, SUM(carts.price * carts.qty) as total')
                        ->groupBy('carts.id_product', 'products.name')
                        ->orderBy('qtyBuy', 'desc')
                        ->orderBy('total', 'desc')
                        ->search()
                        ->paginate(10);

        return $results;
    }
}