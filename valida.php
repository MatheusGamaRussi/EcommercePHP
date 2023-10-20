<?php
    include 'conexao.php';

    session_start();

    $vemail = $_POST['txtemail'];
    $vsenha = $_POST['txtsenha'];

    // echo $vemail.'<br>';
    // echo $vsenha.'<br>';

    $query = $cn->query("select id_usuario, nome, email, senha, usuario_status from tb_usuario where email = '$vemail' and senha = '$vsenha'");
    if($query->rowCount() == 1){
        $exibe = $query->fetch(PDO::FETCH_ASSOC);

        if($exibe['usuario_status'] == 0){
            $_SESSION['ID'] = $exibe['id_usuario'];
            $_SESSION['STATUS'] = 0;
            header('location:index.php');
        }else{
            $_SESSION['ID'] = $exibe['id_usuario'];
            $_SESSION['STATUS'] = 1;
            header('location:index.php');
        }
            
    }else{
        header('location:error.php');
    }
?>