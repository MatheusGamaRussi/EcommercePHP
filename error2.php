<doctype html>
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
        session_start();
        include 'conexao.php';	
        include 'navbar.php';
	?>
	
    <div class="container-fluid" style="display: flex; flex-direction: column; padding: 4em; margin-top: 6em; height: 70vh; width: 40em;"> 
        <h2 style="color:#f5be01; font-weight: bold;">Nenhum item encontrado!</h2>
        <div style="display: flex; flex-direction: column; width: 15em; margin-top: 1em;">
            <a href="index.php" class="btn btn-lg btn-basic" role="button" style="margin-top:.75em; color: #fff; background-color: #474757; width: 12em;">Voltar para o início</a>
        </div>
	</div>
	
	<?php include 'footer.html' ?>
</body>
</html>