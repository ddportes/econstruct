$( document ).ready(function(){
    $('#formConjuge').on('submit', function(e) {
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
                    $("#addConjuge").append(alerta);
                    $('.toast').toast('show');
                }else{

                    $('#modal_econstruct_content').html(result);


                    pessoaId = $('#conjuge_id').val();
                    href = $('#conjugeCliente').attr('href');

                    if(href.indexOf("edit")==-1) {
                        href = href.replace('novo', 'editar');
                        href = href + '/' + pessoaId;
                        $('#conjugeCliente').attr('href',href);
                        $('#conjugeHiddenPessoa').val(pessoaId);
                        $('#conjugeCliente').html('Editar Cônjuge');
                    }

                    alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#3ac47d;border:0"><strong class="mr-auto" style="background-color:#3ac47d;color:white;font-weight: bold">Sucesso</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #16aaff;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#3ac47d;color:white;">Cônjuge salvo com sucesso</div></div>';
                    $("#addConjuge").append(alerta);
                    $('.toast').toast('show');
                }
            },
            error: function(result){
                $('.modal_econstruct').show();
                $('#modal_econstruct_content').html(result);

                alerta = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; "><div class="toast-header" style="background-color:#d92550;border:0"><strong class="mr-auto" style="background-color:#d92550;color:white;font-weight: bold">Erro</strong><small></small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #d92550;border: 0;color: white;"><span aria-hidden="true">&times;</span></button></div><div class="toast-body" style="background-color:#d92550;color:white;">Não foi possível salvar os dados. Tente Novamente.</div></div>';
                $("#addConjuge").append(alerta);
                $('.toast').toast('show');
            }

        });

    });
});