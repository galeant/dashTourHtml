<html>
<head>
	<title>Set-Up</title>
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
			color: #9B9B9B;
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
		.row-1 .col-md-3:first-child{
			margin: 26px 0 0 50px;
		}
		.field{
			margin-top: 7%;
			padding: 30px 40px;
			background-color: #ffff;
			border-radius: 5px
		}
		.field .col-md-3:first-child{
			padding:0px;
			margin: 0px;
		}
		h2.logo{
			font-family: CenturyGothicRegular;
			font-size: 24px;
			color:#444444;
		}
		p.text{
			color:#444444;
		}
		.btn-block{
			color: #ffff;
			background-color: #E3730D;
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
			<div class="col-md-6 col-md-offset-3">
				<form id="password" action="{{ url('/register/activated') }}" method="post">
				@csrf
					<div class="row field">
						<div class="col-md-3 visible-sm visible-xs">
							<div class="logo">
								<img src="{{ asset('images/logo.png') }}">	
							</div>
						</div>
						<div class="col-md-12">
							<h2 class="logo">Set Up Your Login Password</h2>
							<p class="text">Minimum password length is 8 characters and password must contain number, uppercase and lowercase letter</p>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							    <p>Type Your New Password:</p>
							    <input type="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" class="form-control" name="password" minlength="8" required="">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							    <p>Confirm Password:</p>
							    <input type="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" class="form-control" name="confirmPassword" minlength="8" required="">
							    <small id="notif" style="color: red;display: none">Password Not Match</small>
							</div>
						</div>
						<div class="col-md-4">
							<button id="submit" type="button" class="btn-block">Save & Continue</button>
						</div>
					</div>
				</form>
			</div>
	</div>

 <script src="../../plugins/jquery/jquery.min.js"></script>
 <script src="../../plugins/bootstrap/js/bootstrap.js"></script>
 <script type="text/javascript">
 	$("#submit").click(function(){
 		var confirm = $("input[name='confirmPassword']").val();
 		var password = $("input[name='password']").val();
 		console.log(confirm);
 		console.log(password);
 		if(confirm != password){
 			$("#notif").show();
 			$(this).attr("type","button");
 		}else{
 			$("#notif").hide();
 			$(this).attr("type","submit");
 		}
 	});
 	
 </script>
</body>
</html>