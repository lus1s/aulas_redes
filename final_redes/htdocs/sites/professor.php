<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Professor</title>
    <link rel="stylesheet" href="estiloAluno.css">
    <link rel="shortcut icon" href="mortarboard.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>CEA</h1>
        <p>Centro de Ensino e Aprendizagem</p>
        <a href="adm_cadastro.html" class="btn btn-danger">voltar</a>
        <a href="index.html" class="btn btn-danger">sair</a>
    </div><br>
    <?php
    require_once 'conexao.php';

    $matr_prof = $_GET['matr_professor'];
    $nome_prof = $_GET['nomeprofessor'];
    $cpf = $_GET['cpf'];
    $dt_nasci = $_GET['dt_nasc'];
    $endereco = $_GET['end'];
    $ar_formacao = $_GET['areade_forma'];
    $data_contr = $_GET['dt_contrato'];
    $dr_contrato = $_GET['dr_contrato'];
    $carga_hora = $_GET['cg_horaria'];
    $senha = $_GET['senha'];
    $id_adm = $_SESSION['id_user'];
    $turma = $_GET['turma'];

    $sql = "SELECT id_turma FROM tb_turma WHERE nome_turma = '$turma'";
    $resultados = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($resultados) > 0) {
        while ($linha = mysqli_fetch_array($resultados)) {

            $id_turma = $linha['id_turma'];
        }
    }

    $insert = "INSERT INTO tb_professor (matricula, nome_professor, cpf, dt_nascimento, endereco_professor, dt_contrato, duracao_contrato,  area_formacao, cg_horaria, senha, tb_adm_id_adm, tb_turma_id_tuma) 
                VALUES ('$matr_prof', '$nome_prof', '$cpf', '$dt_nasci', '$endereco',  '$data_contr', '$dr_contrato', '$ar_formacao', '$carga_hora', '$senha', $id_adm, '$id_turma')";
    if (mysqli_query($conexao, $insert)) {
        echo '<p><img src="vzinho.png">entrada concluida com sucesso!</p>';
    } else {
        echo '<p><img src="aviso.png">cadastro negada!</p>';
    }
    ?>

    <footer class="bg-dark py-3 mt-3">
        <div class="container text-light text-center">
            <img src="BackgroundEraser_20230624_154848812.png"><br><br>
            <small class="text-white-50">&copy;Copyright by Centro de Estudo e Aprendizagem</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>