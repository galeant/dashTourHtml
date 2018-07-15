@extends('admin.layouts.routing')

@section('header')
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>Jquery DataTable | Bootstrap Based Admin Template - Material Design</title>
	<!-- Favicon-->
	<link rel="icon" href="../../favicon.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
	<link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/telformat/css/intlTelInput.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />
	<style>
	[hidden] {
  display: none !important;
}</style>
@endsection

@section('page')
    <div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>Registration - Activity > {{$company->companyName}} </h2>
					</div>
				</div>
				<div class="card">
					<div class="body">
						<div class="row">
							<div class="col-md-4" >
								<h4>Partner Status</h4>
							</div>
							<div class="col-md-4 col-md-offset-3">
									<div class="row">
										<?php echo $message;?>
									</div>
									<div class="row">
										<span class="pull-right">Last Updated : {{$company->updated_at}}</span>
									</div>
							</div>
						</div>
					</div>
				</div>
				@if($company->status == "NotVerified" || $company->status == "AwaitingSubmission")
				<div class="card">
					<div class="row"> 
						<div class="col-md-6">
							<div class="header">
								<h2>PIC Information</h2>
							</div>
							<div class="body">
								<div class="row form-group">
									<div class="col-md-6">
										Email Address
									</div>
									<div class="col-md-6">
										: {{$company->email}}
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										Full Name
									</div>
									<div class="col-md-6">
										: {{$company->fullName}}
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										Phone Number
									</div>
									<div class="col-md-6">
										: {{$company->phone}}
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										Company / Business Name
									</div>
									<div class="col-md-6">
										: {{$company->companyName}}
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<form action="{{ url('/admin/partner/resendVerification') }}" method="post" enctype="multipart/form-data">
							@csrf
								<input type="hidden" name="email" value="{{$company->email}}">
								<div class="body" style="padding">
									<input type="submit" class="btn btn-lg" value="Resend Verivication Email">
								</div>
							</form>
						</div>
					</div>
				</div>
				@endif
				@if($company->status == "AwaitingModeration" || $company->status == "InsufficientData" || $company->status == "Rejected")
				<div class="card" id="detailInfo">
					<div class="row"> 
						<div class="col-md-6">
							<div class="header">
								<h2>PIC Information</h2>
							</div>
							<div class="body">
								<div class="row form-group">
									<div class="col-md-6">
										Email Address
									</div>
									<div class="col-md-6">
										: {{$company->email}}
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										Full Name
									</div>
									<div class="col-md-6">
										: {{$company->fullName}}
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										Phone Number
									</div>
									<div class="col-md-6">
										: {{$company->phone}}
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										Company / Business Name
									</div>
									<div class="col-md-6">
										: {{$company->companyName}}
									</div>
								</div>
							</div>
							<div class="header">
								<h2>Company / Business Information</h2>
							</div>
							<div class="body">
								<div class="row form-group">
									<div class="col-md-6">
										Company / Business Name
									</div>
									<div class="col-md-6">
										: {{$company->companyName}}
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										Ownership Type
									</div>
									<div class="col-md-6">
										: {{$company->companyFileReq}}
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										Phone Number
									</div>
									<div class="col-md-6">
										: {{$company->companyPhone}}
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										Email Address
									</div>
									<div class="col-md-6">
										: {{$company->companyEmail}}
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										City, Province
									</div>
									<div class="col-md-6">
										: {{$company->city}}, {{$company->province}}
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										Address
									</div>
									<div class="col-md-6">
										: {{$company->companyAddress}}
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										Postal Code
									</div>
									<div class="col-md-6">
										: {{$company->companyPostal}}
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="header">
								<h2>Payment Data</h2>
							</div>
							<div class="body">
								<div class="row form-group">
									<div class="col-md-6">
										Bank Name
									</div>
									<div class="col-md-6">
										: {{$company->companyBankName}}
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										Bank Account Number
									</div>
									<div class="col-md-6">
										: {{$company->companyBankAccountNumber}}
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										Bank Account Holder Name
									</div>
									<div class="col-md-6">
										: {{$company->companyBankAccountName}}
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										Bank Account Proof
									</div>
									<div class="col-md-6">
										: 	<a href="{{asset($company->bankAccountScanUrl)}}">Download Document</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" style="padding:30px">
						<input type="button" class="btn btn-lg" value="Update Partner" id="buttonEditPartner">
					</div>
				</div>
				<div class="card" id="editInfo" style="display:none">
					<form action="{{ url('/admin/partner/updatePartner') }}" method="post" enctype="multipart/form-data">
					@csrf
						<input type="hidden" name="companyId" value="{{$company->companyId}}">
						<div class="row"> 
							<div class="col-md-6">
								<div class="header">
									<h2>PIC Information</h2>
								</div>
								<div class="body">
									<div class="row form-group">
										<div class="col-md-6">
											Email Address
										</div>
										<div class="col-md-6">
											{{$company->email}}
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-6">
											Full Name
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control"name="fullName" value="{{$company->fullName}}">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-6">
											Phone Number
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control"name="phone" value="{{$company->phone}}">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-6">
											Company / Business Name
										</div>
										<div class="col-md-6">
											: {{$company->companyName}}
										</div>
									</div>
								</div>
								<div class="header">
									<h2>Company / Business Information</h2>
								</div>
								<div class="body">
									<div class="row form-group">
										<div class="col-md-6">
											Company / Business Name
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control"name="companyName" value="{{$company->companyName}}">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-6">
											Ownership Type
										</div>
										<div class="col-md-6">
											<select name="companyFileReq" id="" class="form-control">
												<option value="company">Corporate</option>
												<option value="personal">Personal</option>
											</select>
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-6">
											Phone Number
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control"name="companyPhone" value="{{$company->companyPhone}}">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-6">
											Email Address
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control"name="companyEmail" value="{{$company->companyEmail}}">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-6">
											Province
										</div>
										<div class="col-md-6">
											<select name="companyProvince" id="province" class="form-control">
												@foreach($province as $p)
												<option value="{{$p->id}}">{{$p->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-6">
											City
										</div>
										<div class="col-md-6">
											<select name="companyCity" id="city" class="form-control">
												@foreach($city as $c)
												<option value="{{$c->id}}">{{$c->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-6">
											Address
										</div>
										<div class="col-md-6">
											<textarea name="companyAddress" id="" rows="3">
												{{$company->companyAddress}}
											</textarea>
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-6">
											Postal Code
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control"name="companyPostal" value="{{$company->companyPostal}}">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="header">
									<h2>Payment Data</h2>
								</div>
								<div class="body">
									<div class="row form-group">
										<div class="col-md-6">
											Bank Name
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control"name="companyBankName" value="{{$company->companyBankName}}"> 
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-6">
											Bank Account Number
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control"name="companyBankAccountNumber" value="{{$company->companyBankAccountNumber}}">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-6">
											Bank Account Holder Name
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control" name="companyBankAccountName" value="{{$company->companyBankAccountName}}">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-6">
											Bank Account Proof
										</div>
										<div class="col-md-6">
											<label for="updateBankAccountUrl">Update Bank Account Proof</label>
											<input type="file" class="form-control" id="updateBankAccountUrl" name="companyBankAccountUrl">
										</div>
									</div>
									<div class="row form-group">
										<img src="{{asset($company->bankAccountScanUrl)}}" alt="" class="img-responsive">
									</div>
								</div>
							</div>
						</div>
						<div class="row" style="padding:30px">
							<input type="submit" class="btn btn-lg bg-orange" value="Save" id="buttonUpdatePartner">
							<input type="button" class="btn btn-lg" value="Cancel" id="buttonCancelPartner" style="margin-left:30px">
						</div>
					</form>
				</div>
				<div class="card">
					<div class="header">
						<h4>Important Document</h4>
					</div>
					<div class="body">
						<div class="row form-group">
							<div class="col-md-4">
								<h4>Company Article of Association</h4>
								<span>Akta Pendirian Perusahaan</span>
							</div>
							<div class="col-md-6 col-md-offset-2">
								@if($company->aktaUrl == null || $company->aktaUrl == "")
								<form action="{{ url('/admin/partner/updateAkta') }}" method="post" enctype="multipart/form-data">
								@csrf
									<input type="hidden" name="companyId" value="{{$company->companyId}}">
									<label class="btn btn-lg pull-right">
										Upload Document <input type="file" name="aktaPic" id="aktaPic" hidden>
									</label>
									<button type="submit" hidden></button>
								</form>
								@else
									<div class="pull-right">
										<a href="{{asset($company->aktaUrl)}}" class="font-bold col-orange">Download Document</a>
										<a href="{{ url('/admin/partner/deleteAkta'.'/'.$company->companyId) }}" style="margin-left:2em">Remove</a>
									</div>
								@endif
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-4">
								<h4>SIUP /TDP</h4>
								<span>Surat Izin Usaha Perdagangan /Tanda Daftar Perusahaan</span>
							</div>
							<div class="col-md-6 col-md-offset-2">
								@if($company->siupUrl == null || $company->siupUrl == "")
								<form action="{{ url('/admin/partner/updateSIUP') }}" method="post" enctype="multipart/form-data">
								@csrf
									<input type="hidden" name="companyId" value="{{$company->companyId}}">
									<label class="btn btn-lg pull-right">
										Upload Document <input type="file" name="SIUPPic" id="siupPic" hidden>
									</label>
									<button type="submit" hidden></button>
								</form>
								@else
									<div class="pull-right">
										<a href="{{asset($company->siupUrl)}}"  class="font-bold col-orange">Download Document</a>
										<a href="{{ url('/admin/partner/deleteSIUP'.'/'.$company->companyId) }}" style="margin-left:2em">Remove</a>
									</div>
								@endif
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-4">
								<h4>Company's Tax Number</h4>
								<span>NPWP Perusahaan</span>
							</div>
							<div class="col-md-6 col-md-offset-2">
								@if($company->npwpUrl == null || $company->npwpUrl == "")
								<form action="{{ url('/admin/partner/updateNPWP') }}" method="post" enctype="multipart/form-data">
								@csrf
									<input type="hidden" name="companyId" value="{{$company->companyId}}">
									<label class="btn btn-lg pull-right">
										Upload Document <input type="file" name="NPWPPic" id="npwpPic" hidden>
									</label>
									<button type="submit" hidden></button>
								</form>
								@else
									<div class="pull-right">
										<a href="{{asset($company->npwpUrl)}}" class="font-bold col-orange">Download Document</a>
										<a href="{{ url('/admin/partner/deleteNPWP'.'/'.$company->companyId) }}" style="margin-left:2em">Remove</a>
									</div>
								@endif
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-4">
								<h4>Company's Owner Identity Card</h4>
								<span>KTP Direksi Perusahaan</span>
							</div>
							<div class="col-md-6 col-md-offset-2">
								@if($company->ktpUrl == null || $company->ktpUrl == "")
								<form action="{{ url('/admin/partner/updateKTP') }}" method="post" enctype="multipart/form-data">
								@csrf
									<input type="hidden" name="companyId" value="{{$company->companyId}}">
									<label class="btn btn-lg pull-right">
										Upload Document <input type="file" name="KTPPic" id="ktpPic" hidden>
									</label>
									<button type="submit" hidden></button>
								</form>
								@else
									<div class="pull-right">
										<a href="{{asset($company->ktpUrl)}}" class="font-bold col-orange">Download Document</a>
										<a href="{{ url('/admin/partner/deleteKTP'.'/'.$company->companyId) }}" style="margin-left:2em">Remove</a>
									</div>
								@endif
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="header">
						<h4>Product Sample</h4>
					</div>
					<div class="body">
						<div class="row form-group">
							<div class="col-md-6">
								<div class="col-md-4">
									Product Code
								</div>
								<div class="col-md-4" >
									: {{$company->companyId}}
								</div>
								<br>
								<div class="col-md-4">
									Product Name
								</div>
								<div class="col-md-4" >
									: {{$company->companyId}}
								</div>
							</div>
							<div class="col-md-4 col-md-offset-2">
								<input type="text" class="btn btn-lg pull-right" value="View Sample">
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<form action="{{ url('/admin/partner/registration') }}" method="post" enctype="multipart/form-data">
					@csrf
						<input type="hidden" name="companyId" value="{{$company->companyId}}">
						<div class="header">
							<h4>Proceed with Partner Registration</h4>
						</div>
						<div class="body">
							How do you want to proceed with this partner's registration?
							<div class="row form-group">
								<div class="col-md-6">
									<div class="radio">
										<input type="radio" name="proceedPartner" id="proceedPartner1" value="Insufficient Data" class="InsufficientData" required>
										<label for="proceedPartner1"><b>Insufficient Data</b><br>
											Please registration form to the partner as data supplied is insufficient/incorrect. 
											Please give a short notes on what should the partner do to fix this on the memmo below.
										</label>
									</div>
									<div class="radio">
										<input type="radio" name="proceedPartner" id="proceedPartner2" value="Reject Partner"  class="Rejected" >
										<label for="proceedPartner2"><b>Reject Partner</b><br>
											Deecline this partner's registration permanently. please specify your reason below.
										</label>
									</div>
									<div class="radio">
										<input type="radio" name="proceedPartner" id="proceedPartner3" value="Approve and Activate Partner"  class="Active">
										<label for="proceedPartner3"><b>Approve and Activate Partner</b><br>
										All data provided is correct. Approve and activated this partner's account.
										</label>
									</div>
								</div>
								<div class="col-md-12">
									<h5>Registration Memo</h5>
									<textarea name="registrationMemo" id="registrationMemo" class="form-control" rows="5">{{$memo}}</textarea>
								</div>
								<div class="col-md-2">
									<br>
									<input type="submit" class="form-control">
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="card">
					<div class="body" style="padding-left: 40px">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-2 col-md-offset-6">
										<button type="button" id="back" class="btn btn-block bg-deep-orange waves-effect">
											<i class="material-icons">replay</i>
											<span>BACK</span>
										</button>
									</div>
									<div class="col-md-2">
										<button type="button" id="approve" class="btn btn-block bg-green waves-effect">
											<i class="material-icons">done_all</i>
											<span>APPROVE</span>
										</button>
									</div>
									<div class="col-md-2">
										<button type="button" id="decline" class="btn btn-block bg-red waves-effect">
											<i class="material-icons">warning</i>
											<span>DECLINE</span>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>  
				@endif
			</div>
		</div>
    </div>
@endsection

@section('footer')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('plugins/node-waves/waves.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('plugins/telformat/js/intlTelInput.js') }}"></script>
    <script src="{{ asset('plugins/mask-js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>
    <!-- Jquery Core Js -->
    
	<script type="text/javascript">
	
		$(document).ready(function(){
			$("select[name='companyFileReq']").find("option[value='{{$company->companyFileReq}}']").attr('selected', 'selected')

			$("select[name='companyProvince']").find("option[value='{{$company->companyProvince}}']").attr('selected', 'selected')
			$("select[name='companyCity']").find("option[value='{{$company->companyCity}}']").attr('selected', 'selected')
			$("input[name='proceedPartner'][class='{{$registrationProceed}}']").prop('checked', true)
			$("#aktaPic, #siupPic, #npwpPic, #ktpPic").on('change', function(){
				$(this).closest("div").find("button[type='submit']").click();
			});
			$("select[name='companyProvince']").change(function(){
                var idProvince = $(this).val();
                $("select[name='companyCity']").empty();
                $.ajax({
                    method: "GET",
                    url: "{{ url('/admin/dataapi/findCity') }}"+"/"+idProvince
                }).done(function(response) {
                    $.each(response, function (index, value) {
                        $("select[name='companyCity']").append(
                            "<option value="+value.id+">"+value.name+"</option>"
                        );
                    });
                });
            });
		});
    	var stat = '{{ $company->status}}';
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
		$("#buttonEditPartner").click(function(){
			$("#detailInfo").hide();
			$("#editInfo").show();			
		});
		$("#buttonCancelPartner").click(function(){
			$("#detailInfo").show();
			$("#editInfo").hide();			
		});
    </script>
@endsection
