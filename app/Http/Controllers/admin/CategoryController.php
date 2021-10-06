<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;
use Toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();

        $data = [
            'category' => $category,
        ];
        return view('admin.category.show',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $image = $request->file('img');
        $imagename = $image->getClientOriginalName();                                 
        $storedPath = $image->move('admin/images/category', $image->getClientOriginalName());

        $category = new Category();
        $category->image =  $imagename; 
        $category->name =  $data['name']; 
        $category->slug = Str::slug($data['name'],"-");
        $category->status = $data['status']; 

        $category->save();
        Toastr::success('Thêm danh mục thành công', 'Thành công');
        return Redirect::to("category");
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.category.update');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $data = [
            'category' => $category,
        ];
        return view('admin.category.update',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $category = Category::find($id);
        $image = $request->file('img');


        if(!$image){
            $imagename  = $category->image;
        }else{
            $imagename = $image->getClientOriginalName();                                 
            $storedPath = $image->move('admin/images/category', $image->getClientOriginalName());
        }

        $category->image =  $imagename; 
        $category->name =  $data['name']; 
        $category->slug = Str::slug($data['name'],"-");
        $category->status = $data['status']; 

        $category->save();
        Toastr::success('Cập nhật danh mục thành công', 'Thành công');
        return Redirect::to("category");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        Toastr::success('Xóa danh mục thành công', 'Thành công');
        return Redirect::to("category");
    }
}
