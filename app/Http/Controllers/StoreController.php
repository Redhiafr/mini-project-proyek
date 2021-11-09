<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Alert;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Store $stores)
    {
        $store = Store::first();
        return view('stores.index', compact('store'));
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
            'no_telp' => 'required|max:15',
            'address' => 'required|max:255',
            'email' => 'required|max:255'
        ]);
    
        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        Store::store($request);
        Alert::toast('Data Toko berhasil dibuat.', 'success');
        return redirect()->route('stores.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'no_telp' => 'required|max:15',
            'address' => 'required|max:255',
            'email' => 'required|max:255'
        ]);
    
        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        $store->update($request->all());
        Alert::toast('Data Toko berhasil diperbarui.', 'success');
        return redirect()->route('stores.index');
    }
}
