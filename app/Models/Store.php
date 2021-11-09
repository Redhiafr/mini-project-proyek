<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'no_telp',
        'address',
        'email'
    ];

    public static function index()
    {
        return Store::all();
    }

    public static function store(Request $request)
    {
        Store::create($request->all());
    }
}

