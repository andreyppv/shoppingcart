calcuate_price();

$(document).on('change', '.product-option', function() {
    calcuate_price();    
});

$('#product-quantity').change(function() {
    $.ajax({
        type: "POST",
        headers: { 'X-XSRF-TOKEN' : $('#csrf-token').attr('content') }, 
        url: admin_base_url + "sales/order/getOptions",
        data: {
            'product_id': $('#product_id').val(),
            'quantity_id': $(this).val()
        },
        success: function(res){
            $('#option-box').html(res);
            
            calcuate_price();
        }
    });    
});

function calcuate_price()
{
    price = 0;
    $('.product-option option:selected, .product-option:checked').each(function() {
        obj = $(this);
        
        price += parseFloat(obj.data('price'));     
    });
    
    $('#product-price').html('$' + price);
}