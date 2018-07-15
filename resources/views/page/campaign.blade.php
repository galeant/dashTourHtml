@extends('layouts.routing')

@section('header')
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Campaign - Pigijo Supplier Dashboard</title>
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

@if(session('campaignfullaccess')==1 ||session('campaignview')==1 || session('campaignedit')==1 || session('campaignadd')==1)
    @section('page')
    <div class="container-fluid" style="padding: 0 5 0 5 ">
        <div class="card">
            <div class="header">
            <h2>Campaign</h2>
            <small>List All Campaign.</small>
            </div>
            <!-- <div class="body">
                <h4>What's New This Month?</h4>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-2 bg-orange">
                            <div class="icon">
                                <i class="material-icons">card_travel</i>
                            </div>
                            <div class="content">
                                <div class="text">Booking</div>
                                <div class="number count-to" data-from="0" data-to="50" data-speed="1000" data-fresh-interval="20">50</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-2 bg-orange">
                            <div class="icon">
                                <i class="material-icons">work</i>
                            </div>
                            <div class="content">
                                <div class="text">Cancel</div>
                                <div class="number count-to" data-from="0" data-to="2" data-speed="1000" data-fresh-interval="20">2</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-2 bg-orange">
                            <div class="icon">
                                <i class="material-icons">attach_money</i>
                            </div>
                            <div class="content">
                                <div class="text">Total Earning</div>
                                <div class="number count-to" data-from="0" data-to="8500000" data-speed="1000" data-fresh-interval="20">8500000</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-2 bg-orange">
                            <div class="icon">
                                <i class="material-icons">save</i>
                            </div>
                            <div class="content">
                                <div class="text">Net Earning</div>
                                <div class="number count-to" data-from="0" data-to="8000000" data-speed="1000" data-fresh-interval="20">8000000</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9" style="padding-right: 0px">
                        <h4>Upcoming Trip</h4>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="body table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="row">
                                                    <div class="col-md-1" style="padding-left: 0px">
                                                        <i class="material-icons" style="font-size:30px">card_travel</i>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <small>Trip Date</small><h5>5 Mar - 9 Mar 2019</h5>
                                                    </div>
                                                </td>
                                                <td><small>Number Of Person</small><h5>4 Person</h5></td>
                                                <td><small style="color:#E58525">Tour - Private Trip</small><h5>3D2N Paket Liburan Ke Maluku Tanpa Repot</h5></td>
                                            </tr>
                                            <tr>
                                                <td class="row">
                                                    <div class="col-md-1" style="padding-left: 0px">
                                                        <i class="material-icons" style="font-size:30px">card_travel</i>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <small>Trip Date</small><h5>5 Mar - 9 Mar 2019</h5>
                                                    </div>
                                                </td>
                                                <td><small>Number Of Person</small><h5>4 Person</h5></td>
                                                <td><small style="color:#E58525">Tour - Private Trip</small><h5>3D2N Paket Liburan Ke Maluku Tanpa Repot</h5></td>
                                            </tr>
                                            <tr>
                                                <td class="row">
                                                    <div class="col-md-1" style="padding-left: 0px">
                                                        <i class="material-icons" style="font-size:30px">card_travel</i>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <small>Trip Date</small><h5>5 Mar - 9 Mar 2019</h5>
                                                    </div>
                                                </td>
                                                <td><small>Number Of Person</small><h5>4 Person</h5></td>
                                                <td><small style="color:#E58525">Tour - Private Trip</small><h5>3D2N Paket Liburan Ke Maluku Tanpa Repot</h5></td>
                                            </tr>
                                            <tr>
                                                <td class="row">
                                                    <div class="col-md-1" style="padding-left: 0px">
                                                        <i class="material-icons" style="font-size:30px">card_travel</i>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <small>Trip Date</small><h5>5 Mar - 9 Mar 2019</h5>
                                                    </div>
                                                </td>
                                                <td><small>Number Of Person</small><h5>4 Person</h5></td>
                                                <td><small style="color:#E58525">Tour - Private Trip</small><h5>3D2N Paket Liburan Ke Maluku Tanpa Repot</h5></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <h4>Your Overall Sales Growth</h4>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="body">
                                    <div id="graph"></div>
                                </div>
                            </div>
                        </div>
                        <h4>Your Business Coverage</h4>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="body">
                                    <div id="gmap_markers" class="gmap"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="padding-left: 0px">
                        <h4>Best Seller of The Month</h4>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="body table-responsive">
                                    <table class="table">
                                        <tbody class="table-hover">
                                            <tr><td><h5>3D2N Paket Liburan Ke Maluku Tanpa Ribet</h5><small style="color:#E58525"><i class="material-icons" style="font-size: 15px">favorite</i>100 Times Booked</small></td></tr>
                                            <tr><td><h5>3D2N Paket Liburan Ke Maluku Tanpa Ribet</h5><small style="color:#E58525"><i class="material-icons" style="font-size: 15px"></i>favorite</i>100 Times Booked</small></td></tr>
                                            <tr><td><h5>3D2N Paket Liburan Ke Maluku Tanpa Ribet</h5><small style="color:#E58525"><i class="material-icons" style="font-size: 15px">favorite</i>100 Times Booked</small></td></tr>
                                            <tr><td><h5>3D2N Paket Liburan Ke Maluku Tanpa Ribet</h5><small style="color:#E58525"><i class="material-icons" style="font-size: 15px">favorite</i>100 Times Booked</small></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <h4>Join Pigijo Campaign</h4>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="body">
                                    <h4>Promo Cashbck 10%</h4>
                                    <p>Cashback 10% for all products with no exception. Cashback will be applied as discount on check out.</p>
                                    <br>
                                    <small>Active period</small>
                                    <h5>1 March 2018 - 31 March 2018</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="body">
                                    <h4>Promo Cashbck 10%</h4>
                                    <p>Cashback 10% for all products with no exception. Cashback will be applied as discount on check out.</p>
                                    <br>
                                    <small>Active period</small>
                                    <h5>1 March 2018 - 31 March 2018</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="body">
                                    <h4>Promo Cashbck 10%</h4>
                                    <p>Cashback 10% for all products with no exception. Cashback will be applied as discount on check out.</p>
                                    <br>
                                    <small>Active period</small>
                                    <h5>1 March 2018 - 31 March 2018</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
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
 <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

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

<script>
        Morris.Bar({
        element: 'graph',
        data: [
          {x: 'Day-1', y: 2},
          {x: 'Day-2', y: 7},
          {x: 'Day-3', y: 12},
          {x: 'Day-4', y: 25},
          {x: 'Day-5', y: 35},
          {x: 'Day-6', y: 2},
          {x: 'Day-7', y: 54},
          {x: 'Day-8', y: 21},
          {x: 'Day-9', y: 23},
          {x: 'Day-10', y: 8},
          {x: 'Day-11', y: 29},
          {x: 'Day-12', y: 19},

        ],
        xkey: 'x',
        ykeys: ['y'],
        labels: [],
        barColors: ['#FFB84D', '#f8aa33', '#4da74d', '#afd8f8', '#edc240', '#cb4b4b', '#9440ed'],
        barOpacity: 0.5,
        resize: true,
        gridTextColor: 'black',
        grid: false
      });
</script>
<script>
    function initMap() {
        var brezee = {lat: -6.3023203, lng: 106.6532712};
        var aeon = {lat: -6.3047146, lng: 106.6439975};
        var map = new google.maps.Map(document.getElementById('gmap_markers'), {
        zoom: 15,
        center: brezee
        });
        var marker = new google.maps.Marker({
        position: brezee,
        map: map
        });
        var marker = new google.maps.Marker({
        position: aeon,
        map: map
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByW5l4THf9guHoVzGlQk8Jv4gOgaXCybg&callback=initMap"></script>
@endsection