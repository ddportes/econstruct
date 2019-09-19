
$( document ).ready(function(){

    if($('#id').val() != '' && $('#id').val()!= null && $('#id').val() != undefined){
        $('#novoOrcamento').attr('style','display:block');
    }else{
        $('#novoOrcamento').attr('style','display:none');
    }

    $('#botaoContratoModal').on('click',function(e){
        e.preventDefault();
        $('#modal_econstruct_content').append("<div style='display: block;" +
                                                          "position:fixed; " +
                                                          "top:0;" +
                                                          "left:0; " +
                                                          "z-index: 99999; " +
                                                          "width: 100%; height: 100%; opacity: .5; transition: opacity 0.15s linear;   background-color: #000;  box-sizing: border-box; text-align: center;vertical-align: middle;'><img src='img/popdown-loading.gif'></div>");

        $.ajax({
            url: $(this).attr("href"),
            type: "get",
            data: $(this).serialize() ,
            success: function (result) {
                $('#modal_econstruct_content').html(result);
            },
        });
    });

    $('#novoOrcamento').on('click',function(){
        $('#id').val('');
        $('#idOrcamento').html('');
        $(this).attr('style','display:none');
        $('#custo').focus();
    });

    $('#formOrcamento').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
            type: "post",
            data: $(this).serialize() ,
            success: function (result) {
                if(result.indexOf("error-message")>-1){
                    $('.modal_econstruct').show();
                    $('#modal_econstruct_content').html(result);
                    alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#d92550;border:0"><strong class="mr-auto" style="background-color:#d92550;color:white;font-weight: bold">Erro</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #d92550;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#d92550;color:white;">Não foi possível salvar os dados. Verifique as informações incorretas e tente novamente.</div></div>';
                    $("#cadOrcamento").append(alerta);
                    $('.toast').toast('show');
                }else{
                    $('#modal_econstruct_content').html(result);
                    $('#id').val('');
                    $('#custo').val('');
                    $('#total').val('');
                    $('#data_inicial').val('');
                    $('#data_entrega').val('');
                    $('#observacao').val('');
                    $('#idOrcamento').html('');
                    //$('#fechaModal').click();

                    alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#3ac47d;border:0"><strong class="mr-auto" style="background-color:#3ac47d;color:white;font-weight: bold">Sucesso</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #16aaff;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#3ac47d;color:white;">Orçamento gravado com sucesso</div></div>';
                    $("#cadOrcamento").append(alerta);
                    $('.toast').toast('show');
                }
            },
            error: function(result){
                $('.modal_econstruct').show();
                $('#modal_econstruct_content').html(result);
                alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#d92550;border:0"><strong class="mr-auto" style="background-color:#d92550;color:white;font-weight: bold">Erro</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #d92550;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#d92550;color:white;">Não foi possível salvar os dados. Tente Novamente.</div></div>';
                $("#cadOrcamento").append(alerta);
                $('.toast').toast('show');
            }

        });

    });

    $('.form-edit-orcamento').on('click', function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("href"),
            type: "get",
            data: {hash: hashOrcamento},
            success: function (result) {
                var orc = jQuery.parseJSON(result);

                $('#id').val(orc.id);
                $('#projeto_id').val(orc.projeto.id);
                $('#idOrcamento').html(orc.id);
                $('#custo').val(orc.custo);
                $('#total').val(orc.total);

                dt = orc.data_inicial;
                if(dt != null && dt != undefined) {
                    dt = dt.split('-');
                    day = dt[2];
                    day = day.split('T');
                    dt_r = day[0] + '/' + dt[1] + '/' + dt[0];
                    $('#data_inicial').val(dt_r);
                    $('#data_inicial').datepicker('update', dt_r);
                }else{
                    $('#data_inicial').val('');
                    $('#data_inicial').datepicker('update', '');
                }

                dt = orc.data_entrega;
                if(dt != null && dt != undefined) {
                    dt = dt.split('-');
                    day = dt[2];
                    day = day.split('T');
                    dt_r = day[0] + '/' + dt[1] + '/' + dt[0];
                    $('#data_entrega').val(dt_r);
                    $('#data_inicial').datepicker('update', dt_r);
                }else{
                    $('#data_entrega').val('');
                    $('#data_inicial').datepicker('update', '');
                }

                $('#observacao').val(orc.observacao);

                $('#novoOrcamento').attr('style','display:block');
            },
        });
    });

    $('.form-delete-orcamento').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
            type: "post",
            data: $(this).serialize() ,
            success: function (result) {
                $('#modal_econstruct_content').html(result);
                alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#3ac47d;border:0"><strong class="mr-auto" style="background-color:#3ac47d;color:white;font-weight: bold">Sucesso</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #16aaff;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#3ac47d;color:white;">Orçamento excluído com sucesso</div></div>';
                $("#cadOrcamento").append(alerta);
                $('.toast').toast('show');
            },
        });
    });

    $('.form-aprova-orcamento').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
            type: "post",
            data: $(this).serialize() ,
            success: function (result) {
                $('#modal_econstruct_content').html(result);
                alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#3ac47d;border:0"><strong class="mr-auto" style="background-color:#3ac47d;color:white;font-weight: bold">Sucesso</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #16aaff;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#3ac47d;color:white;">Orçamento aprovado com sucesso</div></div>';
                $("#cadOrcamento").append(alerta);
                $('.toast').toast('show');
            },
        });
    });

    $("#custo").maskMoney({
        prefix: "R$ ",
        decimal: ",",
        thousands: "."
    });
    $("#total").maskMoney({
        prefix: "R$ ",
        decimal: ",",
        thousands: "."
    });
    $( function() {
        $( "#data_inicial" ).datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: false,
            language: "pt-BR"
        });
    } );
    $( function() {
        $( "#data_entrega" ).datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: false,
            language: "pt-BR"
        });
    } );
});