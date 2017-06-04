<!-- Navigation -->
<nav id="mainNav" class="navbar static-top navbar-toggleable-md navbar-inverse bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/home">Web App</a>
    <div class="collapse navbar-collapse" id="navbarExample">
        <ul class="sidebar-nav navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('products.index') }}"><i class="fa fa-cart-plus"></i> Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}"><i class="fa fa-user-circle-o"></i> Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.orders') }}"><i class="fa fa-bars"></i> Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('gallery.index') }}"><i class="fa fa-file-image-o"></i> Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('shop.index') }}"><i class="fa fa-shopping-basket"></i> Shop</a>
            </li>

        </ul>

        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</nav>