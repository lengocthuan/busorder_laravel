<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome Admin</title>
        <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <link rel="stylesheet" type="text/css" href="/css/style_admin.css">
        <script src="js/js_admin.js"></script>
    </head>
    <body>
        @include('users/admins/admin_header')
            @yield('loginadform')
            @yield('admin_dashboard')
            @yield('admin_bus_list')
            @yield('admin_add_bus')
            @yield('admin_bus_location')
            @yield('admin_detail_loc')
        @include('users/admins/admin_footer')
    </body>
</html>
