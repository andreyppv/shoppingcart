//upload modal
$("#uploadTriger, #uploadTriger2, #uploadTriger3").click(function() {
    $("#loginModal").removeClass("makeVisible activeModal fadeModal");
    
    target = $(this).data('target');
    target = target ? target : 0;
    $('#target').val(target);
    
    $(".body").addClass("pageLock modalVisible");
    $("#uploadModal").addClass("makeVisible activeModal fadeModal");
});

$('#device-choose-wrap .upload-tab').click(function() {
    $('#device-choose-wrap .upload-tab')
        .not(this)
        .removeClass("upload-tab-active");
    $(this).addClass("upload-tab-active");        
    
    targetId = $(this).data('target');
    $('.drop-block-box').hide();
    $(targetId).show();
});

$('#btn-close-upload').click(function() {
    $(".uploadModal").removeClass("makeVisible activeModal fadeModal");
});

Dropzone.autoDiscover = false;
$("#my-dropzone").dropzone({ 
    maxFilesize: 75,
    acceptedFiles: '.eps, .ai, .pdf, .jpg, .jpeg, .bmp, .png, .svg, .xls, .psd, .csv',
    sending: function(file, xhr, formData) {
        formData.append("_target", $('#target').val());
    }
});
//end upload modal