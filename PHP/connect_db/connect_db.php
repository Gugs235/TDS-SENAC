<?php

$host = '127.0.0.1';
$usuario = 'root';
$senha = '';
$bd = 'connect_db';
$port = 3306;

// Conexão com o banco de dados
$con = new mysqli($host, $usuario, $senha, $bd, $port);

// Verifica se a conexão foi bem-sucedida
if ($con->connect_error) {
    echo ("Falha na conexão: (" . $con->connect_error . ") " . $con->connect_error);
} else {
    echo "Conectado com sucesso: " . $con->host_info . "<br>";

    $query = "select * from usuario";
    $result = mysqli_query($con, $query);
    if ($result) {
        while ($retorno = mysqli_fetch_array($result)) {
            echo "ID: " . $retorno['id'] . "<br>";
            echo "Nome: " . $retorno['nome'] . "<br>";
            echo "Senha: " . $retorno['senha'] . "<br><hr>";
        }
    } else {
        echo "Erro na consulta: " . mysqli_error($con);
    }



    // $retorno = mysqli_fetch_array($result);

    // echo $retorno['id'] . "<br>";
    // echo $retorno['nome'] . "<br>";
    // echo $retorno['senha'] . "<br>";

    // Fecha a conexão



}
$con->close();
echo "Conexão fechada.";
?>
<!-- Fim do código de conexão com o banco de dados -->