<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE-edge,chrome=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		{!! Larasset::start('header')->show('styles') !!}
		{!! Larasset::start('header')->show('scripts') !!}
		
		<title>Activa - @yield('title')</title>
	</head>
	
	<body class="pace-done">
	

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
		
		@include('includes.topnavbar')
      </div>
    </nav>
	
	
    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
			  <ul class="nav nav-sidebar">
				<li class="active"><a href={!! route('catalogsettings.index') !!}>Home</a></li>
				<li><a href="#">Reports</a></li>
				<li><a href="#">Analytics</a></li>
				<li><a href="#">Export</a></li>
			  </ul>
			  <ul class="nav nav-sidebar">
				<li><a href="">Nav item</a></li>
				<li><a href="">Nav item again</a></li>
				<li><a href="">One more nav</a></li>
				<li><a href="">Another nav item</a></li>
				<li><a href="">More navigation</a></li>
			  </ul>
			</div>
			
			
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<h1 class="page-header">@yield('page-header')</h1>
			  
				<div class="row placeholders">
					<div class="col-xs-12 col-sm-12 col-md-12 placeholder">
						@yield('content')
					</div>
				</div>
			  
			</div>
		</div>
	</div>
	
	@include('layouts.modalbox')
	
	</body>
	
		{!! Larasset::start('footer')->show('scripts') !!}

		<!--[if IE 8]>
			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
		<![endif]-->

</html>