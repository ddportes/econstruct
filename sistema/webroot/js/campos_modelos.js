//var lista_campos_dinamicos = [];
var lista_modelos = [];
var lista_cliente = [];
var lista_empresa = [];
var lista_representante = [];
var lista_projeto = [];
var lista_orcamento_contratos = [];

$.ajax({
    type: "GET",
    url: urlCampos,
    ProcessData: true,
    data: {hash: hash},
    success: function(result){
        if(result != '') {
            var res = jQuery.parseJSON(result);

            $.each(res,function(index,element){
                if(index != 'error'){
                    if(index.indexOf('cliente') > -1) {
                        lista_cliente.push([element, index, index]);
                    }else if(index.indexOf('empresa') > -1) {
                        lista_empresa.push([element, index, index]);
                    }else if(index.indexOf('representante') > -1) {
                        lista_representante.push([element, index, index]);
                    }else if(index.indexOf('projeto') > -1) {
                        lista_projeto.push([element, index, index]);
                    }else if(index.indexOf('orcamento') > -1 || index.indexOf('contrato') > -1) {
                        lista_orcamento_contratos.push([element, index, index]);
                    }

                }
            });
        }
    },
    contentType: "application/json; charset=utf-8",
});

/*
$.ajax({
    type: "GET",
    url: urlCampos,
    ProcessData: true,
    data: {hash: hash},
    success: function(result){
        if(result != '') {
            var res = jQuery.parseJSON(result);

            $.each(res,function(index,element){
                if(index != 'error') {
                    lista_campos_dinamicos.push([element, index, index]);
                }
            });
        }
    },
    contentType: "application/json; charset=utf-8",
});
*/


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