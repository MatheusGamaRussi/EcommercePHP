<?php
    include 'conexao.php';

    $nome = $_POST['txtnome'];
    $email = $_POST['txtemail'];
    $senha = $_POST['txtsenha'];
    $end = $_POST['txtendereco'];
    $cidade = $_POST['txtcidade'];
    $cep = $_POST['txtcep'];

    $query = $cn->query("select email from tb_usuario where email = '$email'");
    $exibe = $query -> fetch(PDO::FETCH_ASSOC);

    if($query->rowCount() == 1){
        header('location:error1.php');
    }else{
        $inserir = $cn->query("insert into tb_usuario values 
            (default,'$nome','$email','$senha','0','$end','$cidade','$cep')");
        header('location:ok.php');
    }
?>