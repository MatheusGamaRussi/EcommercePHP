<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Painel Administratívo - The Guitar Zone</title>
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

        if(empty($_SESSION['STATUS']) || $_SESSION['STATUS'] != 1){
            header("location:index.php");
        }

        include 'conexao.php';	
        include 'navbar.php';
	
	?>
	
	
	<div class="container-fluid" style="margin-top: 6em;">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 text-center">
				<h2 style="color: #f5be01; font-weight: bold;">Painél Administrativo</h2>
				<a href="form_produto.php">			
                    <button type="submit" class="btn btn-block btn-lg btn-primary" style="background-color: #474757; border-color: #474757; color: #fff; margin-bottom: 1em;">
                        Incluir Produto
                    </button>
				</a>
                <a href="lista.php">	
                    <button type="submit" class="btn btn-block btn-lg btn-warning" style="background-color: #474757; border-color: #474757; color: #fff; margin-bottom: 1.1em;">
                        Alterar / Excluir Produto
                    </button>
                </a>
				<button type="submit" class="btn btn-block btn-lg btn-success" style="background-color: #474757; border-color: #474757; color: #fff; margin-bottom: 1.1em;">
					Vendas
				</button>
                <a href="sair.php">
                    <button type="submit" class="btn btn-block btn-lg btn-danger" style="background-color: #474757; border-color: #474757; color: #fff; margin-bottom: 8em;">
                        Sair do painél administrativo
                    </button>
                </a>
			</div>
		</div>
	</div>
	
	<?php include 'footer.html' ?>
</body>
</html>