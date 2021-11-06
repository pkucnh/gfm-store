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
                        <h3><strong>Cập nhật bài viết</strong> </h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{route('category_blog.update',$category_blog->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            @method('PUT')
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tên</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" value="{{$category_blog->name}}" placeholder="........"  class="form-control"></div>
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