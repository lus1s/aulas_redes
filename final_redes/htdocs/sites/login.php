<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
        <?php
            
            require_once 'conexao.php';
            
            $matricula = $_GET['matricula'];
            $senha = $_GET['senha'];
            $login = $_GET['escolha'];
        
            $_SESSION['user'] = $login;
            
            if ($login == 'adm'){
                $sql = "SELECT id_adm, senha, matricula, nome_adm FROM tb_adm WHERE matricula = '$matricula' AND senha = '$senha'";
                $resultados = mysqli_query($conexao, $sql);
                if (mysqli_num_rows($resultados) > 0 ) {
                    while ($linha = mysqli_fetch_array($resultados)) {
                            
                            $mat = $linha['matricula'];
                            $sen = $linha['senha'];
                            $nom = $linha['nome_adm'];
                            $usuario = $linha['id_adm'];
                           $_SESSION['id_user'] = $usuario;
            
                            echo "Bem vindo " .$nom ;
                    }                          
                    
                    }else {
                        echo "Senha ou matricula incorretas"; 
                    }
                  
            }elseif ($login == 'aluno'){
                    $sql = "SELECT id_aluno, senha, matricula, nome_aluno FROM tb_aluno WHERE matricula = '$matricula' AND senha = '$senha'";
                    $resultados = mysqli_query($conexao, $sql);
                    if (mysqli_num_rows($resultados) > 0 ) {
                        while ($linha = mysqli_fetch_array($resultados)) {
                            $mat = $linha['matricula'];
                            $sen = $linha['senha'];
                            $nom = $linha['nome_aluno'];
                            $usuario = $linha['id_aluno'];
                            $_SESSION['id_user'] = $usuario;
                            echo "Bem vindo(a) " .$nom ;
                        
                        }
                    }else {
                        echo "matricula ou senha incorreta";
                }
            }elseif ($login == 'professor'){
                $sql = "SELECT id_professor, senha, matricula, nome_professor FROM tb_professor WHERE matricula = '$matricula' AND senha = '$senha'";
                $resultados = mysqli_query($conexao, $sql);
                if (mysqli_num_rows($resultados) > 0 ) {
                    while ($linha = mysqli_fetch_array($resultados)) {
                            $mat = $linha['matricula'];
                            $sen = $linha['senha'];
                            $nom = $linha['nome_professor'];
                            $usuario = $linha['id_professor'];
                            $_SESSION['id_user'] = $usuario;
                            echo "Bem vindo Professor(a) " . $nom ;
                    }       
                }else {
                        echo "Matricula ou senha incorreta" ;
                    }
                
            }else {
                echo "Erro no Login";
            }
        ?>
        
    </body>
</html>