<?php

require 'conexao.php';
require 'vendor/autoload.php'; // Inclui o autoload do Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);

    // Verifica se o email existe no banco de dados
    $sql = "SELECT id, nome FROM usuarios WHERE email = '$email' LIMIT 1";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $user = $res->fetch_assoc();
        $idUsuario = $user['id'];
        $nome = $user['nome'];

        // Gera uma nova senha aleatória
        $novaSenha = substr(md5(uniqid(rand(), true)), 0, 8);


        // Atualiza a senha no banco de dados
        $sqlUpdate = "UPDATE usuarios SET senha = '$novaSenha' WHERE id = $idUsuario";

        if ($conn->query($sqlUpdate)){
            // Configura o PHPMailer
            $mail = new PHPMailer(true);
            try {
                // Configurações do servidor SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Substitua pelo seu servidor SMTP
                $mail->SMTPAuth = true;
                $mail->Username = 'seu email@gmail.com'; // Seu usuário SMTP
                $mail->Password = 'sua senha'; // Sua senha SMTP
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587; // Porta TCP para TLS


                // Remetente e destinatário
                $mail->setFrom('seu email@gmail.com', 'Suporte - Sistema');
                $mail->addAddress($email, $nome);

                // Conteúdo do email
                $mail->isHTML(true);
                $mail->Subject = 'Recuperação de Senha';
                $mail->Body    = "Olá <b>$nome<b>,<br><br>
                Sua nova senha é: <b>$novaSenha</b><br><br>
                Recomendamos que altere sua senha após o login.";
                $mail->AltBody = "Olá $nome,\n\n
                Sua nova senha é: $novaSenha\n\n
                Recomendamos que altere sua senha após o login.";
                $mail->send();
                echo 'Mensagem de recuperação enviada com sucesso.';


            } catch (Exception $e) {
                echo "Erro ao enviar email: {$mail->ErrorInfo}";
            }
        } else {
            echo "Erro ao atualizar a senha no banco.";
        }
    } else {
        echo "Email não cadastrado.";
    }
}







?>