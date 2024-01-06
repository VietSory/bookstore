<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author',
        'description',
        'price',
        'quantity',
        'nxb',
        'id_category',
        'file',
        'status',
        'url'
    ];

    public function category()
    {
        return $this->hasOne(Menu::class, 'id', 'id_category')
            ->withDefault(['name_category' => '']);
    }

    public function scopeSearch($query)
    {
        if($key = request()->key) {
            $query = $query->where('name','like','%' . $key . '%');
        }
        return $query;
    }
}
