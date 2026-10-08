<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebendo os dados
    $nome = $_POST["nome"] ?? "";
    $sobrenome = $_POST["sobrenome"] ?? "";
    $cpf = $_POST["cpf"] ?? "";
    $telefone = $_POST["telefone"] ?? "";
    $idade = $_POST["idade"] ?? "";
    $email = $_POST["email"] ?? "";
    $sexo = $_POST["sexo"] ?? "";
    $distancia = $_POST["distancia"] ?? "";

    $itens = $_POST["itens"] ?? [];


    if (!is_array($itens)) {
        $itens = [$itens];
    }

    // Transforma os itens em texto
    $itensTexto = !empty($itens)
        ? implode(", ", $itens)
        : "Nenhum";

    // Monta os dados para simular um banco
    $cadastro = "----------------------------------------\n";
    $cadastro .= "CADASTRO DE CORREDOR\n";
    $cadastro .= "----------------------------------------\n";
    $cadastro .= "Nome: $nome $sobrenome\n";
    $cadastro .= "CPF: $cpf\n";
    $cadastro .= "Telefone: $telefone\n";
    $cadastro .= "Idade: $idade\n";
    $cadastro .= "E-mail: $email\n";
    $cadastro .= "Gênero: $sexo\n";
    $cadastro .= "Distância: {$distancia}km\n";
    $cadastro .= "Itens: $itensTexto\n";
    $cadastro .= "----------------------------------------\n\n";

  
    file_put_contents(
        "banco_corrida.txt",
        $cadastro,
        FILE_APPEND
    );

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro realizado | Ficha de Corrida</title>

    <link rel="icon" type="image/png" href="../img/logo.png">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background-color: #c3e1ff;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 700px;

            background-color: #e6f4f1;

            border: 3px solid #009eff;
            border-radius: 10px;

            padding: 35px;
        }

        h1 {
            color: #00568b;
            text-align: center;
            margin-bottom: 10px;
        }

        .mensagem {
            text-align: center;
            margin-bottom: 25px;
            font-size: 16px;
        }

        .dados {
            display: flex;
            flex-direction: column;
            gap: 10px;

            background-color: white;

            border: 1px solid #009eff;
            border-radius: 5px;

            padding: 20px;
        }

        .dados p {
            color: #333;
        }

        .dados strong {
            color: #00568b;
        }

        .botao {
            text-align: center;
            padding-top: 25px;
        }

        .botao a {
            display: inline-block;

            padding: 12px 25px;

            color: #00568b;
            border: 2px solid #00568b;
            background-color: #c3e1ff;

            border-radius: 25px;

            font-weight: bold;
            text-decoration: none;

            transition: 0.2s;
        }

        .botao a:hover {
            background-color: #00568b;
            color: #c3e1ff;
        }

        .botao a:active {
            transform: scale(0.95);
        }

        @media (max-width: 600px) {

            .container {
                padding: 20px;
            }

            h1 {
                font-size: 25px;
            }

        }

    </style>
</head>

<body>

    <div class="container">

        <h1>Ficha enviada!</h1>

        <p class="mensagem">
            Cadastro realizado com sucesso.
        </p>

        <div class="dados">

            <p>
                <strong>Nome:</strong>
                <?php echo htmlspecialchars($nome . " " . $sobrenome); ?>
            </p>

            <p>
                <strong>CPF:</strong>
                <?php echo htmlspecialchars($cpf); ?>
            </p>

            <p>
                <strong>Telefone:</strong>
                <?php echo htmlspecialchars($telefone); ?>
            </p>

            <p>
                <strong>Idade:</strong>
                <?php echo htmlspecialchars($idade); ?>
            </p>

            <p>
                <strong>E-mail:</strong>
                <?php echo htmlspecialchars($email); ?>
            </p>

            <p>
                <strong>Gênero:</strong>
                <?php echo htmlspecialchars($sexo); ?>
            </p>

            <p>
                <strong>Distância:</strong>
                <?php echo htmlspecialchars($distancia); ?>km
            </p>

            <p>
                <strong>Itens:</strong>
                <?php echo htmlspecialchars($itensTexto); ?>
            </p>

        </div>

        <div class="botao">
            <a href="../index.html">
                Voltar para a ficha
            </a>
        </div>

    </div>

</body>

</html>

<?php

} else {

    echo "Nenhum formulário foi enviado.";

}

?>

