
<?php
  $routes = ['admin.blog'];
  $route = request()->route()->getName();
  $path = '';

  if (in_array($route, $routes))
      $path = route($route);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
{{--    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">--}}
{{--    <link rel="icon" type="image/png" href="./assets/img/favicon.png">--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Home
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
{{--    <link href="" rel="stylesheet" />--}}
    <link href="/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />

    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="/js/custom.js"></script>
</head>

<body class="" style="background-color: rgb(244, 243, 239)">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <a href="" class="simple-text logo-mini">
            </a>
            <a href="" class="simple-text logo-normal">
                My Logo
{{--                 <div class="logo-image-big">--}}
{{--                  <img src="../assets/img/logo-big.png">--}}
{{--                </div> --}}
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="{{  $route == 'user.home' ? "active" : "" }}">
                    <a href="{{route('user.home')}}">
                        <i class="nc-icon nc-bank"></i>
                        <p> Home </p>
                    </a>
                </li>
{{--                <li>--}}
{{--                    <a href="javascript:;">--}}
{{--                        <i class="nc-icon nc-diamond"></i>--}}
{{--                        <p> Skills </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="">
                    <a href="">
                        <i class="nc-icon nc-pin-3"></i>
                        <p> Location </p>
                    </a>
                </li>
                <li class="{{ $route == 'user.profile' ? 'active' : ''  }}">
                    <a href="{{route('user.profile')}}">
                        <i class="nc-icon nc-single-02"></i>
                        <p> Profile </p>
                    </a>
                </li>

{{--                <li class="{{ $route == 'user.albums' ? 'active' : ''  }}">--}}
{{--                    <a href="{{route('user.albums')}}">--}}
{{--                        <i class="nc-icon nc-image"></i>--}}
{{--                        <p> Photos </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                @if (current_user()->isAdmin())
                 <li class="{{ $route == 'admin.blog' ? 'active' : ''  }}">
                    <a href="{{route('admin.blog')}}">
                        <i class="nc-icon nc-tag-content"></i>
                        <p> Blogs </p>
                    </a>
                 </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="main-panel" style="height: 100vh;">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                     <div class="navbar-brand pb-0 pl-sm-4">
                      @if ($route == 'admin.blog')
                             <a   href="blogs/create"
                                     class="btn btn-info shadow text-white"
                                     style="border-radius: 25px;background-color: rgba(83, 133, 163,.71)">
                                 <i class="fa fa-plus" style="color:white"></i>
                                 Create
                             </a>
                        @elseif($route == 'user.albums')
                             <a   href="albums/create"
                                  class="btn btn-danger shadow text-white"
                                  style="border-radius: 25px;">
                                 <i class="fa fa-plus" style="color:white"></i>
                                 Create
                             </a>
                        @else
                        <p>Title</p>
                       @endif
                     </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <form method="get" action="{{$path}}">
                        <div class="input-group no-border">
                            <input type="text"
                                   class="form-control"
                                   style="font-size:1em;"
                                   placeholder="Search..."
                                   value=""
                                   name="key"
                            >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nc-icon nc-bell-55"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Some Actions</span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content pt-2">
            @yield('content')
        </div>

{{--        <footer class="footer" style="position: absolute; bottom: 0; width: -webkit-fill-available;">--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="row">--}}
{{--                    <nav class="footer-nav">--}}
{{--                        <ul></ul>--}}
{{--                    </nav>--}}
{{--                    <div class="credits ml-auto">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </footer>--}}
    </div>
</div>
<!--   Core JS Files   -->
<script src="/js/core/jquery.min.js"></script>
<script src="/js/core/popper.min.js"></script>
<script src="/js/core/bootstrap.min.js"></script>
{{--<script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>--}}
{{--<!--  Google Maps Plugin    -->--}}
{{--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>--}}
{{--<!-- Chart JS -->--}}
{{--<script src="./assets/js/plugins/chartjs.min.js"></script>--}}
{{--<!--  Notifications Plugin    -->--}}
{{--<script src="./assets/js/plugins/bootstrap-notify.js"></script>--}}
{{--<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->--}}
{{--<script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>--}}
</body>

</html>
