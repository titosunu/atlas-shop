<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function order_detail()
    {
        return $this->hasMany('App\Models\OrderDetail', 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
