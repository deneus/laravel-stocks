@extends('partials.html_admin')

@section('page_title')
    Manage
@endsection

@section('content')
    <ul>
        <li><h4><a href="{{ route('categories.index') }}" class="text-white">Categories</a></h4></li>
        <li><h4><a href="#" class="text-white">Sub-Categories</a></h4></li>
        <li><h4><a href="#" class="text-white">Products</a></h4></li>
    </ul>
@endsection
