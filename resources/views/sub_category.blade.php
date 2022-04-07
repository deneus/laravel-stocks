@extends('partials.html')

@section('page_title')
    {{ \App\Http\Controllers\SubCategoryController::PAGE_TITLE }}
@endsection

@section('content')
    <div class="row">

        @foreach($products as $product)
            <form class="d-inline-block col-3">
                @csrf
                <div class="card bg-light m-3 p-3">
                    <div class="card-body text-center">
                        <h4 class="card-title">{{ $product->label }}</h4>
                        <p class="card-text"><img src="{{ asset($product->path) }}" style="width: 200px" ></p>
                        <p class="card-text text-wrap">{{ $product->description }}</p>
                        <p class="card-text text-wrap">quantity: {{ $product->quantity }}</p>
                        <div><input type="submit" value="Add to cart" /></div>
                        <input type="text" value="{{ $product }}" name="product" />
                    </div>
                </div>
            </form>
        @endforeach
    </div>

@endsection
