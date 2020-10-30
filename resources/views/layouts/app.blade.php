<?php
  $current_route = Request::path();
?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel = "icon" href ="/img/title/test.png"
          type = "image/x-icon">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Google+Sans:400,500|Roboto:300,400,400i,500,700&amp;subset=latin,vietnamese,latin-ext,cyrillic,greek,cyrillic-ext,greek-ext" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
    <!-- Styles -->

    <link href="/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <link rel="stylesheet" href="/css/custom.css" />
    <link rel="stylesheet" href="/css/zestyle.css" />
    <link rel="stylesheet" href="/css/flaticon.css">

    <script type='application/javascript' src="/js/custom.js"></script>
    @yield('css')

    <style>
         .text-purple {
             color: purple !important;
         }
         
         .text-awesome {
            text-transform: uppercase;
	        background: linear-gradient(to right, #30CFD0 0%, #330867 100%);
	        -webkit-background-clip: text;
	        -webkit-text-fill-color: transparent;
	        font: {
	        	size: 20vw;
	        	family: $font;
	        };
         }
    </style>
</head>
<body class="">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white"
             style='border-bottom:1px solid lightgrey;'
        >
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/icons/logo.png" height='40' class='ml-3' />
                </a>
                

                <div class="collapse navbar-collapse p-0" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto mr-3 fadeLeft" style="font-family: 'Segoe UI';margin-bottom: -10px;">
                      
                        <li> 
                             <a href='/user/home' class='nav-link font-weight-bolder text-capitalize pointer text-awesome' style='font-size:1.2rem;'> 
                                    Create one
                              </a>
                        </li>
                        
                        <div class="nav-item p-2 pointer" style="border:none;margin-top:-10px;">
                             <a href='/user/home'>
                                   <img class="" 
                                        src="/icons/user-forms-2.png" 
                                        width="50"
                                   >
                             </a>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function handleAutoresize(){
                $('.autoresize').on('input', function () {
                 this.style.height = 'auto';

                 this.style.height =
                     (this.scrollHeight) + 'px';
                });
            }

            $(window).on('autoresize', function(){
                  handleAutoresize()
            })
        </script>
    </div>

    <br /><br /><br />


    <div class="footer" style="background-color: rgb(8, 11, 18);">
        <div style="margin-left:50px;margin-top:10px;margin-right:50px;">
            <hr style="border:none; border-top:1px solid rgba(35, 49, 72,1);">
            <p class="text-white" style="font-family: 'Yu Gothic'"> 
            This website is created for 
             <span style="color:orange">Demo</span> purposes </p>
            <!-- <div class="float-right ">
                <a href="#" class="pl-3"><i class="fab fa-twitter" ></i></a>
                <a href="#" class="pl-3"><i class="fab fa-facebook"></i></a>
                <a href="#" class="pl-3"><i class="fa fa-globe"    ></i></a>
                <a href="#" class="pl-3"><i class="fab fa-instagram" ></i></a>
            </div> -->
        </div>
    </div>
    
    @yield('script')
</body>
</html>
