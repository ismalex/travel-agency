<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name','DREAM TRAVEL')}}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('css/helpers.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.css')}}">

    <style >

        .two-columns {
-webkit-column-count: 2;
-moz-column-count: 2;
column-count: 2;
/* -webkit-column-gap: 40px;
column-gap: 40px;
-moz-column-gap: 40px; */
}
</style>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">
    {{--     <link rel="stylesheet" href="assets/fonts/ionicons/css/ionicons.min.css"> --}}
    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="{{asset('/fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/font-awesome.min.css">
</head>

<body>
    <div id="app">

        @include('included.navbar')


        @yield('content')

        @section('')
        @include('included.about')
        @show

    </div>
    @include('included.footer')
    @include('included.scripts')
</body>

</html>
