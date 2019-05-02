
$(document).ready(function() {
    $("ul>.top_toggle>svg").click(function(){
        if($(this).parent(".top_toggle").hasClass('top_toggle_active')){
            $(".top_toggle").removeClass('top_toggle_active');
            $(".toggle-show").slideUp();
        }
        else {
            $(".toggle-show").slideUp();
            $("ul>.top_toggle").removeClass('top_toggle_active');
            $(this).parent(".top_toggle").addClass('top_toggle_active');
            $(this).parent(".top_toggle").children('.toggle-show').slideDown();
        }
    });
});
