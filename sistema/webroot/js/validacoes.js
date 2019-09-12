/*
* validações de email
* */
function validaEmail(campo,erro,salvar){
    //atribuindo o valor do campo
    var sEmail	= campo.val();

    // filtros
    var emailFilter=/^.+@.+\..{2,}$/;
    var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
    // condição
    if(!(emailFilter.test(sEmail))||sEmail.match(illegalChars)){
        if(sEmail.length == 0){
            salvar.prop('disabled',false);
            erro.hide();
        }else {
            erro.show().removeClass("alert alert-success alert-dismissible fade show").addClass("alert alert-danger alert-dismissible fade show")
                .text('Por favor, informe um email válido.');
            erro.append('<button onclick="$(\'#'+erro.attr('id')+'\').hide();" type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>');
            salvar.prop('disabled',true);
        }
    }else{
        erro.show().removeClass("alert alert-danger alert-dismissible fade show").addClass("alert alert-success alert-dismissible fade show")
            .text('Email informado está correto!');
        erro.append('<button onclick="$(\'#'+erro.attr('id')+'\').hide();" type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>');
        salvar.prop('disabled',false);
    }
}


/*
    * Validação do CEP e autopreenchimento
    * */
function limpa_formulário_cep(l,b,c,e) {
    // Limpa valores do formulário de cep.
    l.val("");
    b.val("");
    c.val("");
    e.val("");
}

function validaCep(campo,l,b,c,e,n,erro) {

    //Nova variável "cep" somente com dígitos.
    var cep = campo.val().replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            l.val("...");
            b.val("...");
            c.val("...");
            e.val("...");

            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                if (!("erro" in dados)) {
                    erro.hide();
                    //Atualiza os campos com os valores da consulta.
                    l.val(dados.logradouro);
                    b.val(dados.bairro);
                    c.val(dados.localidade);
                    e.val(dados.uf);

                    n.focus();
                } //end if.
                else {
                    //CEP pesquisado não foi encontrado.
                    limpa_formulário_cep();
                    erro.show().removeClass("alert alert-success alert-dismissible fade show").addClass("alert alert-danger alert-dismissible fade show")
                        .text('CEP não encontrado.');
                    erro.append('<button onclick="$(\'#'+erro.attr('id')+'\').hide();" type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>');
                }
            });
        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            erro.show().removeClass("alert alert-success alert-dismissible fade show").addClass("alert alert-danger alert-dismissible fade show")
                .text("Formato de CEP inválido.");
            erro.append('<button onclick="$(\'#'+erro.attr('id')+'\').hide();" type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>');
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
        erro.hide();
    }
}

/*
    * Validação do telefone
    * */
var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

function validaCpf(campo,msg,salvar)
{
    var cpf = campo.val().replace(/[^0-9]/g, '').toString();

    if( cpf.length == 11 )
    {
        var v = [];

        //Calcula o primeiro dígito de verificação.
        v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
        v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
        v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
        v[0] = v[0] % 11;
        v[0] = v[0] % 10;

        //Calcula o segundo dígito de verificação.
        v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
        v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
        v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
        v[1] = v[1] % 11;
        v[1] = v[1] % 10;

        //Retorna Verdadeiro se os dígitos de verificação são os esperados.
        if ( (v[0] != cpf[9]) || (v[1] != cpf[10]) )
        {
           msg.show().removeClass("alert alert-success alert-dismissible fade show").addClass("alert alert-danger alert-dismissible fade show")
                .text('CPF Inválido: '+cpf);
            msg.append('<button onclick=$(\'#'+msg.attr('id')+'\').hide();" type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>');
            salvar.prop('disabled',true);
        }else{
            msg.show().removeClass("alert alert-danger alert-dismissible fade show").addClass("alert alert-success alert-dismissible fade show")
                .text('CPF Válido');
            msg.append('<button onclick="$(\'#'+msg.attr('id')+'\').hide();" type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>');
            salvar.prop('disabled',false);
        }
    }
    else
    {
        if(cpf.length != 0) {
            msg.show().removeClass("alert alert-success alert-dismissible fade show").addClass("alert alert-danger alert-dismissible fade show")
                .text('CPF Inválido: ' + cpf);
            msg.append('<button onclick="$(\'#'+msg.attr('id')+'\').hide();" type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>');

            salvar.prop('disabled', true);
        }else{
            salvar.prop('disabled',false);
            msg.hide();
        }
    }
}

function validaCnpj(campo,msg,salvar) {
    if(campo.val() == '' || campo.val() == null || campo.val() == undefined) {
        salvar.prop('disabled',false);
        msg.hide();
        return false;
    }else {
        cnpj = campo.val().replace(/[^\d]+/g, '');

        if (cnpj.length != 14) {
            if (cnpj.length != 0) {
                msg.show().removeClass("alert alert-success alert-dismissible fade show").addClass("alert alert-danger alert-dismissible fade show")
                    .text('CNPJ Inválido: ' + cnpj);
                msg.append('<button onclick="$(\'#' + msg.attr('id') + '\').hide();" type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>');

                salvar.prop('disabled', true);
            } else {
                salvar.prop('disabled', false);
                msg.hide();
            }
        }

        // Elimina CNPJs invalidos conhecidos
        if (cnpj == "00000000000000" ||
            cnpj == "11111111111111" ||
            cnpj == "22222222222222" ||
            cnpj == "33333333333333" ||
            cnpj == "44444444444444" ||
            cnpj == "55555555555555" ||
            cnpj == "66666666666666" ||
            cnpj == "77777777777777" ||
            cnpj == "88888888888888" ||
            cnpj == "99999999999999") {
            msg.show().removeClass("alert alert-success alert-dismissible fade show").addClass("alert alert-danger alert-dismissible fade show")
                .text('CNPJ Inválido: ' + cnpj);
            msg.append('<button onclick="$(\'#' + msg.attr('id') + '\').hide();" type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>');

            salvar.prop('disabled', true);
        }else {

            // Valida DVs
            tamanho = cnpj.length - 2
            numeros = cnpj.substring(0, tamanho);
            digitos = cnpj.substring(tamanho);
            soma = 0;
            pos = tamanho - 7;
            for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                    pos = 9;
            }
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(0)) {
                msg.show().removeClass("alert alert-success alert-dismissible fade show").addClass("alert alert-danger alert-dismissible fade show")
                    .text('CNPJ Inválido: ' + cnpj);
                msg.append('<button onclick="$(\'#' + msg.attr('id') + '\').hide();" type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>');

                salvar.prop('disabled', true);
            }else {

                tamanho = tamanho + 1;
                numeros = cnpj.substring(0, tamanho);
                soma = 0;
                pos = tamanho - 7;
                for (i = tamanho; i >= 1; i--) {
                    soma += numeros.charAt(tamanho - i) * pos--;
                    if (pos < 2)
                        pos = 9;
                }
                resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                if (resultado != digitos.charAt(1)) {
                    msg.show().removeClass("alert alert-success alert-dismissible fade show").addClass("alert alert-danger alert-dismissible fade show")
                        .text('CNPJ Inválido: ' + cnpj);
                    msg.append('<button onclick="$(\'#' + msg.attr('id') + '\').hide();" type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>');

                    salvar.prop('disabled', true);
                }else {

                    msg.show().removeClass("alert alert-danger alert-dismissible fade show").addClass("alert alert-success alert-dismissible fade show")
                        .text('CNPJ Válido');
                    msg.append('<button onclick="$(\'#' + msg.attr('id') + '\').hide();" type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>');
                    salvar.prop('disabled', false);
                }
            }
        }
    }
}
