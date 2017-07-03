$('.order-item .btn-assign-job').click(function() {
    box = $(this).parents('.order-item-row');
    orderBox = $(this).parents('.order-item');
    itemId = $(this).val();
    stuffId = $('select.job-manager', box).val();
    
    ajaxRequest(
        ajaxUpdateItemUrl,
        {'item_id':itemId, 'job_manager':stuffId},
        function(res) {
            if(res != '') {
                result = $.parseJSON(res);
                
                $('.td-job-status label', box).removeClass('text-warning')
                    .addClass('text-success')
                    .html('Working');                
                alertify.success(result.msg);
                
                $('.td-job-btn', box).html('');
                $('.td-job-manager', box).html(result.stuffName);
                
                $('.td-order-status', orderBox).html('<b>' + result.orderStatus + '</b>'); 
                
                orderBox.fadeTo('slow', 1);
            }
        },
        function(res) {
            orderBox.fadeTo('slow', 0.5);
        }
    );
});