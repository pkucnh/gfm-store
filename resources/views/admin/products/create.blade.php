@extends('admin.layout.index')

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
                        <h3><strong>Thêm sản phẩm mới</strong> </h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <!-- @method('PATCH') -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tên loại sản phẩm</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name_pro" placeholder="........" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh  đại diện</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="img" class="form-control-file"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh liên quan</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="img_gallery[]" class="form-control-file" accept="image/*" multiple></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Giá gốc</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="price" placeholder="........" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Giá khuyến mãi</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="price_sale" placeholder="........" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Số lượng</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="quantity" placeholder="........" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class="form-control-label">Ẩn hiện</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="status" id="select" class="form-control">
                                            <option value="1">Hiện</option> 
                                            <option value="0">Ẩn </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Danh mục</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="category" id="select" class="form-control">
                                            @foreach ($cate as $val)
                                                <option value="{{$val->id}}">{{$val->name}}</option> 
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Ngày nhập sản phẩm</label></div>
                                    <div class="col-12 col-md-9"><input type="date" id="text-input" name="add_day" placeholder="........" class="form-control" ></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Ngày hết hạn</label></div>
                                    <div class="col-12 col-md-9"><input type="date" id="text-input" name="expired_day" placeholder="........" class="form-control" ></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="content" class=" form-control-label">Mô tả</label></div>
                                    <div class="col-12 col-md-9">
                                    <textarea name="note" class="ckeditor" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                        
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