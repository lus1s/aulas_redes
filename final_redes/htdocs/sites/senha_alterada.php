<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senha alterada</title>
    <link rel="stylesheet" href="estiloAluno.css">
    <link rel="shortcut icon" href="mortarboard.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <h1>CEA</h1>
    <p>Centro de Ensino e Aprendizagem</p>
    <a href="dados_individuais.php" class="btn btn-danger">voltar</a>
    <a href="index.html" class="btn btn-danger">sair</a>
    </div><br>
    <?php
    require_once 'conexao.php';

    $nv_senha = $_GET['senha'];
    $alter = $_SESSION['user'];
    $usuario = $_SESSION['id_user'];

    if ($alter == 'aluno') {
        $sql = "UPDATE tb_aluno SET senha = '$nv_senha' WHERE id_aluno = '$usuario'";
        if (mysqli_query($conexao, $sql)) {
            echo "Senha alterada com sucesso";
        } else {
            echo "Falha ao atualizar senha";
        }
    } elseif ($alter == 'professor') {
        $sql = "UPDATE tb_professor SET senha = '$nv_senha' WHERE id_professor = '$usuario'";
        if (mysqli_query($conexao, $sql)) {
            echo '<p><img src="vzinho.png">entrada concluida com sucesso!</p>';
        } else {
            echo '<p><img src="aviso.png">Senha negada!</p>';
        }
    }
    ?>
    footer class="bg-dark py-3 mt-3">
    <div class="container text-light text-center">
        <img src="BackgroundEraser_20230624_154848812.png"><br><br>
        <small class="text-white-50">&copy;Copyright by Centro de Estudo e Aprendizagem</small>
    </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>