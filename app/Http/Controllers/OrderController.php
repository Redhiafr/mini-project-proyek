<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ShoppingCart;
use App\Models\Payment;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Auth;
use Alert;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.checkout', ['orders' => ShoppingCart::index(), 'payments' => Payment::index()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->name = $request->name;
        $order->phone_number = $request->phone_number;
        $order->address = $request->address1 . ' ' . $request->address2;
        $order->province = $request->province;
        $order->city = $request->city;
        $order->district = $request->district;
        $order->postal_code = $request->postal_code;
        $order->note = $request->notes;
        $order->total = $request->total;
        $order->status = 1;
        $order->payment_id = $request->payment_id;
        $order->save();

        for ($i = 0; $i < count($request->product_id); $i++) {
            $order_product = new OrderProduct;
            $order_product->order_id = $order->id;
            $order_product->product_id = $request->product_id[$i];
            $order_product->qty = $request->qty[$i];
            $order_product->save();

            ShoppingCart::find($request->cart_id[$i])->delete();
        }

        $orders = Order::with('product', 'product.image')->find($order->id);

        Alert::toast('Order berhasil.', 'success');
        return view('customer.success', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
