$( "#aform" ).validate({
    rules: {
        email: {
            email: true,
            remote: {
                url: authRegisterPostUrl,
                type: 'post',
                data: {
                    '_token': $('#csrf-token').attr('content')
                }
            }
        },
        email_confirm: {
            equalTo: "#email",
        },
        password: {
            minlength: 4,
        },
        password_confirm: {
            equalTo: "#password",
            required: true,
        },
        first_name: {
            minlength: 2,
        },
        last_name: {
            minlength: 2,
        }
    },
    messages: {
        email: {
            remote: "Email already in use!"
        },
        email_confirm:{
            equalTo: "Please enter the same email again."
        },
        password_confirm:{
            equalTo: "Please enter the same password again.",
        }
    }
});