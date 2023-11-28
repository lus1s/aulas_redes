<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Resultado da busca</title>
    <link rel="stylesheet" href="estiloAluno.css">
    <link rel="shortcut icon" href="mortarboard.svg" type="image/x-icon">
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>CEA</h1>
        <p>Centro de Ensino e Aprendizagem</p>
        <a href="busca_professor.html" class="btn btn-danger">voltar</a>
        <a href="index.html" class="btn btn-danger">sair</a>
    </div><br><br><br>
</head>

<body>
    <table class="table table-striped">

        <?php
        require_once 'conexao.php';

        //nome, dt_contato e cpf e area form

        if (isset($_GET['nome'], $_GET['dt_con'], $_GET['cpf'],  $_GET['area_form'])) {
            $sql = 'SELECT matricula, nome_professor, dt_contrato, cpf, area_formacao FROM tb_professor';
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr>";
                    echo "<td> Matricula </td>";
                    echo "<td> Nome </td>";
                    echo "<td> Data de Contratação </td>";
                    echo "<td> CPF</td>";
                    echo "<td> Area de Formação</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $linha['matricula'] . "</td>";
                    echo "<td>" . $linha['nome_professor'] . "</td>";
                    echo "<td>" . $linha['dt_contrato'] . "</td>";
                    echo "<td>" . $linha['cpf'] . "</td>";
                    echo "<td>" . $linha['area_formacao'] . "</td>";
                }
            }
        } elseif (isset($_GET['cg_horaria'], $_GET['dt_con'], $_GET['cpf'],  $_GET['area_form'])) {
            $sql = 'SELECT matricula, cg_horaria, dt_contrato, cpf, area_formacao FROM tb_professor';
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr>";
                    echo "<td> Matricula </td>";
                    echo "<td> Data de Contratação </td>";
                    echo "<td> CPF</td>";
                    echo "<td> Carga Horaria </td>";
                    echo "<td> Area de Formação</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $linha['matricula'] . "</td>";
                    echo "<td>" . $linha['dt_contrato'] . "</td>";
                    echo "<td>" . $linha['cpf'] . "</td>";
                    echo "<td>" . $linha['area_formacao'] . "</td>";
                    echo "<td>" . $linha['cg_horaria'] . "</td>";
                }
            }

            //nome, dt_contato e cpf
        } elseif (isset($_GET['nome'], $_GET['dt_con'], $_GET['cpf'])) {
            $sql = 'SELECT matricula, nome_professor, dt_contrato, cpf FROM tb_professor';
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr>";
                    echo "<td> Matricula </td>";
                    echo "<td> Nome </td>";
                    echo "<td> Data de Contratação </td>";
                    echo "<td> CPF</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $linha['matricula'] . "</td>";
                    echo "<td>" . $linha['nome_professor'] . "</td>";
                    echo "<td>" . $linha['dt_contrato'] . "</td>";
                    echo "<td>" . $linha['cpf'] . "</td>";
                }
            }
            //nome, contrato e area formação
        } elseif (isset($_GET['nome'], $_GET['dt_con'], $_GET['area_form'])) {
            $sql = 'SELECT matricula, nome_professor, dt_contrato, area_formacao FROM tb_professor';
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr>";
                    echo "<td> Matricula </td>";
                    echo "<td> Nome </td>";
                    echo "<td> Data de Contratação </td>";
                    echo "<td> Area de Formação</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $linha['matricula'] . "</td>";
                    echo "<td>" . $linha['nome_professor'] . "</td>";
                    echo "<td>" . $linha['dt_contrato'] . "</td>";
                    echo "<td>" . $linha['area_formacao'] . "</td>";
                }
            }
            //Busca por nome, cg horaria e data de contrato 
        } elseif (isset($_GET['nome'], $_GET['dt_con'], $_GET['cg_horaria'])) {
            $sql = 'SELECT matricula, nome_professor, dt_contrato, cg_horaria FROM tb_professor';
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr>";
                    echo "<td> Matricula </td>";
                    echo "<td> Nome </td>";
                    echo "<td> Data de Contratação </td>";
                    echo "<td> Carga Horaria</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $linha['matricula'] . "</td>";
                    echo "<td>" . $linha['nome_professor'] . "</td>";
                    echo "<td>" . $linha['dt_contrato'] . "</td>";
                    echo "<td>" . $linha['cg_horaria'] . "</td>";
                }
            }
            //cpf, ara form e cg horaia
        } elseif (isset($_GET['cpf'], $_GET['area_form'], $_GET['cg_horaria'])) {
            $sql = 'SELECT matricula, cpf, area_formacao, cg_horaria FROM tb_professor';
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr>";
                    echo "<td> Matricula </td>";
                    echo "<td> CPF </td>";
                    echo "<td> Area de Formação </td>";
                    echo "<td> Carga Horaria</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $linha['matricula'] . "</td>";
                    echo "<td>" . $linha['cpf'] . "</td>";
                    echo "<td>" . $linha['area_formacao'] . "</td>";
                }
            }
        } elseif (isset($_GET['nome'], $_GET['dt_con'])) {
            $sql = 'SELECT matricula, nome_professor, dt_contrato FROM tb_professor';
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr >";
                    echo "<td> Matricula </td>";
                    echo "<td> Nome </td>";
                    echo "<td> Data de Contratação </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $linha['matricula'] . "</td>";
                    echo "<td>" . $linha['nome_professor'] . "</td>";
                    echo "<td>" . $linha['dt_contrato'] . "</td>";
                }
            }
            //Busca por nome e CPF      
        } elseif (isset($_GET['nome'], $_GET['cpf'])) {
            $sql = 'SELECT matricula, nome_professor, cpf FROM tb_professor';
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr>";
                    echo "<td> Matricula </td>";
                    echo "<td> Nome </td>";
                    echo "<td> CPF </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $linha['matricula'] . "</td>";
                    echo "<td>" . $linha['nome_professor'] . "</td>";
                    echo "<td>" . $linha['cpf'] . "</td>";
                }
            }
            //Busca por nome e area de formação      
        } elseif (isset($_GET['nome'], $_GET['area_form'])) {
            $sql = 'SELECT matricula, nome_professor, area_formacao FROM tb_professor';
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr>";
                    echo "<td> Matricula </td>";
                    echo "<td> Nome </td>";
                    echo "<td> Area de Formação </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $linha['matricula'] . "</td>";
                    echo "<td>" . $linha['nome_professor'] . "</td>";
                    echo "<td>" . $linha['area_formacao'] . "</td>";
                }
            }
            //Busca por nome e carga horaria
        } elseif (isset($_GET['nome'], $_GET['cg_horaria'])) {
            $sql = 'SELECT matricula, nome_professor, cg_horaria FROM tb_professor';
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr>";
                    echo "<td> Matricula </td>";
                    echo "<td> Nome </td>";
                    echo "<td> Carga Horaria </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $linha['matricula'] . "</td>";
                    echo "<td>" . $linha['nome_professor'] . "</td>";
                    echo "<td>" . $linha['cg_horaria'] . "</td>";
                }
            }
            //Busca por data de contratação e CPF
        } elseif (isset($_GET['dt_con'], $_GET['cpf'])) {
            $sql = 'SELECT matricula, dt_contrato, cpf FROM tb_professor';
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr>";
                    echo "<td> Matricula </td>";
                    echo "<td> Data de Contratação </td>";
                    echo "<td> CPF </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $linha['matricula'] . "</td>";
                    echo "<td>" . $linha['dt_contrato'] . "</td>";
                    echo "<td>" . $linha['cpf'] . "</td>";
                }
            }
            //dt de contrato e area de formacao
        } elseif (isset($_GET['dt_con'], $_GET['area_form'])) {
            $sql = 'SELECT matricula, dt_contrato, area_formacao FROM tb_professor';
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr>";
                    echo "<td> Matricula </td>";
                    echo "<td> Data de Contratação </td>";
                    echo "<td> Area de Formação </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $linha['matricula'] . "</td>";
                    echo "<td>" . $linha['dt_contrato'] . "</td>";
                    echo "<td>" . $linha['area_formacao'] . "</td>";
                }
            }
            //dt contrato e cg horaria
        } elseif (isset($_GET['dt_con'], $_GET['cg_horaria'])) {
            $sql = 'SELECT matricula, dt_contrato, cg_horaria FROM tb_professor';
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr>";
                    echo "<td> Matricula </td>";
                    echo "<td> Data de Contratação </td>";
                    echo "<td> Carga Horaria </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $linha['matricula'] . "</td>";
                    echo "<td>" . $linha['dt_contrato'] . "</td>";
                    echo "<td>" . $linha['cg_horaria'] . "</td>";
                }
            }
            //CPF e area de formacao
        } elseif (isset($_GET['cpf'], $_GET['area_form'])) {
            $sql = 'SELECT matricula, cpf, area_formacao FROM tb_professor';
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr>";
                    echo "<td> Matricula </td>";
                    echo "<td> CPF </td>";
                    echo "<td> Area de Formação </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $linha['matricula'] . "</td>";
                    echo "<td>" . $linha['cpf'] . "</td>";
                    echo "<td>" . $linha['area_formacao'] . "</td>";
                }
            }
            //CPF e carga horaria
        } elseif (isset($_GET['cpf'], $_GET['cg_horaria'])) {
            $sql = 'SELECT matricula, cpf, cg_horaria FROM tb_professor';
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr>";
                    echo "<td> Matricula </td>";
                    echo "<td> CPF </td>";
                    echo "<td> Carga Horaria </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $linha['matricula'] . "</td>";
                    echo "<td>" . $linha['cpf'] . "</td>";
                    echo "<td>" . $linha['cg_horaria'] . "</td>";
                }
            }
            //area de formação e carga horaria
        } elseif (isset($_GET['area_form'], $_GET['cg_horaria'])) {
            $sql = 'SELECT matricula, area_formacao, cg_horaria FROM tb_professor';
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr>";
                    echo "<td> Matricula </td>";
                    echo "<td> Area de Formação </td>";
                    echo "<td> Carga Horaria </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $linha['matricula'] . "</td>";
                    echo "<td>" . $linha['area_formacao'] . "</td>";
                    echo "<td>" . $linha['cg_horaria'] . "</td>";
                }
            }
        } else {
            echo "tenta denovo";
        }

        ?>
    </table><br>
    <footer class="bg-dark py-3 mt-3">
        <div class="container text-light text-center">
            <img src="BackgroundEraser_20230624_154848812.png"><br><br>
            <small class="text-white-50">&copy;Copyright by Centro de Estudo e Aprendizagem</small>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>