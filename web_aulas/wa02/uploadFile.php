<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Programacao para Web I - WA II</title>
    <link href="estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
<h2 id="cabecalho" >ENVIO DE ARQUIVOS</h2><hr>

<a class="c_link" href="index.php">VOLTAR PARA O INICIO</a><br><br>

<form id="cadastro" method="post" action="?enviou=true" enctype="multipart/form-data">
     <label for="file">Selecione o arquivo:</label>
    <input type="file" name="arquivo">
    <input type="submit" name="enviar" id="enviar" value="ENVIAR">
</form>

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Antonio Abrantes
 * Date: 18/05/2017
 * Time: 17:54
 */
    if(isset($_REQUEST['enviou']) && ($_REQUEST['enviou'] == true)){

        $nome_pasta = 'upload/';

        $nome_arq = $_FILES["arquivo"]["name"];

       if(strlen($nome_arq) <= 0){
           die("<h3 class='atencao'>Sem arquivo para enviar</h3>");
           exit;
       }

        // Verifica se deu mais algum tipo de erro...
        if ($_FILES['arquivo']['error'] != 0) {
            die("<h3 class='atencao'>Nao foi possivel fazer o upload</h3>"); //$_FILES['arquivo']['error']
            exit;
        }

       /* $extensao = strtolower(end(explode('.', $_FILES["arquivo"]["name"])));
       // Recupera o nome do arquivo e extrei do que tem apos o ponto */

        if(($_FILES['arquivo']['type'] == "image/jpeg") || ($_FILES['arquivo']['type'] == "image/jpg")
            && ($_FILES['arquivo']['size'] <= 10000)){

            // Cria um nome baseado no TIMESTAMP atual e com extensão .jpg
            $nome_final = md5(time()).'.jpg';

            move_uploaded_file($_FILES['arquivo']['tmp_name'], $nome_pasta . $nome_final);

            echo '<h3 class="confirm">Arquivo enviado com sucesso...</h3><br>';

            //echo '<a href="upload/'.$nome_final.'">Clique aqui para acessar o arquivo</a>';

            echo '<h3>Local: '.$nome_pasta.$nome_final.' </h3>';

        }else{
            echo '<h3 class="atencao">Arquivo muito grande ou formato invalido</h3>';
        }
    }
?>