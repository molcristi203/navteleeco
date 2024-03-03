$(document).ready(function() {
    var is_open = false;

    $(".menu-btn").click(function() {
        is_open = !is_open;

        if (is_open) 
        {
            $(".menu-btn").addClass("menu-open");
            $(".nav-links").addClass("nav-open")
        }
        else
        {
            $(".menu-btn").removeClass("menu-open");
            $(".nav-links").removeClass("nav-open");
        }
    });
});