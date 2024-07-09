<?php

// Inicia a sessão
session_start();

// Inclui o arquivo de conexão com o banco de dados
include_once("conexao.php");

// Sanitiza e obtém os dados do formulário
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); 
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING); 
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

// Cria a consulta SQL para inserir um novo usuário no banco de dados
$criar_usuario = "INSERT INTO funcionarios (nome, telefone, email, created) VALUES ('$nome', '$telefone', '$email', NOW())";

// Executa a consulta SQL
$usuario_criado = mysqli_query($conn, $criar_usuario);

// Verifica se o usuário foi inserido com sucesso
if (mysqli_insert_id($conn)) {
    // Define uma mensagem de sucesso na sessão
    $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
    // Redireciona para a página de cadastro
    header("Location: cadastro.php");
} else {
    // Define uma mensagem de erro na sessão
    $_SESSION['msg'] = "<p style='color: red;'>Usuário não cadastrado!</p>";
    // Redireciona para a página de cadastro
    header("Location: cadastro.php");
}
?>