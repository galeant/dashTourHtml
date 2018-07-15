@extends('layouts.routing')
@section('header')
<meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Setting - Pigijo Dashboard Supplier</title>

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
        .vcenter {
            display: inline-block;
            vertical-align: middle;
            float: none;
        }
        .table-borderless > tbody > tr > td,
.table-borderless > tbody > tr > th,
.table-borderless > tfoot > tr > td,
.table-borderless > tfoot > tr > th,
.table-borderless > thead > tr > td,
.table-borderless > thead > tr > th {
    border: none;
}
    </style>
    
@endsection

@section('page')
<div class="card">
    <div class="body">
        <div class="col-md-8 font-20">
            <div class="col-md-3">
                <span>Account Setting
            </div>
            <div class="col-md-3" id="menuupdateprofile" hidden >
                <span>Update Profile
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" id="updateprofile" hidden>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Update Profile </h2>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Email Address</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">First Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Access Right</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row"><br></div>
                    <div class="row">
                        <div class="col-md-3">
                            <img src="../../images/image-gallery/12.jpg" alt="" id="displayimage" class="img-responsive">
                        </div>
                        <div class="col-md-3" id="uploadimage" style="padding-top:40px">
                            <input type="file" style="display:none" >
                            <button class="btn btn-lg waves-effect pull-left" id="changeimage">Change Image</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <button class="btn bg-orange btn-lg waves-effect pull-left">Update Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" id="profile">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Personal Information</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-xs-4">
                            <img src="../../images/image-gallery/12.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-md-4" style="padding:0 5 5 5">
                            <br>
                            <h4>NAMA USER</h4>
                            <table class="table table-borderless">
                                <tr>
                                    <td class="col-md-6">
                                        <i class="material-icons">email</i>
                                        <span>Email</span>
                                    </td>
                                    <td class="col-md-6">:<span>Email User</span></td>
                                </tr>
                                <tr>
                                    <td class="col-md-6">
                                        <i class="material-icons">phone_android</i>
                                        <span>Phone Number</span>
                                    </td>
                                    <td class="col-md-6">:<span>Phone Number User</span></td>
                                </tr>
                                <tr>
                                    <td class="col-md-6">
                                        <i class="material-icons">phone_android</i>
                                        <span>Access Right</span>
                                    </td>
                                    <td class="col-md-6">:<span>User Access</span></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4 align-center" style="padding:0 5 5 5" >
                        <br><br><br>
                            <button class="btn bg-orange btn-lg waves-effect vcenter pull-right" id="btnmenuupdateprofile">Update Information</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" id="company">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Company Information</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="col-md-4">
                                        <i class="material-icons">domain</i>
                                        <span>Company Information</span>
                                    </td>
                                    <td class="col-md-4">:<span>Company Information</span></td>
                                </tr>
                                <tr>
                                    <td class="col-md-4">
                                        <i class="material-icons">email</i>
                                        <span>Company Email</span>
                                    </td>
                                    <td class="col-md-4">:<span>Company Email</span></td>
                                </tr>
                                <tr>
                                    <td class="col-md-4">
                                        <i class="material-icons">phone_android</i>
                                        <span>Phone Number</span>
                                    </td>
                                    <td class="col-md-4">:<span>Website Link</span></td>
                                </tr>
                                
                                <tr>
                                    <td class="col-md-4">
                                        <i class="material-icons">link</i>
                                        <span>Website Link</span>
                                    </td>
                                    <td class="col-md-4">:<span>Website Link</span></td>
                                </tr>
                                
                                <tr>
                                    <td class="col-md-4">
                                        <i class="material-icons">place</i>
                                        <span>Address</span>
                                    </td>
                                    <td class="col-md-4">:<span>Address Company</span></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6 align-center " style="padding:0 5 5 5" >
                        <br><br><br>
                            <button class="btn bg-orange btn-lg waves-effect vcenter pull-right">Update Information</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  

<div class="container-fluid" id="notification">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Notification Settings</h2>
                </div>
                <div class="body">
                    <div class="switch">
                        <label><input type="checkbox"><span class="lever switch-col-orange"></span>
                        Send me email notification when I got a new booking  and when a booking is cancelled 
                        </label>
                    </div>
                    <div class="switch">
                        <label><input type="checkbox"><span class="lever switch-col-orange"></span>
                        Send me SMS notification when I got a new booking  and when a booking is cancelled 
                        </label>
                    </div>
                    <div class="switch">
                        <label><input type="checkbox"><span class="lever switch-col-orange"></span>
                        Send me email notification for new Pigijo campaign 
                        </label>
                    </div>
                    <div class="switch">
                        <label><input type="checkbox"><span class="lever switch-col-orange"></span>
                        Subscribe to Pigijo Newsletter
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" id="resetpassword">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Reset Password</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-8">
                            <p>An email will be sent to your registered email</p>
                            <p>Please follow the instruction given to update your password</p>
                        </div>
                        <div class="col-md-4">
                            <button class="btn bg-orange btn-lg waves-effect vcenter pull-right">Reset Password</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
        $("#btnmenuupdateprofile").click(function(){
            $("#profile").hide();
            $("#company").hide();
            $("#notification").hide();
            $("#resetpassword").hide();
            $("#updateprofile").show();            
            $("#menuupdateprofile").show();            
        });
        $("#changeimage").click(function(){
            $(this).closest("#uploadimage").find("input:file").click();
        });
        $("input:file").change(function(e) {
            for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
                var file = e.originalEvent.srcElement.files[i];
                var img = document.createElement("img");
                var reader = new FileReader();
                reader.onloadend = function() {
                    $("#displayimage").attr("src",reader.result);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection