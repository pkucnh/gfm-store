<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\childCate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Toastr;

class childCateController extends Controller
{

    public function index()
    {
        
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
        
        Toastr::success('Thêm danh mục thành công', 'Thành công');
        return Redirect::to("category");
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

   
    public function destroy($id)
    {
        //
    }
}
