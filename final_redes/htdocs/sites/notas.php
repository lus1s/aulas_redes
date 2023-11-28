<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Lançamento de Notas</title>
    <link rel="stylesheet" href="estiloAluno.css">
    <link rel="shortcut icon" href="mortarboard.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>CEA</h1>
        <p>Centro de Ensino e Aprendizagem</p>
        <a href="paginainicial.php" class="btn btn-danger">voltar</a>
        <a href="index.html" class="btn btn-danger">sair</a>
    </div><br>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                    <th scope="col">Matricula</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Nota</th>
                    

                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'conexao.php';


                $sql = 'SELECT * FROM tb_aluno';
                $resultados = mysqli_query($conexao, $sql);
                if (mysqli_num_rows($resultados) > 0) {
                    // echo '<form method="POST" action="cadastro_notas.php">';
                    echo '<form action="cadastro_notas.php">';
                    echo '<table class="table table-striped">';
                    while ($linha = mysqli_fetch_array($resultados)) {
                        $id_aluno = $linha['id_aluno'];
                        $matricula = $linha['matricula'];
                        $nome = $linha['nome_aluno'];
                        
                        echo '<tr>';
                        echo '    <th scope="row">' . $id_aluno . '</th>';
                        echo '    <th scope="row">' . $matricula . '</th>';
                        echo '    <td>' . $nome . '</td>';
                        echo '    <td><input type="text" name="notas[' . $id_aluno . ']"></td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                    echo '<th scope="col"><input type="submit" class="btn btn-danger" value="Lançar notas"></th>';
                    echo '</form>';
                }


                ?>
            </tbody>
        </table>
    </form>
    <footer class="bg-dark py-3 mt-3">
        <div class="container text-light text-center">
            <img src="BackgroundEraser_20230624_154848812.png"><br><br>
            <small class="text-white-50">&copy;Copyright by Centro de Estudo e Aprendizagem</small>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>