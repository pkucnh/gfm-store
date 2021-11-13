<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Member;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\PermissionRequest;
use Toastr;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /*------------Tạo các vai trò------------ */
    public function createRole(RoleRequest $request){
        $data = $request->all();
        $role = new Role();
        $role->name = $data['role'];
        $role->save();
        Toastr::success('Thêm vai trò thành công', 'Thành công');
        return redirect()->back();
    }

    /*------------Lấy các vai trò------------ */
    public function getRole ($id){
        $user = Member::find($id);
        $all_column_roles = $user->roles->first();
        $role = Role::all();
        return view('admin.members.role',compact('user','role','all_column_roles'));
    }

    /*------------Cấp vai trò------------ */
    public function postRole(Request $request,$id){
        $data = $request->all();
        $user = Member::find($id);
        $user->syncRoles($data['role']);
        Toastr::success('Cập nhật chức vụ thành công', 'Thành công');
        return redirect('admin/members');
    }

    /*------------Lấy các quyền------------ */
    public function getPermission ($id){
        $user = Member::find($id);
        $role_name = $user->roles->first()->name;
        $permission = Permission::all();
        $getPermission = $user->getPermissionsViaRoles();
        return view('admin.members.permission',compact('user','permission','role_name','getPermission'));
    }

    /*------------Cấp các quyền------------ */
    public function postPermission(Request $request,$id){
        $data = $request->all();
        $user = Member::find($id);
        $role_id = $user->roles->first()->id;
        $role = Role::find($role_id);
        $role->syncPermissions($data['permission']);
        Toastr::success('Thêm quyền thành công', 'Thành công');
        return redirect('admin/members');
    }

    /*------------Tạo các quyền------------ */
    public function createPermission(PermissionRequest $request){
        $data = $request->all();
        $permission = new Permission();
        $permission->name = $data['permission'];
        $permission->save();
        Toastr::success('Thêm quyền thành công', 'Thành công');
        return redirect()->back();
    }
}