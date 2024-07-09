<!-- Inicia uma nova sessão ou retoma uma sessão existente. -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">`
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Funcionario</title>
</head>

<body>

    <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <main>

        <div class="container">
            <div class="titulo-formulario">
                <h1>Empresa Batista</h1>

                <h2>Cadastro de Funcionario</h2>

                <p>Preencha os campos para cadastrar um novo funcionário.</p>
            </div>

            <div class="formulario">

                <form action="processa.php" method="post">

                    <h2>Cadastro de Funcionario</h2>

                    <img src="https://cdn-icons-png.flaticon.com/512/1250/1250739.png" alt="">

                    <div class="cpf">
                        <label for="id_cpf">CPF <span>(Apenas numeros)</span>: </label>
                        <input type="text" id="id_cpf" name="id_cpf" placeholder="Ex.: 11122233399" required>
                    </div>

                    <div class="nome">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>

                    <div class="telefone">
                        <label for="telefone">Telefone <span>(Apenas numeros)</span>: </label>
                        <input type="text" id="telefone" name="telefone" placeholder="Ex.: 5561912345678" required>
                    </div>

                    <div class="email">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Digite o seu e-mail">
                    </div>

                    <div class="botoes">
                        <div class="cadastro">
                            <input type="submit" value="Cadastrar">
                        </div>

                        <div class="limpar">
                            <input type="reset" value="Limpar">
                        </div>

                        <div class="listar">
                            <!-- Botão para listar usuários -->
                            <a href="listar.php"><input type="button" value="Listar"></a>
                        </div>
                    </div>

                    
                </form>
            </div>
        </div>

    </main>
</body>
</html>