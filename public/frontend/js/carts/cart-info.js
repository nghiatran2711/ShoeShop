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

    $(document).on('submit', '.frm-remove-product-in-cart', function (event) {
        event.preventDefault();

        // Define variable
        let url = $(this).attr('action');
        let csrf = $(this).find('input[name=_token]').val();
        
        // Process AJAX
        $.ajax({
            url: url,
            type: 'DELETE',
            data: {
                _token: csrf
            },
            success: function (response) {
                // rewrite html
                $('.list-product').html(response.data_table);

                // show message success
                toastr.success('Delete Product In Cart Successful!');
            },
            error: function (err) {
                // Display an error
                if (err.responseJSON.message) {
                    toastr.error(err.responseJSON.message);
                } else {
                    toastr.error('Cannot Delete Product In Cart.');
                }
            },
            dataType: 'json'
        });
    });
});