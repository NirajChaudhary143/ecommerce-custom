@extends('home.base')

@section('content')
    @if(session('success'))
    <div class="alert alert-success container">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger container">
        {{ session('error') }}
    </div>
    @endif
@endsection