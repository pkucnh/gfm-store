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
                            <h3><strong>Cấp vai trò</strong> </h3>
                            </div>
                            <div class="card-body card-block">
                                <form class="form" method="POST">
                                    @foreach ($role as $item)
                                    @if(isset($all_column_roles))
                                    <div class="form-group form-check-inline">
                                        <input class="form-check-input" type="radio" name="role" value="{{$item->id}}" {{$item->id == $all_column_roles->id ? 'checked' : ''}}>
                                        <label class="form-check-label" >{{$item->name}}</label>
                                    </div>
                                    @else
                                    <div class="form-group form-check-inline">
                                        <input class="form-check-input" type="radio" name="role" value="{{$item->id}}">
                                        <label class="form-check-label">{{$item->name}}</label>
                                    </div>                                   
                                    @endif
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
                                <h2><strong>Thêm vai trò</strong></h2>
                            </div>
                            <div class="card-body card-block"> 
                                <form class="form" method="POST" action="{{url('admin/create-role')}}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="role" placeholder="Tên vai trò">
                                            @include('errors.note')
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" value="Thêm">
                                    </div>
                                    {{ csrf_field() }}
                                </form>  
                            </div>         
                        </div><!-- .content --><!-- .content -->
                    </div><!-- .content -->
                </div><!-- .content -->
            </div><!-- .content -->
        </div><!-- .content -->
    </div><!-- .content -->
@endsection