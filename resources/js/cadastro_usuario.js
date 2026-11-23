$(document).ready(function() {

    $("#btncad_usuario").click(function() {
        if ($("#nome_usuario").val() == "" || $("#email_usuario").val() == "" || $("#senha_usuario").val() == "" || $("#tipo_usuario").val() == "" || $("#turma_usuario").val() == "") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Por favor, preencha todos os campos!"
            });

            return false;
        }
        let usuario_id = $.cookie("usuario_id");
        let token = $.cookie("token");
    });

    Formdata.append("nome", $("#nome_usuario").val());
    formData.append("email", $("#email_usuario").val());
    formData.append("senha", $("#senha_usuario").val());
    formData.append("tipo", $("#tipo_usuario").val());
    formData.append("turma", $("#turma_usuario").val());
    formData.append("usuario_id", usuario_id);
    formData.append("token", token);


    $.ajax({
        type: "POST",
        url: "../api/cadastro_usuario",
        data: formData,
        success: function(response) {
            if (response.erro == 'n') {
                Swal.fire({
                    icon: "success",
                    title: "Sucesso!",
                    text: "Usuário cadastrado com sucesso!"
                })
            } else {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Ocorreu um erro ao cadastrar o usuário!"
                });
            }
        }
    });
});