$('.currency-text').change(function() {
    price = 0;
    $('.currency-text').each(function() {
        if(!isNaN($(this).val())) {
            if($(this).hasClass('discount')) price -= parseFloat($(this).val());      
            else price += parseFloat($(this).val());      
        }
    });    
    
    if(price < 0) price = 0;
    $('#total-price').html(Math.round(price * 100) / 100);
});

$('.btn-complete').on("click", function(e) {
    link = $(this).data('href');
    swal({
        title: "Are you sure?",
        text: 'Please check this was get paid before completing this order!',
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
            //document.location.href = link;
            $('#cart-form').submit();
        }
    });
    
});