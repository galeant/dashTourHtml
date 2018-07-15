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

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap Select2 -->
    <link href="../../plugins/select2/select2.min.css" rel="stylesheet" />
    

    <!-- Bootstrap Tagsinput Css -->
    <link href="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Dropzone Css -->
    
    <link href="../../plugins/bootstrap-file-input/css/fileinput.css" rel="stylesheet" media="all">
    <link href="../../plugins/bootstrap-file-input/themes/explorer-fa/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <style>
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
    </style>

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- GMAP -->
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
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

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
      #target {
        width: 345px;
      }
    </style>
    <script>
        $(document).ready(function() 
        {
            var form = $('#wizard').show();
            form.steps({
                headerTag: 'h2',
                bodyTag: 'section',
                transitionEffect: 'slideLeft',
                onStepChanging: function (event, currentIndex, newIndex) {
                    if (currentIndex > newIndex) { return true; }

                    if (currentIndex < newIndex) {
                        form.find('.body:eq(' + newIndex + ') label.error').remove();
                        form.find('.body:eq(' + newIndex + ') .error').removeClass('error');
                    }

                    form.validate().settings.ignore = ':disabled,:hidden';
                    return form.valid();
                },
                onFinishing: function (event, currentIndex) {
                    form.validate().settings.ignore = ':disabled';
                    return form.valid();
                },
                onFinished: function (event, currentIndex) {
                    $("#wizard").submit();
                }
            });

            form.validate({
                highlight: function (input) {
                    $(input).parents('.form-line').addClass('error');
                },
                unhighlight: function (input) {
                    $(input).parents('.form-line').removeClass('error');
                },
                errorPlacement: function (error, element) {
                    $(element).parents('.form-group').append(error);
                },
                rules: {
                    'confirm': {
                        equalTo: '#password'
                    }
                }
            });
        });
    </script>
    <script>
        $("#productCategory").val('{{$product->productCategory}}');
    </script>
@endsection
@section('page')
<div class="container-fluid" id="popok">
    <div class="card">
        <div class="header">
            <h2>Add Product Form</h2>
        </div>
        <div class="body">
            <form id="wizard" action="{{ url('/products/update') }}" method="POST">
            @csrf
            {{ Form::hidden('productId', $product->productId) }}
                <h2>General Information</h2>
                <section>
                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                        <div class="header" style="padding: 10px 10px 0px 10px">
                            <h4>PIC</h4>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Name*</h5>
                                            <input type="text" class="form-control" name="PICName" placeholder="PIC Name" required />
                                        </div>
                                        <div class="col-md-12">
                                            <h5>Email*</h5>
                                            <input type="text" class="form-control" name="PICEmail" placeholder="PIC Name" required />
                                        </div>
                                        <div class="col-md-12">
                                            <h5>Phone*</h5>
                                            <input type="text" class="form-control" name="PICPhone" placeholder="PIC Name" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                        <div class="header" style="padding: 10px 10px 0px 10px">
                            <h4>Product Information</h4>
                        </div>
                        <div class="body">
                            <div class="row" style="padding-bottom: 20px">
                                <div class="col-md-2">
                                    <h5>Product Category</h5>
                                    <select name="productCategory" class="form-control show-tick" id="productCategory">
                                        <option>Tour</option>
                                        <option>Activity</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <h5>Type</h5>
                                    <select  name="productType" class="form-control show-tick" id="productType">
                                        <option>Open</option>
                                        <option>Private</option>
                                    </select>
                                </div>
                                <div class="col-md-6" style="padding-top: 30px" id="productInformation">
                                    <h5>Information</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Product Name*</h5>
                                    <input type="hidden" name="productCode" value="Pigijo-1"/>
                                    <input type="text" class="form-control" name="productName" id="productName" placeholder="Product Name" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Minimum Person *</h5>
                                    <input type="text" class="form-control" name="minPerson" id="productminPerson"placeholder="Minimum Person" required />
                                </div>
                                <div class="col-md-3">
                                    <h5>Maximum Person *</h5>
                                    <input type="text" class="form-control" name="maxPerson" id="productmaxPerson" placeholder="Maximum Person" required />    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Starting Point* (Gathering point/where should your costumer meet you?)</h5>
                                    <input type="text" class="form-control" id="geo-address" name="meetingPoint[address]" placeholder="Meeting Point" required />
                            
                                </div>
                                <div class="row-clearfix"> 
                                    <h5>&nbsp</h5>
                                    <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#mapModal">Open Map</button>
                                    <div class="modal fade" id="mapModal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" id="pac-input" placeholder="Search">
                                                    <div id="gmap_basic_example" class="gmap"></div>    
                                                    <input type="hidden" id="geo-lat" class="form-control" name="meetingPoint[latitude]" />    
                                                    <input type="hidden" id="geo-long" class="form-control" name="meetingPoint[longitude]" />   
                                                    <input type="hidden" id="geo-city" class="form-control" name="meetingPoint[city]" />   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                    <button type="button" class="btn btn-link waves-effect" onclick="getLatLng()">SAVE CHANGES</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Start Selling Date</h5>
                                    <input type="text" name="startSellingDate" id="productstartSellingDate" class="form-control floating-label" placeholder="Start Date" required>    
                                </div>
                                <div class="col-md-3">
                                    <h5>End Selling Date</h5>
                                    <input type="text" name="endSellingDate" id="productendSellingDate" class="form-control floating-label" placeholder="End Date" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Term & Condition*</h5>
                                    <textarea rows="4" name="termCondition" id="producttermCondition" class="form-control no-resize" placeholder="Term & Condition"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                        <div class="header" style="padding: 10px 10px 0px 10px">
                            <h4>Duration & Schedule</h4>
                        </div>
                        <div class="body">
                            <div class="row" style="margin-bottom: 25px">
                                <div class="col-md-12">
                                    <h5>How long is the duration of your tour/activity ?</h5>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="font-bold col-orange">{{$typeschedule}}</h4>
                                </div>
                            </div>
                            <div id="schedule_body" style="display: none">
                                <div class="row" id="row_1_schedule" style="margin-bottom: 25px">
                                    <div class="append1">
                                        <div class="col-md-12" style="margin-bottom: 10px">
                                            <h5>How long will the tour / activity take place?</h5>
                                        </div>
                                        <div id="combo1">
                                            <input type="text" id="countdayschedule" value="{{$countdayschedule}}" hidden>
                                            <div class="col-md-2">
                                                <h5>{{$countdayschedule}} Days</h5>
                                            </div>
                                        </div>
                                        <div id="combo2" style="display: none">
                                            <div class="col-md-2">
                                                <select id="schedule_hours" class="form-control">
                                                    <option value="">Select Hours</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1" style="margin-right: 10px">
                                                <p><b>Hours</b></p>
                                            </div>
                                        </div>
                                        <div id="combo3" style="display: none">
                                            <div class="col-md-2">
                                                <select id="schedule_minutes" class="form-control">
                                                    <option value="">Select Minutes</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="30">30</option>
                                                    <option value="40">40</option>
                                                    <option value="50">50</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1" style="margin-right: 10px">
                                                <p><b>Minute</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="dinamic_schedule">
                                    <div class="col-md-3" id="scheduleCol1">
                                        <input id="scheduleFieldId" type="hidden" name="schedule[0][scheduleId]"/>
                                        <h5>Start date *</h5>
                                        <input type="text" id="scheduleField1" class="form-control floating-label" name="schedule[0][startDate]" placeholder="Start Date"/>
                                    </div>
                                    <div class="col-md-3" id="scheduleCol2">
                                        <h5>End date *</h5>
                                        <input type="text" id="scheduleField2" class="form-control" name="schedule[0][endDate]" placeholder="End Date" disabled/>
                                    </div>
                                    <div class="col-md-3" id="scheduleCol3" style="display: none">
                                        <h5>Start hours *</h5>
                                        <input type="text" id="scheduleField3" class="form-control" name="schedule[0][startHours]" placeholder="Start Hours"/>
                                    </div>
                                    <div class="col-md-3" id="scheduleCol4" style="display: none">
                                        <h5>End hours *</h5>
                                        <input type="text" id="scheduleField4" class="form-control" name="schedule[0][endHours]" placeholder="End Hours" disabled/>
                                    </div>
                                    <div class="col-md-2" id="scheduleCol5">
                                        <h5>Maximum group *</h5>
                                        <input type="text" id="scheduleField5" class="form-control" name="schedule[0][maximumGroup]" placeholder="Minimum Person"/>
                                    </div>
                                    <div class="col-md-1" style="padding-top:35px "></div>
                                </div>
                                <div id="clone_dinamic_schedule">
                                  
                                </div>
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
                    </div>
                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                        <div class="header" style="padding: 10px 10px 0px 10px">
                            <h4>Tour / Activity Location</h4>
                        </div>
                        <div class="body">
                            <div class="row" style="margin-bottom: 20px">
                                <div class="col-md-12">
                                    <h5>List down all destination related to your tour package / activity.</h5>
                                    <h5>The more accurate you list down the destinations, better your product's peformance in search result.</h5>
                                </div>
                            </div>
                            <div class="row" id="dinamic_destination">
                                <div class="col-md-6">
                                    <h5>Destination *</h5>
                                    @for($i=0;$i<$countdestination; $i++)
                                        @if($i==0)
                                            <input type="text" class="form-control" name="destination[]" placeholder="Destination" value="{{$destination[$i]->destination}}" required />
                                        @endif
                                    @endfor
                                </div>
                                <div class="col-md-1" style="padding-top:35px "></div>
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
                    </div>
                </section>
                
                <h2>Activity Detail</h2>
                <section>
                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                        <div class="header"> 
                            <h4>Activity Tag</h4>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>How would you describe the activities in this product?</h5>
                                    <select class="form-control" name="activityTag[]" id="productactivityTag" multiple="multiple" style="width: 100%"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                        <div class="header"> 
                            <h4>Itinerary Detail</h4>
                        </div>
                        <div class="body" id="itinerary_list">
                            <h4></h4>
                            <input id="field_itinerary_input1" type="hidden" />
                            <div class="row" id="itinerary_row">
                                <div class="col-md-2" id="field_itinerary1">
                                    <h5>Start time*</h5>
                                    <input id="field_itinerary_input_id" type="hidden" />
                                    <input id="field_itinerary_input2" type="text" class="form-control" placeholder="Start time" required />
                                </div>
                                <div class="col-md-2" id="field_itinerary2">
                                    <h5>End time*</h5>
                                    <input id="field_itinerary_input3" type="text" class="form-control" placeholder="End Time" required />
                                </div>
                                <div class="col-md-3" id="field_itinerary3" >
                                    <h5>Activity Category</h5>
                                    <select id="field_itinerary_input4" class="form-control">
                                        <option value="1">Pick Up</option>
                                        <option value="2">Start Tour</option>
                                        <option value="3">Experience</option>
                                        <option value="4">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="field_itinerary4" style="display:none">
                                    <h5>Destination</h5>
                                    <input id="field_itinerary_input5" type="text" class="form-control" placeholder="Destination" required />
                                </div>
                                <div class="col-md-4" id="field_itinerary5" style="display:none"></div>
                                <div class="col-md-3" id="field_itinerary6" style="display:none">
                                    <h5>Activity</h5>
                                    <select id="field_itinerary_input6" class="form-control">
                                        <option value="1">Cycling</option>
                                        <option value="2">Walking</option>
                                        <option value="3">Running</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="field_itinerary7">
                                    <h5>Description</h5>
                                    <input id="field_itinerary_input7" type="text" class="form-control" placeholder="Description" required />
                                </div>
                                <div class="col-md-1" style="padding-top:35px"></div>
                            </div>
                            <div id="clone_dinamic_itinerary"></div>
                            <div class="row" style="margin-top:10px">
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-warning waves-effect" id="add_itinerary_row">
                                        <i class="material-icons">add</i>
                                        <span>Add Itinerary</span>
                                    </button>
                                </div>
                            </div>    
                        </div>
                        
                        <div id="itineraryGenerate"></div>
                    </div>
                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                        <div class="header" > 
                            <h4>Additional Information</h4>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>Give more detail about your tour/activity i.e transportation information, lodgin information , etc</h5>
                                    <textarea rows="5" class="form-control no-resize" placeholder="Additional information" id="productadditionalInfo" name="additionalInfo"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <h2>Pricing</h2>
                <section>
                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                        <div class="header" style="padding: 10px 10px 0px 10px">
                            <h4>Pricing Details</h4>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-3">
                                    <input name="price[kurs]" type="radio" id="1p" class="radio-col-deep-orange" value="1" required/>
                                    <label for="1p">I only have pricing in IDR</label>
                                </div>
                                <div class="col-md-6">
                                    <input name="price[kurs]" type="radio" id="2p" class="radio-col-deep-orange" value="2"/>
                                    <label for="2p">I want to add pricing in USD for international tourist</label>
                                </div>
                            </div>
                            <div class="row" id="price_row" style="display: none">
                                <div class="col-md-3">
                                    <h5>Pricing Option</h5>
                                    <select name="price[type]" id="price_type" class="form-control">
                                        <option value="1">Fixed</option>
                                        <option value="2">Based</option>
                                    </select>
                                </div>
                                <div id="price_fix">
                                    <div class="col-md-3" id="price_idr">
                                        <h5>Price IDR</h5>
                                        <input type="hidden" name="price[value][0][people]" value="fixed"> 
                                        <input type="text" name="price[value][0][IDR]" class="form-control" placeholder="Price IDR" required />     
                                    </div>
                                    <div class="col-md-3" id="price_usd">
                                        <h5>Price USD</h5>
                                        <input type="text" name="price[value][0][USD]" class="form-control" placeholder="Price USD" required />     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="box-shadow: none;margin-bottom: 0px;display: none" id="price_table_container">
                        <div class="header" style="padding: 10px 10px 0px 10px">
                            <h4>Pricing Tables</h4>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-6" id="price_list" style="display: none">
                                    <div class="row">
                                        <div class="col-md-1" style="padding:30px 0 0 10px">
                                            <h5><i class="material-icons">person</i></h5>
                                        </div>
                                        <div class="col-md-11">
                                            <div class="row">
                                                <div class="col-md-6" id="price_idr">
                                                    <h5>Price IDR</h5>
                                                    <input id="price_list_field1" type="hidden" required>  
                                                    <input id="price_list_field2" type="text" class="form-control" placeholder="Price IDR" required>     
                                                </div>
                                                <div class="col-md-6" id="price_usd">
                                                    <h5>Price USD</h5>
                                                    <input id="price_list_field3" type="text" class="form-control" placeholder="Price USD" required />     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="price_list_container"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                        <div class="header" style="box-shadow: none;margin-bottom: 0px"> 
                            <h4>Price Includes</h4>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>What's already included with pricing you have set?What will you provide?</h5>
                                    <select type="text" class="form-control" name="price[includes][]" id="productpriceIncludes"multiple="multiple" style="width: 100%"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                        <div class="header" style="box-shadow: none;margin-bottom: 0px"> 
                            <h4>Price Excludes</h4>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>What's not included with pricing you have set?Any extra cost the costumer should be awere of?</h5>
                                    <select class="form-control" name="price[excludes][]" id="productpriceExcludes" multiple="multiple" style="width: 100%"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                        <div class="card" style="box-shadow: none;margin-bottom: 0px">
                            <div class="header" style="padding: 10px 10px 0px 10px">
                                <h4>Cancellation Policy</h4>
                            </div>
                            <div class="body">
                                <div class="row" style="margin-bottom: 25px">
                                    <div class="col-md-2">
                                        <input name="cancellation[type]" type="radio" id="1c" class="radio-col-deep-orange" value="1" required/>
                                        <label for="1c">No cancellation</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input name="cancellation[type]" type="radio" id="2c" class="radio-col-deep-orange" value="2" />
                                        <label for="2c">Free cancellation</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input name="cancellation[type]" type="radio" id="3c" class="radio-col-deep-orange" value="3" />
                                        <label for="3c">Cancellation policy applies</label>
                                    </div>
                                </div>
                                <div class="row" id="cancel_policy" style="display: none">
                                    <div class="col-md-12">
                                        <h5>How is your cancellation policy?</h5>
                                    </div>
                                    <div class="col-md-1">
                                        <h5>Cancellation</h5>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="cancellation[minDay]" id="productcancellation[minDay]" class="form-control" placeholder="Day" required >
                                    </div>
                                    <div class="col-md-3">
                                        <h5>days prior schedule, cancellation fee</h5>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="cancellation[fee]"  id="productcancellation[fee]" class="form-control" placeholder="value" required>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>%(percent)</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <h5>Your cancellation policy details</h5>
                                        <div class="col-sm-6">
                                            <textarea rows="5" name="cancellation[details]" id="productcancellation[details]" class="form-control no-resize" placeholder="cancellation detail"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <h2>Upload Images</h2>
                <section>
                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                        <div class="header" style="padding: 10px 10px 0px 10px">
                            <h4>Upload Images</h4>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                                        <div class="header" style="padding: 10px 10px 0px 10px">
                                            <h4><i class="material-icons">perm_media</i> Destination Photo</h4>
                                        </div>
                                        <div class="body">
                                        @foreach($file as $f)
                                            @if($f->fileCategory == 'surround')
                                                <div class="col-md-6" id="filepreview">
                                                    <img src="{{ asset($f->url) }}" alt="" class="img-responsive">
                                                    <input id="delete{{$f->fileId}}" type="button" onclick="deleteimage({{$f->fileId}})" value="Delete">
                                                </div>
                                                
                                            @endif
                                        @endforeach
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="body">
                                            <input id="file-1" type="file" name="file[destinasi][][url]" multiple required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                                        <div class="header" style="padding: 10px 10px 0px 10px">
                                            <h4><i class="material-icons">perm_media</i> Activities Photo</h4>
                                        </div>
                                        <div class="body">
                                            <input id="file-2" type="file" name="file[activity][][url]" multiple required>    
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                                        <div class="header" style="padding: 10px 10px 0px 10px">
                                            <h4><i class="material-icons">perm_media</i> Accommodation Photo</h4>
                                        </div>
                                        <div class="body">
                                            <input id="file-3" type="file" name="file[accommodation][][url]" multiple required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                                        <div class="header" style="padding: 10px 10px 0px 10px">
                                            <h4><i class="material-icons">perm_media</i> Others Photo</h4>
                                        </div>
                                        <div class="body">
                                            <input id="file-4" type="file" name="file[other][][url]" multiple required>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12" style="padding-left:30px">
                                    <div class="card" style="box-shadow: none;margin-bottom: 0px">
                                        <div class="header" style="padding: 10px 10px 0px 10px">
                                            <h4><i class="material-icons">perm_media</i> Video URL</h4>
                                        </div>
                                        <div class="body">
                                            <h5>Add your video link to embed the video into your product's gallery.</h5>
                                            <div id="file_video_body" class="col-md-6" style="padding-left:0px">
                                                <div id="embed_type"><input type="text" class="form-control" name="file[video][embed][]" placeholder="URL Video ex.www.youtube.com" required /></div>
                                            </div>
                                            <div class="col-md-3">                            
                                                <button type="button" class="btn btn-warning waves-effect" id="add_more_destination">
                                                    <i class="material-icons">add</i>
                                                    <span>Add link</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </section>

                <!-- <h2>Confirm</h2>
                <section>
                </section> -->
            </form>  
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
            var map = new google.maps.Map(document.getElementById('gmap_basic_example'), {
                center: {lat: -33.8688, lng: 151.2195},
                zoom: 13,
                mapTypeId: 'roadmap'
            });
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });
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
                google.maps.event.addListener(marker, 'dragend', function (event) {
                    lat = event.latLng.lat();
                    lng = event.latLng.lng();
                    $.ajax({url: "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lng+"&key=AIzaSyAXELYNJkxo43slp8y_FFng0KL4YXSsOo4", success: function(result){
                        // console.log(result[0]["formatted_address"]);
                        address = result["results"][0]["formatted_address"];
                        city = result["results"][0]["address_components"][4]["long_name"];
                    }});
                });
                google.maps.event.addListener(map, 'click', function(event) {
                    lat = event.latLng.lat();
                    lng = event.latLng.lng();
                    placeMarker(event.latLng);
                });

                function placeMarker(location) {
                    var mapOptionsNew = {
                        zoom: 14,
                        center: location
                    }
                    var map = new google.maps.Map(document.getElementById("gmap_basic_example"), mapOptionsNew);

                    marker = new google.maps.Marker({
                        position: location, 
                        map: map,
                        draggable:true,
                        title:"Drag me!"
                    });    
                    google.maps.event.addListener(map, 'click', function(event) {
                        placeMarker(event.latLng);
                    });
                    $.ajax({url: "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lng+"&key=AIzaSyAXELYNJkxo43slp8y_FFng0KL4YXSsOo4", success: function(result){
                        // console.log(result[0]["formatted_address"]);
                        address = result["results"][0]["formatted_address"];
                        city = result["results"][0]["address_components"][4]["long_name"];
                    }});
                }

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

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/select2/select2.min.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="../../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="../../plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Moment Plugin Js -->
    <script src="../../plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="../../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="../../plugins/bootstrap-file-input/js/fileinput.js" type="text/javascript"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <!-- <script src="../../js/pages/forms/form-wizard.js"></script> -->

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
    <!-- Date Picker-->

    <script>
            $("#productCategory").val('{{$product->productCategory}}');
    </script>



    <script type="text/javascript">
    
        $(document).ready(function()
        {   
            $("input[name='endSellingDate']:text").bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'DD-MM-YYYY',  time: false, minDate : new Date()
            });
            $("input[name='startSellingDate']:text").bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'DD-MM-YYYY',  time: false, minDate : new Date()
            }).on('change', function(e, date)
            {
                $("input[name='endSellingDate']:text").bootstrapMaterialDatePicker('setMinDate', date);
            });
            @for($i=0; $i<$countschedule; $i++)
                @if($i==0)
                    $("#scheduleField2").bootstrapMaterialDatePicker
                    ({
                        weekStart: 0, format: 'DD-MM-YYYY',  time: false, minDate : new Date()
                    });
                    $("#scheduleField1").bootstrapMaterialDatePicker
                    ({
                        weekStart: 0, format: 'DD-MM-YYYY',  time: false, minDate : new Date()
                    }).on('change', function(e, date)
                    {
                        var choose = new Date(date);
                        var newdate = new Date(choose);
                        var scheduledays = ({{$countdayschedule}}-1);
                        newdate.setDate(newdate.getDate()+parseInt(scheduledays))
                        if(scheduledays==""){
                            alert("Select Day")
                            $(this).closest("#dinamic_schedule").find("#scheduleField2").val("");
                        }
                        else{
                            var datee = (newdate.getDate() < 10 ? '0' : '') + newdate.getDate();
                            var month = ((newdate.getMonth() + 1) < 10 ? '0' : '') + (newdate.getMonth() + 1);
                            var year = newdate.getFullYear();
                            $(this).closest("#dinamic_schedule").find("#scheduleField2").bootstrapMaterialDatePicker('setMinDate', (date));
                            $(this).closest("#dinamic_schedule").find("#scheduleField2").val(datee+"-"+month+"-"+year)
                        }
                    });

                    $("#scheduleField4").bootstrapMaterialDatePicker
                    ({
                        weekStart: 0, format: 'HH:mm',  date: false
                    });
                    $("#scheduleField3").bootstrapMaterialDatePicker
                    ({
                        weekStart: 0, format: 'HH:mm',  date: false
                    }).on('change', function(e, date)
                    {   
                        var choose = new Date(date);
                        var newtime = new Date(choose);
                        var schedulehours = $("#schedule_hours").val();
                        var scheduleminutes = $("#schedule_minutes").val();
                        newtime.setHours(newtime.getHours()+parseInt(schedulehours));
                        newtime.setMinutes(newtime.getMinutes()+parseInt(scheduleminutes));
                        if(schedulehours=="" || scheduleminutes==""){
                            alert("Select Hours and Minutes")
                            $(this).closest("#dinamic_schedule").find("input#scheduleField4").val("");
                        }
                        else{
                            var hour = (newtime.getHours() < 10 ? '0' : '') + newtime.getHours();
                            var minute = (newtime.getMinutes() < 10 ? '0' : '') + newtime.getMinutes();
                            $(this).closest("#dinamic_schedule").find("#scheduleField4").bootstrapMaterialDatePicker('setMinDate', (date));
                            $(this).closest("#dinamic_schedule").find("#scheduleField4").val(hour+":"+minute)
                        }
                    });
                    
                
                @elseif($i>0)
                    $("#dinamic_schedule").clone().appendTo("#clone_dinamic_schedule").addClass("row dinamic_schedule"+{{$i}});
                    // $(".dinamic_schedule"+{{$i}}+" .col-md-1").append('<button type="button" id="delete_schedule" class="btn btn-danger waves-effect"><i class="material-icons">clear</i></button>');
                    $(".dinamic_schedule"+{{$i}}+" #scheduleField1").attr("name","schedule["+{{$i}}+"][startDate]").bootstrapMaterialDatePicker({
                            weekStart: 0, format: 'DD-MM-YYYY',  time: false, minDate : new Date()
                        }).on('change', function(e, date){
                            var choose = new Date(date);
                            var newdate = new Date(choose);
                            var scheduledays = ({{$countdayschedule}}-1);
                            newdate.setDate(newdate.getDate()+parseInt(scheduledays))
                            if(scheduledays==""){
                                alert("Select Day")
                                $(this).closest("#dinamic_schedule").find("#scheduleField2").val("");
                            }
                            else{
                                var datee = (newdate.getDate() < 10 ? '0' : '') + newdate.getDate();
                                var month = ((newdate.getMonth() + 1) < 10 ? '0' : '') + (newdate.getMonth() + 1);
                                var year = newdate.getFullYear();
                                $(this).closest("#dinamic_schedule").find("#scheduleField2").bootstrapMaterialDatePicker('setMinDate', (date));
                                $(this).closest("#dinamic_schedule").find("#scheduleField2").val(datee+"-"+month+"-"+year)
                            }
                        });
                    $(".dinamic_schedule"+{{$i}}+" #scheduleField2").attr("name","schedule["+{{$i}}+"][endDate]").bootstrapMaterialDatePicker({
                            weekStart: 0, format: 'DD-MM-YYYY',  time: false
                        });
                    $(".dinamic_schedule"+{{$i}}+" #scheduleField3").attr("name","schedule["+{{$i}}+"][startHours]").bootstrapMaterialDatePicker({
                            format: 'HH:mm',  date: false
                        }).on('change', function(e, date){
                            var choose = new Date(date);
                            var newtime = new Date(choose);
                            var schedulehours = $("#schedule_hours").val();
                            var scheduleminutes = $("#schedule_minutes").val();
                            newtime.setHours(newtime.getHours()+parseInt(schedulehours));
                            newtime.setMinutes(newtime.getMinutes()+parseInt(scheduleminutes));
                            if(schedulehours=="" || scheduleminutes==""){
                                alert("Select Hours and Minutes")
                                $(this).closest("#dinamic_schedule").find("input#scheduleField4").val("");
                            }
                            else{
                                var hour = (newtime.getHours() < 10 ? '0' : '') + newtime.getHours();
                                var minute = (newtime.getMinutes() < 10 ? '0' : '') + newtime.getMinutes();
                                $(this).closest("#dinamic_schedule").find("#scheduleField4").bootstrapMaterialDatePicker('setMinDate', (date));
                                $(this).closest("#dinamic_schedule").find("#scheduleField4").val(hour+":"+minute)
                            }
                        });
                    $(".dinamic_schedule"+{{$i}}+" #scheduleField4").attr("name","schedule["+{{$i}}+"][endHours]").bootstrapMaterialDatePicker({
                            format: 'HH:mm',  date: false
                        });
                    $(".dinamic_schedule"+{{$i}}+" #scheduleField5").attr("name","schedule["+{{$i}}+"][maximumGroup]");
                    $(".dinamic_schedule"+{{$i}}+" #scheduleFieldId").attr("name","schedule["+{{$i}}+"][scheduleId]");
                @endif
            @endfor
            $("#schedule_days").on('change', function(){
                $("#schedule_body #scheduleField1").val("");
                $("#schedule_body #scheduleField2").val("");
            });
            $("#schedule_hours").on('change', function(){
                $("#schedule_body #scheduleField2").val("");
                $("#schedule_body #scheduleField3").val("");
                $("#schedule_body #scheduleField4").val(""); 
            });
            $("#schedule_minutes").on('change', function(){
                $("#schedule_body #scheduleField2").val("");
                $("#schedule_body #scheduleField3").val("");
                $("#schedule_body #scheduleField4").val("");
            });
        });
    </script>
    <!-- Schedule-->
    <script>
      $(document).ready(function () {
        $("#popok *").removeAttr("required");
        $("input[name='scheduleType']:radio").change(function () {
          $("#schedule_body").show(200);
          var val = this.value;
          if(val == 1)
          {
            $("#scheduleField3, #scheduleField4").removeAttr("required").removeAttr("aria-required");
            $("#scheduleCol1, #scheduleCol2, #scheduleCol5, #combo1").show();
            $("#scheduleCol3, #scheduleCol4, #combo2, #combo3").hide(150);
          }else if(val == 2)
          {
            $("#scheduleField2").removeAttr("required").removeAttr("aria-required");
            $("#scheduleCol1, #scheduleCol3, #scheduleCol4, #scheduleCol5, #combo2, #combo3").show(150);
            $("#scheduleCol2,#combo1").hide(150);
          }else{
            $("#scheduleField2, #scheduleField3, #scheduleField4").removeAttr("required").removeAttr("aria-required");
            $("#scheduleCol1, #scheduleCol5").show(150);
            $("#scheduleCol2, #scheduleCol3, #scheduleCol3, #scheduleCol4, #combo1, #combo2,#combo3").hide(150);
          }
        });
        var i = {{$countdayschedule}}-1;
        $("#add_more_schedule").click(function(){
            i++;
            $("#dinamic_schedule").clone().appendTo("#clone_dinamic_schedule").addClass("row dinamic_schedule"+i);
            $(".dinamic_schedule"+i+" .col-md-1").append('<button type="button" id="delete_schedule" class="btn btn-danger waves-effect"><i class="material-icons">clear</i></button>');
            $(".dinamic_schedule"+i+" #scheduleField1").attr("name","schedule["+i+"][startDate]").bootstrapMaterialDatePicker({
                            weekStart: 0, format: 'DD-MM-YYYY',  time: false, minDate : new Date()
                        }).on('change', function(e, date){
                            var choose = new Date(date);
                            var newdate = new Date(choose);
                            var scheduledays = ({{$countdayschedule}}-1);
                            newdate.setDate(newdate.getDate()+parseInt(scheduledays))
                            if(scheduledays==""){
                                alert("Select Day")
                                $(this).closest("#dinamic_schedule").find("#scheduleField2").val("");
                            }
                            else{
                                var datee = (newdate.getDate() < 10 ? '0' : '') + newdate.getDate();
                                var month = ((newdate.getMonth() + 1) < 10 ? '0' : '') + (newdate.getMonth() + 1);
                                var year = newdate.getFullYear();
                                $(this).closest("#dinamic_schedule").find("#scheduleField2").bootstrapMaterialDatePicker('setMinDate', (date));
                                $(this).closest("#dinamic_schedule").find("#scheduleField2").val(datee+"-"+month+"-"+year)
                            }
                        });
            $(".dinamic_schedule"+i+" #scheduleField2").attr("name","schedule["+i+"][endDate]").bootstrapMaterialDatePicker({
                    weekStart: 0, format: 'DD-MM-YYYY',  time: false
                });
            $(".dinamic_schedule"+i+" #scheduleField3").attr("name","schedule["+i+"][startHours]").bootstrapMaterialDatePicker({
                            format: 'HH:mm',  date: false
                        }).on('change', function(e, date){
                            var choose = new Date(date);
                            var newtime = new Date(choose);
                            var schedulehours = $("#schedule_hours").val();
                            var scheduleminutes = $("#schedule_minutes").val();
                            newtime.setHours(newtime.getHours()+parseInt(schedulehours));
                            newtime.setMinutes(newtime.getMinutes()+parseInt(scheduleminutes));
                            if(schedulehours=="" || scheduleminutes==""){
                                alert("Select Hours and Minutes")
                                $(this).closest("#dinamic_schedule").find("input#scheduleField4").val("");
                            }
                            else{
                                var hour = (newtime.getHours() < 10 ? '0' : '') + newtime.getHours();
                                var minute = (newtime.getMinutes() < 10 ? '0' : '') + newtime.getMinutes();
                                $(this).closest("#dinamic_schedule").find("#scheduleField4").bootstrapMaterialDatePicker('setMinDate', (date));
                                $(this).closest("#dinamic_schedule").find("#scheduleField4").val(hour+":"+minute)
                            }
                        });
            $(".dinamic_schedule"+i+" #scheduleField4").attr("name","schedule["+i+"][endHours]").bootstrapMaterialDatePicker({
                    format: 'HH:mm',  date: false
                });
            $(".dinamic_schedule"+i+" #scheduleField5").attr("name","schedule["+i+"][maximumGroup]");
            $(".dinamic_schedule"+i+" input").val("")
        });
        $(document).on("click", "#delete_schedule", function() {
            $(this).closest("#dinamic_schedule").remove();
        });
      });
    </script>
    <!-- Destination-->
    <script type="text/javascript">
        $(document).ready(function (){
            var i = {{$countdestination}}-1;
            $("#add_more_destination").click(function(){
                i++;
                $("#dinamic_destination").clone().appendTo("#clone_dinamic_destination").addClass("row dinamic_destination"+i);
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
            $("input[name='price[kurs]']:radio").change(function () {
                $("#price_row").show();
                var val = this.value;
                if(val == 1){
                    $("#price_usd, #price_list_container #price_usd").hide();
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
                    // var val = $("input[name='maxPerson']:text").val();
                    var val = 5;
                    var i;
                    for(i=0;i<val;i++)
                    { 
                        $("#price_list").clone().appendTo("#price_list_container").attr("id","price_list"+i);
                        $("#price_list"+i+" .row .col-md-1 h5").append((i+1));
                        $("#price_list"+i+" #price_list_field1").val((i+1));
                        $("#price_list"+i+" #price_list_field1").attr("name","price[value]["+i+"][people]");
                        $("#price_list"+i+" #price_list_field2").attr("name","price[value]["+i+"][IDR]");
                        $("#price_list"+i+" #price_list_field3").attr("name","price[value]["+i+"][USD]");                   
                    }
                    $("#price_list").hide();
                }
            });
            $("input[name='cancellation[type]']:radio").change(function () {
            var val = this.value;
            if(val == 3)
            {
                $("#cancel_policy").show(100);
            }else{
                $("#cancel_policy").hide(100);
            }
            });
            var includes = [
                {
                    id: 0,
                    text: 'Sarapan'
                },
                {
                    id: 1,
                    text: 'Makan siang'
                },
                {
                    id: 2,
                    text: 'Makan malam'
                },
                {
                    id: 3,
                    text: 'Camilan'
                }
            ];
            var excludes = [
                {
                    id: 0,
                    text: 'Tempat Menginap'
                },
                {
                    id: 1,
                    text: 'Tiket masuk Atraksi'
                },
                {
                    id: 2,
                    text: 'Sarapan'
                },
                {
                    id: 3,
                    text: 'Sewa mobil'
                }
            ];
            $("select[name='price[includes][]']").select2({
                tags:true,
                data:includes
            });
            $("select[name='price[excludes][]']").select2({
                tags:true,
                data:excludes
            });
        });
    </script>
    <!-- Upload Images-->
    <script>
        $(document).ready(function () {
            $("#file-1,#file-2,#file-3,#file-4,#file-5").fileinput({
                theme: 'fa',
                maxFileCount: 10,
                maxFileSize: 4000,
                showCaption: false,
                showRemove: false,
                showCancel: false,
                showUpload: false,
                previewSettings:{
                    image: {width: "auto", height: "auto"},
                },
                allowedFileExtensions: ["jpg", "png", "gif"]
            });
            $("input[name='file[video][type]']:radio").change(function () {
                $(this).closest(".row").siblings(".col-md-3").show();
                $("#file_video_body").show();
                $("#file_video_body input").val(null);
                var val = this.value;
                if(val == 1){
                    // $("#upload_type input").attr("name","file[video][][url]");
                    $("#upload_type").show(150);
                    $("#embed_type").hide(150);
                }else{
                    $("#embed_type").show(150);
                    // $("#embed_type input").attr("name","file[video][][url]")
                    $("#upload_type").hide(150).removeAttr("required");
                }
            });
        });
    </script>
    <!-- Itinerary-->
    <Script>
        $(document).ready(function() {
            var activityTag = [
                {
                    id: 0,
                    text: 'Sporty'
                },
                {
                    id: 1,
                    text: 'Family'
                },
                {
                    id: 2,
                    text: 'Adventure'
                },
                {
                    id: 3,
                    text: 'Extrem'
                },
                {
                    id: 4,
                    text: 'Luxury'
                },
                {
                    id: 5,
                    text: 'Leisure'
                }
            ];
            $("select[name='activityTag[]']").select2({
                data:activityTag
            });
            $("input[name='scheduleType']:radio").change(function(){
                $("#itineraryGenerate").empty();
                $("#itinerary_list").show();
                var val = $(this).val();
                if(val == 1)
                {
                    $("#schedule_days").change(function(){
                        $("#itineraryGenerate").empty();
                        $("#itinerary_list").show();
                        var days = $("#schedule_days").val();
                        console.log(days);
                        var j = 0;
                        var i;
                        for(i=0;i<days;i++)
                        { 
                            $("#itinerary_list").clone().appendTo("#itineraryGenerate").addClass("body itinerary_list"+i);   
                            $(".itinerary_list"+i+" h4").append("Days "+(i+1)); 
                            $(".itinerary_list"+i+" #field_itinerary_input1").attr("name","itinerary["+i+"][day]").val((i+1));
                            $(".itinerary_list"+i+" #field_itinerary_input2").attr("name","itinerary["+i+"][list][0][startTime]");
                            $(".itinerary_list"+i+" #field_itinerary_input3").attr("name","itinerary["+i+"][list][0][endTime]");
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
                        $(".itinerary_list"+i+" h4").append("Days "+(i+1)); 
                        $(".itinerary_list"+i+" #field_itinerary_input1").attr("name","itinerary["+i+"][day]").val((i+1));
                        $(".itinerary_list"+i+" #field_itinerary_input2").attr("name","itinerary["+i+"][list][0][startTime]");
                        $(".itinerary_list"+i+" #field_itinerary_input3").attr("name","itinerary["+i+"][list][0][endTime]");
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
                }
                $("#itinerary_list").hide();
            });
        });
        var iii = 4;
        function addItineraryRow(a){
            iii++;
            $("#itinerary_row").show().clone().appendTo(".itinerary_list"+a+">#clone_dinamic_itinerary").addClass("dinamic_itinerary"+iii);
            $(".dinamic_itinerary"+iii+" .col-md-1").append('<button type="button" id="delete_itinerary" class="btn btn-danger waves-effect"><i class="material-icons">clear</i></button>');
            $(".dinamic_itinerary"+iii+" #field_itinerary_input1").attr("name","itinerary["+a+"][day]");
            $(".dinamic_itinerary"+iii+" #field_itinerary_input_id").attr("name","itinerary["+a+"][list]["+iii+"][itineraryId]");
            $(".dinamic_itinerary"+iii+" #field_itinerary_input3").attr("name","itinerary["+a+"][list]["+iii+"][endTime]").bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'HH:mm',  date: false
            });
            $(".dinamic_itinerary"+iii+" #field_itinerary_input2").attr("name","itinerary["+a+"][list]["+iii+"][startTime]").bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'HH:mm',  date: false
            }).on('change', function(e, date){
                $(this).closest(".dinamic_itinerary"+iii).find("#field_itinerary_input3").bootstrapMaterialDatePicker('setMinDate', date);
            });
            $(".dinamic_itinerary"+iii+" #field_itinerary_input4").attr("name","itinerary["+a+"][list]["+iii+"][activityCategory]").change(function(){
                var aa = $(this).val();
                console.log(aa);
                if(aa == 1 || aa == 4){
                    $(this).closest("#itinerary_row").find("#field_itinerary4,#field_itinerary5,#field_itinerary6").hide(100);
                    $(this).closest("#itinerary_row").find("#field_itinerary7").removeAttr("class").addClass("col-md-4");
                }else if(aa == 2){
                    $(this).closest("#itinerary_row").find("#field_itinerary6").hide(100);
                    $(this).closest("#itinerary_row").find("#field_itinerary4,#field_itinerary5").show(100);
                    $(this).closest("#itinerary_row").find("#field_itinerary7").removeAttr("class").addClass("col-md-7");
                }else{
                    $(this).closest("#itinerary_row").find("#field_itinerary4,#field_itinerary5,#field_itinerary6").show(100);
                    $(this).closest("#itinerary_row").find("#field_itinerary7").removeAttr("class").addClass("col-md-4");
                }
            });
            $(".dinamic_itinerary"+iii+" #field_itinerary_input5").attr("name","itinerary["+a+"][list]["+iii+"][destination]");
            $(".dinamic_itinerary"+iii+" #field_itinerary_input6").attr("name","itinerary["+a+"][list]["+iii+"][activity]");
            $(".dinamic_itinerary"+iii+" #field_itinerary_input7").attr("name","itinerary["+a+"][list]["+iii+"][description]");
            $(".dinamic_itinerary"+iii+" input").val(null);
        }
        $(document).on("click", "#delete_itinerary", function() {
            $(this).closest("#itinerary_row").remove();
        });
    </Script>
    <script>
        $(document).ready(function() {
            $("input[name='PICName']").val("{{$product->PICName}}");
            $("input[name='PICEmail']").val("{{$product->PICEmail}}");
            $("input[name='PICPhone']").val("{{$product->PICPhone}}");
            $("#productCategory").val("{{$product->productCategory}}");
            $("#productType").val("{{$product->productType}}");
            $("#productName").val("{{$product->productName}}");
            $("#productminPerson").val("{{$product->minPerson}}");
            $("#productmaxPerson").val("{{$product->maxPerson}}");
            $("#pac-input").val("{{$product->meetingPointAddress}}");
            $("#productmeetingPoint[address]").val("{{$product->meetingPointAddress}}");
            $("#geo-lat").val("{{$product->meetingPointLatitude}}");
            $("#geo-long").val("{{$product->meetingPointLongitude}}");
            $("#productstartSellingDate").val("{{date('d-m-Y', strtotime($product->startSellingDate))}}");
            $("#productendSellingDate").val("{{date('d-m-Y', strtotime($product->endSellingDate))}}");
            // 
            $("#producttermCondition").val("{{$product->termCondition}}");


            @foreach($activity as $a)
                $("#productactivityTag").val();
            @endforeach
            $("#productactivityTag").val([1, 2, 3]);
            $("#productactivityTag").select2();
            $("#productadditionalInfo").val("{{$product->additionalInfo}}");
            if("{{$pricetype->priceType}}"=="Fixed"){
                $("#price_type").val(1);
                if({{$pricetype->priceUSD}}=="" || {{$pricetype->priceUSD}}==0){
                    $("#price_row").show();
                    $("input[name='price[kurs]']:radio[value='1']").attr('checked', true);
                    $("#price_usd, #price_list_container #price_usd").hide();
                    $("input[name='price[value][0][IDR]']").val("{{$pricetype->priceIDR}}")
                }
                else{
                    $("#price_row").show();
                    $("input[name='price[kurs]']:radio[value='2']").attr('checked', true);
                    $("input[name='price[value][0][IDR]']").val("{{$pricetype->priceIDR}}")
                    $("input[name='price[value][0][USD]']").val("{{$pricetype->priceUSD}}")                
                    $("#price_usd, #price_list_container #price_usd").show();
                }
            }
            
            else if("{{$pricetype->priceType}}"=="Based"){
                $("#price_type").val(2);
                if({{$pricetype->priceUSD}}=="" || {{$pricetype->priceUSD}}==0){
                    $("#price_fix").hide();
                    $("#price_table_container, #price_list").show();
                    $("#price_row").show();
                    
                    $("input[name='price[kurs]']:radio[value='1']").attr('checked', true);
                    // var val = $("input[name='maxPerson']:text").val();
                    @for($i=0;$i<$pricecount;$i++)
                        $("#price_list").clone().appendTo("#price_list_container").attr("id","price_list"+{{$i}});
                        $("#price_list"+{{$i}}+" .row .col-md-1 h5").append(({{$i+1}}));
                        $("#price_list"+{{$i}}+" #price_list_field1").val(({{$i+1}}));
                        $("#price_list"+{{$i}}+" #price_list_field1").attr("name","price[value]["+{{$i}}+"][people]").val("{{$price[$i]->numberOfPerson}}");
                        $("#price_list"+{{$i}}+" #price_list_field2").attr("name","price[value]["+{{$i}}+"][IDR]").val("{{$price[$i]->priceIDR}}");
                        $("#price_list"+{{$i}}+" #price_list_field3").attr("name","price[value]["+{{$i}}+"][USD]").val("{{$price[$i]->priceUSD}}");
                    @endfor
                }
                else{
                    $("#price_fix").hide();
                    $("input[name='price[kurs]']:radio[value='2']").attr('checked', true);
                    $("#price_row").show();
                    $("#price_table_container, #price_list").show();
                    // var val = $("input[name='maxPerson']:text").val();
                    @for($i=0;$i<$pricecount;$i++)
                        $("#price_list").clone().appendTo("#price_list_container").attr("id","price_list"+{{$i}});
                        $("#price_list"+{{$i}}+" .row .col-md-1 h5").append(({{$i+1}}));
                        $("#price_list"+{{$i}}+" #price_list_field1").val(({{$i+1}}));
                        $("#price_list"+{{$i}}+" #price_list_field1").attr("name","price[value]["+{{$i}}+"][people]").val("{{$price[$i]->numberOfPerson}}");
                        $("#price_list"+{{$i}}+" #price_list_field2").attr("name","price[value]["+{{$i}}+"][IDR]").val("{{$price[$i]->priceIDR}}");
                        $("#price_list"+{{$i}}+" #price_list_field3").attr("name","price[value]["+{{$i}}+"][USD]").val("{{$price[$i]->priceUSD}}");
                    @endfor
                    $("#price_list").hide();
                }
                
            }
            if("{{$typeschedule}}"=="Multiple days"){
                $("#schedule_body").show(200);
                $("#schedule_days").val("{{$countdayschedule}}");
                $("input[name='scheduleType'][value='1']").prop('checked', true);
                $("#scheduleField3, #scheduleField4").removeAttr("required").removeAttr("aria-required");
                $("#scheduleCol1, #scheduleCol2, #scheduleCol5, #combo1").show(150);
                $("#scheduleCol3, #scheduleCol4, #combo2, #combo3").hide(150);
                $("#dinamic_schedule input").val(null);
            }
            else if("{{$typeschedule}}"=="A couple of hours"){
                $("#schedule_body").show(200);
                $("input[name='scheduleType']:radio[value='2']").attr('checked', true);
                $("#scheduleField2").removeAttr("required").removeAttr("aria-required");
                $("#scheduleCol1, #scheduleCol3, #scheduleCol4, #scheduleCol5, #combo2, #combo3").show(150);
                $("#scheduleCol2,#combo1").hide(150);
                
                $("#dinamic_schedule input").val(null);
            }
            else if("{{$typeschedule}}"=="One day full"){
                $("#schedule_body").show(200);
                $("input[name='scheduleType']:radio[value='3']").attr('checked', true);              
                $("#scheduleField2, #scheduleField3, #scheduleField4").removeAttr("required").removeAttr("aria-required");
                $("#scheduleCol1, #scheduleCol5").show(150);
                $("#scheduleCol2, #scheduleCol3, #scheduleCol3, #scheduleCol4, #combo1, #combo2,#combo3").hide(150);
                
                $("#dinamic_schedule input").val(null);
            }

            var pi = [];
            @foreach($priceincludes as $pi)
                pi.push('{{$pi->description}}')
            @endforeach
            $("#productpriceIncludes").val(pi);
            $("#productpriceIncludes").select2();
            
            var pe = [];
            @foreach($priceexcludes as $pe)
                pe.push('{{$pe->description}}')
            @endforeach
            $("#productpriceExcludes").val(pe);
            $("#productpriceExcludes").select2();

            if("{{$product->cancellationType}}"=="Cancellation policy applies"){
                $("input[name='cancellation[type]']:radio[value='3']").attr('checked', true);
                $("#cancel_policy").show(100);
                $("input[name='cancellation[minDay]']").val("{{$product->minCancellationDay}}");
                $("input[name='cancellation[fee]']").val("{{$product->cancellationFee}}");
                $("input[name='cancellation[details]']:text, textarea").val("{{$product->cancellationDetails}}");
            }
            else if("{{$product->cancellationType}}"=="No cancellation"){
                $("input[name='cancellation[type]']:radio[value='1']").attr('checked', true);
                $("#cancel_policy").hide(100);
            }
            else{
                $("input[name='cancellation[type]']:radio[value='2']").attr('checked', true);
                $("#cancel_policy").hide(100);
            }
            $("#productType").val("{{$product->productType}}");
            $("#productType").val("{{$product->productType}}");
            $("#productType").val("{{$product->productType}}");
            
            
        });

       
    </script>
    
        <script>
            var row = 0;
            $(document).ready(function() {
                var j = 0;
                var k;
                var baris;
                for(k=0;k<{{$days}};k++){
                    baris=0
                    @foreach($itinerary as $i)
                        if(({{$i->day}}-1) == k){
                            var row =({{$i->day}}-1);
                            if(baris==0){
                                $("#itinerary_list").clone().appendTo("#itineraryGenerate").addClass("body itinerary_list"+row);   
                                $(".itinerary_list"+row+" h4").html("Days "+ (k+1)); 
                                $(".itinerary_list"+row+" #field_itinerary_input1").attr("name","itinerary["+k+"][day]").val((k+1));
                                $(".itinerary_list"+row+" #field_itinerary_input_id").attr("name","itinerary["+k+"][list][0][itineraryId]").val("{{$i->itineraryId}}");
                                $(".itinerary_list"+row+" #field_itinerary_input2").attr({
                                    name: "itinerary["+k+"][list][0][startTime]"}).val("{{$i->startTime}}");
                                $(".itinerary_list"+row+" #field_itinerary_input3").attr({
                                    name: "itinerary["+k+"][list][0][endTime]"}).val("{{$i->endTime}}");
                                $(".itinerary_list"+row+" #field_itinerary_input4").attr("name","itinerary["+k+"][list][0][activityCategory]").change(function(){
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
                                $(".itinerary_list"+row+" #field_itinerary_input5").attr("name","itinerary["+k+"][list][0][destination]");
                                $(".itinerary_list"+row+" #field_itinerary_input6").attr("name","itinerary["+k+"][list][0][activity]");
                                $(".itinerary_list"+row+" #field_itinerary_input7").attr("name","itinerary["+k+"][list][0][description]");  
                                if("{{$itinerarycount[(($i->day)-1)]->iCount}}"==(baris+1)){
                                    $(".itinerary_list"+row+" .row .col-md-3 button").attr("onclick","addItineraryRow("+(k)+")");
                                }
                                baris++;
                                
                            }
                            else if (baris>0){
                                $(".itinerary_list"+k+">#itinerary_row").clone().appendTo(".itinerary_list"+k+">#clone_dinamic_itinerary").addClass("row dinamic_itinerary"+baris);
                                $(".dinamic_itinerary"+baris+" input").val(null);
                                // $(".dinamic_itinerary"+baris+" .col-md-1").append('<button type="button" id="delete_itinerary" class="btn btn-danger waves-effect"><i class="material-icons">clear</i></button>');
                                $(".dinamic_itinerary"+baris+" #field_itinerary_input_id").attr("name","itinerary["+k+"][list]["+baris+"][itineraryId]").val("{{$i->itineraryId}}");
                                $(".dinamic_itinerary"+baris+" #field_itinerary_input2").attr("name","itinerary["+k+"][list]["+baris+"][startTime]").val("{{$i->startTime}}");
                                $(".dinamic_itinerary"+baris+" #field_itinerary_input3").attr("name","itinerary["+k+"][list]["+baris+"][endTime]").val("{{$i->endTime}}");
                                $(".dinamic_itinerary"+baris+" #field_itinerary_input4").attr("name","itinerary["+k+"][list]["+baris+"][activityCategory]").change(function(){
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
                                $(".dinamic_itinerary"+baris+" #field_itinerary_input5").attr("name","itinerary["+k+"][list]["+baris+"][destination]");
                                $(".dinamic_itinerary"+baris+" #field_itinerary_input6").attr("name","itinerary["+k+"][list]["+baris+"][activity]");
                                $(".dinamic_itinerary"+baris+" #field_itinerary_input7").attr("name","itinerary["+k+"][list]["+baris+"][description]");
                                if("{{$itinerarycount[(($i->day)-1)]->iCount}}"==(baris+1)){
                                    $(".itinerary_list"+row+" .row .col-md-3 button").attr("onclick","addItineraryRow("+(k)+")");
                                }
                                baris++;
                            }
                        }
                    @endforeach
                }
                $("#itinerary_list").hide();


                @for($i=0;$i<$countschedule;$i++)
                    @if($i==0)
                        $("input[name='schedule[0][startDate]']:text").bootstrapMaterialDatePicker('setDate', "{{date('d-m-Y', strtotime($schedule[$i]->startDate))}}");
                        $("input[name='schedule[0][endDate]']:text").bootstrapMaterialDatePicker('setDate', "{{date('d-m-Y', strtotime($schedule[$i]->endDate))}}");
                        $("input[name='schedule[0][startHours]']:text").bootstrapMaterialDatePicker('setDate', "{{date('H:i', strtotime($schedule[$i]->startHours))}}");
                        $("input[name='schedule[0][endHours]']:text").bootstrapMaterialDatePicker('setDate', "{{date('H:i', strtotime($schedule[$i]->endHours))}}");
                        $("input[name='schedule[0][scheduleId]']:hidden").val("{{$schedule[$i]->scheduleId}}");
                        $("input[name='schedule[0][maximumGroup]']:text").val("{{$schedule[$i]->maximumGroup}}");
                    @elseif($i>0)
                        $("input[name='schedule[{{$i}}][startDate]']:text").bootstrapMaterialDatePicker('setDate', "{{date('d-m-Y', strtotime($schedule[$i]->startDate))}}");
                        $("input[name='schedule[{{$i}}][endDate]']:text").bootstrapMaterialDatePicker('setDate', "{{date('d-m-Y', strtotime($schedule[$i]->endDate))}}");
                        $("input[name='schedule[{{$i}}][startHours]']:text").bootstrapMaterialDatePicker('setDate', "{{date('H:i', strtotime($schedule[$i]->startHours))}}");
                        $("input[name='schedule[{{$i}}][endHours]']:text").bootstrapMaterialDatePicker('setDate', "{{date('H:i', strtotime($schedule[$i]->endHours))}}");
                        $("input[name='schedule[{{$i}}][scheduleId]']:hidden").val("{{$schedule[$i]->scheduleId}}");
                        $("input[name='schedule[{{$i}}][maximumGroup]']:text").val("{{$schedule[$i]->maximumGroup}}");
                    @endif
                @endfor
            });
        </script>
        <script>
            function deleteimage(fileid){
                $.ajax({
                    url: "{{url('/product/deletefile')}}/"+fileid,
                    type: 'GET',
                    success: function(res) {
                        
                    }
                });
                console.log($(this))
                $("#delete"+fileid).closest("#filepreview").remove();
            }
        </script>
        <script>
            $(document).attr("title", "");        
        </script>
        <script>
            $(document).ready(function() {
                @for($i=0;$i<$countdestination; $i++)
                    @if($i>=1)
                        $("#dinamic_destination").clone().appendTo("#clone_dinamic_destination").addClass("row dinamic_destination"+{{$i}});
                        $(".dinamic_destination"+{{$i}}+" .col-md-1").append('<button type="button" id="delete_destination" class="btn btn-danger waves-effect"><i class="material-icons">clear</i></button>');
                        $(".dinamic_destination"+{{$i}}+" input").val("{{$destination[$i]->destination}}");
                    @endif
                @endfor    
            });
            
        </script>
@endsection
