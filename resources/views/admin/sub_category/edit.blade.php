@extends('partials.html_admin')

@section('page_title')
    Edit a categories ({{ $sub_category->id }})
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

    <form action="{{ route('sub_categories.update', ['sub_category' => $sub_category]) }}" method="POST" class="text-white" >
        @method('PUT')
        @csrf
        @foreach(['label', 'icon'] as $item)
            <div class="form-group">
                <label class="col-form-label mt-4" for="input_{{$item}}">{{ $item }}</label>
                <input type="text" class="form-control" placeholder="{{ $item }}" id="input_{{$item}}" name="{{ $item }}" value="{{ $sub_category->$item }}">
            </div>
        @endforeach

        <div class="form-group">
            <label for="category_id" class="form-label mt-4">Example select</label>
            <select class="form-select" id="category_id" name="category_id">
                <option>- NONE -</option>
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" @if($sub_category->category()->id === $category->id) selected="selected" @endif>{{ $category->label }}</option>
                @endforeach
            </select>
        </div>


        <h4 class="mt-4">Products</h4>
        <ul>
        @foreach($sub_category->products() as $product)
            <li>{{ $product->title }}</li>
        @endforeach
        </ul>

        <div class="action pt-5">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection
