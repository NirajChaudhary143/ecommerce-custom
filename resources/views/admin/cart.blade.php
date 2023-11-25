@extends('admin.adminPanel')
@section('main-section')
<div class="category-container">
    <div class="user-title">
       Orders
    </div>
    {{-- Add Link --}}
        <div class="category-add-link">
            <button id="add-category">Create Order</button>
        </div>
    {{-- Add Link Ends --}}
</div>
<div class="status-wrapper">
    <div class="status-container">
        <div class="status">All</div>
        <div class="status">Draft</div>
        <div class="status">Pending</div>
        <div class="status">Processing</div>
        <div class="status">Dispatch</div>
        <div class="status">Delivered</div>
        <div class="status">Cancelled</div>
        <div class="status">Returend</div>
    </div>
</div>
<div class="cart-table">
    <table width="100%" id="product-table" class="hover ">
        <thead>
            <tr>
                <th width="50px">S.N.</th>
                <th>Customer Name</th>
                <th>Product Title</th>
                <th>Total Price</th>
                <th>Product Quantity</th>
                <th>Payment Status</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    @php
                        $username = $user->where('id',$order->user_id)
                    @endphp
                    @foreach ($username as $user_name)
                    <td>{{$user_name->name}}</td>
                    @endforeach
                    <td>{{ Illuminate\Support\Str::limit($order->product_title, 30, '...') }}</td>
                    <td>{{$order->total_price}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->payment_method}}</td>
                    <td>{{$order->status}}</td>
                    <td>
                        <a href="#" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection