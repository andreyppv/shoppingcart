/////////////////////////////////////////////////////////
// Very Common
/////////////////////////////////////////////////////////
$('.datepicker').datepicker({
    weekStart: 1,
    autoclose: true,
    todayHighlight: true,
    format: 'yyyy-mm-dd',
});

$('th.sort_th').click(function() {
    if(link = $(this).data('href'))
    {
        document.location.href = link;
    }
});

$('.btn-delete').on("click", function() {
    link = $(this).data('href');
    swal({
        title: "Are you sure?",
        text: (typeof warningText !== 'undefined') ? warningText : "You will not be able to restore this!",
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
            document.location.href = link;
        }
    });
    
});

/////////////////////////////////////////////////////////
// Special Events
/////////////////////////////////////////////////////////
$(document).on('change', '#country', function() {
    ajaxRequest(
        base_url + "common/getRegions",
        {'country_id': $(this).val()},
        function(res){
            $('#region').html(res);
        }
    );
});

/////////////////////////////////////////////////////////
// Vertical Central Modal
/////////////////////////////////////////////////////////
function centerModals($element) {
    var $modals;
    if ($element.length) {
        $modals = $element;
    } else {
        $modals = $('.modal-vcenter:visible');
    }
    
    $modals.each( function(i) {
        var $clone = $(this).clone().css('display', 'block').appendTo('body');
        var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);
        top = top > 0 ? top : 0;
        $clone.remove();
        $(this).find('.modal-content').css("margin-top", top);
    });
}
$('.modal-vcenter').on('show.bs.modal', function(e) {
  centerModals($(this));
});
$(window).on('resize', centerModals);
/////////////////////////////////////////////////////////


function ajaxUpload(object, url, successFunc, beforeFunc) {
    var fd = new FormData();            
    fd.append("Filedata", object.files[0]);
    fd.append('ObjectID', $(object).data('target'));
    
    $.ajax({
        type: "POST",
        headers: { 'X-XSRF-TOKEN' : $('#csrf-token').attr('content') }, 
        url: url,
        cache: false,
        data: fd,
        processData: false,
        contentType: false,
        beforeSend: beforeFunc, 
        success: function(res){
            if(successFunc)
            {
                successFunc(res);
            }
        }
    });
}