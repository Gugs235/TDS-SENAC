<?php
include 'conexao.php';

$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0755, true);
}

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

echo $target_file;

$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$target_file = $target_dir . md5(uniqid()) . '.' . $imageFileType;

echo "<br>" . $target_file . "<br>";

// verifica se é uma imagem
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "Arquivo é uma imagem - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Arquivo não é uma imagem.";
        $uploadOk = 0;
    }
}
// verifica se o arquivo já existe'
if (file_exists($target_file)) {
    echo "Desculpe, arquivo já existe.";
    $uploadOk = 0;
}

// verifica o tamanho do arquivo
if ($_FILES["fileToUpload"]["size"] > 500000) {
    // 500KB -  A propriedade $ FILES[!"fileToUpload"][ssize"] retorna o tamanho do arquivo em bytes.
    // 488KB, quase 500KB
    echo "Desculpe, seu arquivo é muito grande.";
    $uploadOk = 0;
}

// permite certos formatos de arquivo
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Desculpe, apenas arquivos JPG, JPEG, PNG & GIF são permitidos.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Desculpe, seu arquivo não foi enviado.";
    // se tudo estiver ok, tenta fazer o upload do arquivo
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "O arquivo " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " foi enviado.";
        $query_insert = "INSERT INTO path values ('./$target_file');";
        $result_insert = mysqli_query($conn, $query_insert);
    } else {
        echo "Desculpe, houve um erro ao enviar seu arquivo.";
    }
}
