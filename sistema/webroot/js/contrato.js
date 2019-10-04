$( document ).ready(function(){
    $( "#data_assinatura" ).datepicker({
        format: 'dd/mm/yyyy',
        todayBtn: false,
        language: "pt-BR"
    });

    $('#formContrato').on('submit', function(e) {
        $('#minuta').val(CKEDITOR.instances[ 'minuta' ].getData());

        e.preventDefault();
        $('#modal_econstruct_content').append("<div id='loadingAjax' style='display: block;position:fixed; top:0;left:0; z-index: 99999; width: 100%; height: 100%; opacity: .5; transition: opacity 0.15s linear;   background-color: #000;  box-sizing: border-box;'><img style='position: absolute;top:50%;left:50%' src='img/ajax-loader.gif'></div>");
        $.ajax({
            url: $(this).attr("action"),
            type: "put",
            data: $(this).serialize() ,
            success: function (result) {
                $('#loadingAjax').remove();
                if(result.indexOf("error-message")>-1){
                    $('.modal_econstruct').show();
                    $('#modal_econstruct_content').html(result);
                }else{
                    $('#modal_econstruct_content').html(result);
                }
            },
            error: function(result){
                $('#loadingAjax').remove();
                $('.modal_econstruct').show();
                $('#modal_econstruct_content').html(result);
            }

        });

    });

    $('.addOrcamento').on('click',function(e){
        e.preventDefault();
        $('#modal_econstruct_content').append("<div id='loadingAjax' style='display: block;position:fixed; top:0;left:0; z-index: 99999; width: 100%; height: 100%; opacity: .5; transition: opacity 0.15s linear;   background-color: #000;  box-sizing: border-box;'><img style='position: absolute;top:50%;left:50%' src='img/ajax-loader.gif'></div>");
        $.ajax({
            url: $(this).attr("href"),
            type: "get",
            data: $(this).serialize() ,
            success: function (result) {
                $('#loadingAjax').remove();
                $('#modal_econstruct_content').html(result);
            },
        });
    });

});