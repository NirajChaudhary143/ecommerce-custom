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
                <div class="status">Archived</div>
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
                    @foreach ($Products as $product)
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
                            <a href="#" class="btn btn-danger">Delete</a>
                            <a href="#" class="btn btn-success">Edit</a>
                        </td>
                    </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
{{-- Active Product end --}}


    </div>
    {{-- Product container End --}}

    {{-- Javascript Start --}}

    <script>
        var statusList = document.querySelectorAll('.status');
        var activeCheck = null; // Track the active check element
        var statusName =null;
    
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
                }
                statusName = status.innerText.trim();
                console.log(statusName);
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
} );

    </script>
      {{-- Javascript End --}}
@endsection