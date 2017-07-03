login_attempts = 0;

$('#btn-login').click(function(e) {
    e.preventDefault();
    
    button_obj = $(this);
    email_obj = $('#login-email');
    pass_obj = $('#login-password');
    
    if(email_obj.val() == '')
    {
        email_obj.focus();
        return;
    }
    else if(pass_obj.val() == '')
    {
        pass_obj.focus();
        return;
    }
    else
    {
        login_attempts++;
        
        ajaxRequest(
            ajaxLoginUrl,
            {
                'email': email_obj.val(),
                'password': pass_obj.val()
            },
            function(res){
                result = $.parseJSON(res);
                if(result.status == true)
                {
                    //$('#aform-modal').submit();
                    //document.location.href = base_url;
                    document.location.href = current_url;
                }
                else
                {
                    email_obj.val('');
                    pass_obj.val('');
                    
                    if(login_attempts <= 5)
                    {
                        alertify.error(result.msg);
                    }            
                    else
                    {
                        alertify.error('Reached limited attempts. Try again after 5 minutes.');
                        
                        button_obj.attr('disabled', true);
                        setTimeout(function(){
                            button_obj.attr('disabled', false);
                        }, 300000);
                    }
                    
                    email_obj.focus();
                }
            }
        );      
    }
});