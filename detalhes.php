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
		
		if(!empty($_GET['cd'])){
			$cd_guitarra = $_GET['cd'];
			$query = $cn -> query("select * from vw_guitarra where cod_guitarra = '$cd_guitarra'");
			$exibe = $query -> fetch(PDO::FETCH_ASSOC);
		}else{
			echo "<html><script>location.href='index.php'</script></html>";
		}

		
	?>

    <div class="container-fluid">
		<div class="row" style="margin-top: 4em; margin-bottom: 5em;">
			<div class="col-sm-4 col-sm-offset-1" style="margin-top:1.5em;">
				<img src=img/<?php echo $exibe['nome_imagem'];?> class="img-responsive" style="width:100%; border-radius: 20px; background: #343440; box-shadow:  23px 23px 46px #24242c, -23px -23px 46px #444454;">
				<button class="btn btn-lg btn-basic" style="margin-top: 2em; background-color: #474757; border-color: #474757; color: #fff; width: 6em; height: 3em;">
					<span>Comprar</span>
				</button>
			</div>	

			<div class="col-sm-7" style="width: 47em;">
				<h1 style="color:#f5be01; font-weight: bold;"><?php echo $exibe['nome']; ?></h1>
				<p style="color: #FFF; font-size: 1.5em;">R$<?php echo number_format($exibe['preco'], 2, ',', '.'); ?></p>
				<hr>
				<p style="color: #FFF; font-size: 1.5em;"><?php echo $exibe['desc_guitarra'];?></p>
				<hr>
				<p style="color: #FFF; font-size: 1.5em;">Modelo: <?php echo $exibe['desc_modelo'];?></p>
				<p style="color: #FFF; font-size: 1.5em;">Marca: <?php echo $exibe['nome_marca'];?></p>
				<p style="color: #FFF; font-size: 1.5em;">Cor: <?php echo $exibe['cor'];?></p>
				<p style="color: #FFF; font-size: 1.5em;">Nº de cordas: <?php echo $exibe['num_cordas'];?></p>
				</div>		
		</div>
	</div>
	
	<?php
	    include 'footer.html';
	?>
</body>
</html>