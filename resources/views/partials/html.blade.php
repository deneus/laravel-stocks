<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stock Laravel App</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body class="antialiased">

@include('partials.navbar')

<h1 class="text-white text-center p-5">
    @yield('page_title')
</h1>

<div class="row col-12">
    <div class="col-9">
        @yield('content')
    </div>
    <div class="col-3">
        <div class="container card bg-info mt-3 px-4 text-white">
            <h1 class="text-center pt-3">Current Cart</h1>
            @for($i=0; $i<5; $i++ )
                <div class="row border-bottom border-white border-1 py-3">
                    <div class="col-7">item {{$i}}</div>
                    <div class="col-2">x 1</div>
                    <div class="col-3 text-end">10.00$</div>
                </div>
            @endfor
                <div class="row py-3">
                    <h2 class="col-7">TOTAL</h2>
                    <h2 class="col-5 text-end">10.00$</h2>
                </div>
        </div>
    </div>
</div>

<h3><a href="https://bootswatch.com/solar/">https://bootswatch.com/solar/</a></h3>
<script src="https://kit.fontawesome.com/ed3a43a5fa.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
