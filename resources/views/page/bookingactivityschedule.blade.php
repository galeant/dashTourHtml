@extends('layouts.routing')

@section('header')

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Booking - Pigijo Supplier Dashboard</title>
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

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
    <style>
    .card .header{
        padding:15px
    }
    .bg-orange{
        background-color: #ffb84d !important;
    }
    </style>
@endsection

@if(session('bookingsfullaccess')==1)
@section('page')
<div class="container-fluid">
    <div class="card" style="margin-bottom: 5px">
        <div class="header">
        <h2>All Booking</h2>
        <small>View all your booking either in booking transaction list view or grouped by activity schedule.</small>
        </div>
        <div class="body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row" style="padding-left: 20px">
                        <h5>Product Category</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <select class="form-control" id="booking_category">
                                    <option value="">All Product Category</option>
                                    <option value="Open">Activity - Open Group</option>
                                    <option value="Private">Activity - Private Group</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" id="booking_status">
                                    <option value="">All Activity Status</option>
                                    <option value="Upcoming">Upcoming</option>
                                    <option value="On Going">On Going</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row" style="padding-left: 20px">
                        <h5>Filter Date</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="date" class="form-control" name="dateStart" placeholder="DD/MM/YY" id="booking_from" value="{{date('Y-m-d',strtotime(date('Y-01-01')))}}">
                            </div>
                            <div class="col-md-4">
                                <input type="date" class="form-control" name="dateEnd" placeholder="DD/MM/YY" id="booking_until" value="{{date('Y-m-d',strtotime(date('Y-12-31')))}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="row" style="padding-left: 20px">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="bookingName" placeholder="Search Booking" id="booking_keyword">
                            </div>
                            <div class="col-md-6">
                                <h5><span id="count_booking">100 </span> Bookings</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card" style="background-color: transparent;box-shadow: none" id="data_booking">
        @foreach($booking as $b)
        <div class="body">
            <div class="row" style="margin: 0 10px 10px 10px;background-color: white;border-radius: 10px ">
                <div class="col-md-3" style="text-align: center;center;background-color: #676C56;color: #F6F6F4;border-radius: 10px 0 0 10px ">
                    <div class="row">
                        @if($b->startDate != $b->endDate)
                        <div class="col-md-5" style="text-align: center;background-color: #676C56;color: #F6F6F4;border-radius: 10px 0 0 10px ">
                            <h6>Activity Start Date</h6>
                            <h1 style="margin-top:0px">{{date('d', strtotime($b->startDate))}}</h1>
                            <h4 style="margin-bottom: 0px">{{date('F', strtotime($b->startDate))}}</h4>
                            <small>{{date('Y', strtotime($b->startDate))}}</small>
                        </div>
                        <div class="col-md-2" style="margin-top:20%; margin-left: -5%">
                            <hr width="500%" style="margin-left: -200%">        
                        </div>
                        <div class="col-md-5" style="text-align: center;border-radius: 0 10px 10px 0; margin-left: -5%">
                            <h6>Activity End Date</h6>
                            <h1 style="margin-top:0px">{{date('d', strtotime($b->endDate))}}</h1>
                            <h4 style="margin-bottom: 0px">{{date('F', strtotime($b->endDate))}}</h4>
                            <small>{{date('Y', strtotime($b->endDate))}}</small>
                        </div>
                        @elseif($b->startHours == '00:00:00' && $b->endHours == '23:59:59')
                        <div class="col-md-5" style="text-align: center;background-color: #676C56;color: #F6F6F4;border-radius: 10px 0 0 10px ">
                                <h6>Activity Date</h6>
                                <h1 style="margin-top:0px">{{date('d', strtotime($b->startDate))}}</h1>
                                <h4 style="margin-bottom: 0px">{{date('F', strtotime($b->startDate))}}</h4>
                                <small>{{date('Y', strtotime($b->startDate))}}</small>
                            </div>
                            <div class="col-md-6" style="text-align: center;background-color: #E3DED1;">
                                    <h6 class="col-black">Time</h6>
                                    <br>
                                    <br>
                                    <h4 class="col-black" style="margin-bottom: 0px">{{date('h:i', strtotime($b->endHours))}}</h4>
                                    <br>
                                    <br>
                                </div>
                        @else
                        <div class="col-md-6" style="text-align: center;background-color: #676C56; color: #F6F6F4;border-radius: 10px 0 0 10px ">
                            <h6>Activity Date</h6>
                            <h1 style="margin-top:0px">{{date('d', strtotime($b->startDate))}}</h1>
                            <h4 style="margin-bottom: 0px">{{date('F', strtotime($b->startDate))}}</h4>
                            <small>{{date('Y', strtotime($b->startDate))}}</small>
                        </div>
                        <div class="col-md-6" style="text-align: center;background-color: #E3DED1;">
                            <h6 class="col-black">Time</h6>
                            <h4 class="col-black" style="margin-top:0px">{{date('h:i', strtotime($b->startHours))}}</h4>
                            <h4 class="col-black"> - </h4>
                            <h4 class="col-black" style="margin-bottom: 0px">{{date('h:i', strtotime($b->endHours))}}</h4>
                            <br>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12"  style="margin-top:20%;">
                                    <small>Product Category :</small>
                                    <h5>{{$b->productCategory.' - '.$b->productType}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12"  style="margin-top:20%;">
                                    <small>Product Item :</small>
                                    <h5>{{$b->productName}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12" style="margin-top:20%;">
                                    <small>Number Of Booking :</small>
                                    <h5>{{$b->bookingCount}} bookings</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-top:40px">
                            <div class="row">
                                <div class="col-md-9">
                                    <small>Activity Status :</small>
                                    @if(date("Y-m-d")>= $b->startDate && date("Y-m-d")<= $b->endDate)
                                        <h5 class="col-orange">On Going</h5>
                                    @elseif(date("Y-m-d")>=$b->endDate)
                                        <h5 class="col-black">Complete</h5>
                                    @else
                                        <h5 class="col-green">Upcoming</h5>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <a href="{{url('/bookings/schedule/'.$b->bookingProductId)}}">
                                        <button type="button" class="btn btn-warning waves-effect" id="add_more_schedule">
                                            <i class="material-icons">keyboard_arrow_right</i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@endif



@section('footer')
 <!-- Jquery Core Js -->
 <script src="../../plugins/jquery/jquery.min.js"></script>

 <!-- Bootstrap Core Js -->
 <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

 <!-- Slimscroll Plugin Js -->
 <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

 <!-- Waves Effect Plugin Js -->
 <script src="../../plugins/node-waves/waves.js"></script>


 <!-- Custom Js -->
 <script src="../../js/admin.js"></script>

 <!-- Demo Js -->
 <script src="../../js/demo.js"></script>

 <script>
    $(document).ready(function () {
        $("#booking_category, #booking_status, #booking_from, #booking_until").change(function(){
            $.ajax({
                url: "{{url('bookings/filterbyactivityschedule')}}",
                type: "get", //send it through get method
                data: { 
                    from_date : $("#booking_from").val(),
                    until_date : $("#booking_until").val(),
                    booking_status : $("#booking_status").val(),
                    booking_category : $("#booking_category").val(),
                    booking_keyword : $("#booking_keyword").val(),
                },
                success: function(response) {
                    $("#data_booking").empty();
                    var dataresponse = $(response)
                    dataresponse.appendTo( $("#data_booking"));
                    console.log(response)
                },
                error: function(xhr) {
                    console.log(xhr);         
                }
            });
        });  
        $("#booking_keyword").keyup(function () {
            $.ajax({
                url: "{{url('bookings/filterbyactivityschedule')}}",
                type: "get", //send it through get method
                data: { 
                    from_date : $("#booking_from").val(),
                    until_date : $("#booking_until").val(),
                    booking_status : $("#booking_status").val(),
                    booking_category : $("#booking_category").val(),
                    booking_keyword : $("#booking_keyword").val(),
                },
                success: function(response) {
                    $("#data_booking").empty();
                    var dataresponse = $(response)
                    dataresponse.appendTo( $("#data_booking"));
                    console.log(response)
                },
                error: function(xhr) {
                    console.log(xhr);         
                }
            });
        });    
    });
 </script>
@endsection