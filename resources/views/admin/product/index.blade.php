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
                        <h2>Product Lists</h2>
                    </div>
                    <div class="body row">
                        <div class="col-md-3">
                            <h5>Product Status :</h5>
                            <select name="" id="productStatus" class="form-control">
                                <option value="">-Select Type-</option>
                                <option>Draft</option>
                                <option>New</option>
                                <option>Active</option>
                                <option>Disabled</option>
                                <option>Expired</option>
                            </select>
                        </div>
                        <div class="col-md-9">
                            <h5>Search a product by Partner's Company Name / Product Name:</h5>
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
                            <th>PRODUCT CODE</th>
                            <th>TYPE</th>
                            <th>COMPANY NAME</th>
                            <th>PRODUCT NAME</th>
                            <th>PRODUCT STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead> 
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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
            var table = $('.dataTable').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: {
                    url: "{{url('admin/product/listProduct')}}",
                    type: 'GET'
                },
                columns: [
                    { data: 'productCode' },
                    { data: 'productType' },
                    { data: 'companyName' },
                    { data: 'productName' },
                    { data: 'status' },
                    { data: 'action' }
                ]
            });
            $("#productStatus").change(function (){
                var activityvalue = $(this).val();
                var table = $('.dataTable').DataTable({
                    destroy: true,
                    processing: true,
                    serverSide: true,
                    searching: false,
                    ajax: {
                        url: "{{url('admin/product/findProduct')}}",
                        data: { 
                            status : $("#productStatus").val(),
                            keyword : $("#keyword").val(),
                        },
                        type: 'GET'
                    },
                    columns: [
                        { data: 'productCode' },
                        { data: 'productType' },
                        { data: 'companyName' },
                        { data: 'productName' },
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
                        url: "{{url('admin/product/findProduct')}}",
                        data: { 
                            status : $("#productStatus").val(),
                            keyword : $("#keyword").val(),
                        },
                        type: 'GET'
                    },
                    columns: [
                        { data: 'productCode' },
                        { data: 'productType' },
                        { data: 'companyName' },
                        { data: 'productName' },
                        { data: 'status' },
                        { data: 'action' }
                    ]
                });
            })
        });
    </script>
@endsection
