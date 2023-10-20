<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .navbar{
            margin: 0;
        }    
    </style>

    <title>The Guitar Zone - Aumente o som</title>
</head>
<body style="background-image: linear-gradient(to top, #343440, #32323e);">
    <?php
        session_start();
        include'conexao.php';
        include'navbar.php';
        include'header.html';

        $consulta = $cn->query('select cod_guitarra, nome, preco, nome_imagem, qt_estoque from vw_guitarra;');
    ?>

    <div class="container-fluid">
        <div class="row">
        <?php while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="col-sm-3">
                <div style="border-radius: 24px; background: #343440; box-shadow:  9px 9px 29px #202028, -9px -9px 29px #484858; padding: 1em; margin: .25em; margin-bottom: 2em;">
                    <img src="img/<?php echo $exibe['nome_imagem']; ?>" class="img-responsive" style="width:100%; border-radius: 1em; box-shadow: 0px 0px 20px #222029;">
                    <div><h4 style="color: #f1fff7"><b><?php echo mb_strimwidth($exibe['nome'], 0, 20, '...'); ?></b></h4></div>
                    <div><h4 style="color: #f5be01">R$<?php echo number_format($exibe['preco'], 2, ',', '.'); ?>&nbsp<span class="label label-basic" style="color: #3a3a4b; background-color: #ffffff;"><?php echo $exibe['qt_estoque'] ?></span></h4></div>

                    <div class="text-center" style="display: flex; gap: .5em; flex-wrap: wrap;">
                        <a href="detalhes.php?cd=<?php echo $exibe['cod_guitarra'];?>">
                            <button class="btn btn-lg btn-default" style="width: 6em; height: 3em; border-color: #FFF;">
                                <span>Ver mais</span>
                            </button>
                        </a>
                        <?php if($exibe['qt_estoque'] > 0){ ?>
                            <button class="btn btn-lg btn-basic" style="background-color: #474757; border-color: #474757; color: #fff; width: 6em; height: 3em;">
                                <span>Comprar</span>
                            </button>
                        <?php }else{?>
                            <button class="btn btn-lg btn-basic disabled" style="color: #6c717f; background-color: #24212c; width: 6em; height: 3em;">
                                <span style="font-size: 1em;">Esgotado</span><br>
                            </button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>

    <?php
        include'footer.html';
    ?>
</body>
</html>