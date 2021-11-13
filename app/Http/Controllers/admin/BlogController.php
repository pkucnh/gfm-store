<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Blog;
use App\Models\CategoryBlog;
use Toastr;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        // $this->middleware('permission:xem danh muc', ['only'=> ['index']]);
        $this->middleware('permission:them bai viet', ['only'=> ['create','store']]);
        $this->middleware('permission:cap nhat bai viet', ['only'=> ['edit','update']]);
        $this->middleware('permission:xoa bai viet', ['only'=> ['destroy']]);
    }

    public function index()
    {
        $blog = blog::all();

        $data = [
            'blog' => $blog,
        ];
        return view('admin.blog.show',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = CategoryBlog::all();
        return view('admin.blog.create');
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
        $image = $request->file('image');
        $imagename = $image->getClientOriginalName();                                 
        $storedPath = $image->move('admin/image/blog', $image->getClientOriginalName());

        $blog = new blog();
        $blog->image =  $imagename; 
        $blog->name =  $data['name']; 
        $blog->views = 0;
        $blog->slug = Str::slug($data['name'],"-");
        $blog->summary =  $data['summary']; 
        $blog->content =  $data['content']; 
        // $blog->post_day =  $data['post_day']; 
        $blog->post_day = now(); 
        $blog->category_id =  $data['category_id']; 
        
        $blog->save();
        Toastr::success('Thêm danh mục thành công', 'Thành công');
        return Redirect::to("blog");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.blog.update');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = blog::find($id);
        $data = [
            'blog' => $blog,
        ];
        return view('admin.blog.update',$data);
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
        $blog = blog::find($id);
        $image = $request->file('img');


        if(!$image){
            $imagename  = $blog->image;
        }else{
            $imagename = $image->getClientOriginalName();                                 
            $storedPath = $image->move('admin/image/blog', $image->getClientOriginalName());
        }

        $blog->image =  $imagename; 
        $blog->name =  $data['name']; 
        $blog->slug = Str::slug($data['name'],"-");
        $blog->summary = $data['summary'];
        $blog->post_day = $data['post_day'];
        $blog->content = $data['content'];

        $blog->save();
        Toastr::success('Cập nhật danh mục thành công', 'Thành công');
        return Redirect::to("blog");
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
                $blog = blog::find($id);
                $blog->delete();
            }
            Toastr::success('Xóa danh mục thành công', 'Thành công');
            return Redirect::to("blog");          
        }else{
            Toastr::error('Chọn ít nhất 1 danh mục để xóa', 'Thất bại');
            return Redirect::to("blog");  ;;
        }
    }

}