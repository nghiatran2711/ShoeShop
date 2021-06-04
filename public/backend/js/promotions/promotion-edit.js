$(document).ready(function () {
    /**
     * Set Datetimepicker for beginDate
     * 
     * @Format YYYY-MM-DD hh:mm:ss
     */
     $('.dt-begin-date').daterangepicker({
        "singleDatePicker": true,
        "autoApply": true,
        "locale": {
            "format": "YYYY-MM-DD",
            "separator": " - ",
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "weekLabel": "W",
            "daysOfWeek": [
                "Su",
                "Mo",
                "Tu",
                "We",
                "Th",
                "Fr",
                "Sa"
            ],
            "monthNames": [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ],
            "firstDay": 1
        },
        "startDate": beginDate1,
        // "endDate": "2090-05-31 23:59:59",
        "minDate": beginDate1,
        "drops": "up"
    }, function(start, end, label) {
      console.log('New date range selected: ' + start.format('YYYY-MM-DD hh:mm:ss'));
    });

    /**
     * Set Datetimepicker for endDate
     * 
     * @Format YYYY-MM-DD hh:mm:ss
     */
     $('.dt-end-date').daterangepicker({
        "singleDatePicker": true,
        "autoApply": true,
        "locale": {
            "format": "YYYY-MM-DD",
            "separator": " - ",
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "weekLabel": "W",
            "daysOfWeek": [
                "Su",
                "Mo",
                "Tu",
                "We",
                "Th",
                "Fr",
                "Sa"
            ],
            "monthNames": [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ],
            "firstDay": 1
        },
        "startDate": beginDate2,
        // "endDate": "2090-05-31 23:59:59",
        "minDate": beginDate2,
        "drops": "up"
    }, function(start, end, label) {
      console.log('New date range selected: ' + start.format('YYYY-MM-DD hh:mm:ss'));
    });

    $('.select2-list-product').select2();
});