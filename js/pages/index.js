var localhost = "/";

$(document).ready(function () {
    $("#inputEmail").keyup(function (event) {
        if (event.keyCode == 13) {
            $("#botaoLogin").click();
        }
    });

    $("#inputSenha").keyup(function (event) {
        if (event.keyCode == 13) {
            $("#botaoLogin").click();
        }
    });
});

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

var enviarEmail = function () {
    var emailProfessor = $('#emailProfessor').val();
    var nomeContato = $('#contatoName').val();
    var emailContato = $('#contatoEmail').val();
    var assuntoContato = $('#contatoAssunto').val();
    var mensagemContato = $('#contatoMensagem').val();

    var emailValido = false;

    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    if (testEmail.test(emailContato)) {
        emailValido = true;
    } else {
        $('#message-erro-email').fadeIn();
        var delayMillis = 3000;
        setTimeout(function () {
            $('#message-erro-email').fadeOut();
        }, delayMillis);
    }

    if (emailValido) {
        var postData = {
            "emailProfessor": emailProfessor,
            "nomeContato": nomeContato,
            "emailContato": emailContato,
            "assuntoContato": assuntoContato,
            "mensagemContato": mensagemContato
        };

        $.ajax({
            url: "util/EnviarEmail.php",
            type: "post",
            data: postData,
            dataType: 'json',
            success: function (data) {
                if (data.sucesso == true) {
                    $('#message-success').fadeIn();
                    var delayMillis = 3000;
                    setTimeout(function () {
                        $('#message-success').fadeOut();
                    }, delayMillis);
                } else if (data.sucesso == false) {
                    $('#message-warning').fadeIn();
                    var delayMillis = 3000;
                    setTimeout(function () {
                        $('#message-warning').fadeOut();
                    }, delayMillis);
                }
            },
        });
    }
}