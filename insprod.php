<?php

    include 'conexao.php';  // include com arquivo de conexao
    include 'resize_class.php';

    //variáveis que vão receber os dados do formulário que esta na pagina formProduto
    $nome = $_POST['txtnome'];
    $marca = $_POST['sltmarca'];
    $modelo = $_POST['sltmodelo'];
    $corda = $_POST['sltcorda'];
    $preco = $_POST['txtpreco'];
    $cor = $_POST['txtcor'];
    $desc = $_POST['txtdesc'];
    $num_cordas = $_POST['txtnumcordas'];
    $corpo = $_POST['txtcorpo'];
    $braco = $_POST['txtbraco'];
    $qtd = $_POST['txtqt'];
    $chave = $_POST['txtchave'];
    $whammy = $_POST['sltwhammy'];
    $canhoto = $_POST['sltcanhoto'];
    $lancamento = $_POST['sltlanc'];

    $remover1='.';  // criando variável e atribuindo o valor de ponto para ela
    $preco = str_replace($remover1, '', $preco); // removendo ponto de casa decimal,substituindo por vazio
    $remover2=','; // criando variável e atribuindo o valor de virgula para ela
    $preco = str_replace($remover2, '.', $preco); // removendo virgula de casa decimal,substituindo por ponto

    $img = $_FILES['txtimg'];
    $destino = "img/";  // informando para qual diretorio será enviado a imagem


    //gerando nome aleatorio para imagem
    // preg_match vai pegar imagens nas extensões jpg|jpeg|png|gif
    // do nome que esta na variavel $recebe_foto1 do parametro name e a $extensão vai receber o formato
    preg_match("/\.(jpg|jpeg|png|gif){1}$/i", $img['name'], $extencao1);

    // a função md5 vai gerar um valor randomico  com base no horario "time"
    // incrementar o ponto e a extensão
    // função md5 é criado para gerar criptografia
    $img_nome1 = md5(uniqid(time())).".".$extencao1[1];


    try {  // try para tentar inserir
        $inserir = $cn -> query ("insert into tb_guitarra (cod_guitarra, cod_modelo, cod_marca, cod_corda, nome, preco, cor, desc_guitarra, num_cordas, corpo, braco, qt_estoque, nome_imagem, qntd_posicoes_chave, alavanca, destaques_semana, canhoto) values (default, '$modelo', '$marca', '$corda', '$nome', '$preco', '$cor', '$desc', '$num_cordas', '$corpo', '$braco', '$qtd', '$img_nome1', '$chave', '$whammy', '$lancamento', '$canhoto')");
        
        move_uploaded_file($img['tmp_name'], $destino.$img_nome1);             
        $resizeObj = new resize($destino.$img_nome1);
        $resizeObj -> resizeImage(450, 320, 'crop');
        $resizeObj -> saveImage($destino.$img_nome1, 100);
        header('location:index.php');

    }catch(PDOException $e) {  // se houver algum erro explodir na tela a mensagem de erro
        echo $e->getMessage();
    }

?>