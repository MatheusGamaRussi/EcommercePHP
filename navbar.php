<nav class="navbar navbar-inverse" style="background-color: #343440;">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="#"><img src="img/logo.png" width="20px" height="20px"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!--Aqui estão todos os elementos da Navbar-->
                <form class="navbar-form navbar-left" role="search" name="frmbusca" method="get" action="busca.php">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Busque aqui" name="txtbusca" required style="background-color: #474757; border-color: #474757; color: #929292;">
                    </div>
                    <button type="submit" class="btn btn-default" style="background-color: #474757; border-color: #474757; color: #929292">Enviar</button>
                </form>
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"></a></li>
                    <li><a href="destaques.php">Mais Vendidos</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Modelos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="modelo.php?m=Stratocaster">Stratocaster</a></li>
                        <li><a href="modelo.php?m=Les Paul">Les Paul</a></li>
                        <li><a href="modelo.php?m=SG">SG</a></li>
                        <li><a href="modelo.php?m=Super Strato">Super Strato</a></li>
                        <li><a href="modelo.php?m=Flying V">Flying V</a></li>
                    </ul>
                    </li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Marcas <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="marca.php?mc=Strinberg">Strinberg</a></li>
                        <li><a href="marca.php?mc=Tagima">Tagima</a></li>
                        <li><a href="marca.php?mc=Ibanez">Ibanez</a></li>
                        <li><a href="marca.php?mc=Fender">Fender</a></li>
                        <li><a href="marca.php?mc=Epiphone">Epiphone</a></li>
                    </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Entre em contato</a></li>

                    <?php if(empty($_SESSION['ID'])) {?>
                    <li><a href="form_login.php">Login</a></li>
                    <?php } else { 
                        if($_SESSION['STATUS'] == 0){
                            $consulta_usuario = $cn->query("select nome from tb_usuario where id_usuario = '$_SESSION[ID]'");
                            $exibe_usu = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <li><a href="#" style="font-weight: bold; color: #f5be01; background-color: #24212c; border-radius: 1em;;"><?php echo $exibe_usu['nome']; ?></a></li>
                            <li><a href="sair.php" style="font-weight: bold; color: #f5be01;">Sair</a></li>
                        <?php } else { ?>
                            <li><a href="adm.php" style="font-weight: bold; color: #f5be01; background-color: #24212c; border-radius: 1em;">Painél Administratívo</a></li>
                            <li><a href="sair.php" style="font-weight: bold; color: #f5be01;">Sair</a></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>