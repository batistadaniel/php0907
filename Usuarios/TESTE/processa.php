<!-- <?php

// Inicia a sessão
session_start();

// Inclui o arquivo de conexão com o banco de dados
include_once("conexao.php");

// Sanitiza e obtém os dados do formulário
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); 
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

// Cria a consulta SQL para inserir um novo usuário no banco de dados
$criar_usuario = "INSERT INTO usuarios (nome, email, created) VALUES ('$nome', '$email', NOW())";

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
?> -->


<?php
// Inicia a sessão
session_start();

// Inclui o arquivo de conexão com o banco de dados
include_once("conexao.php");

// Sanitiza e obtém os dados do formulário
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); 
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

// Verificar se o usuário já existe
$verifica_usuario = "SELECT * FROM usuarios WHERE email = '$email'";
$result = mysqli_query($conn, $verifica_usuario);

// Se o usuário já existe
if (mysqli_num_rows($result) > 0) {
    // Define uma mensagem de erro na sessão
    $_SESSION['msg'] = "<p style='color: red;'>Usuário já cadastrado!</p>";
} else {
    // Cria a consulta SQL para inserir um novo usuário no banco de dados
    $criar_usuario = "INSERT INTO usuarios (nome, email, created) VALUES ('$nome', '$email', NOW())";

    // Executa a consulta SQL
    if (mysqli_query($conn, $criar_usuario)) {
        // Verifica se o usuário foi inserido com sucesso
        if (mysqli_insert_id($conn)) {
            // Define uma mensagem de sucesso na sessão
            $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
        } else {
            // Define uma mensagem de erro na sessão
            $_SESSION['msg'] = "<p style='color: red;'>Erro ao cadastrar usuário!</p>";
        }
    } else {
        // Define uma mensagem de erro na sessão
        $_SESSION['msg'] = "<p style='color: red;'>Erro ao cadastrar usuário!</p>";
    }
}

// Fechar a conexão
mysqli_close($conn);

// Redireciona para a página de cadastro
header("Location: cadastro.php");
exit();
?>

