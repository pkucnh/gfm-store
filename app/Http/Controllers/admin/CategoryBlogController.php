<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\CategoryBlog;
use Toastr;

class CategoryBlogController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CategoryBlog = CategoryBlog::all();

        $data = [
            'CategoryBlog' => $CategoryBlog,
        ];
        return view('admin.category_blog.show',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_blog.create');
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
        $category_blog = new CategoryBlog();
        $category_blog->name =  $data['name'];
        $category_blog->slug =  Str::slug($data['name']);
        $category_blog->save();
        Toastr::success('Thêm danh mục thành công', 'Thành công');
        return Redirect::to("category_blog");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.category_blog.update');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_blog = CategoryBlog::find($id);
        $data = [
            'category_blog' => $category_blog,
        ];
        return view('admin.category_blog.update',$data);
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
        $category_blog = CategoryBlog::find($id);
        $category_blog->name =  $data['name']; 
        $category_blog->slug =  Str::slug($data['name']);
        $category_blog->save();
        Toastr::success('Cập nhật danh mục thành công', 'Thành công');
        return Redirect::to("category_blog");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $request->all();
        if(isset($data['checkbox'])){
            foreach($data['checkbox'] as $id){
                $category_blog = CategoryBlog::find($id);
                $category_blog->delete();
            }
            Toastr::success('Xóa danh mục thành công', 'Thành công');
            return Redirect::to("category_blog");          
        }else{
            Toastr::error('Chọn ít nhất 1 danh mục để xóa', 'Thất bại');
            return Redirect::to("category_blog");  ;;
        }
    }

}
