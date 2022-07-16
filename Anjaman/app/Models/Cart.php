<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;

    public static function exist($username, $product_id) {
        $flag = DB::table('carts')
            ->where('username', $username)
            ->where('product_id', $product_id)
            ->count();

        return $flag;
    }

    public static function getCartById(int $id) {
        $cart = DB::table('carts')
            ->where('id', $id)
            ->first();
            
        return $cart;
    }

    public static function getProductsOnCartByUsername($username) {
        $products = DB::table('carts as c')
            ->join('products as p', 'c.product_id', '=', 'p.id')
            // ->select('p.id', 'p.name', 'p.description', 'p.price', 'p.stock', 'p.category', 'c.id as cart_id')
            ->select('p.*', 'c.id as cart_id')
            ->where('c.username', '=', $username)
            ->get();

        return $products;
    }
}
