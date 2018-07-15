@extends('admin.layouts.routing')

@section('header')
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Jquery DataTable | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/telformat/css/intlTelInput.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />
@endsection

@section('page')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Partner List</h2>
                    </div>
                    <div class="body row">
                        <div class="col-md-3">
                            <h5>Partner Type :</h5>
                            <select name="" id="partnerType" class="form-control">
                                <option value="">-Select Type-</option>
                                <option>Activity</option>
                                <option>Accomodation</option>
                                <option>Car Rental</option>
                            </select>
                        </div>
                        <div class="col-md-9">
                            <h5>Search a Partner by Partner ID/Company Name/ PIC Email Address/ PIC Name:</h5>
                            <input type="text" class="form-control" placeholder="Start typing here..." id="keyword">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card" id="listPlaceType">
            {{-- <div class="header">
                <h2>All Place Type</h2>
            </div> --}}
            <div class="body table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="dataTable">
                    <thead>
                        <tr>
                            <th>PARTNER TYPE</th>
                            <th>PARTNER ID</th>
                            <th>COMPANY NAME</th>
                            <th>PIC EMAIL ADDRESS</th>
                            <th>PIC NAME</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($partner as $p)
                        <tr>
                            <td>{{$p->partnerType}}</td>
                            <td>{{$p->partnerId}}</td>
                            <td>{{$p->companyName}}</td>
                            <td>{{$p->picEmailAddress}}</td>
                            <td>{{$p->picName}}</td>
                            <td>{{$p->status}}</td>
                            <td>
                                <a href="/admin/partner/index/{{$p->partnerId}}"><i class="glyphicon glyphicon-edit"></i>View Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
@endsection

@section('footer')
    <!-- Jquery Core Js -->
    
    <!-- Jquery Core Js -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('plugins/node-waves/waves.js') }}"></script>
    <script src="{{ asset('plugins/telformat/js/intlTelInput.js') }}"></script>
    <script src="{{ asset('plugins/mask-js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){ 
            $("#partnerType").change(function (){
                var activityvalue = $(this).val();
                var table = $('.dataTable').DataTable({
                    destroy: true,
                    processing: true,
                    serverSide: true,
                    searching: false,
                    ajax: {
                        url: "{{url('admin/partner/findPartner')}}",
                        data: { 
                            type : $("#partnerType").val(),
                            keyword : $("#keyword").val(),
                        },
                        type: 'GET'
                    },
                    columns: [
                        { data: 'partnerType' },
                        { data: 'partnerId' },
                        { data: 'companyName' },
                        { data: 'picEmailAddress' },
                        { data: 'picName' },
                        { data: 'status' },
                        { data: 'action' }
                    ]
                });
            })
            $("#keyword").keyup(function (){
                var activityvalue = $(this).val();
                var table = $('.dataTable').DataTable({
                    destroy: true,
                    processing: true,
                    serverSide: true,
                    searching: false,
                    ajax: {
                        url: "{{url('admin/partner/findActivity')}}",
                        data: { 
                            type : $("#activityType").val(),
                            keyword : $("#keyword").val(),
                        },
                        type: 'GET'
                    },
                    columns: [
                        { data: 'partnerType' },
                        { data: 'partnerId' },
                        { data: 'companyName' },
                        { data: 'picEmailAddress' },
                        { data: 'picName' },
                        { data: 'status' },
                        { data: 'action' }
                    ]
                });
            })
        });
    </script>
@endsection
