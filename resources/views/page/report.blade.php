@extends('layouts.routing')

@section('header')
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Reports - Pigijo Supplier Dashboard</title>
    <!-- Favicon-->
    <link rel="icon" href="{{url('/images/logo.png')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Css -->
    <link href="../../plugins/morrisjs/morris.css" rel="stylesheet" />
    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
    .nav-tabs > li > a:hover{
        background-color: #d6d6c2 !important;
        border: medium none;
        border-radius: 50;
    }
    </style>
@endsection

@if(session('reportsfullaccess')==1)
@section('page')
<div class="card">
    <div class="body">
        <h2>Report</h2>
        <small>Summary of your business growth with Pigijo.</small>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2> <b>Generate Report </b> </h2>
                </div>
                <div class="body">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control show-tick" name="reports" id="reports">
                                <option value="">-- Select Your Report --</option>
                                <option value="1">Sales Report</option>
                                <option value="2">Products Sales</option>
                                <option value="3">Upcoming Schedule</option>
                                <option value="4">Sales Settlement</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="filterSalesReport" style="padding-top: 20px" hidden>
                        <div class="col-md-4" >
                            <select class="form-control show-tick" id="selectFilterSalesReport">
                                <option value="">All Booking</option>
                                <option value="Awaiting Payment">Awaiting Payment</option>
                                <option value="Payment Failed">Payment Failed</option>
                                <option value="Successful">Successful</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="fromDateFilter" id="fromDateFilterSalesReport" class="form-control floating-label" placeholder="From Date" value="{{$fromdate}}" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="untilDateFilter" id="untilDateFilterSalesReport" class="form-control floating-label" placeholder="Until Date" value="{{$untildate}}" required>
                        </div>
                    </div>
                    <div class="row" id="filterProductSales" style="padding-top: 20px" hidden>
                        <div class="col-md-4">
                            <select class="form-control show-tick" id="selectFilterProductSales">
                                <option value="">All Product</option>
                                <option value="Active">Active Only</option>
                                <option value="Expired">Expired</option>
                                <option value="Disable">Disable</option>
                            </select>
                        </div>
                    </div>
                    <div id="filterUpcomingSchedule" style="padding-top: 20px" hidden>
                        <div class="row" >
                            <div class="col-md-4">
                                <label for="">Start Commencing Date</label>
                            </div>
                        </div>
                        <div class="row" >
                        <div class="col-md-4">
                            <input type="text" id="fromDateFilterUpcomingSchedule" class="form-control floating-label" placeholder="From Date" value="{{$fromdate}}" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="untilDateFilterUpcomingSchedule" class="form-control floating-label" placeholder="Until Date" value="{{$untildate}}" required>
                        </div>
                        </div>
                       
                        
                    </div>
                    <div class="row clearfix"></div>
                    <br><br>
                    <div class="body table-responsive"  id="salesReport"  hidden>
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="salesReportTable">
                            <thead>
                                <tr>
                                    <th>Transaction Date</th>
                                    <th>Booking ID</th>
                                    <th>Transaction Booking ID</th>
                                    <th>Product ID</th>
                                    <th>Product Code</th>
                                    <th>Product Category</th>
                                    <th>Product Type</th>
                                    <th>Product Name</th>
                                    <th>Start Commencing Date</th>
                                    <th>End Commencing Date</th>
                                    <th>Price Per Person</th>
                                    <th>Total Person</th>
                                    <th>Selling Price</th>
                                    <th>Commission</th>
                                    <th>NET Price</th>
                                    <th>PIC Number</th>
                                    <th>PIC Phone Number</th>
                                    <th>PIC Email</th>
                                    <th>Booked by Name</th>
                                    <th>Booked by Email</th>
                                    <th>Update At</th>
                                    <th>Booking Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Transaction Date</th>
                                    <th>Booking ID</th>
                                    <th>Transaction Booing ID</th>
                                    <th>Product ID</th>
                                    <th>Product Code</th>
                                    <th>Product Category</th>
                                    <th>Product Type</th>
                                    <th>Product Name</th>
                                    <th>Start Commencing Date</th>
                                    <th>End Commencing Date</th>
                                    <th>Price Per Person</th>
                                    <th>Total Person</th>
                                    <th>Selling Price</th>
                                    <th>Commission</th>
                                    <th>NET Price</th>
                                    <th>PIC Number</th>
                                    <th>PIC Phone Number</th>
                                    <th>PIC Email</th>
                                    <th>Booked by Name</th>
                                    <th>Booked by Email</th>
                                    <th>Update At</th>
                                    <th>Booking Status</th>
                                </tr>
                            </tfoot>
                        </table>
                        <button class="btn bg-orange btn-lg waves-effect" id="sr_excel_reports">Generate as Excel</button>
                        <button class="btn bg-orange btn-lg waves-effect" id="sr_print_reports">Print Report</button>
                    </div>
                    <div class="body table-responsive"  id="productSales" hidden>
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="productSalesTable">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Code</th>
                                    <th>Product Category</th>
                                    <th>Product Type</th>
                                    <th>Product Name</th>
                                    <th>Start Selling Date</th>
                                    <th>End Selling Date</th>
                                    <th>Product Status</th>
                                    <th>Number of Booking</th>
                                    <th>Total Person</th>
                                    <th>Total Sales</th>
                                    <th>Commission</th>
                                    <th>Net Sales</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Code</th>
                                    <th>Product Category</th>
                                    <th>Product Type</th>
                                    <th>Product Name</th>
                                    <th>Start Selling Date</th>
                                    <th>End Selling Date</th>
                                    <th>Product Status</th>
                                    <th>Number of Booking</th>
                                    <th>Total Person</th>
                                    <th>Total Sales</th>
                                    <th>Commission</th>
                                    <th>Net Sales</th>
                                </tr>
                            </tfoot>
                        </table>
                        <button class="btn bg-orange btn-lg waves-effect" id="ps_excel_reports">Generate as Excel</button>
                        <button class="btn bg-orange btn-lg waves-effect" id="ps_print_reports">Print Report</button>
                    </div>
                    <div class="body table-responsive"  id="upcomingSchedule" hidden>
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="upcomingScheduleTable">
                            <thead>
                                <tr>
                                    <th>Transaction Booking ID</th>
                                    <th>Product ID</th>
                                    <th>Product Code</th>
                                    <th>Product Category</th>
                                    <th>Product Type</th>
                                    <th>Product Name</th>
                                    <th>Total Person</th>
                                    <th>PIC Name</th>
                                    <th>PIC Phone Number</th>
                                    <th>PIC Email Address</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Transaction Booking ID</th>
                                    <th>Product ID</th>
                                    <th>Product Code</th>
                                    <th>Product Category</th>
                                    <th>Product Type</th>
                                    <th>Product Name</th>
                                    <th>Total Person</th>
                                    <th>PIC Name</th>
                                    <th>PIC Phone Number</th>
                                    <th>PIC Email Address</th>
                                </tr>
                            </tfoot>
                        </table>
                        <button class="btn bg-orange btn-lg waves-effect" id="us_excel_reports">Generate as Excel</button>
                        <button class="btn bg-orange btn-lg waves-effect" id="us_print_reports">Print Report</button>
                    </div>
                    <div class="body table-responsive"  id="salesSettlement" hidden>
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="salesSettlementTable">
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Total Sales</th>
                                    <th>Total Net Sales</th>
                                    <th>Total Commission</th>
                                    <th>Settlement Date</th>
                                    <th>Settlement Status</th>
                                    <th>Settled At</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Month</th>
                                    <th>Total Sales</th>
                                    <th>Total Net Sales</th>
                                    <th>Total Commission</th>
                                    <th>Settlement Date</th>
                                    <th>Settlement Status</th>
                                    <th>Settled At</th>
                                    <th>Date</th>                                    
                                    
                                </tr>
                            </tfoot>
                        </table>
                        <button class="btn bg-orange btn-lg waves-effect" id="ss_excel_reports">Generate as Excel</button>
                        <button class="btn bg-orange btn-lg waves-effect" id="ss_print_reports">Print Report</button>
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

 <!-- Select Plugin Js -->
 <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

 <!-- Slimscroll Plugin Js -->
 <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

 <!-- Waves Effect Plugin Js -->
 <script src="../../plugins/node-waves/waves.js"></script>
    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

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

    <!-- Moment Plugin Js -->
    <script src="../../plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="../../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>

    <script src="../../js/pages/tables/jquery-datatable.js"></script>

<!-- Demo Js -->
    <script src="../../js/demo.js"></script>

<script>
    $(document).ready(function(){
        $("#untilDateFilterSalesReport").bootstrapMaterialDatePicker
        ({
            weekStart: 0, format: 'DD-MM-YYYY',  time: false
        });
        $("#fromDateFilterSalesReport").bootstrapMaterialDatePicker
        ({
            weekStart: 0, format: 'DD-MM-YYYY',  time: false
        }).on('change', function(e, date)
        {
            $("#untilDateFilterSalesReport").bootstrapMaterialDatePicker('setMinDate', date);
        });
        $("#untilDateFilterUpcomingSchedule").bootstrapMaterialDatePicker
        ({
            weekStart: 0, format: 'DD-MM-YYYY',  time: false
        });
        $("#fromDateFilterUpcomingSchedule").bootstrapMaterialDatePicker
        ({
            weekStart: 0, format: 'DD-MM-YYYY',  time: false
        }).on('change', function(e, date)
        {
            $("#untilDateFilterUpcomingSchedule").bootstrapMaterialDatePicker('setMinDate', date);
        });
        $("#reports").on('change', function(){
            var type = $(this).val();
            //sales report
            if(type==1){
                $("#filterSalesReport").show();
                $("#filterProductSales, #filterUpcomingSchedule").hide();    
                $("#salesReport").show();
                $("#productSales, #upcomingSchedule, #salesSettlement").hide();             
                $("#salesReportTable").dataTable( {
                    destroy: true,
                    ajax: "{{url('api/reports/salesreport')}}",
                    columns: [
                        { "data": 'transactionDate' },
                        { "data": 'bookingID' },
                        { "data": 'transactionBookingID' },
                        { "data": 'productID' },
                        { "data": 'productCode' },
                        { "data": 'productCategory' },
                        { "data": 'productType' },
                        { "data": 'productName' },
                        { "data": 'startCommencingDateTime'},
                        { "data": 'endCommencingDateTime'},
                        { "data": 'pricePerPerson'},
                        { "data": 'totalPerson'},
                        { "data": 'sellingPrice'},
                        { "data": 'commission'},
                        { "data": 'netPrice'},
                        { "data": 'PIC_Name'},
                        { "data": 'PIC_PhoneNumber'},
                        { "data": 'PIC_emailAddress'},
                        { "data": 'bookedBy_name'},
                        { "data": 'bookedBy_emailAddress'},
                        { "data": 'updatedAt'},
                        { "data": 'bookingStatus'}
                    ],
                    dom: 'Blfrtip',
                    buttons: [
                        {
                            extend: 'print',
                            text: 'Print',
                            autoPrint: false,
                            customize: function (win) {
                                $(win.document.body).find('table').addClass('display').css('font-size', '9px');
                                $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                                    $(this).css('background-color','#D0D0D0');
                                });
                                $(win.document.body).find('h1').css('text-align','center');
                                var last = null;
                                var current = null;
                                var bod = [];
                
                                var css = '@page { size: landscape; }',
                                    head = win.document.head || win.document.getElementsByTagName('head')[0],
                                    style = win.document.createElement('style');
                
                                style.type = 'text/css';
                                style.media = 'print';
                
                                if (style.styleSheet)
                                {
                                style.styleSheet.cssText = css;
                                }
                                else
                                {
                                style.appendChild(win.document.createTextNode(css));
                                }
                
                                head.appendChild(style);
                            }
                        },
                        'copy', 'csv', 'excel', 'pdf'
                    ],
                });
                $(".dt-button").hide();     
                var tableContainer = $(".large-table-container-3");
                var table = $(".large-table-container-3 table");
                var fakeContainer = $(".large-table-fake-top-scroll-container-3");
                var fakeDiv = $(".large-table-fake-top-scroll-container-3 div");

                var tableWidth = table.width();
                fakeDiv.width(tableWidth);
                
                fakeContainer.scroll(function() {
                    tableContainer.scrollLeft(fakeContainer.scrollLeft());
                });
                tableContainer.scroll(function() {
                    fakeContainer.scrollLeft(tableContainer.scrollLeft());
                });        
            }
            //productsales
            else if(type==2){
                $("#filterProductSales").show();
                $("#filterSalesReport, #filterUpcomingSchedule").hide();  
                $("#productSales").show();
                $("#salesReport, #upcomingSchedule, #salesSettlement").hide();  
                $("#productSalesTable").dataTable( {
                    destroy: true,
                    ajax: "{{url('api/reports/productsales')}}",
                    columns: [
                        { "data": 'productId' },
                        { "data": 'productCode' },
                        { "data": 'productCategory' },
                        { "data": 'productType' },
                        { "data": 'productName' },
                        { "data": 'startSellingDate' },
                        { "data": 'endSellingDate' },
                        { "data": 'status' },
                        { "data": 'numberOfBooking' },
                        { "data": 'totalPerson' },
                        { "data": 'totalSales' },
                        { "data": 'commission' },
                        { "data": 'netSales' },
                    ],
                    dom: 'Blfrtip',
                    buttons: [
                        {
                            extend: 'print',
                            text: 'Print',
                            autoPrint: false,
                            customize: function (win) {
                                $(win.document.body).find('table').addClass('display').css('font-size', '9px');
                                $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                                    $(this).css('background-color','#D0D0D0');
                                });
                                $(win.document.body).find('h1').css('text-align','center');
                                var last = null;
                                var current = null;
                                var bod = [];
                
                                var css = '@page { size: landscape; }',
                                    head = win.document.head || win.document.getElementsByTagName('head')[0],
                                    style = win.document.createElement('style');
                
                                style.type = 'text/css';
                                style.media = 'print';
                
                                if (style.styleSheet)
                                {
                                style.styleSheet.cssText = css;
                                }
                                else
                                {
                                style.appendChild(win.document.createTextNode(css));
                                }
                
                                head.appendChild(style);
                            }
                        },
                        'copy', 'csv', 'excel', 'pdf'
                    ],
                    
                    columnDefs: [ {
                        targets: -1,
                        visible: false
                    } ]
                });
                $(".dt-button").hide();                 
            }
            //upcomingschedule
            else if(type==3){
                $("#filterUpcomingSchedule").show();
                $("#filterSalesReport, #filterProductSales").hide();  
                
                $("#upcomingSchedule").show();
                $("#salesReport, #productSales, #salesSettlement").hide();  
                $("#upcomingScheduleTable").dataTable( {
                    destroy: true,
                    ajax: "{{url('api/reports/upcomingschedule')}}",
                    columns: [
                        { "data": 'transactionBookingId' },
                        { "data": 'productId' },
                        { "data": 'productCode' },
                        { "data": 'productCategory' },
                        { "data": 'productType' },
                        { "data": 'productName' },
                        { "data": 'totalPerson' },
                        { "data": 'picName' },
                        { "data": 'picPhoneNumber' },
                        { "data": 'picEmailAddress' }
                    ],
                    dom: 'Blfrtip',
                   buttons: [
                       {
                           extend: 'print',
                           text: 'Print',
                           autoPrint: false,
                           customize: function (win) {
                               $(win.document.body).find('table').addClass('display').css('font-size', '9px');
                               $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                                   $(this).css('background-color','#D0D0D0');
                               });
                               $(win.document.body).find('h1').css('text-align','center');
                               var last = null;
                               var current = null;
                               var bod = [];
               
                               var css = '@page { size: landscape; }',
                                   head = win.document.head || win.document.getElementsByTagName('head')[0],
                                   style = win.document.createElement('style');
               
                               style.type = 'text/css';
                               style.media = 'print';
               
                               if (style.styleSheet)
                               {
                               style.styleSheet.cssText = css;
                               }
                               else
                               {
                               style.appendChild(win.document.createTextNode(css));
                               }
               
                               head.appendChild(style);
                           }
                       },
                       'copy', 'csv', 'excel', 'pdf'
                   ],
                   
                   columnDefs: [ {
                       targets: -1,
                       visible: false
                   } ]
               });
                $(".dt-button").hide();                
           }
            //salessettlement
            else if(type==4){
                $("#salesSettlement").show();
                $("#filterSalesReport, #filterProductSales, #filterUpcomingSchedule").hide();  
                $("#salesReport, #productSales, #upcomingSchedule").hide();  
                $("#salesSettlementTable").dataTable( {
                    destroy: true,
                    ajax: "{{url('api/reports/salessettlement')}}",
                    columns: [
                        { "data": 'month' },
                        { "data": 'totalSales' },
                        { "data": 'totalNetSales' },
                        { "data": 'totalCommission' },
                        { "data": 'settlementDate' },
                        { "data": 'settlementStatus' },
                        { "data": 'settledAt' },
                        { "data": 'settlementDate' }
                    ],
                    dom: 'Blfrtip',
                   buttons: [
                       {
                           extend: 'print',
                           text: 'Print',
                           autoPrint: false,
                           customize: function (win) {
                               $(win.document.body).find('table').addClass('display').css('font-size', '9px');
                               $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                                   $(this).css('background-color','#D0D0D0');
                               });
                               $(win.document.body).find('h1').css('text-align','center');
                               var last = null;
                               var current = null;
                               var bod = [];
               
                               var css = '@page { size: landscape; }',
                                   head = win.document.head || win.document.getElementsByTagName('head')[0],
                                   style = win.document.createElement('style');
               
                               style.type = 'text/css';
                               style.media = 'print';
               
                               if (style.styleSheet)
                               {
                               style.styleSheet.cssText = css;
                               }
                               else
                               {
                               style.appendChild(win.document.createTextNode(css));
                               }
               
                               head.appendChild(style);
                           }
                       },
                       'copy', 'csv', 'excel', 'pdf'
                   ],
                   
                   columnDefs: [ {
                       targets: -1,
                       visible: false
                   } ]
               });
                $(".dt-button").hide();                
           }
        });
    });
    $("#sr_print_reports").click(function(){
        $(this).closest(".body").find("a.dt-button.buttons-print").click()    ;
    });
    $("#sr_excel_reports").click(function(){
        $(this).closest(".body").find("a.dt-button.buttons-excel").click()    ;
    });
    $("#ps_print_reports").click(function(){
        $(this).closest(".body").find("a.dt-button.buttons-print").click()    ;
    });
    $("#ps_excel_reports").click(function(){
        $(this).closest(".body").find("a.dt-button.buttons-excel").click()    ;
    });
    $("#us_print_reports").click(function(){
        $(this).closest(".body").find("a.dt-button.buttons-print").click()    ;
    });
    $("#us_excel_reports").click(function(){
        $(this).closest(".body").find("a.dt-button.buttons-excel").click()    ;
    });
    $("#ss_print_reports").click(function(){
        $(this).closest(".body").find("a.dt-button.buttons-print").click()    ;
    });
    $("#ss_excel_reports").click(function(){
        $(this).closest(".body").find("a.dt-button.buttons-excel").click()    ;
    });
</script>
<script>
    var datafilter = "";
    $(document).ready(function(){
        $("#selectFilterSalesReport, #fromDateFilterSalesReport, #untilDateFilterSalesReport").change(function () {    
            $.ajax({
                url: "{{url('api/reports/filtersalesreport')}}",
                type: "get", //send it through get method
                data: { 
                    filter_type : $("#selectFilterSalesReport").val(),
                    from_date : $("#fromDateFilterSalesReport").val(),
                    until_date : $("#untilDateFilterSalesReport").val()
                },
                success: function(response) {
                    datafilter = response;
                    console.log(datafilter);
                    salesreportfunction();
                },
                error: function(xhr) {
                                            
                }
            });
            
        });
        $("#selectFilterProductSales").change(function () {   
            $.ajax({
                url: "{{url('api/reports/filterproductsales')}}",
                type: "get", //send it through get method
                data: { 
                    filter_type : $("#selectFilterProductSales").val()
                },
                success: function(response) {
                    datafilter = response;
                    productsalesfunction();
                    
                },
                error: function(xhr) {
                                            
                }
            });
           
        });

        $("#fromDateFilterUpcomingSchedule, #untilDateFilterUpcomingSchedule").change(function () { 
            $.ajax({
                url: "{{url('api/reports/filterupcomingschedule')}}",
                type: "get", //send it through get method
                data: { 
                    from_date : $("#fromDateFilterUpcomingSchedule").val(),
                    until_date : $("#untilDateFilterUpcomingSchedule").val()
                },
                success: function(response) {
                    var datafilter = response;
                    upcomingschedulefunction();
                },
                error: function(xhr) {
                                            
                }
            });
            
        });
    });
</script>
<script>
    function salesreportfunction(){
        $('#salesReportTable').DataTable( {
            destroy: true,
            data: datafilter.data,
            columns: [
                { "data": 'transactionDate' },
                { "data": 'bookingID' },
                { "data": 'transactionBookingID' },
                { "data": 'productID' },
                { "data": 'productCode' },
                { "data": 'productCategory' },
                { "data": 'productType' },
                { "data": 'productName' },
                { "data": 'startCommencingDateTime'},
                { "data": 'endCommencingDateTime'},
                { "data": 'pricePerPerson'},
                { "data": 'totalPerson'},
                { "data": 'sellingPrice'},
                { "data": 'commission'},
                { "data": 'netPrice'},
                { "data": 'PIC_Name'},
                { "data": 'PIC_PhoneNumber'},
                { "data": 'PIC_emailAddress'},
                { "data": 'bookedBy_name'},
                { "data": 'bookedBy_emailAddress'},
                { "data": 'updatedAt'},
                { "data": 'bookingStatus'}
            ],               
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'print',
                    text: 'Print',
                    autoPrint: false,
                    customize: function (win) {
                        $(win.document.body).find('table').addClass('display').css('font-size', '9px');
                        $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                            $(this).css('background-color','#D0D0D0');
                        });
                        $(win.document.body).find('h1').css('text-align','center');
                        var last = null;
                        var current = null;
                        var bod = [];
        
                        var css = '@page { size: landscape; }',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');
        
                        style.type = 'text/css';
                        style.media = 'print';
        
                        if (style.styleSheet)
                        {
                        style.styleSheet.cssText = css;
                        }
                        else
                        {
                        style.appendChild(win.document.createTextNode(css));
                        }
        
                        head.appendChild(style);
                    }
                },
                'copy', 'csv', 'excel', 'pdf'
            ]
        });
                $(".dt-button").hide(); 
    }
    
    function productsalesfunction(){
        $('#productSalesTable').DataTable( {
                destroy: true,
                data: datafilter.data,
                columns: [
                    { "data": 'productId' },
                    { "data": 'productCode' },
                    { "data": 'productCategory' },
                    { "data": 'productType' },
                    { "data": 'productName' },
                    { "data": 'startSellingDate' },
                    { "data": 'endSellingDate' },
                    { "data": 'status' },
                    { "data": 'numberOfBooking' },
                    { "data": 'totalPerson' },
                    { "data": 'totalSales' },
                    { "data": 'commission' },
                    { "data": 'netSales' },
                ],                
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'Print',
                        autoPrint: false,
                        customize: function (win) {
                            $(win.document.body).find('table').addClass('display').css('font-size', '9px');
                            $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                                $(this).css('background-color','#D0D0D0');
                            });
                            $(win.document.body).find('h1').css('text-align','center');
                            var last = null;
                            var current = null;
                            var bod = [];
            
                            var css = '@page { size: landscape; }',
                                head = win.document.head || win.document.getElementsByTagName('head')[0],
                                style = win.document.createElement('style');
            
                            style.type = 'text/css';
                            style.media = 'print';
            
                            if (style.styleSheet)
                            {
                            style.styleSheet.cssText = css;
                            }
                            else
                            {
                            style.appendChild(win.document.createTextNode(css));
                            }
            
                            head.appendChild(style);
                        }
                    },
                    'copy', 'csv', 'excel', 'pdf'
                ]
            });
                $(".dt-button").hide(); 
    }

    function upcomingschedulefunction(){
        $('#upcomingScheduleTable').DataTable( {
                destroy: true,
                data: datafilter.data,
                columns: [
                    { "data": 'transactionBookingId' },
                    { "data": 'productId' },
                    { "data": 'productCode' },
                    { "data": 'productCategory' },
                    { "data": 'productType' },
                    { "data": 'productName' },
                    { "data": 'totalPerson' },
                    { "data": 'picName' },
                    { "data": 'picPhoneNumber' },
                    { "data": 'picEmailAddress' }
                ],            
            dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'Print',
                        autoPrint: false,
                        customize: function (win) {
                            $(win.document.body).find('table').addClass('display').css('font-size', '9px');
                            $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                                $(this).css('background-color','#D0D0D0');
                            });
                            $(win.document.body).find('h1').css('text-align','center');
                            var last = null;
                            var current = null;
                            var bod = [];
            
                            var css = '@page { size: landscape; }',
                                head = win.document.head || win.document.getElementsByTagName('head')[0],
                                style = win.document.createElement('style');
            
                            style.type = 'text/css';
                            style.media = 'print';
            
                            if (style.styleSheet)
                            {
                            style.styleSheet.cssText = css;
                            }
                            else
                            {
                            style.appendChild(win.document.createTextNode(css));
                            }
            
                            head.appendChild(style);
                        }
                    },
                    'copy', 'csv', 'excel', 'pdf'
                ]
            });
                $(".dt-button").hide(); 
    }
</script>
@endsection