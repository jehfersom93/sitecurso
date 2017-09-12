<?php
$sucesso = false;
$emailProfessor = filter_input(INPUT_POST, 'emailProfessor', FILTER_SANITIZE_EMAIL);
$nomeContato = filter_input(INPUT_POST, 'nomeContato', FILTER_SANITIZE_STRING);
$emailContato = filter_input(INPUT_POST, 'emailContato', FILTER_SANITIZE_EMAIL);
$assuntoContato = filter_input(INPUT_POST, 'assuntoContato', FILTER_SANITIZE_STRING);
$mensagemContato = filter_input(INPUT_POST, 'mensagemContato', FILTER_SANITIZE_STRING);

$headers = "De: " . strip_tags($emailContato) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$logo = 'http://kraft.ads.cnecsan.edu.br/images/logo_ads.png';

$message = '<html><body>';
$message .= '<img src="' . $logo . '" height="50px"/>';
$message .= '<p>Este e-mail foi enviado através do site do professor</p>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><td><strong>Nome:</strong> </td><td>" . strip_tags($nomeContato) . "</td></tr>";
$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($emailContato) . "</td></tr>";
$message .= "<tr><td><strong>Assunto:</strong> </td><td>" . strip_tags($assuntoContato) . "</td></tr>";
$message .= "<tr><td><strong>Mensagem:</strong> </td><td>" . strip_tags($mensagemContato) . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";

if (@mail($emailProfessor, $assuntoContato, $message, $headers)) {
    $sucesso = true;
}

$response_array = array(
    'sucesso' => $sucesso
);

echo json_encode($response_array);
