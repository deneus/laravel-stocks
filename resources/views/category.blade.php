@extends('partials.html')

@section('page_title')
    {{ \App\Http\Controllers\CategoryController::PAGE_TITLE }}
@endsection

@section('content')
    @include('partials.back', ['href' =>  route('home') ])

    <div class="row">
        @foreach($sub_categories as $sub_category)
            <a href="{{ route('sub_category', ['subcategory' => $sub_category]) }}" class="d-inline-block col-3">
                <div class="card bg-light m-3 p-3 ">
                    <div class="card-body text-center">
                        <h4 class="card-title"><i class="{{ $sub_category->icon }}"></i></h4>
                        <h4 class="card-title">{{ $sub_category->label }}</h4>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

@endsection
