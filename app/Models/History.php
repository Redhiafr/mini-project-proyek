<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    public static function index()
    {
        return Order::orderByDesc('created_at')->get();
    }

    public static function indexLimit()
    {
        return Order::orderByDesc('created_at')->limit(5)->get();
    }
  
    public function product()
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')->withPivot('qty');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
