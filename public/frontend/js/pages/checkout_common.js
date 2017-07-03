jQuery.validator.addMethod("cardNumber", function(value, element) {
    return this.optional(element) || $.payment.validateCardNumber(value);
}, "Invallid card number");

$(document).on('click', '#checkout-steps li.allow', function() {
    target = $(this).data('target');
    
    $('#checkout-steps li').removeClass('active');
    
    $(this).addClass('active');
    $('#checkout-steps-box .block').hide();
    $('#' + target).fadeTo('fast', 1).show();
});

//shipping address
$('#shipping-form').validate({
    errorClass: 'help-block text-left animated fadeInDown',
    errorElement: 'div',
    errorPlacement: function(error, e) {
        jQuery(e).parents('.address-block-row .right-bl').append(error);
    },
    highlight: function(e) {
        jQuery(e).closest('.address-block-row').removeClass('has-error').addClass('has-error');
        jQuery(e).closest('.help-block').remove();
    },
    success: function(e) {
        jQuery(e).closest('.address-block-row').removeClass('has-error');
        jQuery(e).closest('.help-block').remove();
    },
    rules: {
        'shipping[first_name]': {required: true},
        'shipping[last_name]': {required: true},
        'shipping[email]': {required: true, email: true},
        'shipping[country]': {required: true},
        'shipping[address]': {required: true},
        'shipping[city]': {required: true},
        'shipping[state]': {required: true},
        'shipping[zipcode]': {required: true},
        'shipping[phone]': {required: true},
        'shipping[zipcode]': {required: true},
    }    
});

$(document).on('submit', '#shipping-form', function(e) {
    e.preventDefault();
    
    box = $('#shipping-block');
    box.fadeTo('fast', 0.5);
    
    same_billing = $('#shipping_same_as_billing').is(":checked");
    saveShippingAddress(same_billing);
});
//end shipping address

//billing address
function apply_billing_form_validate()
{
    $('#billing-form').validate({
        errorClass: 'help-block text-left animated fadeInDown',
        errorElement: 'div',
        errorPlacement: function(error, e) {
            jQuery(e).parents('.address-block-row .right-bl').append(error);
        },
        highlight: function(e) {
            jQuery(e).closest('.address-block-row').removeClass('has-error').addClass('has-error');
            jQuery(e).closest('.help-block').remove();
        },
        success: function(e) {
            jQuery(e).closest('.address-block-row').removeClass('has-error');
            jQuery(e).closest('.help-block').remove();
        },
        rules: {
            'billing[first_name]': {required: true},
            'billing[last_name]': {required: true},
            'billing[email]': {required: true, email: true},
            'billing[country]': {required: true},
            'billing[address]': {required: true},
            'billing[city]': {required: true},
            'billing[state]': {required: true},
            'billing[zipcode]': {required: true},
            'billing[phone]': {required: true},
            'billing[zipcode]': {required: true},
        }    
    });
}

$(document).on('submit', '#billing-form', function(e) {
    e.preventDefault();
    
    box = $('#billing-block');
    box.fadeTo('fast', 0.5);
    
    saveBillingAddress();
});
//end billing address

//shipment
$(document).on('submit', '#shipment-form', function(e) {
    e.preventDefault();
    
    box = $('#shipment-block');
    box.fadeTo('fast', 0.5);
    
    saveShipment();
});
//end shipment

//payment
function apply_payment_form_validate()
{
    $('#card-number').payment('formatCardNumber');
    $('#card-cvc').payment('formatCardCVC');
      
    $('#payment-form').validate({
        errorClass: 'help-block text-left animated fadeInDown',
        errorElement: 'div',
        errorPlacement: function(error, e) {
            jQuery(e).parents('.credit-card-row .right-bl').append(error);
        },
        highlight: function(e) {
            jQuery(e).closest('.credit-card-row').removeClass('has-error').addClass('has-error');
            jQuery(e).closest('.help-block').remove();
        },
        success: function(e) {
            jQuery(e).closest('.credit-card-row').removeClass('has-error');
            jQuery(e).closest('.help-block').remove();
        },
        rules: {
            //'card-name': {required: true},
            'card-number': {cardNumber: true},
            'card-cvc': {required: true, numeric:true},
        }    
    });    
}

$(document).on('submit', '#payment-form', function(e) {
    e.preventDefault();
    
    box = $('#payment-block');
    box.fadeTo('fast', 0.5);
    
    savePayment();
});

$(document).on('click', '.payment-radio', function() {
    if($(this).val() == 'credit')
    {
        $('#credit-card-info').show();
    }
    else
    {
        $('#credit-card-info').hide();    
    }
});
//end payment

function savePayment()
{
    ajaxRequest(
        ajaxSetPaymentURL,
        $('#payment-form').serialize(),
        function(res) {
            resJSON = $.parseJSON(res);
            if(resJSON.status == false)
            {
                $('#payment-block').fadeTo('fast', 1);        
                
                $('#payment-error')
                    .html(resJSON.error)
                    .addClass('errmsg')
                    .show(); 
            }
            else
            {    
                getConfirm();        
            }
        },
        function() {
            return $("#payment-form").validate();
        }
    ); 
}

function getConfirm()
{
    ajaxRequest(
        ajaxGetConfirmURL,
        null,
        function(res) {
            if(res != '')
            {
                //remove active and add allow class to shipment menu
                $('#ck-step-payment')
                    .removeClass('active')
                    .addClass('allow');
                    
                //add active to payment address menu
                $('#ck-step-confirm').addClass('active');
                
                $('#confirm-block').html(res);
                
                $('#payment-block')
                    .fadeTo('fast', 1)
                    .hide();
                
                $(window).scrollTop(0);    
                $('#confirm-block').show();    
            }
        }
    );  
}

$(document).on('click', '#btn-coupon-apply', function() {
    couponCode = $('#coupon-code').val(); 
    if(couponCode.trim() == '') {
        $('#coupon-code').focus();
        return;
    }
    
    ajaxRequest(
        ajaxApplyCouponURL,
        {'coupon': couponCode},
        function(res) {
            $('#coupon-code').val('');  
            
            $('#order-summary-box').html(res).fadeTo(1);  
        },
        function() {
            $('#order-summary-box').fadeTo(0.5);
        }
    );         
});

$(document).on('click', '#btn-coupon-cancel', function() {
    ajaxRequest(
        ajaxCancelCouponURL,
        null,
        function(res) {
            $('#order-summary-box').html(res).fadeTo(1);  
        },
        function() {
            $('#order-summary-box').fadeTo(0.5);
        }
    );         
});

$(document).on('change', '#shipping-saved-address', function() {
    var optionValue = $(this).val();
    ajaxRequest(
        ajaxUpdateAddressFieldsURL,
        {'address-id': $(this).val(), 'type': 'shipping'},
        function(res) {
            $('#shipping-address-fields').html(res).promise().done(function() {
                if($('#shipping_country').length > 0) 
                    $('#shipping_country').trigger('change');
            });
            
            if(optionValue == '-1') {
                $('#save-address-row').show();
                $('#save_shipping_address').prop('disabled', false);
            } else {
                $('#save-address-row').hide();
                $('#save_shipping_address').prop('disabled', true);
            }
        }
    ); 
});
$('#shipping-saved-address').trigger('change');

$(document).on('change', '#billing-saved-address', function() {
    ajaxRequest(
        ajaxUpdateAddressFieldsURL,
        {'address-id': $(this).val(), 'type': 'billing'},
        function(res) {
            $('#billing-address-fields').html(res).promise().done(function() {
                if($('#billing_country').length > 0)  
                    $('#billing_country').trigger('change');
            });
        }
    ); 
});

//
$('#shipping_country').trigger('change');