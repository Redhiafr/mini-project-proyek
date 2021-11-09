<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'stock',
        'price',
        'category_id',
        'brand_id'
    ];

    public static function index()
    {
        return Product::all();
    }

    public static function store(Request $request)
    {
        Product::create($request->all());
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function image() {
        return $this->hasOne(Image::class);
    }

    public function shopping_cart() {
        return $this->hasMany(ShoppingCart::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class, 'order_products', 'order_id', 'product_id');
    }
}
