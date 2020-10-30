
<?php
  $route = Request::route()->getName();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Home
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <link rel = "icon" href ="{{getAvatar()}}"
          type = "image/x-icon">

    <link href="/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/zestyle.css" />
    <link rel="stylesheet" href="/css/forzim.css" />
    <!-- <link rel="stylesheet" href="/css/mdb.css" /> -->


    <script type='application/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type='application/javascript' src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


    @yield('header')

    <script src="/js/custom.js"></script>

    <style>
    
        .bg-normal{
            background-color: rgb(244, 243, 239)
        }
        .bg-docs{
            background-color: rgba(69, 97, 144,.06);
            /* background-color: #f5f7f8; */
        }
        .ns-bottom{
            /* border-bottom:1px solid rgba(0,0,0,.3); */
            box-shadow: 4px 0 8px lightgrey;
        }
        .wrapper-border {
            height:45px;
            width: 3px;
            border-left: 2px solid lightgrey;
            margin-right: 30px;
            margin-top: -5px;
            margin-left: 10px;
        }

        #publish {
            border: 1px solid black;
        }

        .text-awesome {
            text-transform: uppercase;
	        background: linear-gradient(to right, purple 0%, red 100%);
	        -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 1.2rem !important;
	        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         }
    </style>
</head>

<body class="@if ($route == 'admin.docs') bg-docs @else bg-normal @endif mx-0 px-0" style="">
  <div class="wrapper" id='app'>
    <div class="main-panel bg-white ns-bottom" id="main-panel" style="height:65px;width:100%;">
       <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent border-bottom-0" style="">
            <div class="container-fluid">
                <div class='navbar-brand ml-2 mr-2 d-lg-block d-md-none d-none'>
                      <img src='/icons/user-forms-2.png' width='40' style='margin-top:-5px;'/>
                </div>
                <!-- <div class='wrapper-border d-lg-block d-md-none d-none'></div> -->
                <div class="navbar-wrapper">
                     <div class="@if ($route != 'admin.docs') pb-0 pl-sm-4 @else ml-3 @endif">
                          @if(View::hasSection('toolbar'))
                               @yield('toolbar')
                           @else
                               <p class='text-awesome mb-2'> My Space </p>
                           @endif
                     </div>

                </div>
                <div class="collapse navbar-collapse justify-content-end" 
                     style="background-color: #F5F4F0" id="navigation">
                     @yield('mbutton')       
                </div>
                <ul class="navbar-nav pointer">
                    <li class="nav-item btn-rotate dropdown c-parent-dropdown">
                        <a class="nav-link dropdown-toggle"
                           id="navbarDropdownMenuLink"
                           onclick="dropDown()"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="nc-icon nc-bell-55"></i>
                        </a>
                        <div class="c-dropdown-menu dropdown-menu-right pb-0 pt-0 pl-0 border-0"
                             id = 'c-dropdown-menu'
                             style="border-radius:14px;"
                        >
                            <a class="dropdown-item c-dropdown-item c-top-radius c-bottom-radius py-2" 
                               onclick="$1('signOut').submit()" >Sign out
                            </a>

                            <form method='post' action='/logout' class='d-none' id='signOut'>
                                 @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="content pt-2 mx-0 px-0" style=''>
            @yield('content')
        </div>
  </div>  
</div>

<div class='position-absolute d-none py-3 px-2' id='toast' >
     <i class='nc-icon nc-check-2 font-weight-bolder ml-2 ' style='font-size: 1.1rem;color:white'></i>
     <span class='ml-2' style='color:white;font-size:1.1rem;'>Form has been deleted successfully</span>
</div>

@include('_pmodal')


        <script type="application/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            function adjustScreen(){
                @if ($route == 'admin.docs')
                    let width = window.innerWidth

                    // if (width < 1768){
                     if ($(".ns-position-absolute").hasClass('position-absolute'))
                         $(".ns-position-absolute").removeClass('position-absolute')
                    // }
                    // else {
                    //     if (!$(".ns-position-absolute").hasClass('position-absolute'))
                    //        $(".ns-position-absolute").addClass('position-absolute')

                    // }
                @endif
            }

            adjustScreen()

            $(window).on('autoresize', function(){
                  $('.autoresize').on('input', function () {
                      this.style.height = 'auto';
     
                      this.style.height =
                          (this.scrollHeight) + 'px';
                 });
             })

            function dropDown(){
                st($1('c-dropdown-menu'),'d:block')
                dom.body.addEventListener('click', clear)

                function clear(){
                    st($1('c-dropdown-menu'), 'd:none')
                    dom.body.removeEventListener('click',clear)
                }
            }

            (function(){
                let w = window.innerWidth 
                if (w < 600) st($1('toast'),'w:95%;l:10px;')
                else st($1('toast'), 'w:400px')
             })()


             function setStyle(el, style){
                 for (let a in style){
                     el.style[a] = style[a]
                 }
             }

        </script>

        @yield('script')

  @if ($route == 'admin.docs')
   <script type='application/javascript' src="/js/app.js"></script>
  @endif

  @if ($route == 'admin.response')
   <script type='application/javascript' src='/js/vue-app.js'></script>
  @endif
  <!-- <script src="/js/mdb.js"></script> -->

</body>

</html>
