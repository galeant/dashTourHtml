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
        .fontred{
            color: red;
        }
        .rounded {
            border-radius: 10px;
        }
    </style>
    
@endsection
@if(session('productsfullaccess')==1 || session('productsview')==1)
    @section('page')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>All Product</h2>
                    </div>
                    <div class="body" style="padding-left:20px">
                        <div class="row">
                            <div class="col-md-9">
                                <input class="form-control" placeholder="Search Product By Name" type="text" id="product_name" name="product_name">
                            </div>
                            @if(session('productsadd')==1)
                            <div class="col-md-3">
                                <a href="{{ URL('/products/addProduct') }}">
                                    <button type="button" class="btn btn-primary waves-effect">
                                        <i class="material-icons">extension</i>
                                        <span>ADD NEW PRODUCT</span>
                                    </button>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="row" style="margin-top:10px">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <select class="form-control" name="product_category" id="product_category">
                                            <option value="">Select Product Category</option>
                                            <option value="Tour">Tour</option>
                                            <option value="Activity">Activity</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="product_type" id="product_type">
                                            <option value="">Select Product Type</option>
                                            <option value="Open Trip">Open Trip</option>
                                            <option value="Private Trip">Private Trip</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control show-tick" name="product_destination" id="product_destination" data-live-search="true">
                                            <option value="">Select Destination</option>
                                            @foreach($destination as $d)
                                            <option value="{{$d->destination}}">{{$d->destination}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="product_status" id="product_status">
                                            <option value="">Product Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">No-Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <select class="form-control" name="product_sort" id="product_sort">
                                            <option value="desc">Sort By Newest</option>
                                            <option value="asc">Sort By Oldest</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix" id="data_product">
                    @foreach($product as $p)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="card rounded">
                                <a href="{{url('/products/detail/'.$p->productId)}}" data-sub-html="Demo Description">
                                    <img class="img-responsive img-rounded" src="../../images/Page.png">
                                </a>
                            <div class="body">
                                <h4>{{$p->productName}}</h4>
                                <span>{{$p->productCategory}} - {{$p->productType}}</span>
                                <br><br>
                                
                                <div class="card-footer bg-transparent border-success">
                                    <div class="alignleft">Booked:</div>
                                    <div class="alignright">Product Status:</div>
                                    <br>
                                    <h4 class="alignleft">20 Times</h4>
                                    @if($p->status == 'active')
                                    <h4 class="alignright fontgreen">
                                        Active
                                    </h4>
                                    @else
                                    <h4 class="alignright fontred">
                                        Disable
                                    </h4>
                                    @endif
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>  
            </div>
        </div>
    </div>
    @endsection
@endif
@section('page')
@php
error_reporting(0)
@endphp

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
        $(document).ready(function () {
            $("#product_name").keyup(function () {
                $.ajax({
                    url: "http://dashboardb2b.test/dataproduct",
                    type: "get", //send it through get method
                    data: { 
                        product_name : $("#product_name").val(),
                        product_category : $("#product_category").val(),
                        product_type : $("#product_type").val(),
                        product_destination : $("#product_destination").val(),
                        product_status : $("#product_status").val(),
                        product_sort : $("#product_sort").val()
                    },
                    success: function(response) {
                        $("#data_product").empty();
                        var dataresponse = $(response)
                        dataresponse.appendTo( $("#data_product"));
                        console.log(response)
                    },
                    error: function(xhr) {
                                               
                    }
                });
            });
            $("#product_category").change(function () {
                $.ajax({
                    url: "http://dashboardb2b.test/dataproduct",
                    type: "get", //send it through get method
                    data: { 
                        product_name : $("#product_name").val(),
                        product_category : $("#product_category").val(),
                        product_type : $("#product_type").val(),
                        product_destination : $("#product_destination").val(),
                        product_status : $("#product_status").val(),
                        product_sort : $("#product_sort").val()
                    },
                    success: function(response) {
                        $("#data_product").empty();
                        var dataresponse = $(response)
                        dataresponse.appendTo( $("#data_product"));
                        console.log(response)
                    },
                    error: function(xhr) {
                                               
                    }
                });
            });
            $("#product_type").change(function () {
                $.ajax({
                    url: "http://dashboardb2b.test/dataproduct",
                    type: "get", //send it through get method
                    data: { 
                        product_name : $("#product_name").val(),
                        product_category : $("#product_category").val(),
                        product_type : $("#product_type").val(),
                        product_destination : $("#product_destination").val(),
                        product_status : $("#product_status").val(),
                        product_sort : $("#product_sort").val()
                    },
                    success: function(response) {
                        $("#data_product").empty();
                        var dataresponse = $(response)
                        dataresponse.appendTo( $("#data_product"));
                        console.log(response)
                    },
                    error: function(xhr) {
                                               
                    }
                });
            });
            $("#product_destination").change(function () {
                $.ajax({
                    url: "http://dashboardb2b.test/dataproduct",
                    type: "get", //send it through get method
                    data: { 
                        product_name : $("#product_name").val(),
                        product_category : $("#product_category").val(),
                        product_type : $("#product_type").val(),
                        product_destination : $("#product_destination").val(),
                        product_status : $("#product_status").val(),
                        product_sort : $("#product_sort").val()
                    },
                    success: function(response) {
                        $("#data_product").empty();
                        var dataresponse = $(response)
                        dataresponse.appendTo( $("#data_product"));
                        console.log(response)
                    },
                    error: function(xhr) {
                                               
                    }
                });
            });
            $("#product_status").change(function () {
                $.ajax({
                    url: "http://dashboardb2b.test/dataproduct",
                    type: "get", //send it through get method
                    data: { 
                        product_name : $("#product_name").val(),
                        product_category : $("#product_category").val(),
                        product_type : $("#product_type").val(),
                        product_destination : $("#product_destination").val(),
                        product_status : $("#product_status").val(),
                        product_sort : $("#product_sort").val()
                    },
                    success: function(response) {
                        $("#data_product").empty();
                        var dataresponse = $(response)
                        dataresponse.appendTo( $("#data_product"));
                        console.log(response)
                    },
                    error: function(xhr) {
                                               
                    }
                });
            });
            $("#product_sort").change(function () {
                $.ajax({
                    url: "http://dashboardb2b.test/dataproduct",
                    type: "get", //send it through get method
                    data: { 
                        product_name : $("#product_name").val(),
                        product_category : $("#product_category").val(),
                        product_type : $("#product_type").val(),
                        product_destination : $("#product_destination").val(),
                        product_status : $("#product_status").val(),
                        product_sort : $("#product_sort").val()
                    },
                    success: function(response) {
                        $("#data_product").empty();
                        var dataresponse = $(response)
                        dataresponse.appendTo( $("#data_product"));
                        console.log(response)
                    },
                    error: function(xhr) {
                                               
                    }
                });
            });
            
        });
    </script>
@endsection