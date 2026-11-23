$(document).ready(function () {
    $("#btnentrar").click(function () {
        if ($("#Email").val() == "" || $("#senha").val() == "") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Preencha todos os campos!",
            });
            return;
        }

        var letras = $("#senha").val().length;
        console.log(letras);
        if (letras < 8) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "A senha deve ter pelo menos 8 caracteres!",
            });
            return;
        }
        $.ajax({
            url: "./api/login",
            type: "POST",
            data: {
                email: $("#Email").val(),
                senha: $("#senha").val(),
            },
            success: function (response) {
                console.log(response);
                if (response.erro == "n") {
                    Swal.fire({
                        icon: "success",
                        title: "Sucesso!",
                        text: "Login realizado com sucesso!",
                    });
                    $.cookie("token", response.token, {
                        expires: 7,
                    });
                    $.cookie("usuario_id", response.usuario_id, {
                        expires: 7,
                    });
                    setTimeout(function () {
                        window.location.href = "../admin";
                    }, 2000);
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Email ou senha incorretos!",
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: "error",
                    title: "Oops... 67",
                    text: "Ocorreu um erro ao processar a solicitação!",
                });
            },
        });
    });
});
