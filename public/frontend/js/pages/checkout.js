$(document).on('click', '.shipping-option-label', function() {
    target = '#' + $(this).attr('for');
    $(target).trigger('click');
});

//functions
function saveShippingAddress(same_billing)
{
    ajaxRequest(
        ajaxSetShippingURL,
        $('#shipping-form').serialize(),
        function(res) {
            resJSON = $.parseJSON(res);
            if(resJSON.status == false)
            {
                $('#shipping-block').fadeTo('fast', 1);        
                
                for(var key in resJSON.errors){
                    error = resJSON.errors[key];
                    
                    target = $('#shipping_'+key);
                    errorDiv = '<div class="help-block text-left animated fadeInDown">' + error + '</div>';
                    
                    $(target).parents('.address-block-row').addClass('has-error');
                    $(target).parents('.right-bl').append(errorDiv);
                }    
            }
            else
            {    
                getBillingAddress(same_billing);        
            }
        },
        function() {
            return $("#shipping-form").validate();
        }
    );
}

function getBillingAddress(same_billing)
{
    ajaxRequest(
        ajaxGetBillingURL,
        $('#shipping-form').serialize(),
        function(res) {
            $('#billing-block').html(res).promise().done(function() {
                //remove active and add allow class to shipping menu
                $('#ck-step-shipping')
                        .removeClass('active')
                        .addClass('allow');
                
                apply_billing_form_validate();
                
                if(same_billing)
                {
                    saveBillingAddress();        
                }
                else
                {
                    $('#billing-saved-address').trigger('change');
                    
                    //hide shipping address block
                    $('#shipping-block')
                        .fadeTo('fast', 1)
                        .hide();
                    
                    //add active to billing address menu
                    $('#ck-step-billing').addClass('active');
                    
                    //show biliing address block
                    $(window).scrollTop(0);
                    
                    $('#billing-block').show();   
                }
            });
        }
    );   
}
    
function saveBillingAddress()
{
    ajaxRequest(
        ajaxSetBillingURL,
        $('#billing-form').serialize(),
        function(res) {
            resJSON = $.parseJSON(res);
            if(resJSON.status == false)
            {
                $('#billing-block').fadeTo('fast', 1);        
                
                for(var key in resJSON.errors){
                    error = resJSON.errors[key];
                    
                    target = $('#billing_'+key);
                    errorDiv = '<div class="help-block text-left animated fadeInDown">' + error + '</div>';
                    jQuery(e).parents('.address-block-row .right-bl').append(errorDiv);
                }    
            }
            else
            {    
                getShipment();        
            }
        },
        function() {
            return $("#billing-form").validate();
        }
    );
}

function getShipment()
{
    ajaxRequest(
        ajaxGetShipmentURL,
        null,
        function(res) {
            if(res != '')
            {
                $('#shipment-block').html(res);
                
                //remove active and add allow class to billing menu
                $('#ck-step-billing')
                    .removeClass('active')
                    .addClass('allow');
                    
                //add active to billing address menu
                $('#ck-step-shipment').addClass('active');
                
                //hide 
                $('#shipping-block, #billing-block')
                    .fadeTo('fast', 1)
                    .hide();
                
                //show shipment block
                $(window).scrollTop(0);
                
                $('#shipment-block').show(); 
            }
        }
    );
}

function saveShipment()
{
    ajaxRequest(
        ajaxSetShipmentURL,
        $('#shipment-form').serialize(),
        function(res) {
            resJSON = $.parseJSON(res);
            if(resJSON.status == false)
            {
                $('#shipment-block').fadeTo('fast', 1);        
                
                $('#shipment-error')
                    .html(resJSON.error)
                    .show(); 
            }
            else
            {    
                getPayment();        
            }
        },
        function() {
            return $("#shipment-form").validate();
        }
    );  
}

function getPayment() 
{
    ajaxRequest(
        ajaxGetPaymentURL,
        null,
        function(res) {
            if(res != '')
            {
                $('#payment-block').html(res);
                
                //payment
                apply_payment_form_validate();
                
                //remove active and add allow class to shipment menu
                $('#ck-step-shipment')
                    .removeClass('active')
                    .addClass('allow');
                    
                //add active to payment address menu
                $('#ck-step-payment').addClass('active');
                
                //hide
                $('#shipment-block')
                    .fadeTo('fast', 1)
                    .hide();
                    
                //show payment block
                $(window).scrollTop(0);
                
                $('#payment-block').show();    
            }
        }
    );
}