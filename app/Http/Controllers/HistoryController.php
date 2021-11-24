<?php

namespace App\Http\Controllers;

use App\Models\History;


use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        return view('customer.history',['histories' => History::index()]);
    }
}

