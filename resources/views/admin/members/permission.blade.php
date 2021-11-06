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
                            <h2><strong>Cấp quyền</strong> </h2>
                            </div>
                            <div class="card-body card-block"> 
                                <form class="form" method="POST">
                                    @if(isset($role_name))
                                    <h3>Vai trò: {{$role_name}}</h3>
                                    @endif
                                    @foreach ($permission as $item)
                                    <div class="form-group form-check-inline">
                                        <input class="form-check-input" type="checkbox"
                                        @foreach ($getPermission as $get)
                                            @if($get->id == $item->id)
                                            checked
                                            @endif
                                        @endforeach
                                        name="permission[]" multiple id="{{{$item->id}}}" value="{{$item->id}}">
                                        <label class="form-check-label">{{$item->name}}</label> 
                                    </div>
                                    @endforeach
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" value="Cấp quyền">
                                    </div>
                                    {{ csrf_field() }}
                                </form>  
                            </div>         
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h2><strong>Thêm quyền</strong></h2>
                            </div>
                            <div class="card-body card-block"> 
                                <form class="form" method="POST" action="{{url('admin/create-permission')}}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="permission" placeholder="Tên quyền">
                                            @include('errors.note')
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" value="Thêm">
                                    </div>
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