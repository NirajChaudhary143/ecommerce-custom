@extends('admin.adminPanel')

@section('main-section')
    <form action="">
        @csrf

        <div class="col rounded-3 bg-white p-1">
            <label for="">Permission Name:</label>
            <input type="text" class="form-control">
        </div>
        <div class="col rounded-3 bg-white p-1 mt-2">
            <label for="">Group Name:</label>
            <select name="group_nanme" id="" class="form-select">
                <option value="">Test</option>
                <option value="">Test</option>
                <option value="">Test</option>
                <option value="">Test</option>
                <option value="">Test</option>
            </select>
        </div>
        <input type="submit" value="Add Permission" class="form-control mt-2" style="    background-color: rgb(143, 68, 235);
        font-weight: bold;
        color: white;
        margin-top: 5px;
        text-align: center;">
    </form>
@endsection