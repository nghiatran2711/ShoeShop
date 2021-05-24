$(document).ready(function () {
    // check payment option to swicth type
    $('.payment-type').on('change', function () {
        let val = $(this).val();
        console.log('val', val);
        
        if (val == 1) { // display none
            $('#payment-info').hide();
        } else { // display show
            $('#payment-info').show();
        }
    });
});