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
                            <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                {{ method_field('PATCH') }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-6"><label for="name" class=" form-control-label">Tên loại sản phẩm</label></div>
                                            <div class="col-12 col-md-12"><input type="text" id="text-input" value="{{$product->name}}" name="name_pro" placeholder="........" class="form-control"></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-6"><label for="name" class=" form-control-label">Giá gốc</label></div>
                                            <div class="col-12 col-md-12"><input type="text" id="text-input" value="{{$product->price}}" name="price" placeholder="........" class="form-control"></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-6"><label for="name" class=" form-control-label">Giá khuyến mãi</label></div>
                                            <div class="col-12 col-md-12"><input type="text" id="text-input" value="{{$product->price_sales}}" name="price_sale" placeholder="........" class="form-control"></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-6"><label for="name" class=" form-control-label">Số lượng</label></div>
                                            <div class="col-12 col-md-12"><input type="text" id="text-input" value="{{$product->quanlity}}" name="quantity" placeholder="........" class="form-control"></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-6"><label for="name" class=" form-control-label">Ngày nhập sản phẩm</label></div>
                                            <div class="col-12 col-md-12"><input type="date" id="text-input" value="{{$product->add_day}}" name="add_day" placeholder="........" class="form-control" ></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-6"><label for="name" class=" form-control-label">Ngày hết hạn</label></div>
                                            <div class="col-12 col-md-12"><input type="date" id="text-input" value="{{$product->expired_day}}" name="expired_day" placeholder="........" class="form-control" ></div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">                                     
                                        <div class="form-group">
                                            <div class="col col-md-6"><label for="file-input" class=" form-control-label">Ảnh  đại diện</label></div>
                                            <div class="col-12 col-md-12">
                                                <input type="file" id="file-input" name="img" class="form-control-file">
                                                <input type="hidden" id="file-input" name="img_old" value="{{$product->image}}" class="form-control-file">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col col-md-6"><label for="file-input" class=" form-control-label">Ảnh liên quan</label></div>
                                            <div class="row">
                                                <div class="col-md-12 row">
                                                    @php
                                                        $t = 1;
                                                        $i = 1;
                                                        $j = 1;
                                                    @endphp
                                                    @foreach ($Gallrey as $val)
                                                        <div class="col-md-4">
                                                            <img data-id="{{$val->id}}" id="file" style="width: 150px; height: 150px; cursor: pointer;" class="img_preview_gallery img_preview_gallery_{{$val->id}}" src="{{asset('admin/images/product')}}/{{$val->name}}" alt="">
                                                            <input hidden name="img_gallery_old_{{$i++}}" value="{{$val->name}}" >
                                                            <input hidden name="id_gallery_{{$j++}}" value="{{$val->id}}" >
                                                            <input hidden data-id="{{$val->id}}" name="img_gallery_{{$t++}}"type="file" class="form-control-file input_file_{{$val->id}}" accept="image/*" multiple>
                                                        </div>
                                                    @endforeach                                          
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col col-md-6"><label for="select" class="form-control-label">An hien</label></div>
                                            <div class="col-12 col-md-12">
                                                <select name="status" id="select" class="form-control">
                                                    <option  @if ($product->status==1) selected @endif value="1">Hiện</option>
                                                    <option  @if ($product->status==0) selected @endif value="0">Ẩn</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col col-md-6"><label for="select" class=" form-control-label">Danh mục</label></div>
                                            <div class="col-12 col-md-12">
                                                <select name="category" id="select_cate" class="form-control">
                                                    @foreach ($cate as $val)
                                                        @if ($val->id == $product->category_id)
                                                            <option selected value="{{$val->id}}">{{$val->name}}</option> 
                                                        @else
                                                            <option value="{{$val->id}}">{{$val->name}}</option> 
                                                        @endif
                                                    @endforeach 
                                                </select>
                                            </div>
                                        </div>
        
                                        <div class="form-group">
                                            <div class="col col-md-6"><label for="select" class=" form-control-label">Danh mục con</label></div>
                                            <div class="col-12 col-md-12">
                                                <select name="child_cate_id" id="chid_cate" class="form-control">
                                                    @foreach ($child_cate as $val)
                                                        @if ($val->id == $product->chid_cate_id)
                                                            <option selected value="{{$val->id}}">{{$val->name}}</option> 
                                                        @else
                                                            <option value="{{$val->id}}">{{$val->name}}</option> 
                                                        @endif
                                                    @endforeach 
                                                </select>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>
                               
                             
                                <div class="form-group">
                                    <div class="col col-md-6"><label for="name" class=" form-control-label">Mô tả</label></div>
                                    <div class="col-12 col-md-12"><textarea name="description" id="noidung" class="ckeditor">{!!$product->description!!}</textarea></div>
                                    <script type="text/javascript">
                                        var editor = CKEDITOR.replace('noidung',{
                                                filebrowserImageBrowseUrl : 'localhost:8000/admin/editor/ckfinder/ckfinder.html?type=Images',
                                                filebrowserFlashBrowseUrl : 'localhost:8000/admin/editor/ckfinder/ckfinder.html?type=Flash',
                                                filebrowserImageUploadUrl : 'localhost:8000/admin/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                filebrowserFlashUploadUrl : 'localhost:8000/admin/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                                      });
                                    </script>
                                </div>
                                <input class="btn btn-success float-right" type="submit" value="Cập nhật">
                        </div>
                            <br>
                          
                            </form>      
                        </div>          
                    </div><!-- .content -->
                </div><!-- .content -->
            </div><!-- .content -->
        </div><!-- .content -->
    </div><!-- .content -->
</div><!-- .content -->


{{-- <script>
    function changeImgGallery(input){
        var id = document.getElementById('file').getAttribute('data-id');
        console.log(id);
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('.img_preview_gallery_'+id).attr('src',e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
  </script> --}}
@endsection