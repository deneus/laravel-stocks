@extends('partials.html_admin')

@section('page_title')
    Create a sub-category
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">Errors:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" class="text-white" action="{{ route('sub_categories.store') }}">
        @csrf
        @foreach(['label', 'icon'] as $item)
            <div class="form-group">
                <label class="col-form-label mt-4" for="input_{{$item}}">{{ $item }}</label>
                <input placeholder="{{ $item }}" id="input_{{$item}}" name="{{ $item }}" value="{{ $sub_category->$item }}" type="text" class="form-control" >
            </div>
        @endforeach

        <div class="form-group">
            <label for="category_id" class="form-label mt-4">Example select</label>
            <select class="form-select" id="category_id" name="category_id">
                <option>- NONE -</option>
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->label }}</option>
                @endforeach
            </select>
        </div>

        <div class="action pt-5">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection
