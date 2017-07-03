/*function ajaxRequest(url, dataArray, afterFunc, beforeFunc)
{
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
        success: function(res){
            if(afterFunc)
            {
                afterFunc(res);
            }    
        }
    });  
}*/