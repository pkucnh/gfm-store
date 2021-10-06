@extends('admin.layout_admin.index')

@section('title')
<title>GFM | Category-Admin</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content mt-2">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h3><strong>Thêm loại sản phẩm</strong> </h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            @method('PUT')
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tên loại sản phẩm</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" value="{{$category->name}}" placeholder="........"  class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh đại diện</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" name="img" value="{{$category->image}}" class="form-control-file">

                                        <img src="{{asset('admin/images/category')}}/{{$category->image}}" width="250px" height="150px">
                                    </div>
                                </div>
                                <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">An hien</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="status" id="select" class="form-control">
                                        @if($category->image > 0)
                                            <option value="1" selected>Hiện</option> 
                                            <option value="0">Ẩn </option>
                                        @else
                                            <option value="1">Hiện</option> 
                                            <option value="0" selected>Ẩn</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <br>
                            <input class="btn btn-success float-right" type="submit" value="Cập nhật">
                            </form>      
                        </div>          
                    </div><!-- .content -->
                </div><!-- .content -->
            </div><!-- .content -->
        </div><!-- .content -->
    </div><!-- .content -->
</div><!-- .content -->
@endsection