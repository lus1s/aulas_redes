<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar notas</title>
    <title>Seus Dados</title>
    <link rel="stylesheet" href="estiloAluno.css">
    <link rel="shortcut icon" href="mortarboard.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>CEA</h1>
        <p>Centro de Ensino e Aprendizagem</p>
        <a href="index.html" class="btn btn-danger">sair</a>
    </div>
    <?php
    require_once 'conexao.php';
    $id_user = $_SESSION['id_user'];
    $notas = $_GET['notas'];

    $sql = "SELECT id_disciplina FROM tb_disciplina WHERE tb_professor_id_professor = '$id_user'";
    $resultados = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($resultados) > 0) {
        while ($linha = mysqli_fetch_array($resultados)) {
            $disc = $linha['id_disciplina'];;
        }
    }
    foreach ($notas as $chave => $valor) {
        $sql = "INSERT INTO tb_notas (valor_nota, tb_disciplina_id_disciplina, tb_aluno_id_aluno) VALUES ($valor, $disc, $chave)";
        if (mysqli_query($conexao, $sql)) {
        }
    }


    ?>
    <div class="container text-light text-center">
        <img src="BackgroundEraser_20230624_154848812.png"><br><br>
        <small class="text-white-50">&copy;Copyright by Centro de Estudo e Aprendizagem</small>
    </div>
</body>

</html>