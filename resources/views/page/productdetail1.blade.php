@extends('layouts.routing')
@section('header')
<meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Products - Pigijo Supplier Dashboard</title>

    <!-- Favicon-->
    <link rel="icon" href="{{url('/images/logo.png')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Bootstrap Select2 -->
    <link href="../../plugins/select2/select2.min.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="../../plugins/bootstrap-file-input/css/fileinput.css" rel="stylesheet" media="all">
    <link href="../../plugins/bootstrap-file-input/themes/explorer-fa/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <!-- noUISlider Css -->
    <link href="../../plugins/nouislider/nouislider.min.css" rel="stylesheet" />
    <!-- Date range picker -->
    <link href="../../plugins/boostrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
    
    <script src="../../plugins/jquery/jquery.min.js"></script>
   
    <style>
        .alignleft{
            float:left;
        }
        .alignright{
            float:right;
        }
        .fontgreen{
            color: green;
        }
        .rounded {
            border-radius: 10px;
        }
        .table-bordered td {border: none !important; padding:none;}
        .table-bordered {border: none !important;}
        .trdetail{padding: none;
        }

        div#input,
        div#button-save,
        div#button-cancel{
            display: none;
        }
        .card .row{
            margin-top: 5px;
        }
        
    </style>
    
@endsection

@section('page')
<div class="container-fluid" style="padding: 0 5 0 5 ">
    <form id="form" action="{{ url('/products/update1') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="productId" value="{{$product->productId}}">
        <div class="card" id="productInfo">
            <div class="header" style="padding: 0px">
                <div class="row clearfix" >
                    <div class="col-md-2 col-md-offset-10">
                        <h3>{{$product->status}}</h3>
                    </div>
                </div>
            </div>
            <div class="body" style="padding:0 25px">
                <div class="row clearfix">
                    <div class="col-md-6" >
                        <h3>{{ $product->productName}}</h3>
                        <h4>Product Code: {{ $product->productCode}}</h4>
                        <hr style="margin: 10px 0">
                        <div class="row" id="field">
                            <div class="col-md-4"><label>Product Category</label></div>
                            <div class="col-md-8" id="value">{{$product->productCategory}}</div>
                            <div class="col-md-6" id="input">
                                <select name="productCategory" class="form-control show-tick">
                                    <option sel="act">Activity</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" id="field">
                            <div class="col-md-4"><label>Product type</label></div>
                            <div class="col-md-8" id="value">{{$product->productType}}</div>
                            <div class="col-md-6" id="input">
                                <select name="productType" id="productType" class="form-control show-tick">
                                    <option sel="open">Open Group</option>
                                    <option sel="priv">Private Group</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" id="field">
                            <div class="col-md-4"><label>Product Name</label></div>
                            <div class="col-md-8" id="value">{{$product->productName}}</div>
                            <div class="col-md-8" id="input">
                                <input type="text" class="form-control" name="productName" value="{{$product->productName}}">
                            </div>
                        </div>
                        <div class="row" id="field">
                            <div class="col-md-4"><label>Min person</label></div>
                            <div class="col-md-8" id="value">{{$product->minPerson}}</div>
                            <div class="col-md-8" id="input">
                                <input type="text" class="form-control" name="minPerson" value="{{$product->minPerson}}">
                            </div>
                        </div>
                        <div class="row" id="field">
                            <div class="col-md-4"><label>Max person</label></div>
                            <div class="col-md-8" id="value">{{$product->maxPerson}}</div>
                            <div class="col-md-8" id="input">
                                <input type="text" class="form-control" name="maxPerson" value="{{$product->maxPerson}}">
                            </div>
                        </div>
                        <div class="row" id="field">
                            <div class="col-md-4"><label>Meeting Point</label></div>
                            <div class="col-md-8" id="value">
                                <p>{{$product->meetingPointAddress}}</p>
                                <a class="col-orange" href="https://www.google.com/maps/{{'@'.$product->meetingPointLatitude}},{{$product->meetingPointLongitude}},17z"><b>Open on map ></b></a>
                            </div>
                            <div class="col-md-8" id="input">
                                <input type="text" id="pac-input" class="form-control" name="meetingPoint" value="{{$product->meetingPointAddress}}" />
                                <input type="hidden" id="geo-lat" class="form-control" name="meetingPointLatitude" value="{{$product->meetingPointLatitude}}"/>   
                                <input type="hidden" id="geo-long" class="form-control" name="meetingPointLongitude" value="{{$product->meetingPointLongitude}}"/>   
                            </div>
                        </div>
                        <div class="row" id="field">
                            <div class="col-md-4"><label>Activity Tag</label></div>
                            <div class="col-md-8" id="value">
                                @foreach($product->activities as $activity)
                                    <span class="label bg-deep-orange">{{ $activity->name}}</span>
                                @endforeach
                            </div>
                            <div class="col-md-8" id="input">
                                <select class="form-control" name="activityTag[]" multiple="multiple" style="width: 100%">
                                    @foreach($product->activities as $activity)
                                        <option value="{{$activity->activityId}}" selected="selected">{{$activity->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                        <div class="row" id="field">
                            <div class="col-md-4"><label>Term & Condition</label></div>
                            <div class="col-md-8" id="value">{{$product->termCondition}}</div>
                            <div class="col-md-8" id="input">
                                <textarea rows="4" name="termCondition" class="form-control no-resize">{{$product->termCondition}}</textarea>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="body" id="value">
                            <ul class="nav nav-tabs tab-nav-right tab-col-orange" role="tablist">
                                <li role="presentation"  class="active"><a href="#destination" data-toggle="tab"><p class="col-orange">Destination</p></a></li>
                                <li role="presentation"><a href="#accomodation" data-toggle="tab"><p class="col-orange">Accomodation</p></a></li>
                                <li role="presentation"><a href="#activities" data-toggle="tab"><p class="col-orange">Activities</p></a></li>
                                <li role="presentation"><a href="#other" data-toggle="tab"><p class="col-orange">Other</p></a></li>
                                <li role="presentation"><a href="#video" data-toggle="tab"><p class="col-orange">Video</p></a></li>
                            </ul>
                        
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="destination">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            @foreach($product->image_destination as $dest)
                                            <div class="item" id="caros">
                                                <img src="{{ asset($dest->url) }}" />
                                            </div>
                                            @endforeach
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
                                <div role="tabpanel" class="tab-pane fade" id="accomodation">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            @foreach($product->image_accommodation as $acc)
                                            <div class="item" id="caros">
                                                <img src="{{ asset($acc->url) }}" />
                                            </div>
                                            @endforeach
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
                                <div role="tabpanel" class="tab-pane fade" id="activities">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            @foreach($product->image_activity as $act)
                                            <div class="item" id="caros">
                                                <img src="{{ asset($act->url) }}" />
                                            </div>
                                            @endforeach
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
                                <div role="tabpanel" class="tab-pane fade" id="other">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            @foreach($product->image_other as $oth)
                                            <div class="item" id="caros">
                                                <img src="{{ asset($oth->url) }}" />
                                            </div>
                                            @endforeach
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
                                
                                <div role="tabpanel" class="tab-pane fade" id="video">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            @foreach($product->videos as $vid)
                                            <div class="item" id="caros">
                                                <iframe width="100%" height="300px" src="{{$vid->url}}"></iframe>
                                            </div>
                                            @endforeach
                                        </div>
                                        <!-- Controls -->
                                        <!-- <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix" id="input">
                    <div class="col-md-12 valid-info">
                        <div class="col-md-6" style="border: soli 1px;border-radius: 5px;padding:x;margin-top: ">
                            <h4><i class="material-icons">perm_media</i> Delete Destination Photo</h4>
                            @foreach($product->image_destination as $dest)
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="{{asset($dest->url)}}" class="img-responsive">
                                </div>
                                <div class="col-md-4">
                                    <a href="{{url('deleteImage/dest/'.$dest->id)}}">Hapus</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <h4><i class="material-icons">perm_media</i> Upload Activity Photo</h4>
                            <input id="file-i1" type="file" name="image_destination[]" accept=".jpg,.gif,.png,.jpeg" multiple required>
                        </div>
                    </div>
                    <div class="col-md-12 valid-info" style="margin-top:20px">
                        <div class="col-md-6" style="border: soli 1px;border-radius: 5px;padding:x;margin-top: ">
                            <h4><i class="material-icons">perm_media</i> Delete Activity Photo</h4>
                            @foreach($product->image_activity as $act)
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="{{asset($act->url)}}" class="img-responsive">
                                </div>
                                <div class="col-md-4">
                                    <a href="{{url('deleteImage/act/'.$act->id)}}">Hapus</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <h4><i class="material-icons">perm_media</i> Activities Photo</h4>
                            <input id="file-i2" type="file" name="image_activities[]" accept=".jpg,.gif,.png,.jpeg" multiple required>    
                        </div>
                        
                    </div>
                    <div class="col-md-12 valid-info" style="margin-top:20px">
                        <div class="col-md-6" style="border: soli 1px;border-radius: 5px;padding:x;margin-top: ">
                            <h4><i class="material-icons">perm_media</i> Delete Accommodation Photo</h4>
                            @foreach($product->image_accommodation as $acc)
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="{{asset($acc->url)}}" class="img-responsive">
                                </div>
                                <div class="col-md-4">
                                    <a href="{{url('deleteImage/acc/'.$acc->id)}}">Hapus</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <h4><i class="material-icons">perm_media</i> Accommodation Photo</h4>
                            <input id="file-i3" type="file" name="image_accommodation[]"accept=".jpg,.gif,.png,.jpeg"  multiple required>
                        </div>
                    </div>
                    <div class="col-md-12 valid-info" style="margin-top:20px">
                        <div class="col-md-6" style="border: soli 1px;border-radius: 5px;padding:x;margin-top: ">
                            <h4><i class="material-icons">perm_media</i> Delete Other Photo</h4>
                            @foreach($product->image_other as $oth)
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="{{asset($oth->url)}}" class="img-responsive">
                                </div>
                                <div class="col-md-4">
                                    <a href="{{url('deleteImage/oth/'.$oth->id)}}">Hapus</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <h4><i class="material-icons">perm_media</i> Others Photo</h4>
                            <input id="file-i4" type="file" name="image_other[]" accept=".jpg,.gif,.png,.jpeg" multiple required>
                        </div>
                        
                    </div>
                    <div class="col-md-12 valid-info" style="margin-top:20px">
                        <h4><i class="material-icons">perm_media</i> Video URL</h4>
                        <h5>Add your video link to embed the video into your product's gallery.</h5>
                        <div class="row" id="embed" style="display: w;margin-bottom: 10px">
                            <div class="col-md-6" >
                                @foreach($product->videos as $vid)
                                <input type="url" class="form-control" name="videoUrl[]" value="{{$vid->url}}" />
                                @endforeach
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
                </div>
                <div class="row clearfix" style="margin:10px;padding: 10px" id="action">
                    <div class="col-md-2" id="button-edit">
                        <button type="button" class="btn bg-red btn-block btn-lg waves-effect">EDIT</button>
                    </div>
                    <div class="col-md-2" id="button-save">
                        <button type="button" class="btn bg-red btn-block btn-lg waves-effect">SAVE</button>
                    </div>
                    <div class="col-md-2" id="button-cancel">
                        <button type="button" class="btn bg-red btn-block btn-lg waves-effect">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="header">
                <h2>Destination</h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="row" id="value" style="margin: 0px">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Province</td>
                                    <td>City</td>
                                    <td>Destination</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($product->destinations as $dest)
                                <tr>
                                    <td>{{$dest->province->name}}</td>
                                    <td>{{$dest->city->name}}</td>
                                    @if($dest->dest)
                                    <td>{{$dest->dest->dest}}</td>
                                    @else
                                    <td>Destinattion Not Found</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row" id="input">
                        @foreach($product->destinations as $key=>$destination)
                            <div class="row" id="dinamic_destination" style="margin: 0px 3px 0px 3px;">
                                <div class="col-md-3 valid-info">
                                    <h5>Province*</h5>
                                    <select id="destinationField1" class="form-control" name="place[{{$key}}][province]" style="width: 100%" required>
                                        @foreach($provinces as $province)
                                            <option value="{{$province->id}}" @if($product['destinations'][$key]['provinceId'] == $province->id) selected @endif>{{$province->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 valid-info">
                                    <h5>City*</h5>
                                    <select id="destinationField2" class="form-control" name="place[{{$key}}][city]" style="width: 100%" required>
                                        <option value="" selected disabled>-- Select City --</option>
                                        @foreach($cities2::where('province_id',$product['destinations'][$key]['provinceId'])->get() as $city)
                                        <option value="{{$city->id}}"  @if($product['destinations'][$key]['cityId'] == $city->id) selected @endif>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 valid-info">
                                    <h5>Destination</h5>
                                    <select id="destinationField3" class="form-control" name="place[{{$key}}][destination]" style="width: 100%">
                                        <option value="" selected disabled>-- Select City --</option>
                                        @foreach($destination2::where('city',$product['destinations'][$key]['cityId'])->get() as $destination)
                                        <option value="{{$destination->destinationId}}" @if($product['destinations'][$key]['destination']['destinationId'] == $destination->destinationId) selected @endif>{{$destination->destination}}</option>
                                        @endforeach
                                    </select>
                                    <b style="font-size:10px">Leave empty if you can't find the destination</b>
                                </div>
                                <div class="col-md-1" style="padding-top:25px "></div>
                            </div>
                        @endforeach
                            <div id="clone_dinamic_destination"></div>
                                <div class="row" style="margin: 0px 3px 0px 3px;">
                                    <div class="col-md-3">
                                    <button type="button" class="btn btn-warning waves-effect" id="add_more_destination">
                                        <i class="material-icons icon-align">add</i>
                                        Add Destination
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="row clearfix" style="margin:10px;padding: 10px" id="action">
                    <div class="col-md-2" id="button-edit">
                        <button type="button" class="btn bg-red btn-block btn-lg waves-effect">EDIT</button>
                    </div>
                    <div class="col-md-2" id="button-save">
                        <button type="button" class="btn bg-red btn-block btn-lg waves-effect">SAVE</button>
                    </div>
                    <div class="col-md-2" id="button-cancel">
                        <button type="button" class="btn bg-red btn-block btn-lg waves-effect">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="header">
                <h2>Schedules</h2>
            </div>
            <div class="body">
                <div id="value">
                    <div class="row" id="field">
                        <div class="col-md-2"><label>Schedule Type</label></div>
                        <div class="col-md-10" id="value">{{$product->schedules[0]->scheduleType}}</div>
                    </div>
                    @if($product->schedules[0]->scheduleType == 'Multiple Days')
                    <div class="row" id="field">
                        <div class="col-md-2"><label>Days</label></div>
                        <div class="col-md-4" id="value">{{$day}}</div>
                    </div>
                    @elseif($product->schedules[0]->scheduleType == 'Couple of Hours')
                    <div class="row" id="field">
                        <div class="col-md-2"><label>Time</label></div>
                        <div class="col-md-4" id="value">{{$hours}} Hours, {{$minutes}} Minutes</div>
                    </div>
                    @endif
                    <table class="table table-striped" id="value_sche">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td id="startDate">Start Date</td>
                                <td id="endDate" >End Date</td>
                                <td id="startTime">Start Time</td>
                                <td id-"endTime">End Time</td>
                                <td>Maximum Booking date</td>
                                <td id="maxBooking"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product->schedules as $key=>$sche)
                            <tr>
                                <td><i class="material-icons">date_range</i></td>
                                <td id="startDate">{{ date("d-m-Y", strtotime($sche->startDate)) }}</td>
                                <td id="endDate" >{{ date("d-m-Y", strtotime($sche->endDate)) }}</td>
                                <td id="startTime">{{ date("H:i:s", strtotime($sche->startHours)) }}</td>
                                <td id-"endTime">{{ date("H:i:s", strtotime($sche->endHours)) }}</td>
                                <td>{{ date("d-m-Y", strtotime($sche->minBookingDateTime)) }}</td>
                                <td>{{$sche->maximumBooking}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row clearfix" id="input">
                    <!-- SCHEDULE -->
                    <div class="col-md-12" style="margin: 0px 3px 0px 3px;">
                        <h4 style="margin-top: 40px;">Duration & Schedule:</h4>
                        <div class="row valid-info" style="margin: 0px 3px 0px 3px;">
                            <div class="col-md-12">
                                <h5>How long is the duration of your tour/activity ?:</h5>
                            </div>
                            <div class="col-md-3" style="margin: 5px 3px 0px 3px;">
                                <input name="scheduleType" type="radio" id="1d" class="radio-col-deep-orange" value="1" sel="1" />
                                <label for="1d">Multiple days</label>
                            </div>
                            <div class="col-md-3" style="margin: 5px 3px 0px 3px;">
                                <input name="scheduleType" type="radio" id="2d" class="radio-col-deep-orange" value="2" sel="2"/>
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
                                    <select class="form-control" name="day" disabled>
                                        <option value="">-- Days --</option>
                                        @for($i=1;$i<24;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="scheduleHours" hidden>
                                <div class="col-md-2 valid-info">
                                    <h5>Hours?* :</h5>
                                    <select class="form-control" name="hours" disabled>
                                        <option value="">-- Hours --</option>
                                        @for($i=1;$i<=24;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-2 valid-info">
                                    <h5>Minutes?* :</h5>
                                    <select class="form-control" name="minutes" disabled>
                                        <option value="">-- Minutes --</option>
                                        @for($i=1;$i<=60;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="schedule_body">
                            @foreach($product->schedules as $key=>$sche)
                            <div class="row" id="dinamic_schedule" style="margin: 0px 3px 0px 3px;">
                                <div class="col-md-3 valid-info" id="scheduleCol1">
                                    <h5>Start date*</h5>
                                    <input type="text" id="scheduleField1" class="form-control" name="schedule[{{$key}}][startDate]" value='{{ date("d-m-Y", strtotime($sche->startDate)) }}'/>
                                </div>
                                <div class="col-md-3 valid-info" id="scheduleCol2">
                                    <h5>End date*</h5>
                                    <input type="text" id="scheduleField2" class="form-control" name="schedule[{{$key}}][endDate]" vpalue='{{ date("d-m-Y", strtotime($sche->endDate)) }}' readonly/>
                                </div>
                                <div class="col-md-2 valid-info" id="scheduleCol3">
                                    <h5>Start hours *</h5>
                                    <input type="text" id="scheduleField3" class="form-control" name="schedule[{{$key}}][startHours]" value='{{ date("H:i:s", strtotime($sche->startHours)) }}'/>
                                </div>
                                <div class="col-md-2 valid-info" id="scheduleCol4">
                                    <h5>End hours*</h5>
                                    <input type="text" id="scheduleField4" class="form-control" name="schedule[{{$key}}][endHours]" value='{{ date("H:i:s", strtotime($sche->endHours)) }}' readonly/>
                                </div>
                                <div class="col-md-3 valid-info" id="scheduleCol5">
                                    <h5>Max.Booking Date*</h5>
                                    <input type="text" id="scheduleField5" class="form-control" name="schedule[{{$key}}][maxBookingDate]" value='{{ date("d-m-Y", strtotime($sche->minBookingDateTime)) }}'/>
                                </div>
                                <div class="col-md-2 valid-info" id="scheduleCol6">
                                    <h5>Max.Booking*</h5>
                                    <input type="text" id="scheduleField6" class="form-control" name="schedule[{{$key}}][maximumGroup]" value='{{$sche->maximumBooking}}'>
                                </div>
                                <div class="col-md-1" style="padding-top:25px" id="button_del">
                                    <button type="button" id="delete_schedule" class="btn btn-danger waves-effect"><i class="material-icons">clear</i></button>
                                </div>
                            </div>
                            @endforeach
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
                </div>
                <div class="row clearfix" style="margin:10px;padding: 10px" id="action">
                    <div class="col-md-2" id="button-edit">
                        <button type="button" class="btn bg-red btn-block btn-lg waves-effect">EDIT</button>
                    </div>
                    <div class="col-md-2" id="button-save">
                        <button type="button" class="btn bg-red btn-block btn-lg waves-effect">SAVE</button>
                    </div>
                    <div class="col-md-2" id="button-cancel">
                        <button type="button" class="btn bg-red btn-block btn-lg waves-effect">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="header">
                <h2>Pricing</h2>
            </div>
            <div class="body">
                <div class="row clearfix" id="value">
                    <div class="col-md-6">
                        <div class="row" id="field">
                            <div class="col-md-4"><label>Price Type</label></div>
                            @if($product->prices[0]->price == 'Fixed')
                                <div class="col-md-8" id="value">Fixed Price</div>
                            @else
                                <div class="col-md-8" id="value">Based of Person</div>
                            @endif
                        </div>
                        <div class="row" id="field">
                            <div class="col-md-4"><label>Pricing Scheme</label></div>
                            <div class="col-md-8">
                                @foreach($product->prices as $price)
                                <li>{{ $price->numberOfPerson}} Person = Rp. {{ $price->priceIDR}}/person </li>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><label>Cancellation Policy</label></div>
                            <div class="col-md-8"><label>Cancel {{ $product->minCancellationDay}} days prior schedule, cancelation fee {{ $product->cancellationFee}}%</label></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4"><label>Pricing Includes</label></div>
                            <div class="col-md-8">
                                @foreach($product->includes as $include)
                                <li>{{ $include->description}}</li>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><label>Pricing Excludes</label></div>
                            <div class="col-md-8">
                                @foreach($product->excludes as $exclude)
                                <li>{{ $exclude->description}}</li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix" id="input">
                    <div class="col-md-12" style="margin-top: 20px;">
                        <h4>Pricing Details</h4>
                        <div class="row valid-info" style="">
                            <div class="col-md-4" style="margin-left:0px;">
                                <input name="priceKurs" type="radio" id="1p" class="radio-col-deep-orange" value="1"/>
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
                                    <input type="text" id="idr" name="price[0][IDR]" class="form-control" value="{{$product->prices[0]->priceIDR}}" />     
                                </div>
                                <div class="col-md-3 valid-info" id="price_usd" style="display: none">
                                    <h5>Price / person (USD)*:</h5>
                                    <input type="text" id="usd" name="price[0][USD]" class="form-control" value="{{$product->prices[0]->priceUSD}}" />     
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" id="price_table_container" style="display: none;">
                        <h4>Pricing Tables</h4>
                        <div class="row" style="margin-left:10px; margin-right: 10px;">
                            <div class="col-md-12" id="price_list_view" style="display: none">
                                @foreach($product->prices as $key=>$pri)
                                <div class="row">
                                    <div class="col-md-1" style="padding: 20px 0px 0px 0px;">
                                        <h5><i class="material-icons">person</i>{{$pri->numberOfPerson}}</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 valid-info" id="price_idr">
                                                <h5>Price / person (IDR)*:</h5>
                                                <input id="price_list_field1" type="hidden" name="price[{{$key}}][people]" value="{{$pri->numberOfPerson}}" />  
                                                <input id="price_list_field2" type="text" class="form-control" name="price[{{$key}}][IDR]" value="{{$pri->priceIDR}}" />     
                                            </div>
                                            <div class="col-md-6 valid-info" id="price_usd" style="display: none">
                                                <h5>Price / person (USD)*:</h5>
                                                <input id="price_list_field3" type="text" class="form-control" name="price[{{$key}}][USD]" value="{{$pri->priceUSD}}" /> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-md-12" id="price_list_edit" style="display: none">
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
                                <select type="text" class="form-control" name="priceIncludes[]" multiple="multiple" style="width: 100%; margin-bottom: 10px;">
                                    @foreach($product->includes as $inc)
                                        <option selected>{{$inc->description}}</option>
                                    @endforeach
                                </select>
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
                                <select class="form-control" name="priceExcludes[]" multiple="multiple" style="width: 100%" required>
                                    @foreach($product->excludes as $ex)
                                        <option selected>{{$ex->description}}</option>
                                    @endforeach
                                </select>
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
                                <input name="cancellationType" type="radio" id="1c" class="radio-col-deep-orange" value="1" />
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
                                    <input type="text" name="minCancellationDay" class="form-control" value="{{$product->minCancellationDay}}">
                                </div>
                                <div class="col-md-2" style="margin:5px;padding:0px;width:auto">
                                    <h5>days from schedule, cancellation fee is</h5>
                                </div>
                                <div class="col-md-1 valid-info" style="margin:5px;padding:0px">
                                    <input type="text" name="cancellationFee" class="form-control" value="{{$product->cancellationFee}}">
                                </div>
                                <div class="col-md-2" style="margin:5px;padding:0px;width:auto">
                                    <h5>percent(%).</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix" style="margin:10px;padding: 10px" id="action">
                    <div class="col-md-2" id="button-edit">
                        <button type="button" class="btn bg-red btn-block btn-lg waves-effect">EDIT</button>
                    </div>
                    <div class="col-md-2" id="button-save">
                        <button type="button" class="btn bg-red btn-block btn-lg waves-effect">SAVE</button>
                    </div>
                    <div class="col-md-2" id="button-cancel">
                        <button type="button" class="btn bg-red btn-block btn-lg waves-effect">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="header">
                <h2>Itinerary</h2>
            </div>
            <div class="body">
                <div id="value">
                    @foreach($product->itineraries as $iti)
                    <div class="row" >
                        <di class="col-md-2">
                            <h5>Day</h5>
                            <label>{{$iti->day}}</label>
                        </di>
                        <di class="col-md-2">
                            <h5>Start Time</h5>
                            <label>{{$iti->startTime}}</label>
                        </di>
                        <di class="col-md-2">
                            <h5>End Time</h5>
                            <label>{{$iti->endTime}}</label>
                        </di>
                        <di class="col-md-6">
                            <h5>Description</h5>
                            <textarea rows="6" class="form-control" readonly>{{$iti->description}}</textarea>
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <h5>ID</h5>
                                    <textarea rows="6" class="form-control">{{$iti->description}}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <h5>EN</h5>
                                    <textarea rows="6" class="form-control" readonly>{{$iti->descriptionEN}}</textarea>
                                </div>
                            </div> -->
                        </di>
                    </div>
                    @endforeach
                </div>
                <div id="input">
                    @foreach($product->itineraries as $key=>$iti)
                    <div id="itinerary_list" style="margin-left:15px;">
                        <h5>{{$iti->day}}</h5>
                        <input id="field_itinerary_input1" type="hidden" name="itinerary[{{$key}}][day]" value="{{$iti->day}}"/>
                        <div class="row" id="itinerary_row">
                            <div class="col-md-2 valid-info" id="field_itinerary1">
                                <h5>Start time*</h5>
                                <input id="field_itinerary_input2" type="text" class="form-control" name="itinerary[{{$key}}][list][0][startTime]" value="{{$iti->startTime}}" required />
                            </div>
                            <div class="col-md-2 valid-info" id="field_itinerary2">
                                <h5>End time*</h5>
                                <input id="field_itinerary_input3" type="text" class="form-control" name="itinerary[{{$key}}][list][0][endTime]" value="{{$iti->endTime}}" required/>
                            </div>
                            <div class="col-md-6 valid-info" id="field_itinerary7">
                                <h5>Description*</h5>
                                <textarea id="field_itinerary_input7" rows="6" class="form-control" name="itinerary[{{$key}}][list][0][description]" required>{{$iti->description}}</textarea>
                            </div>
                            <div class="col-md-1" style="padding-top:35px"></div>
                        </div>
                        <div id="clone_dinamic_itinerary"></div> 
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row clearfix" style="margin:10px;padding: 10px" id="action">
                <div class="col-md-2" id="button-edit">
                    <button type="button" class="btn bg-red btn-block btn-lg waves-effect">EDIT</button>
                </div>
                <div class="col-md-2" id="button-save">
                    <button type="button" class="btn bg-red btn-block btn-lg waves-effect">SAVE</button>
                </div>
                <div class="col-md-2" id="button-cancel">
                    <button type="button" class="btn bg-red btn-block btn-lg waves-effect">CANCEL</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('footer')
 <!-- Jquery Core Js -->
   

   <!-- Bootstrap Core Js -->
   <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

   <!-- Tel format -->
       <script src="../../plugins/telformat/js/intlTelInput.js"></script>

   <!-- Dropzone Plugin Js -->
       <script src="../../plugins/bootstrap-file-input/js/fileinput.js" type="text/javascript"></script>

   <!-- Moment Plugin Js -->
       <script src="../../plugins/momentjs/moment.js"></script>
   <!-- Bootstrap date range picker -->
       <script src="../../plugins/boostrap-daterangepicker/daterangepicker.js"></script>

   <!-- Select Plugin Js -->
       <script src="../../plugins/select2/select2.min.js"></script>

   <!-- Mask js -->
       <script src="../../plugins/mask-js/jquery.mask.min.js"></script>

   <!-- Waves Effect Plugin Js -->
       <script src="../../plugins/node-waves/waves.js"></script>
   <!-- Slimscroll Plugin Js -->
       <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
   <!-- Jquery Validation Plugin Css -->
       <script src="../../plugins/jquery-validation/jquery.validate.js"></script>
   <!-- Custom Js -->
       <script src="../../js/admin.js"></script>
       <script src="../../js/pages/forms/form-wizard.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
   <!-- Demo Js -->
       <script src="../../js/demo.js"></script>
    <!-- MASK -->
        <script>
            $(document).ready(function(){
                $("input[name='companyPhone'],input[name='phone'],input[name='PICPhone']").mask('000-0000-00000');
                $("input[name='bankAccountNumb']").mask('0000000000000000');
                $("input[name='companyPostal']").mask('00000');
                $("input[name='minPerson'],input[name='maxPerson'],#scheduleField6,input[name='minCancellationDay'],input[name='cancellationFee']").mask('0000');
                $("input#idr,input#usd").mask('00000000000000000000000000000');
                $("#scheduleField3,#scheduleField4,#field_itinerary_input2,#field_itinerary_input3").attr("min","00:00:00").attr("max","23:59:59").mask('00:00:00');
                
                $.ajax({
                method: "GET",
                url: "{{ url('/activity') }}",
                }).done(function(response) {
                    $.each(response, function (index, value) {
                        $("select[name='activityTag[]']").append(
                            "<option value="+value.activityId+">"+value.name+"</option>"
                        );
                    });
                });
                $("select[name='activityTag[]']").select2();
            })
        </script>
    <!-- FOR CAROSESL -->
        <script>
            $(document).ready(function(){
                $("div[role='tabpanel']").each(function(){
                    $(this).find("div#caros:first").attr("class","item active");
                });
            });
        </script>
    <!-- FOR INPUT FILE -->
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
    <!-- Tour Type -->
	    <script>
            $(document).ready(function() {
                var dbTourType = '{{$product->productType}}';
                var dbTourCategory = '{{$product->productCategory}}';
                if(dbTourType == "Open Group"){
                    $("select[name='productType']").find("option[sel='open']").attr("selected","selected");
                }else{
                    $("select[name='productType']").find("option[sel='priv']").attr("selected","selected");
                }
                if(dbTourCategory == "Activity"){
                    $("select[name='productCategory']").find("option[sel='act']").attr("selected","selected");
                }
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
    <!-- FOR SHOW EDIT/DISPLAY -->
        <script>
            $(document).ready(function(){
                $("div.card").each(function(){
                    $(this).find("#button-edit button").click(function(){
                        $(this).closest("#button-edit").hide();
                        $(this).closest(".card").find("div#value").each(function(){
                            $(this).hide();
                        })
                        $(this).closest(".card").find("div#input").each(function(){
                            $(this).show();
                        })
                        $(this).closest(".card").find("#button-save").show().find("button").click(function(){
                            $("#form").submit();
                        });
                        $(this).closest(".card").find("#button-cancel").show().find("button").click(function(){
                            $(this).closest(".card").find("div#value").each(function(){
                                $(this).show();
                            })
                            $(this).closest(".card").find("div#input").each(function(){
                                $(this).hide();
                            })
                            $(this).closest("#button-cancel").hide();
                            $(this).closest("#button-cancel").siblings("#button-save").hide();
                            $(this).closest("#button-cancel").siblings("#button-edit").show();
                        });
                    })
                });
            })
        </script>
    <!-- PROVINCE -->
        
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
        var dbScheType = '{{$product->schedules[0]->scheduleType}}';
        var dbDay = '{{$day}}';
        var dbHours = '{{$hours}}';
        var dbMinutes = '{{$minutes}}';
        var dbProductCat = '{{$product->productType}}';
        // TYPE TOUR
        if(dbProductCat == 'Open Group'){
            $("input#scheduleField6").each(function(){
                $(this).attr("readonly","readonly")
            })
            $("#value_sche").find("#maxBooking").text("Max Person*");
            $("div#dinamic_schedule").each(function(){
                $(this).find("#scheduleCol6 h5").text("Max Person*");
            });
        }else{
            $("input#scheduleField6").each(function(){
                $(this).removeAttr("readonly","readonly")
            })
            $("#value_sche").find("#maxBooking").text("Max Booking*");
            $("div#dinamic_schedule").each(function(){
                $(this).find("#scheduleCol6 h5").text("Max Booking*");
            });
        }
        // TYPE SCHEDULE
        if(dbScheType == "Multiple Days"){
            $("input[name='scheduleType'][sel='1']").attr("checked","checked");
            $("div.scheduleDays").show();
            $("select[name='day']").find("option[value='"+dbDay+"']").attr("selected","selected");
            $("div.scheduleHours").hide();
            $("div#dinamic_schedule").each(function(){
                $(this).find("div#scheduleCol3,div#scheduleCol4").hide();
            });
        }else if(dbScheType == "Couple of Hours"){
            $("input[name='scheduleType'][sel='2']").attr("checked","checked");
            $("div.scheduleDays").hide();
            $("div.scheduleHours").show();
            $("select[name='hours']").find("option[value='"+dbHours+"']").attr("selected","selected");
            $("select[name='minutes']").find("option[value='"+dbMinutes+"']").attr("selected","selected");
            $("div#dinamic_schedule").each(function(){
                $(this).find("div#scheduleCol2").hide();
            });
        }else{
            $("input[name='scheduleType'][sel='3']").attr("checked","checked");
            $("select[name='hours'],select[name='minutes'].select[name='day']").hide();
            $("div#dinamic_schedule").each(function(){
                $(this).find("div#scheduleCol2,div#scheduleCol3,div#scheduleCol4").hide();
            });
        }
        // DEL BUTTON
        $("div#dinamic_schedule:first").find("#button_del button").remove();

        // 
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
        var i = '{{count($product->schedules)}}';
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
			$("select#destinationField1").each(function(){
                $(this).change(function(){
                    $(this).closest("#dinamic_destination").find("#destinationField2").empty();
                    var me = $(this);
                    $.ajax({
                    method: "GET",
                    url: "{{ url('/city') }}",
                    data: {
                        id: $(this).val()
                    }
                    }).done(function(response) {
                        me.attr("qdqwdqw","qwdqwdqw")
                        $.each(response, function (index, value) {
                            me.closest("#dinamic_destination").find("#destinationField2").append(
                                "<option value="+value.id+">"+value.name+"</option>"
                            );
                        });
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
            var i = '{{count($product->destinations)}}';
            $("#add_more_destination").click(function(){
                i++;
                $("#dinamic_destination").clone().appendTo("#clone_dinamic_destination").addClass("row dinamic_destination"+i);
                $(".dinamic_destination"+i+" select").val(null);
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
            // View PRICE
                var dbPriceKurs = '{{$product->prices[0]->priceUSD}}';
                var dbPriceType = '{{$product->prices[0]->priceType}}';
                var dbCancelType = '{{$product->cancellationType}}';
                // KURS
                if(dbPriceKurs == 0){
                    $("input[name='priceKurs'][value='1']").attr("checked","checked");
                    $("div#price_usd").each(function(){
                        $(this).hide();
                    });
                }else{
                    $("input[name='priceKurs'][value='2']").attr("checked","checked");
                    $("div#price_usd").each(function(){
                        $(this).show();
                    });
                }
                // TYPE
                if(dbPriceType == 'Based'){
                    $("select[name='priceType']").find("option[value='2']").attr("selected","selected");
                    $("#price_fix").hide();
                    $("#price_table_container, #price_list_view").show();  
                }else{
                    $("select[name='priceType']").find("option[value='1']").attr("selected","selected");
                    $("#price_fix").show();
                    $("#price_table_container").hide();
                    $("#price_list_container_left,#price_list_container_right").empty();
                }
                // CANCEL
                if(dbCancelType == 'No Cancellation'){
                    $("input[name='cancellationType'][value='1']").attr("checked","checked");
                }else if(dbCancelType == 'Free Cancellation'){
                    $("input[name='cancellationType'][value='2']").attr("checked","checked");
                }else{
                    $("input[name='cancellationType'][value='3']").attr("checked","checked");
                    $("#cancel_policy").show();
                }
            // ORI
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
            // 
            $("#price_type").change(function () {
            	var maxPerson = $("input[name='maxPerson']:text").val();
                var dif = Math.round(maxPerson/2)-1;
                var val = $(this).val();
                if(val == 1){
                    $("#price_fix").show();
                    $("#price_fix input").val(null);
                    $("#price_table_container").hide();
                    $("#price_list_container_left,#price_list_container_right").empty();
                }else{
                    $("#price_fix").hide();
                    $("#price_table_container, #price_list_view").show();    
                    $("#price_list_view input").val(null);
                    // for(var i=0;i<=dif;i++){ 
                    //     $("#price_list").clone().appendTo("#price_list_container_left").attr("id","price_list"+i);
                    //     $("#price_list"+i+" .col-md-1 h5").append((i+1));
                    //     $("#price_list"+i+" #price_list_field1").val((i+1));
                    //     $("#price_list"+i+" #price_list_field1").attr("name","price["+i+"][people]");
                    //     $("#price_list"+i+" #price_list_field2").attr("name","price["+i+"][IDR]").mask('0.000.000.000', {reverse: true});
                    //     $("#price_list"+i+" #price_list_field3").attr("name","price["+i+"][USD]").mask('0.000.000.000', {reverse: true});
                    // }

                    // for(var i=(dif+1);i<maxPerson;i++){ 
                    //     $("#price_list").clone().appendTo("#price_list_container_right").attr("id","price_list"+i);
                    //     $("#price_list"+i+" .col-md-1 h5").append((i+1));
                    //     $("#price_list"+i+" #price_list_field1").val((i+1));
                    //     $("#price_list"+i+" #price_list_field1").attr("name","price["+i+"][people]");
                    //     $("#price_list"+i+" #price_list_field2").attr("name","price["+i+"][IDR]").mask('0.000.000.000', {reverse: true});
                    //     $("#price_list"+i+" #price_list_field3").attr("name","price["+i+"][USD]").mask('0.000.000.000', {reverse: true});
                    // }
                    // $("#price_list").hide();
                }
            });
            // CANCEL
            $("input[name='cancellationType']:radio").change(function () {
                var val = this.value;
                if(val == 3){
                    $("#cancel_policy").show(100);
                }else{
                    $("#cancel_policy").hide(100);
                }
            });
            // INCLUDE
            $("select[name='priceIncludes[]']").select2({
                tags:true
            });
            // EXCLUDE
            $("select[name='priceExcludes[]']").select2({
                tags:true
            });
        });
    </script> 
<!-- Itinerary-->
    <!-- NOT USED -->
	<!-- <script>
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
            // $("#button-step-3").click(function(){
            $("#nav").find("#next").click(function(){
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
    </script> -->
<!-- PHONE FORMAT -->
    <script>
        $(document).ready(function() {
            // PIC PRODUCT
            $("input[name='formatPIC']").val("+62");
            $("input[name='PICPhone']").val("+62").intlTelInput({
                separateDialCode: true,
            });
            $("input[name='formatPIC']").val("+62");
            $(".country").click(function(){
                $(this).closest(".valid-info").find("input[name='formatPICs']").val("+"+$(this).attr( "data-dial-code" ));
            });
        });
    </script>        

    <!-- OTHER -->
    @foreach($product->activities as $activity)
    <script>
        $("select[name='activityTag[]']").find("option[value='{{$activity->activityId}}']:last").remove();
    </script>                        
    @endforeach
@endsection