$(document).ready(function(){
    $(".abrirPanel").click(function(){
        $(".panel").slideDown("slow");
        $(".cerrarPanel").show();
    });

    $(".cerrarPanel").click(function(){
        $(".panel").slideUp("slow");
        $(".cerrarPanel").show();
    });
});