<?php

namespace App\Http\Controllers\home;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Category;
use App\Models\childCate;
use App\Models\Product;
use App\Models\Gallrey;
use App\Models\Rating;
use App\Models\Blog;
use App\Models\CategoryBlog;
use Toastr;
use Mail;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $products = Category::join('product', 'product.category_id', '=', 'category.id')
                            ->select(('category.name as name_cate'), ('category.slug as slug_cate'),'product.*')
                            ->get();
        $blogs = Blog::orderbyDesc('id')->paginate(3);
        $category = Category::where('status','=',1)->get();
        $child_cate = childCate::where('status','=',1)->get();
        $product_view = Product::orderbyDesc('views')->paginate(3);
        $product_new = Product::orderbyDesc('id')->paginate(3);
        $product_like = Product::orderbyDesc('like')->paginate(3);
        $slide_banner = Slide::orderbyDesc('id')->where('slide_status','=',1)->take(3)->get();
        $data = [
            'blogs' => $blogs,
            'category' => $category,
            'child_cate' => $child_cate,
            'products' => $products,
            'product_view' => $product_view,
            'product_new' => $product_new,
            'product_like' => $product_like,
            'slide_banner' => $slide_banner,
        ];
        return view('home.index.index',$data);
    }

    public function allPro(){
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='tang_dan'){
                $products = Product::orderBy('price','ASC')->paginate(9)->appends(request()->query());
            }elseif($sort_by=='giam_dan'){
                $products = Product::orderBy('price','DESC')->paginate(9)->appends(request()->query());
            }elseif($sort_by=='kytu_az'){
                $products = Product::orderBy('name','ASC')->paginate(9)->appends(request()->query());
            }else{
                $products = Product::orderBy('name','DESC')->paginate(9)->appends(request()->query());
            }
        }else{
            $products = Product::orderbyDesc('id')->paginate(9);
        }
            $product_sales = Product::join('child_category', 'child_category.id', '=', 'child_cate_id')
                                    ->select(('child_category.name as name_cate'),'product.*')
                                    ->orderbyDesc('price_sales')->take(15)->get();
            $product_new = Product::orderbyDesc('id')->paginate(3);
            $category = Category::where('status','=',1)->get();
            $child_cate = childCate::where('status','=',1)->get();
            $data = [
                'category' => $category,
                'products' => $products,
                'product_sales' => $product_sales, 
                'product_new' => $product_new,
                'child_cate' => $child_cate,
            ];
            return view('home.page.product',$data);
    }

    public function ByCategory($id)
    {
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='tang_dan'){
                $products = Product::where('child_cate_id',$id)->orderBy('price','ASC')->paginate(9)->appends(request()->query());
            }elseif($sort_by=='giam_dan'){
                $products = Product::where('child_cate_id',$id)->orderBy('price','DESC')->paginate(9)->appends(request()->query());
            }elseif($sort_by=='kytu_az'){
                $products = Product::where('child_cate_id',$id)->orderBy('name','ASC')->paginate(9)->appends(request()->query());
            }else{
                $products = Product::where('child_cate_id',$id)->orderBy('name','DESC')->paginate(9)->appends(request()->query());
            }
        }else{
            $products = Product::where('child_cate_id',$id)->orderBy('id','DESC')->paginate(9);
        }
        $product_sales = Product::join('child_category', 'child_category.id', '=', 'child_cate_id')
                                ->select(('child_category.name as name_cate'),'product.*')
                                ->orderbyDesc('price_sales')->take(15)->get();
        $product_new = Product::where('child_cate_id',$id)->orderbyDesc('id')->paginate(3);
        $category = Category::where('status','=',1)->get();
        $child_cate = childCate::where('status','=',1)->get();
        $child_cate_name = childCate::find($id);
        $data = [
            'child_cate_name' => $child_cate_name,
            'category' => $category,
            'products' => $products,
            'product_sales' => $product_sales, 
            'product_new' => $product_new,
            'child_cate' => $child_cate,
        ];
        return view('home.page.by_category',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $products = Product::where('id',$id)->limit(1)->get();
        $gallerys = Gallrey::where('product_id',$id)->get();
        $rating = Rating::where('product_id',$id)->avg('rating');
        $count_rating = Rating::where('product_id',$id)->count('rating');
        $rating = round($rating);
        $category = Category::where('status','=',1)->get();
        $child_cate = childCate::where('status','=',1)->get();
        //Tăng lượt xem mỗi lẩn click vào page
        $views_product = Product::where('id',$id)->first();
        $views_product->views = $views_product->views +1;
        $views_product->save();

        //Sản phẩm liên quan
        foreach($products as $pro){
            $category_id = $pro->category_id;
        }
        $product_offer= Product::where('category_id',$category_id)->whereNotIn('id',[$id])->paginate(4);
        $data = [
            'category' => $category,
            'child_cate' => $child_cate,
            'products' => $products, 
            'gallerys' => $gallerys,
            'count_rating' => $count_rating,
            'rating' => $rating,
            'product_offer' => $product_offer,
        ];
        return view('home.page.product_detail',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert_rating(Request $request){
        $data = $request->all();
        $rating = new Rating();
    
        $rating->product_id = $data['product_id'];
        $rating->rating = $data['index'];

        $dt = Carbon::now('Asia/Ho_Chi_Minh');

        $rating->time = $dt->toDayDateTimeString();
        $rating->name = $data['name'];
        $rating->email = $data['email']; 
        $rating->content = $data['comment_content'];
        $rating->save();

    }

    public function LoadComment(Request $request)
    {
        $product_id = $request->product_id;
        $output = '';
        $comment = Rating::where('product_id',$product_id)->get();
        $count = 1;
        foreach($comment as $key => $com){
            $output.= '<div class="bg-light p-2" style="border-bottom: 1px solid rgb(240, 240, 240);">
            <div class="d-flex flex-row user-info"><img class="rounded-circle" src="'.asset('admin/images/user/user.jpg').'" width="37" height="37">
                <div class="d-flex flex-column justify-content-start ml-2">
                <span class="d-block font-weight-bold name">'.$com->name.' - <span class="">'.$com->rating.'</span><i class="fa fa-star" style="color: rgb(228, 228, 8)"></i></span>               
                <span class="date text-black-50">'.date('d/m/Y H:i:s',strtotime($com->time)).'</span></div>
            </div>
            <div class="mt-2 bg-light">
                <p class="comment-text">'.$com->content.'</p>
            </div>
            </div>';
        }   
        echo $output;
    }

    public function LikeProduct(Request $request)
    {
        $data = $request->all();
        $product = Product::where('id',$data['product_id'])->first();
        $product->like = $product->like+1;
        $product->save(); 
    }


    public function Contact(Request $request)
    {
        $data = $request->all();
        $category = Category::where('status','=',1)->get();
        $child_cate = childCate::where('status','=',1)->get();
        if($data){
           $contact =  ['name'=>$data['name'],
                'email'=>$data['email'],
                'phone'=>$data['phone'],
                'message'=>$data['message']
            ];   
            \Mail::send('mail.mail_contact', ['contact'=>$contact], 
                
                function ($message) {
                    $message->from('phucnhps12099@fpt.edu.vn', 'GreenMarket.com')->to('phucnh2307@gmail.com')->subject('Thư liên hệ');
            });
            Session::flash('thongbao','Đã gửi mail thành công');
        }
        $data = [
            'category' => $category,
            'child_cate' => $child_cate,
        ];
        return view('home.page.contact',$data);
    }

    public function search(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $products = Product::where('name','like','%'.$tukhoa.'%')
                            ->orwhere('price_sales',$tukhoa)
                            ->paginate(9)->appends(request()->query());
        $category = Category::where('status','=',1)->get();
        $child_cate = childCate::where('status','=',1)->get();
        $product_new = Product::orderbyDesc('id')->paginate(3);
        $data = [
            'tukhoa' => $tukhoa,
            'products' => $products,
            'category' => $category,
            'child_cate' => $child_cate,
            'product_new' => $product_new,
        ];
        return view('home.page.search',$data);
    }

    public function search_ajax(Request $request){
        $data = $request->all();
        if($data['keywords']){
            $products = Product::where('name','LIKE','%'.$data['keywords'].'%')->get();
            $output = '<ul class="dropdown-menu" style="display:block;">';
            foreach($products as $item){
                $output.= '<li class="li_search_ajax"><a href="chi-tiet-san-pham/'.$item->id.'/'.$item->slug.'">'.$item->name.'</a></li>';
            }
            $output .='</ul>';
            echo $output;
        }
    }
}