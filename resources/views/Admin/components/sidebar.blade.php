<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Argan Beauty</li>
            <li>
                <a  href="{{route('dashboard')}}" aria-expanded="false">
                    <span class="nav-text">Dashboard</span>
                </a>

            </li>
            {{--                Users table --}}
            <li>
                <a  href="{{route('users.show')}}" aria-expanded="false">
                    <i class="icon-note menu-icon"></i><span class="nav-text">Users</span>
                </a>

            </li>
            {{--                Categories--}}
            <li>
                <a href="{{route('categories.show')}}" aria-expanded="false">
                    <i class="icon-menu menu-icon"></i><span class="nav-text">Categories</span>
                </a>
            </li>
            {{--                Products--}}
            <li>
                <a href="{{route('products.show')}}" aria-expanded="false">
                    <i class="icon-menu menu-icon"></i><span class="nav-text">Products</span>
                </a>
            </li>
            {{--                Blog--}}
            <li>
                <a  href="{{route('posts.show')}}" aria-expanded="false">
                    <i class="icon-notebook menu-icon"></i><span class="nav-text">Blogs</span>
                </a>

            </li>
            {{--                Order--}}
            <li>
                <a  href="{{route('orders.show')}}" aria-expanded="false">
                    <i class=" icon-menu menu-icon"></i><span class="nav-text">Orders</span>
                </a>

            </li>
            {{--                Comments--}}
            <li>
                <a  href="{{route('comments.show')}}" aria-expanded="false">
                    <i class=" icon-menu menu-icon"></i><span class="nav-text">Orders</span>
                </a>

            </li>
        </ul>
    </div>
</div>
