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
        <div class="product-table">
            <table>
                <thead></thead>
            </table>
        </div>
        <form action="{{route('logout')}}" method="post">@csrf
        <input type="submit" value="Logout">
        </form>
    </div>
    {{-- Product container End --}}

    {{-- Javascript Start --}}

    <script>
        var statusList = document.querySelectorAll('.status');
        var activeCheck = null; // Track the active check element
    
        window.onload = function () {
            var firstStatus = statusList[0];
            if (firstStatus) {
                activeCheck = document.createElement('i');
                activeCheck.classList.add('fa-solid');
                activeCheck.classList.add('fa-check');
                activeCheck.classList.add('activeCheck');
                firstStatus.insertBefore(activeCheck, firstStatus.firstChild);
            }
        };
    
        statusList.forEach(status => {
            status.addEventListener('click', function (e) {
                if (activeCheck) {
                    activeCheck.remove(); // Remove active check from previous status
                }
    
                activeCheck = document.createElement('i');
                activeCheck.classList.add('fa-solid');
                activeCheck.classList.add('fa-check');
                activeCheck.classList.add('activeCheck');
                status.insertBefore(activeCheck, status.firstChild);
            });
        });
    </script>
    
    


    {{-- Javascript End --}}

@endsection