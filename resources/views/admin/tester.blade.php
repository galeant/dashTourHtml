@extends('admin.layouts.routing')

@section('header')
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Jquery DataTable | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">
    <!-- Bootstrap Select2 -->
    <link href="../../plugins/select2/select2.min.css" rel="stylesheet" />
    <!-- Dropzone Css -->
    <link href="../../plugins/bootstrap-file-input/css/fileinput.css" rel="stylesheet" media="all">
	<link href="../../plugins/bootstrap-file-input/themes/explorer-fa/theme.css" media="all" rel="stylesheet" type="text/css"/>
	<!-- Bootstrap Material Datetime Picker Css -->
    <link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <!-- <link href="../../css/themes/all-themes.css" rel="stylesheet" /> -->
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
			
			.field h3{
				font-size: 29px;
				font-family: CenturyGothicRegular;
				color: #444444;
			}
			.field h4{
				font-size: 18px;
				font-family: CenturyGothicRegular;
				color: #444444;
				border-bottom:solid 1px;
				padding-bottom: 10px;
			}
			.field h5{
				font-size: 16px;
				font-family: CenturyGothicRegular;
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
				height: 90%;
			}
			.krajee-default.file-preview-frame{
				width: 190px;
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
			section.step-2,section.step-3,section.step-4,section.step-5{
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
				font-family: Roboto;
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
		</style>

@endsection

@section('page')
    <div class="container-fluid">
        <div class="card">
            <div class="body" style="padding-left: 40px">
            	<div class="row">
				<form action="{{ url('/register/profile') }}" method="post" enctype="multipart/form-data">
				@csrf
				<!-- CONTENT -->
						<!-- COMPANY -->
						<section class="step-1">
								<div class="col-md-12" style="margin-top: 20px;">
								<h4>Personal Information</h4>
								<div class="col-md-10" style="margin-top:10px;">
									<div class="row">
										<div class="col-md-5" style="margin-top:10px;">
											<div class="valid-info">
												<h5>Full Name* :</h5>
												<input type="text" class="form-control" name="fullName" value="{{$data->fullName}}" required>
											</div>
										</div>
										<div class="col-md-5" style="margin-top:10px;">
											<div class="valid-info">
												<h5>Email:</h5>
												<input type="text" class="form-control" name="email" value="{{$data->email}}" readonly="">
											</div>
										</div>
										<div class="col-md-5" style="margin-top: 10px;">
											<div class="valid-info">
												<h5>Phone Number* :</h5>
												<input type="hidden" class="form-control" name="format">
												<input type="tel" class="form-control" name="phone" value="{{$data->phone}}" required>
											</div>
										</div>
										<div class="col-md-5" style="margin-top: 10px;">
											<div class="valid-info">
												<h5>What is your role ?* :</h5>
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
										<div class="col-md-10" style="margin-top:10px">
											<div class="valid-info">
												<h5>Company / Business Name*:</h5>
												<input type="text" class="form-control" name="companyName" value="{{$data->companyName}}" required>
											</div>
										</div>
										<div class="row" style="margin:0px">
											<div class="col-md-5" style="margin-top:10px;">
												<div class="valid-info">
													<h5>Company Phone Number*:</h5>
													<div class="row" style="margin: 0px">
														<div class="col-md-9" style="margin: 0px;padding: 0px;width:100%">
															<input type="hidden" class="form-control" name="formatCompany">	
															<input type="tel" class="form-control" name="companyPhone" value="{{$data->companyPhone}}" required>	
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-5" style="margin-top:10px;">
												<div class="valid-info">
													<h5>Company Email Address:</h5>
													<input type="email" class="form-control" name="companyEmail" value="{{$data->companyEmail}}">
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
										<div class="col-md-3 mg-top-10px">
											<div class="valid-info">
												<h5>Bank Name*:</h5>
												<select class="form-control" name="bankName" required>
													<option>BCA</option>
													<option>BNI</option>
												</select>
											</div>
										</div>
										<div class="col-md-7 mg-top-10px">
											<div class="valid-info">
												<h5>Bank Account Number*:</h5>
												<input type="text" class="form-control" name="bankAccountNumb" required>
											</div>
										</div>
										<div class="row" style="margin:0px">
											<div class="col-md-3 col-sm-3 col-xs-3 valid-info mg-top-10px">
												<h5>Title*:</h5>
												<select class="form-control" name="bankAccountHolderTitle" required>
													<option>Mr</option>
													<option>Mrs</option>
													<option>Miss</option>
												</select>
											</div>
											<div class="col-md-7 col-sm-7 col-xs-9 mg-top-10px">
												<div class="valid-info">
													<h5>Account Holder Name*:</h5>
													<input type="text" class="form-control" name="bankAccountHolderName" required>
												</div>
											</div>
										</div>
										<div class="col-md-10 mg-top-10px">
                                            <p>Bank Account Proof Upload*:</p>
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
								<div class="col-md-12">
									<div class="row">
										<h4>Upload Document</h4>
										<div class="row valid-info">
											<div class="col-md-12">
												<p>What is your business ownership type?</p>
											</div>
											<div class="col-md-3">
												<input name="onwershipType" type="radio" id="1o" class="radio-col-deep-orange" value="1" required/>
												<label for="1o">Corporate</label>
											</div>
											<div class="col-md-3">
												<input name="onwershipType" type="radio" id="2o" class="radio-col-deep-orange" value="2" required checked/>
												<label for="2o">Personal</label>
											</div>
										</div>
										<h5>Please upload softcopy of documents listed below or <b>you can skip and provide it later</b>.</h5>
										<h5 style="margin-bottom:15px;">Accepted document format: PDF/JPG/JPEG/PNG. Maximum size is 5 MB per file</h5>
										<div class="col-md-12" id="akta" style="margin-top: 10px;display: none" >
											<div class="row">
												<div class="col-md-4">
													<h5>Company Article of Association.</h5>
													<p>Akta Pendirian Usaha</p>		
												</div>
												<div class="col-md-6" id="input" style="margin-top: 10px">
													<input id="file-2" type="file" name="aktaPic" />		
												</div>
											</div>
										</div>
										<div class="col-md-12" id="siup" style="display: none">
											<div class="row">
												<div class="col-md-4">
													<h5>SIUP/TDP</h5>
													<p>Surat Izin Usaha Perdagangan/Tanda Daftar Perusahaan</p>
												</div>
												<div class="col-md-6" id="input" style="margin-top: 20px;">
													<input id="file-3" type="file" name="SIUPPic" />
												</div>
											</div>
										</div>
										<div class="col-md-12" id="npwp">
											<div class="row">
												<div class="col-md-4">
													<h5 id="npwp">Tax Number</h5>
													<p id="npwp">NPWP</p>
												</div>
												<div class="col-md-6" id="input" style="margin-top: 10px">
													<input id="file-4" type="file" name="NPWPPic" />
												</div>
											</div>
										</div>
										<div class="col-md-12" id="ktp">
											<div class="row">
												<div class="col-md-4">
													<h5 id="ktp">Identity Card</h5>
													<p id="ktp">KTP</p>
												</div>
												<div class="col-md-6" id="input" style="margin-top: 10px">
													<input id="file-5" type="file" name="KTPPic">
												</div>
												
											</div>
										</div>
										<div class="col-md-12" id="evi" style="display: none">
											<div class="row">
												<div class="col-md-4">
													<h5>Evidence you have a product</h5>
													<p>Contoh product/info product</p>
												</div>
												<div class="col-md-6" id="input" style="margin-top: 10px">
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
								<div class="col-md-12" style="margin-top: 10px">
									<h4>Product Information</h4>
									<div class="row">
										<div class="col-md-3 valid-info">
											<h5>Product Category</h5>
											<select name="productCategory" class="form-control show-tick">
												<option>Activity</option>
											</select>
										</div>
										<div class="col-md-3 valid-info">
											<h5>Type</h5>
											<select name="productType" id="productType" class="form-control show-tick">
												<option>Open Group</option>
												<option selected>Private Group</option>
											</select>
										</div>
										<div class="col-md-6" style="padding:5px" id="productTypeOpen">
											<h5><b><u>Open Trip</u></b><br></h5>
											<small>Within a single commencing schedule, customers will be grouped into one group.</small>
										</div>
										<div class="col-md-6" style="padding:5px" id="productTypePrivate" hidden>
											<h5><b><u>Private Trip</u></b><br></h5>
											<small>Within a single commencing schedule, customers can book for their own private group. They won't be grouped with another customers.</small>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 valid-info">
											<h5>Product Name*</h5>
											<input type="hidden" name="productCode" value="Pigijo-1"/>
											<input type="text" class="form-control" name="productName" required />
										</div>
									</div>
									<div class="row">
										<div class="col-md-3 valid-info">
											<h5>Minimum Person*</h5>
											<input type="text" class="form-control" name="minPerson" required />
										</div>
										<div class="col-md-3 valid-info">
											<h5>Maximum Person*</h5>
											<input type="text" class="form-control" name="maxPerson" required />    
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 valid-info">
											<h5>Starting Point/Gathering Point(where should your costumer meet you)?*</h5>
											<input type="text" id="pac-input" class="form-control" name="meetingPoint" placeholder="Start typing an address" required />
											<input type="hidden" id="geo-lat" class="form-control" name="meetingPointLatitude" />    
											<input type="hidden" id="geo-long" class="form-control" name="meetingPointLongitude" />   
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 valid-info">
											<h5>Meeting Point Notes</h5>
											<textarea rows="4" name="meetingPointNotes" class="form-control no-resize"></textarea>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 valid-info">
											<h5>PIC Name*</h5>
											<input type="text" class="form-control" required/>   
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 valid-info">
											<h5>PIC Phone*</h5>
											<input type="hidden" class="form-control" name="formatPIC">	
											<input type="tel" class="form-control" name="PICPhone" required>	
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 valid-info">
											<h5>Terms & Condition*</h5>
											<textarea rows="4" name="termCondition" class="form-control no-resize" required></textarea>
										</div>
									</div>
								</div>
								<!-- SCHEDULE -->
								<div class="col-md-12">
									<h4>Duration & Schedule</h4>
									<div class="row valid-info">
										<div class="col-md-12">
											<h5>How long is the duration of your tour/activity ?</h5>
										</div>
										<div class="col-md-3">
											<input name="scheduleType" type="radio" id="1d" class="radio-col-deep-orange" value="1" required/>
											<label for="1d">Multiple days</label>
										</div>
										<div class="col-md-3">
											<input name="scheduleType" type="radio" id="2d" class="radio-col-deep-orange" value="2" />
											<label for="2d">A couple of hours</label>
										</div>
										<div class="col-md-3">
											<input name="scheduleType" type="radio" id="3d" class="radio-col-deep-orange" value="3" />
											<label for="3d">One day full</label>
										</div>
									</div>
									<!-- <div class="row valid-info scheduleDays" style="margin:0px">
										<div class="col-md-1" style="margin:0px;padding: 0px;width: auto">
											<h5>Days*</h5>
										</div>
										<div class="col-md-2">
											<input type="text" name="scheduleDays" class="form-control" required/>
										</div>
									</div>
									<div class="row valid-info scheduleHours" style="margin:0px;display: none">
										<div class="col-md-1" style="margin:0px;padding: 0px;width: auto">
											<h5>Hours*</h5>
										</div>
										<div class="col-md-2">
											<input type="text" name="scheduleHours" class="form-control" required/>
										</div>
										<div class="col-md-1" style="margin:0px;padding: 0px;width: auto">
											<h5>Minutes*</h5>
										</div>
										<div class="col-md-2">
											<input type="text" name="scheduleMinutes" class="form-control" required/>
										</div>
									</div> -->
									<div id="schedule_body">
										<div class="row" id="dinamic_schedule">
											<div class="col-md-3 valid-info" id="scheduleCol1">
												<h5>Start date*</h5>
												<input type="text" id="scheduleField1" class="form-control" name="schedule[0][startDate]" placeholder="YYYY-MM-DD" required/>
											</div>
											<div class="col-md-3 valid-info" id="scheduleCol2">
												<h5>End date*</h5>
												<input type="text" id="scheduleField2" class="form-control" name="schedule[0][endDate]" placeholder="YYYY-MM-DD" required/>
											</div>
											<div class="col-md-2 valid-info" id="scheduleCol3" style="display: none">
												<h5>Start hours *</h5>
												<input type="text" id="scheduleField3" class="form-control" name="schedule[0][startHours]" placeholder="HH:mm" required/>
											</div>
											<div class="col-md-2 valid-info" id="scheduleCol4" style="display: none">
												<h5>End hours*</h5>
												<input type="text" id="scheduleField4" class="form-control" name="schedule[0][endHours]" placeholder="HH:mm" required/>
											</div>
											<div class="col-md-3 valid-info" id="scheduleCol5">
												<h5>Max.Booking Date*</h5>
												<input type="text" id="scheduleField5" class="form-control" name="schedule[0][maxBookingDate]" placeholder="YYYY-MM-DD" required/>
											</div>
											<div class="col-md-2 valid-info" id="scheduleCol6">
												<h5>Max.Booking*</h5>
												<input type="text" id="scheduleField6" class="form-control" name="schedule[0][maximumGroup]" required/>
											</div>
											<div class="col-md-1" style="padding-top:25px "></div>
										</div>
										<div id="clone_dinamic_schedule"></div>
										<div class="row" style="margin-top: 10px">
											<div class="col-md-3">
												<button type="button" class="btn btn-warning waves-effect" id="add_more_schedule">
													<i class="material-icons">add</i>
													<span>Add Schedule</span>
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<h4>Tour / Activity Location</h4>
									<div class="row">
										<div class="col-md-12">
											<h5>List down all destination related to your tour package / activity.</h5>
											<h5>The more accurate you list down the destinations, better your product's peformance in search result.</h5>
										</div>
									</div>
									<div class="row" id="dinamic_destination">
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
										<div class="row" style="margin-top: 10px">
											<div class="col-md-3">
											<button type="button" class="btn btn-warning waves-effect" id="add_more_destination">
												<i class="material-icons">add</i>
												<span>Add Destination</span>
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
							<section class="step-3">
								<div class="col-md-12">
									<h4>Activity Tag</h4>
									<div class="row">
										<div class="col-md-6 valid-info">
											<h5>How would you describe the activities in this product?</h5>
											<select class="form-control" name="activityTag[]" multiple="multiple" style="width: 100%" required></select>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<h4>Itineraty Detail</h4>
									<!-- Itinerary origin -->
									<div id="itinerary_list">
										<h5></h5>
										<input id="field_itinerary_input1" type="hidden" />
										<div class="row" id="itinerary_row">
											<div class="col-md-2 valid-info" id="field_itinerary1">
												<h5>Start time*</h5>
												<input id="field_itinerary_input2" type="text" class="form-control" placeholder="Start time" required />
											</div>
											<div class="col-md-2 valid-info" id="field_itinerary2">
												<h5>End time*</h5>
												<input id="field_itinerary_input3" type="text" class="form-control" placeholder="End Time" required />
											</div>
											<div class="col-md-6 valid-info" id="field_itinerary7">
												<h5>Description</h5>
												<textarea id="field_itinerary_input7" rows="6" class="form-control" placeholder="Description" required></textarea>
											</div>
											<div class="col-md-1" style="padding-top:35px"></div>
										</div>
										<div id="clone_dinamic_itinerary"></div> 
									</div>
									<!-- END -->
									<!-- Itinerary Clone-->
									<div id="itineraryGenerate"></div>
									<!-- END -->
								</div>
								<div class="col-md-4" style="margin-top: 30px">
									<button type="button" class="btn-block" id="button-step-2">Back</button>
								</div>
								<div class="col-md-4 col-md-offset-4" style="margin-top: 30px">
									<button type="button" class="btn-block" id="button-step-4">Next</button>
								</div>
							</section>
						<!-- PRICE -->
							<section class="step-4">
								<div class="col-md-12">
									<h4>Pricing Details</h4>
									<div class="row valid-info">
										<div class="col-md-4">
											<input name="priceKurs" type="radio" id="1p" class="radio-col-deep-orange" value="1" checked required/>
											<label for="1p" style="font-size:15px">I only have pricing in IDR</label>
										</div>
										<div class="col-md-6">
											<input name="priceKurs" type="radio" id="2p" class="radio-col-deep-orange" value="2" />
											<label for="2p" style="font-size:15px">I want to add pricing in USD for international tourist</label>
										</div>
									</div>
									<div class="row" id="price_row">
										<div class="col-md-3 valid-info">
											<h5>Pricing Option</h5>
											<select name="priceType" id="price_type" class="form-control" required>
												<option value="1">Fixed Price</option>
												<option value="2">Based on Number of Person</option>
											</select>
										</div>
										<div id="price_fix">
											<div class="col-md-3 valid-info" id="price_idr">
												<h5>Price (IDR)*:</h5>
												<input type="hidden" name="price[0][people]" value="fixed"> 
												<input type="text" id="idr" name="price[0][IDR]" class="form-control" required />     
											</div>
											<div class="col-md-3 valid-info" id="price_usd" style="display: none">
												<h5>Price (USD)*</h5>
												<input type="text" id="usd" name="price[0][USD]" class="form-control" required />     
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12" id="price_table_container" style="display: none">
									<h4>Pricing Tables</h4>
									<div class="row">
										<div class="col-md-6" id="price_list" style="display: none">
											<div class="row">
												<div class="col-md-1" style="padding: 20px 0px 0px 0px;">
													<h5><i class="material-icons">person</i></h5>
												</div>
												<div class="col-md-11">
													<div class="row">
														<div class="col-md-6 valid-info" id="price_idr">
															<h5>Price (IDR)*</h5>
															<input id="price_list_field1" type="hidden" required>  
															<input id="price_list_field2" type="text" class="form-control" required>     
														</div>
														<div class="col-md-6 valid-info" id="price_usd">
															<h5>Price (USD)*</h5>
															<input id="price_list_field3" type="text" class="form-control" required />     
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="price_list_container"></div>
									</div>
								</div>
								<div class="col-md-12">
									<h4>Price Includes</h4>
									<div class="row">
										<div class="col-md-6 valid-info">
											<h5>What's already included with pricing you have set?What will you provide?</h5>
											<h5>Example: Meal 3 times a day, mineral water, driver as tour guide.</h5>
											<select type="text" class="form-control" name="priceIncludes[]" multiple="multiple" style="width: 100%" required></select>
										</div>
										<div class="col-md-6" style="padding-top:85px">
											<h5>Type a paragraph and press Enter.</h5>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<h4>Price Excludes</h4>
									<div class="row">
										<div class="col-md-6 valid-info">
											<h5>What's not included with pricing you have set?Any extra cost the costumer should be awere of?</h5>
											<h5>Example: Entrance fee IDR 200,000, bicycle rental, etc</h5>
											<select class="form-control" name="priceExcludes[]" multiple="multiple" style="width: 100%" required></select>
										</div>
										<div class="col-md-6" style="padding-top:85px">
											<h5>Type a paragraph and press Enter.</h5>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<h4>Cancellation Policy</h4>
									<div class="row valid-info">
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
												<input type="text" name="minCancellationDay" class="form-control" placeholder="Day" required>
											</div>
											<div class="col-md-2" style="margin:5px;padding:0px;width:auto">
												<h5>days from shcedule, cancellation fee is</h5>
											</div>
											<div class="col-md-1 valid-info" style="margin:5px;padding:0px">
												<input type="text" name="cancellationFee" class="form-control" placeholder="Percent" required>
											</div>
											<div class="col-md-2" style="margin:5px;padding:0px;width:auto">
												<h5>percent(%)</h5>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4" style="margin-top: 30px">
									<button type="button" class="btn-block" id="button-step-3">Back</button>
								</div>
								<div class="col-md-4 col-md-offset-4" style="margin-top: 30px">
									<button type="button" class="btn-block" id="button-step-5">Next</button>
								</div>
							</section>
						<!-- FILE -->
							<section class="step-5">
								<div class="col-md-12 valid-info">
									<h4><i class="material-icons">perm_media</i> Destination Photo</h4>
									<input id="file-i1" type="file" name="image_destination[]" accept=".jpg,.gif,.png,.jpeg" multiple required>
								</div>
								<div class="col-md-12 valid-info" style="margin-top:20px">
									<h4><i class="material-icons">perm_media</i> Activities Photo</h4>
									<input id="file-i2" type="file" name="image_activities[]" accept=".jpg,.gif,.png,.jpeg" multiple required>    
								</div>
								<div class="col-md-12 valid-info" style="margin-top:20px">
									<h4><i class="material-icons">perm_media</i> Accommodation Photo</h4>
									<input id="file-i3" type="file" name="image_accommodation[]"accept=".jpg,.gif,.png,.jpeg"  multiple required>
								</div>
								<div class="col-md-12 valid-info" style="margin-top:20px">
									<h4><i class="material-icons">perm_media</i> Others Photo</h4>
									<input id="file-i4" type="file" name="image_other[]" accept=".jpg,.gif,.png,.jpeg" multiple required>
								</div>
								<div class="col-md-12 valid-info" style="margin-top:20px">
									<h4><i class="material-icons">perm_media</i> Video URL</h4>
									<h5>Add your video link to embed the video into your product's gallery.</h5>
									<div class="row" id="embed" style="display: w;margin-bottom: 10px">
										<div class="col-md-6" >
											<input type="url" class="form-control" name="videoUrl[]" placeholder="URL Video ex.httt://www.youtube.com" />
										</div>
										<div class="col-md-3">                            
											<button type="button" class="btn btn-warning waves-effect" id="add_more_video">
												<i class="material-icons">add</i>
												<span>Add link</span>
											</button>
										</div>
									</div>
									<div id="clone_dinamic_video"></div>
								</div>
								<div class="col-md-4" style="margin-top: 30px">
									<button type="button" class="btn-block" id="button-step-4">Back</button>
								</div>
								<div class="col-md-4 col-md-offset-4" style="margin-top: 30px">
									<button type="submit" class="btn-block" id="button-step-finish">Finish</button>
								</div>
							</section>
					</form>
				</div>
            </div>
        </div>  
    </div>
@endsection

@section('footer')
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
    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Tel format -->
	<script src="../../plugins/telformat/js/intlTelInput.js"></script>
	<!-- Dropzone Plugin Js -->
	<script src="../../plugins/bootstrap-file-input/js/fileinput.js" type="text/javascript"></script>
	<!-- Moment Plugin Js -->
	<script src="../../plugins/momentjs/moment.js"></script>
	<!-- Bootstrap Material Datetime Picker Plugin Js -->
	<script src="../../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<!-- Select Plugin Js -->
	<script src="../../plugins/select2/select2.min.js"></script>
<!-- Mask js -->
	<script src="../../plugins/mask-js/jquery.mask.min.js"></script>
<!-- Jquery Validation Plugin Css -->
	<script src="../../plugins/jquery-validation/jquery.validate.js"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Custom Js -->
	<script src="../../js/pages/forms/form-wizard.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="../../plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <!-- <script src="../../js/demo.js"></script> -->
    <script type="text/javascript">
    	var stat = '{{ $data->status}}';
    	console.log(stat);
    	if(stat !='kuration' && stat !='decline'){
    		$("#approve,#decline").attr("disabled","").hide();	
    	}
    	if(stat =='decline'){
			$("#decline").hide();
		}
    	$("#back").click(function(){
    		window.location.href = "{{ url('/admin') }}";
    	});
    	$("#approve").click(function(){ 
    		var id = $("input[name='companyId']:text").val();
    		// console.log(id);
    		var token = $("input[name='_token']:hidden").val();
    		swal({
	          title: "Are you sure?", 
	          text: "Are you sure that you this is OK?", 
	          type: "warning",
	          showCancelButton: true,
	          closeOnConfirm: false,
	          confirmButtonText: "Yes",
	          confirmButtonColor: "#FF5722"
	        },function() {
	        	$.ajax({
	                type: 'POST',
	                url: "{{ url('register/approve') }}",
	                data: {
	                    '_token': $('input[name=_token]').val(),
	                    'id': id
	                },
	                success: function(response) {
	                    window.location.href = "{{ url('/admin') }}";
	                }
	            });
            	
        	});
    	});
    	$("#decline").click(function(){
    		var id = $("input[name='companyId']:text").val();
    		var token = $("input[name='_token']:hidden").val();
    		swal({
	          title: "Are you sure?", 
	          text: "Are you sure that you this is OK?", 
	          type: "warning",
	          showCancelButton: true,
	          closeOnConfirm: false,
	          confirmButtonText: "Yes",
	          confirmButtonColor: "#FF5722"
	        },function() {
	        	$.ajax({
	                type: 'POST',
	                url: "{{ url('register/decline') }}",
	                data: {
	                    '_token': $('input[name=_token]').val(),
	                    'id': id
	                },
	                success: function(response) {
	                    window.location.href = "{{ url('/admin') }}";
	                }
	            });
            	
        	});
    	});
    </script>
    <!-- ORIGINAL-->
	<script>
		$(document).ready(function(){
			// ADDITIONAL 
			// $("form *").removeAttr("required");
				$("input[name='companyPhone'],input[name='phone'],input[name='PICPhone']").mask('000-0000-00000');
				$("input[name='bankAccountNumb']").mask('0000000000000000');
				$("input[name='companyPostal']").mask('00000');
				$("input[name='minPerson']").mask('0000');
				$("input[name='maxPerson']").mask('0000');
				$("#scheduleField3").mask('00:00:00');
				$("#scheduleField4").mask('00:00:00');
				$("#scheduleField6").mask('00000');
				$("#field_itinerary_input2").mask('00:00:00');
				$("#field_itinerary_input3").mask('00:00:00');
				$("input[name='minCancellationDay']").mask('0000');
				$("#idr").each(function(){
					$(this).mask('00000000000000000000000000000');
				});
				$("#usd").each(function(){
					$(this).mask('00000000000000000000000000000');
				});
				
			// PROVINCE
				$("select[name='companyProvince']").change(function(){
					var idProvince = $(this).val();
					$("select[name='companyCity']").empty();
					$.ajax({
						method: "GET",
						url: "{{ url('/cities') }}",
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
					if(val == 1){
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
				$(".col-md-12 #change").click(function(){
					$(this).closest("#preview").hide().siblings("#input").show();
				});
				
				$("section #button-step-1").click(function(){
					$(this).closest("section").hide();
					$("#header-form-2").hide();
					$("section.step-1,#header-form-1").show();
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
						$("section.step-2,#header-form-2").show();
						$("div.step-2").css({
							"background-color": "orange",
							"border-bottom": "solid #00e600 5px"
						});
						$(document).scrollTop(0);
					}
				});
				$("section #button-step-3").click(function(){
					if($('#wizard_with_validation').valid()){
						console.log("lanjut");
						$(this).closest("section").hide();
						$("section.step-3").show();
						$("div.step-3").css({
							"background-color": "orange",
							"border-bottom": "solid #00e600 5px"
						});
						var arrDes = [];
						$('.dest_list').each(function() {
							arrDes.push($(this).val());
						});
						$.ajax({
							method: "get",
							url: "{{ url('destination/selected') }}",
							data: { arr: arrDes }
						}).done(function( response ) {
							$("select#field_itinerary_input5").empty();
							$.each(response, function(key, value) {
								$("select#field_itinerary_input5").append("<option value='"+value.destinationId+"'>"+value.destination+"</option>");
							})
						});
						$(document).scrollTop(0);
					}
				});
				$("section #button-step-4").click(function(){
					if($('#wizard_with_validation').valid()){
						$(this).closest("section").hide();
						$("section.step-4").show();
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
						$("section.step-5").show();
						$("div.step-5").css({
							"background-color": "orange",
							"border-bottom": "solid #00e600 5px"
						});
						$(document).scrollTop(0);
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
					$("input[name='maxPerson']").keyup(function(){
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
        $(document).ready(function()
        {
            $("input[name='endSellingDate']:text").bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'YYYY-MM-DD',  time: false
            }).on('change', function(e, date)
            {
                $("#scheduleField1,#scheduleField2").bootstrapMaterialDatePicker('setMaxDate', date);
            });
            $("input[name='startSellingDate']:text").bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'YYYY-MM-DD',  time: false, minDate : new Date()
            }).on('change', function(e, date)
            {
                $("input[name='endSellingDate']:text, #scheduleField1").bootstrapMaterialDatePicker('setMinDate', date);
            });
            
            $("#scheduleField1").bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'YYYY-MM-DD',  time: false
            }).on('change', function(e, date)
            {
                $("#scheduleField2").bootstrapMaterialDatePicker('setMinDate', date);
            });
            
            $("#scheduleField2").bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'YYYY-MM-DD',  time: false
            })

            $("#scheduleField4").bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'HH:mm',  date: false
            });
            $("#scheduleField3").bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'HH:mm',  date: false
            }).on('change', function(e, date)
            {
                $("#scheduleField4").bootstrapMaterialDatePicker('setMinDate', date);
            });
            $("#scheduleField5").bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'YYYY-MM-DD',  time: false
            })
            $("#field_itinerary_input2").bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'HH:mm', date: false
            })
            $("#field_itinerary_input3").bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'HH:mm',  date: false
            })

        });
    </script>
<!-- Schedule-->
    <script>
      $(document).ready(function () {
        var type;
        $("input[name='scheduleType']:radio").change(function () {
          $("#schedule_body").show(200);
          type = this.value;
          if(type == 1){
			$("#scheduleCol1").find("h5").text("Start Date*");
            $("#scheduleCol1, #scheduleCol2, #scheduleCol5, #scheduleCol6, .scheduleDays").show();
            $("#scheduleCol3, #scheduleCol4, .scheduleHours").removeAttr("required").hide();
            $("#clone_dinamic_schedule").empty();
            $("#dinamic_schedule input").val(null);
          }else if(type == 2){
			$("#scheduleCol1").find("h5").text("Date*");
            $("#scheduleCol1, #scheduleCol3, #scheduleCol4, #scheduleCol6, .scheduleHours").show();
            $("#scheduleCol2, #scheduleCol5, .scheduleDays").removeAttr("required").hide();
            $("#clone_dinamic_schedule").empty();
            $("#dinamic_schedule input").val(null);
          }else{
			$("#scheduleCol1").find("h5").text("Date*");  
            $("#scheduleCol2, #scheduleCol3, #scheduleCol4, .scheduleDays, .scheduleHours").removeAttr("required").hide();;
            $("#scheduleCol1, #scheduleCol5").show();
            $("#clone_dinamic_schedule").empty();
            $("#dinamic_schedule input").val(null);
          }
        });
        var i = 0;
        $("#add_more_schedule").click(function(){
			i++;
            var length = $("#clone_dinamic_schedule").find("#scheduleField2").length;
            if(type == 1){
                if(length != 0){
                    var minDate = $("#clone_dinamic_schedule").find("#scheduleField2").last().val();
                }
            }else{
                if(length != 0){
                    var minDate = $("#clone_dinamic_schedule").find("#scheduleField1").last().val();
                }
            }
            $("#dinamic_schedule").clone().appendTo("#clone_dinamic_schedule").addClass("row dinamic_schedule"+i);
            $(".dinamic_schedule"+i+" .col-md-1").append('<button type="button" id="delete_schedule" class="btn btn-danger waves-effect"><i class="material-icons">clear</i></button>');
            $(".dinamic_schedule"+i+" #scheduleField1").attr("name","schedule["+i+"][startDate]").bootstrapMaterialDatePicker({
                    weekStart: 0, format: 'YYYY-MM-DD',  time: false, minDate : minDate
                }).on('change', function(e, date){
                    $(this).closest("#dinamic_schedule").find("#scheduleField2").bootstrapMaterialDatePicker('setMinDate', date);
                });
            $(".dinamic_schedule"+i+" #scheduleField2").attr("name","schedule["+i+"][endDate]").bootstrapMaterialDatePicker({
                    weekStart: 0, format: 'YYYY-MM-DD',  time: false
                });
            $(".dinamic_schedule"+i+" #scheduleField3").attr("name","schedule["+i+"][startHours]").bootstrapMaterialDatePicker({
                    format: 'HH:mm',  date: false
                }).on('change', function(e, date){
                    $(this).closest("#dinamic_schedule").find("#scheduleField4").bootstrapMaterialDatePicker('setMinDate', date);
                });
            $(".dinamic_schedule"+i+" #scheduleField4").attr("name","schedule["+i+"][endHours]").bootstrapMaterialDatePicker({
                    format: 'HH:mm',  date: false
                });
            $(".dinamic_schedule"+i+" #scheduleField5").attr("name","schedule["+i+"][maxBookingDate]").bootstrapMaterialDatePicker({
                    weekStart: 0, format: 'YYYY-MM-DD',  time: false
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
				$.ajax({
				  method: "GET",
				  url: "{{ url('/city') }}",
				  data: {
				  	id: $(this).val()
				  }
				}).done(function(response) {
					me2.closest("#dinamic_destination").find("#destinationField3").append(
						"<option value=''></option>"
					);
					$.each(response, function (index, value) {
						me2.closest("#dinamic_destination").find("#destinationField3").append(
							"<option value="+value.id+">"+value.name+"</option>"
						);
					});
				});
			});
            // $('select[name="destination[]"]').select2({
            //     placeholder: 'Cari...',
            //     ajax: {
            //     url: "{{ url('/destination')}}",
            //     dataType: 'json',
            //     delay: 250,
            //     data: function(params) {
            //     	return {
	           //          q: params.term // search term
	           //      };
	           //  },
            //     processResults: function (data) {
            //         return {
            //         results:  $.map(data, function (item) {
            //             return {
            //             text: item.destination,
            //             id: item.destinationId
            //             }
            //         })
            //         };
            //     },
            //     cache: true
            //     }
            // });
            var i = 0;
            $("#add_more_destination").click(function(){
                i++;
				console.log(i);
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
                $(".dinamic_destination"+i).find("#destinationField2").removeAttr("name").attr("name","place["+i+"][city]");
                $(".dinamic_destination"+i).find("#destinationField3").removeAttr("name").attr("name","place["+i+"][destination]");
      //           $(".dinamic_destination"+i).find("span,select").remove();
      //           $(".dinamic_destination"+i+" .col-md-6").append($("<select>"));
      //           $(".dinamic_destination"+i+" .col-md-6 select").addClass("form-control dest_list").attr("name","destination[]").select2({
						// placeholder: 'Cari...',
		    //             ajax: {
		    //             url: "{{ url('/destination')}}",
		    //             dataType: 'json',
		    //             delay: 250,
		    //             processResults: function (data) {
	     //                return {
	     //                results:  $.map(data, function (item) {
	     //                    return {
	     //                    text: item.destination,
	     //                    id: item.destinationId
	     //                    }
	     //                })
      //               };
      //           },
      //           cache: true
      //           }
      //       });
                // $(".dinamic_destination"+i+" .col-md-6").append($("<select>"));
                // $(".dinamic_destination"+i+" .col-md-6 select").addClass("form-control dest_list").attr("name","destination[]").select2({
                //     placeholder: 'Cari...',
                //     ajax: {
                //     url: "{{ url('/destination')}}",
                //     dataType: 'json',
                //     delay: 250,
                //     processResults: function (data) {
                //         return {
                //         results:  $.map(data, function (item) {
                //             return {
                //             text: item.destination,
                //             id: item.destinationId
                //             }
                //         })
                //         };
                //     },
                //     cache: true
                //     }
                // });;
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
                var val = $(this).val();
                if(val == 1)
                {
                    $("#price_fix").show();
                    $("#price_table_container").hide();
                    $("#price_list_container").empty();
                }else{
                    $("#price_fix").hide();
                    $("#price_table_container, #price_list").show();
                    var val = $("input[name='maxPerson']:text").val();
                    var i;
                    for(i=0;i<val;i++)
                    { 
                        $("#price_list").clone().appendTo("#price_list_container").attr("id","price_list"+i);
                        $("#price_list"+i+" .row .col-md-1 h5").append((i+1));
                        $("#price_list"+i+" #price_list_field1").val((i+1));
                        $("#price_list"+i+" #price_list_field1").attr("name","price["+i+"][people]");
                        $("#price_list"+i+" #price_list_field2").attr("name","price["+i+"][IDR]");
                        $("#price_list"+i+" #price_list_field3").attr("name","price["+i+"][USD]");                   
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
			$("input[name='scheduleType']:radio").change(function(){
				$("#itineraryGenerate").empty();
				$("#itinerary_list").show();
				var val = $(this).val();
				if(val == 1){
					$("input[name='schedule[0][endDate]']:text").change(function(){
						$("#itineraryGenerate").empty();
						$("#itinerary_list").show();
						var end = new Date($(this).val());
						var start = new Date($("input[name='schedule[0][startDate]']:text").val()); 
						var dif = end.getTime() - start.getTime();
						var days = parseInt(dif/(1000*60*60*24))+1;
						var j = 0;
						var i;
						for(i=0;i<days;i++)
						{ 
							$("#itinerary_list").clone().appendTo("#itineraryGenerate").addClass("body itinerary_list"+i);   
							$(".itinerary_list"+i+" h5:first").append("<b>Days "+(i+1)+"</b>"); 
							$(".itinerary_list"+i+" #field_itinerary_input1").attr("name","itinerary["+i+"][day]").val((i+1));
							$(".itinerary_list"+i+" #field_itinerary_input2").attr("name","itinerary["+i+"][list][0][startTime]").bootstrapMaterialDatePicker({
								weekStart: 0, format: 'HH:mm',  date: false
							}).on('change', function(e, date){
								$(this).closest("#itinerary_list").find("#field_itinerary_input3").bootstrapMaterialDatePicker('setMinDate', date);
							});
							$(".itinerary_list"+i+" #field_itinerary_input3").attr("name","itinerary["+i+"][list][0][endTime]").bootstrapMaterialDatePicker({
											format: 'HH:mm',  date: false
										});
							$(".itinerary_list"+i+" #field_itinerary_input4").attr("name","itinerary["+i+"][list][0][activityCategory]").change(function(){
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
							$(".itinerary_list"+i+" #field_itinerary_input5").attr("name","itinerary["+i+"][list][0][destination]");
							$(".itinerary_list"+i+" #field_itinerary_input6").attr("name","itinerary["+i+"][list][0][activity]");
							$(".itinerary_list"+i+" #field_itinerary_input7").attr("name","itinerary["+i+"][list][0][description]");
							$(".itinerary_list"+i+" .row .col-md-3 button").attr("onclick","addItineraryRow("+i+")");
						}
						$("#itinerary_list").hide();
					});
				}else{
					var days = 1;
					var j = 0;
					var i;
					for(i=0;i<days;i++)
					{ 
						$("#itinerary_list").clone().appendTo("#itineraryGenerate").addClass("body itinerary_list"+i);   
						$(".itinerary_list"+i+" h5:first").append("<b>Days "+(i+1)+"</b>"); 
						$(".itinerary_list"+i+" #field_itinerary_input1").attr("name","itinerary["+i+"][day]").val((i+1));
						$(".itinerary_list"+i+" #field_itinerary_input2").attr("name","itinerary["+i+"][list][0][startTime]").bootstrapMaterialDatePicker({
							weekStart: 0, format: 'HH:mm',  date: false
						}).on('change', function(e, date){
							$(this).closest("#itinerary_list").find("#field_itinerary_input3").bootstrapMaterialDatePicker('setMinDate', date);
						});
						$(".itinerary_list"+i+" #field_itinerary_input3").attr("name","itinerary["+i+"][list][0][endTime]").bootstrapMaterialDatePicker({
							format: 'HH:mm',  date: false
						});
						$(".itinerary_list"+i+" #field_itinerary_input4").attr("name","itinerary["+i+"][list][0][activityCategory]").change(function(){
							var a = $(this).val();
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
						$(".itinerary_list"+i+" #field_itinerary_input5").attr("name","itinerary["+i+"][list][0][destination]");
						$(".itinerary_list"+i+" #field_itinerary_input6").attr("name","itinerary["+i+"][list][0][activity]");
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
@endsection
