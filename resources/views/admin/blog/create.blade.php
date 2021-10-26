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
                        <h3><strong>Thêm bài viết</strong> </h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <!-- @method('PATCH') -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tiêu đề </label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="........" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tóm tắt</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="summary" placeholder="........" class="form-control" ></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Ngày đăng</label></div>
                                    <div class="col-12 col-md-9"><input type="date" id="text-input" name="post_day" placeholder="........" class="form-control" ></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Danh mục</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="category_id" id="select" class="form-control">
                                            @php 
                                                 $kq = DB::select("select id, name from category_blog ");
                                                 foreach ($kq as $category_blog){
                                                   echo" <option value='{$category_blog->id}'> {$category_blog->name}</option> ";
                                                 }
                                            @endphp
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="content" class=" form-control-label">Nội dung</label></div>
                                    <div class="col-12 col-md-9">
                                    <textarea name="content" class="ckeditor" cols="30" rows="10"></textarea>
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