<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Toastr;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('permission:danh sach thanh vien', ['only'=> ['index']]);
        $this->middleware('permission:them thanh vien', ['only'=> ['create','store']]);
        $this->middleware('permission:cap nhat thanh vien', ['only'=> ['edit','update']]);
        // $this->middleware('permission:xoa thanh vien', ['only'=> ['destroy']]);
    }

    public function index()
    {
        $user = Member::with('roles')->orderBy('id','DESC')->get();
        return view('admin.members.show', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.members.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new Member;
        $image = $request->file('image');
        if($image){
            $file = $request->image->getClientOriginalname();
            $request->image->storeAs('admin/images/avatar',$file);
        }else{
            $file = 'avatar.png';
        }
        $user->fullname = $request->fullname;
        $user->image = $file;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        Toastr::success('Thêm thành viên thành công', 'Thành công');
        return redirect('admin/members');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Member::find($id);
        $role = Role::all();
        return view('admin.members.update', compact('role','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        echo "Ngon";
        // $user = new User;
        // $arr['fullname'] = $request->fullname;
        // $arr['email'] = $request->email;
        // $arr['roles_id'] = $request->roles_id;
        // $image = $request->file('image');
        // if($image){
        //     $file = $request->image->getClientOriginalname();
        //     $request->image->storeAs('admin/images/avatar',$file);
        // }else{
        //     $file = 'avatar.png';
        // }
        // $arr['image'] = $file;
        // $user::where('id',$id)->update($arr);
        // Toastr::success('Cập nhật thành viên thành công', 'Thành công');
        // return redirect('admin/members');
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
