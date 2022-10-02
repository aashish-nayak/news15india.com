<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@meta([
		'title'         => 'Thank You',
		'prefix'        => ' - '.setting('site_name'),
		'keywords'      => setting('site_meta_keyword'),
		'description'   => setting('site_meta_description'),
		'image'         => setting('site_logo'),
		'type'          => 'thank-you',
	])
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
	</style>
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body style="display: flex;justify-content:center;align-items:center;height:100vh">
	<div>
		<header class="site-header" style="padding: 0" id="header">
			<h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
		</header>
	
		<div class="main-content">
			<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
			<p class="main-content__body" data-lead-id="main-content-body">Thanks a bunch for filling that out. Our Team Contact You Soon. Thanks for being you.</p>
			@if(auth('web')->check())
			<p class="main-content__body" data-lead-id="main-content-body">You Can check Application Form Status in your Profile <b>Reporter Application</b> Section</p>
			
			<p class="main-content__body" data-lead-id="main-content-body"><b>Note : </b> <small>You can login Using Your Email & password is your email</small></p>
			<p class="main-content__body" data-lead-id="main-content-body"><a href="{{route('dashboard')}}" class="btn btn-primary" >Go To Profile Page</a></p>
			@else
			<a href="{{route('home')}}" class="btn btn-primary" >Go To Home Page</a>
			@endif
		</div>
	</div>
</body>
</html>