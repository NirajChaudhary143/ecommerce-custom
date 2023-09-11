<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
               {{-- Product List --}}
               @foreach ($products as $product )
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{route('product.details',['id'=>$product->id])}}" class="option1">
                              Product Detail
                           </a>
                        </div>
                     </div>
                     @foreach ($productImage as $productImg)
                        @if($productImg->product_id == $product->id)
                     <div class="img-box">
                        <img src="{{ asset('uploads/products/'.$productImg->name) }}" alt="">
                     </div>
                     @break
                     @endif
                     @endforeach
                     <div class="detail-box">
                        <h5>
                           {{ Illuminate\Support\Str::limit($product->product_title, $limit = 40, $end = '...') }}
                        </h5>
                        <h6>
                           Rs.{{ $product->product_price}}
                        </h6>
                        @if ($product->product_discount)
                        <h6 style="text-decoration:line-through; margin-left:5px; color:rgb(241, 104, 104)">
                           Rs.{{ $product->product_discount}}
                        </h6>
                        @endif
                        
                     </div>
                  </div>
               </div>
                  
               @endforeach
               {{-- Product List End --}}
               <div style="padding-top:10px">
                  {{-- Pagination --}}
                  {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
               </div>
            </div>
            <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div>
         </div>
      </section>