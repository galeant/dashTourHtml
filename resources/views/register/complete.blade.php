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
			font-family: MyriadPro;
			font-size: 16px;	
			color: #444444;
		}
		button{
			outline:none;
		}
		.container-fluid{
			background-image: url("{{ asset('images/Page.png') }}");
			background-repeat:no-repeat;
			background-size: cover;
			background-attachment: fixed;
			height: 100%;
		}
		.row-1{
			background-color:rgba(22,19,20,0.6);
			height: 100%;
		}
		.row-1>.col-md-3:first-child{
			padding: 26px 0 0 50px;
		}
		.row-1>.col-md-3:last-child{
			padding: 50px 0 0 50px;
			text-align: center;
		}
		.row-1>.col-md-3:last-child p{
			font-size: 20px;
			color:#ffff;
		}
		.row-1 .col-md-6{
			margin-top: 12%;
		}
		.row-1 .col-md-6 p{
			margin:0px;
		}
		.field{
			padding: 20px;
			background-color: #ffff;
			border-radius: 5px;
			text-align: center;
		}
		.field i{
			font-size:100px;
		}
		.btn-block{
			color: #ffff;
			background-color: #E17306;
			border-radius: 5px;
			box-shadow: none;
			border:0px;
			height: 40px;
		} 
		
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row row-1">
			<div class="col-md-3 visible-md visible-lg visible-xl">
				<img src="{{ asset('images/logo-white.png') }}">
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="row field">
							<div class="col-md-3 visible-sm visible-xs" style="margin-bottom: 10px">
								<img src="{{ asset('images/logo.png') }}">	
							</div>
							<div class="col-md-12">
								<i class="material-icons">check_circle</i>
							</div>
							<div class="col-md-12">
								<h3>Registration Complete</h3>
							</div>
							<div class="col-md-12">
								<p>Thank you registering with us.</p>
								<p>You will be notified once we have done with the screening process.</p>
							</div>
							<!-- <div class="col-md-4 col-md-offset-4" style="margin-top: 10px">
								<a href="#"><button type="button" class="btn-block">Okay</button></a>
							</div> -->
							<div class="col-sm-12 col-xs-12 visible-sm visible-xs" style="margin-top: 10px">
								<a href="#"><button type="button" class="btn-block">Logout</button></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 visible-md visible-lg visible-xl">
				<a href="{{ url('/logout')}}"><p>Logout</p></a>
			</div>
		</div>
	</div>

 <script src="../../plugins/jquery/jquery.min.js"></script>
 <script src="../../plugins/bootstrap/js/bootstrap.js"></script>
</body>
</html>