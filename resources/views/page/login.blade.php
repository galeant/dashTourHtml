<html>
<head>
	<title>Login</title>
	<style>
		body {
		height: 100%;
		width: 100%;
		margin: 0;
		}

		.container {
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
		}

		.background-image {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: url('images/Page.png');
		background-size: cover;
		background-position: center center;
		font-family: sans-serif;
		z-index: -5;
		overflow: hidden;
		}

		.overlay {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: black;
		opacity: 0.5;
		}

		.title {
		margin-left: 250px;
		width:100%;
		text-align: center;
		position: absolute;
		}

		.title h1 {
		display: inline-block;
		border-bottom:1px solid #ffffff;
		font-family: "Century Gothic";  
		font-size: 20px;
		color :#9b9b9b;
		margin-top: 400px;
		}

		.title h2 {
		margin:0px;
		padding:0px;	
		font-family: "MyriadPro-Regular";
		font-size: 16px;
		color :#9b9b9b;
		font-weight:normal; 
		}

		.title h3 {
		font-family: "MyriadPro-Regular";
		font-size: 16px;
		color : #9b9b9b;
		margin-top: 0px;
		font-weight:normal;
		}
		.loginbox {
		width: 500px;
		height: 100%;
		background: #ffffff;
		}

		.logowrap {
		padding: 50px 203px;
		}
		.avatar {
		width: 93.1px;
		height: 50px;
		position: center;
		}
		.loginbox h1 {
		padding: 20px 140px 0px 140px;
		text-align: center;

		font-family: "Century Gothic";
		font-size: 20px;
		margin:0;	
		font-weight: normal;
		}
		h2 {
		
		text-align: center;
		font-size: 10px;
		font-family: "Century Gothic";
		color: #E1dcd6;
		margin:0;	
		
		}
			
		form{
			padding:10px 50px 0px 50px;
		box-sizing: border-box;
		}
		.loginbox input {
		padding: 15px;
		width: 100%;
		
		}

		.loginbox input[type='text'],
		input[type='password'] {
		border: 1px solid;
		border-radius: 5px;
		color: #E1dcd6;
		
		}
		.loginform p{
		font-family: "Century Gothic";
		font-size: 14;
		}
		.loginbox input[type='submit'] {
		border-radius: 5px;
		background: #e17306;
		font-family: "Century Gothic";
		color: #ffffff;
		border: 1px;
		
		}
		.p{
		font-family: "Century Gothic";
		}
		.loginbox a {
		text-decoration: none;
		font-size: 16px;
		font-family: "Century Gothic";
		color: #9b9b9b;
		width: 100%;
		display: block;
		text-align: right;
		margin: 16px 0;

		
		}
		form input{
		width:100%;
		}
		h3 {
			
		text-align: center;
		font-size: 13px;
		font-family: "Century Gothic";
		color: #9b9b9b;
		margin-top:180px;
		}
		h4 {
		text-align: center;
		font-size: 13px;
		font-family: "Century Gothic";
		color: orange;
		margin:0;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="background-image">
			<div class="overlay"></div>
			<div class="title">
				<h1>We Help You To Connect</h1>
				<h2>Start listing your offers with us and connect with millions of travel enthusiasts.</h2>
				<h3>Get ready to grow your business</h3>
			</div>
		</div>

		<div class="loginbox">
			<div class="logowrap">
				<img src="{{ asset('images/logo.png') }}" class="avatar">
			</div>
			<h1>Welcome Partner</h1>
			<h2>Sign into your account here</h2>
			<form class="loginform" action="/loginProcess" method="POST">
			@csrf
				<p>Email Address :</p>
				<input type="text" name="email" placeholder="Email..">
				<p>Password :</p>
				<input type="password" name="password" placeholder="Password..">

				<a href="#">Forgot password?</a>
				<input type="submit" name="" value="Sign in">

				<h3>Interested to Become a Partner</h3>
				<h4>Join Us Now</h4>
			</form>
		</div>
	</div>
</body>
</html>