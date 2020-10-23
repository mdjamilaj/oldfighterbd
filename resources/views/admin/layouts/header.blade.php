<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Fighter-Admin</title>
	<!-- Favicon -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

	<link rel="shortcut icon" href="https://nshoptopup.com/febicon/favicon.ico" type="image/x-icon">
  	<link rel="shortcut icon" href="https://nshoptopup.com/febicon/favicon-32x32.png" type="image/x-icon">
  	<link rel="shortcut icon" href="https://nshoptopup.com/febicon/favicon-16x16.png" type="image/x-icon">
  	<link rel="shortcut icon" href="https://nshoptopup.com/febicon/apple-touch-icon.png" type="image/x-icon">
	<!-- Icons -->
	<link href="{{ asset('admin/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('admin/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<!-- Page plugins -->
	<!-- Argon CSS -->
	<link href="{{ asset('admin/css/argon.css?v=1.2.0') }}" rel="stylesheet" type="text/css">
	<!-- Jquery -->
	<script src="{{ asset('admin/vendor/jquery/dist/jquery.min.js') }}"></script>
	<!-- Sweet alert  -->
	<script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>

</head>

<body style="overflow-x: hidden;">
	<!-- Sidenav -->
	<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
		<div class="scrollbar-inner">
			<!-- Brand -->
			<div class="sidenav-header  align-items-center">
				<a class="navbar-brand" href="{{ url('/admin/deshboard') }}">
					<img src="{{ asset('img/logo.png') }}" class="navbar-brand-img" alt="...">
				</a>
			</div>
			<div class="navbar-inner">
				<!-- Divider -->
				<!-- Heading -->
				{{-- <h6 class="navbar-heading p-0 text-muted">
						<span class="docs-normal">Exam Information</span>
					</h6> --}}
				<!-- Collapse -->
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<!-- Nav items -->
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active" href="{{ url('/admin/deshboard') }}">
								<i class="ni ni-tv-2 text-primary"></i>
								<span class="nav-link-text">Dashboard</span>
							</a>
						</li>
					</ul>
					<!-- Divider -->
					<hr class="my-3">
					<!-- Heading -->
					<h6 class="navbar-heading p-0 text-muted">
						<span class="docs-normal">Setup</span>
					</h6>
					<ul class="navbar-nav mb-md-3">
						<li class="nav-item ">
							<a class="nav-link" href="{{ url('/admin/product') }}">
								<img src="{{ asset('admin/img/icons/common/product.png') }}" class="mr-2"/>
								<span class="nav-link-text">Product</span>
							</a>
						</li>
							<li class="nav-item ">
								<a class="nav-link" href="{{ url('/admin/brand') }}">
									<img src="{{ asset('admin/img/icons/common/bag-brand.png') }}" class="mr-2"/>
									<span class="nav-link-text">Brand</span>
								</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="{{ url('/admin/package') }}">
									<img  src="{{ asset('admin/img/icons/common/package.png') }}" class="mr-2">
									<span class="nav-link-text">Package</span>
								</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="{{ url('/admin/order') }}">
									<img  src="{{ asset('admin/img/icons/common/purchase-order.png') }}" class="mr-2">
									<span class="nav-link-text">Order</span>
								</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="{{ route('transaction.index') }}">
									<img  src="{{ asset('admin/img/icons/common/purchase-order.png') }}" class="mr-2">
									<span class="nav-link-text">Add Wallet</span>
								</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="{{ route('withdraw.index') }}">
									<img  src="{{ asset('admin/img/icons/common/purchase-order.png') }}" class="mr-2">
									<span class="nav-link-text">Withdraw Wallet</span>
								</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="{{ url('/admin/paymentMethod') }}">
									<img  src="{{ asset('admin/img/icons/common/heck-for-payment.png') }}" class="mr-2">
									<span class="nav-link-text">Payment Method</span>
								</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="{{ route('blog.index') }}">
									<img  src="{{ asset('admin/img/icons/common/blog.png') }}" class="mr-2">
									<span class="nav-link-text">Blog</span>
								</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="{{ url('/admin/shopOrder') }}">
									<img  src="{{ asset('admin/img/icons/common/purchase-order.png') }}" class="mr-2">
									<span class="nav-link-text">Shop Order</span>
								</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="{{ route('aboutprivacy.index') }}">
									<img  src="{{ asset('admin/img/icons/common/heck-for-payment.png') }}" class="mr-2">
									<span class="nav-link-text">Page</span>
								</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="{{ url('/admin/match') }}">
									<img  src="{{ asset('admin/img/icons/common/purchase-order.png') }}" class="mr-2">
									<span class="nav-link-match">Matchs</span>
								</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="{{ url('/admin/notice') }}">
									<img  src="{{ asset('admin/img/icons/common/purchase-order.png') }}" class="mr-2">
									<span class="nav-link-text">Notice</span>
								</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="{{ route('slider.index') }}">
									<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sliders-h" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-sliders-h fa-w-16 text-info mr-2" style="width: 18px;"><path fill="currentColor" d="M496 384H160v-16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v16H16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h80v16c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-16h336c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm0-160h-80v-16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v16H16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h336v16c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-16h80c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm0-160H288V48c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v16H16C7.2 64 0 71.2 0 80v32c0 8.8 7.2 16 16 16h208v16c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-16h208c8.8 0 16-7.2 16-16V80c0-8.8-7.2-16-16-16z" class=""></path></svg>
									<span class="nav-link-text">Slider</span>
								</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="{{ route('users.index') }}">
									<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="users" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-users fa-w-20 text-success mr-2" style="width: 18px;"><path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z" class=""></path></svg>
									<span class="nav-link-text">Users</span>
								</a>
							</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>



	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Search form -->
					<form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
						<div class="form-group mb-0">
							<div class="input-group input-group-alternative input-group-merge">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-search"></i></span>
								</div>
								<input class="form-control" placeholder="Search" type="text">
							</div>
						</div>
						<button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</form>
					<!-- Navbar links -->
					<ul class="navbar-nav align-items-center  ml-md-auto ">
						<li class="nav-item d-xl-none">
							<!-- Sidenav toggler -->
							<div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
								<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
								</div>
							</div>
						</li>
						<li class="nav-item d-sm-none">
							<a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
								<i class="ni ni-zoom-split-in"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Header -->

		<div style="min-height: 80vh!important;">