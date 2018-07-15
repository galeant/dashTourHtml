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

    <!-- Colorpicker Css -->
    <link href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="../../plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <!-- <link href="../../plugins/multi-select/css/multi-select.css" rel="stylesheet"> -->

    <!-- Bootstrap Spinner Css -->
    
    <link href="../../plugins/select2/select2.min.css" rel="stylesheet" />
    <link href="../../plugins/multi-select/css/multi-select.css" rel="stylesheet">
    <link href="../../plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <link href="../../plugins/bootstrap-file-input/css/fileinput.css" rel="stylesheet" media="all">

    <!-- Bootstrap Select Css -->
    <!-- <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" /> -->

    <!-- noUISlider Css -->
    <link href="../../plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
    <link href="../../plugins/bootstrap-file-input/themes/explorer-fa/theme.css" media="all" rel="stylesheet" type="text/css"/>
    
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
        .trdetail{padding: none;}
    </style>
    
@endsection
@if(session('productsfullaccess')==1 || session('productsview')==1)
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="header">
                            <h4>{{$product->productName}}</h4>
                            <span>Product Code : {{$product->productCode}}</span>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">PIC Name</p>
                                </div>
                                <div class="col-md-8" id="detailpicname">
                                    <p>: {{$product->PICName}}</p>
                                </div>
                                <div class="col-md-8" id="editproductcategory" hidden>
                                    <select name="productCategory" class="form-control show-tick" id="productCategory">
                                        <option>Tour</option>
                                        <option>Activity</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">PIC Email Category</p>
                                </div>
                                <div class="col-md-8" id="detailpicemail">
                                    <p>: {{$product->PICEmail}}</p>
                                </div>
                                <div class="col-md-8" id="editproductcategory" hidden>
                                    <select name="productCategory" class="form-control show-tick" id="productCategory">
                                        <option>Tour</option>
                                        <option>Activity</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">PIC Phone</p>
                                </div>
                                <div class="col-md-8" id="detail[icphone">
                                    <p>: {{$product->PICPhone}}</p>
                                </div>
                                <div class="col-md-8" id="editproductcategory" hidden>
                                    <select name="productCategory" class="form-control show-tick" id="productCategory">
                                        <option>Tour</option>
                                        <option>Activity</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Product Category</p>
                                </div>
                                <div class="col-md-8" id="detailproductcategory">
                                    <p>: {{$product->productCategory}}</p>
                                </div>
                                <div class="col-md-8" id="editproductcategory" hidden>
                                    <select name="productCategory" class="form-control show-tick" id="productCategory">
                                        <option>Tour</option>
                                        <option>Activity</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Product Type</p>
                                </div>
                                <div class="col-md-8" id="detailproducttype">
                                    <p>: {{$product->productType}}
                                        <br>
                                        <span class="col-grey">Customer who booked open trip will do in groups</span>
                                    </p>
                                </div>
                                <div class="col-md-8" id="editproducttype" hidden>
                                    <select  name="productType" class="form-control show-tick" id="productType">
                                        <option>Open</option>
                                        <option>Private</option>
                                    </select>
                                    <div id="productInformation">
                                        <h5>Information</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Product Name</p>
                                </div>
                                <div class="col-md-8">
                                    <p id="detailproductName">: {{$product->productName}}</p>
                                    <div id="editproductName" hidden>
                                        <input type="hidden" name="productCode" value="Pigijo-1"/>
                                        <input type="text" class="form-control" name="productName" id="productName" placeholder="Product Name" value="{{$product->productName}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Minimum Person</p>
                                </div>
                                <div class="col-md-8">
                                    <p id="detailminPerson">: {{$product->minPerson}} persons</p>
                                    <div id="editminPerson" hidden>
                                        <input type="text" class="form-control" name="minPerson" id="productminPerson"placeholder="Minimum Person" value="{{$product->minPerson}}" required />
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Maximum Person</p>
                                </div>
                                <div class="col-md-8">
                                    <p id="detailmaxPerson">: {{$product->maxPerson}} persons</p>
                                    <div id="editmaxPerson" hidden>
                                        <input type="text" class="form-control" name="maxPerson" id="productmaxPerson" placeholder="Maximum Person" value="{{$product->maxPerson}}" required />    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Commencing Date</p>
                                </div>
                                <div class="col-md-8">
                                    <p>: 
                                    {{date('d F Y', strtotime($product->startSellingDate))}}
                                        - 
                                    {{date('d F Y', strtotime($product->endSellingDate))}}
                                    <br>
                                    <i>This activity has multiple schedule</i>
                                    <br>
                                    <a class="col-orange" href=""><b> See all schedule></b></a>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Selling Date</p>
                                </div>
                                <div class="col-md-8">
                                    <p>: 
                                    {{date('d F Y', strtotime($product->startSellingDate))}}
                                    - 
                                    {{date('d F Y', strtotime($product->endSellingDate))}}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Meeting Point</p>
                                </div>
                                <div class="col-md-8">
                                    <p>:
                                        {{$product->meetingPointAddress}}
                                        <br>
                                        <a class="col-orange" href="https://www.google.com/maps/{{'@'.$product->meetingPointLatitude}},{{$product->meetingPointLongitude}},17z"><b>Open on map ></b></a>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="col-grey">Price</p>
                                </div>
                                <div class="col-md-8">
                                    <p>: Start from Rp. 10000000</p>
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
                                    <p class="col-grey">Term & Conditions</p>
                                </div>
                                <div class="col-md-8">
                                    <p>: {{$product->termCondition}}</p>
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
                                        <img src="../../images/image-gallery/11.jpg" />
                                    </div>
                                    <div class="item">
                                        <img src="../../images/image-gallery/12.jpg" />
                                    </div>
                                    <div class="item">
                                        <img src="../../images/image-gallery/19.jpg" />
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
                                <li role="presentation"><a href="#accomodation" data-toggle="tab"><p class="col-orange">Accomodation</p></a></li>
                                <li role="presentation"><a href="#activities" data-toggle="tab"><p class="col-orange">Activities</p></a></li>
                                <li role="presentation"><a href="#other" data-toggle="tab"><p class="col-orange">Other</p></a></li>
                                <li role="presentation"><a href="#video" data-toggle="tab"><p class="col-orange">Video</p></a></li>
                            </ul>
                        
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="destination">
                                    <table>
                                        <tr>
                                            <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <img src="../../images/image-gallery/12.jpg" alt="" class="img-responsive">
                                            </td>
                                            <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <img src="../../images/image-gallery/12.jpg" alt="" class="img-responsive">
                                            </td>
                                            <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <img src="../../images/image-gallery/12.jpg" alt="" class="img-responsive">
                                            </td>
                                            <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <img src="../../images/image-gallery/12.jpg" alt="" class="img-responsive">
                                            </td>
                                            <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <img src="../../images/image-gallery/12.jpg" alt="" class="img-responsive">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="accomodation">
                                    <b>Accomodation Content</b>
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
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h4 class="col-grey">Activity Detail</h4>
                </div>
                <div class="body">
                    <div class="panel-group" id="accordion_9" role="tablist" aria-multiselectable="true">
                        @for($d=1; $d<=$days; $d++)
                        <div class="panel panel-col-grey">
                            <div class="panel-heading" role="tab" id="headingitinerary{{$d}}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" href="#collapseitinerary{{$d}}" aria-expanded="false" aria-controls="collapseitinerary{{$d}}">
                                        Days {{$d}}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseitinerary{{$d}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingitinerary{{$d}}">
                                <div class="panel-body body table-responsive">
                                    <table>
                                        @foreach($itinerary as $i)
                                            @if($i->day == $d)
                                            <tr>
                                                <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                    <i class="material-icons">access_time</i>
                                                    <span>{{$i->startTime}} : {{$i->endTime}}</span>
                                                </td>
                                                <td class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    <i class="material-icons">local_play</i>
                                                    <span>
                                                        {{$i->agendaCategory}}
                                                        @if(!empty($i->agenda))
                                                            - {{$i->agenda}}
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                    <i class="material-icons">room  </i>
                                                    <span>
                                                        @if(!empty($i->destination))
                                                            {{$i->destination}}
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <i class="material-icons">description</i>
                                                    <span>{{$i->description}}</span>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><p class="col-grey">Additional Info</td>
                            <td class="col-lg-4 col-md-4 col-sm-4 col-xs-4">: {{$product->additionalInfo}}</td>
                        </tr>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
     
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
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
                                @if($pricetype->priceType==1)
                                    Fixed
                                @else
                                    Based on Person
                                @endif
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
                                      <p>{{$p->numberOfPerson}} person = Rp. {{$p->priceIDR}}</p>
                                      @if($p->priceUSD != null)
                                      <p>{{$p->numberOfPerson}} person = USD. {{$p->priceUSD}}</p>
                                      @endif
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
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="body">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="col-grey">Price Include<p>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    @foreach($priceincludes as $pi)
                                    <div class="col-md-12">{{$pi->description}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="col-grey">Price Exclude<p>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    @foreach($priceexcludes as $pe)
                                    <div class="col-md-12">{{$pe->description}}</div>
                                    @endforeach
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
          
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="card">
                <div class="header">
                    Activity Schedule
                </div>
                <div class="body">
                    
                <div class="panel-group" id="accordion_9" role="tablist" aria-multiselectable="true">
                        @foreach($schedule as $s)
                        <div class="panel panel-col-grey">
                            <div class="panel-heading" role="tab" id="headingschedule{{$s->scheduleId}}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" href="#collapseschedule{{$s->scheduleId}}" aria-expanded="false" aria-controls="collapseschedule{{$s->scheduleId}}">
                                        <div>
                                            <table>
                                                <tr>
                                                    <td class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                        <i class="material-icons">access_time</i>
                                                        <p style="font-size:14px">{{date('d F Y', strtotime($s->startDate))}} - {{date('d F Y', strtotime($s->endDate))}}</p>
                                                    </td>
                                                    <td class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <p style="font-size:14px"> Booking {{$s->bookingCount}} / {{$s->maximumBooking}}</p>
                                                    </td>
                                                    <td>
                                                    <p style="font-size:14px"><i class="material-icons">keyboard_arrow_down</i></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                            
                                        </div>
                                        <div >
                                            
                                        </div>
                                        <div >
                                            
                                        </div>
                                        <div >
                                        </div>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseschedule{{$s->scheduleId}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingschedule{{$s->scheduleId}}">
                                <div class="panel-body body table-responsive">
                                    <table class="table">
                                        @foreach($booking as $b)
                                            @if($b->productId == $s->productId)
                                            <tr>
                                                <td class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <p class="col-grey">Booking Number:
                                                    <h5>{{$b->bookingId}}</h5>
                                                </td>
                                                <td class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <p class="col-grey">Booking Date:
                                                    <h5>{{date('d F Y', strtotime($b->created_at))}}</h5>
                                                </td>
                                                <td class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <p class="col-grey">Booking By:
                                                    <h5>{{$b->fullName}}</h5>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="card">
                <div class="header">
                    Destination
                </div>
                <div class="body">
                    <span>Listed below is your activity's destination / location coverage</span>
                    @foreach($destination as $d)
                        <h5><i class="material-icons">room</i>{{$d->destination}}</h5>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endif

@section('footer')
 <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <!-- <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script> -->

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="../../plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <!-- <script src="../../plugins/multi-select/js/jquery.multi-select.js"></script> -->

    <!-- Jquery Spinner Plugin Js -->
    <script src="../../plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <script src="../../plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="../../plugins/nouislider/nouislider.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    
    <script src="../../plugins/select2/select2.min.js"></script>
    <!-- <script src="../../js/pages/forms/advanced-form-elements.js"></script> -->

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
    <script>
        function showedit(){
            $("#detailproductcategory").hide();
            $("#editproductcategory").show();
            $("#detailproducttype").hide();
            $("#editproducttype").show();
            $("#detailproductName").hide();
            $("#editproductName").show();
            $("#detailminPerson").hide();
            $("#editminPerson").show();
            $("#detailmaxPerson").hide();
            $("#editmaxPerson").show();
            $("#editbutton").attr("onclick","hideedit()");
        }

        function hideedit(){
            $("#detailproductcategory").show();
            $("#editproductcategory").hide();
            $("#detailproducttype").show();
            $("#editproducttype").hide();
            $("#detailproductName").show();
            $("#editproductName").hide();
            $("#detailminPerson").show();
            $("#editminPerson").hide();
            $("#detailmaxPerson").show();
            $("#editmaxPerson").hide();
            $("#editbutton").attr("onclick","showedit()");
        }

        function disabled_product(id){
            $.ajax({
                url: "{{url('products/disabled')}}/"+id,
                type: "GET"
            });
            $("#enabledProduct").hide();
            $("#disabledProduct").show();
        }

        function enabled_product(id){
            $.ajax({
                url: "{{url('products/enabled')}}/"+id,
                type: "GET"
            });
            $("#disabledProduct").hide();
            $("#enabledProduct").show();
        }
    </script>
@endsection