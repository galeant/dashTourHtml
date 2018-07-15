<html>
<head>
	<title>Register</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
	<style>
		@font-face { 
	   		font-family:CenturyGothicRegular; 
	   		src: url('{{ asset("fonts/CenturyGothicRegular.ttf") }}'); 
		}
		@font-face { 
	   		font-family:MyriadPro; 
	   		src: url('{{ asset("fonts/MyriadPro-Regular.otf") }}'); 
		}
		body{
			font-family: CenturyGothicRegular;
		}
		button{
			outline:none;
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
			height: 40px;
		}
		
		.btn-block{
			color: #ffff;
			background-color: #e1dcd6;
			border-radius: 5px;
			box-shadow: none;
			border:0px;
			height: 40px;
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
	<div id="load" style="height: 100%;width: 100%;position: absolute;z-index: 9999;background-color: black;opacity: 0.6;text-align: center;display: none">
		<img src="{{ asset('images/ajax-loader.gif') }}" style="margin-top:25%">
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 form-field">
				<img src="{{ asset('images/logo.png') }}">	
				<p class="logo">Sign Up as Pigijo Partner</p>
				<p class="text">Join as Partner and let us help you to connect</p>
				<div class="row" id="success">
					<div class="alert alert-success" style="display: none"><strong>Email Resend</strong></div>
					<div class="col-md-12" style="padding: 20px;background-color: #F8F8F8">
						<p>We have sent a verification link to <b id="veri_email">{{ $email }}</b></p>
						<p>Please go to your inbox and click the link to verify and complete your registration.</p>
					</div>
					<div class="col-md-12" style="margin-top: 20px">
						<p>Haven't received the verification link?</p>
						<p><a id="resend" href="#">Resend Email</a></p>
					</div>
					<div class="col-md-12" style="margin-top: 50%">
						<p>Already have an account? <a href="{{ url('/login') }}">Sign In</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-8 visible-md visible-lg visible-xl">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<!-- <h1>We Help You To Connect</h1>
						<h2>Start listing your offers with us and connect with millions of travel enthusiasts.</h2>
						<h3>Get ready to grow your business</h3> -->
					</div>
				</div>
			</div>
		</div>
	</div>

 <script src="../../plugins/jquery/jquery.min.js"></script>
 <script src="../../plugins/bootstrap/js/bootstrap.js"></script>
 <script>
	var email = "{{ $email }}";
	console.log(email);
	$("#resend").click(function(){
		$.ajax({
			method: "GET",
			url: "{{ url('/resend') }}",
			data: { email : email}
		}).done(function(response){
			$(".alert-success").show();
		});	
	});
 </script>
</html>