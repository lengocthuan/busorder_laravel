<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="{{ url('admin/dashboard') }}" class="navbar-brand">Online Bus Reservation(Admin Area)</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
        	@if ( Auth::check() )
            <li class="menu-item has-sub-menu"><a href="{{ url('/admin/routerlist') }}"><span class="glyphicon glyphicon-list"></span> Bus router list</a></li>
            <li class="menu-item has-sub-menu"><a href="{{ url('admin/noti') }}"><span class="glyphicon glyphicon-calendar"></span> Booking now</a></li>
            <li class="menu-item has-sub-menu"><a href=""><i class="fas fa-expand-arrows-alt"></i> Expand</a>
                <ul class="nav nav-custom" >
                    <li >
                         <a href="#"><i class="fas fa-location-arrow"></i> LOCATION</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ url('admin/locslist') }}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/addlocations') }}">Add</a>
                                    </li>
                                </ul>
                    </li>
                    <li >
                        <a href="#"><i class="fas fa-bus"></i> BUS_INFOR</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ url('admin/businfo') }}">List</a>
                                    </li>
                                    <li>
                                        <a  href="{{ url('admin/addbusinfo') }}">Add</a>
                                    </li>
                                </ul>
                    </li>
                    <li >
                        <a href="#"><i class="fas fa-images"></i> IMAGE</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ url('admin/noti') }}">List Image Avatar</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/imagebus') }}">List Image Bus</a>
                                    </li>
                                </ul>
                    </li>
                    <li >
                        <a href="#"><i class="fas fa-shopping-cart"></i> ORDER</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ url('admin/order') }}">List</a>
                                    </li>
                                    <li>
                                        <a href="admin/hoadon/danhsach">Add</a>
                                    </li>
                                    <li>
                                        <a href="admin/hoadon/danhsach">Detail</a>
                                    </li>
                                </ul>
                    </li>
                    <li >
                        <a href="#"><i class="fas fa-users-cog"></i> ROLE</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ url('admin/noti') }}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/noti') }}">Add</a>
                                    </li>
                                </ul>
                    </li>
                    <li >
                        <a href="#"><i class="fas fa-ticket-alt"></i> TICKET</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ url('admin/ticket') }}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/addticket') }}">Add</a>
                                    </li>
                                </ul>
                    </li>
                    <li >
                        <a href="#"><i class="fas fa-comments"></i> REVIEW</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ url('admin/noti') }}">List</a>
                                    </li>
                                </ul>
                    </li>
                    <li >
                        <a href="#"><i class="fa fa-users fa-fw"></i> USER</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ url('admin/manageuser') }}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/addmanageuser') }}">Add</a>
                                    </li>
                                </ul>
                    </li>
                </ul>
            </li>
        	<li class="menu-item has-sub-menu"><a href="{{ url('/updateinfo/'. Auth::user()->id) }}"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->username }}</a></li>
            <li class="menu-item has-sub-menu"><a href="{{ url('/admin/logout') }}"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
        	@else
            <li class="menu-item has-sub-menu"><a href="{{ url('/admin/login') }}"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
        	@endif
        </ul>
    </div>
</nav>
