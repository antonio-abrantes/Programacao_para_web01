<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h2>CADASTRO DE USUARIOS</h2><hr>

<form action="?valido=true" method="post" name="cadastro" id="cadastro">

    NOME:
        <input type="text" name="nome" id="nome"><br>
    SEXO:
        <input type="radio" name="sexo" id="masculino" value="Masculino" checked>Marculino
        <input type="radio" name="sexo" id="feminino" value="Feminino" >Feminino
    <br>
        <input type="submit" name="cadastrar" value="CADASTRAR">
        <input type="reset" name="limpar" value="LIMPAR">

</form>

</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: Antonio Abrantes
 * Date: 19/05/2017
 * Time: 10:19
 */
include("funcoes_bd.php");

if(isset($_REQUEST['valido']) && $_REQUEST['valido'] == true){

    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];

    $sql = "INSERT INTO USUARIOS (NOME, SEXO) values ('".$nome."', '".$sexo."');";

    $conexao = conectarBanco();

    mysql_query($sql, $conexao);
    mysql_close($conexao);

    echo '<h3>Cliente cadastrado com sucesso...</h3><br>';

    listarDados();
}

?>