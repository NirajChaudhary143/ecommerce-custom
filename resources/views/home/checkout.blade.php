@extends('home.base')

@section('content')
    <div class="container">
        <div class="row">
            <h6 class="navbar-brand" style="font-size: 28px"><strong>Checkout</strong></h6>
        </div>
        <div class="row">
            <div class="col">
                <form action="">
                    @csrf
                    <h6 class="navbar-brand" style="font-size: 15px"><strong>1. Contact Information</strong></h6>
                    <div class="row">
                        <div class="col-lg-6">
                            <div style="font-weight: bold;font-size:15px">First Name<sup style="color: red">*</sup></div>
                            <div><input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="eg: ram bahadur"></div>
                        </div>
                        <div class="col-lg-6">
                            <div style="font-weight: bold;font-size:15px">Email<sup style="color: red">*</sup></div>
                            <div><input type="email" name="email" value="{{$user->email}}" class="form-control text-lowercase" placeholder="eg: ram@gmail.com"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div style="font-weight: bold;font-size:15px">Phone Number<sup style="color: red">*</sup></div>
                            <div><input type="number" name="phone_number" value="{{$user->phone_number}}" class="form-control" placeholder="eg: 980000000"></div>
                        </div>
                    </div>
                    <h6 class="navbar-brand" style="font-size: 15px"><strong>2. Delivery Address</strong></h6>
                    <div class="row">
                        <div class="col">
                            <div style="font-weight: bold;font-size:15px">Delivery Address<sup style="color: red">*</sup></div>
                            <div><input type="text" name="address" value="{{$user->address}}" class="form-control" placeholder="eg: tinkune, gwarko.."></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col p-3 rounded" style="box-shadow: 1px 1px 10px black">
                <h6 class="navbar-brand" style="font-size: 18px"><strong>Order Summary</strong></h6>
                @php
                    $sum =0;
                @endphp
                @foreach ($carts as $cart)
                        @php
                            $temp = $sum + $cart->total_price;
                            $sum = $temp;
                        @endphp
                    <div class="row p-2">
                        <div>
                            <img height="60px" width="60px" src="{{asset($cart->product_image)}}" alt="img">
                        </div>
                        <div class="ml-2">
                            
                        <strong>{!! Illuminate\Support\Str::limit($cart->product_title, 40, '...') !!}</strong>
                        <div style="font-size: 12px">Rs. {{$cart->selling_price}} x {{$cart->product_quantity}}</div>
                        </div>
                    </div>
                @endforeach
                                    <hr>
                <div class="col mt-3">
                    <div class="row">
                            <div class="col">
                                Delivery Fee
                            </div>
                            <div class="col">
                                <strong>Free</strong>  
                            </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Total
                        </div>
                        <div class="col">
                            <strong>Rs. {{$sum}}</strong>
                        </div>
                    </div>

                </div>
                <div class="mt-3">
                    <button class="btn btn-primary col">Place Order</button>
                </div>
            </div>
        </div>
    </div>
@endsection