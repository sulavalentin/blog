<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title', '')</title>
        <!-- Bootstrap core CSS -->
        <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
        <!-- Custom fonts for this template -->
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!-- Custom styles for this template -->
        <link href="{{ asset(mix('css/clean-blog.css')) }}" rel="stylesheet">
    </head>

    <body>

        @include('frontend.partials.nav')

        @yield('content')

        @include('frontend.partials.footer')

        <script src="{{ asset(mix('js/app.js')) }}"></script>

        <script src="{{ asset(mix('js/clean-blog.js')) }}"></script>

        @stack('after-scripts')

    </body>
</html>
