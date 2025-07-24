<!-- formulario
Getx x Post
Get
o método GET é usado para enviar dados através da URL, enquanto o método POST é usado para enviar dados de forma mais segura, sem expô-los na URL. -->

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Primeira aula de PHP</title>
</head>

<body>
    <form method="post" action="action.php">
        <fieldset>
            <legend>Dados Pessoais</legend>

            <!-- <input type="text" placeholder="Digite seu nome" name="nome" required> -->

            <p>Nome
                <input
                    type="text"
                    name="nome"
                    id="nome"
                    size="20"
                    maxlength="20"
                    placeholder="Ex.:João"
                    required>
            </p>

            <!-- radio -->
            <p>Qual seu sistema operacional?</p>
            <input type="radio" name="sistema" value="Windows98" id="windows"> Windows
            <!-- <label for="windows">Windows</label> -->
            <input type="radio" name="sistema" value="Linux" id="linux"> Linux
            <!-- <label for="linux">Linux</label> -->
            <input type="radio" name="sistema" value="MacOS" id="macos"> MacOS
            <!-- <label for="macos">MacOS</label> -->




            <!-- <input type="email" placeholder="Digite seu email" name="email" required>
        <input type="cpf" placeholder="Digite seu CPF" name="cpf" required>  -->
        </fieldset>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>