<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Slide;
use Toastr;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Slide::orderBy('id','asc')->get();
        return view('admin.slide.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
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
        $image = $request->file('slide_image');
        if($image){
            $img_name = $image->getClientOriginalName();
            $storedPath = $image->move('admin/images/banner', $img_name);
        }else{
            $img_name = 'error.jpg';
        }

        $slide = new Slide();
        $slide->slide_title = $data['slide_title'];
        $slide->slide_image = $img_name;
        $slide->slide_content = $data['slide_content'];
        $slide->slide_description = $data['slide_description'];
        $slide->slide_status = $data['slide_status'];
        $slide->save();

        Toastr::success('Thêm banner mới thành công', 'Thành công');
        return Redirect::to("admin/slide-banner");
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
        $data = Slide::find($id);
        return view('admin.slide.update', compact('data'));
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
        $slide = Slide::find($id);
        $image = $request->file('slide_image');
        if($image){
            $img_name = $image->getClientOriginalName();
            $storedPath = $image->move('admin/images/banner', $img_name);
        }else{
            $img_name = 'error.jpg';
        }
        $slide->slide_title =  $data['slide_title']; 
        $slide->slide_content =  $data['slide_content']; 
        $slide->slide_description =  $data['slide_description']; 
        $slide->slide_status =  $data['slide_status']; 
        $slide->save();
        Toastr::success('Cập nhật banner thành công', 'Thành công');
        return Redirect::to("admin/slide-banner");
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
                $slide = Slide::find($id);
                $slide->delete();
            }
            Toastr::success('Xóa banner thành công', 'Thành công');
            return Redirect::to("admin/slide-banner");
        }else{
            Toastr::error('Chọn ít nhất 1 banner để xóa', 'Thất bại');
            return Redirect::to("admin/slide-banner");
        }
    }
}