@extends('home.base')

@section('content')
  
<div class="container">

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
              <td >{{$cart->total_price}}</td>
              <td>
                {{$cart->product_quantity}}
              </td>
              <td><img src="{{asset($cart->product_image)}}" width="50" height="50" alt="" srcset=""></td>
              <td>
                <a href="{{route('delete.cart',['id'=>$cart->id])}}" class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <div class="container">
      <a href="{{route('checkout')}}" class="btn btn-primary w-100">Checkout</a>
    </div>
      @endsection