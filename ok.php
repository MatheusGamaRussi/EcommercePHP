<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Minha Loja - Logon de usuário</title>
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
        include 'conexao.php';	
        include 'navbar.php';
	?>
	
    <div class="container-fluid" style="display: flex; justify-content: center; flex-direction: column; padding: 4em; margin-bottom: 5em; height: 70vh; width: 80em;"> 
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 text-center">
				<h2 style="color:#f5be01; font-weight: bold;">Usuário cadastrado com sucesso!</h2>
				<a href="form_login.php" class="btn btn-block btn-info" role="button" style="color: #3a3a4b; background-color: #f5be01; border-color: #f5be01; font-weight: bold;">Entrar no loja</a>		
			</div>
		</div>
	</div>
	
	<?php include 'footer.html' ?>
</body>
</html>