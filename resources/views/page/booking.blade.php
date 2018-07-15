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

    <!-- Morris Css -->
    <link href="../../plugins/morrisjs/morris.css" rel="stylesheet" />

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
                <div class="col-md-9">
                    <div class="row" style="padding-left: 20px">
                        <h5>View Option</h5>
                        <div class="col-md-5">
                            <select class="form-control">
                                <option>Booking Transaction List</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control">
                                <option>Sort by Newest Transaction</option>
                                <option>Sort by Oldest Transaction</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control">
                                <option>All Booking</option>
                                <option>Cancel</option>
                                <option>Pending</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="row" style="padding-left: 20px">
                        <h5>Filter Date</h5>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="dateStart" placeholder="DD/MM/YY">
                        </div>
                        <div class="col-md-1" style="margin:0;padding:0;width: 20px">
                            <h5>To</h5>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="dateEnd" placeholder="DD/MM/YY">
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="bookingName" placeholder="Search Booking">
                        </div>
                        <div class="col-md-2">
                            <h5>100 Bookings</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card" style="background-color: transparent;box-shadow: none">
        <div class="body">
            <div class="row" style="margin: 0 10px 10px 10px;background-color: white;border-radius: 10px">
                <div class="col-md-2" style="text-align: center;background-color: #676C56;color: #F6F6F4;border-radius: 10px 0 0 10px ">
                    <h5>Transaction Date</h5>
                    <h1 style="margin-top:0px">18</h1>
                    <h4 style="margin-bottom: 0px">March</h4>
                    <small>2018</small>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <small>Booking Number</small>
                                    <h5>XXX-123-456-789</h5>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <small>Booking Number</small>
                                    <h5>XXX-123-456-789</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <small>Booking Number</small>
                                    <h5>XXX-123-456-789</h5>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <small>Booking Number</small>
                                    <h5>XXX-123-456-789</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <small>Booking Number</small>
                                    <h5>XXX-123-456-789</h5>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <small>Booking Number</small>
                                    <h5>XXX-123-456-789</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-top:40px">
                            <div class="row">
                                <div class="col-md-9">
                                    <small>Booking Status</small>
                                    <h5>New Booking</h5>        
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-warning waves-effect" id="add_more_schedule">
                                        <i class="material-icons">add</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="body">
            <div class="row" style="margin: 0 10px 10px 10px;background-color: white;border-radius: 10px">
                <div class="col-md-2" style="text-align: center;background-color: #676C56;color: #F6F6F4;border-radius: 10px 0 0 10px ">
                    <h5>Transaction Date</h5>
                    <h1 style="margin-top:0px">18</h1>
                    <h4 style="margin-bottom: 0px">March</h4>
                    <small>2018</small>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <small>Booking Number</small>
                                    <h5>XXX-123-456-789</h5>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <small>Booking Number</small>
                                    <h5>XXX-123-456-789</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <small>Booking Number</small>
                                    <h5>XXX-123-456-789</h5>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <small>Booking Number</small>
                                    <h5>XXX-123-456-789</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <small>Booking Number</small>
                                    <h5>XXX-123-456-789</h5>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <small>Booking Number</small>
                                    <h5>XXX-123-456-789</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-top:40px">
                            <div class="row">
                                <div class="col-md-9">
                                    <small>Booking Status</small>
                                    <h5>New Booking</h5>        
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-warning waves-effect" id="add_more_schedule">
                                        <i class="material-icons">add</i>
                                    </button>
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

 <!-- Morris Plugin Js -->
 <script src="../../plugins/raphael/raphael.min.js"></script>
 <script src="../../plugins/morrisjs/morris.js"></script>

 <!-- Custom Js -->
 <script src="../../js/admin.js"></script>
 <script src="../../js/pages/charts/morris.js"></script>

 <!-- Demo Js -->
 <script src="../../js/demo.js"></script>
@endsection