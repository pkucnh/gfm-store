<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\childCate;
use App\Models\Coupon;
use App\Models\Gallrey;
use App\Models\Rating;
use App\Models\City;
use App\Models\District;
use App\Models\Village;
use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Blog;
use App\Models\CategoryBlog;
use Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Blogs($slug,$id)
    {
        // $id = 0;
        $category = Category::where('status','=',1)->get();
        $child_cate = childCate::where('status','=',1)->get();
        $cate_blogs = CategoryBlog::get();
        $blog_new = Blog::orderbyDesc('id')->paginate(3);
        if($id){
            $blogs = Blog::where('category_id',$id)->paginate(6);
        }else{
            $blogs = Blog::paginate(6);
        }
        $data = [
            'category' => $category,
            'cate_blogs' => $cate_blogs,
            'blogs' => $blogs,
            'blog_new' => $blog_new,
            'child_cate' => $child_cate,
        ];
        return view('home.page.blog',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function BlogDetail($slug, $id)
    {

        
        $category = Category::where('status','=',1)->get();
        $cate_blogs = CategoryBlog::get();
        $blog_new = Blog::orderbyDesc('id')->paginate(3);
        $blogs = Blog::where('id',$id)->limit(1)->get();

        foreach($blogs as $blog){
            $category_id = $blog->category_id;
        }
        $blog_offer = Blog::where('category_id',$category_id)->whereNotIn('id',[$id])->paginate(3);

        $data = [
            'category' => $category,
            'cate_blogs' => $cate_blogs,
            'blogs' => $blogs,
            'blog_new' => $blog_new,
            'blog_offer' => $blog_offer,
        ];
        return view('home.page.blog_detail',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
