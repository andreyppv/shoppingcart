$('#image-wrapper .bubble').each(function() {
    $(this).css('margin-left', 0 - ($(this).outerWidth() / 2))
        .css('margin-top', 0 - ($(this).outerHeight() / 2))
        .show()
        .draggable({
            containment: '#image-wrapper',
            stop: function( event, ui ) {
                var imgObj = $('#image-source');
                var labelObj = $(this);
                var relX = Math.max(labelObj.offset().left - imgObj.offset().left + labelObj.width() / 2, 0);
                var relY = Math.max(labelObj.offset().top - imgObj.offset().top + labelObj.height() / 2, 0);
                
                var posX = Math.min(Math.round(relX / imgObj.width() * 100 * 100) / 100, 100);
                var posY = Math.min(Math.round(relY / imgObj.height() * 100 * 100) / 100, 100);
                
                ajaxRequest(
                    ajaxRepositionBubbleUrl,
                    {'bubble-id':labelObj.data('index'), 'bubble-posx':posX, 'bubble-posy':posY},
                    function(res) {
                    }
                );
            }
        });
});

$(document).on('click', '#image-wrapper .bubble', function() {
    $('#bubble-id').val($(this).data('index'));    
    $('#bubble-label').val($(this).data('label'));
    $('#bubble-link').val($(this).data('link'));
    
    $('#bubble-modal').modal('show');    
});

$(document).on('click', '#image-wrapper .bubble span', function(e) {
    e.stopPropagation();
    
    bubbleObj = $(this).parent();
    
    swal({
        title: "Are you sure?",
        text: (typeof warningText !== 'undefined') ? warningText : "You will not be able to restore this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes',
        cancelButtonText: "No!",
        closeOnConfirm: true,
        //closeOnCancel: false
    },
    function(isConfirm) {
        if (isConfirm) {
            ajaxRequest(
                ajaxRemoveBubbleUrl,
                {'bubble-id': bubbleObj.data('index')},
                function(res) {
                    bubbleObj.remove();        
                }
            );    
        }
    });
});

$('#image-source').click(function(e) {
    
    //get mouse position by percent on image (for responsive)
    var imgOffset = $(this).offset(); 
    var imgWidth  = $(this).width();
    var imgHeight = $(this).height();
    var relX = e.pageX - imgOffset.left;
    var relY = e.pageY - imgOffset.top;
    
    var posX = Math.round(relX / imgWidth * 100 * 100) / 100;
    var posY = Math.round(relY / imgHeight * 100 * 100) / 100;
    
    $('#bubble-posx').val(posX);
    $('#bubble-posy').val(posY);
    $('#bubble-id').val('');    
    $('#bubble-label').val('');    
    $('#bubble-link').val('');    
        
    $('#bubble-modal').modal('show');
});

$('#btn-save-bubble').click(function(e) {
    if($('#bubble-label').val() != '' && $('#bubble-link').val() != '') {   
        e.preventDefault();
        
        ajaxRequest(
            $('#bubble-form').attr('action'),
            $('#bubble-form').serialize(),
            function(res) {
                result = $.parseJSON(res);
                if(result.status == true) {
                    var bubbleObj = null;
                    if(result.action == 'create') {
                        //create label
                        bubbleObj = $("<label>");
                        bubbleObj.addClass('bubble')
                            .html($('#bubble-label').val()+'<span><i class="si si-close"></i></span>')
                            .css('left', $('#bubble-posx').val()+'%')
                            .css('top', $('#bubble-posy').val()+'%')
                            .attr('id', 'bubble'+result.index)
                            .data('index', result.index)
                            .data('label', $('#bubble-label').val())
                            .data('link', result.link);
                        
                        $('#image-wrapper').append(bubbleObj);
                    } else {
                        bubbleObj = $('#bubble'+result.index);
                        bubbleObj.html($('#bubble-label').val())
                            .data('label', $('#bubble-label').val())
                            .data('link', result.link);       
                    }
                    
                    bubbleObj.css('margin-left', 0 - (bubbleObj.outerWidth() / 2))
                            .css('margin-top', 0 - (bubbleObj.outerHeight() / 2));
                }
                
                $('#bubble-modal').modal('hide');
                $('#bubble-label').val('');
                $('#bubble-link').val('');
            }
        );
    }
});