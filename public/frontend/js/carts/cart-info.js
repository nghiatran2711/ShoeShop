$(document).ready(function () {
    // submit form send-verify code
    $('#frm-send-verify-code').on('submit', function (event) {
        event.preventDefault();

        let url = $(this).attr('action');
        let formData = $(this).serialize();
        // alert(formData);
        // use ajax to send REQUEST to server
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function (response) {
                console.log('response', response);
                alert(response.message);
            },
            error: function (err) {
                console.log('err', err);
                alert(err.message);
            },
            dataType: 'json'
        });
    });

    // submit confirm verify code
    $('#frm-confirm-verify-code').on('submit', function (event) {
        event.preventDefault();

        let url = $(this).attr('action');
        let formData = $(this).serialize();
        
        // use ajax to send REQUEST to server
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function (response) {
                console.log('response', response);
                window.location.href = URL_CHECKOUT;
            },
            error: function (err) {
                console.log('err', err);
                alert(err.message);
            },
            dataType: 'json'
        });
    });
});