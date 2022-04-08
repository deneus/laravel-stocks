@extends('partials.html')

@section('content')
    @if ($cart !== NULL)
        <div class="container card bg-info mt-3 px-4 text-white" style="min-height: 95vh; padding-bottom: 5em">
            <h1 class="text-center pt-3">Current Cart</h1>
                @foreach($cart->products() as $product)
                    <div class="row border-bottom border-white border-1 py-3">
                        <div class="col-7">{{ $product->title }}</div>
                        <div class="col-2">x 1</div>
                        <div class="col-3 text-end">{{ $product->price }}$</div>
                    </div>
                @endforeach


            <div class="row fixed-bottom p-4 bg-light text-black">
                <h2 class="col-7 fw-bold">TOTAL</h2>
                <h2 class="col-5 text-end fw-bold">{{ \App\Http\Controllers\CartController::totalPrice() }}$</h2>
            </div>
        </div>
    @endif
@endsection
