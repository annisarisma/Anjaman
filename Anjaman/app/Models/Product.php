<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Gallery;

class Product extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category',
        'image'
    ];

    public function galleries(){
        return $this->hasMany(Gallery::class);
    }

    protected $table = 'products';

    protected $guarded = [
        'id'
    ];

    public static function getProducts() {
        $products = DB::table('products')
            ->get();

        return $products;
    }

    public static function getProductById(int $id) {
        $product = DB::table('products')
            ->where('id', $id)
            ->first();
            
        return $product;
    }

    public static function getProductByCategory(String $category) {
        $product = DB::table('products')
            ->where('category', $category)
            ->get();
            
        return $product;
    }
    
    public static function getProductStockByCategory(String $category) {
        $product = Product::where('category', $category)
            ->get()
            ->sum('stock');
            
        return $product;
    }

    public static function getBestSellingProduct() {
        DB::statement("SET SQL_MODE=''");
        $bestsellers = DB::table('products as p')
        ->join('order_details as od', 'od.product_id', '=', 'p.id')
        ->join('orders as o', 'od.order_id', '=', 'o.id')
        ->where('o.status', 'selesai')
        ->select('od.*', 'p.*', DB::raw('SUM(od.quantity) as qty'))
        ->groupBy('p.id')
        ->orderByDesc('qty')
        ->get();
        return $bestsellers;
    }
}