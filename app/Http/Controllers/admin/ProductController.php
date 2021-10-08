<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\galley;

class ProductController extends Controller
{
  
    public function index()
    {
        return view('admin.products.show_products');
    }

  
    public function create()
    {
        $cate = Category::all();
        return view('admin.products.create', compact('cate'));
    }

   
    public function store(Request $request)
    {
        $data = $request->all();

        //ảnh đại diện sản phẩm
        $image = $request->file('img');
        if($image){
            $img_name = $image->getClientOriginalName();
            $storedPath = $image->move('admin/images/product', $img_name);
        }else{
            $img_name = 'error.jpg';
        }


        // ảnh liên quan sản phẩm
        $img_gallery = $request->file('img_gallery');
        // if($img_gallery == null){
        //     dd('chọn');
        //     // return Redirect::back()->withErrors('Vui lòng chọn ảnh trước khi upload');
        // }elseif(count($fileImg) > 3 || count($fileImg) < 3){
        //     // return Redirect::back()->withErrors('Số ảnh chỉ được up lên là 3');
        // }


        $product = new Product();
        $product->name = $data['name_pro'];
        $product->slug = Str::slug($data['name_pro']);
        $product->image = $img_name;
        $product->price = $data['price'];
        $product->price_sales = $data['price_sale'];
        $product->status = $data['status'];
        $product->category_id = $data['category'];
        $product->quanlity = $data['quantity'];
        $product->save();


        if($img_gallery){
            foreach($img_gallery as $val){
                $nameImgGalley = $val->getClientOriginalName();
                $val->move('admin/images/product', $nameImgGalley);

                $gallery = new galley();
                $gallery->product_id = $product->id;
                $gallery->name =  $nameImgGalley;
                $gallery->save();
                
            }
        }
       
    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
