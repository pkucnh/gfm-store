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
                            <h3><strong>Cập nhật mã giảm giá</strong> </h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{route('coupon.store')}}" method="post" enctype="multipart/form-data"
                                class="form-horizontal">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <!-- @method('PATCH') -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tên mã giảm giá</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" value="{{$coupon->coupon_name}}" placeholder="........" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Mã giảm giá</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="code" value="{{$coupon->coupon_code}}" placeholder="........" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Phương thức giảm</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="condition" id="select" class="form-control">
                                        @if($coupon->coupon_condition > 1)
                                            <option value="1">Giảm theo %</option> 
                                            <option value="2" selected>Giảm theo mệnh giá</option>
                                        @else
                                            <option value="1" selected>Giảm theo %</option> 
                                            <option value="2">Giảm theo mệnh giá</option>   
                                        @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Giá trị</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="value" value="{{$coupon->coupon_value}}" placeholder="........" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Số lượng</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="quanlity" value="{{$coupon->coupon_quanlity}}" placeholder="........" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Tình trạng</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="status" id="select" class="form-control">
                                        @if($coupon->coupon_status > 0)
                                            <option value="1" selected>Đang hoạt động</option> 
                                            <option value="0">Ngưng hoạt động </option>
                                        @else
                                            <option value="1">Đang hoạt động</option> 
                                            <option value="0" selected>Ngưng hoạt động</option>
                                        @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Ngày bắt đầu</label></div>
                                    <div class="col-12 col-md-9"><input type="date" id="text-input" name="date_start" value="{{$coupon->date_start}}" placeholder="........" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Ngày kết thúc</label></div>
                                    <div class="col-12 col-md-9"><input type="date" id="text-input" name="date_end" value="{{$coupon->date_end}}" placeholder="........" class="form-control" required></div>
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