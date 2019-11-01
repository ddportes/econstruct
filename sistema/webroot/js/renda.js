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
        $('#modal_econstruct_content').append("<div id='loadingAjax' style='display: block;position:fixed; top:0;left:0; z-index: 99999; width: 100%; height: 100%; opacity: .5; transition: opacity 0.15s linear;   background-color: #000;  box-sizing: border-box;'><img style='position: absolute;top:50%;left:50%' src='"+imgLoad+"'></div>");
        $.ajax({
            url: $(this).attr("action"),
            type: "post",
            data: $(this).serialize() ,
            success: function (result) {
                $('#loadingAjax').remove();
                if(result.indexOf("error-message")>-1){
                    $('.modal_econstruct').show();
                    $('#modal_econstruct_content').html(result);
                }else{
                    $('#modal_econstruct_content').html(result);
                    $('#fonte_pagadora').val('');
                    $('#cpf_cnpj').val('');
                    $('#renda_bruta').val('');
                    $('#renda_liquida').val('');
                    //$('#fechaModal').click();

                }
            },
            error: function(result){
                $('#loadingAjax').remove();
                $('.modal_econstruct').show();
                $('#modal_econstruct_content').html(result);
            }

        });

    });

    $('.form-delete-renda').on('submit', function(e) {
        e.preventDefault();
        $('#modal_econstruct_content').append("<div id='loadingAjax' style='display: block;position:fixed; top:0;left:0; z-index: 99999; width: 100%; height: 100%; opacity: .5; transition: opacity 0.15s linear;   background-color: #000;  box-sizing: border-box;'><img style='position: absolute;top:50%;left:50%' src='"+imgLoad+"'></div>");
        $.ajax({
            url: $(this).attr("action"),
            type: "post",
            data: $(this).serialize() ,
            success: function (result) {
                $('#loadingAjax').remove();
                $('#modal_econstruct_content').html(result);
            },
        });
    });

    if($("#tipo").val() == 'F'){
        $('#cpf_cnpj').mask('000.000.000-00');
        jQuery("label[for=cpf_cnpj]").text('CPF');
    }else {
        $('#cpf_cnpj').mask('00.000.000/0000-00');
        jQuery("label[for=cpf_cnpj]").text('CNPJ');
    }

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
            jQuery("label[for=cpf_cnpj]").text('CPF');
            $('#cpf_cnpj').mask('000.000.000-00');
            $('#cpf_cnpj').on('blur',function()
            {
                stSitRen['sJ']=true;
                validaCpf($('#cpf_cnpj'),$("#erro_cpf_cnpj"),$('#salvarRenda'),stSitRen);

            });
        }else{
            jQuery("label[for=cpf_cnpj]").text('CNPJ');
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