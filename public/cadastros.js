$(document).ready(function () {

    $("#admlista").hide();
    $("#historico").hide();

    
    $("#admlista_btn").click(function () {
        $("#cadastros").hide();
        $("#admlista").show();
        $("#historico").hide();

        $("#admlista_btn").addClass("active");
        $("#cadastros_btn").removeClass("active");
        $("#historico_btn").removeClass("active");
    });
    $("#cadastros_btn").click(function () {
        $("#cadastros").show();
        $("#admlista").hide();
        $("#historico").hide();

        $("#cadastros_btn").addClass("active");
        $("#admlista_btn").removeClass("active");
        $("#historico_btn").removeClass("active");

    });
    $("#historico_btn").click(function () {
        $("#historico").show();
        $("#cadastros").hide();
        $("#admlista").hide();

        $("#historico_btn").addClass("active");
        $("#cadastros_btn").removeClass("active");
        $("#admlista_btn").removeClass("active");
    });
});

$(document).ready(function () {

    $("#form-cadastro-item").show();
    $("#form-cadastro-categoria").hide();
    $("#form-cadastro-usuario").hide();
    $("#form-cadastro-local").hide();

    $(document).on("click", "#form_cadastro_item_btn", function (e) {
        e.preventDefault();

        $(".dropdown-toggle").text("Item");

        $("#form-cadastro-item").show();
        $("#form-cadastro-categoria").hide();
        $("#form-cadastro-usuario").hide();
        $("#form-cadastro-local").hide();
    });

    $(document).on("click", "#form_cadastro_categoria_btn", function (e) {
        e.preventDefault();

        $(".dropdown-toggle").text("Categoria");

        $("#form-cadastro-item").hide();
        $("#form-cadastro-categoria").show().css('display', 'flex');
        $("#form-cadastro-usuario").hide();
        $("#form-cadastro-local").hide();
    });

    $(document).on("click", "#form_cadastro_usuario_btn", function (e) {
        e.preventDefault();

        $(".dropdown-toggle").text("Usuário");

        $("#form-cadastro-item").hide();
        $("#form-cadastro-categoria").hide();
        $("#form-cadastro-usuario").show().css('display', 'flex');
        $("#form-cadastro-local").hide();
    });

    $(document).on("click", "#form_cadastro_local_btn", function (e) {
        e.preventDefault();

        $(".dropdown-toggle").text("Local");

        $("#form-cadastro-item").hide();
        $("#form-cadastro-categoria").hide();
        $("#form-cadastro-usuario").hide();
        $("#form-cadastro-local").show().css('display', 'flex');
    });
});