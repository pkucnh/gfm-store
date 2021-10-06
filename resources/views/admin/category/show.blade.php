@extends('admin.layout_admin.index')

@section('title')
<title>GFM | Category-Admin</title>

@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
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
                <h3 class="card-title">Bảng danh mục</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="30px">
                    <input type="checkbox" name="id_category" id="">
                    </th>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Tình trạng</th>
                    <th></th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($category as $row) 
                  <tr>
                    <td><input type="checkbox" name="id_category" value="{{$row->id}}" id=""></td>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td width="200px"><img src="{{asset('admin/images/category')}}/{{$row->image}}" width="250px" height="150px"></td>
                    <td>
                        @if($row->status > 0)
                          Hiện
                        @else
                          Ẩn
                        @endif
                    </td>
                    <td><a href="{{url('category')}}/{{$row->id}}/edit" class="btn btn-warning">Cập nhật</a></td>
                    <td><button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#largeModal{{$row->id}}">Xóa</a></td>
                              <div class="modal fade" id="largeModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- {{-- <h5 class="modal-title" id="largeModalLabel">Chi tiết thông tin</h5> --}} -->
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="card">                                               
                                                <div class="card-body">
                                                        <h3 class="card-title mb-3" style="font-weight: bold;"></h3>
                                                        <form action="{{route('category.destroy', $row->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                          @csrf
                                                          @method('DELETE')
                                                          Bạn có chắc chắn muốn xóa? <button class="btn btn-danger">Xóa</button>
                                                        </form>
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

@endsection