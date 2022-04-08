@extends('partials.html')

@section('page_title')
    {{ \App\Http\Controllers\SubCategoryController::PAGE_TITLE }}
@endsection

@section('content')
    @include('partials.back', ['href' => route('category', ['category' => $category]) ])

    <div class="row">
        @foreach($products as $product)
            <form class="d-inline-block col-3" method="POST" action="{{ route('add_to_cart') }}">
                @csrf
                <div class="card bg-light m-3 p-3">
                    <div class="card-body text-center">
                        <h4 class="card-title">{{ $product->title }}</h4>
                        <p class="card-text"><img src="{{ asset($product->path) }}" style="width: 200px" ></p>
                        <p class="card-text text-wrap">{{ $product->description }}</p>
                        <p class="card-text text-wrap">quantity: {{ $product->quantity }}</p>
                        <div><input type="submit" value="Add to cart" /></div>
                        <input type="hidden" value="{{ $product }}" name="item" />
                    </div>
                </div>
            </form>
        @endforeach
        @foreach($product_out_of_stock as $product)
                <form class="d-inline-block col-3">
                    @csrf
                    <div class="card border-light m-3 p-3">
                        <div class="card-body text-center">
                            <h4 class="card-title">{{ $product->title }}</h4>
                            <p class="card-text"><img src="{{ asset($product->path) }}" style="width: 200px" ></p>
                            <p class="card-text text-wrap">{{ $product->description }}</p>
                            <p class="card-text text-wrap fw-bold">OUT OF STOCK</p>
                        </div>
                    </div>
                </form>
        @endforeach
    </div>

@endsection
