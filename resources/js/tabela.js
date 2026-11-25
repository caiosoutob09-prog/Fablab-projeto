$(document).ready(function() {
    // Your code here
});

function deletarUsuario(usuario_Id) {

    let usuario_id = $.cookie("usuario_id");
    let token = $.cookie("token");

    $.ajax({
        type: "DELETE",
        url: "../api/deletar_usuario",
        data: {
            usuario_id: usuario_Id,
            token: token
        },
        DataType: "json",
        success: function(response) {
            if (response.erro == 'n') {
                Swal.fire({
                    icon: "success",
                    title: "Sucesso!",
                    text: "Usuário deletado com sucesso!"
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Ocorreu um erro ao deletar o usuário!"
                });
            }
        }
    })
}