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
    <link href="{{ asset('plugins/bootstrap-file-input/css/fileinput.css') }}" rel="stylesheet">
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
<div class="card">
    <div class="body">
        <div class="col-md-6 font-20">
            <div class="col-md-4">
                <span class="col-grey"> Product List
            </div>
            <div class="col-md-1">
                <span class="col-grey"> >
            </div>
            <div class="col-md-7">
                {{$product->productName}} </span>  
            </div>
             </span>  <span>    
        </div>
        
        @if(session('productsupdate')==1)
        <div class="col-md-offset-1 col-md-5">
            <a href="{{url('/products/edit/'.$product->productId)}}" class="col-orange">
                <div class="col-md-4">
                    <i class="material-icons">mode_edit</i><span class="font-16">EDIT</span>
                </div>
            </a>
            <!-- <button id="editbutton" onclick="showedit()">Edit</button> -->
            @if(($product->status)== 'noactive')
            <div id="disabledProduct">
                <a href="javascript:enabled_product({{$product->productId}})" class="col-grey">
                    <div class="col-md-4">
                        <i class="material-icons">block</i><span class="font-16">DISABLE</span>
                    </div>
                </a>
            </div>
            <div id="enabledProduct" hidden>
                <a href="javascript:disabled_product({{$product->productId}})" class="col-orange">
                    <div class="col-md-4">
                        <i class="material-icons">check_circle</i><span class="font-16">ACTIVE</span>
                    </div>
                </a>
            </div>
            @else
            <div id="disabledProduct" hidden>
                <a href="javascript:enabled_product({{$product->productId}})" class="col-grey">
                    <div class="col-md-4">
                        <i class="material-icons">block</i><span class="font-16">DISABLE</span>
                    </div>
                </a>
            </div>
            <div id="enabledProduct">
                <a href="javascript:disabled_product({{$product->productId}})" class="col-orange">
                    <div class="col-md-4">
                        <i class="material-icons">check_circle</i><span class="font-16">ACTIVE</span>
                    </div>
                </a>
            </div>
            @endif
            <a href="{{url('/products/remove/'.$product->productId)}}" class="col-grey">
                <div class="">
                    <i class="material-icons">delete</i><span class="font-16">REMOVE</span>
                </div>
            </a>
        </div>
        @endif
    </div>
</div>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card" id="cardProductDetail">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="header">
                            <h4>{{$product->productName}}</h4>
                        </div>
                        <div class="body">
                            <div class="row form-line">
                                <div class="col-md-4">
                                    <p class="col-grey">Product Code</p>
                                </div>
                                <div class="col-md-8">
                                    <p>: {{$product->productCode}}</p>
                                </div>
							</div>
							<div class="row form-line">
									<div class="col-md-4">
										<p class="col-grey">Product Category</p>
									</div>
									<div class="col-md-8">
										<p>: {{$product->productCategory}}</p>
									</div>
								</div>
                            <div class="row form-line">
                                <div class="col-md-4">
                                    <p class="col-grey">Product Type</p>
                                </div>
                                <div class="col-md-8">
                                    <p>: {{$product->productType}}</p>
                                </div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<p class="col-grey">Meeting Point</p>
								</div>
								<div class="col-md-8">
									<p>: {{$product->meetingPointAddress}}
										<br>
										<a class="col-orange" href="https://www.google.com/maps/{{'@'.$product->meetingPointLatitude}},{{$product->meetingPointLongitude}},17z"><b>Open on map ></b></a>
									</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<p class="col-grey">Meeting Point Notes <br>
									(English)
									</p>
								</div>
								<div class="col-md-8">
									<p>: {{$product->meetingPointNoteEN}}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<p class="col-grey">Meeting Point Notes <br>
									(Indonesian)
									</p>
								</div>
								<div class="col-md-8">
									<p>: {{$product->meetingPointNote}}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<p class="col-grey">Activity Tags</p>
								</div>
								<div class="col-md-8">
									<p>: 
										@foreach($activity as $a)
											<span class="badge bg-blue-grey">{{$a->name}}</span>
										@endforeach
									</p>
								</div>
							</div>
                            <div class="row">
								<div class="col-md-4">
									<p class="col-grey">Term & Conditions <br>
										(English)
									</p>
								</div>
								<div class="col-md-8">
									<p>: {{$product->termConditionEN}}</p>
								</div>
							</div>
                            <div class="row">
								<div class="col-md-4">
									<p class="col-grey">Term & Conditions <br>
										(Indonesia)
									</p>
								</div>
								<div class="col-md-8">
									<p>: {{$product->termCondition}}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<p class="col-grey">Destination </p>
								</div>
								<div class="col-md-8">
									: <br>
									@foreach($destination as $d)
										<h5><i class="material-icons">room</i>{{$d->destination}}, {{$d->city}}, {{$d->province}}</h5>
									@endforeach
								</div>
							</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="body">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
										<img src="{{asset('images/image-gallery/11.jpg')}}" />
                                    </div>
                                    <div class="item">
										<img src="{{asset('images/image-gallery/12.jpg')}}" />
                                    </div>
                                    <div class="item">
										<img src="{{asset('images/image-gallery/13.jpg')}}" />
                                    </div>
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="body">
                            <ul class="nav nav-tabs tab-nav-right tab-col-orange" role="tablist">
                                <li role="presentation"  class="active"><a href="#destination" data-toggle="tab"><p class="col-orange">Destination</p></a></li>
                                <li role="presentation"><a href="#accommodation" data-toggle="tab"><p class="col-orange">Accommodation</p></a></li>
                                <li role="presentation"><a href="#activities" data-toggle="tab"><p class="col-orange">Activities</p></a></li>
                                <li role="presentation"><a href="#other" data-toggle="tab"><p class="col-orange">Other</p></a></li>
                                <li role="presentation"><a href="#video" data-toggle="tab"><p class="col-orange">Video</p></a></li>
                            </ul>
                        
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="destination">
                                    <table>
                                        <tr>
                                            <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <img src="{{asset('images/image-gallery/13.jpg')}}" alt="" class="img-responsive">
                                            </td>
                                            <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <img src="{{asset('images/image-gallery/14.jpg')}}" alt="" class="img-responsive">
                                            </td>
                                            <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <img src="{{asset('images/image-gallery/15.jpg')}}" alt="" class="img-responsive">
                                            </td>
                                            <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <img src="{{asset('images/image-gallery/16.jpg')}}" alt="" class="img-responsive">
                                            </td>
                                            <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <img src="{{asset('images/image-gallery/17.jpg')}}" alt="" class="img-responsive">
                                            </td>
                                            <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <img src="{{asset('images/image-gallery/18.jpg')}}" alt="" class="img-responsive">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="accommodation">
                                    <b>Accommodation Content</b>
                                    <p>
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="activities">
                                    <b>Activities Content</b>
                                    <p>
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="other">
                                    <b>Other Content</b>
                                    <p>
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </div>
                                
                                <div role="tabpanel" class="tab-pane fade" id="video">
                                    <b>Video Content</b>
                                    <p>
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- button --}}
                <div class="row" style="padding:20px">
                    <div class="col-md-2">
                        <button id="editProductDetail" class="btn btn-lg btn-block">Update Activity Info</button>
                    </div>
                </div>
            </div>
            <div class="card" id="formProductDetail" style="display:none">
                <div class="row clearfix">
                    <input type="hidden" name="productId" value="{{$product->productId}}">
                    <div class="col-md-6">
                        <div class="header">
                            <h4>{{$product->productName}}</h4>
                        </div>
                        <div class="body">
                            <div class="row form-line">
                                <div class="col-md-4">
                                    <p class="col-grey">Product Code</p>
                                </div>
                                <div class="col-md-8">
                                    <p>: {{$product->productCode}}</p>
                                </div>
                            </div>
                            <div class="row form-line">
                                    <div class="col-md-4">
                                        <p class="col-grey">Product Category</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>: {{$product->productCategory}}</p>
                                    </div>
                                </div>
                            <div class="row form-line">
                                <div class="col-md-4">
                                    <p class="col-grey">Product Type</p>
                                </div>
                                <div class="col-md-8">
                                    <p>: {{$product->productType}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Meeting Point</p>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="meetingPointAddress" value="{{$product->meetingPointAddress}}">
                                    <input type="hidden" name="meetingPointLatitude">
                                    <input type="hidden" name="meetingPointLongitude">
                                </div>
                            </div>
                            <div class="row form-line">
                                <div class="col-md-4">
                                    <p class="col-grey">Meeting Point Notes <br>
                                    (English)
                                    </p>
                                </div>
                                <div class="col-md-8" >
                                    <textarea name="meetingPointNote" id="" class="form-control" rows="5">{{$product->meetingPointNote}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Meeting Point Notes <br>
                                    (Indonesian)
                                    </p>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="meetingPointNote" id="" class="form-control" rows="10">{{$product->meetingPointNote}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Activity Tags</p>
                                </div>
                                <div class="col-md-8">
                                    <p>: 
                                        @foreach($activity as $a)
                                            <span class="badge bg-blue-grey">{{$a->name}}</span>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Term & Conditions <br>
                                        (English)
                                    </p>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="termConditionEN" id="" class="form-control" rows="10">{{$product->termConditionEN}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Term & Conditions <br>
                                        (Indonesia)
                                    </p>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="termCondition" id="" class="form-control" rows="10">{{$product->termCondition}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Destination </p>
                                </div>
                                <div class="col-md-8">
                                    <?php $urutan=0;?>
                                    @foreach($destination as $d)
                                        <h5><i class="material-icons">room</i>{{$d->destination}}, {{$d->city}}, {{$d->province}}</h5>
                                        <h4>Province</h4>
                                        <select id="province" name="destination[{{$urutan}}][province]" class="form-control">
                                            @foreach($province as $p)
                                            <option value="{{$p->id}}">{{$p->name}}</option>
                                            @endforeach
                                        </select>
                                        <h4>City</h4>
                                        <select id="city" name="destination[{{$urutan}}][city]" class="form-control">
                                            @foreach($city as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                        <h4>Destination</h4>
                                        <select id="destination" name="destination[{{$urutan}}][destination]" class="form-control">
                                            <option value="{{$d->destinationId}}">{{$d->destination}}</option>
                                        </select>

                                        <?php $urutan++;?>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="body">
                            <h5>Destination</h5>
                            <div class="file-loading">
                                <input type="file" name="destinationImage[]" id="destinationImage" multiple>
                            </div>
                            <h5>Accommodation</h5>
                            <div class="file-loading">
                                <input type="file" name="accommodationImage[]" id="accommodationImage" multiple>
                            </div>
                            <h5>Activities</h5>
                            <div class="file-loading">
                                <input type="file" name="activityImage[]" id="activityImage" multiple>
                            </div>
                            <h5>Other</h5>
                            <div class="file-loading">
                                <input type="file" name="otherImage[]" id="otherImage" multiple>
                            </div>
                            <h5>Video</h5>
                            <div class="file-loading">
                                <input type="file" name="videoUrl[]" id="videoUrl" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- button --}}
                <div class="row" style="padding:20px">
                    <div class="col-md-2">
                        <button id="updateProductDetail" type="submit" class="btn btn-lg btn-block">Update Activity Info</button>
                    </div>
                    <div class="col-md-2">
                        <button id="cancelProductDetail" class="btn btn-lg btn-block">Cancel</button>
                    </div>
                </div>
            </div>
		</div>
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="col-grey">Activity Schedule</h4>
				</div>
				<div class="body">
					<div class="row">
						<div class="col-md-2 col-grey">Activity Duration</div>
						<div class="col-md-2">: </div>
					</div>
					<div class="row">
						<div class="col-md-2 col-grey">Activity Schedule</div>
					</div>
					<div class="panel-group" id="accordion_9" role="tablist" aria-multiselectable="true">
						<table class="table">
							<thead>
								<th>DATE</th>
								<th>TIME</th>
								<th>Max. Booking Date</th>
								<th>Max. Person</th>
							</thead>
							<tbody>
								@foreach($schedule as $s)
								<tr>
									<td>{{date('d F Y', strtotime($s->startDate))}} - {{date('d F Y', strtotime($s->endDate))}}</td>
									<td>{{$s->startHours}} - {{$s->endHours}}</td>
									<td>{{date('d F Y', strtotime($s->startDate))}} </td>
									<td>{{$s->maximumBooking}}</td>									
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
                </div>
                <div class="header">
                    <h4 class="col-grey">Pricing</h4>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="body">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="col-grey">Pricing Option<p>
                            </div>
                            <div class="col-md-8">
                                : 
                                {{$price[0]->priceType}}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="col-grey">Pricing Schema<p>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    @foreach($price as $p)
                                    <div class="col-md-12">
                                        <p>{{$p->numberOfPerson}} person = Rp. {{$p->priceIDR}} / person</p>
                                        {{-- @if($p->priceUSD != null)
                                        <p>{{$p->numberOfPerson}} person = USD. {{$p->priceUSD}} / person</p>
                                        @endif --}}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="col-grey">Cancellation policy<p>
                            </div>
                            <div class="col-md-8">
                            @if($product->cancellationType=='No Cancellation' || $product->cancellationType=='Free Cancellation')
                            {{$product->cancellationType}}
                            @else
                            {{$product->cancellationType}}
                                <br>Cancel {{$product->minCancellationDay}} days prior schedule, cancellation fee is {{$product->cancellationFee}}
                                <br>{{$product->cancellationDetails}}
                            @endif
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Price Include
                                        <br> (English)
                                    </p>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        @foreach($includes as $i)
                                        <div class="col-md-12">- {{$i->description}}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Price Include
                                        <br> (Indonesian)
                                    </p>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        @foreach($includes as $i)
                                        <div class="col-md-12">- {{$i->description}}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Price Exclude
                                        <br> (English)
                                    </p>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        @foreach($excludes as $e)
                                        <div class="col-md-12">- {{$e->description}}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Price Exclude
                                        <br> (Indonesian)
                                    </p>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        @foreach($excludes as $e)
                                        <div class="col-md-12">- {{$e->description}}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
			</div>
		</div>
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="col-grey">Activity Details</h4>
				</div>
				<div class="body">
					@foreach($itinerary as $i)
					<div class="row">
						<div class="col-md-12">
							<h4>Day {{$i->day}}</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<h4>(Engish)</h4>
						</div>
						<div class="col-md-10">
							<p>: {{$i->description}}</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<h4>(Indonesia)</h4>
						</div>
						<div class="col-md-10">
							<p>: {{$i->description}}</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="col-grey">Proceed with Product Review</h4>
				</div>
				<div class="body">
					<div class="row form-group">
						<div class="col-md-12 ">
							<span>How do you want to proceed this product submission?</span>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12 ">
							<input type="checkbox" class="form-control" id="activateProduct">
							<label for="activateProduct" style="font-size:15px"> <b>Activate Product</b><br>
								Activating this Product will make this product appear online on Pigijo Website
							</label>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-2 ">
							<input type="button" value="Confirm" class="btn btn-lg btn-block">
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
    
    <script src="{{ asset('plugins/bootstrap-file-input/js/fileinput.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>
    <!-- Jquery Core Js -->
    
	<script type="text/javascript">
        var listDestinationImage = [];
        var listAccommodationImage = [];
        var listActivityImage = [];
        var listOtherImage = [];
		$(document).ready(function(){
            @foreach($image_destination as $id)
                listDestinationImage.push("{{url(''.$id->url)}}")
            @endforeach
            @foreach($image_accommodation as $ia)
                listAccommodationImage.push("{{url(''.$ia->url)}}")
            @endforeach
            @foreach($image_activity as $ia)
                listActivityImage.push("{{url(''.$ia->url)}}")
            @endforeach
            @foreach($image_other as $io)
                listOtherImage.push("{{url(''.$io->url)}}")
            @endforeach
			$("#destinationImage").fileinput({
                theme: 'fa',
                uploadUrl: "a",
                uploadAsync: false,
                maxFileCount: 5,
                maxFileSize: 5000,
                showCaption: false,
                showRemove: false,
                showCancel: false,
                showUpload: false,
                previewSettings:{
                    image: {width: "auto", height: "auto"},
                },
                initialPreview: listDestinationImage,
                initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @foreach($image_destination as $id)
                        {width: "120px", url: "{{url('admin/master/place/deletePhoto')}}", key:"{{$id->id}}"},    
                    @endforeach
                ],
                allowedFileTypes: ['image'],
                allowedFileExtensions: ["jpg", "png", "gif"],
                allowedPreviewTypes :['image'],
                extra: function() { 
                    $("#filePlacePhoto").find(".kv-file-upload").remove();;
                },
            });
            $("#accommodationImage").fileinput({
                theme: 'fa',
                uploadUrl: "a",
                uploadAsync: false,
                maxFileCount: 5,
                maxFileSize: 5000,
                showCaption: false,
                showRemove: false,
                showCancel: false,
                showUpload: false,
                previewSettings:{
                    image: {width: "auto", height: "auto"},
                },
                initialPreview: listAccommodationImage,
                initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @foreach($image_accommodation as $ia)
                        {width: "120px", url: "{{url('admin/master/place/deletePhoto')}}", key:"{{$ia->id}}"},    
                    @endforeach
                ],
                allowedFileTypes: ['image'],
                allowedFileExtensions: ["jpg", "png", "gif"],
                allowedPreviewTypes :['image'],
                extra: function() { 
                    $("#filePlacePhoto").find(".kv-file-upload").remove();;
                },
            });
            $("#activityImage").fileinput({
                theme: 'fa',
                uploadUrl: "a",
                uploadAsync: false,
                maxFileCount: 5,
                maxFileSize: 5000,
                showCaption: false,
                showRemove: false,
                showCancel: false,
                showUpload: false,
                previewSettings:{
                    image: {width: "auto", height: "auto"},
                },
                initialPreview: listActivityImage,
                initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @foreach($image_activity as $ia)
                        {width: "120px", url: "{{url('admin/master/place/deletePhoto')}}", key:"{{$ia->id}}"},    
                    @endforeach
                ],
                allowedFileTypes: ['image'],
                allowedFileExtensions: ["jpg", "png", "gif"],
                allowedPreviewTypes :['image'],
                extra: function() { 
                    $("#filePlacePhoto").find(".kv-file-upload").remove();;
                },
            });
            $("#otherImage").fileinput({
                theme: 'fa',
                uploadUrl: "a",
                uploadAsync: false,
                maxFileCount: 5,
                maxFileSize: 5000,
                showCaption: false,
                showRemove: false,
                showCancel: false,
                showUpload: false,
                previewSettings:{
                    image: {width: "auto", height: "auto"},
                },
                initialPreview: listOtherImage,
                initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @foreach($image_other as $io)
                        {width: "120px", url: "{{url('admin/master/place/deletePhoto')}}", key:"{{$io->id}}"},    
                    @endforeach
                ],
                allowedFileTypes: ['image'],
                allowedFileExtensions: ["jpg", "png", "gif"],
                allowedPreviewTypes :['image'],
                extra: function() { 
                    $("#filePlacePhoto").find(".kv-file-upload").remove();;
                },
            });
		});
        $("#updateProductDetail").click(function(){

        });
        $("#cancelProductDetail").click(function(){
            $("#formProductDetail").hide();
            $("#cardProductDetail").show();
        });
        $("#editProductDetail").click(function(){
            $("#cardProductDetail").hide();
            $("#formProductDetail").show();
        });
    </script>
@endsection
