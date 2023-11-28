<?php
    session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="mortarboard.svg" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="estiloAluno.css">
        <title>Suas Notas</title>
    </head>
    <body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>CEA</h1>
    <p>Centro de Ensino e Aprendizagem</p>
    <a href="paginainicial.php" class="btn btn-danger">voltar</a>
    <a href="index.html" class="btn btn-danger">sair</a>
  </div><br><br><br>

  

          <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Materia</th>
                    <th scope="col">Nota 1º trim</th>
                    <th scope="col">Nota 2º trim</th>
                    <th scope="col">Nota 3º trim</th>
                    
                    
                </tr>
            </thead> 
        <?php
            require_once 'conexao.php';
            $id_user = $_SESSION['id_user'];

            $sql = "SELECT * FROM tb_notas WHERE tb_aluno_id_aluno = '$id_user'";
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0 ){
                while ($linha = mysqli_fetch_array($resultados)){
                    $nota = $linha['valor_nota'];
                    $disciplina = $linha['tb_disciplina_id_disciplina'];
                }
            }
            $sql = "SELECT * FROM tb_disciplina WHERE id_disciplina = '$disciplina'";
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0 ){
                while ($linha = mysqli_fetch_array($resultados)){
                    $materia = $linha['nome'];

                  echo ' <tr>';
                  echo ' <th scope="col">' . $materia .'</th>';
                  echo ' <th scope="col">' . $nota . 'trim</th>';
                  echo ' </tr>';
                }
            }
            else{
                echo '2';
            }
        ?> 
        </table>
        <footer class="bg-dark py-3 mt-0">
    <div class="container text-light text-center">
      <img src="BackgroundEraser_20230624_154848812.png"><br><br>
      <small class="text-white-50">&copy;Copyright by Centro de Estudo e Aprendizagem</small>
    </div>
  </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>    
        </body>
</html>