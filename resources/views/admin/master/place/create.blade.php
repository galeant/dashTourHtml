@extends('admin.layouts.routing')

@section('header')
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Jquery DataTable | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('') }}" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Bootstrap Select2 -->
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('plugins/telformat/css/intlTelInput.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-file-input/css/fileinput.css') }}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />
@endsection

@section('page')

    <div class="container-fluid">
        <div class="card">
            <div class="header">
                <h2>All Place / Destination > Add New Place</h2>
            </div>
            <div class="body">
                <form action="{{ url('/admin/master/place/add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row" style="margin-left:5px">
                        <div class="col-md-12">
                           <h5 for="placeType">Place Type</h5>
                        </div>
                        <div class="col-md-6">
                            <select name="placeType" id="placeType" class="form-control" required>
                                @foreach($place_type as $pt)
                                <option value="{{$pt->placeTypeId}}">{{$pt->placeTypeNameEN}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                        <h5 for="placeType">[EN] Place Name* :</h5>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="EN[placeName]" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <h5 for="placeType">[ID] Place Name* :</h5>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="ID[placeName]" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-left:5px;">
                        <div class="col-md-3">
                            <h5 for="placeType">Province*:</h5>
                            <select name="province" id="province" class="form-control" required>
                                <option value="">--Select Province--</option>
                                @foreach($province as $p)
                                <option value="{{$p->id}}">{{$p->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <h5>City*:</h5>
                            <select name="city" id="city"  class="form-control" required>
                                <option value="">--Select City--</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-left:5px;">
                        <div class="col-md-3">
                            <h5>District*:</h5>
                            <select name="district" id="district"  class="form-control" required>
                                <option value="">--Select District-</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <h5>Village*:</h5>
                            <select name="village" id="village"  class="form-control" required>
                                <option value="">--Select Village--</option>
                            </select>
                        </div>
                    </div>
                    <div class="row"  style="margin-left:5px;">
                        <div class="col-md-3">
                            <h5>Latitude* :</h5>
                            <input type="text" name="latitude" class="form-control" required> 
                        </div>
                        <div class="col-md-3">
                            <h5>Longitude* :</h5>
                            <input type="text" name="longitude" class="form-control" required>
                        </div>
                    </div>
                    <div class="row"  style="margin-left:10px;">
                        <div class="col-md-12">
                            <input type="hidden" name="format">	
                            <h5>Phone Number if any:</h5>
                        </div>
                        <div class="col-md-6">
                            <input type="tel" class="form-control" name="phone" style="width:100%;">
                        </div>
                    </div>
                    <div class="row"  style="margin-left:10px;">
                        <div class="col-md-12">
                            <h5>Address if any:</h5>
                        </div>
                        <div class="col-md-6">
                            <textarea name="address" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row"  style="margin-left:10px;">
                        <div class="col-md-12">
                            <h5>How do you describe activity that can be done in this place?</h5>
                            <h5>Example: Sight-seeing, sport, shopping, etc. You can add multiple activity type.</h5>
                        </div>
                        <div class="col-md-6">
                            <select type="text" class="form-control" name="placeActivity[]" multiple="multiple" style="width: 100%" id="placeActivity" required></select>
                        </div>
                    </div>
                    <div class="row"  style="margin-left:10px;">
                        <div class="col-md-12">
                            <h5>Is this place has its own open / close schedule?*</h5>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-3">
                                <input type="radio" name="placeScheduleType" value="yes" id="yes" checked>
                                <label for="yes">Yes</label>
                            </div>
                            <div class="col-md-9">
                                <input type="radio" name="placeScheduleType" value="no" id="no">
                                <label for="no">Open all day, 24 hours</label>
                            </div>
                        </div>
                    </div>
                    <div class="row"  style="margin-left:10px;" id="placeSchedule">
                        <div class="col-md-10">
                            <h5>Open Schedule</h5>
                            <div class="row">
                                <input type="hidden" name="placeSchedule[0][ScheduleDay]" value="Monday">
                                <div class="col-md-2">
                                    <h5>Monday</h5>
                                </div>
                                <div class="col-md-2">
                                    <select name="placeSchedule[0][ScheduleCondition]" id="" class="form-control type">
                                        <option>Open</option>
                                        <option>Close</option>
                                    </select>
                                </div>
                                <div class="col-md-4 time" id="scheduleTimeMon">
                                    <span>Open From*:</span>
                                    <input id="time" type="text"  class="input-time" placeholder="HH:MM" style="width:30%" name="placeSchedule[0][StartHour]" required>
                                    <span>to</span>
                                    <input id="time" type="text"  class="input-time" placeholder="HH:MM" style="width:30%" name="placeSchedule[0][EndHour]" required>
                                </div>
                                <div class="col-md-2 checkbox" id="scheduleFullDay">
                                    <input type="checkbox" class="filled-in form-control" name="placeSchedule[0][FullDay]" id="placeScheduleMon" value="FullDay">
                                    <label for="placeScheduleMon">Open 24 Hours</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <input type="hidden" name="placeSchedule[1][ScheduleDay]" value="Tuesday">
                                <div class="col-md-2">
                                    <h5>Tuesday</h5>
                                </div>
                                <div class="col-md-2">
                                    <select name="placeSchedule[1][ScheduleCondition]" id="" class="form-control type">
                                        <option>Open</option>
                                        <option>Close</option>
                                    </select>
                                </div>
                                <div class="col-md-4 time" id="scheduleTimeTue">
                                    <span>Open From*:</span>
                                    <input id="time" type="text"  class="input-time" placeholder="HH:MM" style="width:30%" name="placeSchedule[1][StartHour]" required>
                                    <span>to</span>
                                    <input id="time" type="text"  class="input-time" placeholder="HH:MM" style="width:30%" name="placeSchedule[1][EndHour]" required>
                                </div>
                                <div class="col-md-2 checkbox" id="scheduleFullDay">
                                    <input type="checkbox" class="filled-in form-control" name="placeSchedule[1][FullDay]" id="placeScheduleTue" value="FullDay">
                                    <label for="placeScheduleTue">Open 24 Hours</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <input type="hidden" name="placeSchedule[2][ScheduleDay]" value="Wednesday">
                                <div class="col-md-2">
                                    <h5>Wednesday</h5>
                                </div>
                                <div class="col-md-2">
                                    <select name="placeSchedule[2][ScheduleCondition]" id="" class="form-control type">
                                        <option>Open</option>
                                        <option>Close</option>
                                    </select>
                                </div>
                                <div class="col-md-4 time"  id="scheduleTimeWed">
                                    <span>Open From*:</span>
                                    <input id="time" type="text"  class="input-time" placeholder="HH:MM" style="width:30%" name="placeSchedule[2][StartHour]" required>
                                    <span>to</span>
                                    <input id="time" type="text"  class="input-time" placeholder="HH:MM" style="width:30%" name="placeSchedule[2][EndHour]" required>
                                </div>
                                <div class="col-md-2 checkbox" id="scheduleFullDay">
                                    <input type="checkbox" class="filled-in form-control" name="placeSchedule[2][FullDay]" id="placeScheduleWed" value="FullDay">
                                    <label for="placeScheduleWed">Open 24 Hours</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                    <input type="hidden" name="placeSchedule[3][ScheduleDay]" value="Thursday">
                                <div class="col-md-2">
                                    <h5>Thursday</h5>
                                </div>
                                <div class="col-md-2">
                                    <select name="placeSchedule[3][ScheduleCondition]" id="" class="form-control type">
                                        <option>Open</option>
                                        <option>Close</option>
                                    </select>
                                </div>
                                <div class="col-md-4 time"  id="scheduleTimeThu">
                                    <span>Open From*:</span>
                                    <input id="time" type="text"  class="input-time" placeholder="HH:MM" style="width:30%" name="placeSchedule[3][StartHour]" required>
                                    <span>to</span>
                                    <input id="time" type="text"  class="input-time" placeholder="HH:MM" style="width:30%" name="placeSchedule[3][EndHour]" required>
                                </div>
                                <div class="col-md-2 checkbox" id="scheduleFullDay">
                                    <input type="checkbox" class="filled-in form-control" name="placeSchedule[3][FullDay]" id="placeScheduleThu" value="FullDay">
                                    <label for="placeScheduleThu">Open 24 Hours</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                    <input type="hidden" name="placeSchedule[4][ScheduleDay]" value="Friday">
                                <div class="col-md-2">
                                    <h5>Friday</h5>
                                </div>
                                <div class="col-md-2 ">
                                    <select name="placeSchedule[4][ScheduleCondition]" id="" class="form-control type">
                                        <option>Open</option>
                                        <option>Close</option>
                                    </select>
                                </div>
                                <div class="col-md-4 time"  id="scheduleTimeFri">
                                    <span>Open From*:</span>
                                    <input id="time" type="text"  class="input-time" placeholder="HH:MM" style="width:30%" name="placeSchedule[4][StartHour]" required>
                                    <span>to</span>
                                    <input id="time" type="text"  class="input-time" placeholder="HH:MM" style="width:30%" name="placeSchedule[4][EndHour]" required>
                                </div>
                                <div class="col-md-2 checkbox" id="scheduleFullDay">
                                    <input type="checkbox" class="filled-in form-control" name="placeSchedule[4][FullDay]" id="placeScheduleFri" value="FullDay">
                                    <label for="placeScheduleFri">Open 24 Hours</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                    <input type="hidden" name="placeSchedule[5][ScheduleDay]" value="Saturday">
                                <div class="col-md-2">
                                    <h5>Saturday</h5>
                                </div>
                                <div class="col-md-2">
                                    <select name="placeSchedule[5][ScheduleCondition]" id="" class="form-control type">
                                        <option>Open</option>
                                        <option>Close</option>
                                    </select>
                                </div>
                                <div class="col-md-4 time"  id="scheduleTimeSat">
                                    <span>Open From*:</span>
                                    <input id="time" type="text"  class="input-time" placeholder="HH:MM" style="width:30%" name="placeSchedule[5][StartHour]" required>
                                    <span>to</span>
                                    <input id="time" type="text"  class="input-time" placeholder="HH:MM" style="width:30%" name="placeSchedule[5][EndHour]" required>
                                </div>
                                <div class="col-md-2 checkbox" id="scheduleFullDay">
                                    <input type="checkbox" class="filled-in form-control" name="placeSchedule[5][FullDay]" id="placeScheduleSat" value="FullDay">
                                    <label for="placeScheduleSat">Open 24 Hours</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                    <input type="hidden" name="placeSchedule[6][ScheduleDay]" value="Sunday">
                                <div class="col-md-2">
                                    <h5>Sunday</h5>
                                </div>
                                <div class="col-md-2">
                                    <select name="placeSchedule[6][ScheduleCondition]" id="" class="form-control type">
                                        <option>Open</option>
                                        <option>Close</option>
                                    </select>
                                </div>
                                <div class="col-md-4 time" id="scheduleTimeSun">
                                    <span>Open From*:</span>
                                    <input id="time" type="text"  class="input-time" placeholder="HH:MM" style="width:30%" name="placeSchedule[6][StartHour]" required>
                                    <span>to</span>
                                    <input id="time" type="text"  class="input-time" placeholder="HH:MM" style="width:30%" name="placeSchedule[6][EndHour]" required>
                                </div>
                                <div class="col-md-2 checkbox" id="scheduleFullDay">
                                    <input type="checkbox" class="filled-in form-control" name="placeSchedule[6][FullDay]" id="placeScheduleSun" value="FullDay">
                                    <label for="placeScheduleSun">Open 24 Hours</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row"  style="margin-left:10px;">
                        <div class="col-md-12">
                            <h5>Average visit time /how long do people spend time at this place on average?*</h5>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-3">
                                <select name="placeVisitHours" id="" class="form-control" required>
                                    <option value="">0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                    <option>15</option>
                                    <option>16</option>
                                    <option>17</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                hours
                            </div>
                            <div class="col-md-3">
                                <select name="placeVisitMinutes" id="" class="form-control" required>
                                    <option>0</option>
                                    <option>30</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                    minutes
                                </div>
                        </div>
                    </div>
                    <div class="row"  style="margin-left:10px;">
                        <div class="col-md-12">
                            <h5>(EN) Place Description. How do you describe this place?*</h5>
                        </div>
                        <div class="col-md-6">
                            <textarea name="EN[placeDescription]" id="" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row"  style="margin-left:10px;">
                        <div class="col-md-12">
                            <h5>(ID) Place Description. How do you describe this place?*</h5>
                        </div>
                        <div class="col-md-6">
                            <textarea name="ID[placeDescription]" id="" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row form-group"  style="margin-left:10px;">
                        <div class="col-md-6" id="filePlacePhoto">
                            <h5>Place Photo</h5>
                            <div class="file-loading">
                                <input type="file" name="placePhoto[]" id="placePhoto" multiple required>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-left:10px;">
                            <h5>Travel tips. Give some travel tips for this place.</h5>
                            <h5>Enter each tips in separate input field. You can add more input field.</h5>
                        </div>
                        <div class="row" id="placeTips">
                            <div class="col-md-6" style="margin:0; padding:0;">
                                <br>
                                <div class="col-xs-1">
                                    <ul>
                                        <li></li>
                                    </ul>
                                </div>
                                <div class="col-md-11">
                                    <select name="placeTips[0][questionId]" id="questionId" class="form-control">
                                        @foreach($tips_question as $tp)
                                            <option value="{{$tp->tipsQuestionId}}">{{$tp->tipsQuestion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-11 col-md-offset-1">
                                    <h5>(EN)</h5>
                                    <textarea name="placeTips[0][EN]" id="" class="form-control" id="placeTipsEN" rows="5"></textarea>
                                </div>
                                <div class="col-md-11 col-md-offset-1">
                                    <h5>(ID)</h5>
                                    <textarea name="placeTips[0][ID]" id="" class="form-control" id="placeTipsID" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 deleteTips">
                                <br>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div id="clonePlaceTips"></div>
                    </div>
                    <br>
                    <div class="row"  style="margin-left:10px;" >
                        <div class="col-md-6">
                            <div class=" col-md-6 pull-right">
                                <input type="button" class="form-control btn bg-amber waves-effect" id="addMoreTips" value="Add More Tips">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row"  style="margin-left:10px;" >
                        <div class="col-md-6">
                            <input type="submit" class="form-control btn bg-orange waves-effect" value="Add New Place">
                        </div>
                    </div>
                    <br><br><br><br><br>
                </form>
            </div>
        </div>  
    </div>
@endsection

@section('footer')
    <!-- Jquery Core Js -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-file-input/js/fileinput.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('plugins/node-waves/waves.js') }}"></script>


    <script src="{{ asset('plugins/telformat/js/intlTelInput.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('js/admin.js') }}"></script>

    <script src="{{ asset('plugins/mask-js/jquery.mask.min.js') }}"></script>
    <!-- Demo Js -->
    <script src="{{ asset('js/demo.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){ 
            $("input[name='phone']").val("+62").intlTelInput({
                separateDialCode: true,
            });
            $("input[name='format']").val("+62");
            
            $(".country").click(function(){
                $("input[name='format']").val("+"+$(this).attr( "data-dial-code" ));
            });
            
		    $("input[name='phone']").mask('000-0000-0000');
            $(".input-time").mask('00:00');
            $("select[name='province']").change(function(){
                var idProvince = $(this).val();
                $("select[name='city']").empty();
                $.ajax({
                    method: "GET",
                    url: "{{ url('/admin/dataapi/findCity') }}"+"/"+idProvince
                }).done(function(response) {
                    $.each(response, function (index, value) {
                        $("select[name='city']").append(
                            "<option value="+value.id+">"+value.name+"</option>"
                        );
                    });
                });
            });

            $("select[name='city']").change(function(){
                var idCity = $(this).val();
                $("select[name='district']").empty();
                $.ajax({
                    method: "GET",
                    url: "{{ url('/admin/dataapi/findDistrict') }}"+"/"+idCity
                }).done(function(response) {
                    $.each(response, function (index, value) {
                        $("select[name='district']").append(
                            "<option value="+value.id+">"+value.name+"</option>"
                        );
                    });
                });
            });
            $("select[name='district']").change(function(){
                var idDistrict = $(this).val();
                $("select[name='village']").empty();
                $.ajax({
                    method: "GET",
                    url: "{{ url('/admin/dataapi/findVillage') }}"+"/"+idDistrict
                }).done(function(response) {
                    $.each(response, function (index, value) {
                        $("select[name='village']").append(
                            "<option value="+value.id+">"+value.name+"</option>"
                        );
                    });
                });
            });
            $("input[name='placeScheduleType']:radio").change(function () {
                var choose = $(this).val();
                if(choose=="yes"){
                    $("#placeSchedule").show();
                    $("#placeSchedule").find("input[type='text']").attr("required", "");
                }
                else{
                    $("#placeSchedule").hide();
                    $("#placeSchedule").find("input[type='text']").removeAttr("required"); 
                }
            });
            var activityTag = [];
            $.ajax({
                method: "GET",
                url: "{{ url('/activity') }}"
            }).done(function(response) {
                $.each(response, function (index, value) {
                    var activity = [];
                    activity["id"] = value["activityId"];
                    activity["text"] = value["name"];
                    activityTag.push(activity);
                });
                $("select[name='placeActivity[]']").select2({
                    placeholder: "Start type here.",
                    data: activityTag,
                });
            });
            

            $("select.type").change(function(){
                var value = $(this).val();
                if(value=="Close"){
                    $(this).closest(".row").find("input[type='text']").removeAttr("required");
                    $(this).closest(".row").find(".time").hide();
                    $(this).closest(".row").find(".checkbox").hide();
                }
                else{
                    $(this).closest(".row").find("input[type='text']").attr("required", "");
                    $(this).closest(".row").find(".time").show();
                    $(this).closest(".row").find(".checkbox").show();
                }
            });

            $("#placeScheduleMon").click(function(){
                if ($(this).prop("checked")) {
                    $("#scheduleTimeMon").children().attr('disabled','disabled');
                    $("#scheduleTimeMon").find('.input-time:first').val("00:00");
                    $("#scheduleTimeMon").find('.input-time:last').val("23:59");
                }
                else{
                    $("#scheduleTimeMon").children().attr('disabled',false);
                }
            });
            $("#placeScheduleTue").click(function(){
                if ($(this).prop("checked")) {
                    $("#scheduleTimeTue").children().attr('disabled','disabled');
                    $("#scheduleTimeTue").find('.input-time:first').val("00:00")
                    $("#scheduleTimeTue").find('.input-time:last').val("23:59");
                }
                else{
                    $("#scheduleTimeTue").children().attr('disabled',false);
                }
            });
            $("#placeScheduleWed").click(function(){
                if ($(this).prop("checked")) {
                    $("#scheduleTimeWed").children().attr('disabled','disabled');
                    $("#scheduleTimeWed").find('.input-time:first').val("00:00")
                    $("#scheduleTimeWed").find('.input-time:last').val("23:59");
                }
                else{
                    $("#scheduleTimeWed").children().attr('disabled',false);
                }
            });
            $("#placeScheduleThu").click(function(){
                if ($(this).prop("checked")) {
                    $("#scheduleTimeThu").children().attr('disabled','disabled');
                    $("#scheduleTimeThu").find('.input-time:first').val("00:00")
                    $("#scheduleTimeThu").find('.input-time:last').val("23:59");
                }
                else{
                    $("#scheduleTimeThu").children().attr('disabled',false);
                }
            });
            $("#placeScheduleFri").click(function(){
                if ($(this).prop("checked")) {
                    $("#scheduleTimeFri").children().attr('disabled','disabled');
                    $("#scheduleTimeFri").find('.input-time:first').val("00:00")
                    $("#scheduleTimeFri").find('.input-time:last').val("23:59");
                }
                else{
                    $("#scheduleTimeFri").children().attr('disabled',false);
                }
            });
            $("#placeScheduleSat").click(function(){
                if ($(this).prop("checked")) {
                    $("#scheduleTimeSat").children().attr('disabled','disabled');
                    $("#scheduleTimeSat").find('.input-time:first').val("00:00")
                    $("#scheduleTimeSat").find('.input-time:last').val("23:59");
                }
                else{
                    $("#scheduleTimeSat").children().attr('disabled',false);
                }
            });
            $("#placeScheduleSun").click(function(){
                if ($(this).prop("checked")) {
                    $("#scheduleTimeSun").children().attr('disabled','disabled');
                    $("#scheduleTimeSun").find('.input-time:first').val("00:00")
                    $("#scheduleTimeSun").find('.input-time:last').val("23:59");
                }
                else{
                    $("#scheduleTimeSun").children().attr('disabled',false);
                }
            });
            var i = 1;
            $("#addMoreTips").click(function (){
                $("#placeTips").clone().appendTo("#clonePlaceTips").addClass("cloneTips"+i);
                $(".cloneTips"+i+" #questionId").attr("name","placeTips["+i+"][questionId]");
                $(".cloneTips"+i+" textarea[name='placeTips[0][EN]']").attr("name","placeTips["+i+"][EN]").val("");
                $(".cloneTips"+i+" textarea[name='placeTips[0][ID]']").attr("name","placeTips["+i+"][ID]").val("");
                $(".cloneTips"+i+" .deleteTips").append('<div class="col-md-6"><button type="button" id="delete_tips" class="btn btn-danger waves-effect"><i class="material-icons">clear</i></button></div>');
                i++;
            });

            $("select[name='placeVisitHours']").change(function(){
                var val = $(this).val();
                if(val==""){
                    $("select[name='placeVisitHours']").removeAttr("required");                    
                    $("select[name='placeVisitMinutes']").attr("required", "required");
                }
                else{
                    $("select[name='placeVisitHours']").attr("required", "required");
                    $("select[name='placeVisitMinutes']").removeAttr("required");                    
                }
            });
            $("select[name='placeVisitMinutes']").change(function(){
                var val = $(this).val();
                if(val=="0"){
                    $("select[name='placeVisitMinutes']").removeAttr("required");                    
                    $("select[name='placeVisitHours']").attr("required", "required");
                }
                else{
                    $("select[name='placeVisitMinutes']").attr("required", "required");
                    $("select[name='placeVisitHours']").removeAttr("required");                    
                }
            });
            $("#placePhoto").fileinput({
                theme: 'fa',
                uploadUrl: "a",
                uploadAsync: false,
                maxFileCount: 5,
                maxFileSize: 5000,
                showCaption: false,
                showRemove: false,
                showCancel: false,
                showUpload: false,
                previewSettings:{
                    image: {width: "auto", height: "auto"},
                },
                allowedFileTypes: ['image'],
                allowedFileExtensions: ["jpg", "png", "gif"],
                allowedPreviewTypes :['image'],
                extra: function() { 
                    $("#filePlacePhoto").find(".kv-file-upload").remove();;
                },
            });
                // uploadUrl: "/file-upload-batch/1",
            //     uploadAsync: false,
            //     minFileCount: 2,
            //     maxFileCount: 5,
            //     overwriteInitial: false,
            //     initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
            //     initialPreviewFileType: 'image', // image is the default and can be overridden in config below
            //     initialPreviewConfig: [
            //         {caption: "People-1.jpg", size: 576237, width: "120px", url: "/site/file-delete", key: 1},
            //         {caption: "People-2.jpg", size: 932882, width: "120px", url: "/site/file-delete", key: 2}, 
            //     ],
            //     uploadExtraData: {
            //         img_key: "1000",
            //         img_keywords: "happy, places",
            //     }
            // }).on('filesorted', function(e, params) {
            //     console.log('file sorted', e, params);
            // }).on('fileuploaded', function(e, params) {
            //     console.log('file uploaded', e, params);
            // });
            $("input:file").change(function (){
                $("#filePlacePhoto").find(".kv-file-upload").remove();
            });
        });
        
        $(document).on("click", "#delete_tips", function() {
                $(this).closest("#placeTips").remove();
            });
        $("ul.list a").click(function(){
            $(this).closest("ul").find(".active").removeAttr("class");
            $(this).closest("li").addClass("active")
            var a = $(this).attr("href");
            console.log(a);
        });
        $("title").text("Super Admin Pigijo");
        

    </script>
@endsection
