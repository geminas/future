$(document).ready(function () {
        $("#barmenu-bars").click(function () {
            $("#barmenu-cross").show(0);
            $("#barmenu-content").show("slow");
            $("#barmenu-bars").hide(0);

        });
         $( window ).resize(function() {
    $(".navbar-collapse").css({ maxHeight: $(window).height() - $(".navbar-header").height() + "px" });
});

        $("#barmenu-cross").click(function () {
            
            $("#barmenu-cross").hide(0);
            $("#barmenu-content").hide("slow");
            $("#barmenu-bars").show(0);
            
        });
        });

function adaptiveContainer() {
    console.log($(window).width());
    if ($(window).width() > 1310)
        $(".container-fluid").removeClass("container-fluid").addClass("container");
    else
        $(".container").removeClass("container").addClass("container-fluid");
}