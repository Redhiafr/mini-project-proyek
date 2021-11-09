<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Alert;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payments = Payment::index();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'account_name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        Payment::store($request);
        Alert::toast('Payment baru berhasil dibuat.', 'success');
        return redirect()->route('payments.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'account_name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        Payment::edit($request, $payment);
        Alert::toast('Payment berhasil diedit.', 'success');
        return redirect()->route('payments.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        Payment::remove($payment);
        Alert::toast('Payment berhasil dihapus.', 'success');
        return redirect()->route('payments.index');
    }
}
