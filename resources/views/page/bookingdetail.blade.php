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
            <span>All Schedule > {{$booking_title}}</span>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="header">
            <h4>Booking Detail</h4>
        </div>
        <div class="body">
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-6">Booking Number</div>
                    <div class="col-md-6">: {{$booking->bookingNumber}}</div>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <div class="col-md-6">Booked By</div>
                    <div class="col-md-6">: {{$booking->bookedBy_name}}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-6">Transaction Date</div>
                    <div class="col-md-6">: {{date('d-F-Y', strtotime($booking->transactionDate))}}</div>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <div class="col-md-6">Booked Status</div>
                    <div class="col-md-6">: {{$booking->bookingStatus}}</div>
                </div>
            </div>
            <br>
            <div class="panel panel-default" style="margin-left: 30px;margin-right: 30px;">
                <div class="panel-heading">
                    <h6>Booked Item</h6>
                </div>
                <div class="panel-body">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <span>Product Category</span>
                        </div>
                        <div class="col-md-6">
                            : <span><b>{{$booking->productCategory}} - {{$booking->productType}}</b></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <span>Product Name</span>
                        </div>
                        <div class="col-md-6">
                            : <span><b>{{$booking->productName}}</b></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <span>Schedule</span>
                        </div>
                        @if($booking->startDate != $booking->endDate)
                        <div class="col-md-6">
                            : <span><b>{{date('d F Y', strtotime($booking->startDate))}} - {{date('d F Y', strtotime($booking->endDate))}}</b></span>
                        </div>
                        @elseif($booking->startDate == $booking->endDate && $booking->startHours=='00:00:00' && $booking->endHours=='23:59:59')
                        <div class="col-md-6">
                            : <span><b>{{$booking->productCategory}} - {{$booking->productType}}</b></span>
                        </div>
                        @else
                        <div class="col-md-6">
                            : <span><b>{{$booking->productCategory}} - {{$booking->productType}}</b></span>
                        </div>
                        @endif
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <span>Total Person</span>
                        </div>
                        <div class="col-md-6">
                            : <span><b>{{$booking->totalPerson}} person</b></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <span>Item Price</span>
                        </div>
                        <div class="col-md-6">
                            : <span>Rp. {{$booking->pricePerPerson}}</span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <span>Total Price</span>
                        </div>
                        <div class="col-md-6">
                            : <span>{{$booking->totalPerson*$booking->pricePerPerson}}</span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <span>Pigijo Commission</span>
                        </div>
                        <div class="col-md-6">
                            : <span>Rp {{$booking->commission}}</span>
                        </div>
                    </div>
                </div>
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <span>Your Net Sales</span>
                        </div>
                        <div class="col-md-6">
                            : <span>Rp {{($booking->totalPerson*$booking->pricePerPerson)-$booking->commission}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="header">
            <h4>Customer Contact Detail</h4>
        </div>
        <div class="body">
            <div class="row" style="margin-top: 20px">
                <div class="col-md-2">
                    Full Name
                </div>
                <div class="col-md-2">
                    : <span>{{$booking->picName}}</span>
                </div>
            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col-md-2">
                    Phone Number
                </div>
                <div class="col-md-2">
                    : <span>{{$booking->picPhoneNumber}}</span>
                </div>
            </div>
            <div class="row" style="margin-top: 20px; margin-bottom: 20px">
                <div class="col-md-2">
                    Email Address
                </div>
                <div class="col-md-2">
                    : <span>{{$booking->picEmailAddress}}</span>
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