<?php
// Inicia a sessão
session_start();

// Inclui o arquivo de conexão com o banco de dados
include_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CRUD-Listar</title>
</head>

<body>
    <main id="infoFuncionario">
        <h1>Funcionarios</h1>
        
        <?php
        // Exibe a mensagem de sessão, se houver, e depois a remove
        if (isset($_SESSION['msg'])) {
            echo ($_SESSION['msg']);
            unset($_SESSION['msg']);
        }

        // Recebe o número da página atual via GET e sanitiza o valor
        $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
        // Define a página atual, padrão é 1 se não estiver definida
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
    
        // Define a quantidade de itens por página
        $qnt_result_pg = 2;
    
        // Calcula o início da visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

        // Consulta para selecionar os usuários com limite para paginação
        $select_user = "SELECT * FROM funcionarios LIMIT $inicio, $qnt_result_pg";
        $selected_user = mysqli_query($conn, $select_user);

        // Consulta para contar o número total de usuários
        $result_pg = "SELECT COUNT(id) as num_result FROM funcionarios";
        $resultado_pg = mysqli_query($conn, $result_pg);
        $row_pg = mysqli_fetch_assoc($resultado_pg);

        // Calcula a quantidade total de páginas
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

        
        // Loop para exibir os usuários da página atual
        while ($row_user = mysqli_fetch_assoc($selected_user)) {
            echo "<div class='container'>";
            echo "<div class='content'>";
            echo "<p class='infoFuncionario'>ID: " . $row_user['id'] . "</p>";
            echo "<p class='infoFuncionario'>Nome: " . $row_user['nome'] . "</p>";
            echo "<p class='infoFuncionario'>Telefone: " . $row_user['telefone'] . "</p>";
            echo "<p class='infoFuncionario'>E-mail: " . $row_user['email'] . "</p>";
            echo "</div>";
            echo "</div>";
        }
     
        // <!-- Link para a página de cadastro com um botão -->
        echo "<a style='text-decoration: none' href='Cadastro.php'><input class='cadListar' type='button' value='Cadastrar'></a>";
        // Define o número máximo de links de paginação antes e depois da página atual
        $max_links = 2;

        // Link para a primeira página
        echo "<div class='paginas'>";

        echo "<div class='opcoesPaginas'>";
            echo "<a class='primeira' href='listar.php?pagina=1'>Primeira</a>";

            // Loop para gerar links das páginas anteriores
            for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
                if ($pag_ant >= 1) {
                    echo "<a href='listar.php?pagina=$pag_ant'>$pag_ant</a>";
                }
            }

            // Exibe o número da página atual
            echo "$pagina_atual";

            // Loop para gerar links das páginas seguintes
            for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                if ($pag_dep <= $quantidade_pg) {
                    echo "<a href='listar.php?pagina=$pag_dep'>$pag_dep</a>";
                }
            }

            // Link para a última página
            echo "<a class='ultima' href='listar.php?pagina=$quantidade_pg'>Última</a>";

            
            echo "</div>";
        echo "</div>";
        ?>
        

        
    </main>
    
</body>
</html>
