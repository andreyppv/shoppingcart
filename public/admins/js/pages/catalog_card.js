//validation form
$('#aform').submit(function() {
    result = true;
    
    //validation discount
    $('#discount-table input.discount-set, #discount-table input.discount-percent').each(function() {
        if($.trim($(this).val()) == '' || isNaN($(this).val())) 
        {
            $(window).scrollTop($('#discount-message-box').offset().top);
            
            $('#discount-message-box').html('Please input valid discount sets and percent.');
            result = false;
        }
    });
    
    if(result == false) return false;
    
    $('#discount-message-box').html('');
    
    //check if there is at least one feature   
    if($('#feature-tables .feature-template-box').length == 0)
    {
        $(window).scrollTop($('#feature-message-box').offset().top);
        
        $('#feature-message-box').html('Please add at least one feature for product.');    
        
        return false;
    }
    else
    {
        $('#feature-message-box').html('');    
    }
    
    //check if there is at least one option for each features
    $('#feature-tables .feature-template-box').each(function() {
        box = $(this);
        msgbox = $('.message-box', box);
        
        if($('input.option-name', box).length == 0)
        {
            $(window).scrollTop(msgbox.offset().top);
            msgbox.html('Please add at least one option for this feature.');            
            result = false;
        }
        else
        {
            $('input.option-name', box).each(function() {
                if($.trim($(this).val()) == '')
                {
                    $(window).scrollTop(msgbox.offset().top);
                    msgbox.html('Please input valid option names.');            
                    result = false;
                }
            });    
        }        
    });
    
    if(result == false) return false;
    
    $('#feature-tables .message-box').html('');
    
    return true;
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
        'card_name': {required: true},
        'category': {required: true},
        'weight': {number: true},
        'promotion_percent': {number: true},
        /*'discount-set[]': {required: true, number:true},
        'discount-percent[]': {required: true, number:true},
        'option-name[]': {required: true},
        'option-price[]': {required: true, number:true},*/
    }    
});

$('.btn-save').click(function() {         
    prepare_json_image();
    prepare_json_discount();
    prepare_json_feature();
});

///////////////////////////////////////////////////////////////////////////
//image upload
///////////////////////////////////////////////////////////////////////////
$('#file_upload').uploadify({
    'hideButton'    : true,
    'wmode'         : 'transparent',
    'buttonText'    : 'Select Files',
    'swf'      : base_url + 'vendor/uploadify/uploadify.swf',
    'uploader' : base_url + 'fileupload/card',
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

// Add image place holder click hanlder
$(document).on('mouseenter', '.place-holder', function() {
    $(this).hide();
    $('img', $(this).parent()).show();
})
// Add image remove click hanlder
$(document).on('click', '.btn-remove', function() {
    row = $(this).parents('tr');
    if(row.hasClass('old'))
    {
        $('.img-remove', row).prop( "checked", true );
        row.hide();
    }
    else
    {
        row.remove();
    }
});

////////////////////////////////////////////////////////
// discount part
////////////////////////////////////////////////////////
$('#btn-add-discount').click(function() {
    row = $('#row-template-discount').clone();
    row.removeAttr('id');
    
    $('#discount-table tbody').append(row);    
});

// Remove button click handler
$(document).on('click', '.btn-discount-remove', function() {
    row = $(this).parents('tr');
    if(row.hasClass('old'))
    {
        $('.discount-remove', $(this).parent()).prop( "checked", true );
        $(this).parents('tr').hide();
    }
    else
    {
        row.remove();
    }
});

////////////////////////////////////////////////////////
// feature part
////////////////////////////////////////////////////////
$('#btn-add-feature').click(function() {
    if($('#feature-name').val() == '') 
    {
        $('#feature-name').focus();
        return;
    }
    
    table = $('#feature-template-box').clone();
    table.removeAttr('id');
    $('.feature-name', table).val($('#feature-name').val());
    $('.feature-type', table).val($('#feature-type').val());
    $('.feature-type-text', table).html($('#feature-type option:selected').text());
    
    if($('#feature-type').val() == 'checkbox') 
    {
        $('.feature-side-select', table).addClass('feature-side').show();
    }
    else 
    {
        $('.feature-side-hidden', table).addClass('feature-side');        
    }
    
    $('#feature-tables').append(table); 
    $('#feature-name').val('');

    //scroll down to created element
    $('html, body').animate({
        scrollTop: table.offset().top
    }, 1000);
});

$(document).on('click', '.btn-remove-feature', function() {
    table = $(this).parents('.feature-template-box');
    if(table.hasClass('old'))
    {
        $('.feature-remove', table).prop( "checked", true );
        table.hide();
    }
    else
    {
        table.remove();
    }
});

$(document).on('click', '.btn-add-option', function() {
    row = $('#row-template-option').clone();
    row.removeAttr('id');
    
    table = $(this).parents('table');
    table.append(row);    
});

$(document).on('click', '.btn-remove-option', function() {
    row = $(this).parents('tr');
    if(row.hasClass('old'))
    {
        $('.option-remove', $(this).parent()).prop( "checked", true );
        $(this).parents('tr').hide();
    }
    else
    {
        row.remove();
    }
});

////////////////////////////////////////////////////////
// Util Functions
////////////////////////////////////////////////////////
function last_sort_number()
{
    obj = $('#image-table tbody tr:last .img-sort');
    if(obj.length > 0) return parseInt(obj.val()) + 1;
    
    return 1;
} 

function prepare_json_image() 
{
    //for image table
    image_data = new Array();
    $('#image-table tbody tr').each(function() {
        item = new Object();
        item.label = $('.img-label', $(this)).val();
        item.sort = $('.img-sort', $(this)).val();
        item.remove = $('.img-remove', $(this)).is(':checked') ? '1' : '0';
        item.main = $('.img-main', $(this)).is(':checked') ? '1' : '0';
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
    $('#image_data').val(json);   
}

function prepare_json_discount() 
{    
    //for discount table
    discount_data = new Array();
    $('#discount-table tbody tr').each(function() {
        item = new Object();
        item.set = $('.discount-set', $(this)).val();
        item.percent = $('.discount-percent', $(this)).val();
        item.remove = $('.discount-remove', $(this)).is(':checked') ? '1' : '0';
        if($(this).hasClass('new'))
        {
            item.type = 'new';
            item.id = '';
        }
        else
        {
            item.type = 'old';
            item.id = $(this).data('index');
        }
        
        discount_data.push(item);
    });
    
    json = JSON.stringify(discount_data);
    json = JSON.stringify(discount_data);
    $('#discount_data').val(json);
}

function prepare_json_feature() 
{
    features = new Array()
    $('#feature-tables .feature-template-box').each(function() {
        box = $(this);
        
        options = new Array();
        $('.table-options tbody tr', box).each(function() {
            row = $(this);
            
            item = new Object();
            item.name   = $('.option-name', row).val();
            item.price  = $('.option-price', row).val();
            item.sort   = $('.option-sort', row).val();
            item.priceType = $('.option-price-type', row).val();
            item.remove = $('.option-remove', row).is(':checked') ? '1' : '0';    
            
            if(row.hasClass('new'))
            {
                item.type = 'new';
                item.id = '';
            }
            else
            {
                item.type = 'old';
                item.id = row.data('index');
            }
            
            options.push(item);
        });
        
        feature_item = new Object();
        feature_item.options = options;
        feature_item.name = $('.feature-name', box).val();
        feature_item.mode = $('.feature-type', box).val();
        feature_item.link = $('.feature-link', box).val();
        feature_item.sort = $('.feature-sort', box).val();
        feature_item.print= $('.feature-print', box).val();
        feature_item.side = $('.feature-side', box).val();
        feature_item.required = $('.feature-required', box).val();
        feature_item.remove = $('.feature-remove', box).is(':checked') ? '1' : '0';
        if(box.hasClass('new'))
        {
            feature_item.type = 'new';
            feature_item.id = '';
        }
        else
        {
            feature_item.type = 'old';
            feature_item.id = box.data('index');
        }
        
        features.push(feature_item);
    });
    
    json = JSON.stringify(features);
    $('#feature_data').val(json);
}