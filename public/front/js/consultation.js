
/**
     * display datepicker in page
     */
 $('#datepicker').datepicker({
    format: 'yyyy-mm-dd',
    calendarWeeks: false,
    autoclose: true,
    showOnFocus: false,
    todayHighlight: false,
    beforeShowDay: this.highlightDays, // this function to make highlight for date
});

/**
     * when make change in datepicker  take this value
     * to pass to url ajax to get all appointment in this date
     */
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
                    var from = this.convertTime(item.time_from);
                    var to   = this.convertTime(item.time_to);
                    var diff =  this.calculateTime(item.time_from,item.time_to)
                    var html = `
                            <label class="btn btn-outline-primary  mt-2">
                                <input onclick='removeDisable(this)' type="radio" name="appointment_id" id="option-${item.id}" value="${item.id}">
                                {{ __('lang.from') }}${from} {{ __('lang.to') }}${to} <br> ${diff}
                            </label>
                            <input type="hidden" name="duration" value="${diff}"/>
                        `;
                    $('#time-work').append(html);
                });
            },
        });
    } else {
        console.log('AJAX load did not work');
    }

});



/**
 * make validate to make submit form anable after select appointaments
 */
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




/**
 * this function return current date
 */
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
        var date_now = this.getCurrentDate;
        if ($.inArray( formattedDate , '<?php echo json_encode($visableDate);?>' ) != -1  && (formattedDate >  '<?php echo json_encode($visableDate);?>' || formattedDate == date_now) ){
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


