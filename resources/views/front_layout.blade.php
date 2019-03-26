<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>.:Welcome to Bus Ticket System:.</title>

        <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body>
        @include('front_header')
            @yield('welcome_content')
            @yield('registration_form')
            @yield('login_form')
        @include('front_footer')
    </body>
</html>