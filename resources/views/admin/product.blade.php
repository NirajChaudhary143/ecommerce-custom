@extends('admin.adminPanel')

@section('main-section')
{{-- Product container Start --}}
    <div class="product-container">
        <div class="user-title">
            Products
        </div>
        <div class="status-wrapper">
            <div class="status-container">
                <div class="status">Active</div>
                <div class="status">Draft</div>
            </div>
            <div class="search-wrapper">
                        {{-- Add Link --}}
            <div class="category-add-link">
                <a href="{{route('view.add.product.form')}}">Add Product</a>
            </div>
        {{-- Add Link Ends --}}
            </div>
        </div>
        {{-- Active product start --}}
        <div class="product-table mt-2" id="active-product">
            <table width="100%" id="product-table" class="hover ">
                <thead>
                    <tr>
                        <th width="50px">S.N.</th>
                        <th width="400px">Product Title</th>
                        <th>Selling Price</th>
                        <th>Product Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activeProducts as $product)
                    <tr>
                        <td width="50px">{{ $loop->iteration }}</td>
                        <td width="400px">
                            <div class="d-flex align-items-center">
                                @php
                                    $productImage = $productImages->where('product_id', $product->id)->first();
                                @endphp
                                @if ($productImage)
                                    <img src="{{ asset('uploads/products/' . $productImage->name) }}" alt="" srcset=""
                                        style="border-radius: 10px;width:50px;height:50px">
                                @else
                                    <img src="{{ asset('image/favicon.png') }}" alt="" srcset=""
                                        style="border-radius: 10px;width:50px;height:50px">
                                @endif
                                <div style="margin-left: 3px">{!! Illuminate\Support\Str::limit($product->product_title, 90, '...') !!}</div>
                            </div>
                        </td>
                        <td>{{ $product->selling_price }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->status }}</td>
                        <td>
                            <a href="{{route('delete.product',['id'=>$product->id])}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            <a href="{{route('edit.product',['id'=>$product->id])}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
{{-- Active Product end --}}

{{-- Draft Product --}}
<div id="draft-product" class="mt-2">
    <table width="100%" id="draft-product-table" class="hover ">
        <thead>
            <tr>
                <th>S.N.</th>
                <th width="300px">Product Title</th>
                <th>Selling Price</th>
                <th>Product Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($draftProducts as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td width="300px">
                    <div class="d-flex align-items-center">
                        @php
                            $productImage = $productImages->where('product_id', $product->id)->first();
                        @endphp
                        @if ($productImage)
                            <img src="{{ asset('uploads/products/' . $productImage->name) }}" alt="" srcset=""
                                style="border-radius: 10px;width:50px;height:50px">
                        @else
                            <img src="{{ asset('image/favicon.png') }}" alt="" srcset=""
                                style="border-radius: 10px;width:50px;height:50px">
                        @endif
                        <div style="margin-left: 3px">{!! Illuminate\Support\Str::limit($product->product_title, 90, '...') !!}</div>
                    </div>
                </td>
                <td>{{ $product->selling_price }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->status }}</td>
                <td>
                    <a href="{{route('delete.product',['id'=>$product->id])}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    <a href="{{route('edit.product',['id'=>$product->id])}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

{{-- Draft Product End --}}


    </div>
    {{-- Product container End --}}

    {{-- Javascript Start --}}

    <script>
        var statusList = document.querySelectorAll('.status');
        var activeCheck = null; // Track the active check element
        var statusName =null;
        var activeProduct = document.querySelector('#active-product');
        var draftProduct = document.querySelector('#draft-product');
    
        window.onload = function () {
            var firstStatus = statusList[0];
            if (firstStatus) {
                activeCheck = document.createElement('i');
                activeCheck.classList.add('fa-solid');
                activeCheck.classList.add('fa-check');
                activeCheck.classList.add('activeCheck');
                firstStatus.insertBefore(activeCheck, firstStatus.firstChild);
                statusName="Active";
                console.log(statusName);
            }
        };
    
        statusList.forEach(status => {
            status.addEventListener('click', function (e) {
                if (activeCheck) {
                    activeCheck.remove(); // Remove active check from previous status
                    activeProduct.style.display = 'none';
                    draftProduct.style.display = 'none';
                }
                statusName = status.innerText.trim();
                console.log(statusName);
                if(statusName === 'Draft'){
                    draftProduct.style.display = 'block';
                }
                if(statusName === 'Active'){
                    activeProduct.style.display = 'block';
                }
                activeCheck = document.createElement('i');
                activeCheck.classList.add('fa-solid');
                activeCheck.classList.add('fa-check');
                activeCheck.classList.add('activeCheck');
                status.insertBefore(activeCheck, status.firstChild);
            });
        });

        // Jquery Table
        $(document).ready( function () {
    $('#product-table').DataTable({
        columnDefs: [
                {
                    targets: [4,5], // Column index 4 (the "Status" column)
                    orderable: false, // Disable sorting for this column
                }
            ],
    });
    $('#draft-product-table').DataTable({
        columnDefs: [
                {
                    targets: [4,5], // Column index 4 (the "Status" column)
                    orderable: false, // Disable sorting for this column
                }
            ],
    });
} );

    </script>
      {{-- Javascript End --}}
@endsection