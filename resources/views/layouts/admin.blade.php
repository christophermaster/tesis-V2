<!DOCTYPE html>
<html>

    <head>
        <title>Gestión </title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
		 <link rel="stylesheet" type="text/css" href="{{asset('icon/font-awesome/css/font-awesome.min.css')}}">
        <!-- Style.css -->
		<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/pages.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/widget.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/propio.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('dropzone/dist/dropzone.css')}}">
    	<script type="text/javascript" src="{{asset('dropzone/dist/dropzone.js')}}"></script>
	</head>

<body >
 

    		<!-- [ Pre-loader ] start -->
		<div class="loader-bg">
			<div class="loader-bar"></div>
		</div>
		<!-- [ Pre-loader ] end -->
		<div id="pcoded" class="pcoded">
			<div class="pcoded-overlay-box"></div>
			<div class="pcoded-container navbar-wrapper">
				<!-- [ Header ] start -->
				<nav class="navbar header-navbar pcoded-header">
					<div class="navbar-wrapper">
						<div class="navbar-logo">
							<a href="index.html">
								<img class="img-fluid" src="{{asset('images/logo.png')}}" alt="Theme-Logo" />
							</a>
							<a class="mobile-menu" id="mobile-collapse" href="#!">
								<i class="feather icon-menu icon-toggle-right"></i>
							</a>
							<a class="mobile-options waves-effect waves-light">
								<i class="feather icon-more-horizontal"></i>
							</a>
						</div>
						<div class="navbar-container container-fluid">
							<ul class="nav-left">
								<!--<li class="header-search">
									<div class="main-search morphsearch-search">
										<div class="input-group">
											<span class="input-group-prepend search-close">
												<i class="feather icon-x input-group-text"></i>
											</span>
											<input type="text" class="form-control" placeholder="Enter Keyword">
											<span class="input-group-append search-btn">
												<i class="feather icon-search input-group-text"></i>
											</span>
										</div>
									</div>
								</li>-->
								<li>
									<a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
										<i class="full-screen feather icon-maximize"></i>
									</a>
								</li>
							</ul>
							<ul class="nav-right">
							
                           <li class="user-profile header-notification">

									<div class="dropdown-primary dropdown">
										<div class="dropdown-toggle" data-toggle="dropdown">
											
											<span>{{Auth::user()->name}}</span>
											<i class="feather icon-chevron-down"></i>
										</div>
										<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
											<li>
												<a href="#!">
													<i class="feather icon-settings"></i> Configuración

												</a>
											</li>
											<li>
												<a href="#">
													<i class="feather icon-user"></i> Perfil

												</a>
											</li>
											<li>
												<a href="auth-sign-in-social.html">
													<i class="feather icon-log-out"></i> Salir

												</a>
											</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<!-- [ Header ] end -->

				<div class="pcoded-main-container">
					<div class="pcoded-wrapper">
						<!-- [ navigation menu ] start -->
						<nav class="pcoded-navbar">
							<div class="nav-list">
								<div class="pcoded-inner-navbar main-menu">
									<div class="pcoded-navigation-label">Navigación</div>
									<ul class="pcoded-item pcoded-left-item">
										<li class="">
											<a href="{{url('gestion/contenido')}}" class="waves-effect waves-dark">
												<span class="pcoded-micon">
													<i class="feather icon-home"></i>
												</span>
												<span class="pcoded-mtext">Inicio</span>
											</a>
										</li>
										<li class="">
											<a href="{{url('gestion/contenido/mis/publicaciones')}}" class="waves-effect waves-dark">
												<span class="pcoded-micon">
													<i class="feather icon-grid"></i>
												</span>
												<span class="pcoded-mtext">Publicaciones</span>
											</a>
										</li>
										<li class="">
											<a href="{{url('gestion/contenido/favoritos')}}" class="waves-effect waves-dark">
												<span class="pcoded-micon">
													<i class="feather icon-heart"></i>
												</span>
												<span class="pcoded-mtext">Favoritos</span>
											</a>
										</li>
									</ul>
									<div class="pcoded-navigation-label">Gestión</div>
									<ul class="pcoded-item pcoded-left-item">
										<li class="pcoded-hasmenu">
											<a href="javascript:void(0)" class="waves-effect waves-dark">
												<span class="pcoded-micon">
													<i class="icon-puzzle"></i>
												</span>
												<span class="pcoded-mtext">Ejercicios</span>
											</a>
											<ul class="pcoded-submenu">
												<li class="">
													<a href="{{url('gestion/contenido/ejercicio')}}" class="waves-effect waves-dark">
														<span class="pcoded-mtext">Listar</span>
													</a>
												</li>
												<li class="">
													<a href="{{url('gestion/contenido/ejercicio/create')}}" class="waves-effect waves-dark">
														<span class="pcoded-mtext">Crear</span>
													</a>
												</li>
											</ul>
										</li>
										<li class="pcoded-hasmenu">
											<a href="javascript:void(0)" class="waves-effect waves-dark">
												<span class="pcoded-micon">
													<i class="feather icon-edit"></i>
												</span>
												<span class="pcoded-mtext">Evaluaciones</span>
											</a>
											<ul class="pcoded-submenu">
												<li class="">
													<a href="alert.html" class="waves-effect waves-dark">
														<span class="pcoded-mtext">Listar</span>
													</a>
												</li>
												<li class="">
													<a href="{{url('gestion/contenido/crear/evaluacion')}}" class="waves-effect waves-dark">
														<span class="pcoded-mtext">Crear</span>
													</a>
												</li>
											</ul>
										</li>
										<li class=" ">
											<a href="form-picker.html" class="waves-effect waves-dark">
												<span class="pcoded-micon">
													<i class="feather icon-calendar"></i>
												</span>
												<span class="pcoded-mtext">Histórico</span>
											</a>
										</li>
		
									</ul>
									<div class="pcoded-navigation-label">Subir</div>
									<ul class="pcoded-item pcoded-left-item">
										<li class=" ">
											<a href="{{url('gestion/contenido/subir/archivo')}}" class="waves-effect waves-dark">
												<span class="pcoded-micon">
													<i class="icon-cloud-upload"></i>
												</span>
												<span class="pcoded-mtext">Archivos</span>
										
											</a>
										</li>
									</ul>
									<div class="pcoded-navigation-label">Administraccion</div>
									<ul class="pcoded-item pcoded-left-item">
										<li class=" ">
											<a href="{{url('gestion/contenido/administracion/usuarios')}}" class="waves-effect waves-dark">
												<span class="pcoded-micon">
													<i class="icon-people"></i>
												</span>
												<span class="pcoded-mtext">Usuarios</span>
											
											</a>
										</li>
										<li class=" ">
											<a href="{{url('gestion/contenido/administracion/tema')}}" class="waves-effect waves-dark">
												<span class="pcoded-micon">
													<i class="icon-notebook"></i>
												</span>
												<span class="pcoded-mtext">Catedra</span>
											
											</a>
										</li>

									</ul>
								</div>
							</div>
						</nav>
						<!-- [ navigation menu ] end -->
						<div class="pcoded-content">
							<!-- [ breadcrumb ] end -->
							<div class="pcoded-inner-content">
								<div class="main-body">
									<div class="page-wrapper">
										<div class="page-body">
											<!-- [ page content ] start -->
											<div class="row">
												<div class="col-sm-12">
													<!--Mensaje-->
													@include('flash::message')
													<!--Contenido-->
                                                        @yield('contenido')
                                                    <!--Fin Contenido-->
												</div>
											</div>
											<!-- [ page content ] end -->
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- [ style Customizer ] start -->
						<div id="styleSelector">
						</div>
						<!-- [ style Customizer ] end -->
					</div>
				</div>
			</div>
		</div>




    <!-- Required Jquery -->
    <script type="text/javascript" src="{{asset('js/jquery/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/popper.js/js/popper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- waves js -->
    <script src=".{{asset('pages/waves/js/waves.min.js')}}"></script>
    <!-- jquery slimscroll js -->
   	<script type="text/javascript" src="{{asset('js/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('js/pcoded.min.js')}}"></script>
    <script src="{{asset('js/vertical/vertical-layout.min.js')}}"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{asset('js/script.min.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="{{url('https://www.googletagmanager.com/gtag/js?id=UA-23581568-13')}}"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
	</script>
	<script type="text/javascript" src="{{asset('js/codemirror.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/xml.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('ckeditor4/plugins/ckeditor_wiris/integration/WIRISplugins.js')}}"></script>
    <script type="text/javascript" src="{{asset('ckfinder/ckfinder.js')}}"></script>

	<script type="text/javascript" src="{{asset('ckeditor4/ckeditor.js')}}"></script>
	

    <!-- Prism JS script to beautify the HTML code -->
    <script type="text/javascript" src="{{asset('js/prism.js')}}"></script>
    <!-- WIRIS script -->
	<script type="text/javascript" src="{{asset('/js/wirislib.js')}}"></script>
	
    <script src="{{asset('js/interlineado.js')}}"></script>
    <script>
        if (typeof urlParams !== 'undefined') {
            var selectLang = document.getElementById('lang_select');
            selectLang.value = urlParams[1];
        }
    </script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
            md.initVectorMap();

        });
    </script>
    <script>

        CKFinder.setupCKEditor(null, '/gestion/contenido/create/ckfinder/');
        CKEDITOR.replace('example', {
            extraPlugins: 'ckeditor_wiris',
            language: 'es'
        });

        CKEDITOR.replace('exampleA', {
            extraPlugins: 'ckeditor_wiris',
            language: 'es'
        });
    </script>
	<script>
	$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
	</script>
	<script src="{{asset('js/dropdown.js')}}"></script>

	<script>
		$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
	</script>
        
</body>
@stack('scripts')
<script>

</script>

</html>