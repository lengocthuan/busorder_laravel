    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Bus Order</a>
            <form class="example" action="action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button class="submit" type="submit"><i class="fa fa-search"></i></button>
            </form>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/aboutus') }}">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Feedback and Rating</a>
                    </li>
                    @if( Auth::check() )
                        <li class="menu-item has-sub-menu">
                            <a href= "#"><button type="button" class="btn w3ls-btn">Hi, {{ Auth::user()->username }}</button></a>
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a class="item-link" href="{{ url('/updateinfo/'. Auth::user()->id) }}"><button type="button" class="btn w3ls-btn">Your profile</button></a>{{-- 
                                        <form action="{{url ('/updateinfo/'. Auth::user()->id) }}" method ="get">
                                            {{ csrf_field() }}
                                            <button type="submit" name="submit" class="btn w3ls-btn" class="item-link">Your profile</button>
                                        </form> --}}
                                    </li>
                                    <li class="menu-item">
                                        <a class="item-link" href= "{{ url ('/logout') }}"><button type="button" class="btn w3ls-btn">Logout</button></a>
                                    </li>
                                </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href= "{{ url('/login') }}">
                                <button type="button" class="btn w3ls-btn">Login</button>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
