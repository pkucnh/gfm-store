<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Gallrey;
use App\Models\Rating;
use Toastr;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Category::join('product', 'product.category_id', '=', 'category.id')->select(('category.name as name_cate'), ('category.slug as slug_cate'),'product.*')->get();
        $category = Category::where('status','=',1)->get();
        $product_view = Product::orderbyDesc('views')->paginate(3);
        $product_new = Product::orderbyDesc('id')->paginate(3);
        $product_like = Product::orderbyDesc('like')->paginate(3);
        $data = [
            'category' => $category,
            'products' => $products,
            'product_view' => $product_view,
            'product_new' => $product_new,
            'product_like' => $product_like,
        ];

        return view('home.index.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($slug,$id)
    {
        $products = Product::where('id',$id)->limit(1)->get();
        $gallerys = Gallrey::where('product_id',$id)->get();
        $rating = Rating::where('product_id',$id)->avg('rating');
        $count_rating = Rating::where('product_id',$id)->count('rating');
        $rating = round($rating);
        $category = Category::where('status','=',1)->get();
      //Tăng lượt xem mỗi lẩn click vào page
        $views_product = Product::where('id',$id)->first();
        $views_product->views = $views_product->views +1;
        $views_product->save();
        //create related products

        foreach($products as $pro){
            $category_id = $pro->category_id;
        }
        $product_offer= Product::where('category_id',$category_id)->whereNotIn('id',[$id])->paginate(4);
        $data = [
            'category' => $category,
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
            $rating->time = now();
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
                <div class="d-flex flex-row user-info"><img class="rounded-circle" src="'.asset('admin/images/user/user.jpg').'" width="50" height="55">
                    <div class="d-flex flex-column justify-content-start ml-2">
                    <span class="d-block font-weight-bold name">'.$com->name.'</span> <div class="product__details__rating">
                    <span style="font-size: medium; color:rgb(148, 148, 148)">Đánh giá: </span>
                    <span>'.$com->rating.'</span><i class="fa fa-star" style="color: rgb(228, 228, 8)"></i></div>                
                    <span class="date text-black-50">'.$com->time.'</span></div>
                </div>
                <div class="mt-2 bg-light " >
                    <p class="comment-text">'.$com->content.'</p>
                </div>
                </div>';
            }   
            echo $output;
        }
    
    

    public function store(Request $request)
    {
        //
    }

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
