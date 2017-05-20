<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Programacao para Web I - WA II</title>
    <link href="estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
<h2 id="cabecalho">CADASTRO DE USUARIOS</h2><hr>

<form action="?valido=true" method="post" name="cadastro" id="cadastro" enctype="multipart/form-data">

    NOME:
        <input type="text" name="nome" id="nome" size="50"><br>
    SEXO:
        <input type="radio" name="sexo" id="masculino" value="Masculino" checked>Marculino
        <input type="radio" name="sexo" id="feminino" value="Feminino" >Feminino<br>
    <label for="file">Selecione o arquivo:</label>
    <input type="file" name="arquivo">
    <br>
        <input type="submit" name="cadastrar" value="CADASTRAR">
        <input type="reset" name="limpar" value="LIMPAR">
    <br><br>
    <a class="c_link" href="uploadFile.php">ENVIAR APENAS IMAGEM</a><br><br>

</form>

</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: Antonio Abrantes
 * Date: 18/05/2017
 * Time: 10:19
 */
include("funcoes_bd.php");

if(isset($_REQUEST['valido']) && $_REQUEST['valido'] == true){

    $nome_pasta = 'upload/';

    // verifica se o diretorio existe, caso não, o diretorio é criado...
    if (!file_exists($nome_pasta)) {
        mkdir($nome_pasta, 0700);
    }

    if(validarEnvioImagem() != false){
        $nome = $_POST['nome'];
        $sexo = $_POST['sexo'];

        // Cria um nome baseado no TIMESTAMP atual e com extensão .jpg
        $nome_final = md5(time()).'.jpeg';

        // Enviar o arquivo para a pasta de destino
        move_uploaded_file($_FILES['arquivo']['tmp_name'], $nome_pasta.$nome_final);

        $sql = "INSERT INTO USUARIOS_V2 (NOME, SEXO, IMAGEM) values ('".$nome."', '".$sexo."','".$nome_pasta.$nome_final."');";

        $conexao = conectarBanco();

        mysql_query($sql, $conexao);
        mysql_close($conexao);

        echo '<h3 class="confirm">Cliente cadastrado com sucesso...</h3><br>';

        listarDados();
    }
}

?>