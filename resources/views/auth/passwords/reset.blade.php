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
        .card{
            background-color:white;
            margin-top:43%;
            border-radius:5px;
        }
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row row-1">
			<div class="col-md-3 visible-md visible-lg visible-xl">
				<img src="{{ asset('images/logo-white.png') }}">	
			</div>
			<div class="container" style="">
    <div class="row justify-content-center" style="">
        <div class="col-md-6">
            <div class="card" style="">
                <div class="card-header logo" style="padding:20px 20px 20px 20px; font-size:24px;">Type Your New Password
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success text">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                    <form method="POST" action="{{ route('password.request') }}">
                        @csrf

                        <div class="form-group row" style="padding-left:20px; padding-right:20px;">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12">
								<input type="hidden" name="token" value="{{ $token }}">
								<input type="hidden" name="email" value="{{ $email }}">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" style="padding-left:20px; padding-right:20px;">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0" style="padding-left: 20px; padding-bottom:20px;">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="" style="border-radius: 5px;background-color:orange; color: white; border:none; padding:8px">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
	</div>

 <script src="../../plugins/jquery/jquery.min.js"></script>
 <script src="../../plugins/bootstrap/js/bootstrap.js"></script>
</body>
</html>



