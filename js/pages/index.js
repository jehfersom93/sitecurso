var localhost = "/";

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
                window.location = $(location).attr('protocol') + '//' + $(location).attr('host') + localhost + 'painel';
            } else if (data.erro == true) {
                $('#msgLogin').html("Dados incorretos!");
            }
        },
    });
}