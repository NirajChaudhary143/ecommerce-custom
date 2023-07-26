@extends('admin.adminPanel')

@section('main-section')
    <div class="user-title">
        All Permissions
    </div>
    <div class="user-table-container" >
        <table class="user-table" id="permission-table">
            <thead>
                <tr>
                    <th width="40px">S.N</th>
                    <th width="500px">Permission Name</th>
                    <th>Group Name</th>
                    <th>Action</th>
                </tr>
            </thead>  
            @foreach ($permissions as $permission)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$permission->name}}</td>
                <td>{{$permission->group_name}}</td>
                <td></td>
            </tr>
                
            @endforeach
                 
        </table>
    </div>

    <script>
        $(document).ready( function () {
    $('#permission-table').DataTable();
} );
    </script>
@endsection