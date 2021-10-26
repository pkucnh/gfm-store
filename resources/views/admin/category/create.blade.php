<<<<<<< HEAD
@extends('admin.layout.index')
=======
@extends('admin.layout_admin.index')
>>>>>>> 70f6a11f6dbf0d4cfa10d7db3cb4d4e9133cbd6b

@section('title')
<title>GFM | Category-Admin</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content mt-2">
        <div class="animated fadeIn">
            <div class="row">
<<<<<<< HEAD
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h3><strong>Thêm loại sản phẩm</strong> </h3>
=======
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                        <h3><strong>Danh mục cha</strong> </h3>
>>>>>>> 70f6a11f6dbf0d4cfa10d7db3cb4d4e9133cbd6b
                        </div>
                        <div class="card-body card-block">
                            <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <!-- @method('PATCH') -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tên loại sản phẩm</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="........" class="form-control" required></div>
                                </div>
<<<<<<< HEAD
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh đại diện</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="img" class="form-control-file"></div>
                                </div>
                                <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">An hien</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="status" id="select" class="form-control">
                                        <option value="1">Hiện</option> 
                                        <option value="0">Ẩn </option>
                                    </select>
                                </div>
                            </div>
=======

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh đại diện</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="img" class="form-control-file" required></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Ẩn hiện</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="status" id="select" class="form-control">
                                            <option value="1">Hiện</option> 
                                            <option value="0">Ẩn </option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Loại danh mục</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="status" id="select" class="form-control">
                                            <option value="0">Danh mục cha </option>
                                            @foreach ($category as $val)
                                                <option style="background-color: #aaa" disabled value="{{$val->id}}">{{$val->name}}</option> 
                                            @endforeach   
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <input class="btn btn-success float-right" type="submit" value="Thêm">
                            </form>      
                        </div>          
                    </div><!-- .content -->
                </div><!-- .content -->

                
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                        <h3><strong>Danh mục con</strong> </h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{route('child-category.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <!-- @method('PATCH') -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tên loại sản phẩm</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="........" class="form-control" required></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh đại diện</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="img" class="form-control-file" required></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Ẩn hiện</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="status" id="select" class="form-control">
                                            <option value="1">Hiện</option> 
                                            <option value="0">Ẩn </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Danh mục cha</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="category" id="select" class="form-control">
                                            @foreach ($category as $val)
                                                <option value="{{$val->id}}">{{$val->name}}</option> 
                                            @endforeach                                           
                                        </select>
                                    </div>
                                </div>
>>>>>>> 70f6a11f6dbf0d4cfa10d7db3cb4d4e9133cbd6b
                            <br>
                            <input class="btn btn-success float-right" type="submit" value="Thêm">
                            </form>      
                        </div>          
                    </div><!-- .content -->
                </div><!-- .content -->
            </div><!-- .content -->
        </div><!-- .content -->
    </div><!-- .content -->
</div><!-- .content -->
@endsection