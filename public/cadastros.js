$(document).ready(function () {

    $("#admlista").hide();
    $("#emprestimos_hist").hide();

    
    $("#admlista_btn").click(function () {
        $("#emprestimos_hist").hide();
        $("#admlista").show();
        $("#cadastros_btn").hide();

        $("#admlista_btn").addClass("active");
        $("#emprestimos_hist_btn").removeClass("active");
        $("#cadastros_btn").removeClass("active");
    });
    $("#emprestimos_hist_btn").click(function () {
        $("#emprestimos_hist").show();
        $("#admlista").hide();
        $("#cadastros_btn").hide();

        $("#emprestimos_hist_btn").addClass("active");
        $("#admlista_btn").removeClass("active");
        $("#cadastros_btn").removeClass("active");

    });
});

$(document).ready(function () {

   
    $("#form-cadastro-categoria").hide();
    $("#form-cadastro-usuario").hide();
    $("#form-cadastro-local").hide();

    $("#form-cadastro-item_btn").click(function () {


        $("#form-cadastro-item").show();
        $("#form-cadastro-categoria").hide();
        $("#form-cadastro-usuario").hide();
        $("#form-cadastro-local").hide();
    });
});