@extends('home.base')

@section('content')
    <div class="product-container m-auto">
        <div class="orderDetails">
            <div class="heading_container heading_center">
                <h2>
                   Order <span>Details</span>
                </h2>
             </div>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Prices</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Status</th>
                        <th scope="col">Order Date</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($orderDetails as $orderDetail)
                        
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$orderDetail->product_title}}</td>
                        <td>{{$orderDetail->quantity}}</td>
                        <td>{{$orderDetail->total_price}}</td>
                        <td>{{$orderDetail->payment_status}}</td>
                        <td>{{$orderDetail->payment_method}}</td>
                        <td>{{$orderDetail->status}}</td>
                        <td>{{$orderDetail->created_at->format('M-d-Y')}}</td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
   </div>
@endsection