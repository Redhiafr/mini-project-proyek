<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Brand extends Model
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
        'image'
    ];

    public static function index()
    {
        return Brand::all();
    }

    public static function store(Request $request)
    {
        Brand::create($request->all());
    }

    public static function edit(Request $request, Brand $brand)
    {
        $brand->update($request->all());
    }
}
