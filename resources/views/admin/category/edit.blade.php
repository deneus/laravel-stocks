@extends('partials.html_admin')

@section('page_title')
    Edit a categories ({{ $category->id }})
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

    <form method="POST" class="text-white" action="{{ route('categories.update', ['category' => $category]) }}">
        @method('PUT')
        @csrf
        @foreach(['label', 'icon'] as $item)
            <div class="form-group">
                <label class="col-form-label mt-4" for="input_{{$item}}">{{ $item }}</label>
                <input type="text" class="form-control" placeholder="{{ $item }}" id="input_{{$item}}" name="{{ $item }}" value="{{ $category->$item }}">
            </div>
        @endforeach

        <h4 class="mt-4">Sub categories</h4>
        @foreach($category->subCategories() as $subCategory)
            <div>{{ $subCategory->label }}</div>
        @endforeach

        <div class="action pt-5">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection
