$(document).ready(function () {

    $("#lista").hide();

    
    $("#lista_btn").click(function () {
        $("#form-emprestimo").hide();
        $("#lista").show();

        $("#lista_btn").addClass("active");
        $("#emprestar_btn").removeClass("active");
    });
    $("#emprestar_btn").click(function () {
        $("#form-emprestimo").show();
        $("#lista").hide();

        $("#emprestar_btn").addClass("active");
        $("#lista_btn").removeClass("active");

    });
});