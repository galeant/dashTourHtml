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
<div class="card">
    <div class="body">
        <div class="col-md-10 font-20">
            <div class="col-md-2">
                <span>All Schedule
            </div>
            <div class="col-md-1">
                <span> >
            </div>
            
            <div class="col-md-9">
                <span>{{$schedule->productName}} ({{date('d F Y', strtotime($schedule->startDate))}} - {{date('d F Y', strtotime($schedule->endDate))}})
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h4>Activity Schedule</h4>
    <div class="body">
        <div class="row" style="margin: 0 10px 10px 10px;background-color: white;border-radius: 10px ">
            <div class="col-md-3" style="text-align: center;center;background-color: #676C56;color: #F6F6F4;border-radius: 10px 0 0 10px ">
                <div class="row">
                    @if($schedule->startDate != $schedule->endDate)
                    <div class="col-md-5" style="text-align: center;background-color: #676C56;color: #F6F6F4;border-radius: 10px 0 0 10px ">
                        <h6>Activity Start Date</h6>
                        <h1 style="margin-top:0px">{{date('d', strtotime($schedule->startDate))}}</h1>
                        <h4 style="margin-bottom: 0px">{{date('F', strtotime($schedule->startDate))}}</h4>
                        <small>{{date('Y', strtotime($schedule->startDate))}}</small>
                    </div>
                    <div class="col-md-2" style="margin-top:20%; margin-left: -5%">
                        <hr width="500%" style="margin-left: -200%">        
                    </div>
                    <div class="col-md-5" style="text-align: center;border-radius: 0 10px 10px 0; margin-left: -5%">
                        <h6>Activity End Date</h6>
                        <h1 style="margin-top:0px">{{date('d', strtotime($schedule->endDate))}}</h1>
                        <h4 style="margin-bottom: 0px">{{date('F', strtotime($schedule->endDate))}}</h4>
                        <small>{{date('Y', strtotime($schedule->endDate))}}</small>
                    </div>
                    @elseif($schedule->startHours == '00:00:00' && $schedule->endHours == '23:59:59')
                    <div class="col-md-5" style="text-align: center;background-color: #676C56;color: #F6F6F4;border-radius: 10px 0 0 10px ">
                            <h6>Activity Date</h6>
                            <h1 style="margin-top:0px">{{date('d', strtotime($schedule->startDate))}}</h1>
                            <h4 style="margin-bottom: 0px">{{date('F', strtotime($schedule->startDate))}}</h4>
                            <small>{{date('Y', strtotime($schedule->startDate))}}</small>
                        </div>
                        <div class="col-md-6" style="text-align: center;background-color: #E3DED1;">
                                <h6 class="col-black">Time</h6>
                                <br>
                                <br>
                                <h4 class="col-black" style="margin-bottom: 0px">{{date('h:i', strtotime($schedule->endHours))}}</h4>
                                <br>
                                <br>
                            </div>
                    @else
                    <div class="col-md-6" style="text-align: center;background-color: #676C56; color: #F6F6F4;border-radius: 10px 0 0 10px ">
                        <h6>Activity Date</h6>
                        <h1 style="margin-top:0px">{{date('d', strtotime($schedule->startDate))}}</h1>
                        <h4 style="margin-bottom: 0px">{{date('F', strtotime($schedule->startDate))}}</h4>
                        <small>{{date('Y', strtotime($schedule->startDate))}}</small>
                    </div>
                    <div class="col-md-6" style="text-align: center;background-color: #E3DED1;">
                        <h6 class="col-black">Time</h6>
                        <h4 class="col-black" style="margin-top:0px">{{date('h:i', strtotime($schedule->startHours))}}</h4>
                        <h4 class="col-black"> - </h4>
                        <h4 class="col-black" style="margin-bottom: 0px">{{date('h:i', strtotime($schedule->endHours))}}</h4>
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
                                <h5>{{$schedule->productCategory.' - '.$schedule->productType}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12"  style="margin-top:20%;">
                                <small>Product Item :</small>
                                <h5>{{$schedule->productName}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12" style="margin-top:20%;">
                                <small>Number Of Booking :</small>
                                <h5>{{count($booking)}} bookings</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-10" style="margin-top:20%;">
                                <small>Activity Status :</small>
                                @if(date("Y-m-d")>= $schedule->startDate && date("Y-m-d")<= $schedule->endDate)
                                    <h5 class="col-orange">On Going</h5>
                                @elseif(date("Y-m-d")>=$schedule->endDate)
                                    <h5 class="col-black">Complete</h5>
                                @else
                                    <h5 class="col-green">Upcoming</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class=row>
        <div class="col-md-4 pull-left">
            Total Booking in This Schedule : <span><b>{{count($booking)}} bookings</b></span>
        </div>
        <div class="col-md-4 pull-center">
            Total Person : <span><b>{{$totalperson}} bookings</b></span>
        </div>
        <div class="col-md-4 pull-right">
            Remaining Booking : <span><b>{{($maxbooking - $totalperson)}} bookings</b></span>
        </div>
    </div>
    <br>
    <h4>All Booking for This Activity</h4>
    <div class="card" style="background-color: transparent;box-shadow: none" id="data_booking">
        @foreach($booking as $b)
        <div class="body">
            <div class="row" style="margin: 0 10px 10px 10px;background-color: white;border-radius: 10px">
                <div class="col-md-2" style="text-align: center;background-color: #676C56;color: #F6F6F4;border-radius: 10px 0 0 10px ">
                    <h5>Transaction Date</h5>
                    <h1 style="margin-top:0px">{{date('d', strtotime($b->transactionDate))}}</h1>
                    <h4 style="margin-bottom: 0px">{{date('F', strtotime($b->transactionDate))}}</h4>
                    <small>{{date('Y', strtotime($b->transactionDate))}}</small>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <small>Booking Number :</small>
                                    <h5>{{$b->bookingNumber}}</h5>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <small>Booked By :</small>
                                    <h5>{{$b->bookedBy_name}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <small>Product Category :</small>
                                    <h5>{{$b->productCategory.' - '.$b->productType}}</h5>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <small>Product Item :</small>
                                    <h5>{{$b->productName}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <small>Total Person</small>
                                    <h5>{{$b->totalPerson}} person</h5>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <small>Total Price</small>
                                    <?php setlocale(LC_MONETARY, 'en_US'); ?>
                                    <h5>{{"Rp. " . number_format(($b->totalPerson*$b->pricePerPerson),2,',','.')}}
                                        
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-top:40px">
                            <div class="row">
                                <div class="col-md-9">
                                    <small>Booking Status</small>
                                    @if($b->bookingStatus == "Awaiting Payment")
                                    <h5 class="font-bold col-green">{{$b->bookingStatus}}</h5>        
                                    @elseif($b->bookingStatus == "Payment Failed" || $b->bookingStatus == "Cancelled")
                                    <h5 class="font-bold col-red">{{$b->bookingStatus}}</h5> 
                                    @else
                                    <h5 class="font-bold col-black">{{$b->bookingStatus}}</h5>   
                                    @endif
                                </div>
                                
                                <div class="col-md-3">
                                        <a href="{{url('/bookings/detailbyschedule/'.$b->bookingProductId)}}">
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
        $("#booking_sort, #booking_status, #booking_from, #booking_until").change(function(){
            console.log($("#booking_from").val());
            $.ajax({
                url: "http://dashboardb2b.test/bookings/filterbytransactiondate",
                type: "get", //send it through get method
                data: { 
                    from_date : $("#booking_from").val(),
                    until_date : $("#booking_until").val(),
                    booking_status : $("#booking_status").val(),
                    booking_sort : $("#booking_sort").val(),
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
            console.log($("#booking_keyword").val());
            $.ajax({
                url: "http://dashboardb2b.test/bookings/filterbytransactiondate",
                type: "get", //send it through get method
                data: { 
                    from_date : $("#booking_from").val(),
                    until_date : $("#booking_until").val(),
                    booking_status : $("#booking_status").val(),
                    booking_sort : $("#booking_sort").val(),
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