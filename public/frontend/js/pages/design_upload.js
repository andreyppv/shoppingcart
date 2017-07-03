$('#order-design-form').change(function() {
    f = this;
    var n = f.querySelectorAll('.logo-sample-item input[type="checkbox"]'),
        l = f.querySelectorAll('.logo-sample-item input[type="checkbox"]:checked');
    for (var j = 0; j < n.length; j++)
    {
        if (l.length >= 3) {
            n[j].disabled = true;
            $('.form-footer-section .skip-link-block').css('display', 'none');
            for (var i = 0; i < l.length; i++)
                l[i].disabled = false;
        } else {
            n[j].disabled = false;
            $('.form-footer-section .skip-link-block').css('display', 'block');
        }
    }
});

$("#order-design-form").validate({
    errorPlacement: function() {},

    errorClass: "error-field",

    highlight: function(element, errorClass, validClass) {
        $(element.form).find("label[for=" + element.id + "]")
            .addClass("error-label");
        $(element).addClass(errorClass).removeClass(validClass);
        $('.items-brief-wrap .error-bottom-message').css('display', 'block');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element.form).find("label[for=" + element.id + "]")
            .removeClass("error-label");
        $(element).removeClass(errorClass);
        $('.items-brief-wrap .error-bottom-message').css('display', 'none');
    },

});

$('.back-link').click(function() {
    box = $(this).parents('.container');
    
    if(box.hasClass('logo-brief-section'))
    {
        $('#logo-brief-section').hide();
        $('#choose-logo-section').show();
    }
    else if(box.hasClass('card-brief-section'))
    {
        $('#card-brief-section').hide();
        $('#logo-brief-section').show();    
    }
    
});

$('#choose-logo-section .skip-link').click(function() {
    $('#choose-logo-section').hide();
    $('#logo-brief-section').show();
});

$('#choose-logo-section .next-step-but').click(function() {
    if($('.logo-sample-item input[type="checkbox"]:checked').length >= 3)
    {
        $('#choose-logo-section').hide();
        $('#logo-brief-section').show();
    }
});

$('#check-logo-brief-section').on('click', function () {
    $('#logo-brief-email,#logo-brief-business-name,#logo-brief-business-industry,#logo-brief-business-audience,#terms-agree-checkbox').valid();
    if ($('#logo-brief-email,#logo-brief-business-name,#logo-brief-business-industry,#logo-brief-business-audience,#terms-agree-checkbox').valid()){
        $('#logo-brief-section').hide();
        $('#card-brief-section').show();
    }
});

$('#check-card-brief-section').on('click', function (e) {
    $('#card-brief-email,#card-brief-business-name,#card-brief-info-area,#card-brief-card-type,#terms-agree-checkbox2').valid();
    if ($('#card-brief-email,#card-brief-business-name,#card-brief-info-area,#card-brief-card-type,#terms-agree-checkbox2').valid()){
        //$("#order-design-form").submit();    
        $('#btn-submit-form').trigger('click');
    }
});