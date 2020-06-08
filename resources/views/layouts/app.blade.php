<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel = "icon" href ="/img/title/test.png"
          type = "image/x-icon">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- Styles -->

    <link rel="stylesheet" href="/css/custom.css" />
    <link rel="stylesheet" href="/css/flaticon.css">

    <script src="/js/custom.js"></script>
    @yield('css')
</head>
<body class="">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
{{--                    {{ config('app.name', 'Laravel') }}--}}
                    <img src="/img/logo/logo.png" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse p-0" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" style="font-family: 'Segoe UI'; margin-bottom: -10px;">
                        <!-- Authentication Links -->
                        <li class="nav-item p-2">
                            <a class="nav-link text-dark"  href="{{route('check')}}" > Home</a>
                        </li>
                        <li class="nav-item p-2">
                            <a class="nav-link text-dark" href="{{route('about')}}" > About</a>
                        </li>

{{--                        <li class="nav-item dropdown p-2">--}}
{{--                            <a href="{{route('services')}}" id="services" style="display: none"></a>--}}
{{--                            <a class="nav-link text-dark" href="/"--}}
{{--                               id="navbardrop" data-toggle="dropdown" onclick="document.getElementById('services').click()">--}}
{{--                                Services--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu" style="margin-top:0; ">--}}
{{--                                <a class="dropdown-item" href="#">კონსულტირება</a>--}}
{{--                                <a class="dropdown-item" href="#">დოკუმენტის ექსპერტიზა</a>--}}
{{--                                <a class="dropdown-item" href="#">არქ. პროექტის ექსპერტიზა</a>--}}
{{--                                <a class="dropdown-item" href="#">დოკუმენტაციის შემუშავება</a>--}}
{{--                                <a class="dropdown-item" href="#">სამუშაო გარემოს კითხვარი</a>--}}
{{--                                <a class="dropdown-item" href="#">რისკების შეფასება</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}

                        <li class="nav-item p-2">
                            <a class="nav-link text-dark" href="{{route('blog')}}" > Blog</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link text-dark" href="#" > Blog</a>--}}
{{--                            <ul class="submenu bg-danger">--}}
{{--                                <li><a href="blog.html">Blog</a></li>--}}
{{--                                <li><a href="blog_details.html">Blog Details</a></li>--}}
{{--                                <li><a href="elements.html">Element</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}

{{--                        <li class="nav-item p-2">--}}
{{--                            <a class="nav-link text-dark" href="#" > Documents</a>--}}
{{--                        </li>--}}
                        <li class="nav-item p-2">
                            <a class="nav-link text-dark" href="{{route('contact')}}" > Contact</a>
                        </li>

{{--                        @guest--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                            </li>--}}
{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <script>
            function showComments(k){

                let c = $$('comments')[k].style.display

                if (c === "")
                {
                    $$('comments')[k].style.display  = "none"
                }
                else
                    $$('comments')[k].style.display = ""
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function postComment(k,i) {
                $.ajax({
                    url: '/comment/' + i,
                    type: 'post',
                    data:
                        '_token={{csrf_token()}}',
                    data: {
                        body: $$('postComment')[k].value
                    },
                    success: function (res) {
                        $$('error-message')[k].innerHTML = ''
                        renderComment($$('postComment')[k].value, k)
                        $$('postComment')[k].value = ''
                    },
                    error: function (request, status, error) {
                        set(request.responseText);
                    }
                });

                // window.location.href ='blog?top='+Math.floor(window.scrollY)

                function set(res) {
                    message = JSON.parse(res);
                    $$('error-message')[k].innerHTML = message['message'];
                }
            }

            function renderComment(body, i) {
                // alert(i)
                let result = `
                               <div class="media p-3 mb-4 ml-3 border-left bg-grey" style="width: 100%; ">
                                  <img src="{{getAvatar()}}" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:30px;height:30px">
                                  <div class="media-body" style="padding-bottom:-1px;">
                                        <h6>@ <b class="text-info">{{auth()->user()->username ?? false}}</b> said..</h6>
                                        <p class="mycolor font-weight-bolder"
                                           style="font-size:.8em;line-height: 2em;">${body}...</p>
                                          </div>
                                         </div> `
                $$("all-comments")[i].innerHTML += result
                // console.log($$('all-comments')[i])
            }
        </script>
    </div>
    <div class="footer" style="background-color: rgb(8, 11, 18);">
        <div style="margin-left:50px;margin-top:20px;margin-right:50px;">
            <hr style="border:none; border-top:1px solid rgba(35, 49, 72,1);">
            <p class="text-white" style="font-family: 'Yu Gothic'"> Copyright ©2020 All rights reserved |
                This template isn't made by <span style="color:red">Me</span></p>
            <div class="float-right pb-2">
                <a href="#" class="pl-3"><i class="fab fa-twitter" ></i></a>
                <a href="#" class="pl-3"><i class="fab fa-facebook"></i></a>
                <a href="#" class="pl-3"><i class="fa fa-globe"    ></i></a>
                <a href="#" class="pl-3"><i class="fab fa-instagram" ></i></a>
            </div>
        </div>
    </div>
    @yield('script')
</body>
</html>
