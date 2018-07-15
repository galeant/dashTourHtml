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

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
@endsection

@section('page')
    <div class="container-fluid">
        <div class="card">
            <div class="header">
                <h2>List Register Suplier</h2>
            </div>
            <div class="body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tab-col-orange" role="tablist">
                    <li class="active" role="presentation">
                        <a href="#new" data-toggle="tab">New</a>
                    </li>
                    <li role="presentation">
                        <a href="#active" data-toggle="tab">Active</a>
                    </li>
                    <li role="presentation">
                        <a href="#decline" data-toggle="tab">Decline</a>
                    </li>
                    <li role="presentation">
                        <a href="#Suspend" data-toggle="tab">Suspend</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="new">
                        <div class="table-responsive">
                            <table id="baru" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Company Email</th>
                                        <th>Company Phone</th>
                                        <th>Register Name</th>
                                        <th>Register Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="active">
                        <div class="table-responsive">
                            <table id="aktif" class="table table-bordered table-striped table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Company Email</th>
                                        <th>Company Phone</th>
                                        <th>Register Name</th>
                                        <th>Register Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="decline">
                        <div class="table-responsive">
                            <table id="declined" class="table table-bordered table-striped table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Company Email</th>
                                        <th>Company Phone</th>
                                        <th>Register Name</th>
                                        <th>Register Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Suspend">
                        <div class="table-responsive">
                            <table id="suspend" class="table table-bordered table-striped table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Company Email</th>
                                        <th>Company Phone</th>
                                        <th>Register Name</th>
                                        <th>Register Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
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
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
    <script type="text/javascript">
        
        // function getData(tipe){
            $(document).ready(function(){ 
                $('#baru').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ url("admin/data/baru") }}',
                    columns: [
                        {data: 'companyName'},
                        {data: 'companyEmail'},
                        {data: 'companyPhone'},
                        {data: 'fullName'},
                        {data: 'email'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
                $('#aktif').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ url("admin/data/aktif") }}',
                    columns: [
                        {data: 'companyName'},
                        {data: 'companyEmail'},
                        {data: 'companyPhone'},
                        {data: 'fullName'},
                        {data: 'email'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
                $('#declined').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ url("admin/data/decline") }}',
                    columns: [
                        {data: 'companyName'},
                        {data: 'companyEmail'},
                        {data: 'companyPhone'},
                        {data: 'fullName'},
                        {data: 'email'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
                $('#suspend').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ url("admin/data/suspend") }}',
                    columns: [
                        {data: 'companyName'},
                        {data: 'companyEmail'},
                        {data: 'companyPhone'},
                        {data: 'fullName'},
                        {data: 'email'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            });
        // }  
        $("ul.list a").click(function(){
            $(this).closest("ul").find(".active").removeAttr("class");
            $(this).closest("li").addClass("active")
            var a = $(this).attr("href");
            console.log(a);
        });
        $("title").text("Super Admin Pigijo");
    </script>
@endsection
