<?php

// Definindo as variáveis de conexão ao banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "db_batista";

// Criar a conexão com o banco de dados
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

// CHATGPT

// Verificar se a conexão foi bem-sucedida
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Mensagem de sucesso (opcional, pode ser removida)
echo "Conexão bem-sucedida";
?>
