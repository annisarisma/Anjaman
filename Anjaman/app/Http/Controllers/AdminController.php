<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Address;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //Jumlah Item Per Kategori

        $products_tas = Product::getProductByCategory('tas')->count();
        $products_keranjang = Product::getProductByCategory('keranjang')->count();
        $products_topi = Product::getProductByCategory('topi')->count();
        $products_pot = Product::getProductByCategory('pot')->count();
        $items = [$products_keranjang, $products_tas, $products_topi, $products_pot];

        //Transaksi
        $dikemas = Order::getOrderByStatus('dikemas')->count();
        $dikirim = Order::getOrderByStatus('dikirim')->count();
        $selesai = Order::getOrderByStatus('selesai')->count();
        $status = [$dikemas, $dikirim, $selesai];

        //Stok per kategori
        $stok_tas = Product::getProductStockByCategory('tas');
        $stok_keranjang = Product::getProductStockByCategory('keranjang');
        $stok_topi = Product::getProductStockByCategory('topi');
        $stok_pot = Product::getProductStockByCategory('pot');
        $stock = [$stok_keranjang, $stok_tas, $stok_topi, $stok_pot];

        //Pembelian Bulan Ini
        $may = Order::getOrderByMonth('selesai', '5')->count();
        $jun = Order::getOrderByMonth('selesai', '6')->count();
        $jul = Order::getOrderByMonth('selesai', '7')->count();
        
        //$agt = Order::getOrderByMonth('selesai', '8')->count();

        $purchased = [$may, $jun, $jul, //$agt 
                    ];

        return view('/admin/dashboard', [
            'title' => 'Admin | Dashboard',
            'bestsellers' => Product::getBestSellingProduct(),
        ])  
            ->with('items',json_encode($items,JSON_NUMERIC_CHECK))
            ->with('status',json_encode($status,JSON_NUMERIC_CHECK))
            ->with('stock',json_encode($stock,JSON_NUMERIC_CHECK))
            ->with('purchased',json_encode($purchased,JSON_NUMERIC_CHECK));;

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function transaksi_show()
    {
        return view('/admin/transaksi', [
            'title' => 'Admin | Transaksi',
            'order' => Order::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function transaksi_edit($id)
    {
        $order = Order::findOrFail($id);
        return view('/admin/editstatus', [
            'order' => $order,
            'title' => 'Admin | Transaksi'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function transaksi_update(Request $request, int $id) {

        // validating input
        $order = Order::find($id);

        $order->status = $request['status'];
        $order->save();
        return redirect('/admin/transaksi')->with('success','Status has been updated!');
    }
    
    public function detail(int $id) {

        $detail = OrderDetail::getOrderDetailById($id);
        $order = Order::getOrderById($id);

        return view('/admin/detailtransaksi', [
            'title' => 'Admin | Transaksi',
            'detail' => $detail,
            'order' => $order
        ]);
    }

    public function destroy_order($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect('/admin/transaksi')->with('error','Transaction has been deleted!');;
    }
    
    // Manage Market

    public function managemarket_show()
    {
        return view('/admin/manage_market', [
            'product' => Product::all(),
            'title' => 'Admin | Manage Market'
        ]);
    }

    public function managemarket_edit(int $id) {

        $product = Product::getProductById($id);
        $galleries = Gallery::getGalleries();

        return view('/admin/editmanagemarket', [
            'product' => $product,
            'galleries' => $galleries,
            'title' => 'Admin | Manage Market'
        ]);
    }

    public function managemarket_create() {
        return view('admin/createmanagemarket', [
            'title' => 'Product | Create'
        ]);
    }

    public function managemarket_store(Request $request) {

        if($request->hasFile("image-cover")){
            $file=$request->file("image-cover");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(public_path("storage/images"), $imageName);

            $product = new Product([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'category' => $request->category,
                'image' => $imageName
            ]);
            $product->save();
        }

        if($request->hasFile("image1")){
            $file=$request->file("image1");
            $imageName1=time().'_'.$file->getClientOriginalName();
            $file->move(public_path("storage/images"), $imageName1);
            
            $request['product_id']=$product->id;
            $request['images']=$imageName1;
            Gallery::create($request->all());
        }

        if($request->hasFile("image2")){
            $file=$request->file("image2");
            $imageName2=time().'_'.$file->getClientOriginalName();
            $file->move(public_path("storage/images"), $imageName2);
            
            $request['product_id']=$product->id;
            $request['images']=$imageName2;
            Gallery::create($request->all());
        }

        if($request->hasFile("image3")){
            $file=$request->file("image3");
            $imageName3=time().'_'.$file->getClientOriginalName();
            $file->move(public_path("storage/images"), $imageName3);
            
            $request['product_id']=$product->id;
            $request['images']=$imageName3;
            Gallery::create($request->all());
        }

        return redirect('/admin/manage_market')
            ->with('success','New product has been created!');

    }

    public function managemarket_update(Request $request, $id)
    {
        $product=Product::findOrFail($id);

        if($request->hasFile("image-cover")){
            if (File::exists("storage/images/".$product->image)) {
                File::delete("storage/images/".$product->image);
            }
            $file=$request->file("image-cover");
            $product->image=time()."_".$file->getClientOriginalName();
            $file->move(public_path("storage/images"),$product->image);
            $request['image-cover']=$product->image;
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category' => $request->category,
            'image-cover'=>$product->image
        ]);

        if($request->hasFile("image1")){
            $gallery_id = $request->gallery_id0;
            $gallery=Gallery::findOrFail($gallery_id);
            if (File::exists("storage/images/".$gallery->images)) {
                File::delete("storage/images/".$gallery->images);
            }
            $file=$request->file("image1");
            $gallery->images=time()."_".$file->getClientOriginalName();
            $file->move(public_path("storage/images"),$gallery->images);
            $request['image-cover']=$gallery->images;

            $gallery->update([
                'image1'=>$gallery->images,
                'product_id' => $request->product_id
            ]);
        }

        if($request->hasFile("image2")){
            $gallery_id = $request->gallery_id1;
            $gallery=Gallery::findOrFail($gallery_id);
            if (File::exists("storage/images/".$gallery->images)) {
                File::delete("storage/images/".$gallery->images);
            }
            $file=$request->file("image2");
            $gallery->images=time()."_".$file->getClientOriginalName();
            $file->move(public_path("storage/images"),$gallery->images);
            $request['image2']=$gallery->images;

            $gallery->update([
                'image2'=>$gallery->images,
                'product_id' => $request->product_id
            ]);
        }

        if($request->hasFile("image3")){
            $gallery_id = $request->gallery_id2;
            $gallery=Gallery::findOrFail($gallery_id);
            if (File::exists("storage/images/".$gallery->images)) {
                File::delete("storage/images/".$gallery->images);
            }
            $file=$request->file("image3");
            $gallery->images=time()."_".$file->getClientOriginalName();
            $file->move(public_path("storage/images"),$gallery->images);
            $request['image3']=$gallery->images;

            $gallery->update([
                'image3'=>$gallery->images,
                'product_id' => $request->product_id
            ]);
        }
    
        return redirect('/admin/manage_market')->with('success','Market data has been updated!');
    }

    public function managemarket_destroy($id)
    {
        $product = Product::find($id);
        if (File::exists(public_path("storage/images/".$product->image))) {
            File::delete(public_path("storage/images/".$product->image));
        }

        $galleries = Gallery::where("product_id",$product->id)->get();
        foreach($galleries as $gallery) {
            if (File::exists(public_path("storage/images/".$gallery->images))) {
                File::delete(public_path("storage/images/".$gallery->images));
            }
        }

        $product->delete();
        $galleries->each->delete();

        return redirect('/admin/manage_market')->with('error','Product has been deleted!');
    }

    public function feedback() {
        return view('admin/feedback', [
            'title' => 'Admin | Feedback',
            'feedbacks' => Feedback::getFeedbacks(),
        ]);
    }
}