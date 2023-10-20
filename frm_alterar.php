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
        
    <script src="jquery-mask.js"></script>

    <script>
        /* mscara para o preço */	
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
            header('location:index.php');  // redireciona para página index.php
    }
        
        $cd = $_GET['id'];
        $cd2 = $_GET['id2'];
        $cd3 = $_GET['id3'];
        $cd4 = $_GET['id4'];
        
        include 'conexao.php';	
        include 'navbar.php';
        
        $query = $cn -> query("select * from tb_guitarra where cod_guitarra = '$cd'");	
        $exibe = $query -> fetch(PDO::FETCH_ASSOC);
        $query_modelo = $cn -> query("select cod_modelo, desc_modelo from tb_modelo where cod_modelo = '$cd2' union select cod_modelo, desc_modelo from tb_modelo where cod_modelo != '$cd2'");
        $query_marca = $cn -> query("select cod_marca, nome_marca from tb_marca where cod_marca = '$cd3' union select cod_marca, nome_marca from tb_marca where cod_marca != '$cd3'");
        $query_corda = $cn -> query("select cod_corda, tipo_corda from tb_cordoamento where cod_corda = '$cd4' union select cod_corda, tipo_corda from tb_cordoamento where cod_corda != '$cd4'");
	?>
	
	
	<div class="container-fluid" style="margin-top:5em;">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
            <h2 style="color: #f5be01; font-weight: bold;">Alteração de Produtos</h2>
				<form method="post" action="alterar_produto.php?cd_altera=<?php echo $cd; ?>" name="incluiProd" enctype="multipart/form-data">
				<div class="form-group">
						<label for="txtnome" style="color: #FFF; font-weight: bold;">Nome</label>
						<input name="txtnome" type="text" class="form-control" required id="txtnome" value="<?php echo $exibe['nome']; ?>" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>
                
                    <div class="form-group">					
                        <label for="sltmarca" style="color: #FFF; font-weight: bold;">Marca</label>
                        <select class="form-control" name="sltmarca" style="background-color: #474757; border-color: #474757; color: #fff;">
                            <?php					
								while($exibe_marca = $query_marca->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibe_marca['cod_marca'];?>"><?php echo $exibe_marca['nome_marca'];?></option>;
							<?php }	?>	
					    </select>
					</div>
				
				    <div class="form-group">    
                        <label for="sltmodelo" style="color: #FFF; font-weight: bold;">Modelo</label>
                        <select class="form-control" name="sltmodelo" style="background-color: #474757; border-color: #474757; color: #fff;">
                            <?php					
								while($exibe_modelo = $query_modelo->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibe_modelo['cod_modelo'];?>"><?php echo $exibe_modelo['desc_modelo'];?></option>;
							<?php }	?>	
                        </select>
					</div>		

                    <div class="form-group">
                        <label for="sltcorda" style="color: #FFF; font-weight: bold;">Tipo de Corda</label>
                        <select class="form-control" name="sltcorda" style="background-color: #474757; border-color: #474757; color: #fff;">
                            <?php					
								while($exibe_corda = $query_corda->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibe_corda['cod_corda'];?>"><?php echo $exibe_corda['tipo_corda'];?></option>;
							<?php }	?>	
                        </select>
					</div>				
					
                    <div class="form-group">
                        <label for="txtpreco" style="color: #FFF; font-weight: bold;">Preço</label>
                        <input type="text" class="form-control"  name="txtpreco"  required id="txtpreco" value="<?php echo $exibe['preco']; ?>" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>

					<div class="form-group">
                        <label for="txtcor" style="color: #FFF; font-weight: bold;">Cor</label>
                        <input type="text" class="form-control" name="txtcor" required id="txtcor" value="<?php echo $exibe['cor']; ?>" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>
					
                    <div class="form-group">
					    <label for="txtdesc" style="color: #FFF; font-weight: bold;">Descrição</label>
						<textarea rows="3" class="form-control" name="txtdesc" style="background-color: #474757; border-color: #474757; color: #fff;"><?php echo $exibe['desc_guitarra']; ?></textarea>
                    </div>	

                    <div class="form-group">
                        <label for="txtnumcordas" style="color: #FFF; font-weight: bold;">Número de Cordas</label>
                        <input type="number" class="form-control"  name="txtnumcordas"  required id="txtnumcordas" value="<?php echo $exibe['num_cordas']; ?>" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>

                    <div class="form-group">
                        <label for="txtcorpo" style="color: #FFF; font-weight: bold;">Madeira do Corpo</label>
                        <input type="text" class="form-control"  name="txtcorpo"  required id="txtcorpo" value="<?php echo $exibe['corpo']; ?>" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>

                    <div class="form-group">
                        <label for="txtbraco" style="color: #FFF; font-weight: bold;">Madeira do Braço</label>
                        <input type="text" class="form-control"  name="txtbraco"  required id="txtbraco" value="<?php echo $exibe['braco']; ?>" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>

					<div class="form-group">
                        <label for="txtqt" style="color: #FFF; font-weight: bold;">Quantidade em Estoque</label>
                        <input type="number" class="form-control" name="txtqt" required id="txtqt" value="<?php echo $exibe['qt_estoque']; ?>" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>			
					
					<div class="form-group">
                        <label for="txtimg" style="color: #FFF; font-weight: bold;">Imagem</label>
                        <input type="file" accept="image/*" class="form-control" name="txtimg" id="txtimg" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>

                    <div class="form-group">
                        <label for="txtchave" style="color: #FFF; font-weight: bold;">Posições da Chave</label>
                        <input type="number" class="form-control" name="txtchave" required id="txtchave" value="<?php echo $exibe['qntd_posicoes_chave']; ?>" style="background-color: #474757; border-color: #474757; color: #fff;">
					</div>	
					
                    <div class="form-group">
                        <label for="sltwhammy" style="color: #FFF; font-weight: bold;">Possui alavanca?</label>
                        <select class="form-control" name="sltwhammy" style="background-color: #474757; border-color: #474757; color: #fff;">				  				
                            <!-- se o sg_lancamento == S este valor estará selecionado senão vazio -->
                            <option value="S" <?=($exibe['alavanca'] == 'S')?'selected':''?>>Sim</option><option value="N" <?=($exibe['alavanca'] == 'N')?'selected':''?>>Não</option>	  
					    </select>
					</div>

                    <div class="form-group">
                        <label for="sltcanhoto" style="color: #FFF; font-weight: bold;">É para canhotos?</label>
                        <select class="form-control" name="sltcanhoto" style="background-color: #474757; border-color: #474757; color: #fff;">
                            <option value="S" <?=($exibe['canhoto'] == 'S')?'selected':''?>>Sim</option><option value="N" <?=($exibe['canhoto'] == 'N')?'selected':''?>>Não</option>				  
					    </select>
					</div>

					<div class="form-group">
                        <label for="sltlanc" style="color: #FFF; font-weight: bold;">Lançamento?</label>
                        <select class="form-control" name="sltlanc" style="background-color: #474757; border-color: #474757; color: #fff;">
                            <option value="S" <?=($exibe['destaques_semana'] == 'S')?'selected':''?>>Sim</option><option value="N" <?=($exibe['destaques_semana'] == 'N')?'selected':''?>>Não</option>	  				  
					    </select>
					</div>
						
					<button type="submit" class="btn btn-lg btn-default" style="margin-bottom: 3em; background-color: #474757; border-color: #474757; color: #fff; width: 8em; height: 3em;">
					    <span>Alterar</span>
				    </button>
				</form>
			</div>
		</div>
	</div>
	
	<?php include 'footer.html' ?>
	
</body>
</html>