<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'images',
        'product_id'
    ];

    public function products(){
        return $this->belongsTo(Product::class);
    }

    public static function getGalleries() {
        $galleries = DB::table('galleries')
            ->get();

        return $galleries;
    }

    public static function getGalleryById(int $id) {
        $gallery = DB::table('galleries')
            ->where('product_id', $id)
            ->first();
            
        return $gallery;
    }
}
