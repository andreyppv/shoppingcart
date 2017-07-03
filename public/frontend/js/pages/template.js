$('#set-numb, #set-quant').change(function() {
    update_price();
});
$('#set-quant').trigger('change');

//before submit
$('#product-form').submit(function() {
    msg_box = $('#buying-warning');
    
    if($('#custom_set').val() != '1') {    
        if($('#set-quant').val() == '' || isNaN($('#set-quant').val()))
        {
            msg_box.show().html('Please select quantity to continue.');
            return false;
        }
    } else {
        success = true;
        $('#multiple-set-row-wrap .set-name').each(function() {
            value = $(this).val();
            
            if(value.trim() == '') {
                if(!$('#quantity-tab').hasClass('active-menu')) {
                    $('#quantity-tab').trigger('click');
                }
                
                msg_box.show().html('Please input set name and select quantity to continue.');
                success = false;
            }
        });
        
        if(success == false) return false;
    }
});

function update_price() {
    ajaxRequest(
        ajaxUpdatePriceURL,
        $('#product-form').serialize(),
        function(res){
            $('#price-box').fadeTo('fast', 1);
            $('#total-price').html(res);
        },
        function() 
        {
            $('#price-box').fadeTo('fast', 0.5);
        }
    );
}