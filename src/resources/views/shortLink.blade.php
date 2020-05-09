@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>RÚT GỌN LINK</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">
    <h1>Rút Gọn Link </h1>
   
    <div class="card">
      <div class="card-header">
        <form method="post" action="{{route('ShortLink.store')}}">
        {{csrf_field()}}
            <div class="input-group mb-3">
              <input type="text" name="link" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">RÚT GỌN</button>
              </div>
            </div>
        </form>
      </div>
      <div class="card-body">
   
   
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>LinK Đã Rút gọn</th>
       
                        <th></th>
                        <th>Link Trước khi rút gọn</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($shortLinks as $shortLink)
                        <tr>
                            <td>{{ $shortLink->id }}</td>
                            <td>
                            <a href="{{ route('shorten.link', $shortLink->code) }}" target="_blank">{{ route('shorten.link', $shortLink->code) }}</a>
                            </td>
                             
                            <td>
                            <a  href="{{route('ShortLink.edit',[$shortLink->id])}}" class="btn btn-success">Sửa</a>                       
                            </td>
                            <td>{{ $shortLink->link }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
   
</div>
    
</body>
</html>
@endsection