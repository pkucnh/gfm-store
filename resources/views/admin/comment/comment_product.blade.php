@extends('admin.layout.index')

@section('title')
<title>GFM | blog-Admin</title>
@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bình luận san phẩm</h1>
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
                            <h3 class="card-title">Bảng bình luận</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th width="160px">Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng bình luận</th>
                                        <th>Thời gian bình luận gần nhất</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>
                                            <img src="{{asset('admin/images/product')}}/{{$row->image}}" width="150px" height="150px">
                                        </td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->total}}</td>
                                        <td>{{$row->time}}</td>
                                        <td><a href="{{url('admin/comment')}}/{{$row->product_id}}/detail" class="btn btn-warning">Chi tiết</a></td>   
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
</div>`
@endsection