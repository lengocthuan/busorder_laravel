<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Area</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <link rel="stylesheet" type="text/css" href="/css/style_admin.css">
        <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
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
            @yield('admin_update_buslist')
            @yield('editprofile')
            @yield('admin_add_location')
            @yield('admin_bus_info')
            @yield('admin_bus_list_detail')
            @yield('admin_manage_user')
            @yield('admin_manage_user_detail')
            @yield('admin_manage_user_update')
            @yield('admin_manage_user_add')
            @yield('admin_ticket')
            @yield('admin_ticket_detail')
            @yield('admin_ticket_update')
            @yield('admin_add_ticket')
            @yield('content') {{-- this here, I use session with name is content that a session for all another session. --}}
        @include('users/admins/admin_footer')
    </body>
</html>
