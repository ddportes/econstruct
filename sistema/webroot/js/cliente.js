$(document).ready(function(){
    var stSitCli = {
        sE: true,
        sF: true,
        sJ: true,
        sC: true,
        sP: true,
        sL: true
    }

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
        validaCep($(this),lc,bc,cc,ec,nc,$("#erro_cep_proj"),$('#salvar'),stSitCli)
    });

    $("#erro_cpf").hide();
    $('#cpf').mask('000.000.000-00');
    $('#cpf').on('blur',function()
    {
        validaCpf($('#cpf'),$("#erro_cpf"),$('#salvar'),stSitCli);

    });

    $('.telefone').mask(SPMaskBehavior, spOptions);

    $("#erro_email").hide();

    $('.email').on('blur',function(){
        validaEmail($(this),$("#erro_email"),$('#salvar'),stSitCli)
    });
    $('.email').focus(function(){
        //$('#salvar').prop('disabled',false);
        statusSalvar($('#salvar'),1,1,stSitCli);
        $("#erro_email").hide();
    });

    $( function() {
        $( "#data_nascimento" ).datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: false,
            language: "pt-BR"
        });
    } );
})