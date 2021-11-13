<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Toastr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\Product;
use App\Models\Gallrey;
use App\Models\childCate;
class ProductController extends Controller
{
    public function __construct(){
        // $this->middleware('permission:xem san pham', ['only'=> ['index']]);
        $this->middleware('permission:them san pham', ['only'=> ['create','store']]);
        $this->middleware('permission:cap nhat san pham', ['only'=> ['edit','update']]);
        $this->middleware('permission:xoa san pham', ['only'=> ['destroy']]);
    }
  
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
        $img_Gallrey = $request->file('img_gallery');
        // if($img_Gallrey == null){
        //     dd('chọn');
        //     // return Redirect::back()->withErrors('Vui lòng chọn ảnh trước khi upload');
        // }elseif(count($fileImg) > 3 || count($fileImg) < 3){
        //     // return Redirect::back()->withErrors('Số ảnh chỉ được up lên là 3');
        //kiểm tra sản phẩm đã tồn tại
        foreach($check_pro as $name_pro){
            if($name_pro['name'] == $data['name_pro']){
                Toastr::error('Sản phẩm đã tồn tại', 'Thất bại');
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
        $product->category_id = $data['category'];
        $product->child_cate_id = $data['child_cate_id'];
        $product->quanlity = $data['quantity'];
        $product->add_day = $data['add_day'];
        $product->expired_day = $data['expired_day'];
        $product->description = $data['description'];
        $product->save();

        // insert ảnh liên quan sản phẩm
        if($img_Gallrey){
            foreach($img_Gallrey as $val){
                $nameImgGallrey = $val->getClientOriginalName();
                $val->move('admin/images/product', $nameImgGallrey);
                $Gallrey = new Gallrey();
                $Gallrey->product_id = $product->id;
                $Gallrey->name =  $nameImgGallrey;
                $Gallrey->save();
            }
        }
        Toastr::success('Thêm sản phẩm thành công', 'Thành công');
        return Redirect::to("admin/product");
    }

    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $cate = Category::all();
        $product = Product::find($id);
        $child_cate = childCate::where('id', $product['child_cate_id'])->get();
        $Gallrey = Gallrey::where('product_id', $id)->get();
        return view('admin.products.edit', compact('product', 'cate', 'Gallrey', 'child_cate'));
    }

    public function update(Request $request, $id)
    {

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

        $Gallrey1 = Gallrey::find($data['id_gallery_1']);
        $Gallrey1->name = $img_name1;
        $Gallrey1->save();

        $Gallrey2 = Gallrey::find($data['id_gallery_2']);
        $Gallrey2->name = $img_name2;
        $Gallrey2->save();

        $Gallrey3 = Gallrey::find($data['id_gallery_3']);
        $Gallrey3->name = $img_name3;
        $Gallrey3->save();


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
        return Redirect::to("admin/product");
    }

    public function destroy(Request $request)
    {
        $data = $request->all();
        if(isset($data['checkbox'])){
            foreach($data['checkbox'] as $id){
                $product = Product::find($id);
                $product->delete();
            }
            Toastr::success('Xóa sản phẩm thành công', 'Thành công');
            return Redirect::to("admin/product");
        }else{
            Toastr::error('Chọn ít nhất 1 sản phẩm để xóa', 'Thất bại');
            return Redirect::to("admin/product");
        }
    }
}