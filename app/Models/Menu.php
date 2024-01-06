<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'category';      // Nếu tên bảng và tên file (Menu) không trùng nhau thì phải khai báo table

    protected $fillable = [
        'name_category',
        'status',
        'url'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'id_category', 'id');
    }

    public function scopeSearch($query)
    {
        if($key = request()->key) {
            $query = $query->where('name_category','like','%' . $key . '%');
        }
        return $query;
    }
}
