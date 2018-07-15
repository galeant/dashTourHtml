<html>
<head>
	<title>Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
	<style>
		@font-face { 
	   		font-family:CenturyGothicRegular; 
	   		src: url('{{ asset('fonts/CenturyGothicRegular.ttf') }}'); 
		}
		@font-face { 
	   		font-family:MyriadPro; 
	   		src: url('{{ asset('fonts/MyriadPro-Regular.otf') }}'); 
		}
		body{
			font-family: CenturyGothicRegular;
		}
		.container-fluid{
			background-image: url("{{ asset('images/Page.png') }}");
			background-repeat:no-repeat;
			background-size: cover;
			background-attachment: fixed;
		}
		.container-fluid .row >.col-md-8{
			background-color: black;
			height: 100%;
			opacity: 0.6;
			text-align: center;
			padding-top:20%;
		}
		.form-field{
			height: 100%;
			border-radius: 0 5px 5px 0;
			background-color: #ffff;
			text-align: center;
			padding: 25px 50px 0 50px;
		}
		
		.form-field>.row p{
			text-align: center;
		}
		.form-field>.row .col-md-12{
			text-align: left;
		}
		
		.form-field i.back{
			position: absolute;
			left:10px;
			top:10px;
			z-index: 2;
			display: none;
			font-size: 40px;
			color: orange;
		}
		.col-md-6 h1 {
			border-bottom:1px solid #ffffff;
			font-size: 20px;
			color :#9b9b9b;
		}

		.col-md-6 h2 {
			font-family: "MyriadPro";
			font-size: 16px;
			color :#9b9b9b;
		}

		form{
			padding:0px;
			margin: 0px;
		}
		.form-group input{
			height: 50px;
		}
		
		.btn-block{
			color: #ffff;
			background-color: #E17306;
			border-radius: 5px;
			box-shadow: none;
			border:0px;
			height: 50px;
		} 
		p.logo{
			margin-top: 15px;
			font-size: 24px;
			color: #444444;
			margin-bottom: 0px
		}
		p.text{
			font-size: 16px;
			color: #9B9B9B;
		}

		a{
			color:#E17306;
		}
		#segment{
			padding:10px 25px;
			color:#E17306;
		}
		#segment .col-md-12{
			height: 100px;
			padding: 20px 0px 20px 20px;
			margin: 10px 0px;
			text-align: left;
			border: solid 1px;
			border-color: #E17306;
			border-radius: 5px; 
		}
		#form_register .col-md-12:last-child,#segment .col-md-12:last-child{
			height: auto;
			padding-top: auto;
			margin-top: 25px;
			color: #9B9B9B;
			border:0px;
		}
		#segment .col-md-1{
			padding-left:0px;
		}
		#segment .col-md-10{
			padding-right: 0px;
		}
		#segment .col-md-10 h4{
			font-family: MyriadPro;
			font-size:20px;
			margin: 0px;
			padding-left:0px;
		}
		#segment .col-md-10 h5{
			font-size:12px;
			padding-left:0px;
			margin-top: 0px;
			color: #9B9B9B;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 form-field">
				<i class="material-icons back">replay</i>
				<img src="{{ asset('images/logo.png') }}">	
				<p class="logo">Welcome Partner</p>
				<p class="text">Sign into your account here</p>
				<div class="row" id="form_register">
					<form action="{{ url('/admin/login') }}" method="post">
					@csrf
						<div class="col-md-12" style="margin-top: 20px">
							<div class="form-group">
							    <label>Email address:</label>
							    <input type="text" class="form-control" name="email">
							</div>
						</div>
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="form-group">
							    <label>Password:</label>
							    <input type="password" class="form-control" name="password">
							</div>
						</div>
						<div class="col-md-12" style="font-size: 16px;text-align: right;">
							<h5><a href="#">Forgot password?</a></h5>
						</div>
						<div class="col-md-12">
							<button type="submit" class="btn-block">Sign In</button>
						</div>
						<div class="col-md-12">
							<p>Want to join? <a href="{{ url('/register') }}">Sign Up</a></p>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-8 visible-md visible-lg visible-xl">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1>We Help You To Connect</h1>
						<h2>Start listing your offers with us and connect with millions of travel enthusiasts.</h2>
						<h3>Get ready to grow your business</h3>
					</div>
				</div>
			</div>
		</div>
	</div>

 <script src="../../plugins/jquery/jquery.min.js"></script>
 <script src="../../plugins/bootstrap/js/bootstrap.js"></script>
 <script type="text/javascript">
 	$("#tour,#rent_car,#accomodation").mouseenter(function(){
 		$(this).css("background-color","#e1dcd6").css("cursor","pointer");
 	}).mouseleave(function(){
 		$(this).css("background-color","#ffff");
 	});
 	$("#tour").click(function(){
 		$('#segment').hide();
 		$('#form_register,.back').show();
 	});
 	$("#rent_car,#accomodation").click(function(){
 		window.location = $(this).attr("url");
   		return false;
 	});
 	$(".back").hover(function(){
 		$(this).css("cursor","pointer");
 	}).click(function(){
 		$('#segment').show();
 		$('#form_register,.back').hide();
 	});
 </script>
</body>
</html>