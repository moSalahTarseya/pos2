@extends('front.layouts.master')
@php $dir = app()->getLocale() == 'ar' ? 'rtl' : 'ltr'; @endphp
@section('title')
    {{ __('lang.my_consult') }}
@endsection

@section('css')
<style>
     .back_ground{
            background: #F9FAFB;
        }
        .me{
            background: aliceblue;
            padding: 5px;
            border-radius: 8px;
            color: #0072d5;
        }
        .another{
            background: #f0fff3;
            padding: 5px;
            border-radius: 8px;
            color: #00d512;
        }
        .pending{
            background: #fffff0;
            padding: 5px;
            border-radius: 8px;
            color: #d5d100;
        }
</style>
@endsection

@section('content')
<section class="back_ground pt-5 pb-5">
   <div class="container {{ $dir == 'rtl' ?'text-right':'text-left' }}">
    <div class="row ">

        <div class="col-12">
            <h4><b>{{ __('lang.my_consult') }} </b></h4>
        </div>
        {{-- {{ dd($consultations) }} --}}
        @foreach ($consultations as $item)
            {{-- @if ($item->is_for_another_person == 0) --}}
                <div class="col-md-6 col-lg-4 col-sm-12 pt-3">
                    <div class="card border-0 w3-round-xlarge">
                        <div class="card-body">
                         {{-- <b>  {{ optional($item->user)->name }}</b> --}}
                        <div>
                            <span class="float-right {{ $item->is_for_another_person == 0 ?'me':'another' }}">{{ $item->is_for_another_person == 0 ?__('lang.me') : __('lang.another_person') }}</span>
                            <span class="float-left mr-3 ml-3 {{ $item->status == 'pending' ?'pending':'me' }}">{{ $item->status == 0 ?__('lang.'. $item->status) : __('lang.'. $item->status) }}</span>

                        </div>
                           @php
                                $another_person = json_decode($item->another_person_info);
                            @endphp
                            <br><br>
                            <b>{{ __('lang.person_name') }} : </b> {{ $another_person->name }} <br>
                            <b class="">{{ __('lang.phone') }} : </b> {{ $another_person->phone }}

                            <div class="pt-5">
                                <a href="" class="w3-text-green"><span data-feather="edit"></span> {{ __('lang.edit') }}</a>
                                <a href="" class="w3-text-red mr-2 ml-2"><span data-feather="x-circle"></span> {{ __('lang.cancle') }}</a>
                            </div>
                        </div>

                    </div>
                </div>

            {{-- @endif --}}
        @endforeach

    </div>

   </div>
</section>
@endsection

@section('js')
{{-- <script>
    $("#another").click(function() {
        if($(this).is(":checked")) {
            $("#another-person").show(300);
            $("#user").removeAttr('checked');
        } else {
            $("#another-person").hide(200);
            $(this).removeAttr('checked');
        }
    });
    $("#user").click(function() {
        if($(this).is(":checked")) {
            $("#another-person").hide(300);
            $("#another").removeAttr('checked');
        }
    });

    function removeDisable(element){
        $('#fromSubmit').removeAttr('disabled');
    }
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    var booked_date =
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        calendarWeeks: false,
        autoclose: true,
        showOnFocus: false,
        todayHighlight: false,
        beforeShowDay: highlightDays, // this function to make highlight for date
    });
        $('#datepicker').on('changeDate', function() {
            $('#my_hidden_input').val($('#datepicker').datepicker('getFormattedDate')); //push select date to input val
            $('#fromSubmit').attr('disabled','true');
           var date =  $('#my_hidden_input').val();
            if (date) {
                $.ajax({
                    url: "{{ url('/consultations/getWorkTime/')}}/"+date ,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        $('#time-work').empty();
                        $('#work-time').removeClass('hide');
                        $.each(response.appointments, function(key, item) {
                            var from        = convertTime(item.time_from);
                            var to          = convertTime(item.time_to);
                            var diff        =  calculateTime(item.time_from , item.time_to)
                            var duration    = diff.slice(0, 2);
                            var html = `
                                    <label class="btn btn-outline-primary  mt-2">
                                        <input onclick='removeDisable(this)' type="radio" name="appointment_id" id="option-${item.id}" value="${item.id}">
                                        {{ __('lang.from') }}${from} {{ __('lang.to') }}${to} <br> ${diff}
                                    </label>
                                    <input type="hidden" name="duration" value="${duration}"/>
                                `;
                            $('#time-work').append(html);
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }

    });


    function getCurrentDate(){
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

       return today = yyyy + '-' + mm + '-' + dd;
    }

    /**@argument
      * this function used convert time work from database
      * @param work_time  start or end
      * @return time
      */
    function convertTime(work_time){
        var time = work_time.toString();
        var hours = time.slice(0, 2);
        var minutes = time.slice(3, 5);
        var ampm = hours >= 12 ? '{{ __("lang.pm") }}' : '{{ __("lang.am") }}';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        var strTime = hours + ':' + minutes + ' ' + ampm;
        return strTime ;
    }
    /**@argument
      * this function used convert time work from database
      * @param work_time  start or end
      * @return time
      */
    function calculateTime(from , to){
        var houre_from = from.toString().slice(0, 2);
        var houre_to = to.toString().slice(0, 2);
        var minutes_from = from.toString().slice(3, 5);
        var minutes_to = to.toString().slice(3, 5);
        houre_from  = houre_from % 12;
        houre_to    = houre_to % 12;
        houre_from = houre_from ? houre_from : 12; // the hour '0' should be '12'
        houre_to = houre_to ? houre_to : 12; // the hour '0' should be '12'
        time_h = houre_to - houre_from;
        var dur = time_h >00 ? '{{ __("lang.hr") }}' : '{{ __("lang.min") }}';
        time_m = minutes_to - minutes_from;
        if(time_h >00) {
            var strTime = time_h + ':' + time_m + ' ' + dur ;
        }else{
            var strTime =  time_m + ' ' + dur ;
        }

        return strTime ;
    }


     /**@argument
      * this function used to handel all avilable date only from database
      * make highlight for all date return from database
      * make another date disabled
      * @param date
      * @return active or disable for date
      */
    function highlightDays(date) {
        var d = date;
        var curr_date = d.getDate();
        var curr_month = d.getMonth() + 1; //Months are zero based
        var curr_year = d.getFullYear();
        var formattedDate = curr_year + "-" + curr_month + "-" +  curr_date;
        var date_now = getCurrentDate();
        if ($.inArray( formattedDate , <?php echo json_encode($visableDate);?> ) != -1  && (formattedDate >  <?php echo json_encode($visableDate);?> || formattedDate == date_now) ){
            return {
                classes: 'activeClass'
            };
        }
        else{
            return {
                enabled: false
            };
        }
    }
</script> --}}


@endsection
