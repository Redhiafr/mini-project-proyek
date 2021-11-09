<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class ShoppingCart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'qty',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function total()
    {
        return ShoppingCart::with('product')->where('user_id', Auth::user()->id)->count();
    }

    public static function index()
    {
        return ShoppingCart::with('product')->where('user_id', Auth::user()->id)->get();
    }

    public static function store(Request $request)
    {
        $count = ShoppingCart::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->count();
        if ($count == 0) {
            ShoppingCart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'qty' => $request->qty,
            ]);
        } else {
            $cart = ShoppingCart::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->first();
            $cart->qty = $cart->qty + $request->qty;
            $cart->save();
        }
    }

    public static function edit(Request $request)
    {
        for ($i = 0; $i < count($request->cart_id); $i++) {
            if ($request->qty[$i] == 0) {
                ShoppingCart::where('id', $request->cart_id[$i])->delete();
            } else {
                ShoppingCart::where('id', $request->cart_id[$i])->update([
                    'qty' => $request->qty[$i],
                ]);
            }
        }
    }
}
