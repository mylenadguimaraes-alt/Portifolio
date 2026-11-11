<?php
session_start();

// Se o usuário não estiver logado, redireciona de volta para o login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit;
}

require_once 'conexao.php';

$id_usuario = $_SESSION['usuario_id'];

// Busca as informações completas do usuário no banco de dados
$stmt = $conexao->prepare("SELECT nome, sobrenome, usuario, criado_em FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Usuário</title>
    <link rel="stylesheet" href="painel-estilo.css">
</head>
<body>

    <div class="container">
        <h2>Bem-vindo ao Painel!</h2>
        <p>Aqui estão as suas informações cadastradas no sistema:</p>

        <div class="info-box">
            <p><strong>Nome:</strong> <?php echo htmlspecialchars($usuario['nome']); ?></p>
            <p><strong>Sobrenome:</strong> <?php echo htmlspecialchars($usuario['sobrenome']); ?></p>
            <p><strong>Usuário:</strong> <?php echo htmlspecialchars($usuario['usuario']); ?></p>
            <p><strong>Conta criada em:</strong> <?php echo date('d/m/Y H:i', strtotime($usuario['criado_em'])); ?></p>
        </div>

        <a href="logout.php" class="btn-sair">Sair (Fazer Logout)</a>
    </div>

</body>
</html>