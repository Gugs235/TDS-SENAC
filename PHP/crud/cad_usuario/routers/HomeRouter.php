<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    switch ($_GET['acao']) {
        case 'sair':
            session_destroy();
            header('Location: ../index.php');
            break;


        case 'cadastrar':
            header('Location: ../pages/usuario/CadUsuario.php');
            break;



        default:
            echo 'NOT FOUND';
            break;
    }
}
