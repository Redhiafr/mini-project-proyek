<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Image extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_path',
        'product_id'
    ];

    public static function index()
    {
        return Image::all();
    }

    public static function store(Request $request)
    {
        Image::create($request->all());
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

}
