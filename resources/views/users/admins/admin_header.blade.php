<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="/admin/login" class="navbar-brand">Online Bus Reservation(Admin Area)</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
        	@if ( Auth::check() )
            <li class="menu-item has-sub-menu"><a href="{{ url('/admin/routerlist') }}"><span class="glyphicon glyphicon-list"></span> Bus list</a></li>
            <li class="menu-item has-sub-menu"><a href="{{ url('/') }}"><span class="glyphicon glyphicon-calendar"></span> Booking now</a></li>
            <li class="menu-item has-sub-menu"><a href=""><i class="fas fa-expand-arrows-alt"></i> Expand</a>
                <ul class="nav nav-custom" >
                    <li >
                         <a href="#"><i class="fas fa-location-arrow"></i> LOCATION</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ url('admin/locslist') }}">List</a>
                                    </li>
                                    <li>
                                        <a href="admin/theloai/them">Add</a>
                                    </li>
                                </ul>
                    </li>
                    <li >
                        <a href="#"><i class="fas fa-bus"></i> BUS_INFOR</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/sanpham/danhsach">List</a>
                                    </li>
                                    <li>
                                        <a  href="admin/sanpham/them">Add</a>
                                    </li>
                                </ul>
                    </li>
                    <li >
                        <a href="#"><i class="fas fa-images"></i> IMAGE</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/images/danhsach">List</a>
                                    </li>
                                    <li>
                                        <a href="admin/images/them">Add</a>
                                    </li>
                                </ul>
                    </li>
                    <li >
                        <a href="#"><i class="fas fa-shopping-cart"></i> ORDER</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/hoadon/danhsach">List</a>
                                    </li>
                                    <li>
                                        <a href="admin/hoadon/danhsach">Add</a>
                                    </li>
                                    <li>
                                        <a href="admin/hoadon/danhsach">Detail</a>
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
                                        <a href="admin/tintuc/danhsach">List</a>
                                    </li>
                                    <li>
                                        <a href="admin/tintuc/them">Add</a>
                                    </li>
                                </ul>
                    </li>
                    <li >
                        <a href="#"><i class="fas fa-ticket-alt"></i> TICKET</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/dichvu/danhsach">List</a>
                                    </li>
                                    <li>
                                        <a href="admin/dichvu/them">Add</a>
                                    </li>
                                </ul>
                    </li>
                    <li >
                        <a href="#"><i class="fas fa-comments"></i> REVIEW</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/lienhe/danhsach">List</a>
                                    </li>
                                </ul>
                    </li>
                    <li >
                        <a href="#"><i class="fa fa-users fa-fw"></i> USER</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/user/danhsach">List</a>
                                    </li>
                                    <li>
                                        <a href="admin/user/them">Add</a>
                                    </li>
                                </ul>
                    </li>
                </ul>
            </li>
        	<li class="menu-item has-sub-menu"><a href="{{ url('/customer/profile') }}"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->username }}</a></li>
            <li class="menu-item has-sub-menu"><a href="{{ url('/admin/logout') }}"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
        	@else
            <li class="menu-item has-sub-menu"><a href="{{ url('/admin/login') }}"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
        	@endif
        </ul>
    </div>
</nav>
