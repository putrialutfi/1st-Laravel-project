<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Order</title>

	<link href="{{ asset ('bootstrap_3_3_6/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset ('css/business-frontpage.css') }}" rel="stylesheet">
	<link href="{{ asset ('css/main.css') }}" rel="stylesheet">
	<link href="{{ asset ('css/style.css')}}" rel="stylesheet">


	<!--[if lt IE 9 ]>
		<script src="{{ asset ('http://hublaa.dev/js/html5shiv_3_7_2.min.js')}}"></script>
		<script src="{{ asset ('http://hublaa.dev/js/respond_1_4_2.min.js')}}"></script>
	<![endif]-->
</head>

<body>

	<div class="header" style="text-align: center;">
    <img src="{{ asset('img/logo.png') }}" style="width:200px;height:80px;"></a>
	</div>

	<div class="container">
	@include('navbar')
	@yield('main')
	</div>

	@yield('footer')

<script src="{{ asset('js/jquery_2_2_1.min.js')}}"></script>
<script src="{{ asset('bootstrap_3_3_6/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/partials.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('http://code.jquery.com/jquery-1.11.0.min.js')}}"></script>

</body>
</html>
