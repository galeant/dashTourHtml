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
										<?php echo $status;?>
									</div>
									<div class="row">
										<span class="pull-right">Last Updated : {{$company->updated_at}}</span>
									</div>
							</div>
						</div>
					</div>
				</div>
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
											<select name="province" id="province" class="form-control">
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
											<select name="province" id="province" class="form-control">
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
					<div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
						<div class="panel">
							<div class="panel-heading" role="tab" id="tabImportantDocument">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" href="#bodyImportantDocument" aria-expanded="true" aria-controls="bodyImportantDocument">
										<div class="row">
											<div class="col-md-12">
												<h4>Important Document
													<i class="material-icons pull-right">keyboard_arrow_down</i>
												</h4>
											</div>
										</div>
									</a>
								</h4>
							</div>
							<div id="bodyImportantDocument" class="panel-collapse collapse" role="tabpanel" aria-labelledby="tabImportantDocument">
								<div class="panel-body">
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
													<a href="{{asset($company->aktaUrl)}}">Download Document</a>
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
													<a href="{{asset($company->siupUrl)}}">Download Document</a>
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
													<a href="{{asset($company->npwpUrl)}}">Download Document</a>
													<a href="" style="margin-left:2em">Remove</a>
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
													<a href="{{asset($company->aktaUrl)}}">Download Document</a>
													<a href="" style="margin-left:2em">Remove</a>
												</div>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
						<div class="panel">
							<div class="panel-heading" role="tab" id="tabMemberAccount">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" href="#bodyMemberAccount" aria-expanded="true" aria-controls="bodyMemberAccount">
										<div class="row">
											<div class="col-md-12">
												<h4>Partner Member Account
													<i class="material-icons pull-right">keyboard_arrow_down</i>
												</h4>
											</div>
										</div>
									</a>
								</h4>
							</div>
							<div id="bodyMemberAccount" class="panel-collapse collapse" role="tabpanel" aria-labelledby="tabMemberAccount">
								<div class="panel-body">
									<div class="row form-group">
										@foreach($member as $m)
										<div class="header">
											<div class="row">
												<div class="col-md-1 align-center">
													<img src="{{asset('images/circle_grey.png')}}" class="img-responsive center-block">
												</div>
												<div class="col-md-4 align-left">
													{{$m->fullName}} <br>
													{{$m->email}}
													<input type="hidden" value="{{$m->email}}">
												</div>
												<div class="col-md-4">
													@if($m->roleId==1)
													<h5><i class="material-icons">people</i>Business Owner</h5>
													@elseif($m->roleId==2)
													<h5><i class="material-icons">people</i>Staff</h5>
													@endif
												</div>
												<div class="col-md-3 align-right">
													<input type="button" class="btn btn-lg btn-block" value="Send Change Password Email" onClick="sendChangePasswordEmail({{$m->userId}},{{$company->companyId}})">
												</div>
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
						<div class="panel">
							<div class="panel-heading" role="tab" id="tabDisabledPartner">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" href="#bodyDisabledPartner" aria-expanded="true" aria-controls="bodyDisabledPartner">
										<div class="row">
											<div class="col-md-12">
												<h4>Disabled Partner
													<i class="material-icons pull-right">keyboard_arrow_down</i>
												</h4>
											</div>
										</div>
									</a>
								</h4>
							</div>
							<div id="bodyDisabledPartner" class="panel-collapse collapse" role="tabpanel" aria-labelledby="tabDisabledPartner">
								<div class="panel-body">
									<div class="row form-group">
										<div class="col-md-8">
											Disabling partner account will affect teh following items related to this partner: <br>
											- Disable all partner account, including the partner's member account <br>
											- Disable all products of this partner
										</div>
										<div class="col-md-4">
											<a href="" class="align-center">
												<button class="btn btn-lg btn-block">Disable Partner</button>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
						<div class="panel">
							<div class="panel-heading" role="tab" id="tabProductList">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" href="#bodyProductList" aria-expanded="true" aria-controls="bodyProductList">
										<div class="row">
											<div class="col-md-12">
												<h4>Partner's Product List
													<i class="material-icons pull-right">keyboard_arrow_down</i>
												</h4>
											</div>
										</div>
									</a>
								</h4>
							</div>
							<div id="bodyProductList" class="panel-collapse collapse" role="tabpanel" aria-labelledby="tabProductList">
								<div class="panel-body">
									<div class="row form-group">
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
												<a href="">
													<input type="button" class="btn btn-lg pull-right" value="View Sample">
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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

			$("#aktaPic, #siupPic, #npwpPic, #ktpPic").on('change', function(){
				$(this).closest("div").find("button[type='submit']").click();
			});
		});
		function sendChangePasswordEmail(id, companyId){
			var email = '';
			$.ajax({
				type: 'GET',
				url: "{{ url('admin/partner/getEmail') }}"+"/"+id,
				success: function(response) {
					email = response;
					swal({
						title: "Are you sure?", 
						text: "Are you sure to send change email password?", 
						type: "warning",
						showCancelButton: true,
						closeOnConfirm: false,
						confirmButtonText: "Yes",
						confirmButtonColor: "#FF5722"
						},function() {
							$.ajax({
								type: 'POST',
								url: "{{ url('password/email') }}",
								data: {
									'_token': $('input[name=_token]').val(),
									'email': email
								},
								success: function(response) {
									swal(
									'Success!',
									'Please check your email!',
									'success'
									)
								}
							});	
						});
				}
			});
			
		}
		// function sendChangePasswordEmail(id, companyId){
		// 	swal({
	    //       title: "Are you sure?", 
	    //       text: "Are you sure that you this is OK?", 
	    //       type: "warning",
	    //       showCancelButton: true,
	    //       closeOnConfirm: false,
	    //       confirmButtonText: "Yes",
	    //       confirmButtonColor: "#FF5722"
	    //     },function() {
	    //     	$.ajax({
	    //             type: 'GET',
	    //             url: "{{ url('admin/partner/sendChangePassword') }}"+"/"+id,
	    //             success: function(response) {
	    //                 window.location.href = "{{ url('/admin/partner/index') }}"+"/"+companyId;
	    //             }
	    //         });
            	
        // 	});
		// }
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
