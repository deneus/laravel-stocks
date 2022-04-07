@extends('partials.html')

@section('page_title')
    {{ \App\Http\Controllers\HomeController::PAGE_TITLE }}
@endsection

@section('content')
    <div class="row">
        @foreach($categories as $category)
            <a href="{{ route('category', ['category' => $category]) }}" class="d-inline-block col-3">
                <div class="card bg-light m-3 p-3 ">
                    <div class="card-body text-center">
                        <h4 class="card-title"><i class="{{ $category->icon }}"></i></h4>
                        <h4 class="card-title">{{ $category->label }}</h4>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

@endsection
