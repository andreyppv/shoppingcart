$('#btn-add-quantity').click(function() {
    template = $('#price-template').clone();
    template.removeAttr('id');
    
    $('#price-templates').append(template);
});

$(document).on('click', '.btn-remove-quantity', function() {
    box = $(this).parents('.price-template');
    button = $(this);
    
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this values!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes',
        cancelButtonText: "No!",
        closeOnConfirm: false,
        //closeOnCancel: false
    },
    function(isConfirm) {
        if (isConfirm) {
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
            
            if(box.hasClass('new'))
            {
                box.remove();
            }
            else
            {
                button.attr('type', 'submit').trigger('click');
            }
        }
    });
});

$(document).on('click', '.btn-update-table', function() {
    form = $(this).parents('form');
    
    has_error = false;
    $('input[type=text]', form).each(function() {
        obj = $(this);
        if(obj.val() == '' || isNaN(obj.val()))
        {
            has_error = true;
            obj.parents('.box-group').addClass('has-error');
        }
    });
    
    if(has_error) return;
    
    form.submit();
});