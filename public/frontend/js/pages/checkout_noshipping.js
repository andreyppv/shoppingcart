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
                    jQuery(e).parents('.address-block-row .right-bl').append(errorDiv);
                }    
            }
            else
            {    
                getPayment();        
            }
        },
        function() {
            return $("#shipping-form").validate();
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
                $('#ck-step-shipping')
                    .removeClass('active')
                    .addClass('allow');
                    
                //add active to payment address menu
                $('#ck-step-payment').addClass('active');
                
                //hide
                $('#shipping-block')
                    .fadeTo('fast', 1)
                    .hide();
                    
                //show payment block
                $(window).scrollTop(0);
                
                $('#payment-block').show();    
            }
        }
    );
}