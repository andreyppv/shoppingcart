$('#file_upload').uploadify({
    'hideButton'    : true,
    'wmode'         : 'transparent',
    'buttonText'    : 'Select Files',
    'swf'      : base_url + 'vendor/uploadify/uploadify.swf',
    'uploader' : base_url + 'fileupload/slide',
    'auto'     : false,
    'onUploadSuccess' : function(file, data, response) {
        json = $.parseJSON(data);
        if(json.msg != '') return;
                                                    
        row = $('#row-template').clone();
        row.removeAttr('id');
        $('.place-holder', row).attr('data-src', json.src);
        $('.thumbnail', row).attr('src', json.path);
        $('.img-sort', row).val(last_sort_number()); 
        
        $('#image-table tbody').append(row);
    }
});

button = '<input type="button" class="btn btn-default" value="Upload Files" id="btn-start-upload"/>';
$(button).insertAfter('#file_upload');
$(document).on('click', '#btn-start-upload', function() {
    $("#file_upload").uploadify('upload', '*');
});  

$('#btn-save').click(function() {
    //for new data
    image_data = new Array();
    
    $('#image-table tbody tr').each(function() {
        item = new Object();
        item.label = $('.img-label', $(this)).val();
        item.sort = $('.img-sort', $(this)).val();
        item.main = $('.img-main', $(this)).is(':checked') ? '1' : '0';
        item.remove = $('.img-remove', $(this)).is(':checked') ? '1' : '0';
        if($(this).hasClass('new'))
        {
            item.type = 'new';
            item.src = $('.place-holder', $(this)).data('src');
            item.id = '';
        }
        else
        {
            item.type = 'old';
            item.src = '';
            item.id = $(this).data('index');
        }
        
        image_data.push(item);
    });
    
    json = JSON.stringify(image_data);
    //if(json == '') $(this).stopPropagation();
    $('#image_data').val(json);
    //alert($('#image_data').val());    
});

$('#aform').validate({
    errorClass: 'help-block text-left animated fadeInDown',
    errorElement: 'div',
    errorPlacement: function(error, e) {
        jQuery(e).parents('.form-group > div').append(error);
    },
    highlight: function(e) {
        jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
        jQuery(e).closest('.help-block').remove();
    },
    success: function(e) {
        jQuery(e).closest('.form-group').removeClass('has-error');
        jQuery(e).closest('.help-block').remove();
    },
    rules: {
        'title': {
            required: true,
        },
    }    
});

$(document).on('mouseenter', '.place-holder', function() {
    $(this).hide();
    $('img', $(this).parent()).show();
});

$(document).on('click', '.btn-remove', function() {
    $('.img-remove', $(this).parent()).prop( "checked", true );
    $(this).parents('tr').hide();
});

function last_sort_number()
{
    obj = $('#image-table tbody tr:last .img-sort');
    if(obj.length > 0) return parseInt(obj.val()) + 1;
    
    return 1;
}