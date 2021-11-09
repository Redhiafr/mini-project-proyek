<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public static function index()
    {
        return Category::all();
    }

    public static function store(Request $request)
    {
        Category::create($request->all());
    }

    public static function edit(Request $request, Category $category)
    {
        $category->update($request->all());
    }
}
