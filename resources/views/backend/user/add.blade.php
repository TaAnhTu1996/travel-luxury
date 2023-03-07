@extends('layouts.admin')
@section('title', 'Quản trị viên')
@section('content')
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Thêm quản trị viên
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin::Section-->
            <div class="m-section">
                <div class="m-section__content">
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- basic table  -->
                        <!-- ============================================================== -->
                        <div class="col-md-6">
                            <form action="{{route('backend.user.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Tên</label>
                                    <input type="text" name="name" placeholder="Nhập tên" class="form-control">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" placeholder="Nhập Email" class="form-control">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="">Mật khẩu</label>
                                    <input type="password" name="password" placeholder="Nhập mật khẩu" class="form-control">
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="">Quyền</label>
                                    <select name="role_id" class="form-control" >
                                        @foreach (\App\Models\Role::all() as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                        <span class="text-danger">{{ $errors->first('role_id') }}</span>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Tạo</button>
                                    <a href="{{route('backend.user.index')}}" class="btn btn-info" role="button">Bỏ qua</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
