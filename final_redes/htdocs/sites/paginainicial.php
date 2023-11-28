<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="mortarboard.svg" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal do Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="estiloAluno.css">
</head>

<!--parte do aluno -->

<body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>CEA</h1>
        <p>Centro de Ensino e Aprendizagem</p>
        <a href="index.html" class="btn btn-danger">sair</a>
    </div><br><br><br>
    <?php

    require_once 'conexao.php';

     $matricula = $_GET['matricula'];
        $senha = $_GET['senha'];
        $login = $_GET['escolha'];
        $_SESSION['user'] = $login; 
   
       

        if ($login == 'adm') {
            $sql = "SELECT id_adm, senha, matricula, nome_adm FROM tb_adm WHERE matricula = '$matricula' AND senha = '$senha'";
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {

                    $mat = $linha['matricula'];
                    $sen = $linha['senha'];
                    $nom = $linha['nome_adm'];
                    $usuario = $linha['id_adm'];
                    $_SESSION['id_user'] = $usuario;

                    echo "Bem vindo " . $nom;
                }
                echo '<div class="container">';
                echo '    <div class="row g-3">';
                echo '        <div class="col-12 col-md-6 col-lg-4">';
                echo '            <div class="card">';
                echo '                <img src="CEA.png" class=" card-img-top" alt="">';
                echo '                <div class="card-body">';
                echo '                    <h5 class="card-title">Sobre Nos</h5>';
                echo '                    <p class="card-text">Conheça mais sobre a gente.</p>';
                echo '                    <a href="Sobrenos.html" class="btn btn-primary">ver</a>';
                echo '                </div>';
                echo '            </div>';
                echo '        </div>';
                echo '        <div class="col-12 col-md-6 col-lg-4">';
                echo '            <div class="card">';
                echo '                <img src="lupa.jpg" class="card-img-top" alt="">';
                echo '                <div class="card-body">';
                echo '                    <h5 class="card-title">Buscas</h5>';
                echo '                    <p class="card-text">Busque alunos ou professores.</p>';
                echo '                    <a href="adm_busca.html" class="btn btn-primary">ver</a>';
                echo '                </div>';
                echo '            </div>';
                echo '        </div>';
                echo '        <div class="col-12 col-md-6 col-lg-4">';
                echo '            <div class="card">';
                echo '                <img src="cadernos.jpg" class="card-img-top" alt="">';
                echo '                <div class="card-body">';
                echo '                    <h5 class="card-title">Cadastre pessoas </h5>';
                echo '                    <p class="card-text">cadastre alunos ou professores.</p>';
                echo '                    <a href="adm_cadastro.html" class="btn btn-primary">ver</a>';
                echo '                </div>';
                echo '            </div>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo "Senha ou matricula incorretas";
            }
        } elseif ($login == 'aluno') {
            $sql = "SELECT id_aluno, senha, matricula, nome_aluno FROM tb_aluno WHERE matricula = '$matricula' AND senha = '$senha'";
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    $mat = $linha['matricula'];
                    $sen = $linha['senha'];
                    $nom = $linha['nome_aluno'];
                    $usuario = $linha['id_aluno'];
                    $_SESSION['id_user'] = $usuario;
                    echo "Bem vindo(a) " . $nom;
                }
                echo '<div class="container">';
                echo '    <div class="row g-3">';
                echo '        <div class="col-12 col-md-6 col-lg-4">';
                echo '            <div class="card">';
                echo '                <img src="CEA.png" class="card-img-top" alt="">';
                echo '                <div class="card-body">';
                echo '                    <h5 class="card-title">Sobre Nos</h5>';
                echo '                    <p class="card-text">Conheça mais sobre a gente.</p>';
                echo '                    <a href="Sobrenos.html" class="btn btn-primary">ver</a>';
                echo '                </div>';
                echo '            </div>';
                echo '        </div>';
                echo '        <div class="col-12 col-md-6 col-lg-4">';
                echo '            <div class="card">';
                echo '                <img src="índice.jpeg" class="card-img-top" alt="">';
                echo '                <div class="card-body">';
                echo '                    <h5 class="card-title">Seu Boletim</h5>';
                echo '                    <p class="card-text">Ver suas notas.</p>';
                echo '                    <a href="notas_aluno.php" class="btn btn-primary">ver</a>';
                echo '                </div>';
                echo '            </div>';
                echo '        </div>';
                echo '        <div class="col-12 col-md-6 col-lg-4">';
                echo '            <div class="card">';
                echo '                <img src="istockphoto-936681148-612x612 (cópia).jpg" class="card-img-top" alt="">';
                echo '                <div class="card-body">';
                echo '                    <h5 class="card-title">Seus Dados</h5>';
                echo '                    <p class="card-text">Veja seus dados.</p>';
                echo '                    <a href="dados_individuais.php" class="btn btn-primary">ver</a>';
                echo '                </div>';
                echo '            </div>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo "matricula ou senha incorreta";
            }
        } elseif ($login == 'professor') {
            $sql = "SELECT id_professor, senha, matricula, nome_professor FROM tb_professor WHERE matricula = '$matricula' AND senha = '$senha'";
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    $mat = $linha['matricula'];
                    $sen = $linha['senha'];
                    $nom = $linha['nome_professor'];
                    $usuario = $linha['id_professor'];
                    $_SESSION['id_user'] = $usuario;
                    echo "Bem vindo Professor(a) " . $nom;
                }
                echo ' <div class="container">';
                echo '    <div class="row g-3">';
                echo '        <div class="col-12 col-md-6 col-lg-4">';
                echo '            <div class="card">';
                echo '                <img src="CEA.png" class="card-img-top" alt="">';
                echo '                <div class="card-body">';
                echo '                    <h5 class="card-title">Sobre Nos</h5>';
                echo '                    <p class="card-text">Conheça mais sobre a gente.</p>';
                echo '                    <a href="Sobrenos.html" class="btn btn-primary">ver</a>';
                echo '                </div>';
                echo '            </div>';
                echo '        </div>';
                echo '        <div class="col-12 col-md-6 col-lg-4">';
                echo '            <div class="card">';
                echo '                <img src="cadernos.jpg" class="card-img-top" alt="">';
                echo '                <div class="card-body">';
                echo '                    <h5 class="card-title">Cadastrar notas</h5>';
                echo '                    <p class="card-text">Cadastramento de notas.</p>';
                echo '                    <a href="notas.php" class="btn btn-primary">ver</a>';
                echo '                </div>';
                echo '            </div>';
                echo '        </div>';
                echo '        <div class="col-12 col-md-6 col-lg-4">';
                echo '            <div class="card">';
                echo '                <img src="lupa.jpg" class="card-img-top" alt="">';
                echo '                <div class="card-body">';
                echo '                    <h5 class="card-title">Seus Dados</h5>';
                echo '                    <p class="card-text">Veja seus dados.</p>';
                echo '                    <a href="dados_individuais.php" class="btn btn-primary">ver</a>';
                echo '                </div>';
                echo '            </div>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo "Matricula ou senha incorreta";
            }
        } else {
            echo "Erro no Login";
        }
    
    ?>
    <footer class="bg-dark py-3 mt-3">
        <div class="container text-light text-center">
            <img src="BackgroundEraser_20230624_154848812.png"><br><br>
            <small class="text-white-50">&copy;Copyright by Centro de Estudo e Aprendizagem</small>
        </div>
    </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


</body>

</html>