@extends('admin.layouts.routing')

@section('header')
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Jquery DataTable | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('') }}" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Bootstrap Select2 -->
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('plugins/telformat/css/intlTelInput.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-file-input/css/fileinput.css') }}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
	<link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />
	<style>
		@font-face { 
			font-family:CenturyGothicRegular; 
			src: url("{{ asset('fonts/CenturyGothicRegular.ttf') }}"); 
		}
		@font-face { 
			font-family:MyriadPro; 
			src: url("{{ asset('fonts/MyriadPro-Regular.otf') }}"); 
		}
		button{
			outline:none;
		}
		img{
			width: 100%;
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
							<section class="step-1" style="display: none">
								<div class="col-md-12" style="margin-top: 20px;">
								<h4>Personal Information</h4>
								<div class="col-md-10" style="margin-top:10px;">
									<div class="row">
										<div class="col-md-5" style="margin-top:10px;">
											<h5>Full Name* :</h5>
											<input type="text" class="form-control" name="fullName" value="{{$data->fullName}}" >
										</div>
										<div class="col-md-5" style="margin-top:10px;">
											<h5>Email:</h5>
											<input type="text" class="form-control" name="email" value="{{$data->email}}" >
										</div>
										<div class="col-md-5" style="margin-top: 10px;">
											<h5>Phone Number* :</h5>
											<input type="text" class="form-control" name="phone" value="{{$data->phone}}" >
										</div>
										<div class="col-md-5" style="margin-top: 10px;">
											<h5>What is your role ?* :</h5>
											<select class="form-control" name="role" >
												<option>Business Owner</option>
												<option>Staff</option>
												<option>Aggregator</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-12" style="margin-top:30px;">
									<div class="row">
										<h4>Company / Business Information</h4>
										<div class="col-md-10" style="margin-top:10px">
											<div class="valid-info">
												<h5>Company / Business Name*:</h5>
												<input type="text" class="form-control" name="companyName" value="{{$data->companyName}}">
											</div>
										</div>
										<div class="row" style="margin:0px">
											<div class="col-md-5" style="margin-top:10px;">
												<div class="valid-info">
													<h5>Company Phone Number*:</h5>
													<input type="text" class="form-control" name="companyPhone" value="{{$data->companyPhone}}">	
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
												<select class="form-control" name="companyProvince" ></select>
											</div>
										</div>
										<div class="col-md-5" style="margin-top: 10px;">
											<div class="valid-info">
												<h5>City / Regency*:</h5>
												<select class="form-control" name="companyCity" ></select>
											</div>
										</div>
										<div class="col-md-10" style="margin-top:10px">
											<div class="valid-info">
												<h5>Address*:</h5>
												<textarea rows="5" name="companyAddress" class="form-control no-resize" >{{$data->companyAddress}}</textarea>
											</div>
										</div>
										<div class="col-md-10" style="margin-top:10px;">
											<div class="valid-info">
												<h5>Postal Code*:</h5>
												<input type="text" class="form-control" name="companyPostal" value="{{$data->companyPostal}}" >
											</div>
										</div>
										<div class="col-md-10" style="margin-top:10px;">
											<div class="valid-info">
												<h5>Website Link:</h5>
												<input type="url" class="form-control" name="companyWeb" placeholder="http://" value="{{$data->companyWeb}}" >
											</div>
										</div>
										<div class="col-md-10" style="margin-top: 10px;">
											<div class="row valid-info">
												<div class="col-md-12">
													<h5>Do you have existing booking system?</h5>
                                                </div>
                                                <div class="col-md-2">
													<input name="bookingSystem" type="radio" id="1bo" class="radio-col-deep-orange" value="1" />
													<label for="1bo">Yes</label>
                                                </div>
                                                <div class="col-md-2">
													<input name="bookingSystem" type="radio" id="2bo" class="radio-col-deep-orange" value="2"/>
													<label for="2bo">No</label>
                                                </div>
											</div>
										</div>
										<div class="col-md-10" id="booking_system_name" style="display: none">
											<div class="valid-info">
												<h5>Booking system name:</h5>
												<input type="text" class="form-control" name="bookingSystemName" placeholder="Let it empty if you dont have one" value="{{$data->companyBookSystem}}">
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
												<select class="form-control" name="bankName">
													<option>BCA</option>
													<option>BNI</option>
												</select>
											</div>
										</div>
										<div class="col-md-7 mg-top-10px">
											<div class="valid-info">
												<h5>Bank Account Number*:</h5>
												<input type="text" class="form-control" name="bankAccountNumb" value="{{$data->companyBankAccountNumber}}">
											</div>
										</div>
										<div class="row" style="margin:0px">
											<div class="col-md-3 col-sm-3 col-xs-3 valid-info mg-top-10px">
												<h5>Title*:</h5>
												<select class="form-control" name="bankAccountHolderTitle" value="{{$data->companyBankAccountTitle}}">
													<option>Mr</option>
													<option>Mrs</option>
													<option>Miss</option>
												</select>
											</div>
											<div class="col-md-7 col-sm-7 col-xs-9 mg-top-10px">
												<div class="valid-info">
													<h5>Account Holder Name*:</h5>
													<input type="text" class="form-control" name="bankAccountHolderName" value="{{$data->companyBankAccountName}}">
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
												<img src="{{ asset($data->bankAccountScanUrl)}}" class="img-fluid" alt="Responsive image">
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
												<input name="onwershipType" type="radio" id="1o" class="radio-col-deep-orange" value="1" />
												<label for="1o">Corporate</label>
											</div>
											<div class="col-md-3">
												<input name="onwershipType" type="radio" id="2o" class="radio-col-deep-orange" value="2" />
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
													<img src="{{ asset($data->aktaUrl)}}" class="img-fluid" alt="Responsive image">	
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
													<img src="{{ asset($data->siupUrl)}}" class="img-fluid" alt="Responsive image">	
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
													<img src="{{ asset($data->npwpUrl)}}" class="img-fluid" alt="Responsive image">	
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
													<img src="{{ asset($data->ktpUrl)}}" class="img-fluid" alt="Responsive image">	
												</div>
												
											</div>
										</div>
										<div class="col-md-12" id="evi" style="display: none">
											<div class="row">
												<div class="col-md-4">
													<h5>Evidence you have a product</h5>
													<p>Contoh product/info product</p>
												</div>
												<div class="col-md-6" style="margin-top: 10px">
													<img class="img-responsive" src="{{ asset($data->evidanceUrl)}}" alt="Chania"> 
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
							<section class="step-2" style="display: block"> 
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
												<option>Private Group</option>
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
											<input type="text" class="form-control" name="productName" value="{{$data->products[0]->productName}}"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3 valid-info">
											<h5>Minimum Person*</h5>
											<input type="text" class="form-control" name="minPerson" value="{{$data->products[0]->minPerson}}"/>
										</div>
										<div class="col-md-3 valid-info">
											<h5>Maximum Person*</h5>
											<input type="text" class="form-control" name="maxPerson" value="{{$data->products[0]->maxPerson}}"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 valid-info">
											<h5>Starting Point/Gathering Point(where should your costumer meet you)?*</h5>
											<input type="text" id="pac-input" class="form-control" name="meetingPoint" value="{{$data->products[0]->meetingPointAddress}}"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 valid-info">
											<h5>Meeting Point Notes</h5>
											<textarea rows="4" name="meetingPointNotes" class="form-control no-resize">{{$data->products[0]->meetingPointNote}}</textarea>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 valid-info">
											<h5>PIC Name*</h5>
											<input type="text" class="form-control" value="{{$data->products[0]->PICName}}"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 valid-info">
											<h5>PIC Phone*</h5>
											<input type="tel" class="form-control" name="PICPhone" />
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 valid-info">
											<h5>Terms & Condition*</h5>
											<textarea rows="4" name="termCondition" class="form-control no-resize" required>{{$data->products[0]->termCondition}}</textarea>
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
											<input name="scheduleType" type="radio" id="1d" class="radio-col-deep-orange" value="1"/>
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
									<div id="schedule_body">
										@foreach($data->products[0]->schedules as $schedule)
										<div class="row" id="dinamic_schedule">
											<div class="col-md-3 valid-info" id="scheduleCol1">
												<h5>Start date*</h5>
												<input type="text" id="scheduleField1" class="form-control" name="schedule[0][startDate]" placeholder="YYYY-MM-DD" value="{{$schedule->startDate}}"/>
											</div>
											<div class="col-md-3 valid-info" id="scheduleCol2">
												<h5>End date*</h5>
												<input type="text" id="scheduleField2" class="form-control" name="schedule[0][endDate]" placeholder="YYYY-MM-DD" value="{{$schedule->endDate}}"/>
											</div>
											<div class="col-md-2 valid-info" id="scheduleCol3" style="display: none">
												<h5>Start hours *</h5>
												<input type="text" id="scheduleField3" class="form-control" name="schedule[0][startHours]" placeholder="HH:mm" value="{{$schedule->startHours}}"/>
											</div>
											<div class="col-md-2 valid-info" id="scheduleCol4" style="display: none">
												<h5>End hours*</h5>
												<input type="text" id="scheduleField4" class="form-control" name="schedule[0][endHours]" placeholder="HH:mm" value="{{$schedule->endHours}}"/>
											</div>
											<div class="col-md-3 valid-info" id="scheduleCol5">
												<h5>Max.Booking Date*</h5>
												<input type="text" id="scheduleField5" class="form-control" name="schedule[0][maxBookingDate]" placeholder="YYYY-MM-DD" value="{{$schedule->minBookingDateTime}}"/>
											</div>
											<div class="col-md-2 valid-info" id="scheduleCol6">
												<h5>Max.Booking*</h5>
												<input type="text" id="scheduleField6" class="form-control" name="schedule[0][maximumGroup]" value="{{$schedule->maximumBooking}}"/>
											</div>
											<div class="col-md-1" style="padding-top:25px "></div>
										</div>
										@endforeach
										<!-- <div id="clone_dinamic_schedule"></div>
										<div class="row" style="margin-top: 10px">
											<div class="col-md-3">
												<button type="button" class="btn btn-warning waves-effect" id="add_more_schedule">
													<i class="material-icons">add</i>
													<span>Add Schedule</span>
												</button>
											</div>
										</div> -->
									</div>
								</div>
								<div class="col-md-12">
									<h4>Tour / Activity Location</h4>
									<div class="row">
										<div class="col-md-12">
											<h5>List down all destination related to your tour package / activity.</h5>
											<h5>The more accurate you list down the destinations, better your product's peformance in search result.</h5>
										</div>
									<!-- </div>
									@foreach($data->products[0]->destinations as $destination)
									<div class="row" id="dinamic_destination">
										<div class="col-md-3 valid-info">
											<h5>Province*</h5>
											<select id="destinationField1" class="form-control" name="place[0][province]" style="width: 100%" required></select>
										</div>
										<div class="col-md-3 valid-info">
											<h5>City*</h5>
											<select id="destinationField2" class="form-control" name="place[0][city]" style="width: 100%" required></select>
										</div>
										<div class="col-md-4 valid-info">
											<h5>Destination</h5>
											<select id="destinationField3" class="form-control" name="place[0][destination]" style="width: 100%"></select>
											<b style="font-size:10px">Leave empty if you can't find the destination</b>
										</div>
										<div class="col-md-1" style="padding-top:25px "></div>
									</div>
									@endforeach -->
									<!-- <div id="clone_dinamic_destination"></div>
										<div class="row" style="margin-top: 10px">
											<div class="col-md-3">
											<button type="button" class="btn btn-warning waves-effect" id="add_more_destination">
												<i class="material-icons">add</i>
												<span>Add Destination</span>
											</button>
										</div>
									</div> -->
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
    <!-- Jquery Core Js -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-file-input/js/fileinput.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('plugins/node-waves/waves.js') }}"></script>


    <script src="{{ asset('plugins/telformat/js/intlTelInput.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('js/admin.js') }}"></script>

    <script src="{{ asset('plugins/mask-js/jquery.mask.min.js') }}"></script>
    <!-- Demo Js -->
    <script src="{{ asset('js/demo.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){ 
        	// DISABLED
        		$("input,select,textarea,radio").attr("disabled","");
        	// WIZARD
				$("section #button-step-1").click(function(){
					$(this).closest("section").hide();
					$("section.step-1,#header-form-1").show();
					$(document).scrollTop(0);
				});
				$("section #button-step-2").click(function(){
					$(this).closest("section").hide();
					$("section.step-2,#header-form-2").show();
					$(document).scrollTop(0);
				});
				$("section #button-step-3").click(function(){
					$(this).closest("section").hide();
					$("section.step-3").show();
					$(document).scrollTop(0);
				});
				$("section #button-step-4").click(function(){	
					$(this).closest("section").hide();
					$("section.step-4").show();
					$(document).scrollTop(0);
				});
				$("section #button-step-5").click(function(){
					$(this).closest("section").hide();
					$("section.step-5").show();
					$(document).scrollTop(0);
				});
			// TELFORMAT
	            $("input[name='phone']").val("{{$data->phone}}").intlTelInput({
	                separateDialCode: true,
				});
				$("input[name='companyPhone']").val("{{$data->companyPhone}}").intlTelInput({
	                separateDialCode: true,
				});
				$("input[name='PICPhone']").val("{{$data->products[0]->PICPhone}}").intlTelInput({
	                separateDialCode: true,
				});
			// ROLE
				$("select[name='role']").find("option:contains('{{$data->role}}')").attr("selected","selected");
			// PLACE
				$.ajax({
				  method: "GET",
				  url: "{{ url('/province') }}",
				}).done(function(response) {
					$.each(response, function (index, value) {
						$("select[name='companyProvince']").append(
							"<option value="+value.id+">"+value.name+"</option>"
						);
					});
					$("select[name='companyProvince']").find("option[value='{{$data->companyProvince}}']").attr("selected","selected");
				});
				$.ajax({
				  method: "GET",
				  url: "{{ url('/city') }}",
				   data: {
				  	id: '{{$data->companyProvince}}'
				  }
				}).done(function(response) {
					$.each(response, function (index, value) {
						$("select[name='companyCity']").append(
							"<option value="+value.id+">"+value.name+"</option>"
						);
					});
					$("select[name='companyCity']").find("option[value='{{$data->companyCity}}']").attr("selected","selected");
				});
			//  BOOK SYSTEM
				@if($data->companyBookSystem != "" || $data->companyBookSystem != null)
					$("input[name='bookingSystem'][value='1']").attr("checked","");
					$("#booking_system_name").show();
				@else
					$("input[name='bookingSystem'][value='2']").attr("checked","");
				@endif
			// BANK TITLE/BANK NAME
				$("select[name='bankName']").find("option:contains('{{$data->companyBankName}}')").attr("selected","selected");
				$("select[name='bankAccountHolderTitle']").find("option:contains('{{$data->companyBankAccountTitle}}')").attr("selected","selected");
			// PIC DOC
				@if($data->companyFileReq == "personal")
					$("input[name='onwershipType'][value='2']").attr("checked","");
					$("#npwp,#ktp").show();
					$("#akta,#siup,#evi").hide();
				@else
					$("input[name='onwershipType'][value='1']").attr("checked","");
					$("#akta,#siup,#evi,#npwp,#ktp").show();
				@endif

			//  PRODUCT
				// CATEGORY
					$("select[name='productCategory']").find("option:contains('{{$data->products[0]->productCategory}}')").attr("selected","selected");
				// TYPE
					$("select[name='productType']").find("option:contains('{{$data->products[0]->productType}}')").attr("selected","selected");
				//  SCHEDULE
					@if($data->products[0]->schedules[0]->startDate != $data->products[0]->schedules[0]->endDate)
						$("input[name='scheduleType'][value='1']").attr("checked","");
						$("div#scheduleCol3,div#scheduleCol4").each(function(){
							$(this).hide();
						});
						$("div#scheduleCol1,div#scheduleCol2,div#scheduleCol5,div#scheduleCol6").each(function(){
							$(this).show();
						});
					@else
						@if($data->products[0]->schedules[0]->startHours == "00:00:00" && $data->products[0]->schedules[0]->endHours == "23:59:59")
							$("input[name='scheduleType'][value='3']").attr("checked","");
							$("div#scheduleCol2,div#scheduleCol3,div#scheduleCol4").each(function(){
								$(this).hide();
							});
							$("div#scheduleCol1,div#scheduleCol5,div#scheduleCol6").each(function(){
								$(this).show();
							});
						@else
							$("input[name='scheduleType'][value='2']").attr("checked","");
							$("div#scheduleCol2").each(function(){
								$(this).hide();
							});
							$("div#scheduleCol1,div#scheduleCol3,div#scheduleCol4,div#scheduleCol5,div#scheduleCol6").each(function(){
								$(this).show();
							});
						@endif
					@endif
				// DESTINATION
					// $.ajax({
					//   method: "GET",
					//   url: "{{ url('/province') }}",
					// }).done(function(response) {
					// 	$.each(response, function (index, value) {
					// 		$("#destinationField1").append(
					// 			"<option value="+value.id+">"+value.name+"</option>"
					// 		);
					// 	});
					// 	$("#destinationField1").find("option[value='{{$destination->companyProvince}}']").attr("selected","selected");
					// });
					// $.ajax({
					//   method: "GET",
					//   url: "{{ url('/city') }}",
					//    data: {
					//   	id: '{{$data->companyProvince}}'
					//   }
					// }).done(function(response) {
					// 	$.each(response, function (index, value) {
					// 		$("#destinationField2").append(
					// 			"<option value="+value.id+">"+value.name+"</option>"
					// 		);
					// 	});
					// 	$("#destinationField2").find("option[value='{{$destination->companyCity}}']").attr("selected","selected");
					// });
					// destination belum ada
		});
    </script>
@endsection
