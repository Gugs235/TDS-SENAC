<?php

require_once __DIR__ . '/../controller/LoginController.php';

$loginController = new LoginController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    switch ($_GET['acao']) {
        case 'validarLogin':
            $output = $loginController->validarSenha($_POST['nome'], $_POST['senha']);
            $output ?
                header('Location: ../pages/CadUsuario.php') : //Login Correto:
                header('Location: ../index.php'); //Login Incorreto

            break;

        default:
            echo 'NOT FOUND';
            break;
    }
}
