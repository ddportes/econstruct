var stSitEmp = {
    sE: true,
    sF: true,
    sJ: true,
    sC: true,
    sP: true,
    sL: true
}

$(document).ready(function(){
    /*
        * Validação do email
        * */
    $("#erro_email").hide();
    $('.email').on('blur',function(){
        validaEmail($(this),$("#erro_email"),$('#salvarEmpresa'),stSitEmp)
    });
    $('.email').focus(function(){
        //$('#salvar').prop('disabled',false);
        statusSalvar($('#salvarEmpresa'),1,1,stSitEmp);
        $("#erro_email").hide();
    });

    /*
    * Validação do CEP e autopreenchimento
    * */
    lc = $("#logradouroEmpresa");
    bc = $("#bairroEmpresa");
    cc = $("#cidadeEmpresa");
    ec = $("#estadoEmpresa");
    nc = $("#numeroEmpresa");
    //limpa_formulário_cep(lc,bc,cc,ec,nc);

    //Quando o campo cep perde o foco.
    $("#erro_cep").hide();
    $('#cepEmpresa').mask('00.000-000');

    $("#cepEmpresa").blur(function() {
        validaCep($(this),lc,bc,cc,ec,nc,$("#erro_cep"),$('#salvarEmpresa'),stSitEmp)
    });

    /*
        * Valida CPF
        * */
    $("#erro_cpf_cnpj").hide();

    if($("#tipo").val() == 'F'){
        $('#cpf_cnpj').mask('000.000.000-00');
        jQuery("label[for=cpf_cnpj]").text('CPF');
    }else {
        $('#cpf_cnpj').mask('00.000.000/0000-00');
        jQuery("label[for=cpf_cnpj]").text('CNPJ');
    }

    $('#cpf_cnpj').on('blur',function() {
        stSitEmp['sF']=true;
        stSitEmp['sJ']=true;
        validaCnpj($('#cpf_cnpj'), $("#erro_cpf_cnpj"), $('#salvarEmpresa'),stSitEmp);
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
                stSitEmp['sJ']=true;
                validaCpf($('#cpf_cnpj'),$("#erro_cpf_cnpj"),$('#salvarEmpresa'),stSitEmp);

            });
        }else{
            jQuery("label[for=cpf_cnpj]").text('CNPJ');
            $('#cpf_cnpj').mask('00.000.000/0000-00');
            $('#cpf_cnpj').on('blur',function()
            {
                stSitEmp['sF']=true;
                validaCnpj($('#cpf_cnpj'),$("#erro_cpf_cnpj"),$('#salvarEmpresa'),stSitEmp);

            });
        }
    });


    /*
    * Valida CPF
    * */
    $("#erro_cpf_rep").hide();
    $('#cpfRep').mask('000.000.000-00');
    $('#cpfRep').on('blur',function()
    {
        validaCpf($('#cpfRep'),$("#erro_cpf_rep"),$('#salvarEmpresa'),stSitEmp);

    });


    $( function() {
        $( "#dataNascimentoRep" ).datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: false,
            language: "pt-BR"
        });
    } );

    $('.telefone').mask(SPMaskBehavior, spOptions);
});