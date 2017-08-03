<?php

require_once("seguranca.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emailProfessor = (isset($_POST['emailProfessor'])) ? $_POST['emailProfessor'] : '';
    $senhaProfessor = (isset($_POST['senhaProfessor'])) ? $_POST['senhaProfessor'] : '';
    if (validaUsuario($emailProfessor, $senhaProfessor) == true) {
        header("Location: index.php");
    } else {
        expulsaVisitante();
    }
}