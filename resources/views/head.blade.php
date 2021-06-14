<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="JobBoard - HTML Template" />
	<meta property="og:title" content="JobBoard - HTML Template" />
	<meta property="og:description" content="JobBoard - HTML Template" />
	<meta property="og:image" content="JobBoard - HTML Template" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON -->
	<link rel="icon" href="/web/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="/web/images/favicon.png" />
	
	<!-- PAGE TITLE HERE -->
	<title>@yield('title')</title>
	
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="/web/js/html5shiv.min.js"></script>
	<script src="/web/js/respond.min.js"></script>
	<![endif]-->
	@if(App::isLocale('ar'))
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="/web/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="/web/css/style.css">
	<link rel="stylesheet" type="text/css" href="/web/css/templete.css">
	<link rel="stylesheet" type="text/css" href="/web/css/rtl.css">
	<link class="skin" rel="stylesheet" type="text/css" href="/web/css/skin/skin-1.css">
	@else
	<link rel="stylesheet" type="text/css" href="/web/en/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="/web/en/css/style.css">
	<link rel="stylesheet" type="text/css" href="/web/en/css/templete.css">
	<link class="skin" rel="stylesheet" type="text/css" href="/web/en/css/skin/skin-1.css">
	@endif
	<style>
		.strick {
			text-decoration: line-through
		}
	</style>