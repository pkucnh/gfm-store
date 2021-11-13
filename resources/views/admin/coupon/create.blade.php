@extends('admin.layout.index')

@section('title')
<title>GFM | Coupon-Admin</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content mt-2">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3><strong>Thêm mã giảm giá</strong> </h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{route('coupon.store')}}" method="post" enctype="multipart/form-data"
                                class="form-horizontal">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <!-- @method('PATCH') -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tên mã giảm giá</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="........" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Mã giảm giá</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="code" placeholder="........" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Phương thức giảm</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="condition" id="select" class="form-control">
                                            <option value="1">Giảm theo %</option>
                                            <option value="2">Giảm theo mệnh giá</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Giá trị</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="value" placeholder="........" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Số lượng</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="quanlity" placeholder="........" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Tình trạng</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="status" id="select" class="form-control">
                                            <option value="1">Kích hoạt</option>
                                            <option value="0">Chưa kích hoạt</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Ngày bắt đầu</label></div>
                                    <div class="col-12 col-md-9"><input type="date" id="text-input" name="date_start" placeholder="........" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Ngày kết thúc</label></div>
                                    <div class="col-12 col-md-9"><input type="date" id="text-input" name="date_end" placeholder="........" class="form-control" required></div>
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