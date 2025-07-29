<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Resultado do Formulário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #f0f0f0;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #2a2a2a;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
        }

        h2 {
            text-align: center;
            color: #e50914;
        }

        .info {
            margin: 15px 0;
            padding-bottom: 10px;
            border-bottom: 1px solid #444;
        }

        .label {
            font-weight: bold;
            color: #ddd;
        }

        .valor {
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Dados Recebidos</h2>

        <?php
        function exibirInfo($label, $valor)
        {
            echo "<div class='info'><span class='label'>$label:</span> <span class='valor'>$valor</span></div>";
        }

        $nome = $_POST['nome'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $endereco = $_POST['endereco'];
        $idade = $_POST['idade'];
        $data = $_POST['data_nascimento'];
        $epoca_ano = $_POST['epoca_ano'] ?? [];
        $genero = $_POST['genero'];
        $cor = $_POST['cor_favorita'];
        $escolaridade = $_POST['escolaridade'];
        $profissao = $_POST['profissao'];
        $estado_civil = $_POST['estado_civil'];
        $hobbies = $_POST['hobbies'];
        $usa_redes = $_POST['usa_redes'];

        exibirInfo("Nome", $nome);
        exibirInfo("RG", $rg);
        exibirInfo("CPF", $cpf);
        exibirInfo("Endereço", $endereco);
        exibirInfo("Idade", $idade);
        exibirInfo("Data de Nascimento", $data);

        if (is_array($epoca_ano) && count($epoca_ano) > 0) {
            exibirInfo("Época(s) do Ano Favorita(s)", implode(', ', $epoca_ano));
        } else {
            exibirInfo("Época(s) do Ano Favorita(s)", "Nenhuma selecionada");
        }

        exibirInfo("Gênero", $genero);
        exibirInfo("Cor Favorita", $cor);
        exibirInfo("Escolaridade", $escolaridade);
        exibirInfo("Profissão", $profissao);
        exibirInfo("Estado Civil", $estado_civil);
        exibirInfo("Hobbies", $hobbies);
        exibirInfo("Usa Redes Sociais", $usa_redes);
        ?>
    </div>
</body>

</html>