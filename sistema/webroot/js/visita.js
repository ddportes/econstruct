$(document).ready(function(){
    $('#clienteId').on('change',function(){
        var id = $(this).val();
        $.ajax({
            type: "GET",
            url: urlVisit+id,
            ProcessData: true,
            data: {hash: hashVisit},
            success: function(result){

                if(result == ''){
                    $('#nomePessoa').val('');
                    $('#telefoneCliente').val('');
                    $('#emailCliente').val('');
                    $('#cpfPessoa').val('');
                    $('#sexoPessoa').val('');
                    $('#rgPessoa').val('');
                    $('#estadoCivilPessoa').val('');
                    $('#filhosPessoa').val('');
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
                    $('#observacaoProjeto').val('');
                    $('#pessoa_id').val('');
                    $('#projeto_id').val('');
                    $('#cliente_id').val('');

                    href = $('#conjugeCliente').attr('href');

                    if(href.indexOf("edit")>-1) {
                        href = href.replace('edit', 'add');
                        $('#conjugeCliente').attr('href',href);
                        $('#conjugeCliente').html('Cadastrar Cônjuge');
                    }

                    href2 = $('#linkRenda').html();
                    $('#rendaCliente').attr('href',href2);
                }else {

                    var cli = jQuery.parseJSON(result);

                    telefone = '';
                    cli.pessoa.contatos.forEach(function (el, i) {
                        if (el.tipo == 'telefone') {
                            if (telefone == '') {
                                telefone = el.valor;
                            } else {
                                telefone = telefone + '/' + el.valor;
                            }

                        }
                    });
                    email = '';
                    cli.pessoa.contatos.forEach(function (el, i) {
                        if (el.tipo == 'email') {
                            if (email == '') {
                                email = el.valor;
                            } else {
                                email = email + '/' + el.valor;
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
                    $('#descricaoProjeto').val(cli.projeto.descricao);
                    $('#detalhesProjeto').val(cli.projeto.detalhes);
                    $('#custoEstimadoProjeto').val(cli.projeto.custo_estimado);
                    $('#observacaoProjeto').val(cli.projeto.observacao);
                    $('#pessoa_id').val(cli.pessoa.id);
                    $('#projeto_id').val(cli.projeto.id);
                    $('#cliente_id').val(cli.id);

                    if($('#conjugeHiddenPessoa').val() != null && $('#conjugeHiddenPessoa').val() != undefined && $('#conjugeHiddenPessoa').val() != ''){
                        href = $('#conjugeCliente').attr('href');

                        if(href.indexOf("edit")==-1) {
                            href = href.replace('add', 'edit');
                            href = href + '/' + $('#conjugeHiddenPessoa').val();
                            $('#conjugeCliente').attr('href',href);
                            $('#conjugeCliente').html('Editar Cônjuge');
                        }
                    }

                    href2 = $('#rendaCliente').attr('href');
                    alert(href2);
                    href2 = href2 + '/' + $('#pessoa_id').val();

                    $('#rendaCliente').attr('href',href2);
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
        validaEmail($(this),$("#erro_email"),$('#salvar'))
    });
    $('.email').focus(function(){
        $('#salvar').prop('disabled',false);
        $("#erro_email").hide();
    });



    /*
    * Validação do CEP e autopreenchimento
    * */
    lc =  $("#logradouroCliente");
    bc = $("#bairroCliente");
    cc = $("#cidadeCliente");
    ec = $("#estadoCliente");
    nc = $("#numeroCliente");
    limpa_formulário_cep(lc,bc,cc,ec);

    //Quando o campo cep perde o foco.
    $("#erro_cep").hide();
    $('.cep').mask('00.000-000');

    $(".cep").blur(function() {
        validaCep($(this),lc,bc,cc,ec,nc,$("#erro_cep"))
    });


    /*
    * Valida CPF
    * */
    $("#erro_cpf").hide();
    $('#cpfPessoa').mask('000.000.000-00');
    $('#cpfPessoa').on('blur',function()
    {
        validaCpf($('#cpfPessoa'),$("#erro_cpf"),$('#salvar'));

    });


    $("#custoEstimadoProjeto").maskMoney({
        prefix: "R$ ",
        decimal: ",",
        thousands: "."
    });
});