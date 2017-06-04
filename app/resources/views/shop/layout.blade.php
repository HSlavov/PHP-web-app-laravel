<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web App</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/shop-homepage.css" rel="stylesheet">

    {{-- Custum LIghtbox css images--}}
    <link href="/css/lightbox.css" rel="stylesheet">

    {{-- Custum bootstrap gallery css  --}}
    <link href="/css/gallery.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">

    <div class="row">

        <div class="col-md-3">
            <p class="lead">Web App</p>
            <div class="list-group">
                <a href="/shop/" class="list-group-item">Shop</a>
                <a href="{{ route('shop.shoppingCart') }}" class="list-group-item">My Cart</a>
                <a href="{{ route('users.profile') }}" class="list-group-item">Profile</a>
                <a href="#" class="list-group-item">Contact</a>
            </div>
        </div>

        <div class="col-md-9">

        @yield('content')

        <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand" href="#">Web App</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav ">
                            <li>
                                <a href="{{ route('shop.index') }}">Shop</a>
                            </li>
                            <li>
                                <a href="{{ route('users.profile') }}">Profile</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                        </ul>
                        {{-- Nav dropdown right menu--}}
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                                <li>
                                    <a href="{{ route('shop.shoppingCart') }}">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>Shopping Cart
                                        <span class="badge"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                        {{-- Nav dropdown right menu--}}
                    </div>
                    <!-- /.navbar-collapse -->
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                </div>
                <!-- /.container -->
            </nav>


            <div class="container">

                <hr>

                <!-- Footer -->
                <footer>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Copyright &copy; HSlavov 2017</p>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- /.container -->

            <!-- jQuery -->
            <script src="/js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="/js/bootstrap.min.js"></script>

            <!-- Bootstrap core JavaScript -->
            <script src="/vendor/jquery/jquery.min.js"></script>
            <script src="/vendor/tether/tether.min.js"></script>
            <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

            <!-- Plugin JavaScript -->
            <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="/vendor/chart.js/Chart.min.js"></script>
            <script src="/vendor/datatables/jquery.dataTables.js"></script>
            <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>

            <!-- Custom scripts for this template -->
            <script src="/js/sb-admin.min.js"></script>

            {{-- Custum scripts for gallery Lightbox--}}
            <script src="/js/lightbox.js"></script>

            {{-- Custum bootstrap gallery js --}}
            <script scr="/js/gallery.js"></script>
</body>

</html>
