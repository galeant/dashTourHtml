<html>
<head>
	<title>Register</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../plugins/telformat/css/intlTelInput.css" rel="stylesheet">
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
			height: 100%;
			background:rgba(0, 0, 0,0.6);
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
			color: grey;
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
			background-color: #E17306;
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
			margin-bottom: 30px;
		}

		a{
			color:#E17306;
		}
		#segment{
			padding:10px 25px;
			color:#E17306;
		}
		#segment .col-md-12{
			min-height: 100px;
			padding: 15px ;
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


		.intl-tel-input{
			width: 100%;
		}

		.ta-center{
			text-align: center;
		}
		

	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 form-field" >
				<i class="material-icons back">keyboard_backspace</i>
				<img src="{{ asset('images/logo.png') }}">	
				<p class="logo">Sign Up as Pigijo Partner</p>
				<p class="text">Join as Partner and let us help you to connect</p>
				<div class="row" id="form_register" style="display: none">
					<div class="col-md-12" id="notif" style="padding: 20px;background-color: #F8F8F8;display: none">
					</div>
					<form action="{{ url('/register') }}" method="post">
					@csrf
						<div class="col-md-12">
							<div class="form-group">
							    <label for="email">PIC Email Address :</label>
							    <input type="email" class="form-control" name="email" placeholder="email@email.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" minlength="5">
							</div>
						</div>
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="form-group">
							    <label for="name">PIC Full Name :</label>
							    <input type="text" class="form-control" name="fullName" placeholder="eg. Robert Smith" required>
							</div>
						</div>
						<div class="col-md-12">
							<input type="hidden" name="format">	
							<div class="form-group">
								<label for="phone">PIC Phone Number :</label>
								<div class="row" style="margin: 0px">
									<div class="col-md-12" style="margin: 0px;padding: 0px">	
										<input type="tel" class="form-control" name="phone" placeholder="XXX - XXXX - XXXX" required>	
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							    <label for="company">Company/Business Name :</label>
							    <input type="text" class="form-control" name="companyName"  required>
							</div>
						</div>
						<div class="col-md-12" style-"margin-top:30px">
							<p><!-- <input type="checkbox" name="aggrement"> --> By registering, I agree with <a href="#"><u>Terms & Conditions</u></a> and <a href="#"><u>Privacy Policy</u></a> of Pigijo</p>
						</div>
						<div class="col-md-12">
							<button type="submit" class="btn-block submit">Sign Up</button>
						</div>
						<div class="col-md-12">
							<p>Already have an account? <b><a href="{{ url('/login')}}">Sign In</a></b></p>
						</div>
					</form>
				</div>
				<div class="row" id="segment">
					<div class="col-md-12" id="tour" style="padding: 23px 23px 23px 23px;">
						<div class="col-md-1 col-sm-12 ta-center">
                            <i class="material-icons">directions_bike</i>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <h4>I have activities to offer</h4>
                            <h5>I offer activities package suitbale for travellers who seek new experiences</h5>
                        </div>
					</div>
					<div class="col-md-12" id="rent_car" url="https://goo.gl/zmKgMr" style="padding: 23px 5px 5px 23px;">
						<div class="col-md-1 col-sm-12 ta-center" >
                            <i class="material-icons">directions_car</i>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <h4>I have car rental to offer</h4>
	                        <h5>I offer car rental services with very selection of vehicle</h5>
                        </div>
					</div>
					<div class="col-md-12" id="accomodation" url="https://goo.gl/zmKgMr" style="padding: 23px 23px 23px 23px;">
						<div class="col-md-1 col-sm-12 ta-center">
                            <i class="material-icons">hotel</i>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <h4>I have beds to offer</h4>
	                        <h5>I offer properties / accomodation that i would like to rent out</h5>
                        </div>
					</div>
					<div class="col-md-12">
						<p>Already have an account? <a href="{{ url('/login')}}">Sign In</a></p>
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
 <script src="../../plugins/telformat/js/intlTelInput.js"></script>
 <script src="../../plugins/mask-js/jquery.mask.min.js"></script>
 <script type="text/javascript">
	$(document).ready(function(){
		$("input[name='phone']").val("+62").intlTelInput({
			utilsScript: "build/js/utils.js",
			separateDialCode: true,
		});
		$("input[name='format']").val("+62");
		
		$(".country").click(function(){
			$("input[name='format']").val("+"+$(this).attr( "data-dial-code" ));
		});
		$("input[name='phone']").mask('000-0000-0000');
		$("input,select").attr("required","required");
		var stat = "{{session()->has('status')}}";
		var info = "{{session()->get('status')}}";
		console.log(stat);
		if(stat == 1){
			$("#form_register,#notif").show();
			$("#notif").append("<p>"+info+"</p>");
			$('#segment').hide();
		}
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
		// $("input[name='aggrement']:checkbox").change(function(){
		// 	if($(this).is(":checked" )){
		// 		$(".submit").css("background-color","#E17306").attr("type","submit");
		// 	}else{
		// 		$(".submit").css("background-color","#e1dcd6").attr("type","button");
		// 	}
		// });
	});
 </script>
</body>
</html>