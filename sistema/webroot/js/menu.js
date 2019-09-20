$(document).ready(
    function(){
        setTimeout(function(){
            $(".vertical-nav-menu").metisMenu()
        },100),
            $(".search-icon").click(function(){
                $(this).parent().parent().addClass("active")
            }),
            $(".search-wrapper .close").click(
                function(){
                    $(this).parent().removeClass("active")
                }),
            $(".dropdown-menu").on("click",function(e){
                var t=r.a._data(document,"events")||{};
                t=t.click||[];
                for(var n=0;n<t.length;n++)
                    t[n].selector&&($(e.target).is(t[n].selector)&&t[n].handler.call(e.target,e),r()(e.target).parents(t[n].selector).each(function(){t[n].handler.call(this,e)}));e.stopPropagation()}),r()(function(){r()('[data-toggle="popover"]').popover()}),r()(function(){r()('[data-toggle="tooltip"]').tooltip()}),r()(".mobile-toggle-nav").click(function(){r()(this).toggleClass("is-active"),r()(".app-container").toggleClass("sidebar-mobile-open")}),r()(".mobile-toggle-header-nav").click(function(){r()(this).toggleClass("active"),r()(".app-header__content").toggleClass("header-mobile-open")}),r()(window).on("resize",function(){r()(this).width()<1250?r()(".app-container").addClass("closed-sidebar-mobile closed-sidebar"):r()(".app-container").removeClass("closed-sidebar-mobile closed-sidebar")})})}