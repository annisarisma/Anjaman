<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;

class MarketController extends Controller
{
    public function show() {
        return view('user/market', [
            'products' => Product::getProducts(),
            'title' => 'Home | Market',
            'showing' => 'all'
        ]);
    }

    function find(Request $request){
        $request->validate([
          'query'=>'required|min:1'
       ]);

       $search_text = $request->input('query');
       $product = DB::table('products')
                  ->where('name','LIKE','%'.$search_text.'%')->get();
        return view('user/market',[
            'products'=>$product,
            'title' => 'Home | Market',
            'showing' => 'all'
    ]);

    #CATEGORY#
    
    }
    public function show_tas() {
        return view('user/market', [
            'products' => Product::getProductByCategory('tas'),
            'title' => 'Home | Market',
            'showing' => 'tas'
        ]);
    }
    public function show_keranjang() {
        return view('user/market', [
            'products' => Product::getProductByCategory('keranjang'),
            'title' => 'Home | Market',
            'showing' => 'keranjang'
        ]);
    }
    public function show_topi() {
        return view('user/market', [
            'products' => Product::getProductByCategory('topi'),
            'title' => 'Home | Market',
            'showing' => 'topi'
        ]);
    }
    public function show_pot() {
        return view('user/market', [
            'products' => Product::getProductByCategory('pot'),
            'title' => 'Home | Market',
            'showing' => 'pot'
        ]);
    }

    public function product(int $id) {
        return view('user/details', [
            'product' => Product::getProductById($id),
            'products' => Product::getProducts(),
            'galleries' => Gallery::getgalleries(),
            'review' => Review::getReviewProduct($id),
            'review_all'=>Review::getReview(),
            'reviews' => Review::getReviewUser($id),
            'bestsellers' => Product::getBestSellingProduct(),
            'title' => 'Home | Market'
        ]);
    }
}