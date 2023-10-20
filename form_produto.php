<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Painel Administratívo - Inserção de Itens</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery-mask.js"></script>
    <script>
        $(document).ready(function(){
            $('#txtpreco').mask('000.000.000.000.000,00', {reverse: true});	
        });
    </script>

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

        $query_marca = $cn -> query("select * from tb_marca");
        $query_modelo = $cn -> query("select * from tb_modelo");
        $query_corda = $cn -> query("select * from tb_cordoamento");
	?>
	
	<div class="container-fluid" style="margin-top:5em;">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<h2 style="color: #f5be01; font-weight: bold;">Inclusão de Produtos</h2>
				<form method="post" action="insprod.php" name="incluiProd" enctype="multipart/form-data">
					<div class="form-group">
						<label for="txtnome" style="color: #FFF; font-weight: bold;">Nome</label>
						<input name="txtnome" type="text" class="form-control" required id="txtnome"  style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>
                
                    <div class="form-group">					
                        <label for="sltmarca" style="color: #FFF; font-weight: bold;">Marca</label>
                        <select class="form-control" name="sltmarca" style="background-color: #474757; border-color: #474757; color: #fff;">
                            <option value="">Selecione</option>
                            <?php while($lista_marca = $query_marca -> fetch(PDO::FETCH_ASSOC)){ ?>
                                <option value="<?php echo $lista_marca['cod_marca']; ?>"><?php echo $lista_marca['nome_marca']; ?></option>				
                            <?php } ?>	
					    </select>
					</div>
				
				    <div class="form-group">    
                        <label for="sltmodelo" style="color: #FFF; font-weight: bold;">Modelo</label>
                        <select class="form-control" name="sltmodelo" style="background-color: #474757; border-color: #474757; color: #fff;">
                            <option value="">Selecione</option>
                            <?php while($lista_modelo = $query_modelo -> fetch(PDO::FETCH_ASSOC)){ ?>
                                <option value="<?php echo $lista_modelo['cod_modelo'];?>"><?php echo $lista_modelo['desc_modelo']; ?></option>				
                            <?php } ?>	
                        </select>
					</div>		

                    <div class="form-group">
                        <label for="sltcorda" style="color: #FFF; font-weight: bold;">Tipo de Corda</label>
                        <select class="form-control" name="sltcorda" style="background-color: #474757; border-color: #474757; color: #fff;">
                            <option value="">Selecione</option>
                            <?php while($lista_corda = $query_corda -> fetch(PDO::FETCH_ASSOC)){ ?>
                                <option value="<?php echo $lista_corda['cod_corda'];?>"><?php echo $lista_corda['tipo_corda']; ?></option>				
                            <?php } ?>	
                        </select>
					</div>				
					
                    <div class="form-group">
                        <label for="txtpreco" style="color: #FFF; font-weight: bold;">Preço</label>
                        <input type="text" class="form-control"  name="txtpreco"  required id="txtpreco" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>

					<div class="form-group">
                        <label for="txtcor" style="color: #FFF; font-weight: bold;">Cor</label>
                        <input type="text" class="form-control" name="txtcor" required id="txtcor" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>
					
                    <div class="form-group">
					    <label for="txtdesc" style="color: #FFF; font-weight: bold;">Descrição</label>
						<textarea rows="3" class="form-control" name="txtdesc" style="background-color: #474757; border-color: #474757; color: #fff;"></textarea>
                    </div>	

                    <div class="form-group">
                        <label for="txtnumcordas" style="color: #FFF; font-weight: bold;">Número de Cordas</label>
                        <input type="number" class="form-control"  name="txtnumcordas"  required id="txtnumcordas" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>

                    <div class="form-group">
                        <label for="txtcorpo" style="color: #FFF; font-weight: bold;">Madeira do Corpo</label>
                        <input type="text" class="form-control"  name="txtcorpo"  required id="txtcorpo" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>

                    <div class="form-group">
                        <label for="txtbraco" style="color: #FFF; font-weight: bold;">Madeira do Braço</label>
                        <input type="text" class="form-control"  name="txtbraco"  required id="txtbraco" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>

					<div class="form-group">
                        <label for="txtqt" style="color: #FFF; font-weight: bold;">Quantidade em Estoque</label>
                        <input type="number" class="form-control" name="txtqt" required id="txtqt" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>			
					
					<div class="form-group">
                        <label for="txtimg" style="color: #FFF; font-weight: bold;">Imagem</label>
                        <input type="file" accept="image/*" class="form-control" name="txtimg" required id="txtimg" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>

                    <div class="form-group">
                        <label for="txtchave" style="color: #FFF; font-weight: bold;">Posições da Chave</label>
                        <input type="number" class="form-control" name="txtchave" required id="txtchave" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>	
					
                    <div class="form-group">
                        <label for="sltwhammy" style="color: #FFF; font-weight: bold;">Possui alavanca?</label>
                        <select class="form-control" name="sltwhammy" style="background-color: #474757; border-color: #474757; color: #fff;">
                            <option value="">Selecione</option>
                            <option value="S">Sim</option>
                            <option value="N">Não</option>					  
					    </select>
					</div>

                    <div class="form-group">
                        <label for="sltcanhoto" style="color: #FFF; font-weight: bold;">É para canhotos?</label>
                        <select class="form-control" name="sltcanhoto" style="background-color: #474757; border-color: #474757; color: #fff;">
                            <option value="">Selecione</option>
                            <option value="S">Sim</option>
                            <option value="N">Não</option>					  
					    </select>
					</div>

					<div class="form-group">
                        <label for="sltlanc" style="color: #FFF; font-weight: bold;">Lançamento?</label>
                        <select class="form-control" name="sltlanc" style="background-color: #474757; border-color: #474757; color: #fff;">
                            <option value="">Selecione</option>
                            <option value="S">Sim</option>
                            <option value="N">Não</option>					  
					    </select>
					</div>
					
				<button type="submit" class="btn btn-lg btn-default" style="margin-bottom: 3em; background-color: #474757; border-color: #474757; color: #fff; width: 8em; height: 3em;">
					<span>Cadastrar</span>
				</button>
				
				</form>
			</div>
		</div>
	</div>
	
	<?php include 'footer.html' ?>

</body>
</html>