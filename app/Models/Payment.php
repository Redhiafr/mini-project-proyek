<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'account_name',
        'account_number',
        'image',
    ];

    public static function index()
    {
        return Payment::all();
    }

    public static function store(Request $request)
    {
        $image_name = null;

        if ($request->file('image')) {
            $image_name = $request->file('image')->store('images/payments', 'public');
        }

        $payments = new Payment;
        $payments->name = $request->get('name');
        $payments->account_name = $request->get('account_name');
        $payments->account_number = $request->get('account_number');

        $payments->image = $image_name;
        $payments->save();
    }

    public static function edit(Request $request, Payment $payment)
    {
        if ($request->file('image') == "") {
            $payment->update([
                'name' => $request->name,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
            ]);
        } else {
            if ($payment->image && file_exists(storage_path('app/public/'.$payment->image))) {
                \Storage::delete('public/'.$payment->image);
            }
            $image = $request->file('image')->store('images/payments', 'public');

            $payment->update([
                'name' => $request->name,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
                'image' => $image,
            ]);
        }
    }

    public static function remove(Payment $payment)
    {
        if ($payment->image && file_exists(storage_path('app/public/'.$payment->image))) {
            \Storage::delete('public/'.$payment->image);
        }
        $payment->delete();
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
