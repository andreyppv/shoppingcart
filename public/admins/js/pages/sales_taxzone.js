$(document).on('click', '#btn_save', function() {
    $('#aform').validate({
        errorClass: 'help-block text-left animated fadeInDown',
        errorElement: 'div',
        errorPlacement: function(error, e) {
            jQuery(e).parents('.form-group > div').append(error);
        },
        highlight: function(e) {
            jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
            jQuery(e).closest('.help-block').remove();
        },
        success: function(e) {
            jQuery(e).closest('.form-group').removeClass('has-error');
            jQuery(e).closest('.help-block').remove();
        },
        rules: {
            'country': {
                required: true,
            },
            'region': {
                required: true,
            },
            'tax': {
                required: true,
                number: true
            }
        },
    });
    
    $('#aform').submit();    
});