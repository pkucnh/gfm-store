<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Toastr;
<<<<<<< HEAD

use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\Gallrey;
=======
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\galley;
use App\Models\childCate;
>>>>>>> 70f6a11f6dbf0d4cfa10d7db3cb4d4e9133cbd6b

class ProductController extends Controller
{
  
    public function index()
    {
        $product = Product::all();
<<<<<<< HEAD
        return view('admin.products.show', compact('product'));
=======
        return view('admin.products.show_products', compact('product'));
>>>>>>> 70f6a11f6dbf0d4cfa10d7db3cb4d4e9133cbd6b
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
<<<<<<< HEAD
                // Toastr::error('Sản phẩm đã tồn tại', 'Thất bại');
=======
                Toastr::error('Sản phẩm đã tồn tại', 'Thất bại');
>>>>>>> 70f6a11f6dbf0d4cfa10d7db3cb4d4e9133cbd6b
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
<<<<<<< HEAD
        $product->description = $data['note'];
        $product->category_id = $data['category'];
        $product->quanlity = $data['quantity'];
        $product->add_day = $data['add_day'];
        $product->expired_day = $data['expired_day'];
        $product->save();


=======
        $product->category_id = $data['category'];
        $product->child_cate_id = $data['child_cate_id'];
        $product->quanlity = $data['quantity'];
        $product->add_day = $data['add_day'];
        $product->expired_day = $data['expired_day'];
        $product->description = $data['description'];
        $product->save();


        // insert ảnh liên quan sản phẩm
>>>>>>> 70f6a11f6dbf0d4cfa10d7db3cb4d4e9133cbd6b
        if($img_gallery){
            foreach($img_gallery as $val){
                $nameImgGalley = $val->getClientOriginalName();
                $val->move('admin/images/product', $nameImgGalley);

<<<<<<< HEAD
                $gallery = new Gallrey();
=======
                $gallery = new galley();
>>>>>>> 70f6a11f6dbf0d4cfa10d7db3cb4d4e9133cbd6b
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
<<<<<<< HEAD
        //
=======
        $cate = Category::all();
        $product = Product::find($id);
        $child_cate = childCate::where('id', $product['child_cate_id'])->get();
        $gallery = galley::where('product_id', $id)->get();
        return view('admin.products.edit', compact('product', 'cate', 'gallery', 'child_cate'));
>>>>>>> 70f6a11f6dbf0d4cfa10d7db3cb4d4e9133cbd6b
    }

    public function update(Request $request, $id)
    {
<<<<<<< HEAD
        //
    }

   
    public function destroy($id)
    {
        // $data = $request->all();
        if(isset($_POST['checkbox'])){
            foreach($_POST['checkbox'] as $id){
=======

        $data = $request->all();

        $image = $request->file('img_gallery_1');
        if($image){
            $img_name1 = $image->getClientOriginalName();
            $storedPath = $image->move('admin/images/product', $img_name1);
        }else{
            $img_name1 =  $data['img_gallery_old_1'];
        }

        $image = $request->file('img_gallery_2');
        if($image){
            $img_name2 = $image->getClientOriginalName();
            $storedPath = $image->move('admin/images/product', $img_name2);
        }else{
            $img_name2 = $data['img_gallery_old_2'];
        }

        $image = $request->file('img_gallery_3');
        if($image){
            $img_name3 = $image->getClientOriginalName();
            $storedPath = $image->move('admin/images/product', $img_name3);
        }else{
            $img_name3 =  $data['img_gallery_old_3'];
        }

        $gallery1 = galley::find($data['id_gallery_1']);
        $gallery1->name = $img_name1;
        $gallery1->save();

        $gallery2 = galley::find($data['id_gallery_2']);
        $gallery2->name = $img_name2;
        $gallery2->save();

        $gallery3 = galley::find($data['id_gallery_3']);
        $gallery3->name = $img_name3;
        $gallery3->save();


        $product = Product::find($id);

        $image_old = $data['img_old'];

        $image = $request->file('img');
        if($image){
            $img_name = $image->getClientOriginalName();
            $storedPath = $image->move('admin/images/product', $img_name);
        }else{
            $img_name = $image_old;
        }
        

        $product->name = $data['name_pro'];
        $product->slug = Str::slug($data['name_pro']);
        $product->image = $img_name;
        $product->price = $data['price'];
        $product->price_sales = $data['price_sale'];
        $product->status = $data['status'];
        $product->category_id = $data['category'];
        $product->child_cate_id = $data['child_cate_id'];
        $product->quanlity = $data['quantity'];
        $product->add_day = $data['add_day'];
        $product->expired_day = $data['expired_day'];
        $product->description = $data['description'];
        $product->save();

        Toastr::success('Cập nhật sản phẩm thành công', 'Thành công');
        return redirect('product');
    }

   
    public function destroy(Request $request)
    {
        $data = $request->all();
        if(isset($data['checkbox'])){
            foreach($data['checkbox'] as $id){
>>>>>>> 70f6a11f6dbf0d4cfa10d7db3cb4d4e9133cbd6b
                $product = Product::find($id);
                $product->delete();
            }
            Toastr::success('Xóa sản phẩm thành công', 'Thành công');
<<<<<<< HEAD
            return redirect('product');         
        }else{
            Toastr::error('Chọn ít nhất 1 sản phẩm để xóa', 'Thất bại');
            return redirect('product');
=======
            return Redirect::to("product");          
        }else{
            Toastr::error('Chọn ít nhất 1 sản phẩm để xóa', 'Thất bại');
            return Redirect::to("product");
>>>>>>> 70f6a11f6dbf0d4cfa10d7db3cb4d4e9133cbd6b
        }
    }
}
