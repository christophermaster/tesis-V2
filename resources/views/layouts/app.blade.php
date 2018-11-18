<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Gestión </title>
    <!-- CSRF Token -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="{{url('icon/themify-icons/themify-icons.css')}}">
    <!-- Favicon icon -->
    <link rel="icon" href="{{url('https://colorlib.com//polygon/admindek/files/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="{{url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}" rel="stylesheet">
    <link href="{{url('https://fonts.googleapis.com/css?family=Quicksand:500,700')}}" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap/css/bootstrap.min.css')}}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('pages/waves/css/waves.min.css')}}" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('icon/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('icon/feather/css/feather.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/widget.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/propio.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body themebg-pattern="theme1">

    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Pre-loader end -->
    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div id="app">
                        <!--Menu-->
                        <div class="row">
                            @guest
                            @else
                        <div class="col-md-12 button-logout">
                            <div class="dropdown col-md-4">
                                <a class="btn btn-secondary dropdown-toggle a-button-trans" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar sesión') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endguest

                        </div>
                         @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{asset('js/jquery/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/popper.js/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap/js/bootstrap.min.js')}}"></script>
    
    <!-- waves js -->
    <script src="{{asset('pages/waves/js/waves.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript"
     src="{{asset('js/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('js/modernizr/js/modernizr.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/modernizr/js/css-scrollbars.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/common-pages.js')}}"></script>

    <script src="{{asset('js/pcoded.min.js')}}"></script>
    <script src="{{asset('js/vertical/vertical-layout.min.js')}}"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{asset('js/script.min.js')}}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

</body>
</html>
