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
                            <h3><strong>Thêm sản phẩm mới</strong> </h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <!-- @method('PATCH') -->

                               <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="col col-md-6"><label for="name" class=" form-control-label">Tên loại sản phẩm</label></div>
                                            <div class="col-12 col-md-12"><input type="text" id="text-input" name="name_pro" placeholder="........" class="form-control"></div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col col-md-6"><label for="name" class=" form-control-label">Giá gốc</label></div>
                                            <div class="col-12 col-md-12"><input type="text" id="text-input" name="price" placeholder="........" class="form-control"></div>
                                        </div>
        
                                        <div class="form-group">
                                            <div class="col col-md-6"><label for="name" class=" form-control-label">Giá khuyến mãi</label></div>
                                            <div class="col-12 col-md-12"><input type="text" id="text-input" name="price_sale" placeholder="........" class="form-control"></div>
                                        </div>

                                        
                                        <div class="form-group">
                                            <div class="col col-md-6"><label for="name" class=" form-control-label">Số lượng</label></div>
                                            <div class="col-12 col-md-12"><input type="text" id="text-input" name="quantity" placeholder="........" class="form-control"></div>
                                        </div>

                                        
                                        <div class="form-group">
                                            <div class="col col-md-6"><label for="name" class=" form-control-label">Ngày nhập sản phẩm</label></div>
                                            <div class="col-12 col-md-12"><input type="date" id="text-input" name="add_day" placeholder="........" class="form-control" ></div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col col-md-6"><label for="name" class=" form-control-label">Ngày hết hạn</label></div>
                                            <div class="col-12 col-md-12"><input type="date" id="text-input" name="expired_day" placeholder="........" class="form-control" ></div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="col col-md-6"><label for="file-input" class=" form-control-label">Ảnh  đại diện</label></div>
                                            <div class="col-12 col-md-12"><img title="Chọn ảnh đại diện" style="cursor: pointer;" class="img_preview" src="{{asset('image/no-img.png')}}" alt=""></div>
                                            <div class="col-12 col-md-12"><input hidden class="img" type="file" id="file-input" name="img" onchange="changeImg(this)" class="form-control-file"></div>
                                        </div>
        
                                        <div class="form-group">
                                            <div class="col col-md-6"><label for="file-input" class=" form-control-label">Ảnh liên quan</label></div>
                                            <div class="col-12 col-md-12"><input type="file" id="file-input" name="img_gallery[]" class="form-control-file" accept="image/*" multiple></div>
                                        </div>
        
                                        <div class="form-group">
                                            <div class="col col-md-6"><label for="select" class="form-control-label">An hien</label></div>
                                            <div class="col-12 col-md-12">
                                                <select name="status" id="select" class="form-control">
                                                    <option value="1">Hiện</option> 
                                                    <option value="0">Ẩn </option>
                                                </select>
                                            </div>
                                        </div>
        
                                        <div class="form-group">
                                            <div class="col col-md-6"><label for="select" class=" form-control-label">Danh mục cha</label></div>
                                            <div class="col-12 col-md-12">
                                                <select name="category" id="select_cate" class="form-control">
                                                    <option value="0">Chọn danh mục cho sản phẩm</option> 
                                                    @foreach ($cate as $val)
                                                        <option value="{{$val->id}}">{{$val->name}}</option> 
                                                    @endforeach 
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col col-md-6"><label for="select" class=" form-control-label">Danh mục con</label></div>
                                            <div class="col-12 col-md-12">
                                                <select name="child_cate_id" id="chid_cate" class="form-control">
                                                    {{-- @foreach ($cate as $val)
                                                        <option value="{{$val->id}}">{{$val->name}}</option> 
                                                    @endforeach  --}}
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                               </div>

                               <div class=" form-group">
                                    <div class="col col-md-6"><label for="name" class=" form-control-label">Mô tả</label></div>
                                    <div class="col-12 col-md-12"><textarea name="description" id="noidung" class="ckeditor"></textarea></div>
                                    <script type="text/javascript">
                                        var editor = CKEDITOR.replace('noidung',{
                                            filebrowserImageBrowseUrl : 'localhost:8000/admin/editor/ckfinder/ckfinder.html?type=Images',
                                            filebrowserFlashBrowseUrl : 'localhost:8000/admin/editor/ckfinder/ckfinder.html?type=Flash',
                                            filebrowserImageUploadUrl : 'localhost:8000/admin/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                            filebrowserFlashUploadUrl : 'localhost:8000/admin/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                                        });
                                    </script>
                                </div>  
                                <br>
                                <input class="btn btn-success float-right" type="submit" value="Thêm">
                            </form>   
                        </div>   
                        </div>          
                    </div><!-- .content -->
                </div><!-- .content -->
            </div><!-- .content -->
        </div><!-- .content -->
    </div><!-- .content -->
</div><!-- .content -->
<script>
  function changeImg(input){
      if(input.files && input.files[0]){
          var reader = new FileReader();
          reader.onload = function(e){
              $('.img_preview').attr('src',e.target.result)
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
</script>
@endsection