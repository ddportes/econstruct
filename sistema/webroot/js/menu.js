$(document).on('read',function() {

    $(".close-sidebar-btn").on('click',function(){
            alert('1');

            var t=$(this).attr("data-class");
            $(".app-container").toggleClass(t);
            var n=$(this);
            n.hasClass("is-active")?n.removeClass("is-active"):n.addClass("is-active")
        }
    )

});
