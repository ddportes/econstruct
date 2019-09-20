var stSitRen = {
    sE: true,
    sF: true,
    sJ: true,
    sC: true,
    sP: true,
    sL: true
}
$( document ).ready(function(){
    $('#formRenda').on('submit', function(e) {
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
                    $("#addRenda").append(alerta);
                    $('.toast').toast('show');
                }else{
                    $('#modal_econstruct_content').html(result);
                    $('#fonte_pagadora').val('');
                    $('#cpf_cnpj').val('');
                    $('#renda_bruta').val('');
                    $('#renda_liquida').val('');
                    //$('#fechaModal').click();

                    alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#3ac47d;border:0"><strong class="mr-auto" style="background-color:#3ac47d;color:white;font-weight: bold">Sucesso</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #16aaff;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#3ac47d;color:white;">Renda salva com sucesso</div></div>';
                    $("#addRenda").append(alerta);
                    $('.toast').toast('show');
                }
            },
            error: function(result){
                $('#loadingAjax').remove();
                $('.modal_econstruct').show();
                $('#modal_econstruct_content').html(result);
                alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#d92550;border:0"><strong class="mr-auto" style="background-color:#d92550;color:white;font-weight: bold">Erro</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #d92550;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#d92550;color:white;">Não foi possível salvar os dados. Tente Novamente.</div></div>';
                $("#addRenda").append(alerta);
                $('.toast').toast('show');
            }

        });

    });

    $('.form-delete-renda').on('submit', function(e) {
        e.preventDefault();
        $('#modal_econstruct_content').append("<div id='loadingAjax' style='display: block;position:fixed; top:0;left:0; z-index: 99999; width: 100%; height: 100%; opacity: .5; transition: opacity 0.15s linear;   background-color: #000;  box-sizing: border-box;'><img style='position: absolute;top:50%;left:50%' src='img/ajax-loader.gif'></div>");
        $.ajax({
            url: $(this).attr("action"),
            type: "post",
            data: $(this).serialize() ,
            success: function (result) {
                $('#loadingAjax').remove();
                $('#modal_econstruct_content').html(result);
                alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#3ac47d;border:0"><strong class="mr-auto" style="background-color:#3ac47d;color:white;font-weight: bold">Sucesso</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #16aaff;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#3ac47d;color:white;">Renda excluída com sucesso</div></div>';
                $("#addRenda").append(alerta);
                $('.toast').toast('show');
            },
        });
    });

    $("#erro_cpf_cnpj").hide();
    $('#cpf_cnpj').mask('00.000.000/0000-00');
    $('#cpf_cnpj').on('blur',function() {
        stSitRen['sF']=true;
        validaCnpj($('#cpf_cnpj'), $("#erro_cpf_cnpj"), $('#salvarRenda'),stSitRen);
    });
    $('#tipo').change(function(){
        $('#cpf_cnpj').val('');
        $("#erro_cpf_cnpj").hide();
        $('#cpf_cnpj').blur();
        $('#cpf_cnpj').focus();

        if($('#tipo option:selected').val() == 'F'){
            $('#cpf_cnpj').mask('000.000.000-00');
            $('#cpf_cnpj').on('blur',function()
            {
                stSitRen['sJ']=true;
                validaCpf($('#cpf_cnpj'),$("#erro_cpf_cnpj"),$('#salvarRenda'),stSitRen);

            });
        }else{
            $('#cpf_cnpj').mask('00.000.000/0000-00');
            $('#cpf_cnpj').on('blur',function()
            {
                stSitRen['sF']=true;
                validaCnpj($('#cpf_cnpj'),$("#erro_cpf_cnpj"),$('#salvarRenda'),stSitRen);

            });
        }
    });

    $("#renda_bruta").maskMoney({
        prefix: "R$ ",
        decimal: ",",
        thousands: "."
    });

    $("#renda_liquida").maskMoney({
        prefix: "R$ ",
        decimal: ",",
        thousands: "."
    });
});