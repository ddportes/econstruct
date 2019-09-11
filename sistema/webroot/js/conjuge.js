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
                    $("#addConjuge").html(result);
                }else{

                    $("#addConjuge").html(result);

                    pessoaId = $('#conjuge_id').val();
                    href = $('#conjugeCliente').attr('href');

                    if(href.indexOf("edit")==-1) {
                        href = href.replace('add', 'edit');
                        href = href + '/' + pessoaId;
                        $('#conjugeCliente').attr('href',href);
                        $('#conjugeHiddenPessoa').val(pessoaId);
                        $('#conjugeCliente').html('Editar Cônjuge');
                    }
                    $('#fechaModal').click();
                }
            },
            error: function(result){
                $('.modal_econstruct').show();
                $("#addConjuge").html(result);
            }

        });

    });
});