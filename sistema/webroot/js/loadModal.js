function limpaClasse(dialog,classe){
    if(dialog.hasClass(classe)){
        dialog.removeClass(classe);
    }
}
$(document).ready(function(){
    d = $('.modal_econstruct .modal-dialog');
    c = $('.modal_econstruct .modal-dialog .modal-content');

    $('.modal_xl_link').click(function(e){
        limpaClasse(d,'modal-lg');
        limpaClasse(d,'modal-sm');
        d.addClass('modal-xl');
        c.html('');
        c.load($(this).attr('href'));
    });

    $('.modal_lg_link').click(function(e){
        limpaClasse(d,'modal-xl');
        limpaClasse(d,'modal-sm');
        d.addClass('modal-lg');
        c.html('');
        c.load($(this).attr('href'));
    });

    $('.modal_sm_link').click(function(e){
        limpaClasse(d,'modal-xl');
        limpaClasse(d,'modal-lg');
        d.addClass('modal-sm');
        c.html('');
        c.load($(this).attr('href'));
    });

    $('.modal_link').click(function(e){
        limpaClasse(d,'modal-xl');
        limpaClasse(d,'modal-lg');
        limpaClasse(d,'modal-sm');
        c.html('');
        c.load($(this).attr('href'));
    });
});