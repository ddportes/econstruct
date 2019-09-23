$(document).ready(function(){
    var projetos;

    $('#checkNovoProjeto').on('change',function(){

       if($('#checkNovoProjeto').is(":checked") === true) {
           if ($('#projeto_id').val() == '' || $('#projeto_id').val() == null || $('#projeto_id').val() == undefined) {
               //$('#salvar').prop('disabled', false);
               statusSalvar($('#salvar'),5,1,stSit);
           } else {
               //$('#salvar').prop('disabled', true);
               statusSalvar($('#salvar'),5,2,stSit);
           }
       }else{
           //$('#salvar').prop('disabled', true);
           statusSalvar($('#salvar'),5,2,stSit);
       }
    });

    $('#projetoId').on('change',function() {
        var id = $(this).val();

        if(id != '') {
            if (projetos != '' && projetos != null && projetos != undefined) {
                projetos.forEach(function (el, i) {
                    proj = el;
                });

                $('#projeto_id').val(proj.id);
                $('#descricaoProjeto').val(proj.descricao);
                $('#detalhesProjeto').val(proj.detalhes);
                $('#custoEstimadoProjeto').val(proj.custo_estimado);
                $('#terrenoProjeto').val(proj.terreno);
                $('#areaCobertaProjeto').val(proj.area_construida_aberta);
                $('#areaAbertaProjeto').val(proj.area_construida_coberta);
                $('#observacaoProjeto').val(proj.observacao);
                //$('#salvar').prop('disabled',false);
                statusSalvar($('#salvar'),5,1,stSit);
                $('#checkNovoProjeto').prop('disabled',true);
            }else{
                $('#projeto_id').val('');
                $('#descricaoProjeto').val('');
                $('#detalhesProjeto').val('');
                $('#custoEstimadoProjeto').val('');
                $('#terrenoProjeto').val('');
                $('#areaCobertaProjeto').val('');
                $('#areaAbertaProjeto').val('');
                $('#observacaoProjeto').val('');
                //$('#salvar').prop('disabled',true);
                statusSalvar($('#salvar'),5,2,stSit);
                $('#checkNovoProjeto').prop('disabled',false);
            }
        }else{
            $('#projeto_id').val('');
            $('#descricaoProjeto').val('');
            $('#detalhesProjeto').val('');
            $('#custoEstimadoProjeto').val('');
            $('#terrenoProjeto').val('');
            $('#areaCobertaProjeto').val('');
            $('#areaAbertaProjeto').val('');
            $('#observacaoProjeto').val('');
            //$('#salvar').prop('disabled',true);
            statusSalvar($('#salvar'),5,2,stSit);
            $('#checkNovoProjeto').prop('disabled',false);
        }
    });


    $('#clienteId').on('change',function(){
        $('body').append("<div id='loadingAjax' style='display: block;position:fixed; top:0;left:0; z-index: 99999; width: 100%; height: 100%; opacity: .5; transition: opacity 0.15s linear;   background-color: #000;  box-sizing: border-box;'><img style='position: absolute;top:50%;left:50%' src='img/ajax-loader.gif'></div>");
        $('#checkNovoProjeto').prop('checked',false);
        statusSalvar($('#salvar'),4,2,stSit);
        if($('#clienteId').val() == ''){
            $('#tab-c1-1').attr('style','display:none');
            $('#tab-c1-2').attr('style','display:none');
            //$('#salvar').prop('disabled',true);
            statusSalvar($('#salvar'),4,2,stSit);
        }

        var id = $(this).val();

        $.ajax({
            type: "GET",
            url: urlVisit+id,
            ProcessData: true,
            data: {hash: hashVisit},
            success: function(result){
                $('#loadingAjax').remove();
                if(result == ''){
                    $('#nomePessoa').val('');
                    $('#telefoneCliente').val('');
                    $('#emailCliente').val('');
                    $('#cpfPessoa').val('');
                    $('#sexoPessoa').val('');
                    $('#rgPessoa').val('');
                    $('#estadoCivilPessoa').val('');
                    $('#filhosPessoa').val('');
                    $('#dataNascimentoPessoa').val('');
                    $('#conjugeHiddenPessoa').val('');
                    $('#cepCliente').val('');
                    $('#logradouroCliente').val('');
                    $('#numeroCliente').val('');
                    $('#bairroCliente').val('');
                    $('#complementoCliente').val('');
                    $('#cidadeCliente').val('');
                    $('#estadoCliente').val('');
                    $('#nomeSocialPessoa').val('');
                    $('#observacaoCliente').val('');
                    $('#descricaoProjeto').val('');
                    $('#detalhesProjeto').val('');
                    $('#custoEstimadoProjeto').val('');
                    $('#terrenoProjeto').val('');
                    $('#areaCobertaProjeto').val('');
                    $('#areaAbertaProjeto').val('');
                    $('#observacaoProjeto').val('');
                    $('#pessoa_id').val('');
                    $('#projeto_id').val('');
                    $('#cliente_id').val('');
                    $('#projetoId').empty();

                    href = $('#conjugeCliente').attr('href');

                    if(href.indexOf("edit")>-1) {
                        href = href.replace('editar', 'novo');
                        $('#conjugeCliente').attr('href',href);
                        $('#conjugeCliente').html('Cadastrar Cônjuge');
                    }

                    href2 = $('#linkRenda').html();
                    $('#rendaCliente').attr('href',href2);

                    href3 = $('#linkConjuge').html();
                    $('#conjugeCliente').attr('href',href3);

                    href4 = $('#linkDependente').html();
                    $('#dependenteCliente').attr('href',href4);
                    statusSalvar($('#salvar'),4,2,stSit);
                }else {

                    var cli = jQuery.parseJSON(result);

                    telefone = '';
                    cli.pessoa.contatos.forEach(function (el, i) {
                        if (el.tipo == 'telefone') {
                            if (telefone == '') {
                                telefone = el.valor;
                            }

                        }
                    });
                    email = '';
                    cli.pessoa.contatos.forEach(function (el, i) {
                        if (el.tipo == 'email') {
                            if (email == '') {
                                email = el.valor;
                            }

                        }
                    });
                    endereco = '';
                    cli.pessoa.enderecos.forEach(function (el, i) {
                        endereco = el;
                    });

                    $('#nomePessoa').val(cli.pessoa.nome);
                    $('#telefoneCliente').val(telefone);
                    $('#emailCliente').val(email);
                    $('#cpfPessoa').val(cli.pessoa.cpf_cnpj);
                    $('#sexoPessoa').val(cli.pessoa.sexo);
                    $('#rgPessoa').val(cli.pessoa.rg);
                    $('#estadoCivilPessoa').val(cli.pessoa.estado_civil);

                    dt = cli.pessoa.data_nascimento;
                    if(dt != null && dt != undefined) {
                        dt = dt.split('-');
                        day = dt[2];
                        day = day.split('T');
                        dt_r = day[0] + '/' + dt[1] + '/' + dt[0];
                        $('#dataNascimentoPessoa').val(dt_r);
                        $('#dataNascimentoPessoa').datepicker('update', dt_r);
                    }else{
                        $('#dataNascimentoPessoa').val('');
                        $('#dataNascimentoPessoa').datepicker('update', '');
                    }

                    $('#filhosPessoa').val(cli.pessoa.filhos);
                    $('#conjugeHiddenPessoa').val(cli.pessoa.conjuge_id);
                    $('#cepCliente').val(endereco.cep);
                    $('#logradouroCliente').val(endereco.logradouro);
                    $('#numeroCliente').val(endereco.numero);
                    $('#bairroCliente').val(endereco.bairro);
                    $('#complementoCliente').val(endereco.complemento);
                    $('#cidadeCliente').val(endereco.cidade);
                    $('#estadoCliente').val(endereco.estado);
                    $('#nomeSocialPessoa').val(cli.pessoa.nome_social);
                    $('#observacaoCliente').val(cli.pessoa.observacao);

                    projetos = cli.projetos;
                    $('#projetoId').empty();
                    $('#projetoId').append('<option id="" ></option>');
                    cli.projetos.forEach(function(item){
                        $('#projetoId').append('<option id="'+ item.id +'" >' + item.descricao + '</option>');
                    });


                    $('#pessoa_id').val(cli.pessoa.id);
                    $('#cliente_id').val(cli.id);

                    if($('#conjugeHiddenPessoa').val() != null && $('#conjugeHiddenPessoa').val() != undefined && $('#conjugeHiddenPessoa').val() != ''){
                        href = $('#conjugeCliente').attr('href');

                        if(href.indexOf("edit")==-1) {
                            href = href.replace('novo', 'editar');
                            href = href + '/' + $('#conjugeHiddenPessoa').val();
                            $('#conjugeCliente').attr('href',href);
                            $('#conjugeCliente').html('Editar Cônjuge');
                        }
                    }

                    href2 = $('#linkRenda').html();
                    href2 = href2 + '/' + $('#pessoa_id').val();
                    $('#rendaCliente').attr('href',href2);

                    href3 = $('#linkDependente').html();
                    href3 = href3 + '/' + $('#pessoa_id').val();
                    $('#dependenteCliente').attr('href',href3);


                    $('#tab-c1-1').attr('style','display:block');
                    $('#tab-c1-2').attr('style','display:block');
                    statusSalvar($('#salvar'),4,1,stSit);
                }
            },
            contentType: "application/json; charset=utf-8",
        });
    });


    /*
    * Validação do email
    * */
    $("#erro_email").hide();
    $('.email').on('blur',function(){
        validaEmail($(this),$("#erro_email"),$('#salvar'),stSit)
    });
    $('.email').focus(function(){
        //$('#salvar').prop('disabled',false);
        statusSalvar($('#salvar'),1,1,stSit);
        $("#erro_email").hide();
    });

    /*
    * Validação do CEP e autopreenchimento
    * */
    lc = $("#logradouroCliente");
    bc = $("#bairroCliente");
    cc = $("#cidadeCliente");
    ec = $("#estadoCliente");
    nc = $("#numeroCliente");
    limpa_formulário_cep(lc,bc,cc,ec,nc);

    //Quando o campo cep perde o foco.
    $("#erro_cep").hide();
    $('.cep').mask('00.000-000');

    $(".cep").blur(function() {
        validaCep($(this),lc,bc,cc,ec,nc,$("#erro_cep"),$('#salvar'),stSit)
    });


    /*
    * Valida CPF
    * */
    $("#erro_cpf").hide();
    $('#cpfPessoa').mask('000.000.000-00');
    $('#cpfPessoa').on('blur',function()
    {
        validaCpf($('#cpfPessoa'),$("#erro_cpf"),$('#salvar'),stSit);

    });

    $("#custoEstimadoProjeto").maskMoney({
        prefix: "R$ ",
        decimal: ",",
        thousands: "."
    });

    $('#terrenoProjeto').maskMoney({
        suffix: " m²",
        decimal: ",",
        thousands: "."
    });

    $('#areaCobertaProjeto').maskMoney({
        suffix: " m²",
        decimal: ",",
        thousands: "."
    });

    $('#areaAbertaProjeto').maskMoney({
        suffix: " m²",
        decimal: ",",
        thousands: "."
    });

    $( function() {
        $( "#dataOcorrencia" ).datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: false,
            language: "pt-BR"
        });
    } );
    $( function() {
        $( "#dataPendenciaOcorrencia" ).datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: false,
            language: "pt-BR"
        });
    } );
    $( function() {
        $( "#dataNascimentoPessoa" ).datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: false,
            language: "pt-BR"
        });
    } );
    $('.telefone').mask(SPMaskBehavior, spOptions);
});