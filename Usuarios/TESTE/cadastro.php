<?php
// Inicia a sessão
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastrar Usuário</h1>

    <?php
    // Exibe a mensagem de sessão, se houver, e depois a remove
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <!-- Formulário para cadastrar um novo usuário -->
    <form action="processa.php" method="post">
        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Digite o nome completo"> <br><br>
        
        <label>Email:</label>
        <input type="email" name="email" placeholder="Digite o seu e-mail"> <br><br>

        <input type="submit" value="Cadastrar">

        <!-- Botão para listar usuários -->
        <a href="listar.php"><input type="button" value="Listar"></a>
    </form>
</body>
</html>
