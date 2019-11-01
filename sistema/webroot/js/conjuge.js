$( document ).ready(function(){
    $('#formConjuge').on('submit', function(e) {
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


                    pessoaId = $('#conjuge_id').val();
                    href = $('#conjugeCliente').attr('href');

                    if(href.indexOf("edit")==-1) {
                        href = href.replace('novo', 'editar');
                        href = href + '/' + pessoaId;
                        $('#conjugeCliente').attr('href',href);
                        $('#conjugeHiddenPessoa').val(pessoaId);
                        $('#conjugeCliente').html('Editar Cônjuge');
                    }
                }
            },
            error: function(result){
                $('#loadingAjax').remove();
                $('.modal_econstruct').show();
                $('#modal_econstruct_content').html(result);
            }

        });

    });
});