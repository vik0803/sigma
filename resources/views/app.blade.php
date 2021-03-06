<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sigma</title>

	<link rel="icon" type="image/png" href="/images/sigma.ico" />
	<link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/sigma.css" rel="stylesheet">

	<!-- Fonts -->
	<link href='/bower_components/roboto-fontface/roboto-fontface.css' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-fixed-top navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sigma-navbar-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">
					<img src="/images/sigma.png" alt="Sigma"/>
				</a>
			</div>

			<div class="collapse navbar-collapse" id="sigma-navbar-collapse">
				@if(Auth::check())
					<ul class="nav navbar-nav navbar-left">
						<li><a href="/user">Users</a></li>
						<li><a href="/project">Projects</a></li>
					</ul>
				@endif

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/auth/login">Log In</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/auth/logout">Log Out</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
