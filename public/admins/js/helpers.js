(function($){
    $.unserialize = function(serializedString){
        var str = decodeURI(serializedString); 
        var pairs = str.split('&');
        var obj = {}, p, idx;
        for (var i=0, n=pairs.length; i < n; i++) {
            p = pairs[i].split('=');
            idx = p[0]; 
            if (obj[idx] === undefined) {
                obj[idx] = unescape(p[1]);
            }else{
                if (typeof obj[idx] == "string") {
                    obj[idx]=[obj[idx]];
                }
                obj[idx].push(unescape(p[1]));
            }
        }
        return obj;
    };
})(jQuery);

function ajaxRequest(url, dataArray, afterFunc, beforeFunc, beforeSendFunc)
{
    if(dataArray == null) dataArray = {};

    dataArray._token = $('#csrf-token').attr('content');    
    $.ajax({
        type: "POST",
        headers: { 'X-XSRF-TOKEN' : $('#csrf-token').attr('content') }, 
        url: url,
        data: dataArray,
        beforeSubmit: function(){
            if(beforeFunc)
            {
                beforeFunc();
            }            
        },
        beforeSend: function() {
            if(beforeSendFunc)
            {
                beforeSendFunc();
            }
        },
        success: function(res){
            if(afterFunc)
            {
                afterFunc(res);
            }    
        }
    });  
}

function ajaxRequest2(url, dataArray, afterFunc, beforeFunc)
{
    dataArray = $.unserialize(dataArray);
    dataArray._token = $('#csrf-token').attr('content');
    
    ajaxRequest(url, dataArray, afterFunc, beforeFunc); 
}

$('#currency-selector').change(function() {
    currency = $(this).val();
    
    ajaxRequest(
        base_url + "common/changeCurrency",
        {'currency': currency},
        function(res){
            document.location.href = current_url;
        }
    );   
});