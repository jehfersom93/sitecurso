var efetuarLogin = function () {
    var inputEmail = $('#inputEmail').val();
    var inputSenha = $('#inputSenha').val();

    var postData = {
        "emailProfessor": inputEmail,
        "senhaProfessor": inputSenha
    };

    $.ajax({
        url: "painel/inc/valida.php",
        type: "post",
        data: postData,
        dataType: 'json',
        success: function (data) {
            if (data.sucesso == true) {
                window.location = "/painel";
            } else if (data.erro == true) {
                alert("Dados incorretos");
            }
        },
    });
}