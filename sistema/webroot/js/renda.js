$( document ).ready(function(){
    $('#formRenda').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
            type: "post",
            data: $(this).serialize() ,
            success: function (result) {
                if(result.indexOf("error-message")>-1){
                    $('.modal_econstruct').show();
                    $("#addRenda").html(result);
                    alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#d92550;border:0"><strong class="mr-auto" style="background-color:#d92550;color:white;font-weight: bold">Erro</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #d92550;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#d92550;color:white;">Não foi possível salvar os dados. Verifique as informações incorretas e tente novamente.</div></div>';
                    $("#addRenda").append(alerta);
                    $('.toast').toast('show');
                }else{
                    $("#addRenda").html(result);
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
                $('.modal_econstruct').show();
                $("#addConjuge").html(result);
                alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#d92550;border:0"><strong class="mr-auto" style="background-color:#d92550;color:white;font-weight: bold">Erro</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #d92550;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#d92550;color:white;">Não foi possível salvar os dados. Tente Novamente.</div></div>';
                $("#addRenda").append(alerta);
                $('.toast').toast('show');
            }

        });

    });

    $('.form-delete-renda').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
            type: "post",
            data: $(this).serialize() ,
            success: function (result) {
                $('#addRenda').html(result);
                alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#3ac47d;border:0"><strong class="mr-auto" style="background-color:#3ac47d;color:white;font-weight: bold">Sucesso</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #16aaff;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#3ac47d;color:white;">Renda excluída com sucesso</div></div>';
                $("#addRenda").append(alerta);
                $('.toast').toast('show');
            },
        });
    });

});


$(document).ready(function(){

    $("#erro_cpf_cnpj").hide();
    $('#cpf_cnpj').mask('00.000.000/0000-00');
    $('#cpf_cnpj').on('blur',function() {
        validaCnpj($('#cpf_cnpj'), $("#erro_cpf_cnpj"), $('#salvarRenda'));
    });
    $('#tipo').change(function(){
        $('#cpf_cnpj').val('');
        if($('#tipo option:selected').val() == 'F'){
            $('#cpf_cnpj').mask('000.000.000-00');
            $('#cpf_cnpj').on('blur',function()
            {
                validaCpf($('#cpf_cnpj'),$("#erro_cpf_cnpj"),$('#salvarRenda'));

            });
        }else{
            $('#cpf_cnpj').mask('00.000.000/0000-00');
            $('#cpf_cnpj').on('blur',function()
            {
                validaCnpj($('#cpf_cnpj'),$("#erro_cpf_cnpj"),$('#salvarRenda'));

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