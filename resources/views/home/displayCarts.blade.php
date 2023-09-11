<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">S.N</th>
            <th scope="col">Product Title</th>
            <th scope="col">Total Price</th>
            <th scope="col">Quatity</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($carts as $cart)
                
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$cart->product_title}}</td>
              <td >{{$cart->price}}</td>
              <td>
                {{$cart->quantity}}
            </td>
              <td><img src="{{asset('uploads/products/'.$cart->image)}}" width="50" height="50" alt="" srcset=""></td>
              <td>
                <a href="{{route('delete.cart',['id'=>$cart->id])}}" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    
</body>
</html>