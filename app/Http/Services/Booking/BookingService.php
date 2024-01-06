<?php


namespace App\Http\Services\Booking;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class BookingService
{
    public function create($request)
    {
        $id_product = (int) $request->input('id_product');

        if ($id_product <= 0) {
            Session::flash('error', 'Sản phẩm không chính xác');
            return false;
        }

        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $id_product => 1
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $id_product);
        if ($exists) {
            $carts[$id_product] = $carts[$id_product] + 1;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$id_product] = 1;
        Session::put('carts', $carts);

        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts))
            return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'file')
            ->where('status', 1)
            ->whereIn('id', $productId)
            ->get();
    }

    public function update($request)
    {
        Session::put('carts', $request->input('qty'));

        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;
    }

    public function booking($request)
    {
        try {
            $carts = Session::get('carts');

            if (is_null($carts))
                return false;

            $productId = array_keys($carts);
            $products = Product::select('id', 'name', 'price', 'file')
                                ->where('status', 1)
                                ->whereIn('id', $productId)
                                ->get();

            $data = [];
            foreach ($products as $product) {
                $data[] = [
                    'id_user'    => $request->input('id_user'),
                    'fname'      => $request->input('name'),
                    'phone'      => $request->input('phone'),
                    'email'      => $request->input('email'),
                    'address'    => $request->input('address'),
                    'id_product' => $product->id,
                    'qty'        => $carts[$product->id],
                    'price'      => $product->price,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            Cart::insert($data);

            Session::flash('success', 'Đặt Hàng Thành Công!');
            Session::forget('carts');
        } catch (\Exception $err) {
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau! ');
            return false;
        }

        return true;
    }

    protected function infoProductCart($carts, $customer_id)
    {
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'pty' => $carts[$product->id],
                'price' => $product->price
            ];
        }

        return Cart::insert($data);
    }

    // ====================== ADMIN-ORDER ======================
    public function getCustomer()
    {
        return Cart::join('users', 'carts.id_user', '=', 'users.id')
                    ->selectRaw('users.id as idUser, users.name as username, carts.fname, carts.email, carts.phone, carts.created_at')
                    ->groupBy('carts.id_user', 'carts.fname', 'carts.email', 'carts.phone', 'carts.created_at')
                    ->orderBy('carts.created_at', 'desc')
                    ->search()
                    ->paginate(10);
    }

    public function getInfor($id, $date)
    {
        return Cart::where([
                            ['id_user', $id],
                            ['created_at', $date]
                        ])
                        ->firstOrFail();
    }

    public function getOrder($id, $date)
    {
        return Cart::select('id_product', 'qty', 'price')
                    ->where([
                        ['id_user', $id],
                        ['created_at', $date]
                    ])
                    ->get();
    }

    // ======================================== USER-ORDER ========================================
    public function listInfo($id)
    {
        return Cart::selectRaw('fname, email, phone, address, SUM(qty*price) as total_price, created_at')
                    ->where('id_user', $id)
                    ->groupBy('fname', 'email', 'phone', 'address', 'created_at')
                    ->orderbyDesc('created_at')
                    ->search()
                    ->paginate(10);
    }
}