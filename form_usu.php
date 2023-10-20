<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cadastre-se</title>
    <link rel="shortcut icon" href="img/logo.png">
        
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery-mask.js"></script>
        
        
    <style>

    .navbar{
        margin-bottom: 0;
    }
    </style>
    <script>
        $(document).ready(function(){
            $("#cep").mask("00000-000");
        });
    </script>
</head>
<body style="background-image: linear-gradient(to top, #343440, #32323e);">

    <?php
        include 'conexao.php';	
        include 'navbar.php';
        ?>

    <div class="container-fluid" style="margin-top:5em;">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <h2 style="color:#f5be01; font-weight: bold;">Cadastre-se</h2>
                <form method="post" action="inserirusuario.php" name="logon">
                    <div class="form-group">
                        <label for="nome" style="color: #fff;">Nome</label>
                        <input name="txtnome" type="text" class="form-control" required id="nome" style="background-color: #474757; border-color: #474757; color: #fff;">
                    </div>
                        
                    <div class="form-group">
                        <label for="email" style="color: #fff;">E-mail</label>
                        <input name="txtemail" type="email" class="form-control" required id="email" style="background-color: #474757; border-color: #474757; color: #fff;">
                    </div>
                        
                    <div class="form-group">
                        <label for="senha" style="color: #fff;">Senha</label>
                        <input name="txtsenha" type="password" class="form-control" required id="senha" style="background-color: #474757; border-color: #474757; color: #fff;">
                    </div>
                        
                    <div class="form-group">
                        <label for="endereco" style="color: #fff;">Endereço</label>
                        <textarea name="txtendereco" rows="5" class="form-control" required id="endereco" style="background-color: #474757; border-color: #474757; color: #fff;"></textarea>
                    </div>
                        
                    <div class="form-group">
                        <label for="cidade" style="color: #fff;">Cidade</label>
                        <input name="txtcidade" type="text" class="form-control" required id="cidade" style="background-color: #474757; border-color: #474757; color: #fff;">
                    </div>
                        
                    <div class="form-group">
                        <label for="cep" style="color: #fff;">CEP</label>
                        <input name="txtcep" type="text" class="form-control" required id="cep" style="background-color: #474757; border-color: #474757; color: #fff;"> 
                    </div>
                    
                    <button type="submit" class="btn btn-lg btn-default" style="margin-bottom: 3em; background-color: #474757; border-color: #474757; color: #fff; width: 8em; height: 3em;">
                        Cadastrar
                    </button>
                </form>       
            </div>
        </div>
    </div>
	
	<?php include 'footer.html' ?>
</body>
</html>