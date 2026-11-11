<?php
// Função simples para carregar o arquivo .env
function carregarEnv($caminho) {
    if (!file_exists($caminho)) {
        die("Arquivo .env não encontrado!");
    }
    
    $linhas = file($caminho, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($linhas as $linha) {
        // Ignora comentários
        if (strpos(trim($linha), '#') === 0) {
            continue;
        }

        list($nome, $valor) = explode('=', $linha, 2);
        $nome = trim($nome);
        $valor = trim($valor);

        if (!array_key_exists($nome, $_SERVER) && !array_key_exists($nome, $_ENV)) {
            putenv(sprintf('%s=%s', $nome, $valor));
            $_ENV[$nome] = $valor;
            $_SERVER[$nome] = $valor;
        }
    }
}

// Carrega o arquivo .env localizado na mesma pasta
carregarEnv(__DIR__ . '/.env');

// Pega os dados das variáveis de ambiente
$servidor = getenv('DB_HOST');
$usuario  = getenv('DB_USER');
$senha    = getenv('DB_PASS');
$banco    = getenv('DB_NAME');

// Conecta ao MySQL
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se houve erro na conexão
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Define o charset para evitar problemas com acentuação
$conexao->set_charset("utf8mb4");

// Cria a tabela automaticamente caso ela não exista
$sqlTabela = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conexao->query($sqlTabela)) {
    die("Erro ao criar a tabela automaticamente: " . $conexao->error);
}
?>