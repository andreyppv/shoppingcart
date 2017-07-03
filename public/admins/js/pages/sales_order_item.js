$('#btn-add-tracking').click(function() {
    ajaxRequest(
        ajaxGetTrackingFormUrl,
        {item_id:$('#item_id').val()},
        function(res) {
            $('#tracking-form-content').html(res);
            $('#tracking-form').modal('show');
        }
    );
});