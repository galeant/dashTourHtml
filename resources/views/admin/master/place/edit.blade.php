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
    <link href="{{ asset('plugins/bootstrap-file-input/css/fileinput.css') }}" rel="stylesheet">
    
    <!-- Animation Css -->
    <link href="{{ asset('') }}plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Select2 -->
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('plugins/telformat/css/intlTelInput.css') }}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />
@endsection

@section('page')

    <div class="container-fluid">
        <div class="card">
            <div class="header">
                <h2>
                    <a href="{{url('/admin/master/place/')}}"> All Place / Destination</a>
                    > 
                    {{$destination->destination}}
                
                </h2>
            </div>
            <div class="body">
                <form action="{{ url('/admin/master/place/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="destinationId" value="{{$destination->destinationId}}">
                    <div class="row" style="margin-left:5px">
                        <div class="col-md-12">
                        <h5 for="placeType">Place Type</h5>
                        </div>
                        <div class="col-md-6">
                            <select name="placeType" id="placeType" class="form-control" required>
                                @foreach($place_type as $pt)
                                    @if($destination->placeTypeId == $pt->placeTypeId)
                                        <option value="{{$pt->placeTypeId}}" selected>{{$pt->placeTypeNameEN}}</option>
                                    @else
                                        <option value="{{$pt->placeTypeId}}">{{$pt->placeTypeNameEN}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                        <h5 for="placeType">[EN] Place Name* :</h5>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="EN[placeName]" class="form-control" value="{{$destination->destination}}" required>
                        </div>
                        <div class="col-md-12">
                            <h5 for="placeType">[ID] Place Name* :</h5>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="ID[placeName]" class="form-control" value="{{$destinationID->placeName}}" required>
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
                            <h5 for="placeType">District*:</h5>
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
                            <input type="text" name="latitude" class="form-control" value="{{$destination->latitude}}" required> 
                        </div>
                        <div class="col-md-3">
                            <h5>Longitude* :</h5>
                            <input type="text" name="longitude" class="form-control" value="{{$destination->longitude}}" required>
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
                            <textarea name="address" rows="3" class="form-control"> {{$destination->destinationAddress}}</textarea>
                        </div>
                    </div>
                    <div class="row"  style="margin-left:10px;">
                        <div class="col-md-12">
                            <h5>How do you describe activity that can be done in this place?</h5>
                            <h5>Example: Sight-seeing, sport, shopping, etc. You can add multiple activity type, add minimum 1 type.</h5>
                        </div>
                        <div class="col-md-6">
                            <select type="text" class="form-control" name="placeActivity[]" multiple="multiple" style="width: 100%" required></select>
                        </div>
                    </div>
                    <div class="row"  style="margin-left:10px;">
                        <div class="col-md-12">
                            <h5>Is this place has its own open / close schedule?*</h5>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-3">
                                <input type="radio" name="placeScheduleType" value="yes" id="yes">
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
                                        <option value="Open">Open</option>
                                        <option value="Close">Close</option>
                                    </select>
                                </div>
                                <div class="col-md-4 time" id="scheduleTimeMon">
                                    <span>Open From*:</span>
                                    <input id="time" type="text"   class="input-time"placeholder="HH:MM" style="width:30%" name="placeSchedule[0][StartHour]" required>
                                    <span>to</span>
                                    <input id="time"  type="text"  class="input-time"placeholder="HH:MM" style="width:30%" name="placeSchedule[0][EndHour]" required>
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
                                        <option value="Open">Open</option>
                                        <option value="Close">Close</option>
                                    </select>
                                </div>
                                <div class="col-md-4 time" id="scheduleTimeTue">
                                    <span>Open From*:</span>
                                    <input id="time"  type="text"  class="input-time"placeholder="HH:MM" style="width:30%" name="placeSchedule[1][StartHour]" required>
                                    <span>to</span>
                                    <input id="time" type="text"   class="input-time"placeholder="HH:MM" style="width:30%" name="placeSchedule[1][EndHour]" required>
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
                                        <option value="Open">Open</option>
                                        <option value="Close">Close</option>
                                    </select>
                                </div>
                                <div class="col-md-4 time"  id="scheduleTimeWed">
                                    <span>Open From*:</span>
                                    <input id="time"  type="text"  class="input-time"placeholder="HH:MM" style="width:30%" name="placeSchedule[2][StartHour]" required>
                                    <span>to</span>
                                    <input id="time"  type="text"  class="input-time"placeholder="HH:MM" style="width:30%" name="placeSchedule[2][EndHour]" required>
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
                                        <option value="Open">Open</option>
                                        <option value="Close">Close</option>
                                    </select>
                                </div>
                                <div class="col-md-4 time"  id="scheduleTimeThu">
                                    <span>Open From*:</span>
                                    <input id="time"   type="text" class="input-time"placeholder="HH:MM" style="width:30%" name="placeSchedule[3][StartHour]" required>
                                    <span>to</span>
                                    <input id="time"   type="text" class="input-time"placeholder="HH:MM" style="width:30%" name="placeSchedule[3][EndHour]" required>
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
                                        <option value="Open">Open</option>
                                        <option value="Close">Close</option>
                                    </select>
                                </div>
                                <div class="col-md-4 time"  id="scheduleTimeFri">
                                    <span>Open From*:</span>
                                    <input id="time"  type="text"  class="input-time" placeholder="HH:MM" style="width:30%" name="placeSchedule[4][StartHour]" required>
                                    <span>to</span>
                                    <input id="time"   type="text" class="input-time" placeholder="HH:MM" style="width:30%" name="placeSchedule[4][EndHour]" required>
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
                                        <option value="Open">Open</option>
                                        <option value="Close">Close</option>
                                    </select>
                                </div>
                                <div class="col-md-4 time"  id="scheduleTimeSat">
                                    <span>Open From*:</span>
                                    <input id="time"   type="text" class="input-time"placeholder="HH:MM" style="width:30%" name="placeSchedule[5][StartHour]" required>
                                    <span>to</span>
                                    <input id="time"   type="text" class="input-time"placeholder="HH:MM" style="width:30%" name="placeSchedule[5][EndHour]" required>
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
                                        <option value="Open">Open</option>
                                        <option value="Close">Close</option>
                                    </select>
                                </div>
                                <div class="col-md-4 time" id="scheduleTimeSun">
                                    <span>Open From*:</span>
                                    <input id="time"   type="text" class="input-time"placeholder="HH:MM" style="width:30%" name="placeSchedule[6][StartHour]" required>
                                    <span>to</span>
                                    <input id="time"  type="text"  class="input-time"placeholder="HH:MM" style="width:30%" name="placeSchedule[6][EndHour]" required>
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
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                </select>
                            </div>
                            <div class="col-md-2 align-middle" style="margin:0; padding:0;">
                                hours
                            </div>
                            <div class="col-md-3 ">
                                <select name="placeVisitMinutes" id="" class="form-control" required>
                                    <option value="0">0</option>
                                    <option value="30">30</option>
                                </select>
                            </div>
                            <div class="col-md-2 align-middle" style="margin:0; padding:0;">
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
                                <input type="file" name="placePhoto[]" id="placePhoto" multiple>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-left:10px;">
                            <h5>Travel tips. Give some travel tips for this place.</h5>
                            <h5>Enter each tips in separate input field. You can add more input field.</h5>
                        </div>
                        <div class="row" id="placeTipsClone" hidden>
                            <div class="col-md-6" style="margin:0; padding:0;">
                                <br>
                                <div class="col-xs-1">
                                    <ul>
                                        <li></li>
                                    </ul>
                                </div>
                                <div class="col-md-11">
                                    <select name="placeTipsClone[][questionId]" id="questionId" class="form-control">
                                        @foreach($tips_question as $tp)
                                            <option value="{{$tp->tipsQuestionId}}">{{$tp->tipsQuestion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-11 col-md-offset-1">
                                    <h5>(EN)</h5>
                                    <textarea name="placeTipsClone[][EN]" id="" class="form-control" id="placeTipsEN" rows="5"></textarea>
                                </div>
                                <div class="col-md-11 col-md-offset-1">
                                    <h5>(ID)</h5>
                                    <textarea name="placeTipsClone[][ID]" id="" class="form-control" id="placeTipsID" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 delete">
                                <br>
                            </div>
                        </div>
                    </div>
                    <?php $list=0; $ii=0;?>
                    @foreach($count_place_tips as $cpt)
                    <div class="row">
                        <div class="col-md-6" style="margin:0; padding:0;">
                            <br>
                            <div class="col-xs-1">
                                <ul>
                                    <li></li>
                                </ul>
                            </div>
                            <div class="col-md-11">
                                <select name="placeTips[{{$ii}}][questionId]" id="" class="form-control">
                                    @foreach($tips_question as $tq)
                                        @if($tq->tipsQuestionId != $cpt->tipsQuestionId)
                                        <h4>{{$cpt->tipsQuestionId}}</h4>
                                        <option value="{{$tq->tipsQuestionId}}">{{$tq->tipsQuestion}}</option>
                                        @else
                                        <option value="{{$tq->tipsQuestionId}}" selected>{{$tq->tipsQuestion}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-11 col-md-offset-1">
                                <h5>(EN)</h5>
                                <textarea name="placeTips[{{$ii}}][EN]" id="" class="form-control" rows="5">{{$place_tips[$list]["placeTipsAnswer"]}}</textarea>
                            </div>
                            <div class="col-md-11 col-md-offset-1">
                                <h5>(ID)</h5>
                                <textarea name="placeTips[{{$ii}}][ID]" id="" class="form-control" rows="5">{{$place_tips[$list+1]["placeTipsAnswer"]}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 delete">
                            <br>
                            <div class="col-md-6"><button type="button" id="deleteTips" class="btn btn-danger waves-effect"><i class="material-icons">clear</i></button></div>
                        </div>
                    </div>
                    <?php $list=$list+2; $ii++;?>
                    @endforeach
                    <div class="row">
                        <div id="clone"></div>
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
                            <input type="submit" class="form-control btn bg-orange waves-effect" value="Update This Place">
                        </div>
                    </div>
                    <br><br><br><br><br>
                    <div class="row" id="html"></div>
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

    <!-- Select Plugin Js -->
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-file-input/js/fileinput.js') }}"></script>
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
    <script>
        $(document).ready(function(){
            $("select[name='province']").find("option[value='{{$destination->province}}']").attr('selected', 'selected')
            $("select[name='city']").empty();
            $("select[name='district']").empty();
            $("select[name='village']").empty();
            $.ajax({
                method: "GET",
                url: "{{ url('/admin/dataapi/findCity') }}"+"/"+{{$destination->province}}
            }).done(function(response) {
                $.each(response, function (index, value) {
                    $("select[name='city']").append(
                        "<option value="+value.id+">"+value.name+"</option>"
                    );
                });
                $("select[name='city']").find("option[value='{{$destination->city}}']").attr('selected', 'selected');
            });
            $.ajax({
                method: "GET",
                url: "{{ url('/admin/dataapi/findDistrict') }}"+"/"+{{$destination->city}}
            }).done(function(response) {
                $.each(response, function (index, value) {
                    $("select[name='district']").append(
                        "<option value="+value.id+">"+value.name+"</option>"
                    );
                });
                $("select[name='district']").find("option[value='{{$destination->district}}']").attr('selected', 'selected');
            });
            $.ajax({
                method: "GET",
                url: "{{ url('/admin/dataapi/findVillage') }}"+"/"+{{$destination->district}}
            }).done(function(response) {
                $.each(response, function (index, value) {
                    $("select[name='village']").append(
                        "<option value="+value.id+">"+value.name+"</option>"
                    );
                });
            $("select[name='village']").find("option[value='{{$destination->village}}']").attr('selected', 'selected');
            });

        });
    </script>
    <script type="text/javascript">
    
    var listPlacePhoto = [];
        
        $(document).ready(function(){ 
            var i = "{{count($count_place_tips)}}";
            $("#addMoreTips").click(function (){ 
                $("#placeTipsClone").clone().appendTo("#clone").addClass("cloneTips"+i);
                $(".cloneTips"+i).attr("id","placeTips");
                $(".cloneTips"+i).show();
                $(".cloneTips"+i+" #questionId").attr("name","placeTips["+i+"][questionId]");
                $(".cloneTips"+i+" textarea[name='placeTipsClone[][EN]']").attr("name","placeTips["+i+"][EN]").val("");
                $(".cloneTips"+i+" textarea[name='placeTipsClone[][ID]']").attr("name","placeTips["+i+"][ID]").val("");
                $(".cloneTips"+i+" .delete").append('<div class="col-md-6"><button type="button" id="deleteTips" class="btn btn-danger waves-effect"><i class="material-icons">clear</i></button></div>');
                i++;
            });
            var phoneNumber = "{{$destination->destinationPhoneNumber}}";
            var codePhoneNumber = phoneNumber.split("-");
            console.log(codePhoneNumber);
            $("input[name='phone']").val(codePhoneNumber[0]).intlTelInput({
                separateDialCode: true,
            });
            $("input[name='format']").val(codePhoneNumber[0]);
            var pn = phoneNumber.replace(codePhoneNumber[0]);
            $("input[name='phone']").val(pn);
            $(".country").click(function(){
                $("input[name='format']").val("+"+$(this).attr( "data-dial-code" ));
            });
            $(".input-time").mask('00:00');
		    $("input[name='phone']").mask('000-0000-0000');
		    $("input[name='placeSchedule[][StartHour]']").mask('00:00');
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
            var array = [];
            $("select[name='placeActivity[]']").select2({
                data: array
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
                    @foreach($place_activity as $pa)
                    console.log()
                        if(value["activityId"] == "{{$pa->placeActivityName}}")
                            activity["selected"] = true;
                    @endforeach
                    activityTag.push(activity);
                });
                $("select[name='placeActivity[]']").select2({
                    placeholder: "Start type here.",
                    data: activityTag,
                });
            });
            @if($destination->placeScheduleType=="yes")
                $("input[name='placeScheduleType'][value='yes']:radio").attr('checked', 'checked');
                $("#placeSchedule").show();
                $("#placeSchedule").find("input[type='text']").attr("required", "");
            @else
                $("input[name='placeScheduleType'][value='no']:radio").attr('checked', 'checked');
                $("#placeSchedule").hide();
                $("#placeSchedule").find("input[type='text']").removeAttr("required"); 
            @endif
            $("input[name='placeScheduleType']:radio").change(function () {
                var choose = $(this).val();
                if(choose=="yes"){
                    $("#placeSchedule").show();
                }
                else{
                    $("#placeSchedule").hide();
                }
            });
            @for($i=0; $i<count($place_schedule); $i++)
                $("select[name='placeSchedule[{{$i}}][ScheduleCondition]']").find("option[value='{{$place_schedule[$i]['placeScheduleCondition']}}']").attr('selected', 'selected')
                if("{{$place_schedule[$i]['placeScheduleCondition']}}" == "Close"){
                    $("select[name='placeSchedule[{{$i}}][ScheduleCondition]']").closest(".row").find(".time").hide();
                    $("select[name='placeSchedule[{{$i}}][ScheduleCondition]']").closest(".row").find(".checkbox").hide();
                }
                else{
                    $("select[name='placeSchedule[{{$i}}][ScheduleCondition]']").closest(".row").find(".time").show();
                    $("select[name='placeSchedule[{{$i}}][ScheduleCondition]']").closest(".row").find(".checkbox").show();
                }
                if("{{$place_schedule[$i]['placeScheduleStartHour']}}" == "00:00:00" && "{{$place_schedule[$i]['placeScheduleEndHour']}}"=="23:59:59"){
                    $("select[name='placeSchedule[{{$i}}][ScheduleCondition]']").closest(".row").find("input.input-time").attr('disabled','disabled');
                    $("select[name='placeSchedule[{{$i}}][ScheduleCondition]']").closest(".row").find("input:checkbox").removeAttr('disabled');
                    $("select[name='placeSchedule[{{$i}}][ScheduleCondition]']").closest(".row").find("input:checkbox").attr('checked','');
                }
                // console.log("{{$place_schedule[$i]['placeScheduleCondition']}}")
                $("input[name='placeSchedule[{{$i}}][StartHour]']").val("{{date('H:i',strtotime($place_schedule[$i]['placeScheduleStartHour']))}}");
                $("input[name='placeSchedule[{{$i}}][EndHour]']").val("{{date('H:i',strtotime($place_schedule[$i]['placeScheduleEndHour']))}}"); 
            @endfor
            @if($destination->placeVisitHours == "0")
                $("select[name='placeVisitHours']").removeAttr("required"); 
            @endif
            $("select[name='placeVisitHours']").find("option[value='{{$destination->placeVisitHours}}']").attr('selected', 'selected')
            $("select[name='placeVisitMinutes']").find("option[value='{{$destination->placeVisitMinutes}}']").attr('selected', 'selected')
            $("textarea[name='EN[placeDescription]']").val("{{$destinationEN->placeDescription}}")
            $("textarea[name='ID[placeDescription]']").val("{{$destinationID->placeDescription}}")
            
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
            @foreach($place_photo as $pp)
                listPlacePhoto.push("{{url(''.$pp->placePhotoUrl)}}")
            @endforeach
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
                initialPreview: listPlacePhoto,
                initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @foreach($place_photo as $pp)
                        {width: "120px", url: "{{url('admin/master/place/deletePhoto')}}", key:"{{$pp->placePhotoId}}"},    
                    @endforeach
                ],
                allowedFileTypes: ['image'],
                allowedFileExtensions: ["jpg", "png", "gif"],
                allowedPreviewTypes :['image'],
                extra: function() { 
                    $("#filePlacePhoto").find(".kv-file-upload").remove();;
                },
            });
            


        });
        $("ul.list a").click(function(){
            $(this).closest("ul").find(".active").removeAttr("class");
            $(this).closest("li").addClass("active")
            var a = $(this).attr("href");
            console.log(a);
        });
        $("title").text("Super Admin Pigijo");
        $(document).on("click", "#deleteTips", function() {
            $(this).closest(".row").remove();
        });
    </script>
@endsection
