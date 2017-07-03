//tag template

var tags = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    limit: 10,
    prefetch: {
        /*url: 'http://new.rockdesign.com/test1.text',*/
        url: base_url + 'common/getTags',
        filter: function(list) {
            return $.map(list, function(tag) {
                return {
                    name: tag
                };
            });
        }
    }
});
tags.initialize();
       
var tagApi = $("#template_tag").tagsManager({
    prefilled: rowTags
});
$("#template_tag").typeahead(null, {
    name: 'tags',
    displayKey: 'name',
    source: tags.ttAdapter()
}).on('typeahead:selected', function(e, d) {
    tagApi.tagsManager("pushTag", d.name);
});
//end tag tamplte

//validation form
$('#aform').submit(function() {
    //check if card is selected
    card = $('#card_id');
    box = card.parents('.form-group');
    if(card.val() == '')
    {
        box.addClass('has-error');
        $('.help-block', box).html('Please select one of card.');
        return false;
    }
    else if($('input.checkbox.product-option:checked, select.product-option option:selected').length == 0)
    {
        box.addClass('has-error');
        $('.help-block', box).html('Please select options.');
        return false;
    }
    else
    {
        box.removeClass('has-error');
        $('.help-block', box).html('');    
    }
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
        'card_id' : {required: true},
        'template_name': {required: true},
        'promotion_percent': {number: true},
    }    
});

$('.btn-save').click(function() {         
    prepare_json_image();
});

///////////////////////////////////////////////////////////////////////////
//image upload
///////////////////////////////////////////////////////////////////////////
$('#file_upload').uploadify({
    'hideButton'    : true,
    'wmode'         : 'transparent',
    'buttonText'    : 'Select Files',
    'swf'      : base_url + 'vendor/uploadify/uploadify.swf',
    'uploader' : base_url + 'fileupload/template',
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
// Change Product
////////////////////////////////////////////////////////
$(document).on('click', '.btn-select-product', function() {
    card_id = $(this).val();     
    
    ajaxRequest(
        ajaxChangeProductURL,
        {
            'card_id' : card_id,
            'template_id' : $('#template_id').val(),
        },
        function(res){                     
            $('#card-option-box').html(res);
            $('#card-option-box').fadeTo('fast', 1);
            
            $('#is_product_changed').val(1);
            $('#is_option_changed').val(1);    
        },
        null,
        function() 
        {
            $("#product-list-form").modal('hide');
            $('#card-option-box').fadeTo('fast', 0.5);
        }
    ); 
});

$(document).on('click', 'input.checkbox.product-option', function() {
    $('#is_option_changed').val(1);    
});

$(document).on('click', 'select.product-option', function() {
    $('#is_option_changed').val(1);    
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
        item.label  = $('.img-label', $(this)).val();
        item.sort   = $('.img-sort', $(this)).val();
        item.remove = $('.img-remove', $(this)).is(':checked') ? '1' : '0';
        item.main   = $('.img-main', $(this)).is(':checked') ? '1' : '0';
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