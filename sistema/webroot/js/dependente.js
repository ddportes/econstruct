$( document ).ready(function(){
    $('#formDependente').on('submit', function(e) {
        e.preventDefault();
        $('#modal_econstruct_content').append("<div id='loadingAjax' style='display: block;position:fixed; top:0;left:0; z-index: 99999; width: 100%; height: 100%; opacity: .5; transition: opacity 0.15s linear;   background-color: #000;  box-sizing: border-box;'><img style='position: absolute;top:50%;left:50%' src='img/ajax-loader.gif'></div>");
        $.ajax({
            url: $(this).attr("action"),
            type: "post",
            data: $(this).serialize() ,
            success: function (result) {
                $('#loadingAjax').remove();
                if(result.indexOf("error-message")>-1){
                    $('.modal_econstruct').show();
                    $('#modal_econstruct_content').html(result);
                    alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#d92550;border:0"><strong class="mr-auto" style="background-color:#d92550;color:white;font-weight: bold">Erro</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #d92550;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#d92550;color:white;">Não foi possível salvar os dados. Verifique as informações incorretas e tente novamente.</div></div>';
                    $("#addDependente").append(alerta);
                    $('.toast').toast('show');
                }else{
                    $('#modal_econstruct_content').html(result);
                    $('#fonte_pagadora').val('');
                    $('#cpf_cnpj').val('');
                    $('#renda_bruta').val('');
                    $('#renda_liquida').val('');
                    //$('#fechaModal').click();

                    alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#3ac47d;border:0"><strong class="mr-auto" style="background-color:#3ac47d;color:white;font-weight: bold">Sucesso</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #16aaff;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#3ac47d;color:white;">Dependente cadastrado com sucesso</div></div>';
                    $("#addDependente").append(alerta);
                    $('.toast').toast('show');
                }
            },
            error: function(result){
                $('#loadingAjax').remove();
                $('.modal_econstruct').show();
                $('#modal_econstruct_content').html(result);
                alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#d92550;border:0"><strong class="mr-auto" style="background-color:#d92550;color:white;font-weight: bold">Erro</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #d92550;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#d92550;color:white;">Não foi possível salvar os dados. Tente Novamente.</div></div>';
                $("#addDependente").append(alerta);
                $('.toast').toast('show');
            }

        });

    });

    $('.form-delete-dependente').on('submit', function(e) {
        e.preventDefault();
        $('#modal_econstruct_content').append("<div id='loadingAjax' style='display: block;position:fixed; top:0;left:0; z-index: 99999; width: 100%; height: 100%; opacity: .5; transition: opacity 0.15s linear;   background-color: #000;  box-sizing: border-box;'><img style='position: absolute;top:50%;left:50%' src='img/ajax-loader.gif'></div>");
        $.ajax({
            url: $(this).attr("action"),
            type: "post",
            data: $(this).serialize() ,
            success: function (result) {
                $('#loadingAjax').remove();
                $('#modal_econstruct_content').html(result);
                alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#3ac47d;border:0"><strong class="mr-auto" style="background-color:#3ac47d;color:white;font-weight: bold">Sucesso</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #16aaff;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#3ac47d;color:white;">Dependente excluído com sucesso</div></div>';
                $("#addDependente").append(alerta);
                $('.toast').toast('show');
            },
        });
    });

});


$(document).ready(function(){
    $("#erro_cpf_dependente").hide();
    $('#cpfDepentente').mask('00.000.000/0000-00');
    $('#cpfDepentente').on('blur',function() {
        validaCpf($('#cpfDepentente'),$("#erro_cpf_dependente"),$('#salvarDependente'));
    });
});