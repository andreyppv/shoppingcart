$(document).on('click', '#address-list-table .remove-row', function() {
    addressId = $(this).data('index');
    
    ajaxRequest(
        ajaxDeleteUrl,
        {'address-id': addressId},
        function(res) {
            if(res == '')
            {
                alertify.error('Can\'t remove address.');
            }
            else
            {
                $('#address-list-table').html(res);
                
                alertify.success('Address is removed from your address list.');
            }
        }
    );
});

$(document).on('change', '#address-list-table .default-address', function() {
    //if($(this).is(':checked')) return;
    
    addressId = $(this).data('index');
    ajaxRequest(
        ajaxUpdateUrl,
        {'address-id': addressId},
        function(res) {
            if(res == '')
            {
                alertify.error('Can\'t update address.');
            }
            else
            {
                $('#address-list-table').html(res);
                
                alertify.success('Default address is updated.');
            }
        }
    );
});