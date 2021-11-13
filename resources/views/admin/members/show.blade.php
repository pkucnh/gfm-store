@extends('admin.layout.index')

@section('title')
<title>GFM | Members-Admin</title>
@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thành viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách thành viên</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Họ tên</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Email</th>
                                        <th>Vai trò</th>
                                        <th>Chi tiết</th>
                                        <th>Cập nhật</th>
                                        <th>Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $row)
                                    <tr>
                                        <td>{{$row->fullname}}</td>
                                        <td class="text-center">
                                            <img src="{{asset('admin/images/avatar/'.$row->image)}}" width="100px"; height="100px";>
                                        </td>
                                        <td>{{$row->email}}</td>
                                        <td>
                                            @foreach($row->roles as $role)
                                            {{$role->name}}
                                            @endforeach
                                        </td> 
                                        <td><button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#largeModalProduct{{$row->id}}" style="margin-left:5px">Chi tiết</button></td>
                                            <div class="modal fade" id="largeModalProduct{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-md-12">
                                                                <div class="card">                                               
                                                                    <div class="card-body row">
                                                                    <h3 class="card-title mb-3" style="font-weight: bold;"></h3>
                                                                    <img src="{{asset('admin/images/avatar/'.$row->image)}}" width="250px"; height="250px";>
                                                                    <ul class="list">
                                                                        <li><h5 style="font-weight: bold;"><span>Họ tên</span>: <b class="text-danger">{{$row->fullname}}</b></h5></li>
                                                                        <li><h5 style="font-weight: bold;"><span>Email</span>: <b class="text-danger">{{$row->email}}</b></h5></li>
                                                                        <li><h5 style="font-weight: bold;"><span>Chức vụ</span>:
                                                                        <b class="text-danger">
                                                                            @foreach($row->roles as $role)
                                                                            {{$role->name}}
                                                                            @endforeach
                                                                        </b></h5></li>
                                                                    </ul>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                 
                                        <td><a href="{{url('admin/members')}}/{{$row->id}}/edit" class="btn btn-warning">Cập nhật</a></td>
                                        <td>
                                            <a href="{{url('admin/role')}}/{{$row->id}}" class="btn btn-info">Cấp vai trò</a>
                                            <a href="{{url('admin/permission')}}/{{$row->id}}" class="btn btn-success">Cấp quyền</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
    </section>
</div>

<script type="text/javascript">

    var checkAll = document.querySelector('#checkAll')
    var checkBoxs = document.querySelectorAll('.checkbox')
    var selected = document.querySelector('.select')
    var unselected = document.querySelector('.unselect')

    checkAll.onclick = () => {
        checkBoxs.forEach(checkBox => {
            if (checkAll.checked == true) {
                checkBox.checked = true
                selected.style.display = 'none'
                unselected.style.display = 'block'
            } else {
                checkBox.checked = false
                selected.style.display = 'block'
                unselected.style.display = 'none'
            }
        })
    }
</script>
@endsection 