$(document).ready(function(){
    var stSitProj = {
        sE: true,
        sF: true,
        sJ: true,
        sC: true,
        sP: true,
        sL: true
    }



    $("#custo_estimado").maskMoney({
        prefix: "R$ ",
        decimal: ",",
        thousands: "."
    });

    $('#terreno').maskMoney({
        suffix: " m²",
        decimal: ",",
        thousands: "."
    });

    $('#area_construida_coberta').maskMoney({
        suffix: " m²",
        decimal: ",",
        thousands: "."
    });

    $('#area_construida_aberta').maskMoney({
        suffix: " m²",
        decimal: ",",
        thousands: "."
    });
    $('#frente').maskMoney({
        suffix: " m",
        decimal: ",",
        thousands: "."
    });
    $('#fundo').maskMoney({
        suffix: " m",
        decimal: ",",
        thousands: "."
    });


    lc = $("#logradouroProj");
    bc = $("#bairroProj");
    cc = $("#cidadeProj");
    ec = $("#estadoProj");
    nc = $("#numeroProj");
    //limpa_formulário_cep(lc,bc,cc,ec,nc);

    //Quando o campo cep perde o foco.
    $("#erro_cep_proj").hide();
    $('#cepProj').mask('00.000-000');

    $("#cepProj").blur(function() {
        validaCep($(this),lc,bc,cc,ec,nc,$("#erro_cep_proj"),$('#salvar'),stSitProj)
    });
})