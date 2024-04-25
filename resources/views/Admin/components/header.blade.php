
<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">

        </div>
        <div class="header-right">
            <ul class="clearfix">

                <li class="icons dropdown d-none d-md-flex">
                    <a>
                        <span>Admin</span>
                    </a>
                </li>
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="{{url('images/user/1.png')}}" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                {{--  Logout--}}
                            <ul>
                                <li>
                                    <form id="logout-btn" action="{{ url('/api/logout') }}" method="POST">
                                        @csrf
                                        <button type="submit"><i class="icon-key"></i> <span>Logout</span></button>
                                    </form>

                                </li>
                            </ul>

                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
