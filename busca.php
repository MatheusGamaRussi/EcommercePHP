<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
    <title>Minha Loja</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
        .navbar{
            margin-bottom: 0;
        }
	</style>
</head>
<body style="background-image: linear-gradient(to top, #343440, #32323e);"> 	
	<?php
	    session_start();
        include 'conexao.php';	
        include 'navbar.php';

        if(empty($_GET['txtbusca'])){
            echo "<html><script>location.href='index.php'</script></html>";
        }

        $result = $_GET['txtbusca'];
        $query = $cn -> query("select * from vw_guitarra where nome like concat('%', '$result', '%') or desc_modelo like concat('%', '$result', '%') or nome_marca like concat('%', '$result', '%');");
    
        if($query -> rowCount() == 0){
            echo "<html><script>location.href='error2.php'</script></html>";
        }
    ?>
	
    <div class="container-fluid" style="margin-top: 2em;">
        <?php while($exibe = $query -> fetch(PDO::FETCH_ASSOC)){ ?>

            <div style="display: flex; flex-direction: row; justify-content: space-between; width: 83em; margin-bottom: 2em;">
                <div class="col-sm-1 col-sm-offset-1"><img src="img/<?php echo $exibe['nome_imagem']; ?>" class="img-responsive" style="width:100%; border-radius: 14px;background: #343440;box-shadow:  5px 5px 8px #2b2b35,-5px -5px 8px #3d3d4b;"></div>
                <div class="col-sm-5"><h4 style="color: #FFF; font-weight: bold;"><?php echo mb_strimwidth($exibe['nome'], 0, 49, '...'); ?></h4></div>
                <div class="col-sm-2"><h4 style="color: #FFF; font-weight: bold;">R$<?php echo number_format($exibe['preco'], 2, ',', '.'); ?></h4></div>
                <div class="col-sm-2"><h4 style="color: #FFF; font-weight: bold;">Quantidade: <?php echo $exibe['qt_estoque']; ?></h4></div>
                <a href="detalhes.php?cd=<?php echo $exibe['cod_guitarra'];?>">
                    <button class="btn btn-lg btn-default" style="width: 6em; height: 3em; border-color: #FFF;">
                        <span>Ver mais</span>
                    </button>
                </a>
            </div>	

        <?php } ?>	
    </div>
	
	<?php
	    include 'footer.html';
	?>
</body>
</html>