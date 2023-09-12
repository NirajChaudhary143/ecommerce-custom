<!-- Header Start -->


<!-- Header ENd -->
@extends('home.base')

@section('content')

        <div class="product-container m-auto">
            {{-- Product class start --}}
            <div class="product">
                <div class="product-image">
                    <img style="width: 18vw" src="{{ asset('uploads/products/'.$productImage->name) }}" alt="">
                </div>
                <div class="product-detail">
                    <div class="product-title">
                        <h1>{{$product->product_title}}</h1>
                    </div>
                    <div class="product-price">
                        Rs. {{$product->selling_price}}
                    </div>
                    @if ($product->crossed_price)
                    <div class="product-discount">
                        Rs. {{$product->crossed_price}}
                    </div>
                    @endif
                    {{-- cart-container  --}}
                    <form action="{{route('add.to.cart',['id'=>$product->id])}}" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col">
                                <button style="width:50px;height:50px;  font-size: 24px;
                                font-weight: bold; border-radius:8px; border:0px" onclick="decreaseInput(event)">-</button>
                                <input type="text" style="width:60px;height:50px;font-size: 20px;
                                font-weight: bold;border-radius:8px; border:0px;text-align:center" value="1" id="inputQuantity" name="product_quantity">
                                <button style="width:50px;height:50px;  font-size: 24px;
                                font-weight: bold; border-radius:8px; border:0px" onclick="increaseInput(event)">+</button>
                            </div>
                            <div class="col">
                                <input type="submit" style="text-transform: Uppercases" value="Add to cart">
                            </div>
                            {{-- <div class="col">
                                <input type="submit" style="text-transform: Uppercase" value="buy now">
                            </div> --}}
                        </div>

                        </form>

                    {{-- cart-container end --}}
                </div>
            </div>
            {{-- Product class end --}}
            <hr>
            {{-- Product Description Start --}}
            <div class="product-description">
                <div class="description-content">
                    {!!$product->product_description!!}
                </div>
            </div>
            {{-- Product Description end --}}
        </div>

        {{-- Script --}}
        <script>
            function decreaseInput(event) {
                event.preventDefault();
                var input = document.getElementById("inputQuantity");
        var decreasedInput = parseInt(input.value) - 1;
        if(decreasedInput>=0){

            input.value = decreasedInput;
        }
            
            }
            function increaseInput(event) {
                event.preventDefault();
                var input = document.getElementById("inputQuantity");
        var increaseInput = parseInt(input.value) + 1;
        input.value = increaseInput;
            
            }
        </script>

        {{-- Script End --}}
      @endsection

      <!-- Footer Start  -->

      <!-- Footer End -->
    