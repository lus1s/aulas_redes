<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Busca aluno</title>
        <link rel="shortcut icon" href="mortarboard.svg" type="image/x-icon">
        <link rel="stylesheet" href="estiloAluno.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>CEA</h1>
    <p>Centro de Ensino e Aprendizagem</p>
    <a href="adm_busca.html" class="btn btn-danger">voltar</a>
    <a href="index.html" class="btn btn-danger">sair</a>
  </div><br>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Matricula</th>
                <th scope="col">Nome</th>
                <th scope="col">Cpf</th>
                <th scope="col">data_nascimento</th>
                <th scope="col">Cidade</th>
                <th scope="col">Data Matricula</th>
            </tr>
        </thead>
        <?php
        require_once 'conexao.php';

        $sql = 'SELECT * FROM tb_aluno';

        $resultados = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultados) > 0 ) {
            while ($linha = mysqli_fetch_array($resultados)) {
                echo "<tr>";
                echo "<td>" . $linha['matricula'] . "</td>";
                echo "<td>" . $linha['nome_aluno']. "</td>";
                echo "<td>" . $linha['cpf'] . "</td>";
                echo "<td>" . $linha['dt_nascimento'] . "</td>";
                echo "<td>" . $linha['cidade'] . "</td>";
                echo "<td>" . $linha['dt_matricula'] . "</td>";
            }
        } else {
            echo "Sem resultados";
        }

        ?> 
        </table><br>
        <footer class="bg-dark py-3 mt-3">
    <div class="container text-light text-center">
      <img src="BackgroundEraser_20230624_154848812.png"><br><br>
      <small class="text-white-50">&copy;Copyright by Centro de Estudo e Aprendizagem</small>
    </div>
  </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>