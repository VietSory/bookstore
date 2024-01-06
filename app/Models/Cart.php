<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_product',
        'id_user',
        'fname',
        'email',
        'phone',
        'address',
        'qty',
        'price'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'id_product');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function scopeSearch($query)
    {
        if($key = request()->key) {
            $query = $query->where('carts.created_at','like','%' . $key . '%');
        } elseif($key = request()->keyCus) {
            $query = $query->join('users as usr', 'carts.id_user', '=', 'usr.id')
                           ->where('usr.name', 'like', '%' . $key . '%')
                           ->orWhere('carts.phone', 'like', '%' . $key . '%')
                           ->orWhere('carts.email', 'like', '%' . $key . '%')
                           ->orWhere('carts.fname', 'like', '%' . $key . '%');
        } elseif($key = request()->namePrd) {
            $query = $query->join('products as prd', 'carts.id_product', '=', 'prd.id')
                           ->where('prd.name', 'like', '%' . $key . '%');
        } elseif($key = request()->month) {
            $query = $query->where('carts.created_at','like','%' . $key . '%');
        } elseif($key = request()->keyInfor) {
            $query = $query->where('phone', 'like', '%' . $key . '%')
                           ->orWhere('email', 'like', '%' . $key . '%')
                           ->orWhere('fname', 'like', '%' . $key . '%');
        } elseif($key = request()->date) {
            $query = $query->where('created_at','like','%' . $key . '%');
        }
        return $query;
    }
}
