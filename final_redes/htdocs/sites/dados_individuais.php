<?php
session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Seus Dados</title>
        <link rel="stylesheet" href="estiloAluno.css">
        <link rel="shortcut icon" href="mortarboard.svg" type="image/x-icon">

    </head>
    <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>CEA</h1>
    <p>Centro de Ensino e Aprendizagem</p>
    <a href="paginainicial.php" class="btn btn-danger">voltar</a>
    <a href="index.html" class="btn btn-danger">sair</a>
  </div>

    <?php
    
    ?>
    <body>
            <?php
                 require_once 'conexao.php';

                $usuario = $_SESSION['id_user'];
                $login = $_SESSION['user'];

                if ($login == 'aluno') {
                    $sql = "SELECT * FROM tb_aluno WHERE id_aluno = '$usuario'";
                    $resultados = mysqli_query($conexao, $sql);
                    if (mysqli_num_rows($resultados) > 0 ){
                        while ($linha = mysqli_fetch_array($resultados)){
                            
                            $matricula = $linha['matricula'];
                            $nome = $linha['nome_aluno'];
                            $nome_m = $linha['nome_mae'];
                            $nome_p = $linha['nome_pai'];
                            $dt_nas = $linha['dt_nascimento'];
                            $endereco = $linha['endereco'];
                            $cpf = $linha['cpf'];
                            $dt_mat = $linha['dt_matricula'];
                            $idturma = $linha['tb_turma_id_turma'];

                        }
                     $sql = "SELECT * FROM tb_turma WHERE id_turma = '$idturma'";
                     $resultados = mysqli_query($conexao, $sql);
                    }if (mysqli_num_rows($resultados) > 0 ) {
                        while ($linha = mysqli_fetch_array($resultados)){
                            $turma = $linha['nome_turma'];
                        }
                    }
                
                    echo ' <div class="accordion" id="accordionPanelsStayOpenExample">';
                    echo '<div class="accordion-item">';
                    echo ' <h2 class="accordion-header">';
                    echo '    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">';
                    echo "              Dados Acadêmicos";
                    echo "    </button>";
                    echo "    </h2>";
                    echo '<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">';
                    echo '    <div class="accordion-body">';
                    echo '<div class="col-sm">';
                    echo "<h4>Nome:</h4>";
                    echo "<h6>$nome</h6>";
                    echo '<ul class="list-group list-group-flush">';
                    echo '<li class="list-group-item">Matricula: '. $matricula.'</li>';
                    echo '<li class="list-group-item">Data de Matricula: '. $dt_mat .'</li>';
                    echo '<li class="list-group-item">Turma: ' .$turma. '</li>';
                    echo '</ul>';
                    echo "    </div>";
                    echo "    </div>";
                    echo "</div>";
                    echo '<div class="accordion-item">';
                    echo '    <h2 class="accordion-header">';
                    echo '    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">';
                    echo "        Dados Pessoais";
                    echo "    </button>";
                    echo "    </h2>";
                    echo '    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">';
                    echo '    <div class="accordion-body">';  
                    echo '<ul class="list-group list-group-flush">';                   
                    echo '<li class="list-group-item">Nome do pai: '. $nome_p.'</li>';
                    echo '<li class="list-group-item">Nome da Mãe: '. $nome_m .'</li>';
                    echo '<li class="list-group-item">Endereço: '. $endereco .'</li>';
                    echo '<li class="list-group-item">Data de Nascimento: '. $dt_nas .'</li>';
                    echo '<li class="list-group-item">CPF: '. $cpf .'</li>';
                    echo '</ul>';
                    echo "    </div>";
                    echo "</div>";
                    echo '<div class="accordion-item">';
                    echo '    <h2 class="accordion-header">';
                    echo '    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">';
                    echo "        Alterar senha";
                    echo "    </button>";
                    echo "    </h2>";
                    echo '    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">';
                    echo '    <div class="accordion-body">';
                    echo  ' <form action="senha_alterada.php">';
                    echo '<input type="text" name="senha" placeholder="Nova Senha">';
                    echo '<br><br>';
                    echo '<input type="submit" value="Alterar Senha">';
                    echo '</form>';
                    echo "    </div>";
                    echo "    </div>";
                    echo "</div>";
                    echo "</div>";
                    //DADOS DO PROFESSOR
                } elseif ($login == 'professor') {
                    $sql = "SELECT * FROM tb_professor WHERE id_professor = '$usuario'";
                    $resultados = mysqli_query($conexao, $sql);
                    if (mysqli_num_rows($resultados) > 0 ){
                        while ($linha = mysqli_fetch_array($resultados)){
    
                            $matricula = $linha['matricula'];
                            $nome = $linha['nome_professor'];
                            $dt_nas = $linha['dt_nascimento'];
                            $endereco = $linha['endereco_professor'];
                            $cpf = $linha['cpf'];
                            $dt_cont = $linha['dt_contrato'];
                            $dur_cont = $linha['duracao_contrato'];
                            $area_form = $linha['area_formacao'];
                            $cg_hor = $linha['cg_horaria'];
                            $idturma = $linha['tb_turma_id_tuma'];
                        }
                    $sql = "SELECT * FROM tb_turma WHERE id_turma = '$idturma'";
                    $resultados = mysqli_query($conexao, $sql);
                    } if (mysqli_num_rows($resultados) > 0 ) {
                       while ($linha = mysqli_fetch_array($resultados)){
                           $turma = $linha['nome_turma'];
                       }
                   }
                    
                    echo ' <div class="accordion" id="accordionPanelsStayOpenExample">';
                    echo '<div class="accordion-item">';
                    echo ' <h2 class="accordion-header">';
                    echo '    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">';
                    echo "              Dados Acadêmicos";
                    echo "    </button>";
                    echo "    </h2>";
                    echo '<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">';
                    echo '    <div class="accordion-body">';
                    echo '<div class="col-sm">';
                    echo "<h4>Nome:</h4>";
                    echo "<h6>$nome</h6>";
                    echo '<ul class="list-group list-group-flush">';
                    echo '<li class="list-group-item">Matricula: '. $matricula.'</li>';
                    echo '<li class="list-group-item"> Área de Formação: '. $area_form.'</li>';
                    echo '<li class="list-group-item">Data de Contratação: '. $dt_cont .'</li>';
                    echo '<li class="list-group-item">Turmas: ' .$turma. '</li>';
                    echo '</ul>';
                    echo "    </div>";
                    echo "    </div>";
                    echo "</div>";
                    echo '<div class="accordion-item">';
                    echo '    <h2 class="accordion-header">';
                    echo '    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">';
                    echo "        Dados Pessoais";
                    echo "    </button>";
                    echo "    </h2>";
                    echo '    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">';
                    echo '    <div class="accordion-body">';  
                    echo '<ul class="list-group list-group-flush">';                   
                    echo '<li class="list-group-item">Endereço: '. $endereco .'</li>';
                    echo '<li class="list-group-item">Data de Nascimento: '. $dt_nas .'</li>';
                    echo '<li class="list-group-item">CPF: '. $cpf .'</li>';
                    echo '</ul>';
                    echo "    </div>";
                    echo "</div>";
                    echo '<div class="accordion-item">';
                    echo '    <h2 class="accordion-header">';
                    echo '    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">';
                    echo "        Alterar senha";
                    echo "    </button>";
                    echo "    </h2>";
                    echo '    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">';
                    echo '    <div class="accordion-body">';
                    echo  ' <form action="senha_alterada.php">';
                    echo '<input type="text" name="senha" placeholder="Nova Senha">';
                    echo '<br><br>';
                    echo '<input type="submit" value="Alterar Senha">';
                    echo '</form>';
                    echo "    </div>";
                    echo "    </div>";
                    echo "</div>";
                    echo "</div>";
                }
                
            ?>
            <footer class="bg-dark py-3 mt-3">
    <div class="container text-light text-center">
      <img src="BackgroundEraser_20230624_154848812.png"><br><br>
      <small class="text-white-50">&copy;Copyright by Centro de Estudo e Aprendizagem</small>
    </div>
  </footer>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        </table>
    </body>
</html>