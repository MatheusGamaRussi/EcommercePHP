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
        // se a sessão id estiver vazia ou se a sessão e status for diferente de adm entao execute
        if(empty($_SESSION['STATUS']) || $_SESSION['STATUS'] != 1){
                header('location:index.php');  // redireciona para página index.php
        }

        include 'conexao.php';	
        include 'navbar.php';
        
        $query = $cn->query("SELECT * from tb_guitarra");
	?>
	
    <div class="container-fluid">
        <?php while ($exibe = $query->fetch(PDO::FETCH_ASSOC)) { 

        ?>

        <div class="row" style="margin-top: 15px;">
            <div class="col-sm-1 col-sm-offset-1"><img src="img/<?php echo $exibe['nome_imagem']; ?>" class="img-responsive" style="width:100%; border-radius: 14px;background: #343440;box-shadow:  5px 5px 8px #2b2b35,-5px -5px 8px #3d3d4b; margin-top: 1.1em;"></div>
            <div class="col-sm-5"><h4 style="padding-top: 1.25em; color: #fff; font-weight: bold;"><?php echo $exibe['nome']; ?></h4></div>
            <div class="col-sm-2" style="padding-top:20px">
                <a href="frm_alterar.php?id=<?php echo $exibe['cod_guitarra'];?>&id2=<?php echo $exibe['cod_modelo'];?>&id3=<?php echo $exibe['cod_marca'];?>&id4=<?php echo $exibe['cod_corda'];?>">
                    <button class="btn btn-lg btn-block btn-default" style="background-color: #474757; border-color: #474757; color: #fff;">
                        <span>Alterar</span>
                    </button>
                </a>
            </div>
            
            <div class="col-sm-2 col-xs-offset-right-1" style="padding-top:20px">
                <a href="excluir.php?id=<?php echo $exibe['cod_guitarra']; ?>">	
                    <button class="btn btn-lg btn-block btn-danger">
                        <span>Excluir</span>		
                    </button>
                </a>
            </div>
        </div>		
        
        
        <?php } ?>
    </div>
	
	<?php
	    include 'footer.html';
	?>
</body>
</html>