<?php

    include 'conexao.php';  // incluindo a conexao
    include 'resize_class.php';

    $cod_guitarra = $_GET['cd_altera'];  // variavel recebe o código do livro que acabamos de receber do formulário

    // abaixo criando a consulta pelo codigo do livro que recebemos acima
    $query = $cn->query("select nome_imagem from tb_guitarra where cod_guitarra = '$cod_guitarra'"); 
    //criando uma array 
    $exibe = $query->fetch(PDO::FETCH_ASSOC);


    // todas as laterações feitas nos campos serão salvas nas variaveis abaixo

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

    


    $remover1='.';  // variável que vai receber o ponto
    $preco = str_replace($remover1, '', $preco); // substituindo . por vazio
    $remover2=','; // variável que vai receber a virgula
    $preco = str_replace($remover2, '.', $preco); // substituindo , por .

    $img = $_FILES['txtimg'];  // recebendo conteudo do campo file
    $destino = "img/";  //pasta aonde será feito upload da imagem


    if (!empty($img['name'])) { // se a propriedade name[propriedade que pega o nome da imagem ] não estiver vazia faça
        preg_match("/\.(jpg|jpeg|png|gif){1}$/i", $img['name'], $extencao1);
        $img_nome1 = md5(uniqid(time())).".".$extencao1[1];

        $upload_foto1 = 1; // se variavel criada for 1 precisará trocar imagem
    }else{  // caso não haja alteração na imagem, pegar o nome da imagem que está no banco
        $img_nome1 = $exibe['nome_imagem'];

        $upload_foto1 = 0;  // zero pq não fará atualização de fotos
    }
        

    try{
        // comando update para realizar as trocas
        $alterar = $cn->query("update tb_guitarra set  
            nome = '$nome',
            cod_marca = '$marca',
            cod_modelo = '$modelo',
            cod_corda = '$corda',
            preco = '$preco',
            cor = '$cor',
            desc_guitarra = '$desc',
            num_cordas = '$num_cordas',
            corpo = '$corpo',
            braco = '$braco',
            qt_estoque = '$qtd',
            nome_imagem = '$img_nome1',
            qntd_posicoes_chave = '$chave',
            alavanca = '$whammy',
            canhoto = '$canhoto',
            destaques_semana = '$lancamento'
        
        WHERE cod_guitarra = '$cod_guitarra'; 	
        "); // as alterações serão feitas baseadas pelo codigo que recebemos
        
        
        if ($upload_foto1 == 1) {  // se a foto1 for igual a 1 é pq foi feito alteração será feita
            move_uploaded_file($img['tmp_name'], $destino.$img_nome1);
            $resizeObj = new resize($destino.$img_nome1);
            $resizeObj -> resizeImage(450, 320, 'crop');
            $resizeObj -> saveImage($destino.$img_nome1, 100);
        }
        header('location:index.php');  // redirecionando para a pagina menu principal (se tudo der certo)
    }catch(PDOException $e){  // se exsitir algum problema, será gerado uma mensagem de erro
        echo $e->getMessage();     
    }
?>