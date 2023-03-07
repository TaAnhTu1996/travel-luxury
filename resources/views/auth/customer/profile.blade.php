<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin tài khoản</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        img {
            width: 180px;
            height: auto;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="container-fluid bootstrap snippets bootdeys">
        <div class="position-absolute w-100 h-100 mx-n3">
            <img src="/img/bg-profile.jpg" class="w-100 rounded-0" style="height: 100vh;" alt="">
        </div>
        @if ($message = Session::get('success'))
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 text-center">
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            </div>
        </div>
        @endif
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 mt-5 border shadow bg-white rounded">
                    <div class="panel panel-default mb-3 row bg-info justify-content-center py-4">
                        <div class="panel-body text-center">
                            <img src="https://ui-avatars.com/api/?name={{$customer->name}}" class="img-circle profile-avatar" alt="User avatar">
                        </div>
                    </div>
                    <form class="form-horizontal px-5 pb-4" action="{{route('customer.update-profile', $customer->id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="panel panel-default">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Tên</label>
                                    <input type="text" name="name" class="form-control" value="{{$customer->name}}" placeholder="Nhập tên">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Số điện thoại</label>
                                    <input type="text" name="phone_number" class="form-control" value="{{$customer->phone_number}}" placeholder="Nhập số điện thoại">
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{$customer->email}}" readonly>
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" value="{{$customer->address}}" placeholder="Nhập địa chỉ">
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Mật khẩu mới</label>
                                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới" autocomplete="new-password">
                                <div class="form-text">Nếu bạn không muốn cập nhật mật khẩu, hãy để trống trường này...!</div>
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                            <div class="d-flex pt-2 justify-content-center">
                                <button type="submit" class="btn btn-primary mr-3">Cập nhật</button>
                                <a href="{{route('frontend.home')}}" class="btn btn-warning">Bỏ qua</a>
                            </div>
                        </div>
                        <!-- <div class="panel-heading">
                            <h4 class="panel-title">Thông tin tài khoản</h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label">Tên</label>
                                <input type="text" name="name" class="form-control" value="{{$customer->name}}" placeholder="Nhập tên">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{$customer->email}}" readonly>
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Số điện thoại</label>
                                <input type="text" name="phone_number" class="form-control" value="{{$customer->phone_number}}" placeholder="Nhập số điện thoại">
                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" value="{{$customer->address}}" placeholder="Nhập địa chỉ">
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Mật khẩu</h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label">Mật khẩu mới</label>
                                    <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới">
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                                <div class="form-group">
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-warning">Cập nhật</button>
                                        <a href="{{route('frontend.home')}}" class="btn btn-primary">Bỏ qua</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>


    </div>
</body>

</html>
