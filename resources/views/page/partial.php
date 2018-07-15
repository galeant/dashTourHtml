// VALUE ON CHANGE TYPE
            if(dbScheType != "Single Days"){
                $("#dinamic_schedule input").val(null);
            }else{
                @foreach($product->schedules as $sche)
                    $("div#dinamic_schedule").each(function(){
                        $(this).find("scheduleField1").val('{{ date("d-m-Y", strtotime($sche->startDate)) }}');
                        $(this).find("scheduleField2").val('{{ date("d-m-Y", strtotime($sche->endDate)) }}');
                        $(this).find("scheduleField3").val('{{ date("H:i:s", strtotime($sche->startHours)) }}');
                        $(this).find("scheduleField4").val('{{ date("H:i:s", strtotime($sche->endHours)) }}');
                        $(this).find("scheduleField5").val('{{ date("d-m-Y", strtotime($sche->minBookingDateTime)) }}');
                        $(this).find("scheduleField6").val('{{$sche->maximumBooking}}');
                    })
                @endforeach
            }