<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
     <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../plugins/telformat/css/intlTelInput.css" rel="stylesheet">
    <!-- Bootstrap Select2 -->
    <link href="../../plugins/select2/select2.min.css" rel="stylesheet" />
    <!-- Dropzone Css -->
    <link href="../../plugins/bootstrap-file-input/css/fileinput.css" rel="stylesheet" media="all">
	<link href="../../plugins/bootstrap-file-input/themes/explorer-fa/theme.css" media="all" rel="stylesheet" type="text/css"/>
	<!-- Bootstrap Material Datetime Picker Css -->
	<link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
	<!-- Date range picker -->
    <link href="../../plugins/boostrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">		
	<!-- icon font awesome -->
	<!-- ORIGINAL -->
		<style>
			@font-face { 
				font-family:CenturyGothicRegular; 
				src: url("{{ asset('fonts/CenturyGothicRegular.ttf') }}"); 
			}
			@font-face { 
				font-family:MyriadPro; 
				src: url("{{ asset('fonts/MyriadPro-Regular.otf') }}"); 
			}
			body{
				/*font-family: MyriadPro;*/
				font-size: 16px;	
				/*color: #9B9B9B;*/
			}
			button{
				outline:none;
			}
			.container-fluid{
				background-image: url("{{ asset('images/Page.png') }}");
				background-repeat:no-repeat;
				background-size: cover;
				background-attachment: fixed;
				height: auto;
			}
			.row-1{
				background-color:rgba(22,19,20,0.6);
				height: auto;
			}
			.row-1>.col-md-2:first-child{
				padding: 26px 0 0 50px;
			}
			.row-1>.col-md-2:last-child{
				padding: 40px 0 0 0 ;
				text-align: center;
			}
			.row-1>.col-md-2:last-child p{
				font-size: 17px;
				color:#ffff;
			}
			.row-1 .col-md-8{
				margin-top: 8%;
			}
			.field{
				padding: 20px;
				background-color: #ffff;
				border-radius: 5px
			}
			.field .header,.note{
				margin-bottom: 0px;
			}
			.field .note:last-child{
				margin-bottom: 10px;
			}
			.field .col-md-12 p{
				margin-bottom: 0px; 
			}
			.field h3{
				font-size: 29px;
				font-family: CenturyGothicRegular;
				color: #444444;
			}
			.field h4{
				font-size: 18px;
				font-family: MyriadPro;
				color: #444444;
				border-bottom:solid 1px;
				padding-bottom: 10px;
				margin-left:15px;
				margin-right:15px;
			}
			.field h5{
				font-size: 16px;
				font-family: MyriadPro;
				color: #444444;
				margin-bottom: 0px;
			}
			.btn-block{
				color: #ffff;
				background-color: #E17306;
				border-radius: 5px;
				box-shadow: none;
				border:0px;
				height: 40px;
			} 
			.mobile{
				text-align: center;
				padding: 0px;
			}
			.file-preview{
				height: auto;
			}
			.file-drop-zone{
				height: auto;
			}
			.krajee-default.file-preview-frame{
				width: 130px;
				height: auto;
			}
			.krajee-default.file-preview-frame .kv-file-content{
				width: auto;
				height: auto;
			}
			.krajee-default .file-caption-info, .modal .modal-header .modal-title{
				display: none;
			}
			.steps{
				padding: 0 ;
				background-color: #e1dcd6;
				text-align: center;
			}
			.steps .col-md-2.step-1{
				background-color: orange;
				border-bottom: solid #00e600 5px;
			}
			section.step-2,section.step-3,section.step-4,section.step-5,section.step-6{
				display: none;
			}
			section.step-2 p,section.step-3 p,section.step-4 p{
				margin-top: 8px;
			}
			.intl-tel-input{
				width: 100%;
			}
			.error{
				color:red;
				font-size:12px;
			}
			.material-icons{
  				line-height:15px;
			}
			section.step-3 .row,
			section.step-4 .row,
			section.step-5 .row{
				margin:0px;
			}
			section.step-6 h5{
				margin-left: 20px;
			}
			button#button-step-finish{
				background-color: #e1dcd6;
			}
		</style>
	<!-- MAP -->
		<style>
		#map {
			height: 100%;
		}
		html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		}
		.controls {
			margin-top: 10px;
			border: 1px solid transparent;
			border-radius: 2px 0 0 2px;
			box-sizing: border-box;
			-moz-box-sizing: border-box;
			height: 32px;
			outline: none;
			position: relative;
			box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
		}

		#pac-input {
			background-color: #fff;
			font-family: MyriadPro;
			font-size: 15px;
			font-weight: 300;
			padding: 10px 11px 10px 13px;
			text-overflow: ellipsis;
			margin-top:10px;
		}

		#pac-input:focus {
			border-color: #4d90fe;
		}

		.pac-container {
			background-color: #FFF;
			z-index: 20;
			position: fixed;
			display: inline-block;
			}
			.modal{
				z-index: 20;   
			}
			.modal-backdrop{
				z-index: 10;        
			}​
		#type-selector {
			color: #fff;
			background-color: #4d90fe;
			padding: 5px 11px 0px 11px;
		}

		#type-selector label {
			font-family: Roboto;
			font-size: 13px;
			font-weight: 300;
		}
		section.step-2 p,section.step-3 p,section.step-4 p{
			margin-top: 8px;
        }
        .intl-tel-input{
            width: 100%;
        }
        .error{
            color:red;
            font-size:12px;
        }

		.button-rg-top{
			background-color:transparent;
			color: white;
			border: none;
		}

		.button-rg-top:hover{
			opacity:0.6;
		}
        
		.mg-right-10px{
			margin-right:10px;
		}
		</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row row-1">
			<div class="col-md-2 visible-md visible-lg visible-xl">
				<img src="{{ asset('images/logo-white.png') }}">
			</div>
			<div class="col-md-7">
			</div>

	  		<div class="col-md-3" style="text-align:right;">
	  			<div class="" style="display:flex;margin-left:100px;">
						<div class="visible-md visible-lg" style="margin-top: 30px">
							<button type="button" class="button-rg-top"><a href="#" id="draft" style="text-decoration:none; color:white; background-color:transparent;">Save As Draft</a></button>
				 		</div>
						<div class="visible-md visible-lg" style="margin-top: 30px">
						<a href="{{url('/logout')}}" style="text-decoration:none; color:white;"><button type="button" class="button-rg-top">Logout</button></a>
						</div>
					</div>
				</div>
	  		
			<div class="col-md-8">
				<form id="wizard_with_validation" action="{{ url('/register/profile') }}" method="post" enctype="multipart/form-data" autocomplete="off">
				@csrf
					<div class="row field">
					<!-- HEADER FORM -->
						<div class="row">
							<div class="col-md-3 visible-sm visible-xs mobile">
								<img src="{{ asset('images/logo.png') }}" />	
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12" id="header-form-1" style="padding-left:30px; padding-right:15px;">
								<h3 style="line-height:1.5em;">Hello, {{ $data->fullName}}!</h3>
								<h5 style="line-height:1.5em;text-align:justify;text-justify:inter-word;padding-right:15px;">Before you start, let's complete these mandatory information first. Once completed, you will be asked to submit a product sample. After that, please wait for further notification from us. We will have to review your information first before we can activate your access</h5>
								<h5 style="line-height:1.5em;">We hate paperwork too, so we'll keep it short.</h5>
							</div>
							<div class="col-md-12" id="header-form-2" style="margin-bottom: 10px;display: none">
								<h3 style="line-height:1.5em; margin-left:15px;">Submit Product Sample</h3>
								<h5 style="line-height:1.5em; margin-left:15px;"><b>Important:</b></h5>
								<h5 style="line-height:1.5em; margin-left:15px;">As part of our business policy, we require you to submit one product of yours for our perusal before we can activate your account.</h5>
								<h5 style="line-height:1.5em; margin-left:15px;">You may complete this form right away or save it as draft to complete it later.</h5>
							</div>
					<!-- CONTENT -->
						<!-- COMPANY -->
							<section class="step-1" >
								<div class="col-md-12" style="margin-top: 20px;">
								<h4>Personal Information</h4>
								<div class="col-md-10" style="margin-top:0px;">
									<div class="row">
										<div class="col-md-6" style="margin-top:0px;">
											<div class="valid-info">
												<h5>Full Name* :</h5>
												<input type="text" class="form-control" name="fullName" value="{{$data->fullName}}" required>
											</div>
										</div>
										<div class="col-md-6" style="margin-top:0px;">
											<div class="valid-info">
												<h5>Email:</h5>
												<input type="text" class="form-control" name="email" value="{{$data->email}}" readonly="">
											</div>
										</div>
										<div class="col-md-6" style="margin-top: 10px;">
											<div class="valid-info">
												<h5>Phone Number* :</h5>
												<input type="hidden" class="form-control" name="format">
												<input type="tel" class="form-control" name="phone" value="{{$data->phone}}" required>
											</div>
										</div>
										<div class="col-md-6" style="margin-top: 10px;">
											<div class="valid-info">
												<h5>What is your role?* :</h5>
												<select class="form-control" name="role" required>
													<option>Business Owner</option>
													<option>Staff</option>
													<option>Aggregator</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12" style="margin-top:30px;">
									<div class="row">
										<h4>Company / Business Information</h4>
										<div class="col-md-10 mg-top-10px" style="margin-top:0px;">
											<div class="valid-info">
												<h5>Company / Business Name*:</h5>
												<input type="text" class="form-control" name="companyName" value="{{$data->company->companyName}}" required>
											</div>
										</div>
										<div class="row" style="margin:0px">
											<div class="col-md-5" style="margin-top:10px;">
												<div class="valid-info">
													<h5>Company Phone Number*:</h5>
													<div class="row" style="margin: 0px">
														<div class="col-md-9" style="margin: 0px;padding: 0px;width:100%">
															<input type="hidden" class="form-control" name="formatCompany">	
															<input type="tel" class="form-control" name="companyPhone" value="{{$data->company->companyPhone}}" required>	
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-5" style="margin-top:10px;">
												<div class="valid-info">
													<h5>Company Email Address:</h5>
													<input type="email" class="form-control" name="companyEmail" value="{{$data->company->companyEmail}}">
												</div>
											</div>
										</div>
										<div class="col-md-5" style="margin-top:10px">
											<div class="valid-info">
												<h5>Province*:</h5>
												<select class="form-control" name="companyProvince" required>
													<option value="" selected>-- Select Province --</option>
													@foreach($provinces as $province)
														<option value="{{$province->id}}">{{$province->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-md-5" style="margin-top: 10px;">
											<div class="valid-info">
												<h5>City / Regency*:</h5>
												<select class="form-control" name="companyCity" required>
													<option value="" selected>-- Select City --</option>
												</select>
											</div>
										</div>
										<div class="col-md-10" style="margin-top:10px">
											<div class="valid-info">
												<h5>Address*:</h5>
												<textarea rows="5" name="companyAddress" class="form-control no-resize" placeholder="" required></textarea>
											</div>
										</div>
										<div class="col-md-10" style="margin-top:10px;">
											<div class="valid-info">
												<h5>Postal Code*:</h5>
												<input type="text" class="form-control" name="companyPostal" required>
											</div>
										</div>
										<div class="col-md-10" style="margin-top:10px;">
											<div class="valid-info">
												<h5>Website Link:</h5>
												<input type="url" class="form-control" name="companyWeb" placeholder="http://" >
											</div>
										</div>
										<div class="col-md-10" style="margin-top: 10px;">
											<div class="row valid-info">
												<div class="col-md-12">
													<h5>Do you have existing booking system?</h5>
                                                </div>
                                                <div class="col-md-2">
													<input name="bookingSystem" type="radio" id="1bo" class="radio-col-deep-orange" value="1" required />
													<label for="1bo">Yes</label>
                                                </div>
                                                <div class="col-md-2">
													<input name="bookingSystem" type="radio" id="2bo" class="radio-col-deep-orange" value="2" checked/>
													<label for="2bo">No</label>
                                                </div>
											</div>
										</div>
										<div class="col-md-10" id="booking_system_name" style="display: none">
											<div class="valid-info">
												<h5>Booking system name:</h5>
												<input type="text" class="form-control" name="bookingSystemName" placeholder="Let it empty if you dont have one">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12" style="margin-top:20px;">
									<div class="row">
										<h4>Payment Data</h4>
										<div class="col-md-3">
											<div class="valid-info">
												<h5>Bank Name*:</h5>
												<select class="form-control" name="bankName" required>
													<option>BRI</option>
													<option>BCA</option>
													<option>BNI</option>
													<option>Mandiri</option>
													<option>CIMB</option>
												</select>
											</div>
										</div>
										<div class="col-md-7" style="">
											<div class="valid-info">
												<h5>Bank Account Number*:</h5>
												<input type="text" class="form-control" name="bankAccountNumb" required>
											</div>
										</div>
										<div class="row" style="margin:0px">
											<div class="col-md-3 col-sm-3 col-xs-5 valid-info">
												<h5>Title*:</h5>
												<select class="form-control" name="bankAccountHolderTitle" required>
													<option>Mr</option>
													<option>Mrs</option>
													<option>Miss</option>
												</select>
											</div>
											<div class="col-md-7 col-sm-7 col-xs-12">
												<div class="valid-info">
													<h5>Account Holder Name*:</h5>
													<input type="text" class="form-control" name="bankAccountHolderName" pattern="^[A-Za-z -]+$" required>
												</div>
											</div>
										</div>
										<div class="col-md-10" style="margin-top: 10px;">
                                            <p>Bank Account Proof Upload:</p>
                                            <ul>
                                                <li>Provide your proof of your bank account number by uploading the scan / picture of the first page of your saving book or your e-banking</li>
                                                <li>Bank account holder name must be the same with the company's owner name</li>
                                            </ul>
                                            <div class="col-md-12 valid-info" id="input">
                                                <input id="file-1" type="file" name="bankPic">	
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12" style="margin-top:20px;">
									<div class="row">
										<h4>Upload Document</h4>
										<div class="row valid-info" style="padding-left:15px; padding-right:15px;">
											<div class="col-md-12">
												<p>What is your business ownership type?</p>
											</div>
											<div class="col-md-3">
												<input name="onwershipType" type="radio" id="1o" class="radio-col-deep-orange" value="Company" required/>
												<label for="1o">Corporate</label>
											</div>
											<div class="col-md-3">
												<input name="onwershipType" type="radio" id="2o" class="radio-col-deep-orange" value="Personal" required checked/>
												<label for="2o">Personal</label>
											</div>
										</div>
										<h5 style="padding-left:15px; padding-right:15px;">Please upload softcopy of documents listed below or <b>you can skip and provide it later</b>.</h5>
										<h5 style="padding-left:15px; padding-right:15px;">Accepted document format: PDF/JPG/JPEG/PNG. Maximum size is 5 MB per file</h5>
										<div class="col-md-12" id="akta" style="margin-top: 10px;display: none; margin-left:15px; margin-right:15px;" >
											<div class="row">
												<div class="col-md-4">
													<li>Company Article of Association</li>
													<p style="margin-left: 21px;">Akta Pendirian Usaha</p>		
												</div>
												<div class="col-md-6" id="input" style="">
													<input id="file-2" type="file" name="aktaPic" />		
												</div>
											</div>
										</div>
										<div class="col-md-12" id="siup" style="display: none;margin:10px 15px 0px 15px;">
											<div class="row">
												<div class="col-md-4">
													<li>SIUP/TDP</li>
													<p style="margin-left: 21px;">Surat Izin Usaha Perdagangan/Tanda Daftar Perusahaan</p>
												</div>
												<div class="col-md-6" id="input" style="">
													<input id="file-3" type="file" name="SIUPPic" />
												</div>
											</div>
										</div>
										<div class="col-md-12" id="npwp" style="margin:10px 15px 0px 15px;">
											<div class="row">
												<div class="col-md-4">
													<li id="npwp">Tax Number</li>
													<p style="margin-left:22px;" id="npwp">NPWP</p>
												</div>
												<div class="col-md-6" id="input" style="">
													<input id="file-4" type="file" name="NPWPPic" />
												</div>
											</div>
										</div>
										<div class="col-md-12" id="ktp" style="margin:10px 15px 0px 15px;">
											<div class="row">
												<div class="col-md-4">
													<li id="ktp">Identity Card</li>
													<p style="margin-left:21px;" id="ktp">KTP</p>
												</div>
												<div class="col-md-6" id="input" style="">
													<input id="file-5" type="file" name="KTPPic">
												</div>
												
											</div>
										</div>
										<div class="col-md-12" id="evi" style="display: none; margin:10px 15px 0px 15px;">
											<div class="row">
												<div class="col-md-4">
													<li>Evidence you have a product</li>
													<p style="margin-left: 21px;">Contoh product/info product</p>
												</div>
												<div class="col-md-6" id="input" style="">
													<input id="file-6" type="file" name="evidancePic" >
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-md-offset-8" style="margin-top: 30px">
									<button type="button" class="btn-block" id="button-step-2">Next</button>
								</div>
							</section>
						<!-- GENERAL -->
							<section class="step-2"> 
								<div class="col-md-12" style="margin-top: 20px;">
									<h4>Product Information</h4>
									<div class="row" style="margin: 0px 3px 0px 3px;">
										<div class="col-md-3 valid-info" >
											<h5>Product Category*:</h5>
											<select name="productCategory" class="form-control show-tick">
												<option>Activity</option>
											</select>
										</div>
										<div class="col-md-3 valid-info">
											<h5>Type*:</h5>
											<select name="productType" id="productType" class="form-control show-tick">
												<option>Open Group</option>
												<option selected>Private Trip</option>
											</select>
										</div>
										<div class="col-md-6" style="" id="productTypeOpen" hidden>
											<h5><b><u>Open Group</u></b><br></h5>
											<small>Within a single commencing schedule, customers will be grouped into one group.</small>
										</div>
										<div class="col-md-6" style="padding:5px" id="productTypePrivate" >
											<h5><b><u>Private Trip</u></b><br></h5>
											<small>Within a single commencing schedule, customers can book for their own private group. They won't be grouped with another customers.</small>
										</div>
									</div>
									<div class="row" style="margin: 0px 3px 0px 3px;">
										<div class="col-md-6 valid-info">
											<h5>Product Name*:</h5>
											<input type="hidden" name="productCode" value="Pigijo-1"/>
											<input type="text" class="form-control" name="productName" required />
										</div>
									</div>
									<div class="row" style="margin: 0px 3px 0px 3px;">
										<div class="col-md-3 valid-info">
											<h5>Minimum Person*:</h5>
											<input type="text" class="form-control" name="minPerson" required />
										</div>
										<div class="col-md-3 valid-info">
											<h5>Maximum Person*:</h5>
											<input type="text" class="form-control" name="maxPerson" required />    
										</div>
									</div>
									<div class="row" style="margin: 0px 3px 0px 3px;">
										<div class="col-md-6 valid-info">
											<h5>Starting Point/Gathering Point(where should your costumer meet you)?*:</h5>
											<input type="text" id="pac-input" class="form-control" name="meetingPoint" placeholder="Start typing an address" required />
											<input type="hidden" id="geo-lat" class="form-control" name="meetingPointLatitude" />    
											<input type="hidden" id="geo-long" class="form-control" name="meetingPointLongitude" />   
										</div>
									</div>
									<div class="row" style="margin: 0px 3px 0px 3px;">
										<div class="col-md-6 valid-info">
											<h5>Meeting Point Notes:</h5>
											<textarea rows="4" name="meetingPointNotes" class="form-control no-resize"></textarea>
										</div>
									</div>
									<div class="row" style="margin: 0px 3px 0px 3px;">
										<div class="col-md-6 valid-info">
											<h5>PIC Name*:</h5>
											<input type="text" class="form-control" name="PICName" required>
										</div>
									</div>
									<div class="row" style="margin: 0px 3px 0px 3px;">
										<div class="col-md-6 valid-info">
											<h5>PIC Phone*:</h5>
											<input type="hidden" class="form-control" name="formatPIC">	
											<input type="tel" class="form-control" name="PICPhone" required>	
										</div>
									</div>
									<div class="row" style="margin: 0px 3px 0px 3px;">
										<div class="col-md-6 valid-info">
											<h5>Terms & Condition*:</h5>
											<textarea rows="4" name="termCondition" class="form-control no-resize" required></textarea>
										</div>
									</div>
								</div>
								<!-- SCHEDULE -->
								<div class="col-md-12" style="margin: 0px 3px 0px 3px;">
									<h4 style="margin-top: 40px;">Duration & Schedule:</h4>
									<div class="row valid-info" style="margin: 0px 3px 0px 3px;">
										<div class="col-md-12">
											<h5>How long is the duration of your tour/activity ?:</h5>
										</div>
										<div class="col-md-3" style="margin: 5px 3px 0px 3px;">
											<input name="scheduleType" type="radio" id="1d" class="radio-col-deep-orange" value="1" sel="1" required checked/>
											<label for="1d">Multiple days</label>
										</div>
										<div class="col-md-3" style="margin: 5px 3px 0px 3px;">
											<input name="scheduleType" type="radio" id="2d" class="radio-col-deep-orange" value="2" sel="2" />
											<label for="2d">A couple of hours</label>
										</div>
										<div class="col-md-3" style="margin: 5px 3px 0px 3px;">
											<input name="scheduleType" type="radio" id="3d" class="radio-col-deep-orange" value="3" sel="3" />
											<label for="3d">One day full</label>
										</div>
									</div>
									<div class="row valid-info" style="margin: 0px 3px 0px 3px;">
										<div class="scheduleDays">
											<div class="col-md-2 valid-info">
												<h5>Day?* :</h5>
												<select class="form-control" name="day" required>
													<option values="">-- Days --</option>
													@for($i=1;$i<24;$i++)
													<option values="{{$i}}">{{$i}}</option>
													@endfor
												</select>
											</div>
										</div>
										<div class="scheduleHours" hidden>
											<div class="col-md-2 valid-info">
												<h5>Hours?* :</h5>
												<select class="form-control" name="hours" required>
													<option values="">-- Minutes --</option>
													@for($i=1;$i<12;$i++)
													<option values="{{$i}}">{{$i}}</option>
													@endfor
												</select>
											</div>
											<div class="col-md-2 valid-info">
												<h5>Minutes?* :</h5>
												<select class="form-control" name="minutes" required>
													<option values="">-- Hours --</option>
													@for($i=1;$i<60;$i++)
													<option values="{{$i}}">{{$i}}</option>
													@endfor
												</select>
											</div>
										</div>
									</div>
									<div id="schedule_body">
										<div class="row" id="dinamic_schedule" style="margin: 0px 3px 0px 3px;">
											<div class="col-md-3 valid-info" id="scheduleCol1">
												<h5>Start date*</h5>
												<input type="text" id="scheduleField1" class="form-control" name="schedule[0][startDate]" placeholder="DD-MM-YYYY" required/>
											</div>
											<div class="col-md-3 valid-info" id="scheduleCol2">
												<h5>End date*</h5>
												<input type="text" id="scheduleField2" class="form-control" name="schedule[0][endDate]" placeholder="DD-MM-YYYY" required readonly/>
											</div>
											<div class="col-md-2 valid-info" id="scheduleCol3" style="display: none">
												<h5>Start hours *</h5>
												<input type="text" id="scheduleField3" class="form-control" name="schedule[0][startHours]" placeholder="HH:mm:ss" required/>
											</div>
											<div class="col-md-2 valid-info" id="scheduleCol4" style="display: none">
												<h5>End hours*</h5>
												<input type="text" id="scheduleField4" class="form-control" name="schedule[0][endHours]" placeholder="HH:mm:ss" required readonly/>
											</div>
											<div class="col-md-3 valid-info" id="scheduleCol5">
												<h5>Max.Booking Date*</h5>
												<input type="text" id="scheduleField5" class="form-control" name="schedule[0][maxBookingDate]" placeholder="DD-MM-YYYY" disabled required/>
											</div>
											<div class="col-md-2 valid-info" id="scheduleCol6">
												<h5>Max.Booking*</h5>
												<input type="text" id="scheduleField6" class="form-control" name="schedule[0][maximumGroup]" required/>
											</div>
											<div class="col-md-1" style="padding-top:25px "></div>
										</div>
										<div id="clone_dinamic_schedule"></div>
										<div class="row" style="margin: 20px 3px 0px 3px;">
											<div class="col-md-3">
												<button type="button" class="btn btn-warning"  id="add_more_schedule" style="outline:none;">
													<i class="fa fa-plus"></i>
													&nbsp;Add Schedule
												</button>
											</div>
										</div>
									</div>
								</div>
								<!-- DESTINATION -->
								<div class="col-md-12">
									<h4 style="margin-top:40px;">Tour / Activity Location</h4>
									<div class="row" style="margin: 0px 3px 0px 3px;">
										<div class="col-md-12">
											<h5>List down all destination related to your tour package / activity.</h5>
											<h5>The more accurate you list down the destinations, better your product's peformance in search result.</h5>
										</div>
									</div>
									<div class="row" id="dinamic_destination" style="margin: 0px 3px 0px 3px;">
										<div class="col-md-3 valid-info">
											<h5>Province*</h5>
											<select id="destinationField1" class="form-control" name="place[0][province]" style="width: 100%" required>
												<option value="" selected>-- Select Province --</option>
											</select>
										</div>
										<div class="col-md-3 valid-info">
											<h5>City*</h5>
											<select id="destinationField2" class="form-control" name="place[0][city]" style="width: 100%" required>
												<option value="" selected>-- Select City --</option>
											</select>
										</div>
										<div class="col-md-4 valid-info">
											<h5>Destination</h5>
											<select id="destinationField3" class="form-control" name="place[0][destination]" style="width: 100%">
												<option value="" selected>-- Select Destination --</option>
											</select>
											<b style="font-size:10px">Leave empty if you can't find the destination</b>
										</div>
										<div class="col-md-1" style="padding-top:25px "></div>
									</div>
									<div id="clone_dinamic_destination"></div>
										<div class="row" style="margin: 0px 3px 0px 3px;">
											<div class="col-md-3">
											<button type="button" class="btn btn-warning waves-effect" id="add_more_destination" style="outline:none;">
												<i class="fa fa-plus"></i>
												Add Destination
											</button>
										</div>
									</div>
								</div>
								<div class="col-md-4" style="margin-top: 30px">
									<button type="button" class="btn-block" id="button-step-1">Back</button>
								</div>
								<div class="col-md-4 col-md-offset-4" style="margin-top: 30px">
									<button type="button" class="btn-block" id="button-step-3">Next</button>
								</div>
							</section>			
						<!-- ACIVITY -->
							<section class="step-3" >
								<div class="col-md-12">
									<h4>Activity Tag</h4>
									<div class="row" style="margin-left:0px;">
										<div class="col-md-6 valid-info">
											<h5>How would you describe the activities in this product?</h5>
											<select class="form-control" name="activityTag[]" multiple="multiple" style="width: 100%" required></select>
										</div>
									</div>
								</div>
								<div class="col-md-12" style="margin-top:30px;">
									<h4>Itineraty Detail</h4>
									<!-- Itinerary origin -->
									<div id="itinerary_list" style="margin-left:15px;">
										<h5></h5>
										<input id="field_itinerary_input1" type="hidden" />
										<div class="row" id="itinerary_row">
											<div class="col-md-2 valid-info" id="field_itinerary1">
												<h5>Start time*</h5>
												<input id="field_itinerary_input2" type="text" class="form-control" placeholder="HH:mm" required />
											</div>
											<div class="col-md-2 valid-info" id="field_itinerary2">
												<h5>End time*</h5>
												<input id="field_itinerary_input3" type="text" class="form-control" placeholder="HH:mm" required />
											</div>
											<div class="col-md-6 valid-info" id="field_itinerary7">
												<h5>Description*</h5>
												<textarea id="field_itinerary_input7" rows="6" class="form-control" required></textarea>
											</div>
											<div class="col-md-1" style="padding-top:35px"></div>
										</div>
										<div id="clone_dinamic_itinerary"></div> 
									</div>
									<!-- END -->
									<!-- Itinerary Clone-->
									<div id="itineraryGenerate" style="margin-left:15px;"></div>
									<!-- END -->
								</div>
								<div class="col-md-4" style="margin-top: 30px">
									<button type="button" class="btn-block" id="button-step-2">Back</button>
									<button type="button" class="btn-block" id="button-step-2-holow">Back</button>
								</div>
								<div class="col-md-4 col-md-offset-4" style="margin-top: 30px">
									<button type="button" class="btn-block" id="button-step-4">Next</button>
								</div>
							</section>
						<!-- PRICE -->
							<section class="step-4" >
								<div class="col-md-12" style="margin-top: 20px;">
									<h4>Pricing Details</h4>
									<div class="row valid-info" style="">
										<div class="col-md-4" style="margin-left:0px;">
											<input name="priceKurs" type="radio" id="1p" class="radio-col-deep-orange" value="1" checked required/>
											<label for="1p" style="font-size:15px">I only have pricing in IDR</label>
										</div>
										<div class="col-md-6" style="margin-left:0px;">
											<input name="priceKurs" type="radio" id="2p" class="radio-col-deep-orange" value="2" />
											<label for="2p" style="font-size:15px">I want to add pricing in USD for international tourist</label>
										</div>
									</div>
									<div class="" id="price_row" style="margin-left:0px;">
										<div class="col-md-3 valid-info">
											<h5>Pricing Option :</h5>
											<select name="priceType" id="price_type" class="form-control" required>
												<option value="1">Fixed Price</option>
												<option value="2">Based on Number of Person</option>
											</select>
										</div>
										<div id="price_fix">
											<div class="col-md-3 valid-info" id="price_idr">
												<h5>Price / person (IDR)*:</h5>
												<input type="hidden" name="price[0][people]" value="fixed"> 
												<input type="text" id="idr" name="price[0][IDR]" class="form-control" required />     
											</div>
											<div class="col-md-3 valid-info" id="price_usd" style="display: none">
												<h5>Price / person (USD)*:</h5>
												<input type="text" id="usd" name="price[0][USD]" class="form-control" required />     
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12" id="price_table_container" style="display: none;">
									<h4>Pricing Tables</h4>
									<div class="row" style="margin-left:10px; margin-right: 10px;">
										<div class="col-md-12" id="price_list" style="display: none">
											<div class="row">
												<div class="col-md-1" style="padding: 20px 0px 0px 0px;">
													<h5><i class="material-icons">person</i></h5>
												</div>
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-6 valid-info" id="price_idr">
															<h5>Price / person (IDR)*:</h5>
															<input id="price_list_field1" type="hidden" required>  
															<input id="price_list_field2" type="text" class="form-control" required>     
														</div>
														<div class="col-md-6 valid-info" id="price_usd" style="display: none">
															<h5>Price / person (USD)*:</h5>
															<input id="price_list_field3" type="text" class="form-control" required />     
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="price_list_container">
											<div class"row">
												<div class="col-md-6" id="price_list_container_left"></div>
												<div class="col-md-6" id="price_list_container_right"></div>
											</div>
										</div> 
									</div>
								</div>
								<div class="col-md-12" style="margin-top: 30px;">
									<h4>Price Includes</h4>
									<div class="row"style="margin-left: 0px;">
										<div class="col-md-12 valid-info">
											<h5>What's already included with pricing you have set?What will you provide?</h5>
											<h5 style="font-size: 18px">Example: Meal 3 times a day, mineral water, driver as tour guide.</h5>
										</div>
										<div class="col-md-6 valid-info" style="margin-top:10px;">
											<select type="text" class="form-control" name="priceIncludes[]" multiple="multiple" style="width: 100%; margin-bottom: 10px;" required></select>
										</div>									
										<div class="col-md-6" style="padding-top:0px;">
											<h5>Type a paragraph and press Enter.</h5>
										</div>
									</div>
								</div>
								<div class="col-md-12" style="margin-top: 30px;">
									<h4>Price Excludes</h4>
									<div class="row" style="margin-left:0px;">
										<div class="col-md-12 valid-info">
											<h5>What's not included with pricing you have set?Any extra cost the costumer should be awere of?</h5>
											<h5 style="font-size: 18px">Example: Entrance fee IDR 200,000, bicycle rental, etc</h5>
										</div>

										<div class="col-md-6">
											<select class="form-control" name="priceExcludes[]" multiple="multiple" style="width: 100%" required></select>
										</div>

										<div class="col-md-6" style="">
											<h5>Type a paragraph and press Enter.</h5>
										</div>
									</div>
								</div>
								<div class="col-md-12" style="margin-top: 30px;">
									<h4>Cancellation Policy</h4>
									<div class="row valid-info" style="margin-left:0px;">
										<div class="col-md-3">
											<input name="cancellationType" type="radio" id="1c" class="radio-col-deep-orange" value="1" checked required/>
											<label for="1c">No cancellation</label>
										</div>
										<div class="col-md-3">
											<input name="cancellationType" type="radio" id="2c" class="radio-col-deep-orange" value="2" />
											<label for="2c">Free cancellation</label>
										</div>
										<div class="col-md-4">
											<input name="cancellationType" type="radio" id="3c" class="radio-col-deep-orange" value="3" />
											<label for="3c">Cancellation policy applies</label>
										</div>
									</div>
									<div class="row" id="cancel_policy" style="display: none;margin:0px">
										<h5>How is your cancellation policy?</h5>
										<div class="row" style="font-size: 14px;margin:0px">
											<div class="col-md-2" style="margin:5px;padding:0px;width:auto">
												<h5>Cancellation less than</h5>
											</div>
											<div class="col-md-1 valid-info" style="margin:5px;padding:0px">
												<input type="text" name="minCancellationDay" class="form-control" required>
											</div>
											<div class="col-md-2" style="margin:5px;padding:0px;width:auto">
												<h5>days from schedule, cancellation fee is</h5>
											</div>
											<div class="col-md-1 valid-info" style="margin:5px;padding:0px">
												<input type="text" name="cancellationFee" class="form-control" required>
											</div>
											<div class="col-md-2" style="margin:5px;padding:0px;width:auto">
												<h5>percent(%).</h5>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4" style="margin-top: 30px">
									<button type="button" class="btn-block" id="button-step-3">Back</button>
									<button type="button" class="btn-block" id="button-step-3-holow" style="background-color:#E17306;border:none">Back</button>
								</div>
								<div class="col-md-4 col-md-offset-4" style="margin-top: 30px">
									<button type="button" class="btn-block" id="button-step-5">Next</button>
								</div>
							</section>
						<!-- FILE -->
							<section class="step-5" >
								<div class="col-md-12 valid-info">
									<h4><i class="material-icons">perm_media</i> Destination Photo</h4>
									<input id="file-i1" type="file" name="image_destination[]" accept=".jpg,.gif,.png,.jpeg" multiple required style="margin-left: 15px;margin-right: 15px;">
								</div>
								<div class="col-md-12 valid-info" style="margin-top:30px">
									<h4><i class="material-icons">perm_media</i> Activities Photo</h4>
									<input id="file-i2" type="file" name="image_activities[]" accept=".jpg,.gif,.png,.jpeg" multiple>    
								</div>
								<div class="col-md-12 valid-info" style="margin-top:30px">
									<h4><i class="material-icons">perm_media</i> Accommodation Photo</h4>
									<input id="file-i3" type="file" name="image_accommodation[]"accept=".jpg,.gif,.png,.jpeg" multiple>
								</div>
								<div class="col-md-12 valid-info" style="margin-top:30px">
									<h4><i class="material-icons">perm_media</i> Others Photo</h4>
									<input id="file-i4" type="file" name="image_other[]" accept=".jpg,.gif,.png,.jpeg" multiple>
								</div>
								<div class="col-md-12 valid-info" style="margin-top:30px">
									<h4><i class="material-icons">perm_media</i> Video URL</h4>
									<h5 style="margin-left: 15px;">Add your video link to embed the video into your product's gallery.</h5>
									<div class="row" id="embed" style="display: w;margin-bottom: 10px">
										<div class="col-md-6" >
											<input type="url" class="form-control" name="videoUrl[]" placeholder="URL Video ex.httt://www.youtube.com" />
										</div>
										<div class="col-md-3">                            
											<button type="button" class="btn btn-warning waves-effect" id="add_more_video">
												<i class="fa fa-plus"></i>
												<span>Add link</span>
											</button>
										</div>
									</div>
									<div id="clone_dinamic_video"></div>
								</div>
								<div class="col-md-4" style="margin-top: 40px">
									<button type="button" class="btn-block" id="button-step-4">Back</button>
									<button type="button" class="btn-block" id="button-step-4-holow" style="background-color:#E17306;border: none ">Back</button>
								</div>
								<div class="col-md-4 col-md-offset-4" style="margin-top: 30px">
									<button type="button" class="btn-block" id="button-step-6">Next</button>
									<!-- <button type="submit" class="btn-block" id="button-step-finish">Finish</button> -->
								</div>
							</section>
						<!-- TERM -->
							<section class="step-6" >
								<div class="col-md-12">
									<h3>Partner Terms & Conditions</h3>
									<h5>Now that you are all set. Please read important details regarding our partner’s terms and conditions and state that you are agree to follow our regulations.</h5>
								
									<h4>1.Product Pricing</h4>
									<h5>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer feugiat at lectus quis finibus. Nullam at nulla nec nisi mattis sagittis. Proin vestibulum auctor arcu, sit amet finibus diam scelerisque nec. Nullam maximus ullamcorper volutpat. Curabitur finibus augue non lacus pharetra, sagittis consequat enim imperdiet. Donec non nibh ut enim finibus mattis. Etiam iaculis sit amet sem ut pulvinar. Aliquam nec sem pretium arcu ultricies fermentum eu ut risus. Donec sollicitudin eleifend ultrices. Proin malesuada blandit porta. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas a bibendum ligula. Nulla id risus scelerisque, feugiat lorem sit amet, venenatis elit. Phasellus scelerisque eu lacus vel mattis. Morbi ut velit lacinia, iaculis elit ut, sollicitudin augue.
									</h5>
									<h4>1.Settlement</h4>
									<h5>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer feugiat at lectus quis finibus. Nullam at nulla nec nisi mattis sagittis. Proin vestibulum auctor arcu, sit amet finibus diam scelerisque nec. Nullam maximus ullamcorper volutpat. Curabitur finibus augue non lacus pharetra, sagittis consequat enim imperdiet. Donec non nibh ut enim finibus mattis. Etiam iaculis sit amet sem ut pulvinar. Aliquam nec sem pretium arcu ultricies fermentum eu ut risus. Donec sollicitudin eleifend ultrices. Proin malesuada blandit porta. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas a bibendum ligula. Nulla id risus scelerisque, feugiat lorem sit amet, venenatis elit. Phasellus scelerisque eu lacus vel mattis. Morbi ut velit lacinia, iaculis elit ut, sollicitudin augue.
									</h5>
									<h5>
										Please state that you are agree to <a href="#" style="color: orangered">Terms & Conditions</a> and <a href="#" style="color: orangered">Privacy Policy</a> of Pigijo.
									</h5>
									<h5>
										<input type="checkbox" name="aggrement">I agree  to all stated above.
									</h5>
								</div>
								<div class="col-md-4" style="margin-top: 30px">
									<button type="button" class="btn-block" id="button-step-5">Back</button>
									<button type="button" class="btn-block" id="button-step-5-holow" style="background-color:#E17306;border: none ">Back</button>
								</div>
								<div class="col-md-4 col-md-offset-4" style="margin-top: 40px">
									<!-- <button type="button" class="btn-block" id="button-step-6">Next</button> -->
									<button type="submit" class="btn-block" id="button-step-finish">Finish</button>
								</div>
							</section>
					<!-- MOBILE BUTTON DISPLAY -->
						<div class="col-md-6 visible-sm visible-xs" style="margin-top: 30px">
							<button type="button" class="btn-block"><a href="#" id="draft" style="text-decoration:none;color:white;"> Save As Draft</a></button>
						</div>
						<div class="col-md-6 visible-sm visible-xs" style="margin-top: 30px">
							<button type="button" class="btn-block"><a href="{{url('/logout')}}" style="text-decoration:none; color: white;">Logout</a></button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-2 visible-sm visible-sx">
				<div class="col-md-6" style="margin: 0px;padding: 0px">
					<a href="#" id="draft"><p>Save As Draft</p></a>
				</div>
				<div class="col-md-6" style="margin:0px ;padding: 0px">
					<a href="{{url('/logout')}}"><p>Logout</p></a>
				</div>
			</div>
		</div>
	</div>
<!-- GMAP -->
	<script>
		var lat;
		var lng;
		var address;
		var city;
		var marker;
		function initAutocomplete() {
			
			var input = document.getElementById('pac-input');
			var searchBox = new google.maps.places.SearchBox(input);
			
			searchBox.addListener('places_changed', function() {
				var places = searchBox.getPlaces();
				console.log(places)
				lat = places[0]["geometry"]["viewport"]["f"]["f"];
				lng = places[0]["geometry"]["viewport"]["b"]["f"];
				address = places[0]["formatted_address"];
				city = places[0]["address_components"][5]["long_name"];
				var url =  places[0]["url"]
				document.getElementById('geo-lat').value = lat;
				document.getElementById('geo-long').value = lng;
				if (places.length == 0) {
					return;
				}
				var bounds = new google.maps.LatLngBounds();
				places.forEach(function(place) {
				if (!place.geometry) {
					console.log("Returned place contains no geometry");
					return;
				}
				var icon = {
					url: place.icon,
					size: new google.maps.Size(71, 71),
					origin: new google.maps.Point(0, 0),
					anchor: new google.maps.Point(17, 34),
					scaledSize: new google.maps.Size(25, 25)
				};
				
				marker = new google.maps.Marker({
					map: map,
					icon: icon,
					title: place.name,
					draggable:true,
					position: place.geometry.location
				});
				google.maps.event.addListener(map, 'click', function(event) {
					lat = event.latLng.lat();
					lng = event.latLng.lng();
					placeMarker(event.latLng);
				});
				if (place.geometry.viewport) {
					bounds.union(place.geometry.viewport);
				} else {
					bounds.extend(place.geometry.location);
				}
				});
				map.fitBounds(bounds);
			});   
		}
		function getLatLng(){
			document.getElementById('geo-lat').value = lat;
			document.getElementById('geo-long').value = lng;
			document.getElementById('geo-address').value = address;
			document.getElementById('geo-city').value = address;
			$('#mapModal').modal('toggle');
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXELYNJkxo43slp8y_FFng0KL4YXSsOo4&libraries=places&callback=initAutocomplete" async defer></script>
<!-- Jquery core -->
	<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
	<script src="../../plugins/bootstrap/js/bootstrap.js"></script>
<!-- Tel format -->
	<script src="../../plugins/telformat/js/intlTelInput.js"></script>
<!-- Dropzone Plugin Js -->
	<script src="../../plugins/bootstrap-file-input/js/fileinput.js" type="text/javascript"></script>
<!-- Moment Plugin Js -->
	<script src="../../plugins/momentjs/moment.js"></script>
<!-- Bootstrap Material Datetime Picker Plugin Js -->
	<script src="../../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<!-- Bootstrap date range picker -->
	<script src="../../plugins/boostrap-daterangepicker/daterangepicker.js"></script>
<!-- Select Plugin Js -->
	<script src="../../plugins/select2/select2.min.js"></script>
<!-- Mask js -->
	<script src="../../plugins/mask-js/jquery.mask.min.js"></script>
<!-- Jquery Validation Plugin Css -->
	<script src="../../plugins/jquery-validation/jquery.validate.js"></script>
<!-- JQuery Steps Plugin Js -->
	<!-- <script src="../../plugins/jquery-steps/jquery.steps.js"></script> -->
<!-- Custom Js -->
	<script src="../../js/pages/forms/form-wizard.js"></script>
<!-- ORIGINAL-->
	<script>
		$(document).ready(function(){
			// MASK 
			// $("form *").removeAttr("required");
				$("input[name='companyPhone'],input[name='phone'],input[name='PICPhone']").mask('000-0000-00000');
				$("input[name='bankAccountNumb']").mask('0000000000000000');
				$("input[name='companyPostal']").mask('00000');
				$("input[name='minPerson'],input[name='maxPerson'],#scheduleField6,input[name='minCancellationDay'],input[name='cancellationFee']").mask('0000');
				$("input#idr,input#usd").mask('0.000.000.000', {reverse: true});
				// 
				$("#scheduleField3,#scheduleField4,#field_itinerary_input2,#field_itinerary_input3").mask('00:00');
				
				// 
			// PROVINCE
				$("select[name='companyProvince']").change(function(){
					var idProvince = $(this).val();
					$("select[name='companyCity']").empty();
					$.ajax({
						method: "GET",
						url: "{{ url('/city') }}",
						data: { id: idProvince  }
					}).done(function(response) {
						$.each(response, function (index, value) {
							$("select[name='companyCity']").append(
								"<option value="+value.id+">"+value.name+"</option>"
							);
						});
					});
				});
			// OWNERSHIP ELEMENT
				$("input[name='onwershipType']").change(function(){
					var val = $(this).val();
					if(val == "Company"){
						$("#akta,#siup,#npwp,#ktp,#evi").show();
						$("#npwp").find("h5#npwp").text("Company's Tax Number");
						$("#npwp").find("p#npwp").text("NPWP Perusahaan");
						$("#ktp").find("h5#ktp").text("Company Owner Identity Card");
						$("#ktp").find("p#ktp").text("KTP Direksi Perusahaan");
					}else{
						$("#npwp,#ktp").show();
						$("#npwp").find("h5#npwp").text("Tax Number");
						$("#npwp").find("p#npwp").text("NPWP");
						$("#ktp").find("h5#ktp").text("Identity Card");
						$("#ktp").find("p#ktp").text("KTP");
						$("#akta,#siup,#evi").hide();
					}
				});
				$("#file-1,#file-2,#file-3,#file-4,#file-5,#file-6").fileinput({
					theme: 'fa',
					maxFileSize: 1000,
					showPreview: false,
					showRemove: false,
					showCancel: false,
					showUpload: false,
					allowedFileExtensions: ["jpg", "png", "gif","pdf","doc","docs","xls"]
				});
			// BOOKING SYSTEM CHOICE
				$("input[name='bookingSystem']").change(function(){
					var val = $(this).val();
					if(val == 1){
						$("#booking_system_name").show();
					}else{
						$("input[name='bookingSystemName']:text").val(null);
						$("#booking_system_name").hide();
					}
				});
			// SAVE DRAFT ANCHOR
				$("a#draft").click(function(){
					console.log("qwfqw");
					$('#wizard_with_validation *').removeAttr("required");
					$('#wizard_with_validation').attr("action", "{{ url('/draft') }}").submit();
				});
			// WIZARD
				$("#button-step-2-holow,#button-step-3-holow,#button-step-4-holow").hide();
				$(".col-md-12 #change").click(function(){
					$(this).closest("#preview").hide().siblings("#input").show();
				});
				$("section #button-step-1").click(function(){
					$(this).closest("section").hide();
					$("#header-form-2").hide();
					$("section.step-1,#header-form-1,section #button-step-2").show();
					$("div.step-1").css({
						"background-color": "orange",
						"border-bottom": "solid #00e600 5px"
					});
					$(document).scrollTop(0);
				});
				$("section #button-step-2").click(function(){
					if($('#wizard_with_validation').valid()){
						$("#header-form-1").hide();
						$(this).closest("section").hide();
						$("button#button-step-2").each(function(){
							$(this).hide();
						});
						$("section.step-2,#header-form-2,#button-step-2-holow").show();
						$("#button-step-2-holow").click(function(){
							$(this).closest("section").hide();
							$("section.step-2,section #button-step-3").show();
						});
						$("div.step-2").css({
							"background-color": "orange",
							"border-bottom": "solid #00e600 5px"
						});
						$(document).scrollTop(0);
					}
				});
				$("section #button-step-3").click(function(){
					if($('#wizard_with_validation').valid()){
						$("#button-step-3").hide();
						$(this).closest("section").hide();
						$("button#button-step-3").each(function(){
							$(this).hide();
						});
						$("section.step-3,#button-step-3-holow").show();
						$("#button-step-3-holow").click(function(){
							$(this).closest("section").hide();
							$("section.step-3,section #button-step-4").show();
						});
						$("div.step-3,#button-step-3-clone").css({
							"background-color": "orange",
							"border-bottom": "solid #00e600 5px"
						});
						$(document).scrollTop(0);
					}
				});
				$("section #button-step-4").click(function(){
					if($('#wizard_with_validation').valid()){
						$("#button-step-4").hide();
						$(this).closest("section").hide();
						$("button#button-step-4").each(function(){
							$(this).hide();
						});
						$("section.step-4,#button-step-4-holow").show();
						$("#button-step-4-holow").click(function(){
							$(this).closest("section").hide();
							$("section.step-4,section #button-step-5").show();
						});
						$("div.step-4").css({
							"background-color": "orange",
							"border-bottom": "solid #00e600 5px"
						});
						$(document).scrollTop(0);
					}
				});
				$("section #button-step-5").click(function(){
					if($('#wizard_with_validation').valid()){
						$(this).closest("section").hide();
						$("button#button-step-5").each(function(){
							$(this).hide();
						});
						$("section.step-5").show();
						$("section.step-5,#button-step-5-holow").show();
						$("#button-step-5-holow").click(function(){
							$(this).closest("section").hide();
							$("section.step-5,section #button-step-6").show();
						});
						$("div.step-5").css({
							"background-color": "orange",
							"border-bottom": "solid #00e600 5px"
						});
						$(document).scrollTop(0);
					}
				});
				$("section #button-step-6").click(function(){
					if($('#wizard_with_validation').valid()){
						$(this).closest("section").hide();
						$("button#button-step-6").each(function(){
							$(this).hide();
						});
						$("section.step-6").show();
						$("div.step-6").css({
							"background-color": "orange",
							"border-bottom": "solid #00e600 5px"
						});
						$(document).scrollTop(0);
					}
				});
				// AGGREEMENT
				$("input[name='aggrement']:checkbox").change(function(){
					if($(this).is(":checked" )){
						$("button#button-step-finish").css("background-color","#E17306").attr("type","submit");
					}else{
						$("button#button-step-finish").css("background-color","#e1dcd6").attr("type","button");
					}
				});
		});
	</script>
<!-- Tour Type -->
	<script>
		$(document).ready(function() {
			$("#productType").change(function(){
				if($(this).val()=="Open Group"){
					$("#productTypeOpen").show();
					$("#productTypePrivate").hide();
					$("#schedule_body #scheduleCol6").find("h5").text("Max.Person*");
					$("#schedule_body #scheduleField6")
						.attr("readonly","readonly")
						.val($("input[name='maxPerson']").val());
					$("input[name='maxPerson']").change(function(){
						$("#schedule_body").find("input#scheduleField6").each(function(){
							$(this).val($("input[name='maxPerson']").val());
						});
					});	
				}else{
					$("#productTypeOpen").hide();
					$("#productTypePrivate").show();
					$("#schedule_body #scheduleCol6").find("h5").text("Max.Booking*");
					$("#schedule_body #scheduleField6")
						.removeAttr("readonly")
						.val(null);
				}
			});
		});
	</script>
<!-- Date Picker-->
    <script type="text/javascript">
        $(document).ready(function(){
			var day=1,hours=1,minute=1;	
			$("select[name='day']").change(function(){
				day = $(this).val();
			});
			$("select[name='day']").change(function(){
				day = $(this).val();
			});
			$("select[name='day']").change(function(){
				day = $(this).val();
			});
			console.log(day);
        	var dateFormat = 'DD-MM-YYYY';
        	var options = {
		        autoUpdateInput: false,
				singleDatePicker: true,
		        autoApply: true,
		        locale: {
		            format: dateFormat,
		        },
		        minDate: moment().add(1, 'days'),
		        maxDate: moment().add(359, 'days'),
		        opens: "right"
		    };
		    $("#scheduleField1").daterangepicker(options).on('apply.daterangepicker', function(ev, picker) {
				$("#scheduleField5").removeAttr("disabled");
			  $(this).val(picker.startDate.format('DD-MM-YYYY'));

				var newdate = new Date(picker.startDate.format('YYYY-MM-DD'));
				var scheduledays = day-1;
				newdate.setDate(newdate.getDate()+parseInt(scheduledays))
				if(scheduledays==""){
					$(this).closest("#dinamic_schedule").find("#scheduleField2").val("");
				}
				else{
					var datee = (newdate.getDate() < 10 ? '0' : '') + newdate.getDate();
					var month = ((newdate.getMonth() + 1) < 10 ? '0' : '') + (newdate.getMonth() + 1);
					var year = newdate.getFullYear();
					console.log(datee+"-"+month+"-"+year);
				}
			  $(this).closest("#dinamic_schedule").find("#scheduleField2").val(datee+"-"+month+"-"+year);
			});
			// 
			$("#scheduleField5").daterangepicker({
				autoUpdateInput: false,
			    singleDatePicker: true,
			    autoApply: true,
			    opens: "left",
			    locale: {
		            format: 'DD-MM-YYYY',
		        },
		        minDate: moment().add(0, 'days'),
		        maxDate: moment().add(359, 'days')
			}).on('apply.daterangepicker', function(ev, picker) {
			      $(this).val(picker.startDate.format('DD-MM-YYYY'));
			});
        });
    </script>
<!-- Schedule-->
    <script>
      $(document).ready(function () {
		var day = 1,hours= 1,minute=1,maxBooked;
		$("select[name='day']").change(function(){
			day = $(this).val();
			$("#dinamic_schedule input").val(null);
			$("#clone_dinamic_schedule").empty();
		});

		$("select[name='hours']").change(function(){
			hours = $(this).val();
			$("#dinamic_schedule input").val(null);
			$("#clone_dinamic_schedule").empty();
		});
		$("select[name='minutes']").change(function(){
			minutes = $(this).val();
			$("#dinamic_schedule input").val(null);
			$("#clone_dinamic_schedule").empty();
		});
		$("#dinamic_schedule").find("#scheduleField3").change(function(){
			var choose = $(this).val();
			var newtime = new Date(moment(choose,['h:m:a','H:m']));
			newtime.setHours(newtime.getHours()+parseInt(hours));
			newtime.setMinutes(newtime.getMinutes()+parseInt(minutes));
			if(hours=="" || minutes==""){
				$(this).closest("#dinamic_schedule").find("input#scheduleField4").val("");
			}
			else{
				var hour = (newtime.getHours() < 10 ? '0' : '') + newtime.getHours();
				var minute = (newtime.getMinutes() < 10 ? '0' : '') + newtime.getMinutes();
				$(this).closest("#dinamic_schedule").find("input#scheduleField4").val(hour+":"+minute);
			}
		});
      	var dateFormat = 'DD-MM-YYYY';
        var type = $("input[name='scheduleType']:radio").val();
        $("input[name='scheduleType']:radio").change(function () {
          $("#schedule_body").show(200);
          $("input[name='scheduleType']").each(function(){
          	$(this).removeAttr('sel');
          });
          type = this.value;
          if(type == 1){
          	$(this).attr('sel',type);
			$("#scheduleCol1").find("h5").text("Start Date*");
            $("#scheduleCol1, #scheduleCol2, #scheduleCol5, #scheduleCol6, .scheduleDays").show();
            $("#scheduleCol3, #scheduleCol4, .scheduleHours").removeAttr("required").hide();
            $("#clone_dinamic_schedule").empty();
            $("#dinamic_schedule input").val(null);
            // 
            $("#dinamic_schedule").find("#scheduleField1").daterangepicker({
				autoUpdateInput: false,
				singleDatePicker: true,
		        autoApply: true,
		        locale: {
		            format: dateFormat,
		        },
		        minDate: moment().add(1, 'days'),
		        maxDate: moment().add(359, 'days'),
		        opens: "right"
			}).on('apply.daterangepicker', function(ev, picker) {
			  	$(this).val(picker.startDate.format('DD-MM-YYYY'));
				var newdate = new Date(picker.startDate.format('YYYY-MM-DD'));
				var scheduledays = day-1;
				newdate.setDate(newdate.getDate()+parseInt(scheduledays))
				if(scheduledays==""){
					$(this).closest("#dinamic_schedule").find("#scheduleField2").val("");
				}
				else{
					var datee = (newdate.getDate() < 10 ? '0' : '') + newdate.getDate();
					var month = ((newdate.getMonth() + 1) < 10 ? '0' : '') + (newdate.getMonth() + 1);
					var year = newdate.getFullYear();
					$(this).closest("#dinamic_schedule").find("#scheduleField2").val(datee+"-"+month+"-"+year);
				}
				
			});
			// 
            if($("#productType").val() == "Open Group"){
            	$("#schedule_body").find("input#scheduleField6").each(function(){
					$(this).val($("input[name='maxPerson']").val());
				});
            }
          }else if(type == 2){
          	$(this).attr('sel',type);
			$("#scheduleCol1").find("h5").text("Date*");
            $("#scheduleCol1, #scheduleCol3, #scheduleCol4, #scheduleCol6, .scheduleHours").show();
            $("#scheduleCol2, #scheduleCol5, .scheduleDays").removeAttr("required").hide();
            $("#clone_dinamic_schedule").empty();
            $("#dinamic_schedule input").val(null);
            // 
            $("#dinamic_schedule").find("#scheduleField1").daterangepicker({
				autoUpdateInput: false,
				singleDatePicker: true,
		        autoApply: true,
		        locale: {
		            format: dateFormat,
		        },
		        minDate: moment().add(1, 'days'),
		        maxDate: moment().add(359, 'days'),
		        opens: "right"
			}).on('apply.daterangepicker', function(ev, picker) {
			  	$(this).val(picker.startDate.format('DD-MM-YYYY'));
			});
			// 
            if($("#productType").val() == "Open Group"){
            	$("#schedule_body").find("input#scheduleField6").each(function(){
					$(this).val($("input[name='maxPerson']").val());
				});
            }
          }else{
          	$(this).attr('sel',type);
			$("#scheduleCol1").find("h5").text("Date*");  
            $("#scheduleCol2, #scheduleCol3, #scheduleCol4, .scheduleDays, .scheduleHours").removeAttr("required").hide();;
            $("#scheduleCol1, #scheduleCol5").show();
            $("#clone_dinamic_schedule").empty();
            $("#dinamic_schedule input").val(null);
            // 
            $("#dinamic_schedule").find("#scheduleField1").daterangepicker({
				autoUpdateInput: false,
				singleDatePicker: true,
		        autoApply: true,
		        locale: {
		            format: dateFormat,
		        },
		        minDate: moment().add(1, 'days'),
		        maxDate: moment().add(359, 'days'),
		        opens: "right"
			}).on('apply.daterangepicker', function(ev, picker) {
			  	$(this).val(picker.startDate.format('DD-MM-YYYY'));
			});
			// 
            if($("#productType").val() == "Open Group"){
            	$("#schedule_body").find("input#scheduleField6").each(function(){
					$(this).val($("input[name='maxPerson']").val());
				});
            }
          }
        });
        // ADD MORE
        var i = 0;
        $("#add_more_schedule").click(function(){
			i++;
            var length = $("#clone_dinamic_schedule").find("#scheduleField2").length;
            console.log(type);
            if(type == 1){
                if(length != 0){
                    var minDate = $("#clone_dinamic_schedule").find("#scheduleField2").last().val();
					var minDate = minDate.split("-").reverse().join("-");
                }else{
                	var minDate = $("#dinamic_schedule").find("#scheduleField2").last().val();	
					var minDate = minDate.split("-").reverse().join("-");
                }
            }else{
                if(length != 0){
                    var minDate = $("#clone_dinamic_schedule").find("#scheduleField1").last().val();
					var minDate = minDate.split("-").reverse().join("-");
                }else{
                	var minDate = $("#dinamic_schedule").find("#scheduleField1").last().val();	
					var minDate = minDate.split("-").reverse().join("-");
                }
            }
            $("#dinamic_schedule").clone().appendTo("#clone_dinamic_schedule").addClass("row dinamic_schedule"+i);
            $(".dinamic_schedule"+i+" .col-md-1").append('<button type="button" id="delete_schedule" class="btn btn-danger waves-effect"><i class="material-icons">clear</i></button>');
            $(".dinamic_schedule"+i+" #scheduleField1").attr("name","schedule["+i+"][startDate]")
            	.daterangepicker({
            		autoUpdateInput: false,
            		singleDatePicker: true,
			        autoApply: true,
			        locale: {
			            format: dateFormat,
			        },
			        minDate: moment(minDate),
			        maxDate: moment().add(359, 'days'),
			        opens: "right"
            	}).on('apply.daterangepicker', function(ev, picker) {
				  	$(this).val(picker.startDate.format('DD-MM-YYYY'));
			  		var newdate = new Date(picker.startDate.format('YYYY-MM-DD'));
				var scheduledays = day-1;
				newdate.setDate(newdate.getDate()+parseInt(scheduledays))
				if(scheduledays==""){
					$(this).closest("#dinamic_schedule").find("#scheduleField2").val("");
				}
				else{
					var datee = (newdate.getDate() < 10 ? '0' : '') + newdate.getDate();
					var month = ((newdate.getMonth() + 1) < 10 ? '0' : '') + (newdate.getMonth() + 1);
					var year = newdate.getFullYear();
					console.log(datee+"-"+month+"-"+year);
				}
				$(this).closest("#dinamic_schedule").find("#scheduleField2").val(datee+"-"+month+"-"+year);
				});
            $(".dinamic_schedule"+i+" #scheduleField2").attr("name","schedule["+i+"][endDate]");
            $(".dinamic_schedule"+i+" #scheduleField3").attr("name","schedule["+i+"][startHours]").mask('00:00:00').change(function(){
				var choose = $(this).val();
				var newtime = new Date(moment(choose,['h:m:a','H:m']));
				newtime.setHours(newtime.getHours()+parseInt(hours));
				newtime.setMinutes(newtime.getMinutes()+parseInt(minutes));
				if(hours=="" || minutes==""){
					$(this).closest("#dinamic_schedule").find("input#scheduleField4").val("");
				}
				else{
					var hour = (newtime.getHours() < 10 ? '0' : '') + newtime.getHours();
					var minute = (newtime.getMinutes() < 10 ? '0' : '') + newtime.getMinutes();
					$(this).closest("#dinamic_schedule").find("input#scheduleField4").val(hour+":"+minute);
				}
			});
            $(".dinamic_schedule"+i+" #scheduleField4").attr("name","schedule["+i+"][endHours]").mask('00:00:00');
            $(".dinamic_schedule"+i+" #scheduleField5").attr("name","schedule["+i+"][maxBookingDate]").daterangepicker({
				autoUpdateInput: false,
			    singleDatePicker: true,
			    autoApply: true,
			    opens: "left",
			    locale: {
		            format: 'DD-MM-YYYY',
		        },
		        minDate: moment().add(0, 'days'),
		        maxDate: moment().add(359, 'days')
			}).on('apply.daterangepicker', function(ev, picker) {
			      $(this).val(picker.startDate.format('DD-MM-YYYY'));
			});
            $(".dinamic_schedule"+i+" #scheduleField6").attr("name","schedule["+i+"][maximumGroup]");
            $(".dinamic_schedule"+i+" #scheduleField1").val(null)
            $(".dinamic_schedule"+i+" #scheduleField2").val(null)
            $(".dinamic_schedule"+i+" #scheduleField3").val(null)
            $(".dinamic_schedule"+i+" #scheduleField4").val(null)
            $(".dinamic_schedule"+i+" #scheduleField5").val(null)

        });
        $(document).on("click", "#delete_schedule", function() {
            $(this).closest("#dinamic_schedule").remove();
        });
      });
    </script>
<!-- Destination-->
    <script>
        $(document).ready(function (){
        	$.ajax({
			  method: "GET",
			  url: "{{ url('/province') }}",
			}).done(function(response) {
				$.each(response, function (index, value) {
					$("#destinationField1").append(
						"<option value="+value.id+">"+value.name+"</option>"
					);
				});
			});
			$("#destinationField1").change(function(){
				$(this).closest("#dinamic_destination").find("#destinationField2").empty();
				var me = $(this);
				$.ajax({
				  method: "GET",
				  url: "{{ url('/city') }}",
				  data: {
				  	id: $(this).val()
				  }
				}).done(function(response) {
					$.each(response, function (index, value) {
						me.closest("#dinamic_destination").find("#destinationField2").append(
							"<option value="+value.id+">"+value.name+"</option>"
						);
					});
				});
			});
			$("#destinationField2").change(function(){
				$(this).closest("#dinamic_destination").find("#destinationField3").empty();
				var me2 = $(this);
				var province = $(this).closest("#dinamic_destination").find("#destinationField1").val();
				$.ajax({
				  method: "GET",
				  url: "{{ url('/destination') }}",
				  data: {
				  	city: $(this).val(),
				  	province: province
				  }
				}).done(function(response) {
					me2.closest("#dinamic_destination").find("#destinationField3").append(
						"<option value=''></option>"
					);
					$.each(response, function (index, value) {
						me2.closest("#dinamic_destination").find("#destinationField3").append(
							"<option value="+value.destinationId+">"+value.destination+"</option>"
						);
					});
				});
			});
            var i = 0;
            $("#add_more_destination").click(function(){
                i++;
                $("#dinamic_destination").clone().appendTo("#clone_dinamic_destination").addClass("row dinamic_destination"+i);
                $(".dinamic_destination"+i).find("#destinationField1").removeAttr("name").attr("name","place["+i+"][province]").change(function(){
	                	$(this).closest("#dinamic_destination").find("#destinationField2").empty();
						var me = $(this);
						$.ajax({
						  method: "GET",
						  url: "{{ url('/city') }}",
						  data: {
						  	id: $(this).val()
						  }
						}).done(function(response) {
							$.each(response, function (index, value) {
								me.closest("#dinamic_destination").find("#destinationField2").append(
									"<option value="+value.id+">"+value.name+"</option>"
								);
							});
						});
                });
                $(".dinamic_destination"+i).find("#destinationField2").removeAttr("name").attr("name","place["+i+"][city]").change(function(){
	                	$(this).closest("#dinamic_destination").find("#destinationField3").empty();
						var me2 = $(this);
						var province = $(this).closest("#dinamic_destination").find("#destinationField1").val();
						$.ajax({
						  method: "GET",
						  url: "{{ url('/destination') }}",
						  data: {
						  	city: $(this).val(),
						  	province: province
						  }
						}).done(function(response) {
							me2.closest("#dinamic_destination").find("#destinationField3").append(
								"<option value=''></option>"
							);
							$.each(response, function (index, value) {
								me2.closest("#dinamic_destination").find("#destinationField3").append(
									"<option value="+value.destinationId+">"+value.destination+"</option>"
								);
							});
						});
                });
                $(".dinamic_destination"+i).find("#destinationField3").removeAttr("name").attr("name","place["+i+"][destination]");
                $(".dinamic_destination"+i+" .col-md-1").append('<button type="button" id="delete_destination" class="btn btn-danger waves-effect"><i class="material-icons">clear</i></button>');
                $(".dinamic_destination"+i+" input").val(null);
            });
            $(document).on("click", "#delete_destination", function() {
                $(this).closest("#dinamic_destination").remove();
            });
        });
    </script>
<!-- Price --> 
    <script>
        $(document).ready(function () {
            $("input[name='priceKurs']:radio").change(function () {
                $("#price_row").show();
                var val = this.value;
                if(val == 1){
                    $("#price_usd, #price_list_container #price_usd").hide();
                    $("#price_usd input, #price_list_container #price_usd input").val(null);
                }else{
                    $("#price_usd, #price_list_container #price_usd").show();
                }
            });
            $("#price_type").change(function () {
            	var maxPerson = $("input[name='maxPerson']:text").val();
                var dif = Math.round(maxPerson/2)-1;
                var val = $(this).val();
                if(val == 1)
                {
                    $("#price_fix").show();
                    $("#price_table_container").hide();
                    $("#price_list_container_left,#price_list_container_right").empty();
                }else{
                    $("#price_fix").hide();
                    $("#price_table_container, #price_list").show();    
                    for(var i=0;i<=dif;i++){ 
                        $("#price_list").clone().appendTo("#price_list_container_left").attr("id","price_list"+i);
                        $("#price_list"+i+" .col-md-1 h5").append((i+1));
                        $("#price_list"+i+" #price_list_field1").val((i+1));
                        $("#price_list"+i+" #price_list_field1").attr("name","price["+i+"][people]");
                        $("#price_list"+i+" #price_list_field2").attr("name","price["+i+"][IDR]").mask('0.000.000.000', {reverse: true});
                        $("#price_list"+i+" #price_list_field3").attr("name","price["+i+"][USD]").mask('0.000.000.000', {reverse: true});
                    }

                    for(var i=(dif+1);i<maxPerson;i++){ 
                        $("#price_list").clone().appendTo("#price_list_container_right").attr("id","price_list"+i);
                        $("#price_list"+i+" .col-md-1 h5").append((i+1));
                        $("#price_list"+i+" #price_list_field1").val((i+1));
                        $("#price_list"+i+" #price_list_field1").attr("name","price["+i+"][people]");
                        $("#price_list"+i+" #price_list_field2").attr("name","price["+i+"][IDR]").mask('0.000.000.000', {reverse: true});
                        $("#price_list"+i+" #price_list_field3").attr("name","price["+i+"][USD]").mask('0.000.000.000', {reverse: true});
                    }
                    $("#price_list").hide();
                }
            });
            $("input[name='cancellationType']:radio").change(function () {
            var val = this.value;
            if(val == 3)
            {
                $("#cancel_policy").show(100);
            }else{
                $("#cancel_policy").hide(100);
            }
            });
            $("select[name='priceIncludes[]']").select2({
                tags:true
            });
            $("select[name='priceExcludes[]']").select2({
                tags:true
            });
        });
    </script>
<!-- Upload Images-->
    <script>
        $(document).ready(function () {
            $("#file-i1,#file-i2,#file-i3,#file-i4").fileinput({
                theme: 'fa',
                maxFileCount: 5,
                maxFileSize: 5000,
                showCaption: false,
                showRemove: false,
                showCancel: false,
                showUpload: false,
                previewSettings:{
                    image: {width: "auto", height: "auto"},
                },
                allowedFileTypes: ['image'],
                allowedFileExtensions: ["jpg", "png", "gif"],
                allowedPreviewTypes :['image']
            });
            var i = 0;
            $("#add_more_video").click(function(){
                i++;
                $(this).closest("#embed").clone().appendTo("#clone_dinamic_video").addClass("row dinamic_video"+i);
                $(".dinamic_video"+i+" .col-md-3").empty().append('<button type="button" id="delete_video" class="btn btn-danger waves-effect"><i class="material-icons">clear</i></button>');
                $(".dinamic_video"+i+" input").val(null);
            });
            $(document).on("click", "#delete_video", function() {
                $(this).closest("#embed").remove();
            });
        });
    </script>
<!-- Itinerary-->
	<script>
		$(document).ready(function() {
			$('select[name="activityTag[]"]').select2({
				placeholder: 'Cari...',
				ajax: {
				url: "{{ url('/activity')}}",
				dataType: 'json',
				delay: 0,
				processResults: function (data) {
					console.log(data)
					return {
						results:  $.map(data, function (item) {
						return {
							text: item.name,
							id: item.activityId
							}
						})
					};
				},
				cache: true
				}
			});
			$("#button-step-3").click(function(){
				$("#itineraryGenerate").empty();
				$("#itinerary_list").show();
				var val = $("input[name='scheduleType']:radio").attr("sel");
				console.log(val);
				if(val == 1){
					$("#itineraryGenerate").empty();
					$("#itinerary_list").show();
					var days = $("select[name='day']").val();
					console.log(days);
					var j = 0;
					var i;
					for(i=0;i<days;i++)
					{ 
						$("#itinerary_list").clone().appendTo("#itineraryGenerate").addClass("body itinerary_list"+i);   
						$(".itinerary_list"+i+" h5:first").append("<b>Days "+(i+1)+"</b>"); 
						$(".itinerary_list"+i+" #field_itinerary_input1").attr("name","itinerary["+i+"][day]").val((i+1));
						$(".itinerary_list"+i+" #field_itinerary_input2").attr("name","itinerary["+i+"][list][0][startTime]").mask('00:00:00');
						$(".itinerary_list"+i+" #field_itinerary_input3").attr("name","itinerary["+i+"][list][0][endTime]").mask("00:00:00");
						$(".itinerary_list"+i+" #field_itinerary_input7").attr("name","itinerary["+i+"][list][0][description]");
						$(".itinerary_list"+i+" .row .col-md-3 button").attr("onclick","addItineraryRow("+i+")");
					}
					$("#itinerary_list").hide();
				}else{
					var days = 1;
					var j = 0;
					var i;
					for(i=0;i<days;i++)
					{ 
						$("#itinerary_list").clone().appendTo("#itineraryGenerate").addClass("body itinerary_list"+i);   
						$(".itinerary_list"+i+" h5:first").append("<b>Days "+(i+1)+"</b>"); 
						$(".itinerary_list"+i+" #field_itinerary_input1").attr("name","itinerary["+i+"][day]").val((i+1));
						$(".itinerary_list"+i+" #field_itinerary_input2").attr("name","itinerary["+i+"][list][0][startTime]").mask('00:00:00');
						$(".itinerary_list"+i+" #field_itinerary_input3").attr("name","itinerary["+i+"][list][0][endTime]").mask('00:00:00');
						$(".itinerary_list"+i+" #field_itinerary_input7").attr("name","itinerary["+i+"][list][0][description]");
						$(".itinerary_list"+i+" .row .col-md-3 button").attr("onclick","addItineraryRow("+i+")");
					}
				}
				$("#itinerary_list").hide();
			});
		});
		var i = 0;
		function addItineraryRow(a){
			i++;
			$(".itinerary_list"+a+">#itinerary_row").clone().appendTo(".itinerary_list"+a+">#clone_dinamic_itinerary").addClass("dinamic_itinerary"+i);
			$(".dinamic_itinerary"+i).find("#field_itinerary4,#field_itinerary5,#field_itinerary6").hide();
			$(".dinamic_itinerary"+i).find("#field_itinerary7").removeAttr("class").addClass("col-md-4");
			$(".dinamic_itinerary"+i+" .col-md-1").append('<button type="button" id="delete_itinerary" class="btn btn-danger waves-effect"><i class="material-icons">clear</i></button>');
			$(".dinamic_itinerary"+i+" #field_itinerary_input1").attr("name","itinerary["+a+"][day]");
			$(".dinamic_itinerary"+i+" #field_itinerary_input2").attr("name","itinerary["+a+"][list]["+i+"][startTime]").bootstrapMaterialDatePicker({
				weekStart: 0, format: 'HH:mm',  date: false
			}).on('change', function(e, date){
				$(this).closest("#itinerary_list").find("#field_itinerary_input3").bootstrapMaterialDatePicker('setMinDate', date);
			});
			$(".dinamic_itinerary"+i+" #field_itinerary_input3").attr("name","itinerary["+a+"][list]["+i+"][endTime]").bootstrapMaterialDatePicker({
				format: 'HH:mm',  date: false
			});
			$(".dinamic_itinerary"+i+" #field_itinerary_input4").attr("name","itinerary["+a+"][list]["+i+"][activityCategory]").change(function(){
				var a = $(this).val();
				console.log(a);
				if(a == 1 || a == 4){
					$(this).closest("#itinerary_row").find("#field_itinerary4,#field_itinerary5,#field_itinerary6").hide(100);
					$(this).closest("#itinerary_row").find("#field_itinerary7").removeAttr("class").addClass("col-md-4");
				}else if(a == 2){
					$(this).closest("#itinerary_row").find("#field_itinerary6").hide(100);
					$(this).closest("#itinerary_row").find("#field_itinerary4,#field_itinerary5").show(100);
					$(this).closest("#itinerary_row").find("#field_itinerary7").removeAttr("class").addClass("col-md-7");
				}else{
					$(this).closest("#itinerary_row").find("#field_itinerary4,#field_itinerary5,#field_itinerary6").show(100);
					$(this).closest("#itinerary_row").find("#field_itinerary7").removeAttr("class").addClass("col-md-4");
				}
			});
			$(".dinamic_itinerary"+i+" #field_itinerary_input5").attr("name","itinerary["+a+"][list]["+i+"][destination]");
			$(".dinamic_itinerary"+i+" #field_itinerary_input6").attr("name","itinerary["+a+"][list]["+i+"][activity]");
			$(".dinamic_itinerary"+i+" #field_itinerary_input7").attr("name","itinerary["+a+"][list]["+i+"][description]");
			$(".dinamic_itinerary"+i+" input").val(null);
		}
		$(document).on("click", "#delete_itinerary", function() {
			$(this).closest("#itinerary_row").remove();
		});
	</script>
<!-- PHONE FORMAT -->
	<script>
		$(document).ready(function() {
			var phone = "{{$data->phone}}";
			var format = phone.split("-");
			// PIC COMPANY
			$("input[name='format']").val(format);
			$("input[name='phone']").val(phone).intlTelInput({
				separateDialCode: true,
			});
			$("input[name='format']").val("+62");
			$(".country").click(function(){
				$(this).closest(".valid-info").find("input[name='format']").val("+"+$(this).attr("data-dial-code"));
			});
			// PIC PRODUCT
			$("input[name='formatPIC']").val("+62");
			$("input[name='PICPhone']").val("+62").intlTelInput({
				separateDialCode: true,
			});
			$("input[name='formatPIC']").val("+62");
			$(".country").click(function(){
				$(this).closest(".valid-info").find("input[name='formatPICs']").val("+"+$(this).attr( "data-dial-code" ));
			});
			// COMPANY
			$("input[name='formatCompany']").val("+62");
			$("input[name='companyPhone']").val("+62").intlTelInput({
				separateDialCode: true,
			});
			$("input[name='formatCompany']").val("+62");
			$(".country").click(function(){
				$(this).closest(".valid-info").find("input[name='formatCompany']").val("+"+$(this).attr( "data-dial-code" ));
			});
		});
	</script>
<!-- SELECT AND UPDATE -->
	
</body>
</html>