<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\childCate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Toastr;

class childCateController extends Controller
{
    public function __construct(){
        // $this->middleware('permission:xem danh muc con', ['only'=> ['index']]);
        $this->middleware('permission:them danh muc con', ['only'=> ['create','store']]);
        $this->middleware('permission:cap nhat danh muc con', ['only'=> ['edit','update']]);
        $this->middleware('permission:xoa danh muc con', ['only'=> ['destroy']]);
    }

    public function index()
    {
        $childcate = childCate::all();
        $data = [
            'childcate' => $childcate,
        ];
        return view('admin.childCate.show',$data);
    }

 
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $data = $request->all();

        $childCate = new childCate();
        $childCate->name =  $data['name']; 
        $childCate->slug = Str::slug($data['name'],"-");
        $childCate->id_category = $data['category'];
        $childCate->status = $data['status']; 
        $childCate->save();
        
        Toastr::success('Thêm loại sản phẩm thành công', 'Thành công');
        return Redirect::to("admin/child-category");
    }
    
    
    public function select_category(Request $request)
    {
        $data = $request->all();
        $output = '';
            $child_cate = childCate::where('id_category', $data['id_cate'])->orderby('name', 'ASC')->get();
            foreach($child_cate as $key => $val){
                $output .= '<option value="'.$val->id.'">'.$val->name.'</option>';
            }
        echo $output;
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

   
    public function destroy(Request $request)
    {
        $data = $request->all();
        if(isset($data['checkbox'])){
            foreach($data['checkbox'] as $id){
                $childCate = childCate::find($id);
                $childCate->delete();
            }
            Toastr::success('Xóa danh mục thành công', 'Thành công');
            return Redirect::to("admin/child-category");
        }else{
            Toastr::error('Chọn ít nhất 1 danh mục để xóa', 'Thất bại');
            return Redirect::to("admin/child-category");
        }
    }
}
