<?php
session_start();
require_once 'conexao.php';

$mensagem = "";
$tipo_msg = "";

// Ação de Cadastro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['acao']) && $_POST['acao'] == 'cadastrar') {
    $nome      = trim($_POST['nome']);
    $sobrenome = trim($_POST['sobrenome']);
    $usuario   = trim($_POST['usuario']);
    $senha     = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    if (!empty($nome) && !empty($sobrenome) && !empty($usuario) && !empty($_POST['senha'])) {
        $stmt_check = $conexao->prepare("SELECT id FROM usuarios WHERE usuario = ?");
        $stmt_check->bind_param("s", $usuario);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            $mensagem = "Este nome de usuário já está em uso!";
            $tipo_msg = "erro";
        } else {
            $stmt = $conexao->prepare("INSERT INTO usuarios (nome, sobrenome, usuario, senha) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nome, $sobrenome, $usuario, $senha);

            if ($stmt->execute()) {
                $mensagem = "Cadastro realizado com sucesso! Faça o login.";
                $tipo_msg = "sucesso";
            } else {
                $mensagem = "Erro ao cadastrar: " . $conexao->error;
                $tipo_msg = "erro";
            }
            $stmt->close();
        }
        $stmt_check->close();
    } else {
        $mensagem = "Preencha todos os campos do cadastro.";
        $tipo_msg = "erro";
    }
}

// Ação de Login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['acao']) && $_POST['acao'] == 'login') {
    $usuario = trim($_POST['usuario']);
    $senha   = trim($_POST['senha']);

    if (!empty($usuario) && !empty($senha)) {
        $stmt = $conexao->prepare("SELECT id, nome, senha FROM usuarios WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $dados = $resultado->fetch_assoc();
            
            if (password_verify($senha, $dados['senha'])) {
                // Salva o ID na sessão e redireciona para o painel
                $_SESSION['usuario_id'] = $dados['id'];
                header("Location: painel.php");
                exit;
            } else {
                $mensagem = "Usuário ou senha errados";
                $tipo_msg = "erro";
            }
        } else {
            $mensagem = "Usuário ou senha errados";
            $tipo_msg = "erro";
        }
        $stmt->close();
    } else {
        $mensagem = "Preencha todos os campos de login.";
        $tipo_msg = "erro";
    }
}

$modo = isset($_GET['modo']) && $_GET['modo'] == 'cadastrar' ? 'cadastrar' : 'login';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <?php if (!empty($mensagem)): ?>
            <div class="mensagem <?php echo $tipo_msg; ?>">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>

        <?php if ($modo == 'login'): ?>
            <h2>Entrar</h2>
            <form action="index.php" method="POST">
                <input type="hidden" name="acao" value="login">
                
                <div class="form-group">
                    <label for="usuario">Usuário</label>
                    <input type="text" id="usuario" name="usuario" required placeholder="Digite seu usuário">
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required placeholder="Digite sua senha">
                </div>

                <button type="submit">Entrar</button>
            </form>

            <div class="alternar">
                Não tem cadastro? <a href="index.php?modo=cadastrar">Cadastre-se aqui</a>
            </div>

        <?php else: ?>
            <h2>Cadastrar</h2>
            <form action="index.php?modo=cadastrar" method="POST">
                <input type="hidden" name="acao" value="cadastrar">
                
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" required placeholder="Digite seu nome">
                </div>

                <div class="form-group">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" id="sobrenome" name="sobrenome" required placeholder="Digite seu sobrenome">
                </div>

                <div class="form-group">
                    <label for="usuario">Nome de Usuário</label>
                    <input type="text" id="usuario" name="usuario" required placeholder="Escolha um usuário">
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required placeholder="Escolha uma senha">
                </div>

                <button type="submit">Cadastrar e Salvar</button>
            </form>

            <div class="alternar">
                Já tem cadastro? <a href="index.php">Faça login</a>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>
