@extends('layouts.routing')

@section('header')
<meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Users - Pigijo Supplier Dashboard</title>

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
    
    <!-- Sweetalert Css -->
    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- <link href="../../plugins/select2/select2.min.css" rel="stylesheet" /> -->
    <!-- <link href="../../plugins/multi-select/css/multi-select.css" rel="stylesheet"> -->
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
    <!-- <link href="../../plugins/bootstrap-file-input/themes/explorer-fa/theme.css" media="all" rel="stylesheet" type="text/css"/> -->
    
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
        .material-icons.md-120 { font-size: 120px; }
        .material-icons.orange600 { color: #FB8C00; }
        .modal {
}
.vertical-alignment-helper {
    display:table;
    height: 100%;
    width: 100%;
}
.vertical-align-center {
    /* To center vertically */
    display: table-cell;
    vertical-align: middle;
}
.modal-content {
    /* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
    width:inherit;
    height:inherit;
    /* To center horizontally */
    margin: 0 auto;
}
.disabledbutton {
    pointer-events: none;
    opacity: 0.4;
}
    </style>
    
@endsection

@section('page')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="body" style="padding-left:20px">
                    <div class="row">
                        <div class="col-md-10">
                            <span><b>Manage Users</b><span>
                        </div>
                        <div class="col-md-2 pull-right">
                            <span><b>{{5-$countuser}} account remaining</b></span>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px">
                        <div class="col-md-10">
                            <span>You can  create to five new user account for your team to co manage this portal.<br>
                            Create new accoutn wisely.</span>
                        </div>
                        @if($countuser<5)
                        <div class="col-md-2 pull-right">
                            <button type="button" class="btn bg-deep-orange btn-lg waves-effect" data-toggle="modal" data-target="#addnewuser">
                                <span>Add New User</span>
                            </button>
                            <div class="modal fade" id="addnewuser" tabindex="-1" role="dialog">
                                <div class="vertical-alignment-helper">
                                    <div class="modal-dialog vertical-align-center">
                                        <div class="modal-content">
                                            <div class="modal-header align-center">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h2 class="modal-title">INVITE NEW USER</h2>
                                            </div>
                                            <form id="wizard" action="{{ url('/users/adduser') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                                <div class="modal-body align-center">
                                                    Invite your team member to co-manage yout business. <br>
                                                    An invitation email to set up a new account will be sent to your team.
                                                    <div class="row clearfix">
                                                        <div class="col-md-8 col-md-offset-2">
                                                            <input type="email" placeholder="Enter email address here" class="form-control center text-center align-center" name="email">
                                                            <br>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row clearfix">
                                                        <div class="col-md-4 col-md-offset-4">
                                                            <button type="submit" class="btn bg-orange btn-block btn-lg waves-effect">Send Invitation</button> 
                                                            <br>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <span class="font-10">Make sure your team member doesn't miss it.</span>
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @foreach($datauser as $du)
                <!-- Bussiness Owner -->
                @if($du->roleId==1)
                    <div class="card">
                        <div class="header" style="padding-top:20px;padding-bottom:20px">
                            <div class="row">
                                <div class="col-md-1 align-center">
                                    <img src="../../images/circle_grey.png" class="img-responsive center-block">
                                </div>
                                <div class="col-md-2 align-center" style="padding-top:20px">
                                    <span >{{$du->fullName}}</span>
                                </div>
                                <div class="col-md-3 align-center" style="padding-top:20px">
                                    <i class="material-icons">email</i>{{$du->email}}
                                </div>
                                <div class="col-md-3 align-center" style="padding-top:20px">
                                    <i class="material-icons">phone</i>
                                    <span>{{$du->phone}}</span>
                                </div>
                                <div class="col-md-3 align-center" style="padding-top:20px">
                                    <i class="material-icons">person_outline</i>
                                    <span>Business Owner</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <!-- Custom Access -->
                @elseif($du->roleId==2)
                    <div class="card">
                        <div class="row">
                            <div class="header" style="padding-top:20px">
                                <div class="col-md-1 align-center center">
                                    <img src="../../images/circle_grey.png" class="img-responsive center-block">
                                </div>
                                <div class="col-md-2 align-center" style="padding-top:20px">
                                    <span >{{$du->fullName}}</span>
                                </div>
                                <div class="col-md-3 align-center" style="padding-top:20px">
                                    <i class="material-icons">email</i>{{$du->email}}
                                </div>
                                <div class="col-md-3 align-center" style="padding-top:20px">
                                    <i class="material-icons">phone</i>
                                    <span>{{$du->phone}}</span>
                                </div>
                                <div class="col-md-3 align-center" style="padding-top:20px">
                                    <a href="javascript:custom_access({{$du->userId}})">
                                        <tr>
                                            <td><i class="material-icons">person_outline</i></td>
                                            <td><span>Custom Access</span></td>
                                            <td><i id="arrow{{$du->userId}}" class="material-icons">keyboard_arrow_down</i></td>
                                        </tr>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @if(session('usersfullaccess')==1 || session('usersupdate')==1 )
                                <div class="body" style="padding-bottom:20px" id="custom_access{{$du->userId}}" hidden>
                                    <div class="col-md-offset-6">
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-block btn-lg btn-default waves-effect alignright" data-toggle="modal" data-target="#manage_access{{$du->userId}}">
                                                <i class="material-icons orange600">settings</i>
                                                <span class="col-orange">Manage Access</span>
                                            </button>
                                            <div class="modal fade" id="manage_access{{$du->userId}}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/users/updateaccess') }}" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                            <input name="user_id" type="hidden" value="{{$du->userId}}">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                <h4 class="modal-title" id="defaultModalLabel{{$du->userId}}">Manage Access {{$du->fullName}}</h4>
                                                            </div>
                                                            <div class="modal-body body table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <td>Menu</td>
                                                                        <td class="col-md-9" colspan="4">Activity</td>
                                                                    </thead>
                                                                    <tbody >
                                                                        @foreach($datanavbar as $dn)
                                                                        <tr id="rowcheckfullaccess">
                                                                            <td>{{$dn->navbarName}}</td>
                                                                            @foreach($dataactivity as $da)
                                                                            
                                                                                @if($da->navbarId==$dn->navbarId)
                                                                                <td >
                                                                                    @foreach($accessuser as $au)
                                                                                        @if($au->userId == $du->userId)
                                                                                            @if($da->navbarActivityId == $au->navbarActivityId)
                                                                                                @if($au->roleActivityStatus == 0)
                                                                                                    @if($da->navbarActivityId==1 || $da->navbarActivityId==2 || $da->navbarActivityId==6 ||$da->navbarActivityId==7 ||$da->navbarActivityId==11 ||$da->navbarActivityId==12)
                                                                                                        @if($da->navbarActivityId==1)
                                                                                                        <input type="checkbox" name="user_access[]" id="md_checkbox_{{$au->roleActivityId}}" value="{{$au->roleActivityId}}" class="filled-in chk-col-orange checkfullaccess"/>
                                                                                                        <label for="md_checkbox_{{$au->roleActivityId}}">{{$da->navbarActivityName}}</label>
                                                                                                        @else
                                                                                                        <input type="checkbox" name="user_access[]" id="md_checkbox_{{$au->roleActivityId}}" value="{{$au->roleActivityId}}" class="filled-in chk-col-orange checkfullaccess"/>
                                                                                                        <label for="md_checkbox_{{$au->roleActivityId}}">{{$da->navbarActivityName}}</label>
                                                                                                        @endif
                                                                                                    @else
                                                                                                    <input type="checkbox" name="user_access[]" id="md_checkbox_{{$au->roleActivityId}}" value="{{$au->roleActivityId}}" class="filled-in chk-col-orange uncheckfullaccess"/>
                                                                                                    <label for="md_checkbox_{{$au->roleActivityId}}">{{$da->navbarActivityName}}</label>                                                                                                    
                                                                                                    @endif
                                                                                                @elseif($au->roleActivityStatus == 1)
                                                                                                    @if($da->navbarActivityId==1 || $da->navbarActivityId==2 || $da->navbarActivityId==6 ||$da->navbarActivityId==7 ||$da->navbarActivityId==11 ||$da->navbarActivityId==12)
                                                                                                        @if($da->navbarActivityId==1)
                                                                                                        <div class="disabledbutton">
                                                                                                            <input type="checkbox" name="user_access[]" id="md_checkbox_{{$au->roleActivityId}}" value="{{$au->roleActivityId}}" class="filled-in chk-col-orange checkfullaccess disabledbutton" checked="true" />
                                                                                                            <label for="md_checkbox_{{$au->roleActivityId}}">{{$da->navbarActivityName}}</label>
                                                                                                        </div>
                                                                                                        @else    
                                                                                                        <input type="checkbox" name="user_access[]" id="md_checkbox_{{$au->roleActivityId}}" value="{{$au->roleActivityId}}" class="filled-in chk-col-orange checkfullaccess" checked="true"/>
                                                                                                        <label for="md_checkbox_{{$au->roleActivityId}}">{{$da->navbarActivityName}}</label>
                                                                                                        @endif
                                                                                                    @else
                                                                                                    <input type="checkbox" name="user_access[]" id="md_checkbox_{{$au->roleActivityId}}" value="{{$au->roleActivityId}}" class="filled-in chk-col-orange uncheckfullaccess" checked="true"/>
                                                                                                    <label for="md_checkbox_{{$au->roleActivityId}}">{{$da->navbarActivityName}}</label>                                                                                                    
                                                                                                    @endif
                                                                                                @endif
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                </td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                    
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-link bg-grey waves-effect" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-link bg-orange waves-effect">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-md-4 js-sweetalert" >
                                            <button type="button" class="btn btn-block btn-lg btn-default waves-effect alignright" data-toggle="modal" data-target="#reset_password{{$du->userId}}">
                                                <i class="material-icons orange600">lock</i>
                                                <span class="col-orange">Reset Password</span>
                                            </button>
                                            <div class="modal fade" id="reset_password{{$du->userId}}" tabindex="-1" role="dialog">
                                                <div class="vertical-alignment-helper">
                                                    <div class="modal-dialog vertical-align-center">
                                                        <div class="modal-content">
                                                            <div class="modal-header align-center">
                                                                <img src="../../images/check_circle_grey.png" class="img-responsive center-block">
                                                                <h4 class="modal-title">RESET PASSWORD REQUESTED</h4>
                                                            </div>
                                                            <div class="modal-body align-center">
                                                                <span>An Email has send to {{$du->fullName}}</span><br>
                                                                <span>Ask {{$du->fullName}} to follow the reset password instruction</span>
                                                            </div>
                                                            <div class="modal-footer align-center modal-col-blue-grey">
                                                                <button type="button" class="btn btn-default waves-effect btn-lg" data-dismiss="modal">DONE</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-block btn-lg btn-default waves-effect alignright" data-toggle="modal" data-target="#remove_user{{$du->userId}}">
                                                <i class="material-icons orange600">lock</i>
                                                <span class="col-orange">Remove User</span>
                                            </button>
                                            <div class="modal fade" id="remove_user{{$du->userId}}" tabindex="-1" role="dialog">
                                                <div class="vertical-alignment-helper">
                                                    <div class="modal-dialog vertical-align-center">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                <h4 class="modal-title">REMOVE USE</h4>

                                                            </div>
                                                            <div class="modal-body">Are you sure to remove {{$du->fullName}}'s account? </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-grey waves-effect" data-dismiss="modal">Close</button>
                                                                <a type="submit" href="{{url('/users/deleteuser/'.$du->userId)}}" class="btn bg-orange waves-effect">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                        </div>
                    </div>
                @endif
            @endforeach
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

    <!-- Bootstrap Notify Plugin Js -->
    <script src="../../plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="../../plugins/sweetalert/sweetalert.min.js"></script>
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

    <script src="../../js/pages/ui/dialogs.js"></script>
    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
    <script>
        $("#disabled").children().off('click');
        function custom_access(id){
            if ($("#custom_access"+id).is(':visible')) {
                $("#custom_access"+id).hide(500);
                $("#arrow"+id).html('<i class="material-icons">keyboard_arrow_down</i>');
            }
            else{
                $("#custom_access"+id).show(500);
                $("#arrow"+id).html('<i class="material-icons">keyboard_arrow_up</i>');
            }
        }
        function reset_password(id){
            swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this imaginary file!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dd6b55',
            cancelButtonColor: '#999',
            confirmButtonText: 'Yes!',
            cancelButtonText: 'No',
            closeOnConfirm: false
        }, function () {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
        }
        $(document).ready(function(){
            $(".checkfullaccess").on('change', function(){
                
                if($(this).is(":checked")){
                    $(this).closest("#rowcheckfullaccess").find("input[type=checkbox]").prop("checked", true);
                }
                else{
                    $(this).closest("#rowcheckfullaccess").find("input[type=checkbox]").prop("checked", false);
                }
                
            })
            $(".uncheckfullaccess").on('change', function(){
                if($(this).is(":checked")){
                }
                else{
                    $(this).closest("#rowcheckfullaccess").find("input[type=checkbox].checkfullaccess").prop("checked", false);
                }
                
            })
        });
    </script>
@endsection