<!DOCTYPE html>
<html lang="en">
<head>
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
    <link rel="shortcut icon" href="img/logo.png">
    <title>Login do Usuário</title>
</head>
<body style="background-image: linear-gradient(to top, #343440, #32323e);">
    <?php 
        include 'conexao.php';         
        include 'navbar.php'; 
    ?> 


    <div class="container-fluid" style="display: flex; flex-direction: column; padding: 4em; margin-top: 5em; height: 100vh;"> 
        <div class="row"> 
            <div class="col-sm-4 col-sm-offset-4"> 
                <h2 style="color: #f5be01; font-weight: bold;">Login de Usuário</h2> 
                <form name="frmusuario" method="post" action="valida.php">
                    <div class="form-group"> 
                        <label for="email" style="color: #fff;">Email</label> 
                        <input name="txtemail" type="email" class="form-control" required id="email" style="background-color: #474757; border-color: #474757; color: #fff;"> 
                    </div> 

                    <div class="form-group"> 
                        <label for="senha" style="color: #fff;">Senha</label> 
                        <input name="txtsenha" type="password" class="form-control" required id="senha" style="background-color: #474757; border-color: #474757; color: #fff;"> 
                    </div> 

                    <div style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: space-between;">
                        <button type="submit" class="btn btn-lg btn-default" style="background-color: #474757; border-color: #474757; color: #fff;"> 
                            <span>Entrar</span> 
                        </button> 

                        <a href="form_usu.php">
                            <button type="button" class="btn btn-lg btn-link"> 
                                <h4 style="color: #f5be01;">Ainda não sou cadastrado</h4> 
                            </button> 
                        </a>
                    </div>
                </form>
            </div> 
        </div> 
    </div> 

    <?php
        include 'footer.html';
    ?>
</body>
</html>