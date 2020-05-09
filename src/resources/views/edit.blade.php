<!DOCTYPE html>
<html>
<head>
    <title>SỬA LINK</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">
    <h1>SỬA LINK </h1>
   
    <div class="card">
      <div class="card-header">
        <form method="post" action="{{route('ShortLink.update',[$ShortLink->id])}}">
        {{csrf_field()}}
        {{ method_field('PUT') }}
            <div class="input-group mb-3">
              <div class="input-group-append">
            
              <input  type="hidden"name="link" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2" value='{{ $ShortLink->link }}'>
              <input name="code" type="text" id="inputName" placeholder="Nhập Tên danh mục"  value="{{$ShortLink->code}}">
                <button class="btn btn-success" type="submit">OK</button>
              </div>
            </div>
        </form>
      </div>
    </div>
   
</div>
    
</body>
</html>