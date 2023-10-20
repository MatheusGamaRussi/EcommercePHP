<DOCTYPE html>
<head>
    <title>TESTE</title>
</head>
<body>
    <?php
        include 'conexao.php';

        $consulta = $cn->query('select * from vw_guitarra');
        while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){
            echo '<br>';
            echo $exibe['nome'].'<br>';
            echo $exibe['preco'].'<br>';
            echo $exibe['desc_guitarra'].'<br><br><hr>';
        }
    ?>
</body>
</html>