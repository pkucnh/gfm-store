<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Toastr;

use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\Gallrey;

class ProductController extends Controller
{
  
    public function index()
    {
        $product = Product::all();
        return view('admin.products.show', compact('product'));
    }

  
    public function create()
    {
        $cate = Category::all();
        return view('admin.products.create', compact('cate'));
    }

   
    public function store(Request $request)
    {
        $data = $request->all();
        $check_pro = Product::all();

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


        //kiểm tra sản phẩm đã tồn tại
        foreach($check_pro as $name_pro){
            if($name_pro['name'] == $data['name_pro']){
                // Toastr::error('Sản phẩm đã tồn tại', 'Thất bại');
                return redirect()->back();
            }
        }

        $product = new Product();
        $product->name = $data['name_pro'];
        $product->slug = Str::slug($data['name_pro']);
        $product->image = $img_name;
        $product->price = $data['price'];
        $product->price_sales = $data['price_sale'];
        $product->status = $data['status'];
        $product->description = $data['note'];
        $product->category_id = $data['category'];
        $product->quanlity = $data['quantity'];
        $product->add_day = $data['add_day'];
        $product->expired_day = $data['expired_day'];
        $product->save();


        if($img_gallery){
            foreach($img_gallery as $val){
                $nameImgGalley = $val->getClientOriginalName();
                $val->move('admin/images/product', $nameImgGalley);

                $gallery = new Gallrey();
                $gallery->product_id = $product->id;
                $gallery->name =  $nameImgGalley;
                $gallery->save();
                
            }
        }

        Toastr::success('Thêm sản phẩm thành công', 'Thành công');
        return redirect('product');
       
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
        // $data = $request->all();
        if(isset($_POST['checkbox'])){
            foreach($_POST['checkbox'] as $id){
                $product = Product::find($id);
                $product->delete();
            }
            Toastr::success('Xóa sản phẩm thành công', 'Thành công');
            return redirect('product');         
        }else{
            Toastr::error('Chọn ít nhất 1 sản phẩm để xóa', 'Thất bại');
            return redirect('product');
        }
    }
}
