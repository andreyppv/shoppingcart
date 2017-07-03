{
    //validation form
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
            'design-name': {required: true},
            'design-slide': {required: true},
        }    
    });

    $('.btn-save').click(function() {         
        prepare_json_image();
        prepare_json_phase();
    });
}
///////////////////////////////////////////////////////////////////////////
//image upload
///////////////////////////////////////////////////////////////////////////
{
    $('#file_upload').uploadify({
        'hideButton'    : true,
        'wmode'         : 'transparent',
        'buttonText'    : 'Select Files',
        'swf'      : base_url + 'vendor/uploadify/uploadify.swf',
        'uploader' : base_url + 'fileupload/design',
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
    $(document).on('click', '.btn-img-remove', function() {
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
}

////////////////////////////////////////////////////////
// Phase
////////////////////////////////////////////////////////
{
    $('#btn-add-phase').click(function() {
        row = $('#phase-row-template').clone();
        row.removeAttr('id');
        
        $('#phase-table tbody').append(row);   
    });
    
    $(document).on('click', '#phase-table .btn-phase-delete', function() {  
        row = $(this).parents('tr');
        
        swal({
            title: "Are you sure?",
            text: "You will not be able to restore this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes',
            cancelButtonText: "No!",
            //closeOnConfirm: false,
            //closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                if(row.hasClass('new'))
                {
                    row.remove();
                }
                else
                {
                    $('.phase-remove', row).val(1);
                    row.hide();
                }    
            }
        });
    });
    
    selectedRow = null;
    $(document).on('click', '#phase-table .phase-icon-image', function() {
        selectedRow = $(this).parents('tr');
        
        $('#phase-icon-modal').modal('show');
    });
    
    //modal
    $('.phase-icon-type').click(function() {
        id = $(this).attr('id');
        
        if(id == 'phase-icon-type-6') $('#upload-icon').show();
        else $('#upload-icon').hide();
    });
    
    $('#upload-icon').change(function() {
        ajaxUpload(
            this,
            base_url + 'fileupload/icon',
            function(res) {
                json = $.parseJSON(res);
                if(json.status)
                {
                    $('#phase-icon-type-6').attr('data-src', json.src);
                    $('#uload-icon-image').attr('src', json.path);
                }
            }
        );
    });
    
    $('#btn-select-icon').click(function() {
        selected = $('#phase-icon-modal input[name=phase-icon-type]:checked');
        $('.phase-icon-type', selectedRow).val(selected.val()); 
        $('.phase-icon-path', selectedRow).val(selected.data('src')); 
        $('.phase-icon-image', selectedRow).attr('src', base_url+selected.data('src')); 
        selectedRow.addClass('updated');
    });
}

////////////////////////////////////////////////////////
// Util Functions
////////////////////////////////////////////////////////
{
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
            item.link   = $('.img-link', $(this)).val();
            item.sort   = $('.img-sort', $(this)).val();
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
        $('#image_data').val(json);   
    }
    
    function prepare_json_phase()
    {
        //for image table
        phase_data = new Array();
        $('#phase-table tbody tr').each(function() {
            item = new Object();
            item.icon       = $('.phase-icon-type', $(this)).val();
            item.remove     = $('.phase-remove', $(this)).val();
            item.title      = $('.phase-title', $(this)).val();
            item.text       = $('.phase-content', $(this)).val();
            if($(this).hasClass('new'))
            {
                item.type = 'new';
                item.path  = $('.phase-icon-path', $(this)).val();
                item.id = '';
            }
            else if($(this).hasClass('updated'))
            {
                item.type = 'updated';
                item.path = (item.icon < 6) ? '' : $('.phase-icon-path', $(this)).val();
                item.id = $(this).data('index');
            }
            else //old
            {
                item.type = 'old';
                item.path = '';
                item.id = $(this).data('index');
            }
            
            phase_data.push(item);
        });
        
        json = JSON.stringify(phase_data);
        $('#phase_data').val(json);   
    }
}