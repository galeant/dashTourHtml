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
                        <h2>All Place / Destination</h2>
                    </div>
                    <div class="body" style="padding-left:20px">
                        <div class="row">
                            <div class="col-md-3">Place Type *</div>
                            <div class="col-md-3">Province *</div>
                            <div class="col-md-6">City *</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control" name="placeType" id="placeType">
                                    <option value="">-Select Type-</option>
                                    @foreach($place_type as $pt)
                                    <option value="{{$pt->placeTypeId}}">{{$pt->placeTypeNameEN}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="province" id="province">
                                    <option value="">-Select Province-</option>
                                    @foreach($province as $p)
                                    <option value="{{$p->id}}">{{$p->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="city" id="city"  class="form-control" required>
                                    <option value="">--Select City--</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ URL('/admin/master/place/create') }}">
                                    <button type="button" class="btn btn-primary waves-effect">
                                        <i class="material-icons">extension</i>
                                        <span>Add New Place</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                Search a place*
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="keyword" id="keyword" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix" id="data_product">
                    
                </div>  
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="header">
                <h2>All Place / Destination</h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable">
                    <thead>
                        <tr>
                            <th>Place Type</th>
                            <th>Place Name</th>
                            <th>Province</th>
                            <th>City</th>
                            <th>Last Updated</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead> 
                    <tbody id="listPlace">
                    @foreach($destination as $d)
                   
                        <tr>
                            <td>{{$d->placeTypeNameEN}}</td>
                            <td>{{$d->destination}}</td>
                            <td>{{$d->province}}</td>
                            <td>{{$d->city}}</td>
                            <td>{{$d->updated}}</td>
                            <td>
                                @if($d->status == "active")
                                <div class="switch">
                                    <label><input type="checkbox" id="status{{$d->destinationId}}" onchange="updatestatus({{$d->destinationId}})" checked><span class="lever"></span></label>
                                </div>
                                @else
                                <div class="switch">
                                    <label><input type="checkbox" id="status{{$d->destinationId}}" onchange="updatestatus({{$d->destinationId}})"><span class="lever"></span></label>
                                </div>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('/admin/master/place/edit/'.$d->destinationId)}}">
                                    View Detail
                                </a>
                                
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
		    $("input[name='placeSchedule[][StartHour]']").mask('00:00');
            
            $("input[name='placeScheduleType']:radio").change(function () {
                var choose = $(this).val();
                if(choose=="yes"){
                    $("#placeSchedule").show();
                }
                else{
                    $("#placeSchedule").hide();
                }
            });
            $("select[name='placeActivity[]']").select2({
                tags:true,
                placeholder: "Start type here."
            });

            $("select.type").change(function(){
                var value = $(this).val();
                if(value=="Close"){
                    $(this).closest(".row").find(".time").hide();
                    $(this).closest(".row").find(".checkbox").hide();
                }
                else{

                    $(this).closest(".row").find(".time").show();
                    $(this).closest(".row").find(".checkbox").show();
                }
            });

            $("#placeScheduleMon").click(function(){
                if ($(this).prop("checked")) {
                    $("#scheduleTimeMon").children().attr('disabled','disabled');
                }
                else{
                    $("#scheduleTimeMon").children().attr('disabled',false);
                }
            });
            $("#placeScheduleTue").click(function(){
                if ($(this).prop("checked")) {
                    $("#scheduleTimeTue").children().attr('disabled','disabled');
                }
                else{
                    $("#scheduleTimeTue").children().attr('disabled',false);
                }
            });
            $("#placeScheduleWed").click(function(){
                if ($(this).prop("checked")) {
                    $("#scheduleTimeWed").children().attr('disabled','disabled');
                }
                else{
                    $("#scheduleTimeWed").children().attr('disabled',false);
                }
            });
            $("#placeScheduleThu").click(function(){
                if ($(this).prop("checked")) {
                    $("#scheduleTimeThu").children().attr('disabled','disabled');
                }
                else{
                    $("#scheduleTimeThu").children().attr('disabled',false);
                }
            });
            $("#placeScheduleFri").click(function(){
                if ($(this).prop("checked")) {
                    $("#scheduleTimeFri").children().attr('disabled','disabled');
                }
                else{
                    $("#scheduleTimeFri").children().attr('disabled',false);
                }
            });
            $("#placeScheduleSat").click(function(){
                if ($(this).prop("checked")) {
                    $("#scheduleTimeSat").children().attr('disabled','disabled');
                }
                else{
                    $("#scheduleTimeSat").children().attr('disabled',false);
                }
            });
            $("#placeScheduleSun").click(function(){
                if ($(this).prop("checked")) {
                    $("#scheduleTimeSun").children().attr('disabled','disabled');
                }
                else{
                    $("#scheduleTimeSun").children().attr('disabled',false);
                }
            });




        });
        $("ul.list a").click(function(){
            $(this).closest("ul").find(".active").removeAttr("class");
            $(this).closest("li").addClass("active")
            var a = $(this).attr("href");
            console.log(a);
        });
        $("title").text("Super Admin Pigijo");
    </script>
    <script>
        $(document).ready(function(){
            var table = $('.dataTable').DataTable({
                searching: false,
                responsive: true,
                order: [[4, "desc"]]
            });
            $("#placeType, #province, #city").change(function(){
                var table = $('.dataTable').DataTable({
                    destroy: true,
                    processing: true,
                    serverSide: true,
                    searching: false,
                    ajax: {
                        url: "{{url('admin/master/place/find')}}",
                        data: { 
                            place_type : $("#placeType").val(),
                            province : $("#province").val(),
                            city : $("#city").val(),
                            keyword : $("#keyword").val(),
                        },
                        type: 'GET'
                    },
                    columns: [
                        { data: 'placeTypeNameEN' },
                        { data: 'destination' },
                        { data: 'province', name: 'province' },
                        { data: 'city', name: 'city' },
                        { data: 'updated', name: 'updated' },
                        { 
                            data: null, 
                            name: 'status',
                            "render": function ( data, type, full, meta ) {
                                var statusPlace = "status"+data.destinationId;
                                if(data.status=="active"){
                                    return '<div class="switch"><label><input type="checkbox" id="status'+data.destinationId+'" onchange="updatestatus('+data.destinationId+')" checked><span class="lever"></span></label></div>';
                                }
                                else{
                                    return '<div class="switch"><label><input type="checkbox" id="status'+data.destinationId+'" onchange="updatestatus('+data.destinationId+')"><span class="lever"></span></label></div>';
                                }
                            }
                        },
                        { 
                            data: 'action', 
                            name: 'destinationId',
                        }
                    ]
                });
            });
            $("#keyword").keyup(function(){
                var table = $('.dataTable').DataTable({
                    destroy: true,
                    processing: true,
                    serverSide: true,
                    searching: false,
                    ajax: {
                        url: "{{url('admin/master/place/find')}}",
                        data: { 
                            place_type : $("#placeType").val(),
                            province : $("#province").val(),
                            city : $("#city").val(),
                            keyword : $("#keyword").val(),
                        },
                        type: 'GET'
                    },
                    columns: [
                        { data: 'placeTypeNameEN' },
                        { data: 'destination' },
                        { data: 'province', name: 'province' },
                        { data: 'city', name: 'city' },
                        { data: 'updated', name: 'updated' },
                        { 
                            data: null, 
                            name: 'status',
                            "render": function ( data, type, full, meta ) {
                                var statusPlace = "status"+data.destinationId;
                                if(data.status=="active"){
                                    return '<div class="switch"><label><input type="checkbox" id="status'+data.destinationId+'" onchange="updatestatus('+data.destinationId+')" checked><span class="lever"></span></label></div>';
                                }
                                else{
                                    return '<div class="switch"><label><input type="checkbox" id="status'+data.destinationId+'" onchange="updatestatus('+data.destinationId+')"><span class="lever"></span></label></div>';
                                }
                            }
                        },
                        { 
                            data: 'action', 
                            name: 'destinationId',
                        }
                    ]
                });
            });
            $("select[name='province']").change(function(){
                var idProvince = $(this).val();
                $("select[name='city']").empty();
                $.ajax({
                    method: "GET",
                    url: "{{ url('/admin/dataapi/findCity') }}"+"/"+idProvince
                }).done(function(response) {
                    $("select[name='city']").append("<option value=''>-Select City-</option>");
                    $.each(response, function (index, value) {
                        $("select[name='city']").append(
                            "<option value="+value.id+">"+value.name+"</option>"
                        );
                    });
                    var table = $('.dataTable').DataTable({
                    destroy: true,
                    processing: true,
                    serverSide: true,
                    searching: false,
                    ajax: {
                        url: "{{url('admin/master/place/find')}}",
                        data: { 
                            place_type : $("#placeType").val(),
                            province : $("#province").val(),
                            city : $("#city").val(),
                            keyword : $("#keyword").val(),
                        },
                        type: 'GET'
                    },
                    columns: [
                        { data: 'placeTypeNameEN' },
                        { data: 'destination' },
                        { data: 'province', name: 'province' },
                        { data: 'city', name: 'city' },
                        { data: 'updated', name: 'updated' },
                        { 
                            data: null, 
                            name: 'status',
                            "render": function ( data, type, full, meta ) {
                                var statusPlace = "status"+data.destinationId;
                                if(data.status=="active"){
                                    return '<div class="switch"><label><input type="checkbox" id="status'+data.destinationId+'" onchange="updatestatus('+data.destinationId+')" checked><span class="lever"></span></label></div>';
                                }
                                else{
                                    return '<div class="switch"><label><input type="checkbox" id="status'+data.destinationId+'" onchange="updatestatus('+data.destinationId+')"><span class="lever"></span></label></div>';
                                }
                            }
                        },
                        { 
                            data: 'action', 
                            name: 'destinationId',
                        }
                    ]
                });
                });
            });
            
        });
    </script>
    <script>
        function updatestatus(id){
            if($("#status"+id).prop("checked")){
                $.ajax({
                    url: "{{url('admin/master/place/status/active')}}/"+id,
                    type: "GET"
                });
            }
            else{
                $.ajax({
                    url: "{{url('admin/master/place/status/disabled')}}/"+id,
                    type: "GET"
                });
            }
        }
    </script>
@endsection
