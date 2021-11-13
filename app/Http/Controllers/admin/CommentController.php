<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentPro;
use Toastr;

class CommentController extends Controller
{
    public function getComment(){
        $data = CommentPro::join('product','rating.product_id','=','product.id')
                            ->select('rating.*','product.name','product.image')
                            ->selectRaw('count(*) as total, product_id')
                            ->orderBy('rating.time','asc')
                            ->groupBy('product_id')
                            ->get();   
        return view('admin.comment.comment_product',compact('data'));
    }

    public function detailComment($id){
        $data = CommentPro::where('rating.product_id',$id)
                            ->orderBy('rating.time','asc')
                            ->get();  
        return view('admin.comment.comment_product_detail',compact('data'));
    }

    public function delComment(Request $request){
        $data = $request->all();
        if(isset($data['checkbox'])){
            foreach($data['checkbox'] as $id){
                $comment = CommentPro::find($id);
                $comment->delete();
            }
            Toastr::success('Xóa bình luận thành công', 'Thành công');
            return back();
        }else{
            Toastr::error('Chọn ít nhất 1 bình luận để xóa', 'Thất bại');
            return back();
        }
    }
}
