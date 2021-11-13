@extends('admin.layout.index')

@section('title')
<title>GFM | Category-Admin</title>
@endsection

<style>
    .hidden {
    display: none !important;
    visibility: hidden !important;
    }
</style>

@section('content')
    <div class="content-wrapper">
        <div class="content mt-2">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            <h3><strong>Thêm thành viên mới</strong> </h3>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{route('members.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fullname" class=" form-control-label">Họ tên đầy đủ</label>
                                                <input type="text" name="fullname" value="{{old('fullname')}}" placeholder="Họ và tên" class="form-control">
                                                @error('fullname'){{ $message }}@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class=" form-control-label">Email</label>
                                                <input type="email" id="text-input" name="email" value="{{old('email')}}" placeholder="Email" class="form-control">
                                                @error('email'){{ $message }}@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class=" form-control-label">Mật khẩu</label>
                                                <input type="password" id="text-input" name="password" value="{{old('password')}}" placeholder="Mật khẩu" class="form-control">
                                                @error('password'){{ $message }}@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="file-input" class=" form-control-label">Ảnh đại diện</label>
                                            <br>
                                            <input type="file" id="img" name="image" class="form-control-file hidden" onchange="changeImg(this)">
                                            <img id="avatar" class="thumbnail" width="300px" height="300px" src={{asset('admin/images/avatar/no-img.png')}}>
                                            @error('image'){{ $message }}@enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <input class="btn btn-success float-right" type="submit" value="Thêm">
                                {{ csrf_field() }}
                                </form>      
                            </div>          
                        </div><!-- .content -->
                    </div><!-- .content -->
                </div><!-- .content -->
            </div><!-- .content -->
        </div><!-- .content -->
    </div><!-- .content -->
@endsection
