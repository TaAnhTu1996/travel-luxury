<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng trải nghiệm Tour</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="container bootstrap snippets bootdeys">
    <div class="row justify-content-center">
        <div class="col-md-8 my-5 py-5 px-5 border shadow">
            @if($booking)
                <h4 class="text-center text-warning my-3 font-weight-bold">{{$booking->tour->title}}</h4>
                <form action="{{route('frontend.customer-review.store')}}" method="post"
                      enctype="multipart/form-data" id="review-form">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="col-form-label">Tiêu đề:</label>
                        <input type="text" class="form-control" name="title" id="title"
                               value="{{old('title')}}" placeholder="Nhập tiêu đề">
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-form-label">Nội dung:</label>
                        <textarea class="form-control" name="message" id="message"
                                  value="{{old('message')}}" rows="10"></textarea>
                        <span class="text-danger">{{ $errors->first('message') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="image" class="col-form-label">Ảnh chụp tại Tour:</label>
                        <input type="file" class="form-control" name="image[]" id="image"
                               value="{{old('image')}}" multiple>
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    </div>
                    <div class="form-group" hidden>
                        <label for="tour" class="col-form-label">Tour:</label>
                        <input type="number" class="form-control" name="tour_id"
                               value="{{$booking->tour_id}}" id="tour_id">
                    </div>
                    <div class="form-group" hidden>
                        <label for="customer" class="col-form-label">Customer:</label>
                        <input type="number" class="form-control" name="customer_id"
                               value="{{$booking->customer_id}}" id="customer_id">
                    </div>
                    <div class="form-group text-center mt-5">
                        <button type="submit" class="btn btn-outline-warning">Đăng ngay</button>
                        <button type="button" class="btn btn-light">Hủy</button>
                    </div>
                </form>
            @endif
        </div>
    </div>

</div>
</body>
</html>

