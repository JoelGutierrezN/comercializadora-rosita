<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Joduma</title>

    <!-- Fonts -->
    @yield('style')
    <link rel="shortcut icon" href="{{ asset('./img/imagotipo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('./css/styles.css') }}">
    <script src="{{ asset('./js/jquery.js') }}" type="text/javascript"></script>

</head>

@section('navbar')
@include('layout.navbar')
@show

<body>
    <div class="container-fluid p-0 m-0">
        @yield('content')
        @if(Auth::check())
        <a href="{{ route('logout') }}" class="logout-button">
            <p> Salir </p>
            <i class="bi bi-box-arrow-left"></i>
        </a>
        @endif
    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @yield('script')
</body>

</html>