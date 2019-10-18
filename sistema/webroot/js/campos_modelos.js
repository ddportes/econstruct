$.ajax({
    type: "GET",
    url: urlCampos,
    ProcessData: true,
    data: {hash: hash},
    success: function(result){
        if(result != '') {
            var res = jQuery.parseJSON(result);

            $.each(res,function(index,element){
                lista_campos_dinamicos.push([element,index,index]);
            });
        }
    },
    contentType: "application/json; charset=utf-8",
});

$.ajax({
    type: "GET",
    url: urlModelos,
    ProcessData: true,
    data: {hash: hash},
    success: function(result){
        if(result != '') {
            var res = jQuery.parseJSON(result);

            $.each(res,function(index,element){
                lista_modelos.push([element,index,index]);
            });
        }
    },
    contentType: "application/json; charset=utf-8",
});